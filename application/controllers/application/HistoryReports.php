<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include "application/controllers/header/Header_page.php";

class HistoryReports extends Header_page {
	public function __construct()
	{		
		parent::__construct();
		$this->
load->model('application/HistoryReportsModel','HistoryReports');
	}
	 
	public function index()
	{
		if($this->headerMenu(8))
		{

       		$this->load->view('application/HistoryReportsView');
			$this->footerMenu();
		}
		else
			header( 'Location: '.base_url() ) ;		
	}
	
	
	public function recordlist()
	{
		$list = $this->HistoryReports->get_datatables();
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
						"recordsTotal" => $this->HistoryReports->count_all(),
						"recordsFiltered" => $this->HistoryReports->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	
	public function recordlist2()
	{
		$list = $this->HistoryReports->get_datatables2();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $items) 
		{
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $items->history_bandwidth_type;
			$row[] = $items->history_bandwidth;
			$row[] = $items->history_bandwidth_start_date;
			$row[] = $items->history_bandwidth_close_date;

			$row[] = $items->history_bandwidth_id;
			$data[] = $row;
		}
		//output to json format
		echo json_encode($output);
	}	
	
	
	
	public function changeStatus()
	{
		$site_id		= 	trim($_POST['site_id']);
		$site_status	= 	trim($_POST['site_status']);
		$this->HistoryReports->changeStatus($site_id,$site_status);	
	}
	
	
	public function editRecord()
	{
		$site_id	= 	trim($_POST['site_id']);
		$data['jsonData']	= $this->HistoryReports->editRecord($site_id);
		$data['jsonBandwidthData']	= $this->HistoryReports->getBandwidthHistory($site_id);
		echo json_encode($data);	
	}	
	
		
}
