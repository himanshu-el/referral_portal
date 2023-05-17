
<?php  $doctor_data = $this->db->where('id',$_SESSION["user_id"])->get('doctor')->result_array(); 
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


?>


<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="tp-list">
                    <li>
                        <h4>Total Patient Refered</h4>
                        <h6><?php echo $totalrefer?></h6>
                    </li>
                    <li>
                        <h4>Total Patient Completed the Treatment At TNWH</h4>
                        <h6><?php echo $visited?></h6>
                    </li>
                    <li>
                        <h4>Today Patient Refered</h4>
                        <h6><?php echo $today_refer?></h6>
                    </li>
                    <li>
                        <h4>This Month Patient Refered</h4>
                        <h6><?php echo $month_refer?></h6>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

