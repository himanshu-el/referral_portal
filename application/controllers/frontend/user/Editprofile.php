<?php
class Editprofile extends CI_controller
{
    public function __construct()
    {
        parent::__construct();

        if(!isset($_SESSION['user_id'])){
            redirect(base_url());
        }

    }

    public function index()
    {


        $this->load->view('frontend/user/common/header');
      //  $this->load->view('frontend/template/navbar');

        $this->load->view('frontend/user/editprofile');
        $this->load->view('frontend/user/common/footer');
    }


}
