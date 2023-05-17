<?php
class Referlist extends CI_controller
{

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('vendorAuth')) {
      redirect('admin/login');
    }
    $this->load->model('admin/Usermodel');
    $this->load->model('admin/Refermodel');
  }

  public function index()
  {
    // $data['list']=$this->Usermodel->fetch_doctor_list();
    $this->load->view('admin/template/header');
    $this->load->view('admin/template/sidebar');
    $this->load->view('admin/template/topbar');
    $this->load->view('admin/referlist');
    $this->load->view('admin/template/footer');
  }

  public function addinventory_api(){
      
    $postData = $this->input->post();
    // print_r($postData);
    // Get data
    $data = $this->Refermodel->fetch_refer_admin_data($postData);
    echo json_encode($data);
}



  public function deletecontactdetail()
  {

    if ($this->input->post('deletesliderId')) {
      $this->form_validation->set_rules('deletesliderId', 'text', 'required');
      if ($this->form_validation->run() == true) {
        $getDeleteStatus = $this->Usermodel->deletedoctordata($this->input->post('deletesliderId'));
        if ($getDeleteStatus['message'] == 'yes') {
          $this->session->set_flashdata('success', 'Doctor / Hospital deleted successfully');
          redirect(base_url() . "admin/doctorlist");
        } else {
          $this->session->set_flashdata('error', 'Something went wrong. Please try again');
          redirect(base_url() . "admin/doctorlist");
        }
      } else {
        $this->session->set_flashdata('error', 'Something went wrong. Please try again');
        redirect(base_url() . "admin/doctorlist");
      }
    }
  }
}
