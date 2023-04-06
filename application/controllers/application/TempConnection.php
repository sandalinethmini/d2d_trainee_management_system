<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include "application/controllers/header/Header_page.php";

class TempConnection extends Header_page {
	public function __construct()
	{		
		parent::__construct();
		$this->load->model('application/TempConnectionModel','TempConnection');
	}
	 
	public function index()
	{
		if($this->headerMenu(2))
		{
			$data = array('form_valid' => false);
       		$this->load->view('application/TempConnectionView',$data);
			$this->footerMenu();
		}
		else
			header( 'Location: '.base_url() ) ;		
	}
	
	
	public function saveRecord()
	{
		$this->form_validation->set_rules('txtCustomerName', '', 'required|max_length[45]|alpha_dot_spaces|',array('required' => '* Required Field','max_length' => '* 45 Charaters Only','alpha_dot_spaces' => '* Characters and Only'));
		$this->form_validation->set_rules('txtNIC', '', 'min_length[10]|max_length[12]',array('min_length' => '* Old NIC No required 10 Characters','max_length' => '* New NIC No required 12 Characters'));
		$this->form_validation->set_rules('txtComAddress', '', 'required',array('required' => '* Addrss is Required'));
		$this->form_validation->set_rules('cmbReason', '', 'required',array('required' => '* Reason is Required'));
		$this->form_validation->set_error_delimiters('<span  class="invalid-feedback" style="display:block">', '</span>');
		
		if ($this->form_validation->run() == FALSE) 
		{
            if($this->headerMenu(2))
            {
			 	$data = array('form_valid' => false);
			   	$this->load->view('application/TempConnectionView',$data);
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
			   	$this->load->view('application/TempConnectionView',$data);
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
		$comAddress		=	$this->input->post("txtComAddress", TRUE);
		$NIC			=	$this->input->post("txtNIC", TRUE);
		$customerName	=	$this->input->post("txtCustomerName", TRUE);

		$pemAddress		=	trim($this->input->post("txtPemAddress1", TRUE));
		$reason			=	$this->input->post("cmbReason", TRUE);
		$center			=	$this->input->post("cmbCenter", TRUE);
		
		$account		=	trim($this->input->post("txtAccount", TRUE));
		$period			=	$this->input->post("txtPeriod", TRUE);
		$poleDistance		=	$this->input->post("txtPoleDistance", TRUE);
		
		$centerDistance	=	trim($this->input->post("txtCenterDistance", TRUE));
		//$lamp		=	$this->input->post("txtLamp", TRUE);
//		$other		=	$this->input->post("txtOther", TRUE);
//		$watts		=	$this->input->post("txtWatts", TRUE);

		$this->TempConnection->print_application($NIC,$comAddress,$customerName,$pemAddress,$reason,$center,$account,$period,$poleDistance,$centerDistance);
	}
		
}
