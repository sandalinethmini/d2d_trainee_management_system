<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SDWANJobReportsModel extends CI_Model {

	var $table = 'site_details';
	var $column_order = array(null, 'officer_name'); //set column field database for datatable orderable
	var $column_search = array('officer_name'); //set column field database for datatable searchable 
	var $order = array('officer_id' => 'asc'); // default order 
	

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Colombo');
		
		require(APPPATH .'third_party/fpdf/fpdf.php');		
	}
	
	public function getJobDetailReports($startDate, $endDate, $provider, $category, $branch)   //for table
		{
			$this->db->select("  sdwan_job_down_time,
								 sdwan_job_complaint_id,
								 job_remark_description,
								 sdwan_account_no,
								 sdwan_provider_description,
								 category_name,
								 branch_description,
								 sdwan_branch_id,
								COALESCE(sdwan_job_up_time, '-') AS sdwan_job_up_time,
								TIMEDIFF(`sdwan_job_up_time`,`sdwan_job_down_time`) AS time_dif ");
								
			$this->db->from('nw_sdwan_job_details');
			$this->db->join('job_remark_details','job_remark_id = sdwan_job_remark','inner');
			$this->db->join('nw_sd_wan_details','sdwan_id =  sdwan_job_site_id','inner');
			$this->db->join('nw_sd_wan_provider','sdwan_provider_id = sdwan_provider','inner');
			$this->db->join('category_details','category_id = sdwan_category','inner');
			$this->db->join('com_branch','branch_code = sdwan_branch_id','inner');
			
			$this->db->where("DATE_FORMAT(`sdwan_job_down_time`, '%Y-%m-%d') BETWEEN '$startDate' AND '$endDate'");
			
			
			if( $provider)
			{
				$this->db->where('sdwan_provider', $provider);
			}
			if( $category)
			{
				$this->db->where('sdwan_category', $category);
			}
			if( $branch)
			{
				$this->db->where('sdwan_branch_id', $branch);
			}
				
				
				$query = $this->db->get();
				//return $query->result();	
				
				//report summery for job details
				$pdf = new FPDF('P','mm',array(400,390));
				$pdf -> AddPage();
				
				$pdf -> setDisplayMode ('fullpage');
				
				$pdf->SetFont('Times','',8);
				$pdf->Cell(0, 5, "Printed Date : ".date('Y-m-d   H:i:s') , 0, 1, 'R'); 
				
				$pdf->SetFont('Times','',8);
				$pdf->Cell(0, 5, "Printed By : ".$this->session->userdata('user_full_name') , 0, 1, 'R');
				
				$pdf->SetFont('Arial','B',10);
				$pdf->Cell(0 ,5,"REGIONAL DEVELOPMENT BANK",0,1,'C');
				
				$pdf->SetFont('Arial','',10);
		 		$pdf->Cell(0 ,5,"SD WAN Job Details Report ~ ".$startDate."  to ".$endDate."   ",0,1,'C');
				
				
				$pdf->SetFont('Arial','B',10);
				$pdf->Ln();
				$pdf->Ln();
				
				$pdf->Cell(10 ,10,"No",1,0,'C');
				$pdf->Cell(60 ,10,"Branch",1,0,'C');
				$pdf->Cell(25 ,10,"Category",1,0,'C');
				$pdf->Cell(30 ,10,"Provider Name",1,0,'C');
				//$pdf->Cell(25 ,10,"IP Range",1,0,'C');
				$pdf->Cell(40 ,10,"Account No.",1,0,'C');
				$pdf->Cell(45 ,10,"Down Date & Time",1,0,'C');
				$pdf->Cell(45 ,10,"Up Date & Time",1,0,'C');
				$pdf->Cell(45 ,10,"Time Deference (Hrs.)",1,0,'C');
				$pdf->Cell(35 ,10,"Complaint ID",1,0,'C');
				$pdf->Cell(25 ,10,"Remark",1,1,'C');
			
			
			
				$pdf->SetFont('Arial','',10);
				
				$number = 1;
				
		foreach ($query->result_array() as $row) 
			{	
				$pdf->Cell(10 ,6,$number,1,0,'C');
				$pdf->Cell(60 ,6,$row['sdwan_branch_id']."  -  ".$row['branch_description'],1,0,'L');
				$pdf->Cell(25 ,6,$row['category_name'],1,0,'C');		
				$pdf->Cell(30 ,6,$row['sdwan_provider_description'],1,0,'C');	
				//$pdf->Cell(25 ,6,$row['site_iprange'],1,0,'C');
				$pdf->Cell(40 ,6,$row['sdwan_account_no'],1,0,'C');
				$pdf->Cell(45 ,6,$row['sdwan_job_down_time'],1,0,'C');
				$pdf->Cell(45 ,6,$row['sdwan_job_up_time'],1,0,'C');		
				$pdf->Cell(45 ,6,$row['time_dif'],1,0,'C');	
				$pdf->Cell(35 ,6,$row['sdwan_job_complaint_id'],1,0,'C');
				$pdf->Cell(25 ,6,$row['job_remark_description'],1,1,'C');
				$number++;
				
			}	
				
				$pdf -> output ('Job_Details_Summary_'.date('Ymd_His').'.pdf','I');  		
		}
		
		
	public function getDownTimeReports($startDate, $endDate, $provider, $category, $branch)   //for table
		{
			$this->db->select("  sdwan_job_down_time,
								 sdwan_job_complaint_id,
								 job_remark_description,
								 sdwan_account_no,
								 sdwan_provider_description,
								 category_name,
								 branch_description,
								 sdwan_branch_id,
								COALESCE(sdwan_job_up_time, '-') AS sdwan_job_up_time,
								TIMEDIFF(`sdwan_job_up_time`,`sdwan_job_down_time`) AS time_dif ");
								
			$this->db->from('nw_sdwan_job_details');
			$this->db->join('job_remark_details','job_remark_id = sdwan_job_remark','inner');
			$this->db->join('nw_sd_wan_details','sdwan_id =  sdwan_job_site_id','inner');
			$this->db->join('nw_sd_wan_provider','sdwan_provider_id = sdwan_provider','inner');
			$this->db->join('category_details','category_id = sdwan_category','inner');
			$this->db->join('com_branch','branch_code = sdwan_branch_id','inner');
			//$this->session->userdata('user_full_name');
			
			
			$this->db->where("DATE_FORMAT(`sdwan_job_down_time`, '%Y-%m-%d') BETWEEN '$startDate' AND '$endDate'");
			
			
			if( $provider)
			{
				$this->db->where('sdwan_provider', $provider);
			}
			if( $category)
			{
				$this->db->where('sdwan_category', $category);
			}
			if( $branch)
			{
				$this->db->where('sdwan_branch_id', $branch);
			}
				
				
				$query = $this->db->get();
				//return $query->result();	
				
				//report summery for job details
				$pdf = new FPDF('P','mm',array(230,320));
				$pdf -> AddPage();
				
				$pdf -> setDisplayMode ('fullpage');
				
				$pdf->SetFont('Times','',8);
				$pdf->Cell(0, 5, "Printed Date : ".date('Y-m-d   H:i:s') , 0, 1, 'R'); 
				
				$pdf->SetFont('Times','',8);
				$pdf->Cell(0, 5, "Printed By : ".$this->session->userdata('user_full_name') , 0, 1, 'R'); 
				
				$pdf->SetFont('Arial','B',10);
				$pdf->Cell(0 ,5,"REGIONAL DEVELOPMENT BANK",0,1,'C');
				
				$pdf->SetFont('Arial','',10);
		 		$pdf->Cell(0 ,5," Down Time Details Report ~ ".$startDate."  to ".$endDate."   ",0,1,'C');
				
				
				$pdf->SetFont('Arial','B',10);
				$pdf->Ln();
				$pdf->Ln();
				
				$pdf->Cell(10 ,10,"No",1,0,'C');
				$pdf->Cell(60 ,10,"Branch",1,0,'C');
				$pdf->Cell(25 ,10,"Category",1,0,'C');
				$pdf->Cell(40 ,10,"Down Date & Time",1,0,'C');
				$pdf->Cell(40 ,10,"Up Date & Time",1,0,'C');
				$pdf->Cell(40 ,10,"Time Deference (Hrs.)",1,1,'C');						
			
				$pdf->SetFont('Arial','',10);
			
				$number = 1;
				
		foreach ($query->result_array() as $row) 
			{	
				$pdf->Cell(10 ,6,$number,1,0,'C');
				$pdf->Cell(60 ,6,$row['sdwan_branch_id']."  -  ".$row['branch_description'],1,0,'L');
				$pdf->Cell(25 ,6,$row['category_name'],1,0,'C');		
				$pdf->Cell(40 ,6,$row['sdwan_job_down_time'],1,0,'C');
				$pdf->Cell(40 ,6,$row['sdwan_job_up_time'],1,0,'C');		
				$pdf->Cell(40 ,6,$row['time_dif'],1,1,'C');	
				$number++;
			}	
				
				$pdf -> output ('Down_Time_Details_Summary_'.date('Ymd_His').'.pdf','I');  		
		}
		
	
	public function getBranch()
	{
		$this->db->select('branch_code,branch_description');
		$this->db->from('com_branch');
		$this->db->order_by('branch_description', 'asc');
		$query=$this->db->get();
		
		
		$branchList = array();
		
		$branchList = array('' => '-- Select Branch --');
		
		foreach ($query->result_array() as $row) 
			{
				$branchList[$row['branch_code']] = $row['branch_code'].' - '. $row['branch_description'];
			}	
		return $branchList;
	}
	
	public function getBranchCode()
	{
		$this->db->select('branch_code,branch_description');
		$this->db->from('com_branch');
		$this->db->order_by('branch_description', 'asc');
		$query=$this->db->get();
		
		$branchCodeList = array();
		
		$branchCodeList = array('' => 'CODE');
		foreach ($query->result_array() as $row) 
		{
			$branchCodeList[$row['branch_code']] = $row['branch_code'];
		}	
		return $branchCodeList;
	}
	
	public function getProvider()
	{
		$this->db->select('sdwan_provider_id,sdwan_provider_description');
		$this->db->from('nw_sd_wan_provider');
		$this->db->order_by('sdwan_provider_description', 'asc');
		$query=$this->db->get();
		
		$officerList = array();
		
		$officerList = array('' => '-- Select Provider --');
		foreach ($query->result_array() as $row) 
		{
			$officerList[$row['sdwan_provider_id']] = $row['sdwan_provider_description'];
		}	
		return $officerList;
	}
	
	public function getCategory()
	{
		$this->db->select('category_id,category_name');
		$this->db->from('category_details');
		$this->db->order_by('category_name', 'asc');
		$query=$this->db->get();
		
		$categoryList = array();
		
		$categoryList = array('' => '-- Select Category --');
		foreach ($query->result_array() as $row) 
		{
			$categoryList[$row['category_id']] = $row['category_name'];
		}	
		return $categoryList;
	}

}


