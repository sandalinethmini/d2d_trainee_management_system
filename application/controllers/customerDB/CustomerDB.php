<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CustomerDB extends CI_Controller  {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('customerDB/CustomerDBModel','consumerModel');
	}
	
	public function getCustomer()
	{
		//$this->form_validation->set_rules('txtCIF', 'CIF', 'required|numeric');
		
		//$this->form_validation->set_error_delimiters('<span class="spanError">', '</span>');
		
		
				$cif	=	$this->input->post("CIF");
				$data['consumer']	= $this->consumerModel->getConsumerDetails($cif);
				
				echo json_encode($data);

				//$this->load->view('cortex/customerSearchView',$data);
			//}
//		else
//			header( 'Location: '.base_url() ) ;
//		}
	}
	
	public function loadCustomer($CIF)
	{
		if($this->cortexHeaderMenu(28))
		{
			$data['customer']	=$customer = array('firstname' => '',
						'lastname' => '',
						'title' => '',
						'sex' => '',
						'married' => '',
						'cif' => $CIF );
			$this->load->view('cortex/customerSearchView',$data);
		
		}
		else
			header( 'Location: '.base_url() ) ;
	}
	
	
	public function updateCustomer()
	{
		$CIF		= 	trim($_POST['CIF']);
		$data['customerData'] = $this->customerModel->updateCustomerDetails($CIF);
		echo json_encode($data);
	}
	
	public function getBranchName()
	{
		$branchCode		= 	trim($_POST['branchCode']);
		$data['branchName'] = $this->customerModel->getBranchName($branchCode);
		echo json_encode($data);
	}
	
	public function saveCustomer()
	{
		$txtID	=	$this->input->post("txtID", TRUE);
		
		if(!$txtID)
		{
			$this->form_validation->set_rules('txtCustomerCode', 'CIF', 'required|numeric|is_unique[cortex_customer.custcode]');
			$this->form_validation->set_message('is_unique', ' Already Inserted.');
			
			$this->form_validation->set_rules('txtNIC', 'NIC', 'required|is_unique[cortex_customer.idnumber]|regex_match[/^[0-9V]+$/]|min_length[10]|max_length[12]');
			$this->form_validation->set_message('is_unique', 'Already Inserted.');
		}
		
		$this->form_validation->set_rules('txtBranchCode', 'Branch Code', 'required|numeric|min_length[4]');
		$this->form_validation->set_rules('txtTitle', 'Title', 'required');
		$this->form_validation->set_rules('cmbCustomerType', 'Customer Type', 'required');
		$this->form_validation->set_rules('txtFirstName', 'First Name', 'required|regex_match[/^[A-Z ]+$/]');
		$this->form_validation->set_rules('txtLastName', ' Last Name', 'required|regex_match[/^[A-Z ]+$/]');
		$this->form_validation->set_rules('cmbGender', 'Gender', 'required');
		$this->form_validation->set_rules('cmbMarital', 'Marital Status', 'required');
		$this->form_validation->set_rules('txtDOB', 'Birth Date', 'required');
		$this->form_validation->set_rules('cmbProfession', 'Profession', 'required');
		$this->form_validation->set_rules('cmbMailShot', 'MailShoot', 'required');
		$this->form_validation->set_rules('txtHomeAddr1', 'Addrss Line 1', 'required|regex_match[/^[0-9a-zA-Z\/ \\\s]+$/]');
		$this->form_validation->set_rules('txtHomePostCode', 'Postal Code', 'numeric');
		$this->form_validation->set_rules('txtHomeAddr2', 'Addrss Line 2', 'regex_match[/^[0-9a-zA-Z\/ \\\ s]+$/]');
		$this->form_validation->set_rules('txtPostBox', 'Post Box', 'numeric');
		$this->form_validation->set_rules('txtHomeAddr3', 'Addrss Line 3', 'regex_match[/^[0-9a-zA-Z\/ \\\ s]+$/]');
		$this->form_validation->set_rules('txtHomePhone', 'Phone', 'numeric|min_length[10]|max_length[10]');
		$this->form_validation->set_rules('txtHomeCity', 'City', 'required|regex_match[/^[0-9a-zA-Z\/ \\\ s]+$/]');
		$this->form_validation->set_rules('txtMobile', 'Mobile', 'numeric|min_length[10]|max_length[10]');
		$this->form_validation->set_rules('txtWorkAddr1', 'Addrss Line 1', 'regex_match[/^[0-9a-zA-Z\/ \\\s]+$/]');
		$this->form_validation->set_rules('txtWorkPhone', 'Phone', 'numeric|min_length[10]|max_length[10]');
		$this->form_validation->set_rules('txtWorkAddr2', 'Addrss Line 2', 'regex_match[/^[0-9a-zA-Z\/ \\\s]+$/]');
		$this->form_validation->set_rules('txtUserData1', '', '');
		$this->form_validation->set_rules('txtWorkAddr3', 'Addrss Line 3', 'regex_match[/^[0-9a-zA-Z\/ \\\s]+$/]');
		$this->form_validation->set_rules('txtUserData2', '', '');
		$this->form_validation->set_rules('txtWorkCity', 'Work City', 'regex_match[/^[0-9a-zA-Z\/ \\\ s]+$/]');
		$this->form_validation->set_rules('txtUserData3', '', '');
		$this->form_validation->set_rules('txtWorkPostCode', 'Work Postal Code', 'numeric');
		$this->form_validation->set_rules('txtCustomerCategory', 'Account Type', 'in_list[Individual Account]');
		$this->form_validation->set_error_delimiters('<span class="spanError">', '</span>');
		
		if ($this->form_validation->run() == FALSE)
		{
			if($this->cortexHeaderMenu(28))
			{
				$accountType	=	$this->input->post("txtCustomerCategory", TRUE);
			
				$this->load->view('cortex/customerSearchView');
			}
			else
				header( 'Location: '.base_url() ) ;	
		}
		else
		{
			if($this->cortexHeaderMenu(28))
			{
			$txtCustomerCode	=	$this->input->post("txtCustomerCode", TRUE);
			$txtBranchCode		=	$this->input->post("txtBranchCode", TRUE);
			$txtTitle			=	$this->input->post("txtTitle", TRUE);
			$cmbCustomerType	=	$this->input->post("cmbCustomerType", TRUE);
			$txtFirstName		=	$this->input->post("txtFirstName", TRUE);
			$txtLastName		=	$this->input->post("txtLastName", TRUE);
			$cmbGender			=	$this->input->post("cmbGender", TRUE);
			$cmbMarital			=	$this->input->post("cmbMarital", TRUE);
			$txtNIC				=	$this->input->post("txtNIC", TRUE);
			$txtDOB				=	$this->input->post("txtDOB", TRUE);
			$cmbProfession		=	$this->input->post("cmbProfession", TRUE);
			$cmbMailShot		=	$this->input->post("cmbMailShot", TRUE);
			$txtHomeAddr1		=	$this->input->post("txtHomeAddr1", TRUE);
			$txtHomePostCode	=	$this->input->post("txtHomePostCode", TRUE);
			$txtHomeAddr2		=	$this->input->post("txtHomeAddr2", TRUE);
			$txtPostBox			=	$this->input->post("txtPostBox", TRUE);
			$txtHomeAddr3		=	$this->input->post("txtHomeAddr3", TRUE);
			$txtHomePhone		=	$this->input->post("txtHomePhone", TRUE);
			$txtHomeCity		=	$this->input->post("txtHomeCity", TRUE);
			$txtMobile			=	$this->input->post("txtMobile", TRUE);
			$txtWorkAddr1		=	$this->input->post("txtWorkAddr1", TRUE);
			$txtWorkPhone		=	$this->input->post("txtWorkPhone", TRUE);
			$txtWorkAddr2		=	$this->input->post("txtWorkAddr2", TRUE);
			$txtUserData1		=	$this->input->post("txtUserData1", TRUE);
			$txtWorkAddr3		=	$this->input->post("txtWorkAddr3", TRUE);
			$txtUserData2		=	$this->input->post("txtUserData2", TRUE);
			$txtWorkCity		=	$this->input->post("txtWorkCity", TRUE);
			$txtUserData3		=	$this->input->post("txtUserData3", TRUE);
			$txtWorkPostCode	=	$this->input->post("txtWorkPostCode", TRUE);
			
			if($txtID!=""){
				$this->customerModel->updateCustomer($txtID,$txtCustomerCode,$txtBranchCode,$txtTitle,$cmbCustomerType,$txtFirstName,$txtLastName,$cmbGender,$cmbMarital,$txtNIC,$txtDOB,$cmbProfession,$cmbMailShot,$txtHomeAddr1,$txtHomePostCode,$txtHomeAddr2,$txtPostBox,$txtHomeAddr3,$txtHomePhone,$txtHomeCity,$txtMobile,$txtWorkAddr1,$txtWorkPhone,$txtWorkAddr2,$txtUserData1,$txtWorkAddr3,$txtUserData2,$txtWorkCity,$txtUserData3,$txtWorkPostCode);
			}
			else{
				$this->customerModel->saveCustomer($txtCustomerCode,$txtBranchCode,$txtTitle,$cmbCustomerType,$txtFirstName,$txtLastName,$cmbGender,$cmbMarital,$txtNIC,$txtDOB,$cmbProfession,$cmbMailShot,$txtHomeAddr1,$txtHomePostCode,$txtHomeAddr2,$txtPostBox,$txtHomeAddr3,$txtHomePhone,$txtHomeCity,$txtMobile,$txtWorkAddr1,$txtWorkPhone,$txtWorkAddr2,$txtUserData1,$txtWorkAddr3,$txtUserData2,$txtWorkCity,$txtUserData3,$txtWorkPostCode);
			}	
}
		else
			header( 'Location: '.base_url() ) ;
		}
	}	
}
