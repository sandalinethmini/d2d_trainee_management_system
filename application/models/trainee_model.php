<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class trainee_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function checkTraineeExists($nic) {
        $this->db->where('nic', $nic);
        $query = $this->db->get('employee');
        return $query->num_rows() > 0;
    }
}
?>
