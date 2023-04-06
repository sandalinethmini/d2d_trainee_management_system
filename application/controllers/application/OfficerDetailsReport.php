<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include "application/controllers/header/Header_page.php";

class OfficerDetailsReport extends Header_page {
	public function __construct()
	{		
		parent::__construct();
		$this->load->model('application/OfficerDetailsReportModel','OfficerDetailsReportModel');
	}
	 
	public function index()
	{
		if($this->headerMenu(10))
		{
			//$data['branchCodeList'] =	$this->OfficerDetailsReportModel->getBranch();
			//$data['officerList'] 	=	$this->OfficerDetailsReportModel->getOfficer();
			$data['districtList'] 	=	$this->OfficerDetailsReportModel->getDistrict();
			
       		$this->load->view('application/OfficerDetailsReportView',$data);
			$this->footerMenu();
		}
		else
			header( 'Location: '.base_url() ) ;		
	}
	
	public function getOfficerDetails()
	{
		$this->form_validation->set_rules('cmbDistrict', '', 'required',array('required' => '* District is Required'));
		//$this->form_validation->set_rules('txtendDate', '', 'required',array('required' => '* End Date is Required '));
		/*$this->form_validation->set_rules('cmbProvider', '', 'required',array('required' => '*Please Select Provider '));
		$this->form_validation->set_rules('cmbCategory', '', 'required',array('required' => '* Please Pick Down Date & Time '));*/

		$this->form_validation->set_error_delimiters('<span  class="invalid-feedback" style="display:block">', '</span>');
		
		if ($this->form_validation->run() == FALSE) 
		{
            if($this->headerMenu(10))
            {
				$data['districtList'] 	=	$this->OfficerDetailsReportModel->getDistrict();
						
			   	$this->load->view('application/OfficerDetailsReportView',$data);
				$this->footerMenu();
            }
            else
            {
                $this->session->set_flashdata('fail', 'Session Expired or Access Denined.');
            }
        } 
		else 
		{
			if($this->headerMenu(10))
			{
				$district	=	$this->input->post("cmbDistrict", TRUE);
				//$branch  	=	$this->input->post("cmbBranch", TRUE);
				//$officer  	=	$this->input->post("cmbOfficer", TRUE);
				
				//$jobDownTime	=	$this->input->post("txtJobDownTime", TRUE);
				
				$this->OfficerDetailsReportModel->getOfficerDetails($district);
				
				
			}	
		}		
	}
}
