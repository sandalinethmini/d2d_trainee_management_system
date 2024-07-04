<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Check_trainee_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_trainee_by_nic($nic)
    {
        $this->db->where('emp_nic', $nic);
        $query = $this->db->get('trainee_data');
        return $query->row();
    }
}
