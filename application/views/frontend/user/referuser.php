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
    .success_mesg{
        width:500px;
        position: absolute;
        right:20px;
        top:20px;
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
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>

<link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<div class="content editprofile-page">
    <div class="container">
                    
                <div class="success_mesg" id="success_msg"></div>
                <div class="success_mesg" id="branch_error"></div>
                <div class="success_mesg" id="error_msg"></div>
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
                            
                        </div>
                        <div class='col-md-6 mb-3'>
                            <label>Referral Type <span style="color:red;">*</span></label>
                            <select name="referraltype" id=""  class="form-control" required >
                                <option value="">Select Referral Type</option>
                                <option value="1">OPD</option>
                                <option value="2">ADMISSION</option>
                                <option value="3">DIAGNOSIS ONLY</option>
                            </select>
                        
                        </div>
                        <div class='col-md-6 mb-3'>
                            <label>National Id <span style="color:red;">*</span></label>
                            <input type="text" name="nationalid" class="form-control" placeholder="Enter National Id" required maxlength="20"/>
                    
                        </div>
                        

                        <div class='col-md-4 mb-3'>
                            <label>Patient First Name <span style="color:red;">*</span></label>
                            <input type="text" name="patientfirstname" class="form-control" placeholder="Enter Patient First Name" required onkeydown="return /[a-z]/i.test(event.key)"  maxlength="20" />
                           
                        </div>
                        <div class='col-md-4 mb-3'>
                            <label>Patient Middle Name</label>
                            <input type="text" name="patientmiddlename" class="form-control" placeholder="Enter Patient Middle Name" onkeydown="return /[a-z]/i.test(event.key)"  maxlength="15"/>
                        </div>
                        <div class='col-md-4 mb-3'>
                            <label>Patient Last Name <span style="color:red;">*</span></label>
                            <input type="text" name="patientlastname" class="form-control" placeholder="Enter Patient Last Name" onkeydown="return /[a-z]/i.test(event.key)" required  maxlength="15"/>
                    

                        </div>
                        <div class='col-md-4 mb-3' id="result">
                            <label>Mobile Number <span style="color:red;">*</span></label>
                            <input type="hidden" id="fullNumber" name="mobileno" class="form-control" placeholder="Enter Mobile Number" required/>
                            <input type="number" name="phone_number[main]" id="phone_number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxLength="10"  class="form-control" required/>
                           

                        </div>
                        <div class='col-md-4 mb-3'>
                            <label>Email <span style="color:red;">*</span></label>
                            <input type="email" name="emailid" class="form-control" placeholder="Enter Email" required  maxlength="25"/>
                            
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
                            <textarea name="clinicalnotes" id="" cols="30" rows="5" maxLength="2000" class="form-control" placeholder="Enter Clinical Notes"></textarea>
                        </div>
                        <div class='col-md-12 mb-3'>
                            <label>Labtest Details </label>
                            <textarea name="labtestdetails" id="" cols="30" rows="5" maxLength="2000" class="form-control" placeholder="Enter Labtest Details"></textarea>
                        </div>
                        <div class='col-md-12 mb-3'>
                            <label>Radiology Notes </label>
                            <textarea name="radiologynotes" id="" cols="30" rows="5" maxLength="2000" class="form-control" placeholder="Enter Radiology Notes"></textarea>
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
                            <textarea name="otherinvestigation" id="" cols="30" maxLength="2000" rows="5" class="form-control" placeholder="Enter Other Investigation"></textarea>
                        </div>
                        
                        <div class='col-6'>
                            <input type="submit" class='btn' value='Refer' />
                        </div>

                        

                        
                    </div>
                    <?php echo form_close(); ?>
          
        </div>
                                            </div>
</div>







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
            $('#branch_error').html(`<div class="alert alert-danger d-flex align-items-center" role="alert"><svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg><div>${response.branchcode} ${response.emailid} ${response.mobileno} ${response.nationalid} ${response.patientfirstname} ${response.patientlastname} ${response.referraltype}</div></div>`);
            $('#success_msg').html('');
            $('#error_msg').html('');

            setTimeout(function() {
                $('#branch_error').html('');
                $('#email').html('');
                $('#mob_number').html('');
                $('#national_id').html('');
                $('#first_name').html('');
                $('#last_name').html('');
                $('#referral_type').html('');
            }, 3000)
        }else if(response.status == "apierror"){
            $('#branch_error').html('');
            $('#email').html('');
            $('#mob_number').html('');
            $('#national_id').html('');
            $('#first_name').html('');
            $('#last_name').html('');
            $('#referral_type').html('');
            $('#success_msg').html('');
            $('#error_msg').html(`<div class="alert alert-danger d-flex align-items-center" role="alert"><svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg><div>${response.msg}</div></div>`);
            setTimeout(function() {
                $('#error_msg').html('');
            }, 3000)
        }else{
            $('#error_msg').html('');
            $('#branch_error').html('');
            $('#email').html('');
            $('#mob_number').html('');
            $('#national_id').html('');
            $('#first_name').html('');
            $('#last_name').html('');
            $('#referral_type').html('');
            $('#success_msg').html(`<div class="alert alert-success d-flex align-items-center" role="alert"><svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg><div>${response.msg}</div></div>`);
            document.getElementById("referForm").reset();
            setTimeout(function() {
                $('#success_msg').html('');
            }, 3000)
        }
	});
});
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/intlTelInput.min.js"></script>

<script>
var phone_number = window.intlTelInput(document.querySelector("#phone_number"), {
  separateDialCode: true,
  preferredCountries:["ke","in"],
  hiddenInput: "full",
  utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
});

$("#phone_number").keyup(function(){
    var full_number = phone_number.getNumber(intlTelInputUtils.numberFormat.E164);
    // $("input[name='phone_number[full]'").val(full_number);
    document.getElementById("fullNumber").value = full_number;
  });
</script>