 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JobsModel extends CI_Model {

	var $table = 'site_details';
	var $column_order = array(null, 'site_branch_id', 'site_category', 'site_provider', 'site_iprange', 'site_circuit_id'); //set column field database for datatable orderable
	var $column_search = array('site_branch_id', 'site_circuit_id'); //set column field database for datatable searchable 
	var $order = array('site_branch_id' => 'asc'); // default order 
	
	
	

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Colombo');
		//require(APPPATH .'third_party/fpdf/fpdf.php');		
	}
	
	//Data table
	public function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}
	
	//Data table query
	private function _get_datatables_query()
	{
		$this->db->select( 'job_id,
							job_status,
							job_site_id,
							branch_description,
							site_branch_id, 
							category_name, 
							provider_description,
							site_category, 
							site_provider, 
							site_circuit_id,
							site_iprange ');
		
		$this->db->where('job_status', '0');
		$this->db->from('site_details');
		$this->db->join('job_details','job_site_id = site_id','inner');
		$this->db->join('category_details','category_id = site_category','inner');
		$this->db->join('provider_details','provider_id = site_provider','inner');
		//$this->db->where('job_site_id' );
		$this->db->join('com_branch','branch_code = site_branch_id','inner');
		
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
		$this->db->from('job_details');
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
	
	public function getRemark()
	{
		$this->db->select('job_remark_id,job_remark_description');
		$this->db->from('job_remark_details');
		//$this->db->order_by('job_remark_description', 'asc');
		$query=$this->db->get();
		
		$remarkList = array();
		
		$remarkList = array('' => 'REMARK');
		foreach ($query->result_array() as $row) 
		{
			$remarkList[$row['job_remark_id']] = $row['job_remark_description'];
		}	
		return $remarkList;
	}
	
	
	public function getCategoryDetails($branchCode)
	{
		$this->db->select('site_category,category_name');
		$this->db->from('site_details');
		$this->db->join('category_details','category_id = site_category','inner');
		
		//$this->db->where('site_status', 1);
		$this->db->where('site_branch_id', $branchCode);
		$query=$this->db->get();
	
		$category_data= $query->result();
		
		$category_arr[] = array( 'site_category'	 => "",
		   						'category_name' => "-- Select Category --");
		
        foreach ($category_data as $results)
		{
			 $category_arr[] = array('site_category' 	=> $results->site_category,
		   							'category_name' => $results->category_name);	
        }
		return 	$category_arr;
	}
	
	
	public function getProviderDetails($categoryList,$branchCode)
	{
		$this->db->select('site_id,provider_description');
		$this->db->from('site_details');
		$this->db->join('provider_details','provider_id = site_provider','inner');
		
		//$this->db->where('site_status', 1);
		$this->db->where('site_category', $categoryList);
		$this->db->where('site_branch_id', $branchCode);
		$query=$this->db->get();
	
		$provider_data= $query->result();
		
		$provider_arr[] = array( 'site_id'	 => "",
		   						'provider_description' => "-- Select Provider --");
		
        foreach ($provider_data as $results)
		{
			 $provider_arr[] = array('site_id' 	=> $results->site_id,
		   							'provider_description' => $results->provider_description);	
        }
		return 	$provider_arr;
	}
	
	
	public function getIpDetails($site_id)
	{
		$this->db->select('site_id,site_iprange,site_circuit_id');
		$this->db->from('site_details');
		
		//$this->db->where('site_status', 1);
		$this->db->where('site_id', $site_id);
		$query=$this->db->get();
		return $query->row();
	
	}
	
	
	public function save_record($downDate, $upDate, $complaintID, $remark, $site_ID)
	{
		$this->db->trans_begin();
		
		if($upDate=="")
			{
				$upDate = NULL;
				$status = 0;
			}
		else
		{
				$status = 1;
		}
				$data = array( 'job_down_time' => $downDate ,
							   'job_up_time' => $upDate, 
							   'job_complaint_id' => $complaintID ,
							   'job_remark' => $remark, 
							   'job_site_id' => $site_ID,
							   'job_status' => $status,  
							   'job_entered_user_id' => $this->session->userdata('user_id'),
					  		   'job_entered_time' => date("Y-m-d G:i:s") );
				
				$this->db->join('site_details','site_id = job_site_id','inner');
				$this->db->insert('job_details', $data);
				
			
				
		if ($this->db->trans_status() === FALSE)
			{
				$this->db->trans_rollback();
				$this->session->set_flashdata('fail', 'Data Not Saved. Try Again');
				header( 'Location: '.base_url("index.php/application/Jobs") ) ;
			}
		else
			{
				$this->db->trans_commit();
				$this->session->set_flashdata('success', 'Data Successfully Saved');
				header( 'Location: '.base_url("index.php/application/Jobs") ) ;
			}
	}
	

	public function editRecord($job_ID)
		{		
			$this->db->select(' job_id,job_site_id,
							    site_branch_id,
								site_category,
								site_provider,
								site_circuit_id,
								site_iprange,
								job_down_time,
								job_up_time,
								job_complaint_id,
								job_remark' );
			
			$this->db->join('job_details','job_site_id = site_id','inner');
			$this->db->join('category_details','category_id = site_category','inner');
			$this->db->join('provider_details','provider_id = site_provider','inner');
			
			$this->db->from('site_details');
			$this->db->where('job_id', $job_ID);
			$result = $this->db->get()->row();
			return $result;
		}	
		
	
	public function updateJobDetails( $downDate, $upDate, $complaintID, $remark, $site_ID, $job_id)
	{
		$this->db->trans_begin();
		
		if($upDate == "")
			{
				$data = array( 'job_down_time' => $downDate , 
							   'job_complaint_id' => $complaintID ,
							   'job_remark' => $remark, 
							   'job_id' => $job_id,
							   'job_site_id' => $site_ID, 
							   'job_last_updated_user_id' => $this->session->userdata('user_id'),
							   'job_last_updated_time' => date("Y-m-d G:i:s") );
			}
			else
			{
				$data = array( 'job_down_time' => $downDate ,
							   'job_up_time' => $upDate, 
							   'job_complaint_id' => $complaintID ,
							   'job_remark' => $remark, 
							   'job_status' => 1, 
							   'job_site_id' => $site_ID, 
							   'job_completed_user_id' => $this->session->userdata('user_id'),
							   'job_completed_time' => date("Y-m-d G:i:s") );
			}
		
		

		//$this->db->set('job_status', '1');
		$this->db->where('job_id', $job_id);
		$this->db->where('job_site_id', $site_ID);
		$this->db->update('job_details', $data);
		
				
		if ($this->db->trans_status() === FALSE)
		{
				$this->db->trans_rollback();
				$this->session->set_flashdata('fail', 'Data Not Saved. Try Again');
				header( 'Location: '.base_url("index.php/application/Jobs") ) ;
		}
		else
		{
			$this->db->trans_commit();
			$this->session->set_flashdata('success', 'Data Successfully Updated');
			header( 'Location: '.base_url("index.php/application/Jobs") ) ;
		}
	}
	
}


