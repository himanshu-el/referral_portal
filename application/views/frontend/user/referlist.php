<script src="<?php echo base_url()?>assets/js/ajaxjquery.min.js"></script>


<?php $doctor_data = $this->db->where('id',$_SESSION["user_id"])->get('doctor')->result_array(); 
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


        




?>



<div class="content">
    <div class="container">
        <div class="table-responsive">
            <table id="example" class="table table-striped " style="width:100%" >
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Referral Number</th>
                        <th>Refferal date</th>
                        <th>Refferal Type</th>
                        <th>Patient Name</th>
                        <th>Mobile Number</th>
                        <th>Email Id</th>
                        <th>National Id</th>
                        <th>Speciality</th>
                        <th>Xray</th>
                        <th>MRI</th>
                        <th>Ct scan</th>
                        <th>Ultra Sound</th>
                        <th>Echo Scan</th>
                        <th>Branch Code</th>
                        <!-- <th>pecialitycode</th> -->
                        <th>Clinical Notes</th>
                        <th>Labtest Details</th>
                        <th>Radiology Notes</th>
                        <th>Other Investigation</th>
                        <th>Patient Visited</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; 
                   
                    
                    foreach($refer_list as $value){ $speciality = $this->db->get('speciality')->result_array();?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $value['referralno'] ?></td>
                        <td><?php echo $value['referraldate'] ?></td>
                        <td><?php if($value['referraltype'] == 1){ echo "OPD";}elseif($value['referraltype'] == 2){echo "ADDMISSION";}elseif($value['referraltype'] == 3){echo "DIAGNOSIS ONLY";}else{echo "N/A";}?></td>
                        <td><?php echo $value['patientfirstname'].' '.$value['patientmiddlename'].' '.$value['patientlastname']  ?></td>
                        <td><?php echo $value['mobileno'] ?></td>
                        <td><?php echo $value['emailid']?></td>
                        <td><?php echo $value['nationalid'] ?></td>
                        <?php foreach($speciality as $specialitycode){ if($specialitycode['speciality_code'] == $value['specialitycode']){?>
                        <td><?php echo $specialitycode['speciality_name'] ?></td>
                        <?php }}?>
                        <td><?php echo $value['xray'] ?></td>
                        <td><?php echo $value['mri'] ?></td>
                        <td><?php echo $value['ctscan'] ?></td>
                        <td><?php echo $value['ultrasound'] ?></td>
                        <td><?php echo $value['echoscan'] ?></td>
                        <td><?php echo $value['branchcode'] ?></td>
                        
                        <td><?php echo $value['clinicalnotes'] ?></td>

                        <td><?php echo $value['labtestdetails'] ?></td>
                        <td><?php echo $value['radiologynotes'] ?></td>
                        <td><?php echo $value['otherinvestigation'] ?></td>

                        <td><?php foreach($newData as $referApidata){
                            if($referApidata->REFERALNUMBER == $value['referralno']){
                                echo $referApidata->PATIENTVISITED;
                            }} ?></td>
                    </tr>
                    <?php $i++;}?>
                    
                </tbody>
            </table>

        </div>
    </div>
</div>





<script>
  $(document).ready(function() {
    $('#example').DataTable( {
        // "ajax": "<?php echo base_url(); ?>frontend/user/referlist/referlist"
    } );

});

  </script>