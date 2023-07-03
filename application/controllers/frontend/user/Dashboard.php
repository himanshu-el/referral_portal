<?php
class Dashboard extends CI_controller
{
    public function __construct()
    {
        parent::__construct();

        if(!isset($_SESSION['user_id'])){
            redirect(base_url());
        }

    }

    public function index()
    {


               



        $this->load->view('frontend/user/common/header');
      //  $this->load->view('frontend/template/navbar');
        $this->load->view('frontend/user/dashboard');
        $this->load->view('frontend/user/common/footer');
    }



    public function stats(){

        $doctor_data = $this->db->where('id',$_SESSION["user_id"])->get('doctor')->result_array(); 
    foreach($doctor_data as $doctor){
        $doctor_id = $doctor['id'];
        $username = $value['email'];
        $referCode = $value['refer_code'];
    }

    $refer_list = $this->db->where('username',$doctor_id)->get('patient')->result_array();

    // print_r($refer_list);
    $today_refer = 0;
    $month_refer = 0;
    $currentDate = date("d/m/Y");
    foreach($refer_list as $refer){
        if(date("d/m/Y") == $refer['referraldate']){
            $today_refer = $today_refer + 1;
        }

        $explodeCurrentDate = explode('/',$currentDate);
        $referDate = $refer['referraldate'];
        $explodeReferDate = explode('/',$referDate);
        

        if($explodeCurrentDate[1] == $explodeReferDate[1]){
            $month_refer = $month_refer + 1;
        }
       
    }
    $totalrefer= count($refer_list);


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
        $api_data = $final_result->result[0]->data;


        // print_r($api_data);

        $visited = 0;

        foreach($refer_list as $patinet_data){
            foreach($api_data as $api){
                if($patinet_data['referralno'] == $api->REFERALNUMBER ){
                    if($api->PATIENTVISITED == "Y"){
                        $visited = $visited + 1;
                    }
                }
            }
        }


        

        $data = array(
            'visited' => $visited,
            'today_refer' => $today_refer,
            'total_refer' => $totalrefer,
            'month_refer' => $month_refer,
        ); 
        echo json_encode($data);
    }
 


}
