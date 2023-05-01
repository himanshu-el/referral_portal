<?php
class Speciality extends CI_controller
{

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('vendorAuth')) {
      redirect('admin/login');
    }
    $this->load->model('admin/Usermodel');
  }

  public function index()
  {
    // $data['list']=$this->Usermodel->fetch_doctor_list();
    $this->load->view('admin/template/header');
    $this->load->view('admin/template/sidebar');
    $this->load->view('admin/template/topbar');
    $this->load->view('admin/speciality');
    $this->load->view('admin/template/footer');
  }



  public function add(){
    $this->load->model('admin/Usermodel');
    $this->input->post('formSubmit');
    $this->form_validation->set_rules('speciality_name', 'state', 'required');
    $this->form_validation->set_rules('speciality_code', 'shipment_port', 'required');


    if ($this->form_validation->run()) {

      $data = array(
        'speciality_name' => $this->input->post('speciality_name'),
        'speciality_code' => $this->input->post('speciality_code'),
      ); 
      if ($this->Usermodel->add_speciality($data)) {
        $this->session->set_flashdata('success', 'Added Successfully');
        redirect(base_url() . 'admin/speciality');
      } else {
        $this->session->set_flashdata('error', 'Error In Submission');
        redirect(base_url() . 'admin/speciality');
      }

    }else{
      $this->session->set_flashdata('error', 'Please Fill All The Fields');
      redirect(base_url() . 'admin/speciality');
    }


}


  public function deletecontactdetail()
  {

    if ($this->input->post('deletesliderId')) {
      $this->form_validation->set_rules('deletesliderId', 'text', 'required');
      if ($this->form_validation->run() == true) {
        $getDeleteStatus = $this->Usermodel->delete_speciality($this->input->post('deletesliderId'));
        if ($getDeleteStatus['message'] == 'yes') {
          $this->session->set_flashdata('success', 'Speciality successfully');
          redirect(base_url() . "admin/speciality");
        } else {
          $this->session->set_flashdata('error', 'Something went wrong. Please try again');
          redirect(base_url() . "admin/speciality");
        }
      } else {
        $this->session->set_flashdata('error', 'Something went wrong. Please try again');
        redirect(base_url() . "admin/speciality");
      }
    }
  }
}
