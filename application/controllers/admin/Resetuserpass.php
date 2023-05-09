<?php
class Resetuserpass extends CI_controller
{

  public function __construct(){
    parent::__construct();
    if (!$this->session->userdata('vendorAuth')) {
      redirect('admin/login');
    }
    $this->load->model('admin/Usermodel');
  }

  public function index(){
    $this->load->view('admin/template/header');
    $this->load->view('admin/template/sidebar');
    $this->load->view('admin/template/topbar');
    $this->load->view('admin/resetuserpass');
    $this->load->view('admin/template/footer');
  }

  public function reset(){
      $this->load->model('admin/Usermodel');
      $this->input->post('formSubmit');
      $this->form_validation->set_rules('doctor_id', 'state', 'required');
      $this->form_validation->set_rules('new_pass', 'shipment_port', 'required');


      if ($this->form_validation->run()) {
        $password = $this->input->post('new_pass');
        $data = array(
          'password' => md5($password),
        );

        $id = $this->input->post('doctor_id');
        
        $doctor_data = $this->db->where('id',$id)->get('doctor')->result_array();

        foreach($doctor_data as $doctor){
          $email = $doctor['email'];
          $name = $doctor['name'];
        }


        $this->load->config('email');
        $this->load->library('email');
    
        $from = $this->config->item('smtp_user');
        $to = $email;
        $subject = "Welcome To Refer Portal";
        $message = "<p>Hello, ".$name."</p>
        <p>Your New Login Details are given below:</p>
        <p>Email: ".$email."</p>
        <p>Password: ".$password."</p></br>
        <p>Thank You</p>
                  ";

        $this->email->set_newline("\r\n");
        $this->email->from($from,'Identification');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);

        if ($this->Usermodel->reset_password($data, $id)) {
          $this->email->send();
          $this->session->set_flashdata('error', 'Error In Submission');
          redirect(base_url() . 'admin/resetuserpass');
        } else {
          $this->session->set_flashdata('success', 'Password Reset Successfully');
          redirect(base_url() . 'admin/resetuserpass');   
        }

      }else{
        $this->session->set_flashdata('error', 'Please Fill All The Fields');
        redirect(base_url() . 'admin/resetuserpass');
      }


  }

}
