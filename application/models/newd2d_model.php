<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH .'third_party\fpdf\fpdf.php');
class Newd2d_model extends CI_Model {

public function __construct()
{
    parent::__construct();
    date_default_timezone_set('Asia/Colombo');	
}

public function getBranch() // Get branch drop down
{
    $this->db->select('branch_code,branch_description');
    $this->db->from('branch');
    $query=$this->db->get();
    
    $branchList = array();
    $branchList = array('' => '');
    foreach ($query->result_array() as $row) 
    {
        $branchList[$row['branch_code']] = $row['branch_code']." - ".$row['branch_description'];
    }	
    return $branchList;
} 

public function getDistrict() // Get branch drop down
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

public function getProvince() // Get branch drop down
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

// public function SaveRecord($fullName, $nic, $address, $phone, $province, $branch, $fileName, $registrationNo, $district, $dob, $ac, $sd, $ed, $al, $university, $other, $olCopy, $alCopy, $universityRequest, $nicCopy, $gsCopy)
// {
//     $data = array(
//         'emp_full_name' => $fullName,
//         'emp_nic' => $nic,
//         'emp_address' => $address,
//         'emp_phone' => $phone,
//         'emp_province' => $province,
//         'emp_branch' => $branch,
//         //'emp_image' => $fileName,
//         'emp_reg_no' => $registrationNo,
//         'emp_district' => $district,
//         'emp_dob' => $dob,
//         'emp_account_no' => $ac,
//         'emp_start_date' => $sd,
//         'emp_end_date' => $ed,
//         'emp_alevel' => $al,
//         'emp_university' => $university,
//         'emp_other' => $other,
//         'emp_ol_copy' => $olCopy,
//         'emp_al_copy' => $alCopy,
//         'emp_university_request' => $universityRequest,
//         'emp_nic_copy' => $nicCopy,
//         'emp_gs_copy' => $gsCopy,
//         'emp_enter_time' => date("Y-m-d G:i:s"),
//         'emp_ip' => $_SERVER['REMOTE_ADDR'],
//         'emp_browser' => $this->agent->browser()." ".$this->agent->version(),
//         'emp_platform' => $this->agent->platform()
//     );
//     $this->db->insert('trainee_data', $data);
//     $recordID = $this->db->insert_id();

//     $data = array('emp_reference' => $recordID."_".$registrationNo);	
//     $this->db->where('emp_id', $recordID);
//     $this->db->update('trainee_data', $data);

//     $session_data = array('recordID' => $recordID);				
//     $this->session->set_userdata($session_data);
// }

public function SaveRecord($fullName,$nameWithInitials, $current_position,$farther_employer,$epf_no,$farther_address,$mother_employer,$farther_name,$partner_full_name,$mother_address,$mother_name,$service_years,$phone_no,$position,$employer_address,$employer_name, $current_employer, $nic,$residence_years,$experience,$ol,$gender,$village_officer_division,$marital_status,$divisioanal_secretariat_division,$phone_no_home,$phone_no_mobile, $permanent_address, $phone, $province, $branch, $registrationNo, $district, $dob, $ac, $sd, $ed, $al, $university, $other, $olCopy, $alCopy, $universityRequest, $nicCopy, $gsCopy)
{
    $data = array(
        'full_name' => $fullName,
        'name_with_initials' => $nameWithInitials,
        'nic' => $nic,
        'dob' => $dob,
        'gender' =>$gender,
        'marital_status' => $marital_status,
        'permanent_address' => $permanent_address,
        'phone_no_mobile' => $phone_no_mobile,
        'phone_no_home' => $phone_no_home,
        'divisioanal_secretariat_division' => $divisioanal_secretariat_division,
        'village_officer_division' => $village_officer_division,
        'residence_years' => $residence_years,
        'al' => $al,
        'ol' => $ol,
        'other' => $other,
        'experience' => $experience,
        'current_position' => $current_position,
        'current_employer' => $current_employer,
        'partner_full_name' => $partner_full_name,
        'employer_name' => $employer_name,
        'service_years' => $service_years,
        'employer_address' => $employer_address,
        'position' => $position,
        'phone_no' => $phone_no,
        'mother_name' => $mother_name,
        'mother_address'=> $mother_address,
        'mother_employer' => $mother_employer,
        'farther_name' => $farther_name,
        'farther_address' => $farther_address,
        'farther_employer' => $farther_employer,
        'province' => $province,
        'branch' => $branch,
        
        
        'district' => $district,
       
        'epf_no'=>$epf_no,
        'start_date' => $sd,
        'end_date' => $ed,
        
        'ol_copy' => $olCopy,
        'al_copy' => $alCopy,
        
        'nic_copy' => $nicCopy,
        'gs_copy' => $gsCopy,
        'enter_time' => date("Y-m-d G:i:s"),
        'ip' => $_SERVER['REMOTE_ADDR'],
        'browser' => $this->agent->browser()." ".$this->agent->version(),
        'platform' => $this->agent->platform()
    );
    $inserted = $this->db->insert('d2d_data', $data);
    if ($inserted) {
        $recordID = $this->db->insert_id();
        $reference = $recordID."_".$registrationNo;
        $this->db->where('id', $recordID);
        $this->db->update('d2d_data', array('reference' => $reference));
        $this->session->set_userdata('recordID', $recordID);
        return $recordID;
    } else {
        return false; // Insertion failed
    }
}

public function saveJob($job){
    $data = array(
        'time_range' => $job[time_range],
        'employer_name' => $job[employer_name],
        'position' => $job[position],
        'no_of_years' => $job[no_of_years],
        'reason_to_resign'=> $job[reason_to_resign]
    );
    $inserted = $this->db->insert('job_details', $data);
    if ($inserted) {
        $recordID = $this->db->insert_id();
        $reference = $recordID;
        $this->db->where('id', $recordID);
        $this->db->update('job_details', array('reference' => $reference));
        $this->session->set_userdata('recordID', $recordID);
        return $recordID;
    } else {
        return false; // Insertion failed
    }
}

public function getEmployeeDetailsById($recordId) 
{
    $this->db->select("emp_reg_no,
                       emp_full_name,
                       emp_nic,
                       emp_address,
                       emp_phone,
                       emp_province,
                       emp_branch,
                       
                       emp_district,
                       emp_dob,
                       emp_account_no,
                       emp_start_date,
                       emp_end_date,
                       emp_alevel,
                       emp_university,
                       emp_other,
                       emp_ol_copy,
                       emp_al_copy,
                       emp_university_request,
                       emp_nic_copy,
                       emp_gs_copy");
    $this->db->from('trainee_data');
    $this->db->where('emp_id', $recordId);
    
    $query = $this->db->get();
    return $query->row();
}


}
