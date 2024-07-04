<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH .'third_party/fpdf/fpdf.php');

class Trainee_pdf_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Colombo');
    }

    function printReport($selectedNIC) {
        // First Query
        $this->db->select('trainee_data.*, branch.branch_description, tr_document.document_name, province.province_description, district.district_description');
        $this->db->from('trainee_data');
        $this->db->join('branch', 'trainee_data.emp_branch = branch.branch_code', 'left');
        $this->db->join('tr_document', 'trainee_data.emp_id = tr_document.document_id', 'left');
        $this->db->join('province', 'trainee_data.emp_province = province.province_code', 'left');
        $this->db->join('district', 'trainee_data.emp_district = district.district_code', 'left');
        $this->db->join('tr_user_education', 'trainee_data.emp_id = tr_user_education.user_education_id', 'left');
        $this->db->where('trainee_data.emp_nic', $selectedNIC);
        $query1 = $this->db->get();

        // Check if the first query returned any results
        if ($query1->num_rows() > 0) {
            $results1 = $query1->result();
            // Extract the emp_id from the first result
            $emp_id = $results1[0]->emp_id;

            // Second Query using the emp_id from the first query
            $this->db->select('tr_education.education_name, tr_user_education.*');
            $this->db->from('tr_user_education');
            $this->db->join('tr_education', 'tr_education.education_id = tr_user_education.user_education_name', 'inner');
            $this->db->where('tr_user_education.user_education_id', $emp_id);
            $query2 = $this->db->get();

            // Third Query using the emp_id from the first query
            $this->db->select('tr_document.document_name, tr_user_document.*');
            $this->db->from('tr_user_document');
            $this->db->join('tr_document', 'tr_document.document_id = tr_user_document.user_document_name', 'inner');
            $this->db->where('tr_user_document.user_document_id', $emp_id);
            $query3 = $this->db->get();

            // Fourth Query using the selectedNIC from the first query
            $this->db->select('registration_details.*');
            $this->db->from('registration_details');
            $this->db->join('trainee_data', 'trainee_data.emp_reg_no = registration_details.registration_no', 'inner');
            $this->db->where('trainee_data.emp_nic', $selectedNIC);
            $query4 = $this->db->get();

            // Combine all results if needed or return as separate arrays/objects
            $results2 = ($query2->num_rows() > 0) ? $query2->result() : array();
            $results3 = ($query3->num_rows() > 0) ? $query3->result() : array();
            $results4 = ($query4->num_rows() > 0) ? $query4->result() : array();

            return array(
                'trainee_data' => $results1,
                'education_data' => $results2,
                'document_data' => $results3,
                'registration_data' => $results4
            );
        } else {
            return array(
                'trainee_data' => array(),
                'education_data' => array(),
                'document_data' => array(),
                'registration_data' => array()
            );
        }
    }
}
?>
