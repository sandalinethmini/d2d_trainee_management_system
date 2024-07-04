<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH .'third_party\fpdf\fpdf.php');
class Newstaff_model extends CI_Model {

public function __construct()
{
    parent::__construct();
    date_default_timezone_set('Asia/Colombo');	
}

public function getBranch()
{
    $this->db->select('branch_code,branch_description');
    $this->db->from('branch');

    $this->db->where('province_code',$this->session->userdata('province_code'));
    $this->db->where('branch_code',$this->session->userdata('branch_code'));

    $query=$this->db->get();
    
    $branchList = array();
    $branchList = array('' => '');
    foreach ($query->result_array() as $row) 
    {
        $branchList[$row['branch_code']] = $row['branch_code']." - ".$row['branch_description'];
    }	
    return $branchList;
} 

public function getAllocationLimitByType($type,$province)
{
    $this->db->select('number_allocated');
    $this->db->from('province_allocation');
    $this->db->where('trainee_type', $type);
    $this->db->where('province_code', $this->session->userdata('province_code'));
    $query = $this->db->get();
    return $query->row();
}

public function getAllocatedTraineesByType($type,$province)
{
    
    $this->db->select('COUNT(*) as num_allocated');
    $this->db->from('trainee_data');
    $this->db->join('registration_details', 'registration_details.nic = trainee_data.emp_nic', 'left');
    $this->db->where('registration_details.trainee_type', $type);
    $this->db->where('registration_details.end_date >', date('Y-m-d'));
    $this->db->where('emp_province', $this->session->userdata('province_code'));
    $query = $this->db->get();
    return $query->row();
}

public function getDistrict()
{
    $this->db->select('district_code,district_description');
    $this->db->from('district');
    $this->db->order_by('district_order','asc');
    $query=$this->db->get();
    
    $provinceList = array();
    $provinceList = array('' => '');
    
    foreach ($query->result_array() as $row) 
    {
        $provinceList[$row['district_code']] = $row['district_description'];
    }	
    return $provinceList;
} 

public function getProvince()
{
    $this->db->select('province_code,province_description');
    $this->db->from('province');
    $this->db->order_by('province_order','asc');
    $query=$this->db->get();
    
    $provinceList = array();
    $provinceList = array('' => '');
    
    foreach ($query->result_array() as $row) 
    {
        $provinceList[$row['province_code']] = $row['province_description'];
    }	
    return $provinceList;
}

public function get_options() {
    $query = $this->db->get('tr_document');
    return $query->result_array();
}

public function get_educations() {
    $query = $this->db->get('tr_education');
    return $query->result_array();
}

public function getMachineData()
{
    $data = array(
        'access_time' => date("Y-m-d G:i:s"),
        'ip_address' => $_SERVER['REMOTE_ADDR'],
        'browser' => $this->agent->browser()." ".$this->agent->version(),
        'os' => $this->agent->platform(),
        'machine_name' => gethostbyaddr($_SERVER['REMOTE_ADDR'])
    );
    $this->db->insert('user_data', $data);
}



public function SaveRecord($type,$educations, $options, $fullName, $nic, $address, $phone, $province, $branch, $registrationNo, $district, $dob, $ac, $sd, $ed)
{
    $this->db->trans_begin();

    
    $data = array(
        'emp_full_name' => $fullName,
        'emp_nic' => $nic,
        'emp_address' => $address,
        'emp_phone' => $phone,
        'emp_province' => $this->session->userdata('province_code'),
        'emp_branch' => $branch,

        'emp_reg_no' => $registrationNo,
        'emp_district' => $district,
        'emp_dob' => $dob,
        'emp_account_no' => $ac,
        'emp_start_date' => $sd,
        'emp_end_date' => $ed,
        'emp_enter_time' => date("Y-m-d G:i:s"),
        'emp_ip' => $_SERVER['REMOTE_ADDR'],
        'emp_browser' => $this->agent->browser()." ".$this->agent->version(),
        'emp_platform' => $this->agent->platform()
    );
    $this->db->insert('trainee_data', $data);
    $recordID = $this->db->insert_id();

    
    $registrationData = array(
       // 'registration_no' => $registrationNo,
        'start_date' => $sd,
        'end_date' => $ed,
        'registration_no'=>'pending',
        'nic'=> $nic,
        'trainee_type' => $type
    );
    $this->db->insert('registration_details', $registrationData);

   
    foreach ($options as $option) {
        if (!empty($option)) {
            $documentData = array(
                'user_document_id' => $recordID,
                'user_document_name' => $option
            );
            $this->db->insert('tr_user_document', $documentData);
        }
    }

    
    foreach ($educations as $education) {
        if (!empty($education)) {
            $educationData = array(
                'user_education_id' => $recordID,
                'user_education_name' => $education
            );
            $this->db->insert('tr_user_education', $educationData);
        }
    }

    if ($this->db->trans_status() === FALSE)
    {
            $this->db->trans_rollback();
            $this->session->set_flashdata('fail', 'Data Not Saved. Try Again');
            header( 'Location: '.base_url("index.php/newstaff") ) ;
    }
    else
    {
        $this->db->trans_commit();
        $this->session->set_flashdata('success', 'Data Successfully Updated');
        header( 'Location: '.base_url("index.php/newstaff") ) ;
    }
}

// public function checkAllocation($type,$province)
// {
//     $type = $this->input->post('Type');
    
//     // Fetch province from session
//     $province = $this->session->userdata('province_code');

//     // Get allocation limit for the given type from the model
//     $allocationLimit = $this->FormModel->getAllocationLimitByType($type, $province);
//     $allocatedTrainees = $this->FormModel->getAllocatedTraineesByType($type, $province);

//     // Check if adding another trainee exceeds the limit
//     if ($allocatedTrainees > $allocationLimit) {
//         echo json_encode(array('error' => true, 'message' => 'Allocation limit exceeded for this type in ' . $province));
//     } else {
//         echo json_encode(array('error' => false));
//     }
//     exit;
// }


}
