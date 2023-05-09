<?php
class Createuser extends CI_controller
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

    $this->load->view('admin/template/header');
    $this->load->view('admin/template/sidebar');
    $this->load->view('admin/template/topbar');
    $this->load->view('admin/createuser');
    $this->load->view('admin/template/footer');
  }
  public function add_user()
  {
    $this->load->model('admin/Usermodel');

      $this->input->post('formSubmit');
      $this->form_validation->set_rules('national_id', 'state', 'required');
      $this->form_validation->set_rules('name', 'shipment_port', 'required');
      $this->form_validation->set_rules('number', 'link', 'required');
      $this->form_validation->set_rules('email', 'state', 'required|is_unique[user.email]');
      $this->form_validation->set_rules('speciality', 'address', 'required');
      $this->form_validation->set_rules('history', 'link', 'required');

      $this->form_validation->set_rules('laboratory', 'Name', 'required');
      $this->form_validation->set_rules('clinical_finding', 'product size', 'required');
      $this->form_validation->set_rules('report_description', 'dispetch time', 'required');
      $this->form_validation->set_rules('other_investigation', 'state', 'required');
      
      if ($this->form_validation->run()) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < 10; $i++) {
        $password .= $characters[rand(0, $charactersLength - 1)];
      }
              $data = array(
                  'admission' =>$this->input->post('admission'),
                  'opd' =>$this->input->post('opd'),
                  'diagnosis_only' => $this->input->post('diagnosis_only'),
                  'national_id' =>$this->input->post('national_id'),
                  'name' =>$this->input->post('name'),

                  'number' =>$this->input->post('number'),
                  'email' =>$this->input->post('email'),
                  'password' => $password,
                  'speciality' =>$this->input->post('speciality'),
                  'history' =>$this->input->post('history'),
                  'laboratory' => $this->input->post('laboratory'),
                  'clinical_finding' =>$this->input->post('clinical_finding'),
                  'report_description' =>$this->input->post('report_description'),
                  'other_investigation' =>$this->input->post('other_investigation'),       
              );
              if ($this->Usermodel->insert_data($data)) {

                  $this->session->set_flashdata('success', 'User Created Successfully Submited');
                  redirect(base_url() . 'admin/createuser');
              } else {
  
                  $this->session->set_flashdata('error', 'Error In Submission');
                  redirect(base_url() . 'admin/createuser');
              }
          
      } else {
          $this->session->set_flashdata('error', 'Please Fill All The Fields');
          redirect(base_url() . 'admin/createuser');
      }
  }

}
