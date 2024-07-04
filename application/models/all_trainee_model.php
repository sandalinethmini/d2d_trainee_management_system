<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class All_trainee_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Colombo');
    }

    public function get_datatables($fromDate, $toDate, $branch = null, $district = null, $province = null) {
        $this->db->select('td.*, d.district_description, p.province_description, b.branch_description, rd.start_date, rd.end_date');
        $this->db->from('trainee_data as td');
        $this->db->join('district as d', 'td.emp_district = d.district_code', 'left');
        $this->db->join('province as p', 'td.emp_province = p.province_code', 'left');
        $this->db->join('registration_details as rd', 'td.emp_nic = rd.nic', 'left');
        $this->db->join('branch as b', 'td.emp_branch = b.branch_code', 'left');
        
        if ($fromDate == $toDate) {
            $this->db->where("DATE(td.emp_end_date)", $fromDate);
        } else {
            $this->db->where("td.emp_end_date BETWEEN '" . $fromDate . "' AND '" . $toDate . "'");
        }
        
        if ($branch) {
            $this->db->where("td.emp_branch", $branch);
        }
        if ($district) {
            $this->db->where("td.emp_district", $district);
        }
        if ($province) {
            $this->db->where("td.emp_province", $province);
        }

        $this->db->order_by('td.emp_end_date', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
}
