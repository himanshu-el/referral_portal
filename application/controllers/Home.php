<?php
class Home extends CI_controller
{
    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {


        $this->load->view('frontend/user/common/header');
      //  $this->load->view('frontend/template/navbar');

        $this->load->view('frontend/home');
        $this->load->view('frontend/user/common/footer');
    }


}
