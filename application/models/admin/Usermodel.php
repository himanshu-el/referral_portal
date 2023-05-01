<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Usermodel extends CI_Model
{
  function __construct()
  {
  }

  function insert_data($data){
    return  $this->db->insert('user', $data);
  }
  
  function create_doctor($data){
    return  $this->db->insert('doctor', $data);
  }
  
  public function fetchinventory_api(){
    return $this->db->get('user')->result_array();
  }

  public function fetch_doctor_list(){
    return $this->db->get('doctor')->result_array();
  }

  
  public function add_speciality($data){
    return  $this->db->insert('speciality', $data);
  }

  function reset_password($data, $id ){        
   $this->db->set($data);
   $this->db->where('id',$id);
    $this->db->update('doctor');
}

public function delete_speciality($data){
  $explodData = explode(',', $data);
  $this->db->where_in('id', $explodData);
  $getDeleteStatus = $this->db->delete('speciality');
  if ($getDeleteStatus == 1) {
    return array('message' => 'yes');
  } else {
    return array('message' => 'no');
  }
}

  public function deletedoctordata($data){
    $explodData = explode(',', $data);
    $this->db->where_in('id', $explodData);
    $getDeleteStatus = $this->db->delete('doctor');
    if ($getDeleteStatus == 1) {
      return array('message' => 'yes');
    } else {
      return array('message' => 'no');
    }
  }
}
