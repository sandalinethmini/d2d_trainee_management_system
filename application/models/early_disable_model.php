<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Early_disable_model extends CI_Model {

    public function search_nic($nic) {
        $this->db->where('emp_nic', $nic);
        return $this->db->get('trainee_data')->row_array();
    }

    public function update_trainee_data($nic) {
        $this->db->where('emp_nic', $nic);
        $this->db->update('trainee_data', ['emp_end_date' => date('Y-m-d')]);

        return $this->db->affected_rows();
    }

    public function update_registration_details($emp_reg_no) {
        $this->db->where('registration_no', $emp_reg_no);
        $this->db->update('registration_details', ['end_date' => date('Y-m-d')]);

        return $this->db->affected_rows();
    }
}

