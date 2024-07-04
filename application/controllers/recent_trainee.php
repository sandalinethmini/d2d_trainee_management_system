<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include "application/controllers/header/header_page.php";

class Recent_trainee extends Header_page {

    public function __construct() {
        parent::__construct();
        $this->load->model('recent_trainee_model');
    }

    public function index() {
        if ($this->headerMenu(11)) {
            $this->load->view('recent_trainee_view');
            $this->footerMenu();
        } else {
            header('Location: ' . base_url());
        }
    }

    public function fetch_trainees() {
        $search = $this->input->post('search')['value'];
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $order = $this->input->post('order')[0];
        $order_column = $order['column'];
        $order_dir = $order['dir'];

        $trainees = $this->recent_trainee_model->get_all_trainees($search, $start, $length, $order_column, $order_dir);
        $total_records = $this->recent_trainee_model->count_all_trainees();
        $filtered_records = $this->recent_trainee_model->count_filtered_trainees($search);

        $data = array();
        $no = $start + 1;
        foreach ($trainees as $trainee) {
            $row = array();
            $row[] = $no++;
            $row[] = $trainee['emp_nic'];
            $row[] = $trainee['branch_description'];
            $row[] = $trainee['district_description'];
            $row[] = $trainee['emp_full_name'];
            $row[] = $trainee['emp_reg_no'];
            $row[] = $trainee['start_date'];
            $row[] = $trainee['end_date'];
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $total_records,
            "recordsFiltered" => $filtered_records,
            "data" => $data,
        );
        echo json_encode($output);
    }
}
?>
