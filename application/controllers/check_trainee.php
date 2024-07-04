<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
include "application/controllers/header/header_page.php";

class Check_trainee extends Header_page {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('check_trainee_model');
    }

        public function index()
    {
        if ($this->headerMenu(11)) {
        $this->load->view('check_trainee_view');
    } else {
        header('Location: ' . base_url());
    }
    }

    
    public function check()
    {
        $nic = $this->input->post('nic');
        $trainee_data = $this->check_trainee_model->get_trainee_by_nic($nic);

        if ($trainee_data) {
            $today = new DateTime();
            $emp_end_date = new DateTime($trainee_data->emp_end_date);
            $diff = $today->diff($emp_end_date)->days;

            if ($diff <= 30) {
                redirect('extend_trainee');
            } else {
                redirect('newstaff');
            }
        } else {
            redirect('newstaff');
        }
    }
}
