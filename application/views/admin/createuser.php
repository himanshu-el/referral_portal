<link href="<?php echo base_url(); ?>admin/assets/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>admin/assets/css/core.css" rel="stylesheet" type="text/css" />

<script src="<?php echo base_url(); ?>admin/assets/js/jquery.dataTables.min.js"></script>


<style>
    .new-post {
        width: 100%;
        height: auto;
        padding-top: 2rem;
        padding-bottom: 2rem;

    }

    .new-post .box {
        width: 100%;
        height: auto;
        background-color: white;
        box-shadow: 0 3px 3px -2px rgb(0 0 0 / 40%);
        border: 1px solid #cdcdcd;
        padding-top: 2rem;
        padding-bottom: 2rem;
        padding-left: 1rem;
        padding-right: 1rem;
        margin-bottom: 2rem;
    }

    .new-post input[type="text"],
    input[type="file"],input[type="number"],input[type="email"],
    select,
    textarea, .uinpuuu {
        width: 100%;
        height: auto;
        padding-top: .5rem;
        padding-bottom: .5rem;
        padding-left: 1rem;
        border: 1px solid #cdcdcd;
        margin-bottom: 1rem;
    }

    .new-post button {
        width: 10rem;
        height: auto;
        padding-top: .6rem;
        padding-bottom: .6rem;
        color: white;
        background-color: rgb(239, 69, 84);
        outline: none;
        border: none;
        transition: .5s;
    }

    .new-post button:hover {
        opacity: .7;

    }

    .new-post p {
        margin-top: -.5rem;
        color: #666;
        font-size: 12px;
        font-weight: 300;
        font-style: italic;
    }
</style>

<div class="new-post">
    <div class="container">
        <?php
        if ($this->session->flashdata('success')) {
            echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
        } else if ($this->session->flashdata('error')) {
            echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
        }
        ?>
        <h3>Add Product</h3>
        <form method="post" action="<?php echo base_url()?>admin/createuser/add_user" enctype="multipart/form-data">

            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <input type="checkbox" name="admission" id="" value="1"> ADMISSION
                            </div>
                            <div class="col-md-4">
                                <input type="checkbox" name="opd" id=""  value="1"> OPD
                            </div>
                            <div class="col-md-4">
                                <input type="checkbox" name="diagnosis_only" id=" "  value="1"> DIAGNOSIS ONLY
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">National Id/Passport</label>
                                <input type="text" placeholder="Enter National Id/Passport" name="national_id" required>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Patient full name</label>
                                <input type="text" placeholder="Enter full name" name="name" required>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Mobile Number</label>
                                <input type="number" placeholder="Enter Mobile Number" name="number" required>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Email Id</label>
                                <input type="email" placeholder="Enter Email" name="email" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Speciality</label>
                                <input type="text" placeholder="Enter Speciality" name="speciality" required>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">History and clinical findings</label>
                                <textarea name="history" id="history" cols="30" rows="10" placeholder="" required></textarea>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Laboratory</label>
                                <textarea name="laboratory" id="" cols="30" rows="10" placeholder="" required></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">History and clinical findings</label>
                                <select name="clinical_finding" id="" required>
                                    <option value="">Select Report</option>
                                    <option value="radiology echo">Radiology Echo</option>
                                    <option value="xray">XRAY</option>
                                    <option value="mri">MRI</option>
                                    <option value="ct">CT</option>
                                    <option value="ultrasoun">Ultrasoun</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Report Description</label>
                                <textarea name="report_description" id="" cols="30" rows="10" placeholder="" required></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Other Investigation</label>
                                <textarea name="other_investigation" id="" cols="30" rows="10" placeholder="" ></textarea>
                            </div>
                        </div>
                        <button name="formSubmit">Create</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>





