<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include "application/controllers/header/Header_page.php";

class SDWANJobs extends Header_page {

	public function __construct()
	{		
		parent::__construct();
		$this->load->model('application/SDWANJobsModel','JobsModel');
	}
	 
	public function index()
	{
		if($this->headerMenu(7))
		{
			
			
			$data['branchList']		=	$this->JobsModel->getBranch();
			$data['categoryList'] 	=	$this->JobsModel->loadCategoryDetails("");
			$data['providerList'] 	=	$this->JobsModel->loadProviderDetails("","");
			//$data['ipAddress']  	=	$this->JobsModel->getIpDetails("","","");
			
			$data['remarkList'] 	=	$this->JobsModel->getRemark();
       		$this->load->view('application/SDWANJobsView',$data);
			$this->footerMenu();
		}
		else
			header( 'Location: '.base_url() ) ;		
	}
	
		
	public function saveRecord()
	{
		$this->form_validation->set_rules('cmbBranchCode', '', 'required',array('required' => '* Please Select Branch Code '));
		$this->form_validation->set_rules('cmbCategory', '', 'required',array('required' => '*Please Select Category '));
		$this->form_validation->set_rules('cmbProvider', '', 'required',array('required' => '*Please Select Provider '));
		$this->form_validation->set_rules('cmbDownDate', '', 'required',array('required' => '* Please Pick Down Date & Time '));

		$this->form_validation->set_rules('txtComplaintID', '', 'required',array('required' => '*Please Enter Complaint ID '));
		$this->form_validation->set_rules('cmbRemark', '', 'required',array('required' => '*Please Select Remark '));

		$this->form_validation->set_error_delimiters('<span  class="invalid-feedback" style="display:block">', '</span>');
		
		$branch		    =	$this->input->post("cmbBranchCode", TRUE);
		$category		=	$this->input->post("cmbCategory", TRUE);
		$provider		=	$this->input->post("cmbProvider", TRUE);
		
		$downDate		=	$this->input->post("cmbDownDate", TRUE);
		$upDate    		=	$this->input->post("cmbUpDate", TRUE);
		$complaintID	=	$this->input->post("txtComplaintID", TRUE);
		$remark     	=	$this->input->post("cmbRemark", TRUE);
		
		$job_id     	=	$this->input->post("txtJobID", TRUE);
		$site_ID    	=	$this->input->post("txtsiteID", TRUE);
		
		if ($this->form_validation->run() == FALSE) 
		{
            if($this->headerMenu(7))
            {
				$data['branchList']		=	$this->JobsModel->getBranch();
				$data['categoryList'] 	=	$this->JobsModel->getCategoryDetails($branch);
				$data['providerList'] 	=	$this->JobsModel->getProviderDetails($branch,$category);
				$data['remarkList'] 	=	$this->JobsModel->getRemark();
				
			   	$this->load->view('application/SDWANJobsView');
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
			 if($job_id == NULL)
            {		
				//save job records
				$this->JobsModel->save_record($downDate, $upDate, $complaintID, $remark, $site_ID);
            }
			else
			{
				//update job records
				$this->JobsModel->updateJobDetails($downDate, $upDate, $complaintID, $remark, $site_ID, $job_id);
			}
		}		
	}
	

	//Data table
	public function recordlist()
	{
		$list = $this->JobsModel->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $items) 
		{
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $items->branch_code." - ".$items->branch_description;
			$row[] = $items->category_name;
			$row[] = $items->sdwan_provider_description;
			$row[] = $items->sdwan_account_no;
			$row[] = $items->sdwan_job_down_time;
			
			$row[] = $items->sdwan_job_id;
			$row[] = $items->sdwan_job_status;
			
			$row[] = $items->category_id;
			$row[] = $items->sdwan_provider_id;
			
			$data[] = $row;

							 

		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->JobsModel->count_all(),
						"recordsFiltered" => $this->JobsModel->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	
	public function changeStatus()
	{
		$job_ID			= 	trim($_POST['job_id']);
		$job_status		= 	trim($_POST['job_status']);
		$this->JobsModel->changeStatus($job_ID,$job_status);	
	}
	
	
	public function editRecord()
	{
		$job_ID	= 	trim($_POST['job_id']);
		//$contact	= 	trim($_POST['officer_contact_number']);
		$data['jsonData']	= $this->JobsModel->editRecord($job_ID);
		echo json_encode($data);
	}	
	
	public function getCategoryDetails()
	{
		$branchCode      = $_POST['branchCode'];	
		$branchCode_data = $this->JobsModel->getCategoryDetails($branchCode);	
        echo json_encode($branchCode_data);	
	}	
	
	public function getProviderDetails()
	{
		$categoryList      = $_POST['categoryList'];
		$branchCode        = $_POST['branchCode'];	
		$categoryList_data = $this->JobsModel->getProviderDetails($categoryList, $branchCode);	
        echo json_encode($categoryList_data);	
	}	

	
	
}
