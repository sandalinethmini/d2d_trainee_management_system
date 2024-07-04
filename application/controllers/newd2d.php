
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
include "application/controllers/header/header_page.php";

class newd2d extends Header_page {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('newd2d_model','FormModel');
    } 
    
    public function index()
    {
        if ($this->headerMenu(11)) {
            $data = array('error' => false);
            $this->FormModel->getMachineData();
            $data['branchList'] = $this->FormModel->getBranch();
            $data['districtList'] = $this->FormModel->getDistrict();
            $data['provinceList'] = $this->FormModel->getProvince();
            
            // Get the success message from session data
            $data['success'] = $this->session->flashdata('success');
            
            $this->load->view('newd2d_view', $data);
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
            $this->form_validation->set_rules('districtInput', '', 'required', array('required' => '* District is Required'));
            $this->form_validation->set_rules('provinceInput', '', 'required', array('required' => '* Province is Required'));
            $this->form_validation->set_rules('fullNameInput', '', 'required', array('required' => '* Full Name is Required'));
            //$this->form_validation->set_rules('addressInput', '', 'required', array('required' => '* Address is Required'));
            $this->form_validation->set_rules('phoneInput', '', 'numeric|required', array('numeric' => '* Numbers Only', 'required' => '* Phone Number is Required'));
            $this->form_validation->set_rules('dateOfBirthInput', '', 'required', array('required' => '* Date of Birth is Required'));
            $this->form_validation->set_rules('nicInput', '', 'required', array('required' => '* NIC is Required'));
            $this->form_validation->set_rules('accountNumberInput', '', 'required', array('required' => '* Account Number is Required'));
            $this->form_validation->set_rules('startDateInput', '', 'required', array('required' => '* Start Date is Required'));
            $this->form_validation->set_rules('endDateInput', '', 'required', array('required' => '* End Date is Required'));
            $this->form_validation->set_rules('AL', '', 'required', array(''));
            $this->form_validation->set_rules('University', '', 'required', array(''));
            $this->form_validation->set_rules('Other', '', 'required', array(''));
            $this->form_validation->set_rules('OLCopy', '', 'required', array('required' => '* O/L Copy is Required'));
            $this->form_validation->set_rules('ALCopy', '', 'required', array('required' => '* A/L Copy is Required'));
            $this->form_validation->set_rules('universityRequestCopy', '', 'required', array('required' => '* University Request Letter is Required'));
            $this->form_validation->set_rules('NICCopy', '', 'required', array('required' => '* NIC Copy is Required'));
            $this->form_validation->set_rules('GSCopy', '', 'required', array('required' => '* GS Copy is Required'));
            
            $this->form_validation->set_error_delimiters('<span class="validationError" style="display:block">', '</span>');
            
            if ($this->form_validation->run() == FALSE) {
                $data = array('error' => true);
                $data['branchList'] = $this->FormModel->getBranch();
                $data['districtList'] = $this->FormModel->getDistrict();
                $data['provinceList'] = $this->FormModel->getProvince();
                $this->load->view('newd2d_view', $data);
            } else {
                $registrationNo = trim($this->input->post("serviceIdInput", TRUE));
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
                $al = trim($this->input->post("AL", TRUE));
                $university = trim($this->input->post("University", TRUE));
                $other = trim($this->input->post("Other", TRUE));
                $olCopy = trim($this->input->post("OLCopy", TRUE));
                $alCopy = trim($this->input->post("ALCopy", TRUE));
                $universityRequest = trim($this->input->post("universityRequestCopy", TRUE));
                $nicCopy = trim($this->input->post("NICCopy", TRUE));
                $gsCopy = trim($this->input->post("GSCopy", TRUE));
                
                $recordID = $this->FormModel->SaveRecord($fullName, $nic, $address, $phone, $province, $branch, $registrationNo, $district, $dob, $ac, $sd, $ed, $al, $university, $other, $olCopy, $alCopy, $universityRequest, $nicCopy, $gsCopy);
                
                if ($recordID) {
                    $this->session->set_flashdata('success', 'Data successfully saved.');
                } else {
                    $this->session->set_flashdata('success', 'Failed to save data.');
                }
                
                redirect('newd2d/index');
            }
        }
    }

    public function saveJob()
    {
        if ($this->headerMenu(11)) {
            $this->form_validation->set_rules('serviceIdInput', '', 'numeric|required', array('numeric' => '* Numbers Only', 'required' => '* Registration Number is Required'));
            $this->form_validation->set_rules('cmbBranchCodeInput', '', 'required', array('required' => '* Branch is Required'));
            $this->form_validation->set_rules('districtInput', '', 'required', array('required' => '* District is Required'));
            $this->form_validation->set_rules('provinceInput', '', 'required', array('required' => '* Province is Required'));
            $this->form_validation->set_rules('fullNameInput', '', 'required', array('required' => '* Full Name is Required'));
            $this->form_validation->set_rules('addressInput', '', 'required', array('required' => '* Address is Required'));
            $this->form_validation->set_rules('phoneInput', '', 'numeric|required', array('numeric' => '* Numbers Only', 'required' => '* Phone Number is Required'));
            $this->form_validation->set_rules('dateOfBirthInput', '', 'required', array('required' => '* Date of Birth is Required'));
            $this->form_validation->set_rules('nicInput', '', 'required', array('required' => '* NIC is Required'));
            $this->form_validation->set_rules('accountNumberInput', '', 'required', array('required' => '* Account Number is Required'));
            $this->form_validation->set_rules('startDateInput', '', 'required', array('required' => '* Start Date is Required'));
            $this->form_validation->set_rules('endDateInput', '', 'required', array('required' => '* End Date is Required'));
            $this->form_validation->set_rules('AL', '', 'required', array(''));
            $this->form_validation->set_rules('University', '', 'required', array(''));
            $this->form_validation->set_rules('Other', '', 'required', array(''));
            $this->form_validation->set_rules('OLCopy', '', 'required', array('required' => '* O/L Copy is Required'));
            $this->form_validation->set_rules('ALCopy', '', 'required', array('required' => '* A/L Copy is Required'));
            $this->form_validation->set_rules('universityRequestCopy', '', 'required', array('required' => '* University Request Letter is Required'));
            $this->form_validation->set_rules('NICCopy', '', 'required', array('required' => '* NIC Copy is Required'));
            $this->form_validation->set_rules('GSCopy', '', 'required', array('required' => '* GS Copy is Required'));
            
            $this->form_validation->set_error_delimiters('<span class="validationError" style="display:block">', '</span>');
            
            if ($this->form_validation->run() == FALSE) {
                $data = array('error' => true);
                $data['branchList'] = $this->FormModel->getBranch();
                $data['districtList'] = $this->FormModel->getDistrict();
                $data['provinceList'] = $this->FormModel->getProvince();
                $this->load->view('newd2d_view', $data);
            } else {
                $registrationNo = trim($this->input->post("serviceIdInput", TRUE));
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
                $al = trim($this->input->post("AL", TRUE));
                $university = trim($this->input->post("University", TRUE));
                $other = trim($this->input->post("Other", TRUE));
                $olCopy = trim($this->input->post("OLCopy", TRUE));
                $alCopy = trim($this->input->post("ALCopy", TRUE));
                $universityRequest = trim($this->input->post("universityRequestCopy", TRUE));
                $nicCopy = trim($this->input->post("NICCopy", TRUE));
                $gsCopy = trim($this->input->post("GSCopy", TRUE));
                
                $recordID = $this->FormModel->SaveRecord($fullName, $nic, $address, $phone, $province, $branch, $registrationNo, $district, $dob, $ac, $sd, $ed, $al, $university, $other, $olCopy, $alCopy, $universityRequest, $nicCopy, $gsCopy);
                
                if ($recordID) {
                    $this->session->set_flashdata('success', 'Data successfully saved.');
                } else {
                    $this->session->set_flashdata('success', 'Failed to save data.');
                }
                
                redirect('newd2d/index');
            }
        }
    }
    
    // public function viewData()
    // {
    //     $recordID = $this->session->userdata('recordID');
    //     $data['recordData'] = $this->FormModel->getEmployeeDetailsById($recordID);
    //     $this->load->view('ApplicationView', $data);
    // }
    
    // public function printApplication()
    // {
    //     $this->FormModel->printApplication();
    // }
}
