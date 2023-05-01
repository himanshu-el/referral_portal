<style>
    .iti{
        width:100% !important;
    }
    input[type="checkbox"]{
        margin-left:10px;
    }
    input[type="radio"]{
        margin-right:10px;
    }
    
    
</style>

<?php
    $branch_list = $this->db->get('branch')->result_array();
    $doctor_data = $this->db->where('id',$_SESSION["user_id"])->get('doctor')->result_array();
    foreach($doctor_data as $doctor){
        $specialityIDS = $doctor['speciality'];
    }

    $speciality_list = $this->db->get('speciality')->result_array();

    // $specialityIDS = $value['speciality'];

    $createArray = explode(',', $specialityIDS);
    $length = count($createArray);
?>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/intlTelInput.min.js"></script>

<div class="content editprofile-page">
    <!-- <div class="container"> -->
    <?php
        if ($this->session->flashdata('success')) {
            echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
        } else if ($this->session->flashdata('error')) {
            echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
        }
    ?>
       
                <h3>Refer Patient</h3>
            
            
          
                <?php echo form_open(base_url( 'frontend/user/referuser/refer_patient'), array('id'=>'referForm','method'=>'POST'));?>
                    <div class='row'>
                    <div class='col-md-12 mb-3'>
                            <label>Branch <span style="color:red;">*</span></label>
                            <fieldset id="branchcode">
                                <div class="row">
                                    <?php foreach($branch_list as $value){?>
                                        <div class="col-lg-3">
                                            <input type="radio" name="branchcode" value="<?php echo $value['branch_code']?>"><?php echo $value['branch_name']?></input>
                                        </div>
                                    <?php }?>
                                </div>
                            </fieldset>
                            <span id="branch_error" class="text-danger m-0 p-0"></span></br>
                        </div>
                        <div class='col-md-6 mb-3'>
                            <label>Referral Type <span style="color:red;">*</span></label>
                            <select name="referraltype" id=""  class="form-control" >
                                <option value="">Select Referral Type</option>
                                <option value="OPD">OPD</option>
                                <option value="ADMISSION">ADMISSION</option>
                                <option value="DIAGNOSIS ONLY">DIAGNOSIS ONLY</option>
                            </select>
                            <span id="referral_type" class="text-danger m-0 p-0"></span></br>
                        </div>
                        <div class='col-md-6 mb-3'>
                            <label>National Id <span style="color:red;">*</span></label>
                            <input type="text" name="nationalid" class="form-control" placeholder="Enter National Id" />
                            <span id="national_id" class="text-danger m-0 p-0"></span></br>
                        </div>
                        

                        <div class='col-md-4 mb-3'>
                            <label>Patient First Name <span style="color:red;">*</span></label>
                            <input type="text" name="patientfirstname" class="form-control" placeholder="Enter Patient First Name" />
                            <span id="first_name" class="text-danger m-0 p-0"></span></br>
                        </div>
                        <div class='col-md-4 mb-3'>
                            <label>Patient Middle Name</label>
                            <input type="text" name="patientmiddlename" class="form-control" placeholder="Enter Patient Middle Name" />
                        </div>
                        <div class='col-md-4 mb-3'>
                            <label>Patient Last Name <span style="color:red;">*</span></label>
                            <input type="text" name="patientlastname" class="form-control" placeholder="Enter Patient Last Name" />
                            <span id="last_name" class="text-danger m-0 p-0"></span></br>

                        </div>
                        <div class='col-md-4 mb-3' id="result">
                            <label>Mobile Number <span style="color:red;">*</span></label>
                            <input type="hidden" id="fullNumber" name="mobileno" class="form-control" placeholder="Enter Mobile Number" />
                            <input type="tel" name="phone_number[main]" id="phone_number"   class="form-control" />
                            <span id="mob_number" class="text-danger m-0 p-0"></span></br>

                        </div>
                        <div class='col-md-4 mb-3'>
                            <label>Email <span style="color:red;">*</span></label>
                            <input type="email" name="emailid" class="form-control" placeholder="Enter Email" />
                            <span id="email" class="text-danger m-0 p-0"></span></br>
                        </div>

                        <div class='col-md-4 mb-3'>
                            <label>Speciality</label>
                            <select name="specialitycode" id=""  class="form-control">
                                <option value="">Select Speciality</option>
                                <?php foreach($speciality_list as $speciality){
                                        for($i=0; $i<$length; $i++){
                                            if($speciality['id'] == $createArray[$i]){?>
                                        <option value="<?php echo $speciality['speciality_code']?>"><?php echo $speciality['speciality_name']?></option>
                                <?php }}}?>
                            </select>
                        </div>

                        <div class='col-md-12 mb-3'>
                            <label>Clinical Notes </label>
                            <textarea name="clinicalnotes" id="" cols="30" rows="5" class="form-control" placeholder="Enter Clinical Notes"></textarea>
                        </div>
                        <div class='col-md-12 mb-3'>
                            <label>Labtest Details </label>
                            <textarea name="labtestdetails" id="" cols="30" rows="5" class="form-control" placeholder="Enter Labtest Details"></textarea>
                        </div>
                        <div class='col-md-12 mb-3'>
                            <label>Radiology Notes </label>
                            <textarea name="radiologynotes" id="" cols="30" rows="5" class="form-control" placeholder="Enter Radiology Notes"></textarea>
                        </div>

                        <div class='col-md-2 mb-3'>
                            <label>X-ray </label>
                            <input type="checkbox" name="xray" id="">
                        </div>

                        <div class='col-md-2 mb-3'>
                            <label>MRI </label>
                            <input type="checkbox" name="mri" id="">
                        </div>

                        <div class='col-md-2 mb-3'>
                            <label>CTSCAN</label>
                            <input type="checkbox" name="ctscan" id="">
                        </div>

                        <div class='col-md-2 mb-3'>
                            <label>Ultra Sound </label>
                            <input type="checkbox" name="ultrasound" id="">
                        </div>

                        <div class='col-md-2 mb-3'>
                            <label>Echo Scan </label>
                            <input type="checkbox" name="echoscan" id="">
                        </div>
                        
                        <div class='col-md-12 mb-3'>
                            <label>Other Investigation </label>
                            <textarea name="otherinvestigation" id="" cols="30" rows="5" class="form-control" placeholder="Enter Other Investigation"></textarea>
                        </div>
                        
                        <div class='col-6'>
                            <input type="submit" class='btn' value='Refer' />
                        </div>

                        <h2 id="success_msg" style="color:green; font-size:14px; font-style:italic;"></h2>
                        <h2 id="error_msg"  style="color:red; font-size:14px; font-style:italic;"></h2>

                        
                    </div>
                    <?php echo form_close(); ?>
          
        </div>
    
