<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include "application/controllers/header/Header_page.php";

class ChangeTariff extends Header_page {
	public function __construct()
	{		
		parent::__construct();
		$this->load->model('application/ChangeTariffModel','ChangeTariff');
	}
	 
	public function index()
	{
		if($this->headerMenu(2))
		{
			$data = array('form_valid' => false);
       		$this->load->view('application/ChangeTariffView',$data);
			$this->footerMenu();
		}
		else
			header( 'Location: '.base_url() ) ;		
	}
	
	
	
	
	
	public function saveRecord()
	{
		$this->form_validation->set_rules('txtAccount', '', 'required|numeric|exact_length[10]',array('numeric' => '* Numbers Only','exact_length' => '* Only 10 Numbers'));
		$this->form_validation->set_rules('txtOwnerName', '', 'required|max_length[50]|alpha_dot_spaces',array('required' => '* Required Field','alpha_dot_spaces' => '* Characters and Only','max_length' => '* 45 Charaters Only'));
		$this->form_validation->set_rules('txtMobileNo', '', 'numeric|exact_length[10]',array('numeric' => '* Numbers Only','exact_length' => '* Only 10 Numbers'));
		$this->form_validation->set_error_delimiters('<span  class="invalid-feedback" style="display:block">', '</span>');
		
		
		if ($this->form_validation->run() == FALSE) 
		{
            if($this->headerMenu(2))
            {
			 	$data = array('form_valid' => false);
			   	$this->load->view('application/ChangeTariffView',$data);
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
			   	$this->load->view('application/ChangeTariffView',$data);
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
		$account		=	$this->input->post("txtAccount", TRUE);
		$ownerName		=	$this->input->post("txtOwnerName", TRUE);
		$mobileNo		=	trim($this->input->post("txtMobileNo", TRUE));
		$address	=	$this->input->post("txtAddress", TRUE);
		//$reason			=	$this->input->post("txtReason", TRUE);

		$this->ChangeTariff->print_report($account,$ownerName,$mobileNo,$address);
	}
		
}
