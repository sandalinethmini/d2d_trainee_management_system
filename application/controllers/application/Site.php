<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include "application/controllers/header/Header_page.php";

class Site extends Header_page {
	public function __construct()
	{		
		parent::__construct();
		$this->load->model('application/SiteModel','Site');
	}
	 
	public function index()
	{
		if($this->headerMenu(10))
		{
			$data['branchList']		=	$this->Site->getBranch();
			$data['bandwidthTypeList']		=	$this->Site->getBandwidthType();
			$data['branchCodeList'] =	$this->Site->getBranchCode();
			$data['officerList'] 	=	$this->Site->getOfficer();
			$data['bandwidthList'] 	=	$this->Site->getBandwidth();
			$data['connectionList'] =	$this->Site->getConnection();
			$data['linkList'] 		=	$this->Site->getLink();
			$data['providerList'] 	=	$this->Site->getProvider();
			$data['categoryList'] 	=	$this->Site->getCategory();
       		$this->load->view('application/SiteView',$data);
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
		
		$this->form_validation->set_rules('txtCircuitID', '', 'required',array('required' => '* Please Enter Circuit ID'));
		$this->form_validation->set_rules('txtAccno', '', 'required',array('required' => '* Please Enter Account No'));
		$this->form_validation->set_rules('cmbProvider', '', 'required',array('required' => '* Please Select Provider'));
		$this->form_validation->set_rules('txtIprange', '', 'required',array('required' => '* Please Enter IP Range'));
		$this->form_validation->set_rules('cmbConnectionType', '', 'required',array('required' => '* Please Select Connection Type'));
		
		$this->form_validation->set_rules('cmbBandwidthType', '', 'required',array('required' => '* Please Select Bnadwidth Type '));
		$this->form_validation->set_rules('cmbCurrentBandwidth', '', 'required',array('required' => '* Please Select Bnadwidth'));
		
		$this->form_validation->set_rules('cmbStartDate', '', 'required',array('required' => '* Please Pick a Date'));
		
		$this->form_validation->set_error_delimiters('<span  class="invalid-feedback" style="display:block">', '</span>');
		
		if ($this->form_validation->run() == FALSE) 
		{
            if($this->headerMenu(10))
            {
				$data['branchList']		=	$this->Site->getBranch();
				$data['bandwidthTypeList']		=	$this->Site->getBandwidthType();
				$data['branchCodeList'] =	$this->Site->getBranchCode();
				$data['officerList'] 	=	$this->Site->getOfficer();
				$data['bandwidthList'] 	=	$this->Site->getBandwidth();
				$data['connectionList'] =	$this->Site->getConnection();
				$data['linkList'] 		=	$this->Site->getLink();
				$data['providerList'] 	=	$this->Site->getProvider();
				$data['categoryList'] 	=	$this->Site->getCategory();
			 	//$data = array('form_valid' => false);
			   	$this->load->view('application/SiteView',$data);
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
				
				$circuitid	=	$this->input->post("txtCircuitID", TRUE);
				$accno		=	$this->input->post("txtAccno", TRUE);
				$provider	=	$this->input->post("cmbProvider", TRUE);
				$iprange	=	$this->input->post("txtIprange", TRUE);
				$connection	=	$this->input->post("cmbConnectionType", TRUE);
				$startdate			=	$this->input->post("cmbStartDate", TRUE);
				$BandwidthType  	=	$this->input->post("cmbBandwidthType", TRUE);
				$CurrentBandwidth	=	$this->input->post("cmbCurrentBandwidth", TRUE);
						
				$site_id	=	$this->input->post("txtSiteID", TRUE);
				
			if($site_id=='')
				{
					$this->Site->save_record($branch,$category,$officer,$circuitid,$accno,$provider,$iprange,$connection,$startdate,$BandwidthType,$CurrentBandwidth);
				}
			else
				{
					$this->Site->update_record($branch, $category, $officer, $circuitid, $accno, $provider, $iprange, $connection, $startdate, $BandwidthType,$CurrentBandwidth, $site_id);
				}
	 	
            }
            else
           	 	{
                	$this->session->set_flashdata('fail', 'Session Expired or Access Denined.');
                	header( 'Location: '.base_url() ) ;
            	}
		}		
	}
	
	
	
	
	public function saveLinkDetails()
	{
		$this->form_validation->set_rules('cmbNewStartDate', '', 'required',array('required' => '* Please Pick Date'));
		$this->form_validation->set_rules('cmbNewBandwidthType', '', 'required',array('required' => '* Please Select Bandwidth Type'));
		$this->form_validation->set_rules('cmbNewBandwidth', '', 'required',array('required' => '* Please Select Bandwidth'));
		
		
		$this->form_validation->set_rules('txtLinkSiteID', '', 'required',array('required' => '* Error'));
		
		$this->form_validation->set_error_delimiters('<span  class="invalid-feedback" style="display:block">', '</span>');
		
		if ($this->form_validation->run() == FALSE) 
		{
            if($this->headerMenu(10))
            {
				$data['branchList']		=	$this->Site->getBranch();
				$data['bandwidthTypeList']		=	$this->Site->getBandwidthType();
				$data['branchCodeList'] =	$this->Site->getBranchCode();
				$data['officerList'] 	=	$this->Site->getOfficer();
				$data['bandwidthList'] 	=	$this->Site->getBandwidth();
				$data['connectionList'] =	$this->Site->getConnection();
				$data['linkList'] 		=	$this->Site->getLink();
				$data['providerList'] 	=	$this->Site->getProvider();
				$data['categoryList'] 	=	$this->Site->getCategory();
			 	//$data = array('form_valid' => false);
			   	$this->load->view('application/SiteView',$data);
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
				$NewStartDate		=	$this->input->post("cmbNewStartDate", TRUE);
				$NewBandwidthType	=	$this->input->post("cmbNewBandwidthType", TRUE);
				$NewBandwidth		=	$this->input->post("cmbNewBandwidth", TRUE);
				
			
				//$site_id				=	$this->input->post("txtLinkSiteID", TRUE);
				$bandwidth_site_id	=	$this->input->post("txtLinkSiteID", TRUE);
				
			if($bandwidth_site_id > 0)
				{
					$this->Site->update_LinkDetails($NewStartDate,$NewBandwidthType,$NewBandwidth,$bandwidth_site_id);
				}
			/*else
				{
					$this->Site->update_record($branch, $category, $officer, $contact, $circuitid, $accno, $provider, $iprange, $connection, $startdate, $BandwidthType,$CurrentBandwidth, $site_id);
				}*/
	 	
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
			$row[] = $items->site_branch_id;
			$row[] = $items->provider_description;
			$row[] = $items->category_name;
			$row[] = $items->site_account_no;
			$row[] = $items->site_circuit_id;
			$row[] = $items->bandwidth_name;

			$row[] = $items->site_id;
			$row[] = $items->site_status;
			$data[] = $row;


		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->Site->count_all(),
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
