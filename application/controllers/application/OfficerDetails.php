<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include "application/controllers/header/Header_page.php";

class OfficerDetails extends Header_page {
	public function __construct()
	{		
		parent::__construct();
		$this->load->model('application/OfficerDetailsModel','OfficerModel');
	}
	 
	public function index()
	{
		if($this->headerMenu(9))
		{
		  /*$data['branchList']		=	$this->Site->getBranch();
			$data['branchCodeList'] =	$this->Site->getBranchCode();
			$data['officerList'] 	=	$this->Site->getOfficer();
			$data['bandwidthList'] 	=	$this->Site->getBandwidth();
			$data['connectionList'] =	$this->Site->getConnection();
			$data['linkList'] 		=	$this->Site->getLink();
			$data['officerList'] 	=	$this->OfficerDetails->getOfficer();*/
			
			$data['districtList'] 	=	$this->OfficerModel->getDistrict();
			
       		$this->load->view('application/OfficerDetailsView',$data);
			$this->footerMenu();
		}
		else
			header( 'Location: '.base_url() ) ;		
	}
	
		
	public function saveRecord()
	{
		$this->form_validation->set_rules('txtITofficer', '', 'required',array('required' => '* Please Enter Officer Name'));
		$this->form_validation->set_rules('txtContact', '', 'required',array('required' => '*Please Enter Phone Number '));
		$this->form_validation->set_rules('cmbDistrict', '', 'required',array('required' => '* District is Required'));
		/*$this->form_validation->set_rules('txtAccount', '', 'required',array('required' => '* Reason is Required'));
		$this->form_validation->set_rules('txtCircuitID', '', 'required',array('required' => '* Reason is Required'));
		$this->form_validation->set_rules('cmbBandWidth', '', 'required',array('required' => '* Reason is Required'));
		$this->form_validation->set_rules('txtTotalAmount', '', 'required',array('required' => '* Reason is Required'));*/
		$this->form_validation->set_error_delimiters('<span  class="invalid-feedback" style="display:block">', '</span>');
		
		if ($this->form_validation->run() == FALSE) 
		{
            if($this->headerMenu(9))
            {
			 	//$data = array('form_valid' => false);
				
				$data['districtList'] 	=	$this->OfficerDetails->getDistrict();
			   	$this->load->view('application/OfficerDetailsView',$data);
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
			 if($this->headerMenu(9))
            {
				$officer	=	$this->input->post("txtITofficer", TRUE);
				$contact	=	$this->input->post("txtContact", TRUE);
			 	$district	=	$this->input->post("cmbDistrict", TRUE);
				$officerID	=	$this->input->post("txtOfficerID", TRUE);
				/*$account	=	$this->input->post("txtAccount", TRUE);
				$circuit	=	$this->input->post("txtCircuitID", TRUE);
				$bandwidth	=	$this->input->post("cmbBandWidth", TRUE);
				$charge		=	$this->input->post("txtCharge", TRUE);
				$tax		=	$this->input->post("txtTax", TRUE);
				$vat		=	$this->input->post("txtVat", TRUE);
				$amount		=	$this->input->post("txtTotalAmount", TRUE);*/
				
				if($officerID=='')
				{
					$this->OfficerModel->save_record($officer, $contact, $district);
				}
				else
				{
					$this->OfficerModel->update_record($officer, $contact, $district, $officerID);
				}
				
				
				
			 	
            }
            else
            {
                $this->session->set_flashdata('fail', 'Session Expired or Access Denined.');
                header( 'Location: '.base_url() ) ;
            }
		}		
	}
	
	public function recordlist()
	{
		$list = $this->OfficerModel->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $items) 
		{
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $items->officer_name;
			$row[] = $items->officer_contact_number;
			$row[] = $items->branch_description;
			
			
			$row[] = $items->officer_id;
			$row[] = $items->officer_status;
			$data[] = $row;


		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->OfficerModel->count_all(),
						"recordsFiltered" => $this->OfficerModel->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	
	public function changeStatus()
	{
		$officer_ID			= 	trim($_POST['officer_ID']);
		$officer_status		= 	trim($_POST['officer_status']);
		$this->OfficerModel->changeStatus($officer_ID,$officer_status);	
	}
	
	
	public function editRecord()
	{
		$officer_id	= 	trim($_POST['officer_id']);
		//$contact	= 	trim($_POST['officer_contact_number']);
		$data['jsonData']	= $this->OfficerModel->editRecord($officer_id);
		echo json_encode($data);
	}	
}
