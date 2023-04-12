<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include "application/controllers/header/Header_page.php";

class SDWANSite extends Header_page {
	public function __construct()
	{		
		parent::__construct();
		$this->load->model('application/SDWANSiteModel','Site');
	}
	 
	public function index()
	{
		if($this->headerMenu(10))
		{
			$data['branchList']		=	$this->Site->getBranch();
			$data['officerList'] 	=	$this->Site->getOfficer();
			$data['connectionList'] =	$this->Site->getConnection();
			$data['providerList'] 	=	$this->Site->getProvider();
			$data['categoryList'] 	=	$this->Site->getCategory();
       		$this->load->view('application/SDWANSiteView',$data);
			$this->footerMenu();
		}
		else
			header( 'Location: '.base_url() ) ;		
	}
	
		
	public function saveRecord()
	{
		$this->form_validation->set_rules('cmbBranchCode', '', 'required',array('required' => '* Please Select Branch Code'));
		$this->form_validation->set_rules('cmbCategory', '', 'required',array('required' => '* Please Select Catagory'));
		$this->form_validation->set_rules('cmbOfficer', '', 'required',array('required' => '* Please Select IT Officer'));
		$this->form_validation->set_rules('txtAccno', '', 'required',array('required' => '* Please Enter Account No'));
		$this->form_validation->set_rules('cmbProvider', '', 'required',array('required' => '* Please Select Provider'));
		$this->form_validation->set_rules('cmbConnectionType', '', 'required',array('required' => '* Please Select Connection Type'));
		
		$this->form_validation->set_rules('cmbStartDate', '', 'required',array('required' => '* Please Pick a Date'));
		
		$this->form_validation->set_error_delimiters('<span  class="invalid-feedback" style="display:block">', '</span>');
		
		if ($this->form_validation->run() == FALSE) 
		{
            if($this->headerMenu(10))
            {
				$data['branchList']		=	$this->Site->getBranch();
				$data['officerList'] 	=	$this->Site->getOfficer();
				$data['connectionList'] =	$this->Site->getConnection();
				$data['providerList'] 	=	$this->Site->getProvider();
				$data['categoryList'] 	=	$this->Site->getCategory();
				$this->load->view('application/SDWANSiteView',$data);
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
			 if($this->headerMenu(10))
            {
				$branch		=	$this->input->post("cmbBranchCode", TRUE);
				$category	=	$this->input->post("cmbCategory", TRUE);
				$officer	=	$this->input->post("cmbOfficer", TRUE);
				$accno		=	$this->input->post("txtAccno", TRUE);
				$provider	=	$this->input->post("cmbProvider", TRUE);
				$connection	=	$this->input->post("cmbConnectionType", TRUE);
				$startdate	=	$this->input->post("cmbStartDate", TRUE);		
				$site_id	=	$this->input->post("txtSiteID", TRUE);
				
			if($site_id=='')
				{
					$this->Site->save_record($branch,$category,$officer,$accno,$provider,$connection,$startdate);
				}
			else
				{
					$this->Site->update_record($branch,$category,$officer,$accno,$provider,$connection,$startdate, $site_id);
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
		$list = $this->Site->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $items) 
		{
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $items->code;
			$row[] = $items->branch;
			$row[] = $items->account_no;
			$row[] = $items->category;
			$row[] = $items->connection_provider;
			$row[] = $items->sdwan_id;
			$row[] = $items->status;
			$data[] = $row;



		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => 0,
						//"recordsTotal" => $this->Site->count_all(),
						"recordsFiltered" => $this->Site->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	

	
	
	
	public function changeStatus()
	{
		$site_id		= 	trim($_POST['site_id']);
		$site_status	= 	trim($_POST['site_status']);
		$this->Site->changeStatus($site_id,$site_status);	
	}
	
	
	public function editRecord()
	{
		$site_id	= 	trim($_POST['site_id']);
		//$contact	= 	trim($_POST['officer_contact_number']);
		$data['jsonData']	= $this->Site->editRecord($site_id);
		echo json_encode($data);
	}	
	
		
}
