<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include "application/controllers/header/header_page.php";

class Early_disable extends Header_page {

    public function __construct() {
        parent::__construct();
        $this->load->model('early_disable_model');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index() {
        if ($this->headerMenu(12)) {
        $this->load->view('early_disable_view');
    } else {
        header('Location: ' . base_url());
    }
    }

    public function search_nic() {
        $nic = $this->input->post('nic');

        // Check if NIC exists in trainee_data table
        $trainee = $this->early_disable_model->search_nic($nic);

        if ($trainee) {
            // NIC found, update records
            $emp_reg_no = $trainee['emp_reg_no'];
            $this->early_disable_model->update_trainee_data($nic);
            $this->early_disable_model->update_registration_details($emp_reg_no);

            // Set success message
            $this->session->set_flashdata('success_message', 'Trainee disabled successfully.');
        } else {
            // NIC not found, set error message
            $this->session->set_flashdata('error_message', 'NIC not found.');
        }

        // Redirect to search view
        redirect('early_disable/index');
    }
}
