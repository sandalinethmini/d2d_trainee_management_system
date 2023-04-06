<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include "application/controllers/header/Header_page.php";

class JobReports extends Header_page {
	public function __construct()
	{		
		parent::__construct();
		$this->load->model('application/JobReportsModel','JobReportsModel');
	}
	 
	public function index()
	{
		if($this->headerMenu(6))
		{
			$data['branchCodeList'] =	$this->JobReportsModel->getBranch();
			$data['providerList'] 	=	$this->JobReportsModel->getProvider();
			$data['categoryList'] 	=	$this->JobReportsModel->getCategory();
			
       		$this->load->view('application/JobReportsView',$data);
			$this->footerMenu();
		}
		else
			header( 'Location: '.base_url() ) ;		
	}
	
	public function getJobDetails()
	{
		$this->form_validation->set_rules('txtstartDate', '', 'required',array('required' => '* Start Date is Required '));
		/*$this->form_validation->set_rules('txtendDate', '', 'required',array('required' => '* End Date is Required '));
		$this->form_validation->set_rules('cmbProvider', '', 'required',array('required' => '*Please Select Provider '));
		$this->form_validation->set_rules('cmbCategory', '', 'required',array('required' => '* Please Pick Down Date & Time '));*/

		$this->form_validation->set_error_delimiters('<span  class="invalid-feedback" style="display:block">', '</span>');
		
		if ($this->form_validation->run() == FALSE) 
		{
            if($this->headerMenu(6))
            {
				$data['branchCodeList'] =	$this->JobReportsModel->getBranchCode();
				$data['providerList'] 	=	$this->JobReportsModel->getProvider();
				$data['categoryList'] 	=	$this->JobReportsModel->getCategory();
				
			   	$this->load->view('application/JobReportsView',$data);
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
			if($this->headerMenu(6))
			{
				$startDate	    =	$this->input->post("txtstartDate", TRUE);
				$endDate		=	$this->input->post("txtendDate", TRUE);
				
				$provider		=	$this->input->post("cmbProvider", TRUE);
				$category		=	$this->input->post("cmbCategory", TRUE);
				$branch  		=	$this->input->post("cmbBranch", TRUE);
				
				$reportType  	=	$this->input->post("cmbReportType", TRUE);
				//$jobDownTime	=	$this->input->post("txtJobDownTime", TRUE);
				
				if($reportType == 1)
					{
						$this->JobReportsModel->getJobDetailReports($startDate, $endDate, $provider, $category, $branch, $reportType);
					}
				else
					{
						$this->JobReportsModel->getDownTimeReports($startDate, $endDate, $provider, $category, $branch, $reportType);
					}
			}	
		}		
	}
}
