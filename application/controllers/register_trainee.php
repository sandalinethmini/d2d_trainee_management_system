<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include "application/controllers/header/header_page.php";

class Register_trainee extends Header_page {

  public function __construct() {
    parent::__construct();
    $this->load->model('register_trainee_model');
  }

  public function index() {
    if ($this->headerMenu(11)) {
      $this->load->view('register_trainee_view');
      $this->footerMenu();
    } else {
      header('Location: ' . base_url());
    }
  }

  public function fetch_pending_registrations() {
    $search = $this->input->post('search')['value'];
    $start = $this->input->post('start');
    $length = $this->input->post('length');
    $order = $this->input->post('order')[0];
    $order_column = $order['column'];
    $order_dir = $order['dir'];

    $pending_trainees = $this->register_trainee_model->get_pending_registrations($search, $start, $length, $order_column, $order_dir);
    $total_records = $this->register_trainee_model->count_all_pending();
    $filtered_records = $this->register_trainee_model->count_filtered_pending($search);

    $data = array();
    $no = $start + 1;
    foreach ($pending_trainees as $trainee) {
      $data[] = array(
        '' => $no++,
        'emp_nic' => $trainee['emp_nic'],
        'emp_full_name' => $trainee['emp_full_name'],
        'emp_reg_no' => $trainee['emp_reg_no'],
        
        'branch_description' => $trainee['branch_description'],
        'district_description' => $trainee['district_description'],
        'province_description' => $trainee['province_description']
      );
    }

    $output = array(
      "draw" => $_POST['draw'],
      "recordsTotal" => $total_records,
      "recordsFiltered" => $filtered_records,
      "data" => $data,
    );

    echo json_encode($output);
  }

  public function update_registration($emp_nic) {
    $this->form_validation->set_rules('new_registration_no', 'Registration Number', 'trim|required');

    if ($this->form_validation->run() === TRUE) {
      $new_reg_no = $this->input->post('new_registration_no');
      $this->register_trainee_model->update_registration_number($emp_nic, $new_reg_no);
      redirect('register_trainee');
    } else {
      $data['pending_trainees'] = $this->register_trainee_model->get_pending_registrations();
      $this->load->view('register_trainee_view', $data);
    }
  }

  public function get_trainee_details($emp_nic) {
    $data = $this->register_trainee_model->get_trainee_details($emp_nic);
    echo json_encode($data);
  }
}
