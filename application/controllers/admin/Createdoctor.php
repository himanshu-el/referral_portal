<?php
class Createdoctor extends CI_controller
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
    $this->load->view('admin/createdoctor');
    $this->load->view('admin/template/footer');
  }
  public function create()
  {
    $this->load->model('admin/Usermodel');
      $this->input->post('formSubmit');
      $this->form_validation->set_rules('userType', 'User Type', 'required');
      $this->form_validation->set_rules('name', 'Name', 'required');
      $this->form_validation->set_rules('speciality', 'Speciality', 'required');
      $this->form_validation->set_rules('number', 'Number', 'required');
      $this->form_validation->set_rules('email', 'Email', 'required|is_unique[doctor.email]');
      $this->form_validation->set_rules('address_line1', 'Address 1', 'required');
      $this->form_validation->set_rules('address_line2', 'Address 2', 'required');
      $this->form_validation->set_rules('address_line3', 'Address 3', 'required');
      $this->form_validation->set_rules('city', 'City', 'required');
      $this->form_validation->set_rules('po_box', 'PO Box', 'required');
      $this->form_validation->set_rules('payment_method', 'Payment Method', 'required');
      $this->form_validation->set_rules('refer_code', 'Reefer Code', 'required');
      
       
      if ($this->form_validation->run()) {

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
        
      $email = $this->input->post('email');

      for ($i = 0; $i < 10; $i++) {
        $password .= $characters[rand(0, $charactersLength - 1)];
      }

        $payment_account_number = $this->input->post('payment_account_number');
        $payment_regitered_name = $this->input->post('payment_regitered_name');
        $till_account_number = $this->input->post('till_account_number');
        $till_regitered_name = $this->input->post('till_regitered_name');
        $paybill_account_number = $this->input->post('paybill_account_number');
        $paybill_regitered_name = $this->input->post('paybill_regitered_name');
        $bank_account_number = $this->input->post('bank_account_number');
        $bank_regitered_name = $this->input->post('bank_regitered_name');

        $buy_goods_account_number = $this->input->post('buy_goods_account_number');
        $buy_goods_regitered_name = $this->input->post('buy_goods_regitered_name');

        $account_number = '';
        $registered_name = '';


        if($payment_account_number && $payment_regitered_name){
          $account_number = $payment_account_number;
          $registered_name = $payment_regitered_name;
        }elseif($till_account_number && $till_regitered_name){
          $account_number = $till_account_number;
          $registered_name = $till_regitered_name;
        }elseif($paybill_account_number && $paybill_regitered_name){
          $account_number = $paybill_account_number;
          $registered_name = $paybill_regitered_name;
        }elseif($bank_account_number && $bank_regitered_name){
          $account_number = $bank_account_number;
          $registered_name = $bank_regitered_name;
        }else if($buy_goods_account_number && $buy_goods_regitered_name){
          $account_number = $buy_goods_account_number;
          $registered_name = $buy_goods_regitered_name;
        }else{
          // $this->session->set_flashdata('error', 'Please Fill All The Fields');
          // redirect(base_url() . 'admin/createdoctor');

          $array = array(
            'status'   => "paymentError",
            'msg' => "Please Fill Payment Details",
          );
          echo json_encode($array);

          exit();
        }

        $name = $this->input->post('name');
        // $password = $this->input->post();

        $data = array(
            'userType' =>$this->input->post('userType'),
            'name' =>$this->input->post('name'),
            'speciality' => $this->input->post('speciality'),
            'number' =>$this->input->post('number'),
            'email' =>$this->input->post('email'),
            'address1' =>$this->input->post('address_line1'),
            'address2' =>$this->input->post('address_line2'),
            'address3' =>$this->input->post('address_line3'),
            'city' =>$this->input->post('city'),
            'po_box' =>$this->input->post('po_box'),
            'payment_method' =>$this->input->post('payment_method'),
            'account_number' =>$account_number,
            'regitered_name' =>$registered_name,
            'pay_bill_number' => $this->input->post('pay_bill_number'),
            'bank_name' =>$this->input->post('bank_name'),
            'branch_code' =>$this->input->post('branch_code'),
            'other_bank' =>$this->input->post('other_bank'),    
            'password' => md5($password),   
            'refer_code' => $this->input->post('refer_code')
        );

        $this->load->config('email');
        $this->load->library('email');
    
        $from = $this->config->item('smtp_user');
        $to = $email;
        $subject = "Welcome To Refer Portal";
        $message = "<p>Hello, ".$name."</p>
        <p>welcome on referral Portal Your Login Details are given Below:</p>
        <p>Email: ".$email."</p>
        <p>Password: ".$password."</p></br>
        <p>Thank You</p>
                  ";

        $this->email->set_newline("\r\n");
        $this->email->from($from,'Identification');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);

        if ($this->Usermodel->create_doctor($data)) {
          $this->email->send();
          // $this->session->set_flashdata('success', 'User Created Successfully');
          // redirect(base_url() . 'admin/createdoctor');
          $array = array(
            'status'   => "success",
            'msg' => 'Doctor Created Successfully!',
        );
        } else {

            // $this->session->set_flashdata('error', 'Error In Submission');
            // redirect(base_url() . 'admin/createdoctor');

            $array = array(
              'status'   => "dberror",
              'msg' => 'Error In Submission!',
          );
        }
          
      } else {
          // $this->session->set_flashdata('error', 'Please Fill All The Fields');
          // redirect(base_url() . 'admin/createdoctor');

          $array = array(
            'status'   => "error",
            'userType' => form_error('userType'),
            'name' => form_error('name'),
            'speciality' => form_error('speciality'),
            'number' => form_error('number'),
            'mobileno' => form_error('mobileno'),
            'email' => form_error('email'),
            'address_line1' => form_error('address_line1'),

            'address_line2' => form_error('address_line2'),
            'address_line3' => form_error('address_line3'),
            'city' => form_error('city'),
            'po_box' => form_error('po_box'),
            'payment_method' => form_error('payment_method'),
            'refer_code' => form_error('refer_code'),
        );
      }
      echo json_encode($array);
  }

}
