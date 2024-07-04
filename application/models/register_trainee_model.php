<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register_trainee_model extends CI_Model {

  public function get_pending_registrations($search = '', $start = 0, $length = 10, $order_column = 0, $order_dir = 'asc') {
    $this->db->select('td.emp_nic, td.emp_full_name, td.emp_reg_no, d.district_description, b.branch_description, p.province_description')
             ->from('trainee_data td')
             ->join('registration_details rd', 'td.emp_nic = rd.nic AND td.emp_reg_no = rd.registration_no')
             ->join('district d', 'td.emp_district = d.district_code', 'left')
             ->join('branch b', 'td.emp_branch = b.branch_code', 'left')
             ->join('province p', 'td.emp_province = p.province_code', 'left')
             ->where('rd.registration_no', 'pending');

    if (!empty($search)) {
      $this->db->group_start()
               ->like('td.emp_full_name', $search)
               ->or_like('td.emp_nic', $search)
               ->group_end();
    }

    $order_columns = array('td.emp_nic', 'td.emp_full_name', 'td.emp_reg_no');
    $this->db->order_by($order_columns[$order_column], $order_dir);

    if ($length != -1) {
      $this->db->limit($length, $start);
    }

    $query = $this->db->get();
    return $query->result_array();
  }

  public function count_all_pending() {
    $this->db->select('td.emp_nic')
             ->from('trainee_data td')
             ->join('registration_details rd', 'td.emp_nic = rd.nic AND td.emp_reg_no = rd.registration_no')
             ->where('rd.registration_no', 'pending');
    return $this->db->count_all_results();
  }

  public function count_filtered_pending($search = '') {
    $this->db->select('td.emp_nic')
             ->from('trainee_data td')
             ->join('registration_details rd', 'td.emp_nic = rd.nic AND td.emp_reg_no = rd.registration_no')
             ->where('rd.registration_no', 'pending');

    if (!empty($search)) {
      $this->db->group_start()
               ->like('td.emp_full_name', $search)
               ->or_like('td.emp_nic', $search)
               ->group_end();
    }

    return $this->db->count_all_results();
  }

  public function update_registration_number($emp_nic, $new_reg_no) {
    $this->db->trans_begin();

    // Update trainee data
    $this->db->set('emp_reg_no', $new_reg_no)
             ->where('emp_nic', $emp_nic)
             ->update('trainee_data');

    // Update registration details
    $this->db->set('registration_no', $new_reg_no)
             ->where('nic', $emp_nic)
             ->update('registration_details');

    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      $this->session->set_flashdata('fail', 'Data Not Saved. Try Again');
      header('Location: ' . base_url("index.php/register_trainee"));
    } else {
      $this->db->trans_commit();
      $this->session->set_flashdata('success', 'Trainee Successfully Registered');
      header('Location: ' . base_url("index.php/register_trainee"));
    }
  }

  public function get_trainee_details($emp_nic) {
    $this->db->select('td.emp_nic, td.emp_full_name, td.emp_reg_no, d.district_description, b.branch_description, p.province_description')
             ->from('trainee_data td')
             ->join('district d', 'td.emp_district = d.district_code', 'left')
             ->join('branch b', 'td.emp_branch = b.branch_code', 'left')
             ->join('province p', 'td.emp_province = p.province_code', 'left')
             ->where('td.emp_nic', $emp_nic);
             
    $query = $this->db->get();
    return $query->row_array();
  }
}
