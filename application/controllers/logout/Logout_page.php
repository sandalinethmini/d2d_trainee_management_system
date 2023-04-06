<?php 
class Logout_page extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();		
	} 
	public function index()
	{
		$this->load->model('logout/Logout_model');
		$this->Logout_model->logoutUser();
		header( 'Location: '.base_url() ) ;
	}
}
?>