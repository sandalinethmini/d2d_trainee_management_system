<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OfficerDetailsReportModel extends CI_Model {

	var $table = 'site_details';
	var $column_order = array(null, 'officer_name'); //set column field database for datatable orderable
	var $column_search = array('officer_name'); //set column field database for datatable searchable 
	var $order = array('officer_id' => 'asc'); // default order 
	

	public function __construct()
	{
		parent::__construct();
		
		require(APPPATH .'third_party/fpdf/fpdf.php');		
	}
	
	public function getOfficerDetails($district)   //for table
		{
			
				//return $query->result();	
				
				//report summery for job details
				$pdf = new FPDF('P','mm','A4');
				$pdf -> AddPage();
				
				$pdf -> setDisplayMode ('fullpage');
				
				$pdf->SetFont('Times','',8);
				$pdf->Cell(0, 5, "Printed Date : ".date('Y-m-d   H:i:s') , 0, 1, 'R'); 
			
				$pdf->SetFont('Times','',8);
				$pdf->Cell(0, 5, "Printed By : ".$this->session->userdata('user_full_name') , 0, 1, 'R');
				
				$pdf->SetFont('Arial','B',10);
				$pdf->Cell(0 ,5,"REGIONAL DEVELOPMENT BANK",0,1,'C');
				
				$pdf->SetFont('Times','',10);
		 		$pdf->Cell(0 ,5," Officer Details Report ",0,1,'C');
				
				$pdf->Ln();
				$pdf->Ln();
			
			$this->db->select(' officer_id,
								officer_name,
								officer_contact_number,
								branch_description
								  ');
								
			$this->db->from('officer_details');
			$this->db->join('com_branch','branch_code  = officer_district','inner');
			$this->db->where('branch_code',$district);
			$this->db->order_by('branch_description', 'asc');
			
			$query=$this->db->get();
			$number = 1;
			
			$pdf->SetFont('Times','',10);	
			
			foreach ($query->result_array() as $row) 
			{	
				$pdf->Cell(02 ,5,$number,0,0,'L');
				$pdf->Cell(03 ,5,")",0,0,'L');
				$pdf->Cell(35 ,5,"Officer Name       :-",0,0,'L');
				$pdf->Cell(25 ,5, $row['officer_name'],0,1,'L');
				$pdf->Cell(05 ,5,"",0,0,'L');
				$pdf->Cell(35 ,5,"District Office      :-",0,0,'L');
				$pdf->Cell(25 ,5, $row['branch_description'],0,1,'L');
				$pdf->Cell(05 ,5,"",0,0,'L');
				$pdf->Cell(35 ,5,"Contact Number  :-",0,0,'L');
				$pdf->Cell(25 ,5, $row['officer_contact_number'],0,1,'L');
				$pdf->Ln();
				$number++;
			}	
				
				
				
				
				$pdf->SetFont('Arial','B',10);
				$pdf->Ln();
				$pdf->Ln();
				
				$pdf->Cell(10 ,10,"No",1,0,'C');
				$pdf->Cell(35 ,10,"Branch Code",1,0,'C');
				$pdf->Cell(55 ,10,"Branch",1,1,'C');
						
			
			
				$pdf->SetFont('Arial','',10);
				
			$this->db->select(' branch_description,
								brn_branch_code ');
								
			$this->db->from('district_branch');
			$this->db->join('com_branch','branch_code  = brn_branch_code','inner');
			$this->db->where('brn_district_code',$district);
			$this->db->order_by('brn_branch_code', 'asc');
				
				$query = $this->db->get();
				$number = 1;
		
		foreach ($query->result_array() as $row) 
			{	
				//$pdf->Cell(55 ,6,$row['officer_district']."  -  ".$row['branch_description'],1,0,'L');
				$pdf->Cell(10 ,6,$number,1,0,'C');
				$pdf->Cell(35 ,6,$row['brn_branch_code'],1,0,'C');	
				$pdf->Cell(55 ,6,$row['branch_description'],1,1,'L');		
				$number++;
				//$pdf->Cell(45 ,6,$row['officer_contact_number'],1,1,'C');
			}	
				
				$pdf -> output ('OFFICER_DETAILS_SUMMARY.pdf','D');  		
		}
		
		
	
	public function getBranch()
		{
			$this->db->select('branch_code,branch_description');
			$this->db->from('com_branch');
			$this->db->order_by('branch_description', 'asc');
			$query=$this->db->get();
			
			
			$branchList = array();
			
			$branchList = array('' => 'SELECT BRANCH');
			
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
			$this->db->select('provider_id,provider_description');
			$this->db->from('provider_details');
			$this->db->order_by('provider_description', 'asc');
			$query=$this->db->get();
			
			$officerList = array();
			
			$officerList = array('' => 'Provider');
			foreach ($query->result_array() as $row) 
			{
				$officerList[$row['provider_id']] = $row['provider_description'];
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
			
			$categoryList = array('' => 'Category');
			foreach ($query->result_array() as $row) 
			{
				$categoryList[$row['category_id']] = $row['category_name'];
			}	
			return $categoryList;
		}
	
	public function getDistrict()
		{
			$this->db->select('brn_id,brn_district_code,branch_description');
			$this->db->from('district_branch');
			$this->db->join('com_branch','branch_code = brn_district_code','inner');
			$this->db->order_by('branch_description', 'asc');
			$this->db->group_by('brn_district_code');
			$query=$this->db->get();
	
			$districtList = array();
			
			$districtList = array('' => 'SELECT DISTRICT');
			foreach ($query->result_array() as $row) 
			{
				$districtList[$row['brn_district_code']] = $row['branch_description'];
			}	
			return $districtList;
		}

}


