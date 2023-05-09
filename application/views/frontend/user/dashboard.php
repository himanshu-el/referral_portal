
<?php  $doctor_data = $this->db->where('id',$_SESSION["user_id"])->get('doctor')->result_array(); 
    foreach($doctor_data as $doctor){
        $doctor_id = $doctor['id'];
        $username = $value['email'];
        $referCode = $value['refer_code'];
    }

    $refer_list = $this->db->where('username',$doctor_id)->get('patient')->result_array();


$hvvg= count($refer_list);?>


<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="tp-list">
                    <li>
                        <h4>Total Patient Refered</h4>
                        <h6><?php echo $hvvg?></h6>
                    </li>
                    <li>
                        <h4>Total Patient Refered</h4>
                        <h6><?php echo $hvvg?></h6>
                    </li>
                    <li>
                        <h4>Total Patient Refered</h4>
                        <h6><?php echo $hvvg?></h6>
                    </li>
                    <li>
                        <h4>Total Patient Refered</h4>
                        <h6><?php echo $hvvg?></h6>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

