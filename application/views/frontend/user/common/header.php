<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo base_url()?>assets/img/favicon.png">
    <title>Welcome | Nairobiwesthospital </title>
    <!-- CSS only -->
    <link href=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css" >
    <link href="<?php echo base_url(); ?>/assets/css/style.css" rel="stylesheet" type='text/css' />
</head>

<?php $user_data = $this->db->where('id',$_SESSION['user_id'])->get('doctor')->result_array();
foreach($user_data as $value){
    $user_name = $value['name'];
}
?>


<?php 

    if(isset($_SESSION['user_id'])){
        $login = '<div class="userinfo">
                    <h5>Dr '.$user_name.'  </h5>
                    <ul class="dropdown">
                        <li> <a href="'.base_url().'user/profile">My Profile</a> </li>
                        <li> <a href="'.base_url().'frontend/login/logout">Logout</a> </li>
                    </ul>
                </div> ';
    }else{
        $login = '<div class="btngroup">
                    <a href="'.base_url().'signin" class="btn">Login</a>
                </div>';
    };

?>


<body class="dashboard-page sidepart-show">
    <header>
        <div class="left-part">
            <a href="<?php echo base_url()?>"> <img src="<?php echo base_url()?>assets/img/logo.png" alt="img" /> </a>
        </div>
        <div class="right-part">           
            <?php echo  $login;?>           
        </div>
    </header>
    <?php if(isset($_SESSION['user_id'])){?>
    <div class="sidebar-part">
        <img src="<?php echo base_url()?>assets/img/icon2.png" alt="img" class="close-btn" />
        <div class="sidebar-logo"> <a href="#"> <img src="<?php echo base_url()?>assets/img/logo2.png" alt="img" /> </a>  </div>
        <div class="menu-list"> 
            <ul class="menulist1">
                <li> <a href="<?php echo base_url()?>user/dashboard"><img src="<?php echo base_url()?>assets/img/icon1.png"> Dashboard </a> </li>
                <li> <a href="<?php echo base_url()?>user/referuser"><img src="<?php echo base_url()?>assets/img/icon1.png"> Refer Patient </a> </li>
                <li> <a href="<?php echo base_url()?>user/referlist"><img src="<?php echo base_url()?>assets/img/icon1.png"> Refer Patient List</a> </li>
            </ul>
            <!-- <h4> Master </h4>
            <ul class="menulist2">
                <li class="dropdown"> 
                    <a href="#"><img src="<?php echo base_url()?>assets/img/icon1.png"> Covid Test </a>
                    <ul class="dropdown-list">
                        <li> <a href="#"> Admin </a> </li>
                        <li> <a href="#"> Admin </a> </li>
                        <li> <a href="#"> Admin </a> </li>
                        <li> <a href="#"> Admin </a> </li>
                    </ul>
                </li>
                <li class="dropdown"> 
                    <a href="#"><img src="<?php echo base_url()?>assets/img/icon1.png"> vaccine </a> 
                    <ul class="dropdown-list"> 
                        <li> <a href="#"> Admin </a> </li>
                        <li> <a href="#"> Admin </a> </li>
                        <li> <a href="#"> Admin </a> </li>
                        <li> <a href="#"> Admin </a> </li>
                    </ul>
                </li>
                <li class="dropdown">  
                    <a href="#"><img src="<?php echo base_url()?>assets/img/icon1.png"> Admin Setting </a> 
                    <ul class="dropdown-list">
                        <li> <a href="#"> Admin </a> </li>
                        <li> <a href="#"> Admin </a> </li>
                        <li> <a href="#"> Admin </a> </li>
                        <li> <a href="#"> Admin </a> </li>
                    </ul>
                </li>
                <li class="dropdown"> 
                    <a href="#"><img src="<?php echo base_url()?>assets/img/icon1.png"> Email Template </a>
                    <ul class="dropdown-list">
                        <li> <a href="#"> Admin </a> </li>
                        <li> <a href="#"> Admin </a> </li>
                        <li> <a href="#"> Admin </a> </li>
                        <li> <a href="#"> Admin </a> </li>
                    </ul>
                </li>
                <li class="dropdown"> 
                    <a href="#"><img src="<?php echo base_url()?>assets/img/icon1.png"> User </a> 
                    <ul class="dropdown-list">
                        <li> <a href="#"> Admin </a> </li>
                        <li> <a href="#"> Admin </a> </li>
                        <li> <a href="#"> Admin </a> </li>
                        <li> <a href="#"> Admin </a> </li>
                    </ul>
                </li>
            </ul> -->
        </div>
        
    </div>
    <?php }?>