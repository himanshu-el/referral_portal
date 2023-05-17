<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo base_url()?>assets/img/favicon.png">
    <title>Login | Nairobiwesthospital </title>
    <!-- CSS only -->
<link href=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" />
</head>

<body>
    <div class="login-page">
        <div class="left-part">
            <div class="">
                <a href="javascript:void(0)" class="loginlogolink"> <img src="<?php echo base_url()?>assets/img/logo2.png" alt="img" /> </a>
                <h3>Discover Amazing Nairobiwesthospital <br/> with great build tools</h3>
            </div>
            <div class="aside-img">
            </div>
        </div>
        <div class="right-part">
                <div class="login-form">
                <?php
        if ($this->session->flashdata('success')) {
            echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
        } else if ($this->session->flashdata('error')) {
            echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
        }
        ?>
                    <form action="<?php echo base_url()?>frontend/login/login_user" method="post">
                        <div class=" login-title">
                        <h3 class="">Welcome to Nairobiwesthospital</h3>
                        <!-- <span class="text-muted font-weight-bold font-size-h4">New Here?
                            <a href="javascript:void(0)" class="">Create an
                                Account</a></span> -->
                                </div>
                        <div class="form-group mb-4">
                            <label class="font-size-h6 font-weight-bolder text-dark">Email</label>
                            <input class="form-control" type="email"
                                name="email" autocomplete="off" required="">
                            

                        </div>
                        <div class="form-group">
                            <div class=" d-flex justify-content-between">
                                <label class="">Password</label>
                            <a href="<?php echo base_url()?>forgot"   class="forgotpassword">Forgot Password ?</a>
                            </div>
                            
                            <input class="form-control" type="password" name="password" autocomplete="off" equired="">                            

                        </div>
                        <button type="submit" id="" class="btn mt-4">Sign In</button>
                    </form>
                </div>
                <ul class="login-link"> <li> <span> 2021 &copy; </span> <a href="javascript:void(0)">Nairobiwesthospital</a> </a> </li> <li> <a href="javascript:void(0)"> Terms</a></li> <li> <a href="javascript:void(0)"> Plans </a></li> <li> <a href="javascript:void(0)"> Contact Us</a></li> </ul>

           
        </div>
    </div>

</body>

</html>