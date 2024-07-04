<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
include "application/controllers/header/header_page.php";

class extend_trainee extends Header_page {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('extend_trainee_model');
    } 
    
    public function index()
    {
        if ($this->headerMenu(11)) {


            
            $data = array('error' => false);
            $this->extend_trainee_model->getMachineData();
            
            $data['agreements'] = $this->extend_trainee_model->get_agreements();
            
            
            $data['success'] = $this->session->flashdata('success');
            
            $this->load->view('extend_trainee_view', $data);
            $this->footerMenu();
        } else {
            header('Location: ' . base_url());
        }
    }
    
    public function saveRecord()
    {
        if ($this->headerMenu(11)) {
            $this->form_validation->set_rules('serviceIdInput', '', 'numeric|required', array('numeric' => '* Numbers Only', 'required' => '* Registration Number is Required'));
            $this->form_validation->set_rules('NICInput', '', 'numeric|required', array('numeric' => '* Numbers Only', 'required' => '* Registration Number is Required'));
            $this->form_validation->set_rules('startDateInput', '', 'required', array('required' => '* Start Date is Required'));
            $this->form_validation->set_rules('endDateInput', '', 'required', array('required' => '* End Date is Required'));
            $this->form_validation->set_rules('Type', '', 'required', array('required' => '* End Date is Required'));
            $this->form_validation->set_rules('agreements[]', '', 'required', array('required' => '* GS Copy is Required'));
            
            $this->form_validation->set_error_delimiters('<span class="validationError" style="display:block">', '</span>');
            
            if ($this->form_validation->run() == FALSE) {
                $data = array('error' => false);
                $this->extend_trainee_model->getMachineData();
                
                $data['agreements'] = $this->extend_trainee_model->get_agreements();
                
                $data['success'] = $this->session->flashdata('success');
                $this->load->view('extend_trainee_view', $data);
            } else {
                $registrationNo = trim($this->input->post("serviceIdInput", TRUE));
                $nic = trim($this->input->post("NICInput", TRUE));
                $type = trim($this->input->post("Type", TRUE));
                $sd = trim($this->input->post("startDateInput", TRUE));
                $ed = trim($this->input->post("endDateInput", TRUE));
                $agreements = $this->input->post('agreements[]');
                $recordID = $this->extend_trainee_model->SaveRecord($agreements,$registrationNo, $sd, $ed,$type, $nic);
                
            }
        }
    }
    
    }