</div>

<script>
var phone_number = window.intlTelInput(document.querySelector("#phone_number"), {
  separateDialCode: true,
  preferredCountries:["ke","in"],
  hiddenInput: "full",
  utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
});

$("form").submit(function() {
  var full_number = phone_number.getNumber(intlTelInputUtils.numberFormat.E164);
$("input[name='phone_number[full]'").val(full_number);
    document.getElementById("fullNumber").value = full_number;
   
});
</script>





<script>

    $("#referForm").submit(function(event){
	event.preventDefault();
	var post_url = $(this).attr("action"); 
	var request_method = $(this).attr("method"); 
	var form_data = $(this).serialize(); 
	
	$.ajax({
		url : post_url,
        type: request_method,
        dataType:"json",
        data : form_data, 
    }).done(function(response){ 
		if(response.status == "error"){
            $('#branch_error').html(response.branchcode);
            $('#email').html(response.emailid);
            $('#mob_number').html(response.mobileno);
            $('#national_id').html(response.nationalid);
            $('#first_name').html(response.patientfirstname);
            $('#last_name').html(response.patientlastname);
            $('#referral_type').html(response.referraltype);
            $('#success_msg').html('');
            $('#error_msg').html('');
        }else if(response.status == "apierror"){
            $('#branch_error').html('');
            $('#email').html('');
            $('#mob_number').html('');
            $('#national_id').html('');
            $('#first_name').html('');
            $('#last_name').html('');
            $('#referral_type').html('');
            $('#success_msg').html('');

            $('#error_msg').html(response.msg);
        }else{
            $('#error_msg').html('');
            $('#branch_error').html('');
            $('#email').html('');
            $('#mob_number').html('');
            $('#national_id').html('');
            $('#first_name').html('');
            $('#last_name').html('');
            $('#referral_type').html('');
            $('#success_msg').html(response.msg);
        }
	});
});
</script>
