<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Commen_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_branches() {
        $query = $this->db->get('branch');
        return $query->result();
    }

    public function get_branches_by_district($district_code) {
        $query = $this->db->get_where('branch', array('district_code' => $district_code));
        return $query->result();
    }

    public function get_districts() {
        $query = $this->db->get('district');
        return $query->result();
    }

    public function get_districts_by_province($province_code) {
        $query = $this->db->get_where('district', array('province_code' => $province_code));
        return $query->result();
    }

    public function get_provinces() {
        $query = $this->db->get('province');
        return $query->result();
    }

    public function get_province_by_code($province_code) {
        $query = $this->db->get_where('province', array('province_code' => $province_code));
        return $query->row();
    }

    
}
