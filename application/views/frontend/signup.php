<link rel="stylesheet" href="<?php echo base_url()?>assets/css/login.css">
</head>

<?php $this->load->view('frontend/template/login_nav')?>
<style>
.signup_main{
    background: url(assets/img/login_bg.jpg);
       
        height: 100%;
        width: 100%;
        background-size: 100% 100%;
}
.signup_main .card .signup_head{
    margin:0rem !important;
}
.signup_main .card form{
    margin-top:0rem;
}
.forgot{
    float:right !important;
}
@media only screen and (max-width: 600px){
    .signup_main .card{
        background:white !important;
        padding:1rem !important;
        box-shadow:0px 4px 7px -2px rgb(0 0 0 / 20%) !important;
        margin:4rem 0rem !important;
    }
    
}
</style>
<div class="signup_main">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-md-8">
                <?php
        if ($this->session->flashdata('success')) {
            echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
        } else if ($this->session->flashdata('error')) {
            echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
        }
        ?>
                    <div class="card">
                        <div class="signup_head">
                            
                            
                        </div>
                        
                        <form action="<?php echo base_url()?>frontend/signup/create_user" method="POST">
                            <div class="row">
                                <di class="col-md-6">
                                    <h4>Basic Details</h4>
                                    <label for="">Name</label>
                            <input type="text" name="name" placeholder="Enter Your Name">
                            <label for="">Email</label>
                            <input type="email" name="email" placeholder="Enter Your Email">
                            <label for="">Phone</label>
                            <input type="number" name="number" placeholder="Enter Your Number">

                            <label for="">Address</label>
                            <input type="text" name="address" placeholder="Enter Your address">
                            <label for="">City</label>
                            <input type="text" name="city" placeholder="Enter Your City">
                            <label for="">State</label>
                            <input type="text" name="state" placeholder="Enter Your State">
                            <label for="">Country</label>
                            <select name="country" id="">
                                <option value="">Select Country</option>
                                <?php foreach($country as $value){?>
                                    <option value="<?php echo $value['Country']?>"><?php echo '<img src="'.$value['Flag_image_url'].'">';?> <?php echo $value['Country']?></option>
                                <?php }?>
                            </select>
                            <label for="">Zip / Postal Code</label>
                            <input type="text" name="zip_code" placeholder="Enter Your Zip/Postal Code">

                            <label for="">Password</label>
                            <input type="password" name="password" placeholder="Create Password">
                            <label for="">Confirm Password</label>
                            <input type="text" name="confirm_password" placeholder="Confirm Password">

                                </di>
                                <div class="col-md-6">
                                    <h4>Company Details</h4>
                                    <label for="">Company Name</label>
                            <input type="text" name="company_name" placeholder="Enter Your Company Name">
                            <label for="">Primary Business</label>
                            <select name="primary_business" id="">
                                <option value="">Select Primary Business</option>
                                <option value="Manufacturer/ OEM"> Manufacturer/ OEM</option>
                                <option value="Importer / buying Agent">Importer / buying Agent</option>
                                <option value="Exporter/ Supplier.">Exporter/ Supplier</option>
                                <option value="Service Provider">Service Provider</option>
                                <option value="Distributer/ Retailer/Reseller">Distributer/ Retailer/Reseller</option>
                               
                            </select>
                           
                            <label for="">Year Of Establishment</label>
                            <input type="text" name="establish_year" placeholder="Enter Establishment Year">
                            <label for="">GST/TAX Number</label>
                            <input type="text" name="gst_no" placeholder="Enter GST/TAX number">
                            <label for="">Certification Of Your Company Recived</label>
                            <input type="text" name="company_certification" placeholder="Enter Your Company Certification">
                            <label for="">Role in Company</label>
                            <select name="role_comapny" id="">
                                <option value="">Select Role</option>
                                <option value="supervisor">Supervisor</option>
                                <option value="Owner">Owner</option>
                                <option value="Agent">Agent</option>
                            </select>
                            <label for="">I'm a Supplier/Buyer of</label>
                            <textarea name="company_details" id="" cols="30" rows="10" placeholder="Comapany Details"></textarea>
                                </div>
                            </div>    
                        
                        
                        
                            
                            
                           <input type="checkbox" name="" id=""> By joining, I Agree to <a href="https://eximsure.com/">eximsure.com</a> Terms & condition, Privacy Policy & Receive Emails Related to Our Services.


                            <p>Already Have An Account? <a href="<?php echo base_url()?>signin">Login</a></p>
                            <button>Continue</button>
                        </form>
                        
                    </div>
                   
                </div>
            </div>
        </div>
    </div>