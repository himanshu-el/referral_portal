<?php $user_data = $this->db->where('id',$_SESSION['user_id'])->get('doctor')->result_array();

    foreach($user_data as $value){
        $user_name = $value['name'];
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


<style>
    .edit_button{
        float:right;
    }
</style>

<div class="content profile-page">
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
                <h3>Profile </h3>
                <a href="<?php echo base_url()?>user/edit"><button class="edit_button btn">Edit Profile</button></a>
            </div>
            <div class="col-sm-2">
                <figure class="editprofile-img">
                    <img src="<?php echo base_url()?>assets/img/user.png" alt="img/" />
                </figure>
            </div>
            <div class="col-sm-10 ps-md-5">
                <h5><?php echo $user_name?></h5>
                <p><?php echo $user_speciality?></p>

                <ul class="profile-list">
                    <li>
                        <h6>Phone:</h6>
                        <p> <?php echo $user_number?></p>
                    </li>
                    <li>
                        <h6>Email:</h6>
                        <p> <?php echo $user_email?> </p>
                    </li>

                    <li>
                        <h6>Address:</h6>
                        <p> <?php echo $user_address?></p>
                    </li>
                    <li>
                        <h6>Payment Information:</h6>
                        <p><?php if($payment_method == 'till number'){ 
                                echo 'Till Number : '.$account_number.'</br> Registered Name : '.$regitered_name ;
                            }else if($payment_method == 'pay bill number'){
                                echo 'Pay Bill Number : '.$pay_bill_number.'</br> Account Number : '. $account_number. '</br> Registered Name : '. $regitered_name;
                            }else if($payment_method == 'send money'){
                                echo 'Mobile Number : '.$account_number.'</br> Registered Name : '.$regitered_name ;
                            }else if($payment_method == 'EFT'){
                                echo 'Bank Account Number : '.$account_number.'</br> Bank Name : '. $bank_name. '</br> Branch Code : '. $branch_code. '</br> Account Holder Name : '. $regitered_name. '</br> Other Bank : '.$other_bank;
                            }
                            
                            else{
                                echo '';
                            }?></p>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</div>
