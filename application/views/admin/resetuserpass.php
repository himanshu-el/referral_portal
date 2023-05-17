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

<?php $doctor_list = $this->db->get('doctor')->result_array(); ?>

<div class="new-post">
    <div class="container">
        <?php
        if ($this->session->flashdata('success')) {
            echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
            unset($_SESSION['success']);

        } else if ($this->session->flashdata('error')) {
            echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
            unset($_SESSION['error']);

        }
        ?>
        <h3>Add Doctor / Hospital</h3>
        <form method="post" action="<?php echo base_url()?>admin/resetuserpass/reset" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Select Doctor / Hospital <span style="color:red;">*</span></label>
                                <select name="doctor_id" id="" required>
                                    <option value="">Select Doctor / Hospital</option>
                                    <?php foreach($doctor_list as $doctor){?>
                                        <option value="<?php echo $doctor['id']?>"><?php echo $doctor['name']?> (<?php echo $doctor['email']?>)</option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        
                       
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">New Password<span style="color:red;">*</span></label>
                                <input type="text" placeholder="Enter New Password" name="new_pass" required>
                            </div>
                        </div>
                        


                       





                        <button name="formSubmit">Reset</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>







