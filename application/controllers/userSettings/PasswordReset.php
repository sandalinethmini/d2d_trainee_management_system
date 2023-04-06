<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include "application/controllers/header/Header_page.php";
class PasswordReset extends Header_page {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
	 //private $limit = 2;
	 
	public function __construct()
	{
		
		parent::__construct();
		
		$this->load->model('userSettings/PasswordResetModel','passwordReset');
	}
	 
	public function index()
	{
		if($this->headerMenu(3))
		{
			
       		$this->load->view('userSettings/PasswordResetView');
			$this->load->view('footer/Footer_view');
		}
		else
			header( 'Location: '.base_url() ) ;		
	}
	
	public function saveRecord()
	{
		$this->form_validation->set_rules('txtUserId', 'User Id', 'required');
		$this->form_validation->set_rules('txtCurrentPassword', 'Current Password', 'required');
		$this->form_validation->set_rules('txtPassword', 'Password', 'required');
		$this->form_validation->set_rules('txtRePassword', 'Confirmation Password', 'required|matches[txtPassword]');

		$this->form_validation->set_error_delimiters('<span class="spanError">', '</span>');
		
		if ($this->form_validation->run() == FALSE)
		{
			if($this->headerMenu(3))
			{
				
				$this->load->view('userSettings/PasswordResetView');
				$this->load->view('footer/Footer_view');
			}
			else
				header( 'Location: '.base_url() ) ;	
		}
		else
		{
			if($this->headerMenu(3))
			{
				$userId				=	$this->input->post("txtUserId", TRUE);
				$currentPassword	=	$this->input->post("txtCurrentPassword", TRUE);
				$newPassword		=	$this->input->post("txtPassword", TRUE);
				$newRePassword		=	$this->input->post("txtRePassword", TRUE);
				
				$this->passwordReset->saveRecord($userId,$currentPassword,$newPassword,$newRePassword);
				
			}
		else
			header( 'Location: '.base_url() ) ;	
		}		
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */