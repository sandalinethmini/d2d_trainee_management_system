<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
include "application/controllers/header/header_page.php";

class Newstaff extends Header_page {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('newstaff_model','FormModel');
    } 
    
    public function index()
    {
        if ($this->headerMenu(11)) {


            
            $data = array('error' => false);
            $this->FormModel->getMachineData();
            $data['branchList'] = $this->FormModel->getBranch();
            $data['districtList'] = $this->FormModel->getDistrict();
            $data['provinceList'] = $this->FormModel->getProvince();
            $data['options'] = $this->FormModel->get_options();
            $data['educations'] = $this->FormModel->get_educations();
            
            // Get the success message from session data
            $data['success'] = $this->session->flashdata('success');
            
            $this->load->view('newstaff_view', $data);
            $this->footerMenu();
        } else {
            header('Location: ' . base_url());
        }
    }
    public function saveRecord()
    {
        if ($this->headerMenu(11)) {
           // $this->form_validation->set_rules('serviceIdInput', '', 'numeric|required', array('numeric' => '* Numbers Only', 'required' => '* Registration Number is Required'));
            $this->form_validation->set_rules('cmbBranchCodeInput', '', 'required', array('required' => '* Branch is Required'));
            //$this->form_validation->set_rules('districtInput', '', 'required', array('required' => '* District is Required'));
            //$this->form_validation->set_rules('provinceInput', '', 'required', array('required' => '* Province is Required'));
            $this->form_validation->set_rules('fullNameInput', '', 'required', array('required' => '* Full Name is Required'));
            $this->form_validation->set_rules('addressInput', '', 'required', array('required' => '* Address is Required'));
            $this->form_validation->set_rules('phoneInput', '', 'numeric|required', array('numeric' => '* Numbers Only', 'required' => '* Phone Number is Required'));
            $this->form_validation->set_rules('dateOfBirthInput', '', 'required', array('required' => '* Date of Birth is Required'));
            $this->form_validation->set_rules('nicInput', '', 'required', array('required' => '* NIC is Required'));
            $this->form_validation->set_rules('accountNumberInput', '', 'required', array('required' => '* Account Number is Required'));
            $this->form_validation->set_rules('startDateInput', '', 'required', array('required' => '* Start Date is Required'));
            $this->form_validation->set_rules('endDateInput', '', 'required', array('required' => '* End Date is Required'));
            $this->form_validation->set_rules('Type', '', 'required', array('required' => '* End Date is Required'));
            $this->form_validation->set_rules('educations[]', '', 'required', array('required' => '* GS Copy is Required'));
            $this->form_validation->set_rules('options[]', '', 'required', array('required' => '* GS Copy is Required'));
            $this->form_validation->set_error_delimiters('<span class="validationError" style="display:block">', '</span>');
            
            if ($this->form_validation->run() == FALSE) {
                $data = array('error' => false);
                $this->FormModel->getMachineData();
                $data['branchList'] = $this->FormModel->getBranch();
                $data['districtList'] = $this->FormModel->getDistrict();
                $data['provinceList'] = $this->FormModel->getProvince();
                $data['options'] = $this->FormModel->get_options();
                $data['educations'] = $this->FormModel->get_educations();
                
                // Get the success message from session data
                $data['success'] = $this->session->flashdata('success');
                $this->load->view('newstaff_view', $data);
            } else {
                $registrationNo = trim("pending");
                $branch = trim($this->input->post("cmbBranchCodeInput", TRUE));
                $district = trim($this->input->post("districtInput", TRUE));
                $province = trim($this->input->post("provinceInput", TRUE));
                $fullName = trim($this->input->post("fullNameInput", TRUE));
                $address = trim($this->input->post("addressInput", TRUE));
                $phone = trim($this->input->post("phoneInput", TRUE));
                $dob = trim($this->input->post("dateOfBirthInput", TRUE));
                $nic = trim($this->input->post("nicInput", TRUE));
                $ac = trim($this->input->post("accountNumberInput", TRUE));
                $sd = trim($this->input->post("startDateInput", TRUE));
                $ed = trim($this->input->post("endDateInput", TRUE));
                $type = trim($this->input->post("Type", TRUE));
                $options = $this->input->post('options[]', TRUE);
                $educations = $this->input->post('educations[]' , TRUE);
                
                $recordID = $this->FormModel->SaveRecord($type,$educations,$options,$fullName, $nic, $address, $phone, $province, $branch, $registrationNo, $district, $dob, $ac, $sd, $ed);  

    //             $type = $this->input->post('Type');
    
    // // Fetch province from session
    // $province = $this->session->userdata('province_code');

    // // Get allocation limit for the given type from the model
    // $allocationLimit = $this->FormModel->getAllocationLimitByType($type,$province);
    // $allocatedTrainees = $this->FormModel->getAllocatedTraineesByType($type,$province);

    // // Check if adding another trainee exceeds the limit
    // if ($allocatedTrainees > $allocationLimit) {
    //     echo json_encode(array('error' => true, 'message' => 'Allocation limit exceeded for this type in ' ));
    // } else {
    //     echo json_encode(array('error' => false));
    // }
    // exit;
            }
        }
    }

    public function checkAllocation()
{
    $type = $this->input->post('Type');
    
    // Fetch province from session
    $province = $this->session->userdata('province_code');

    // Get allocation limit for the given type from the model
    $allocationLimit = $this->FormModel->getAllocationLimitByType($type, $province);
    $allocatedTrainees = $this->FormModel->getAllocatedTraineesByType($type, $province);

    // Check if adding another trainee exceeds the limit
    if ($allocatedTrainees >= $allocationLimit) {
        echo json_encode(array('error' => true, 'message' => 'Allocation limit exceeded for this type in ' . $province));
    } else {
        echo json_encode(array('error' => false, 'message' => 'Allocation limit not exceeded for this type in ' . $province));
    }
    exit;
}

    
    }
