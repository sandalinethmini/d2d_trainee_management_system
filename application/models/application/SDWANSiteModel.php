<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SDWANSiteModel extends CI_Model {

	var $table = 'site_details';
	var $column_order = array(null, 'site_branch_id','site_provider','site_category','site_account_no','site_circuit_id'); //set column field database for datatable orderable
	var $column_search = array('site_branch_id','site_provider','site_category','site_account_no','site_circuit_id'); //set column field database for datatable searchable 
	var $order = array('branch_code' => 'asc'); // default order 
	

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
		$this->db->select(" com_branch.branch_code AS code,
							com_branch.branch_description AS branch,
							nw_sd_wan_details.sdwan_account_no AS account_no,
							category_details.category_name AS category,
							CONCAT(a.provider_description,' / ',b.provider_description) AS connection_provider,
							nw_sd_wan_details.sdwan_id AS sdwan_id,
							nw_sd_wan_details.sdwan_status AS status");
		$this->db->from('nw_sd_wan_details');
		$this->db->join('com_branch','com_branch.branch_code = nw_sd_wan_details.sdwan_branch_id','inner');
		$this->db->join('category_details','category_details.category_id = nw_sd_wan_details.sdwan_category','inner');
		$this->db->join('nw_sd_connections','nw_sd_connections.nw_sd_connection_id = nw_sd_wan_details.sdwan_connection_provider','inner');
		$this->db->join('provider_details a','a.provider_id = nw_sd_connections.nw_sd_connection_provider_1','inner');
		$this->db->join('provider_details b','b.provider_id = nw_sd_connections.nw_sd_connection_provider_2','inner');

		
		$i = 0;
		
		$srchval	=	$_POST['search']['value'];
		$srchval = strtoupper($srchval);
		
		foreach ($this->column_search as $item) // loop column 
		{
			if($srchval) // if datatable send POST for search
			{			
				if($i===0) // first loop
				{
					$this->db->group_start();   // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
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
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
	
	public function getBranch()
	{
		$this->db->select('branch_code,branch_description');
		$this->db->from('com_branch');
		$this->db->order_by('branch_description', 'asc');
		$query=$this->db->get();
		
		$branchList = array();
		
		$branchList = array('' => 'Select Branch');
		foreach ($query->result_array() as $row) 
		{
			$branchList[$row['branch_code']] = $row['branch_code'].' - '. $row['branch_description'];
		}	
		return $branchList;
	}

	
	public function getOfficer()
	{
		$this->db->select('officer_id,officer_name');
		$this->db->from('officer_details');
		$this->db->order_by('officer_name', 'asc');
		$query=$this->db->get();
		
		$officerList = array();
		
		$officerList = array('' => 'Select IT Officer');
		foreach ($query->result_array() as $row) 
		{
			$officerList[$row['officer_id']] = $row['officer_name'];
		}	
		return $officerList;
	}

	public function getProvider()
	{
		$this->db->select('sdwan_provider_id,sdwan_provider_description');
		$this->db->from('nw_sd_wan_provider');
		$this->db->order_by('sdwan_provider_description', 'asc');
		$query=$this->db->get();
		
		$officerList = array();
		
		$officerList = array('' => 'Select Provider');
		foreach ($query->result_array() as $row) 
		{
			$officerList[$row['sdwan_provider_id']] = $row['sdwan_provider_description'];
		}	
		return $officerList;
	}
	
	public function getConnection()
	{
		$this->db->select("nw_sd_connections.nw_sd_connection_id AS connection_id,CONCAT(a.provider_description,' / ',b.provider_description) AS connection_name");
		$this->db->from('nw_sd_connections');
		$this->db->join('provider_details a','a.provider_id = nw_sd_connections.nw_sd_connection_provider_1','inner');
		$this->db->join('provider_details b','b.provider_id = nw_sd_connections.nw_sd_connection_provider_2','inner');
		$query=$this->db->get();
		
		$connectionList = array();
		
		$connectionList = array('' => 'Select Connections');
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
		
		$categoryList = array('' => 'Select Category');
		foreach ($query->result_array() as $row) 
		{
			$categoryList[$row['category_id']] = $row['category_name'];
		}	
		return $categoryList;
	}
	
	
	
	
	public function save_record($branch,$category,$officer,$accno,$provider,$connection,$startdate)
	{
		$this->db->trans_begin();
		
		$data = array('sdwan_branch_id' => $branch, 'sdwan_category' => $category,'sdwan_officer_name'=> $officer,'sdwan_account_no' => $accno,'sdwan_provider' => $provider ,'sdwan_connection_provider' => $connection,'sdwan_connection_started_date' => $startdate);
		$this->db->insert('nw_sd_wan_details', $data);
				
		if ($this->db->trans_status() === FALSE)
		{
				$this->db->trans_rollback();
				$this->session->set_flashdata('fail', 'Data Not Saved. Try Again');
				header( 'Location: '.base_url("index.php/application/SDWANSite") ) ; 
		}
		else
		{
			$this->db->trans_commit();
			$this->session->set_flashdata('success', 'Data Successfully Saved');
			header( 'Location: '.base_url("index.php/application/SDWANSite") ) ;
		}
	}
	
	
	
	
	public function changeStatus($site_id,$site_status)
	{
		$this->db->trans_begin();

		$data = array('sdwan_status' => $site_status);
		$this->db->where('sdwan_id', $site_id);
		$this->db->update('nw_sd_wan_details', $data); 
		
		if ($this->db->trans_status() === FALSE)
		{
				$this->db->trans_rollback();
		}
		else
		{	
			$this->db->trans_commit();
			if($site_status==1)echo "Circuit ID Activated";
			if($site_status==0)echo "Circuit ID De-Activated";
		}	
	}

	public function editRecord($site_id)
	{		
		$this->db->select('sdwan_id, sdwan_branch_id, sdwan_category,sdwan_officer_name,sdwan_account_no,sdwan_provider,sdwan_connection_provider,sdwan_connection_started_date');
		$this->db->from('nw_sd_wan_details');
		$this->db->where('sdwan_id', $site_id);
		$result = $this->db->get()->row();
		return $result;
	}	
	
	
	public function update_record($branch,$category,$officer,$accno,$provider,$connection,$startdate,$site_id)
	{
		$this->db->trans_begin();
		
		$data = array('sdwan_branch_id' => $branch, 'sdwan_category' => $category,'sdwan_officer_name'=> $officer,'sdwan_account_no' => $accno,'sdwan_provider' => $provider ,'sdwan_connection_provider' => $connection,'sdwan_connection_started_date' => $startdate);

		$this->db->where('sdwan_id', $site_id);
		$this->db->update('nw_sd_wan_details', $data);
				
		if ($this->db->trans_status() === FALSE)
		{
				$this->db->trans_rollback();
				$this->session->set_flashdata('fail', 'Data Not Saved. Try Again');
				header( 'Location: '.base_url("index.php/application/SDWANSite") ) ;
		}
		else
		{
			$this->db->trans_commit();
			$this->session->set_flashdata('success', 'Data Successfully Updated');
			header( 'Location: '.base_url("index.php/application/SDWANSite") ) ;
		}
	}

}


