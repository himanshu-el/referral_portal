<?php $user_data = $this->db->where('id',$_SESSION['user_id'])->get('doctor')->result_array();

    foreach($user_data as $value){
        $user_name = $value['name'];
        $user_id = $value['id'];
        $user_speciality = $value['speciality'];
        $user_email = $value['email'];
        $user_number = $value['number'];
        $user_address = $value['address'];
        $payment_method = $value['payment_method'];
        $account_number = $value['account_number'];
        $regitered_name =$value['regitered_name'];
        $pay_bill_number = $value['pay_bill_number'];
        $bank_name = $value['bank_name'];
        $branch_code = $value['branch_code'];
        $other_bank = $value['other_bank'];
    }


?>
<div class="content editprofile-page">
    <div class="container">
    <?php
        if ($this->session->flashdata('success')) {
            echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
        } else if ($this->session->flashdata('error')) {
            echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
        }
    ?>
        <div class="row">
            <div class="col-12">
                <h3> Edit Page</h3>
            </div>
            <div class="col-sm-2">
                <figure class="editprofile-img">
                    <img src="<?php echo base_url()?>assets/img/user.png" alt="img/" />
                </figure>
            </div>
            <div class="col-sm-10">

                <!-- <form action="<?php echo base_url()?>frontend/login/edit" method="post" class="editform">
                    <div class='row'>
                        <div class='col-md-6 mb-3'>
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Full Name" value="<?php echo $user_name?>"/>
                        </div>
                        <div class='col-md-6 mb-3'>
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter Email" value="<?php echo $user_email?>" readonly/>
                        </div>
                        <div class='col-md-6 mb-3'>
                            <label>Mobile Number</label>
                            <input type="number" name="number" class="form-control" placeholder="Enter Mobile Number" value="<?php echo $user_number?>"/>
                        </div>

                        <div class='col-md-6 mb-3'>
                            <label>Speciality</label>
                            <input type="text" name="speciality" class="form-control" placeholder="Enter Speciality" value="<?php echo $user_speciality?>"/>
                        </div>
                        <div class='col-md-12 mb-3'>
                            <label>Address </label>
                            <textarea name="address" id="" cols="30" rows="5" class="form-control" placeholder="Enter Address"><?php echo $user_address?></textarea>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $user_id?>">
                        <div class='col-6'>
                            <input type="submit" class='btn' value='Save' />
                        </div>
                    </div>
                </form> -->

                <h4> Password Update</h4>

                <form action="<?php echo base_url()?>frontend/login/update_password" method="post" class="passwordedit">
                    <div class='row'>
                        <div class='col-md-4 mb-3'>
                            <label>Old Password </label>
                            <input type="password" name="old_password" class="form-control" placeholder="Old Password" />
                        </div>
                        <div class='col-md-4 mb-3'>
                            <label>New Password </label>
                            <input type="password" class="form-control" name="password" placeholder="New Password" />
                        </div>
                        <div class='col-md-4 mb-3'>
                            <label>Cofirm Password </label>
                            <input type="password" class="form-control" name="confirm_password" placeholder="Cofirm Password" />
                        </div>
                        <input type="hidden" name="id" value="<?php echo $user_id?>">
                        <div class='col-md-12 mt-3'>
                            <input type="submit" class='btn' value='Submit' />
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
