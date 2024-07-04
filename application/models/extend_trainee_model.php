<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH .'third_party\fpdf\fpdf.php');
class Extend_trainee_model extends CI_Model {

public function __construct()
{
    parent::__construct();
    date_default_timezone_set('Asia/Colombo');	
}
public function get_agreements() {
    $query = $this->db->get('tr_agreement');
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


// In Newstaff_model.php

public function getDistrictsByProvince($provinceCode)
{
    $this->db->select('district_code, district_description');
    $this->db->from('district');
    $this->db->where('province_code', $provinceCode);
    $this->db->order_by('district_order', 'asc');
    $query = $this->db->get();

    $districtList = array();
    foreach ($query->result_array() as $row) {
        $districtList[$row['district_code']] = $row['district_description'];
    }

    return $districtList;
}



public function SaveRecord($agreements,$registrationNo, $sd, $ed,$type, $nic)
{
    $this->db->trans_begin();
    $data = array(
        
        'registration_no' => $registrationNo,
        'nic' => $nic,
        'trainee_type' => $type,
        'start_date' => $sd,
        'end_date' => $ed,
    );
   $this->db->insert('registration_details', $data);
    $recordID = $this->db->insert_id();
    

        $i = 0;
		while($agreements[$i]!="")
		{
			$data = array(
            'user_agreement_id' => $recordID,
            
            'user_agreement_name' => ($agreements[$i])
        );
			$this->db->insert('tr_user_agreement', $data);
			
			$i++;
			
		

        if ($this->db->trans_status() === FALSE)
        {
                $this->db->trans_rollback();
                $this->session->set_flashdata('fail', 'Data Not Saved. Try Again');
                header( 'Location: '.base_url("index.php/extend_trainee") ) ;
        }
        else
        {
            $this->db->trans_commit();
            $this->session->set_flashdata('success', 'Data Successfully Updated');
            header( 'Location: '.base_url("index.php/extend_trainee") ) ;
        }
    }
}






}
