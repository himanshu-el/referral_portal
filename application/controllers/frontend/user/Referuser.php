<?php
class Referuser extends CI_controller
{
    public function __construct(){
        parent::__construct();
        if(!isset($_SESSION['user_id'])){
            redirect(base_url());
        }
        $this->load->model('frontend/Refermodel');
    }

    public function index(){
        $this->load->view('frontend/user/common/header');
        $this->load->view('frontend/user/referuser');
        // $this->load->view('frontend/user/common/footer');
    }


    public function refer_patient(){
        $this->load->model('frontend/Refermodel');
        $this->input->post('formSubmit');

        $this->form_validation->set_rules('nationalid', 'National Id', 'required');
        $this->form_validation->set_rules('referraltype', 'Referral type', 'required');
        $this->form_validation->set_rules('patientfirstname', 'Patient First Name', 'required');
        $this->form_validation->set_rules('patientlastname', 'Patient Last name', 'required');
        $this->form_validation->set_rules('mobileno', 'Mobile Number', 'required');
        $this->form_validation->set_rules('emailid', 'Email', 'required');
        $this->form_validation->set_rules('branchcode', 'Branch Code', 'required');
    
        if ($this->form_validation->run()){ 

            $user_data = $this->db->where('id',$_SESSION['user_id'])->get('doctor')->result_array();
            foreach($user_data as $value){
                $username = $value['email'];
                $doctor_id = $value['id'];
                $referCode = $value['refer_code'];
            }
            if($this->input->post('xray') == "on"){
                $xray = "Y";
            }else {
                $xray = "N";
            }

            if($this->input->post('mri') == "on"){
                $mri = "Y";
            }else {
                $mri = "N";
            }

            if($this->input->post('ctscan') == "on"){
                $ctscan = "Y";
            }else {
                $ctscan = "N";
            }

            if($this->input->post('ultrasound') == "on"){
                $ultrasound = "Y";
            }else {
                $ultrasound = "N";
            }

            if($this->input->post('echoscan') == "on"){
                $echoscan = "Y";
            }else {
                $echoscan = "N";
            }

            $data = array(
                'nationalid'      => $this->input->post('nationalid'),
                'referraltype' => $this->input->post('referraltype'),
                'patientfirstname'    => $this->input->post('patientfirstname'),
                'patientlastname'      => $this->input->post('patientlastname'),
                'mobileno' => $this->input->post('mobileno'),
                'emailid'    => $this->input->post('emailid'),
                'xray'      => $xray,
                'mri' => $mri,
                'ctscan'    => $ctscan,
                'ultrasound'      => $ultrasound,
                'echoscan' => $echoscan,
                'branchcode'    => $this->input->post('branchcode'),
                'patientmiddlename'      => $this->input->post('patientmiddlename'),
                'specialitycode' => $this->input->post('specialitycode'),
                'clinicalnotes'    => $this->input->post('clinicalnotes'),
                'labtestdetails'      => $this->input->post('labtestdetails'),
                'radiologynotes' => $this->input->post('radiologynotes'),
                'otherinvestigation'    => $this->input->post('otherinvestigation'),
                'referalhospitalcode'      => $referCode,
                'apikey' => 'tdfdf24614f53bbf00e6054cb9752530b8533c1nbb7357ef4e27e8ab7c29wd74f29h',
                'method'    => 'postdata',
                'username'      => $username,
            );

            $refer_data = array(
                'nationalid'      => $this->input->post('nationalid'),
                'referraltype' => $this->input->post('referraltype'),
                'patientfirstname'    => $this->input->post('patientfirstname'),
                'patientlastname'      => $this->input->post('patientlastname'),
                'mobileno' => $this->input->post('mobileno'),
                'emailid'    => $this->input->post('emailid'),
                'xray'      => $xray,
                'mri' => $mri,
                'ctscan'    => $ctscan,
                'ultrasound'      => $ultrasound,
                'echoscan' => $echoscan,
                'branchcode'    => $this->input->post('branchcode'),
                'patientmiddlename'      => $this->input->post('patientmiddlename'),
                'specialitycode' => $this->input->post('specialitycode'),
                'clinicalnotes'    => $this->input->post('clinicalnotes'),
                'labtestdetails'      => $this->input->post('labtestdetails'),
                'radiologynotes' => $this->input->post('radiologynotes'),
                'otherinvestigation'    => $this->input->post('otherinvestigation'),
                'referalhospitalcode'      => $referCode,
                'username'      => $doctor_id,
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
                if($this->Refermodel->refer_patint($refer_data)){
                    $array = array(
                        'status'   => "success",
                        'msg' => 'Patient Refered Successfully!',
                    );
                }else{
                    $array = array(
                        'status'   => "apierror",
                        'msg' => 'Error During the db query!',
                    );
                }
            }else{
                $array = array(
                    'status'   => "apierror",
                    'msg' => 'Api Failed!',
                );
            } 
        }else{
            $array = array(
                'status'   => "error",
                'nationalid' => form_error('nationalid'),
                'referraltype' => form_error('referraltype'),
                'patientfirstname' => form_error('patientfirstname'),
                'patientlastname' => form_error('patientlastname'),
                'mobileno' => form_error('mobileno'),
                'emailid' => form_error('emailid'),
                'branchcode' => form_error('branchcode'),
            );
        }
        echo json_encode($array);
    }

}
