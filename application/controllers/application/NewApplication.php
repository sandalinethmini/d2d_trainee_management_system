<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include "application/controllers/header/Header_page.php";

class NewApplication extends Header_page {
	public function __construct()
	{		
		parent::__construct();
		$this->load->model('application/NewApplicationModel','NewApplication');
	}
	 
	public function index()
	{
		if($this->headerMenu(2))
		{
			$data = array('form_valid' => false);
       		$this->load->view('application/NewApplicationView',$data);
			$this->footerMenu();
		}
		else
			header( 'Location: '.base_url() ) ;		
	}
	
	public function saveRecord()
	{
		
		$this->form_validation->set_rules('txtNebAccount', '', 'numeric|exact_length[10]',array('numeric' => '* Numbers Only Neghibour A/C #','exact_length' => '* Only 10 Numbers'));
		$this->form_validation->set_rules('txtPrvAccount', '', 'numeric|exact_length[10]',array('numeric' => '* Numbers Only for Previous  A/C #','exact_length' => '* Only 10 Numbers'));
		$this->form_validation->set_rules('txtOwnAccount1', '', 'numeric|exact_length[10]',array('numeric' => '* Numbers Only','exact_length' => '* Only 10 Numbers  A/C #'));
		$this->form_validation->set_rules('txtOwnAccount2', '', 'numeric|exact_length[10]',array('numeric' => '* Numbers Only','exact_length' => '* Only 10 Numbers  A/C #'));
		$this->form_validation->set_rules('txtCustomerName', '', 'required|max_length[75]|alpha_dot_spaces',array('required' => '* Required Field','alpha_dot_spaces' => '* Characters and Only','max_length' => '* 75 Charaters Only for Name'));
		$this->form_validation->set_rules('txtNIC', '', 'required|min_length[10]|max_length[12]',array('required' => '* Required Field','min_length' => '* Old NIC No required 10 Characters','max_length' => '* New NIC No required 12 Characters'));
		$this->form_validation->set_rules('txtPemAddress1', '', 'required|max_length[75]',array('required' => '* Addrss is Required','max_length' => '* 75 Charaters Only for Address'));
		$this->form_validation->set_rules('txtMobileNo', '', 'required|numeric|exact_length[10]',array('required' => '* Required Field','numeric' => '* Numbers Only for Mobile #','exact_length' => '* Only 10 Numbers for Mobile #'));
		$this->form_validation->set_rules('txtPhoneNo', '', 'numeric|exact_length[10]',array('numeric' => '* Numbers Onlyfor Phone #','exact_length' => '* Only 10 Numbers for Phone #'));
		$this->form_validation->set_rules('cmbPurposeType', '', 'required',array('required' => '* Please Select'));
		$this->form_validation->set_rules('cmbPhaseType', '', 'required',array('required' => '* Please Select'));
		$this->form_validation->set_rules('cmbAmpType', '', 'required',array('required' => '* Please Select'));
		
		
		$this->form_validation->set_rules('txtComAddress1', '', 'max_length[75]',array('max_length' => '* 75 Charaters Only'));
		$this->form_validation->set_rules('txtLamp', '', 'numeric',array('numeric' => '* Numbers Only for Lamps'));
		$this->form_validation->set_rules('txtFans', '', 'numeric',array('numeric' => '* Numbers Only for Fans'));
		$this->form_validation->set_rules('txtSocket5', '', 'numeric',array('numeric' => '* Numbers Only for 5 Amp Socket'));
		$this->form_validation->set_rules('txtSocket15', '', 'numeric',array('numeric' => '* Numbers Only for 15 Amp Socket'));
		$this->form_validation->set_rules('txtMotor1Capacity', '', 'numeric',array('numeric' => '* Numbers Only Moter Capacity'));
		$this->form_validation->set_rules('txtMotor2Capacity', '', 'numeric',array('numeric' => '* Numbers Only Moter Capacity'));
		$this->form_validation->set_rules('txtMotor3Capacity', '', 'numeric',array('numeric' => '* Numbers Only Moter Capacity'));
		$this->form_validation->set_rules('txtMotor1No', '', 'numeric',array('numeric' => '* Numbers Only for # of Motor'));
		$this->form_validation->set_rules('txtMotor2No', '', 'numeric',array('numeric' => '* Numbers Only for # of Motor'));
		$this->form_validation->set_rules('txtMotor3No', '', 'numeric',array('numeric' => '* Numbers Only for # of Motor'));
		$this->form_validation->set_rules('txtPumpCapacity', '', 'numeric',array('numeric' => '* Numbers Only Pump Capacity'));
		$this->form_validation->set_rules('txtPumpNo', '', 'numeric',array('numeric' => '* Numbers Only for Pump #'));
		$this->form_validation->set_rules('txtWeldingCapacity', '', 'numeric',array('numeric' => '* Numbers Only Welding Plant Capacity'));
		$this->form_validation->set_rules('txtWeldingNo', '', 'numeric',array('numeric' => '* Numbers Only Welding Plant #'));
		$this->form_validation->set_rules('txtAirCapacity', '', 'numeric',array('numeric' => '* Numbers Only A/C Capacity'));
		$this->form_validation->set_rules('txtAirNo', '', 'numeric',array('numeric' => '* Numbers Only A/C #'));
		
				
		$this->form_validation->set_error_delimiters('<span  class="invalid-feedback" style="display:block">', '</span>');
		
		
		if ($this->form_validation->run() == FALSE) 
		{
            if($this->headerMenu(2))
            {
			 	$data = array('form_valid' => false);
			   	$this->load->view('application/NewApplicationView',$data);
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
			   	$this->load->view('application/NewApplicationView',$data);
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
		$comAddress1	=	$this->input->post("txtComAddress1", TRUE);
		$comAddress2	=	$this->input->post("txtComAddress2", TRUE);
		$comAddress3	=	$this->input->post("txtComAddress3", TRUE);
		$mobileNo		=	trim($this->input->post("txtMobileNo", TRUE));
		$phoneNo		=	$this->input->post("txtPhoneNo", TRUE);
		$statusType		=	$this->input->post("cmbStatusType", TRUE);
		$purposeType	=	$this->input->post("cmbPurposeType", TRUE);
			
		$phaseType		=	$this->input->post("cmbPhaseType", TRUE);
		$ampType		=	$this->input->post("cmbAmpType", TRUE);
		$pemAddress1	=	$this->input->post("txtPemAddress1", TRUE);
		$pemAddress2	=	$this->input->post("txtPemAddress2", TRUE);
		$pemAddress3	=	$this->input->post("txtPemAddress3", TRUE);
		$nebAccount		=	$this->input->post("txtNebAccount", TRUE);
		$prvAccount		=	$this->input->post("txtPrvAccount", TRUE);
		
		$ownAccount1	=	$this->input->post("txtOwnAccount1", TRUE);
		$ownAccount2	=	$this->input->post("txtOwnAccount2", TRUE);
		$lamp			=	$this->input->post("txtLamp", TRUE);
		$fans			=	$this->input->post("txtFans", TRUE);
		
		$socket5		=	$this->input->post("txtSocket5", TRUE);
		$socket15		=	$this->input->post("txtSocket15", TRUE);
		$airCapacity	=	$this->input->post("txtAirCapacity", TRUE);
		$airNo			=	$this->input->post("txtAirNo", TRUE);
		
		$motor1Capacity	=	$this->input->post("txtMotor1Capacity", TRUE);
		$motor1No		=	$this->input->post("txtMotor1No", TRUE);
		$motor2Capacity	=	$this->input->post("txtMotor2Capacity", TRUE);
		$motor2No		=	$this->input->post("txtMotor2No", TRUE);
		$motor3Capacity	=	$this->input->post("txtMotor3Capacity", TRUE);
		$motor3No		=	$this->input->post("txtMotor3No", TRUE);
		
		$pumpCapacity		=	$this->input->post("txtPumpCapacity", TRUE);
		$pumpNo				=	$this->input->post("txtPumpNo", TRUE);
		$weldingCapacity	=	$this->input->post("txtWeldingCapacity", TRUE);
		$weldingNo			=	$this->input->post("txtWeldingNo", TRUE);
		
		$other		=	$this->input->post("txtOther", TRUE);
		$otherNo		=	$this->input->post("txtOtherNo", TRUE);
		
		
		$this->NewApplication->get_report($customerName,$nic,$mobileNo,$phoneNo,$statusType,$purposeType,$comAddress1,$comAddress2,$comAddress3,$phaseType,$ampType,																																			    							$pemAddress1,$pemAddress2,$pemAddress3,$nebAccount,$prvAccount,$ownAccount1,$ownAccount2,$lamp,$fans,$socket5,$socket15,$airCapacity,$airNo,
					$motor1Capacity,$motor1No,$motor2Capacity,$motor2No,$motor3Capacity,$motor3No,$pumpCapacity,$pumpNo,$weldingCapacity,$weldingNo,$other,$otherNo);
			
	}
		
}
