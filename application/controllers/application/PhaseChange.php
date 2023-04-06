<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include "application/controllers/header/Header_page.php";

class PhaseChange extends Header_page {
	public function __construct()
	{		
		parent::__construct();
		$this->load->model('application/PhaseChangeModel','PhaseChange');
	}
	 
	public function index()
	{
		if($this->headerMenu(2))
		{
			$data = array('form_valid' => false);
       		$this->load->view('application/PhaseChangeView',$data);
			$this->footerMenu();
		}
		else
			header( 'Location: '.base_url() ) ;		
	}
	
	
	
	
	
	public function saveRecord()
	{		

		$this->form_validation->set_rules('txtAccount', '', 'required|numeric|exact_length[10]',array('numeric' => '* Numbers Only','exact_length' => '* Only 10 Numbers'));
		$this->form_validation->set_rules('txtCustomerName', '', 'required|max_length[50]|alpha_dot_spaces',array('required' => '* Required Field','alpha_dot_spaces' => '* Characters and Only','max_length' => '* 50 Charaters Only'));
		$this->form_validation->set_rules('txtOwnerName', '', 'required|max_length[50]|alpha_dot_spaces',array('required' => '* Required Field','alpha_dot_spaces' => '* Characters and Only','max_length' => '* 50 Charaters Only'));
		$this->form_validation->set_rules('txtMobileNo', '', 'numeric|exact_length[10]',array('numeric' => '* Numbers Only','exact_length' => '* Only 10 Numbers'));
		$this->form_validation->set_rules('txtPhoneNo', '', 'numeric|exact_length[10]',array('numeric' => '* Numbers Only','exact_length' => '* Only 10 Numbers'));
		$this->form_validation->set_rules('txtNIC', '', 'min_length[10]|max_length[12]',array('min_length' => '* Old NIC No required 10 Characters','max_length' => '* New NIC No required 12 Characters'));
		$this->form_validation->set_rules('cmbNewSupply', '', 'required',array('required' => '* Requested Supply is Required'));
		$this->form_validation->set_rules('cmbCurrentSupply', '', 'required',array('required' => '* Current Supply is Required'));
		$this->form_validation->set_error_delimiters('<span  class="invalid-feedback" style="display:block">', '</span>');
		
		
		if ($this->form_validation->run() == FALSE) 
		{
            if($this->headerMenu(2))
            {
			 	$data = array('form_valid' => false);
			   	$this->load->view('application/PhaseChangeView',$data);
				$this->footerMenu();
            }
            else
            {
                $this->session->set_flashdata('fail', 'Session Expired or Access Denined.');
                header( 'Location: '.base_url() ) ;
            }
        } 
		else 
		{
			 if($this->headerMenu(2))
            {
			 	$data = array('form_valid' => true);
			   	$this->load->view('application/PhaseChangeView',$data);
				$this->footerMenu();
            }
            else
            {
                $this->session->set_flashdata('fail', 'Session Expired or Access Denined.');
                header( 'Location: '.base_url() ) ;
            }
		}			
			
	}
	
	public function printApplication()
	{
		$customerName	=	$this->input->post("txtCustomerName", TRUE);
		$nic			=	$this->input->post("txtNIC", TRUE);
		$account		=	$this->input->post("txtAccount", TRUE);
		$ownerName		=	$this->input->post("txtOwnerName", TRUE);
		$address		=	$this->input->post("txtPemAddress1", TRUE);

		$mobileNo		=	trim($this->input->post("txtMobileNo", TRUE));
		$phoneNo		=	trim($this->input->post("txtPhoneNo", TRUE));
		
		$currentPhase		=	trim($this->input->post("cmbCurrentSupply", TRUE));
		$newPhase		=	trim($this->input->post("cmbNewSupply", TRUE));
		

		$this->PhaseChange->print_application($customerName,$nic,$account,$ownerName,$address,$mobileNo,$phoneNo,$currentPhase,$newPhase);
	}
		
}
