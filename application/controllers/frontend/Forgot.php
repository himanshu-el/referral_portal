<?php
class Forgot extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('frontend/Usermodel');

    }

    public function index(){
        $this->load->view('frontend/forgot');
    }

    public function login_user(){
        $this->load->model('frontend/Usermodel');
        $model_data = $this->Usermodel->fetchModeldata();
        $login_success = 0;
        $user_data = array(
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
        );
        foreach ($model_data as $value) {
            if ((strtolower($value['email']) == strtolower($user_data['email'])) && ($value['password'] == md5($user_data['password']))) {
                $_SESSION["user_id"] = $value["id"];
                $login_success = 1;
                break;
            }
        }
        if ($login_success == 1) {
            redirect(base_url().'user/dashboard');
        } else {
            $this->session->set_flashdata('error', 'Wrong Email Or Password');
            redirect(base_url() . 'signin');
        }
    }

    public function logout(){
        session_destroy();
        unset($_SESSION["user_id"]);
        redirect(base_url());
   }

    public function reset_pass(){
        
        $this->load->model('frontend/Usermodel');
        $this->input->post('formSubmit');
        
        $this->form_validation->set_rules('email', 'Name', 'required');
    
        if ($this->form_validation->run()) {
            $email = $this->input->post('email');
            
            $get_doctor = $this->db->where('email',$email)->get('doctor')->result_array();

            if($get_doctor != null){


                foreach($get_doctor as $doctor){
                    $name = $doctor['name'];
                }

                $from = "info@externlabs.com";
                $to = $email;
                $subject = "Welcome Test";
                $message = "Hello $name,
                please click on below link to to change your password:
                Email : $email
                Password: $password
        
                Thank You
                ";
                $headers = "From:" . $from;
                $this->session->set_flashdata('success', 'Email have been sent successfully!');
                redirect(base_url() . 'forgot');  

            }else{
                $this->session->set_flashdata('error', 'No record found with this email!');
                redirect(base_url() . 'forgot');  
            }

            // if($this->input->post('password') == $this->input->post('confirm_password')){
            //     $user_data = $this->db->where('id',$id)->get('doctor')->result_array();
            //     foreach($user_data as $value){
            //         $user_password = $value['password'];
            //     }
            //     if($user_password == $this->input->post('old_password')){
            //         $data = array(
            //             'password' => $this->input->post('confirm_password'),
            //         );
            //         if ($this->Usermodel->update_password( $id, $data)) {
            //             $this->session->set_flashdata('error', 'Technical error');
            //             redirect(base_url() . 'user/edit');
            //         } else {
            //             $this->session->set_flashdata('success', 'Profile Updated');
            //             redirect(base_url() . 'user/profile');
            //         }
            //     }else{
            //         $this->session->set_flashdata('error', 'Old Password Not Match!');
            //         redirect(base_url() . 'user/edit');
            //     }
            // }else{
            //     $this->session->set_flashdata('error', 'Please Enter Correct Password!');
            //     redirect(base_url() . 'user/edit');
            // }       
        }else{
            $this->session->set_flashdata('error', 'Please Enter Email');
            redirect(base_url() . 'forgot');
        }
    }


}
