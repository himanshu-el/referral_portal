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
        $user_data = $this->db->where('id',$_SESSION['user_id'])->get('doctor')->result_array();
        foreach($user_data as $value){
            $username = $value['email'];
            $referCode = $value['refer_code'];
        }
        // print_r($referCode);
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


        // print_r($newData);

        if($newData == null){
            $arrya_json[] = array('','','','No Record Found','','','','');
        }else{
            $i = 1;
            foreach ($newData as $key => $value) { 
                $arrya_json[] = array($i, $value->REFERALNUMBER,$value->REFERALDATE,$value->REFERALTYPE,$value->PATIENTNAME,$value->MOBILENUMBER, $value->NATIONALID, $value->PATIENTVISITED);
            $i++;}
        }

        echo json_encode(array('data'=>$arrya_json));
    }

}
