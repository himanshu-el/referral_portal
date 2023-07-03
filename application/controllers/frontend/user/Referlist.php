<?php
class Referlist extends CI_controller
{
    public function __construct()
    {
        parent::__construct();

        if(!isset($_SESSION['user_id'])){
            redirect(base_url());
        }

    }

    public function index(){
        $this->load->view('frontend/user/common/header');
        $this->load->view('frontend/user/referlist');
        $this->load->view('frontend/user/common/footer');
    }



    public function referlist(){
       
        $doctor_data = $this->db->where('id',$_SESSION["user_id"])->get('doctor')->result_array(); 
        
        foreach($doctor_data as $doctor){
            $doctor_id = $doctor['id'];
            $username = $value['email'];
            $referCode = $value['refer_code'];
        }

        $refer_list = $this->db->where('username',$doctor_id)->get('patient')->result_array();

        $data = array(
            'referalcode'      => $referCode,
            'apikey' => 'tdfdf24614f53bbf00e6054cb9752530b8533c1nbb7357ef4e27e8ab7c29wd74f29h',
            'method'    => 'getdata',
            'username'      => $username,
        );

        $data_string = json_encode($data);
        $curl = curl_init('http://api.nairobiwesthospital.com:90/datasnap/rest/tnwhapi/referral/');
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data_string))
        );

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        $result = curl_exec($curl);
        curl_close($curl);
        $final_result = json_decode($result);

        if($final_result->result[0]->success == true){
            $newData = $final_result->result[0]->data;
        }


        if($refer_list == null){
            $arrya_json[] = array('','','','','','','','','','No Record Found','','','','','','','','','','');
        }else{
            $i = 1;
            foreach ($refer_list as $key => $value) { 
                $speciality = $this->db->get('speciality')->result_array();

                $refer_type = '';

                if($value['referraltype'] == 1){ 
                    $refer_type =  "OPD";
                }elseif($value['referraltype'] == 2){
                    $refer_type =  "ADDMISSION";
                }elseif($value['referraltype'] == 3){
                    $refer_type = "DIAGNOSIS ONLY";
                }else{
                    $refer_type =  "N/A";
                }

                $patientName = $value['patientfirstname'] .' '. $value['patientmiddlename'] .' '. $value['patientlastname'];


                $speci= '';  
                foreach($speciality as $specialitycode){ 
                    if($specialitycode['speciality_code'] == $value['specialitycode']){ 
                        $speci = $specialitycode['speciality_name']; 
                    }
                }


                $isPatientVisited = '';

                foreach($newData as $referApidata){
                    if($referApidata->REFERALNUMBER == $value['referralno']){
                        $isPatientVisited =  $referApidata->PATIENTVISITED;
                    }}

                $arrya_json[] = array($i, $value['referralno'],$value['referraldate'],$refer_type,$patientName,$value['mobileno'], $value['emailid'], $value['nationalid'],$speci,$value['xray'],$value['mri'],$value['ctscan'],$value['ultrasound'],$value['echoscan'],$value['branchcode'],$value['clinicalnotes'],$value['labtestdetails'],$value['radiologynotes'],$value['otherinvestigation'],$isPatientVisited);
            $i++;}
        }

        echo json_encode(array('data'=>$arrya_json));
    }

}
