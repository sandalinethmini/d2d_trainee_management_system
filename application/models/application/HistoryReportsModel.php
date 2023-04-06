<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HistoryReportsModel extends CI_Model {

	var $table = 'site_details';
	var $column_order = array(null, 'site_branch_id','site_provider','site_category','site_account_no','site_circuit_id'); //set column field database for datatable orderable
	var $column_search = array('site_branch_id','site_provider','site_category','site_account_no','site_circuit_id'); //set column field database for datatable searchable 
	var $order = array('site_branch_id' => 'asc'); // default order 
	

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
		$this->db->select(' site_id,
							site_branch_id,
							branch_description,
							provider_description,
							category_name,
							site_account_no,
							site_circuit_id,
							bandwidth_name,
							site_status');
		$this->db->from('site_details');
		$this->db->join('com_branch','branch_code = site_branch_id','inner');
		$this->db->join('provider_details','provider_id = site_provider','inner');
		$this->db->join('bandwidth_details','bandwidth_id = site_current_bandwidth','inner');
		$this->db->join('category_details','category_id = site_category','inner');
		$this->db->join('connection_details','connection_id = site_connection_type','inner');
	//	$this->db->where('provider_status', );
		
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
	
	
	public function getBandwidthHistory($bandwidth_site_id)
	{
		$this->db->select(" history_bandwidth_id,						
							bandwidth_type,
							bandwidth_name,
							history_bandwidth_start_date,
							COALESCE(history_bandwidth_close_date, '-') AS history_bandwidth_close_date ");
		$this->db->join('bandwidth_type_details','bandwidth_type_id = history_bandwidth_type','inner');
		$this->db->join('bandwidth_details','bandwidth_id = history_bandwidth','inner');
		$this->db->from('history_bandwidth');
		$this->db->where('history_bandwidth_site_id', $bandwidth_site_id);
		$this->db->order_by('history_bandwidth_start_date', 'asc');
			$query = $this->db->get();
			return $query->result();
	}
	
	public function get_datatables2()
	{
		$this->history_bandwidth();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
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
	
	
	public function changeStatus($site_id,$site_status)
	{
		$this->db->trans_begin();

		$data = array('site_status' => $site_status);
		$this->db->where('site_id', $site_id);
		$this->db->update('site_details', $data); 
		
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
			$this->db->select('site_id,branch_code,branch_description,category_name,officer_name,officer_contact_number,provider_id,connection_name,site_circuit_id,site_account_no,provider_description,site_iprange,site_connection_started_date,bandwidth_type,bandwidth_name');
			$this->db->join('bandwidth_type_details','bandwidth_type_id = site_bandwidth_type','inner');
			$this->db->join('bandwidth_details','bandwidth_id = site_current_bandwidth','inner');
			$this->db->join('provider_details','provider_id = site_provider','inner');
			$this->db->join('officer_details','officer_id = site_officer_name','inner');
			$this->db->join('com_branch','branch_code = site_branch_id','inner');
			$this->db->join('category_details','category_id = site_category','inner');
			$this->db->join('connection_details','connection_id = site_connection_type','inner');
			$this->db->from('site_details');
			//$this->db->join('ceb_area','area_id = system_user_area_id','inner');
			$this->db->where('site_id', $site_id);
			$result = $this->db->get()->row();
			return $result;
		}	
	
}


