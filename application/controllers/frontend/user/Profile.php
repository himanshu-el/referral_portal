<?php
class Profile extends CI_controller
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
        $this->load->view('frontend/user/profile');
        $this->load->view('frontend/user/common/footer');
    }


}
