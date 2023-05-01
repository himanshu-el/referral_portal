<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usermodel extends CI_Model
{
    function insert_data($data)
    {
        return  $this->db->insert('user', $data);
    }
    function fetchModeldata()
    {
        $response = array();
        $this->db->select('*');
        $q = $this->db->get('doctor');
        $response = $q->result_array();
        return $response;
    }

    function update_profile($id,$data){     
       $this->db->set($data);
       $this->db->where('id',$id);
        $this->db->update('doctor');
    }

    function update_password($id,$data){     
        $this->db->set($data);
        $this->db->where('id',$id);
         $this->db->update('doctor');
     }
    
    function update_profile_status($final_email ){
        $data = array(
         
          
          'email' => $final_email,
          'status' => 1,
        
        );
                   
       $this->db->set($data);
       $this->db->where('email',$final_email);
        $this->db->update('user');
    }
}
