<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Refermodel extends CI_Model
{
  function __construct()
  {
  }

  function fetch_refer_admin_data($postData=null){

    $response = array();
  
    ## Read value
    $draw = $postData['draw'];
    $start = $postData['start'];
    $rowperpage = $postData['length']; // Rows display per page
    $columnIndex = $postData['order'][0]['column']; // Column index
    $columnName = $postData['columns'][$columnIndex]['data']; // Column name
    $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
    $searchValue = $postData['search']['value']; // Search value
  
  
    // Custom search filter 
    $doctorId = $postData['doctorId'];
    $startDate = $postData['startDate'];
    $endDate = $postData['endDate'];

    

  
    if($startDate != null && $endDate != null){
        ## Search 
        $search_arr = array();
        $searchQuery = "";
        if($searchValue != ''){
            $search_arr[] = " (patient_id like '%".$searchValue."%' or 
                nationalid like '%".$searchValue."%' or 
                referraltype like'%".$searchValue."%' or
                patientfirstname like'%".$searchValue."%' or
                patientlastname like'%".$searchValue."%' or
                mobileno like'%".$searchValue."%' or
                emailid like'%".$searchValue."%' or
                xray like'%".$searchValue."%' or
                mri like'%".$searchValue."%' or
                ctscan like'%".$searchValue."%' or
                ultrasound like'%".$searchValue."%' or
                echoscan like'%".$searchValue."%' or
                branchcode like'%".$searchValue."%' or
                patientmiddlename like'%".$searchValue."%' or
                specialitycode like'%".$searchValue."%' or
                clinicalnotes like'%".$searchValue."%' or
                labtestdetails like'%".$searchValue."%' or
                radiologynotes like'%".$searchValue."%' or
                otherinvestigation like'%".$searchValue."%' or
                referalhospitalcode like'%".$searchValue."%' or
                username like'%".$searchValue."%' or
                referralno like'%".$searchValue."%' or
                referraldate like'%".$searchValue."%'
            ) ";
        }

        date_default_timezone_set('Asia/Kolkata');
        $currntdate = date("d/m/Y");
        
        if($startDate == $currntdate && $endDate == $currntdate){
            
            $getadminreferdata = $this->db->order_by('patient_id ','asc')->limit(1)->get('patient')->result_array();
            foreach($getadminreferdata as $valll){
                $firstdate = $valll['referraldate'];
            }
            $startDatee = $firstdate;
            $endDatee = $currntdate;
        }else{
            $startDatee = $startDate;
            $endDatee = $endDate;
        }
        
        if($startDatee != '' && $endDatee != ''){
                $explodeStartDate = explode('/',$startDatee);
                $explodeEndDate = explode('/',$endDatee);
                $startddd = $explodeStartDate[2]."/".$explodeStartDate[1]."/".$explodeStartDate[0];
                $endddd = $explodeEndDate[2]."/".$explodeEndDate[1]."/".$explodeEndDate[0];
     
                $search_arr[] = " str_to_date(referraldate, '%d/%m/%Y') BETWEEN '".$startddd."' and  '".$endddd."' ";
        }

        if($doctorId){
            $search_arr[] = " username='".$doctorId."' ";
        }
        
        if(count($search_arr) > 0){
            $searchQuery = implode(" and ",$search_arr);
        }
        

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $records = $this->db->get('patient')->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        if($searchQuery != '')
        $this->db->where($searchQuery);
        $records = $this->db->get('patient')->result();
        $totalRecordwithFilter = $records[0]->allcount;

  
        ## Fetch records
        $this->db->select('*');
        if($searchQuery != '')
        $this->db->where($searchQuery);
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get('patient')->result();
        $data = array();

        // print_r($records);

        $doctor_data = $this->db->get('doctor')->result_array();
  
        $i =$start + 1;
        foreach ($records as $record) {

            if($record->referraltype == 1){ 
                $referType = "OPD";
            }else if($record->referraltype == 2){
                $referType = "ADDMISSION";
            }else if($record->referraltype == 3){
                $referType = "DIAGNOSIS ONLY";
            }else{
                $referType = "N/A";
            }
            
            foreach($doctor_data as $doctot){
                if($doctot['id'] == $record->username){
                    $doctor_name = $doctot['name'];
                    $doctor_number = $doctot['number'];
                    $doctor_email = $doctot['email'];
                    $doctor_code = $doctot['refer_code'];

                }
            }

            $speciality = $this->db->where('speciality_code', $record->specialitycode)->get('speciality')->result_array();
            $spscode = '';
            foreach($speciality as $specialitycodef){ 
                $spscode = $specialitycodef['speciality_name'];
            }

            $data[] = array($i,$record->referralno,$record->referraldate,$referType,$record->patientfirstname .' '.$record->patientmiddlename.' '.$record->patientlastname , $record->mobileno, $record->emailid, $record->nationalid,$spscode, $record->xray, $record->mri, $record->ctscan, $record->ultrasound, $record->echoscan, $record->branchcode, $record->clinicalnotes, $record->labtestdetails, $record->radiologynotes, $record->otherinvestigation, $doctor_name, $doctor_number, $doctor_email, $doctor_code);
                $i++;
        }

        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );

        return $response;
      
  }else{
      return "No Raw Found!";
  }

}



}
