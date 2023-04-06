<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OfficerDetailsModel extends CI_Model {

	var $table = 'site_details';
	var $column_order = array(null, 'officer_name'); //set column field database for datatable orderable
	var $column_search = array('officer_name'); //set column field database for datatable searchable 
	var $order = array('officer_id' => 'asc'); // default order 
	

	public function __construct()
	{
		parent::__construct();
		
		//require(APPPATH .'third_party/fpdf/fpdf.php');		
	}
	
	public function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}
	
	private function _get_datatables_query()
	{
		//$this->db->distinct();
		$this->db->select('officer_id, officer_status, officer_name, officer_contact_number,branch_description');
		$this->db->from('officer_details');
		$this->db->join('com_branch','branch_code = officer_district','inner');
		//$this->db->join('district_branch','brn_district_code = officer_district','inner');
		//$this->db->where('provider_status', 1);
		
		$i = 0;
		
		$srchval	=	$_POST['search']['value'];
		$srchval = strtoupper($srchval);
		
		foreach ($this->column_search as $item) // loop column 
		{
			if($srchval) // if datatable send POST for search
			{			
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $srchval);
				}
				else
				{
					$this->db->or_like($item, $srchval);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
						$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}
	
	public function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from('officer_details');
		return $this->db->count_all_results();
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
	
	
	public function getOfficer()
	{
		$this->db->select('officer_id,officer_name');
		$this->db->from('officer_details');
		$this->db->order_by('officer_name', 'asc');
		$query=$this->db->get();
		
		$officerList = array();
		
		$officerList = array('' => 'SELECT OFFICER');
		foreach ($query->result_array() as $row) 
		{
			$officerList[$row['officer_id']] = $row['officer_name'];
		}	
		return $officerList;
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
	
	public function getBandwidth()
	{
		$this->db->select('bandwidth_id,bandwidth_name');
		$this->db->from('bandwidth_details');
		$this->db->order_by('bandwidth_id', 'asc');
		$query=$this->db->get();
		
		$bandwidthList = array();
		
		$bandwidthList = array('' => 'Bandwidth');
		foreach ($query->result_array() as $row) 
		{
			$bandwidthList[$row['bandwidth_id']] = $row['bandwidth_name'];
		}	
		return $bandwidthList;
	}
	
	public function getConnection()
	{
		$this->db->select('connection_id,connection_name');
		$this->db->from('connection_details');
		$this->db->order_by('connection_name', 'asc');
		$query=$this->db->get();
		
		$connectionList = array();
		
		$connectionList = array('' => 'Connection');
		foreach ($query->result_array() as $row) 
		{
			$connectionList[$row['connection_id']] = $row['connection_name'];
		}	
		return $connectionList;
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
	
	public function getLink()
	{
		$this->db->select('link_id,link_type');
		$this->db->from('link_details');
		$this->db->order_by('link_type', 'asc');
		$query=$this->db->get();
		
		$linkList = array();
		
		$linkList = array('' => 'Link Type');
		foreach ($query->result_array() as $row) 
		{
			$linkList[$row['link_id']] = $row['link_type'];
		}	
		return $linkList;
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
	
	public function update_record($officer, $contact, $district, $officerID	)
	{
		$this->db->trans_begin();
		
		$data = array('officer_name' => $officer ,'officer_contact_number' => $contact,'officer_district' => $district );
		$this->db->where('officer_id', $officerID);
		$this->db->update('officer_details', $data);
		//$this->db->join('com_branch','branch_code = brn_district_code','inner');
		
				
		if ($this->db->trans_status() === FALSE)
		{
				$this->db->trans_rollback();
				$this->session->set_flashdata('fail', 'Data Not Saved. Try Again');
				header( 'Location: '.base_url("index.php/application/OfficerDetails") ) ;
		}
		else
		{
			$this->db->trans_commit();
			$this->session->set_flashdata('success', 'Data Successfully Updated');
			header( 'Location: '.base_url("index.php/application/OfficerDetails") ) ;
		}
	}
	
	public function save_record($officer, $contact, $district)
	{
		$this->db->trans_begin();
		
		$data = array('officer_name' => $officer ,'officer_contact_number' => $contact,'officer_district' => $district );
		$this->db->insert('officer_details', $data);
		//$this->db->join('com_branch','branch_code = brn_district_code','inner');
				
		if ($this->db->trans_status() === FALSE)
		{
				$this->db->trans_rollback();
				$this->session->set_flashdata('fail', 'Data Not Saved. Try Again');
				header( 'Location: '.base_url("index.php/application/OfficerDetails") ) ;
		}
		else
		{
			$this->db->trans_commit();
			$this->session->set_flashdata('success', 'Data Successfully Saved');
			header( 'Location: '.base_url("index.php/application/OfficerDetails") ) ;
		}
	}
	
	
	public function changeStatus($officer_ID,$officer_status)
	{
		$this->db->trans_begin();

		$data = array('officer_status' => $officer_status);
		$this->db->where('officer_id', $officer_ID);
		$this->db->update('officer_details', $data); 
		
		if ($this->db->trans_status() === FALSE)
		{
				$this->db->trans_rollback();
		}
		else
		{
				
				$this->db->trans_commit();
				if($officer_status==1)echo "Officer Activated";
				if($officer_status==0)echo "Officer De-Activated";
		}	
	}
	
	public function editRecord($officer_id)
	{		
		$this->db->select('officer_id,officer_name,officer_contact_number,officer_district');
		$this->db->from('officer_details');
		//$this->db->join('com_branch','branch_code = brn_district_code','inner');
		$this->db->join('district_branch','brn_district_code = officer_district','inner');
		//$this->db->join('ceb_area','area_id = system_user_area_id','inner');
		$this->db->where('officer_id', $officer_id);
		$result = $this->db->get()->row();
		return $result;
	}
	
}


