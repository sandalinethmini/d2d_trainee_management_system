 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SDWANJobsModel extends CI_Model {

	var $table = 'site_details';
	var $column_order = array(null, 'site_branch_id', 'site_category', 'site_provider', 'site_iprange', 'site_circuit_id'); //set column field database for datatable orderable
	var $column_search = array('site_branch_id', 'site_circuit_id'); //set column field database for datatable searchable 
	var $order = array('sdwan_job_down_time' => 'desc'); // default order 
	
	
	

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
		$this->db->select( ' branch_code,
							 branch_description,
							 category_name,
							 sdwan_provider_description,
							 sdwan_account_no,
							 sdwan_job_id,
							 sdwan_job_down_time,
							 sdwan_job_status,
							 category_id,
							 sdwan_provider_id');
		$this->db->from('nw_sd_wan_details');
		$this->db->join('com_branch','branch_code = sdwan_branch_id','inner');
		$this->db->join('category_details','category_id = sdwan_category','inner');
		$this->db->join('nw_sd_wan_provider','sdwan_provider_id = sdwan_provider','inner');
		$this->db->join('nw_sdwan_job_details','sdwan_id =  sdwan_job_site_id','inner');	
		$this->db->where('sdwan_job_status', '0');
		
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
		
		$branchList = array('' => '-- Select Branch --');
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
		$query=$this->db->get();
		
		$remarkList = array();
		
		$remarkList = array('' => '-- Select Remark --');
		foreach ($query->result_array() as $row) 
		{
			$remarkList[$row['job_remark_id']] = $row['job_remark_description'];
		}	
		return $remarkList;
	}
	
	
	public function getCategoryDetails($branchCode)
	{
		$this->db->select('sdwan_category,category_name');
		$this->db->from('nw_sd_wan_details');
		$this->db->join('category_details','category_id =  sdwan_category','inner');
		$this->db->where('sdwan_branch_id', $branchCode);
		$query=$this->db->get();
	
		$category_data= $query->result();
		
		$category_arr[] = array( 'sdwan_category'	 => "",
		   						'category_name' => "-- Select Category --");

		
        foreach ($category_data as $results)
		{
			 $category_arr[] = array('sdwan_category' 	=> $results->sdwan_category,
		   							'category_name' => $results->category_name);	
        }
		return 	$category_arr;
	}
	
	public function loadCategoryDetails($branchCode)
	{
		$this->db->select('sdwan_category,category_name');
		$this->db->from('nw_sd_wan_details');
		$this->db->join('category_details','category_id =  sdwan_category','inner');
		$this->db->where('sdwan_branch_id', $branchCode);
		$query=$this->db->get();
		
		$category_arr = array();
		$category_arr = array('' => '-- Select Category --');
		foreach ($query->result_array() as $row) 
		{
			$category_arr[$row['sdwan_category']] = $row['category_name'];
		}
		return $category_arr;
	}
	
	
	public function getProviderDetails($categoryList,$branchCode)
	{
		$this->db->select(' sdwan_id,sdwan_provider_description');
		$this->db->from('nw_sd_wan_details');
		$this->db->join('nw_sd_wan_provider','sdwan_provider_id =  sdwan_provider','inner');
		$this->db->where('sdwan_category', $categoryList);
		$this->db->where('sdwan_branch_id', $branchCode);
		$query=$this->db->get();
	
		$provider_data= $query->result();
		
		$provider_arr[] = array( 'sdwan_id'	 => "",
		   						'sdwan_provider_description' => "-- Select Provider --");
		
        foreach ($provider_data as $results)
		{
			 $provider_arr[] = array('sdwan_id' 	=> $results->sdwan_id,
		   							'sdwan_provider_description' => $results->sdwan_provider_description);	
        }
		return 	$provider_arr;
	}
	
	public function loadProviderDetails($categoryList,$branchCode)
	{
		$this->db->select(' sdwan_id,sdwan_provider_description');
		$this->db->from('nw_sd_wan_details');
		$this->db->join('nw_sd_wan_provider','sdwan_provider_id =  sdwan_provider','inner');
		$this->db->where('sdwan_category', $categoryList);
		$this->db->where('sdwan_branch_id', $branchCode);
		$query=$this->db->get();
		
		$provider_arr = array();
		$provider_arr = array('' => '-- Select Provider --');
		foreach ($query->result_array() as $row) 
		{
			$provider_arr[$row['sdwan_id']] = $row['sdwan_provider_description'];
		}
		return $provider_arr;
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
				$data = array( 'sdwan_job_down_time' => $downDate ,
							   'sdwan_job_up_time' => $upDate, 
							   'sdwan_job_complaint_id' => $complaintID ,
							   'sdwan_job_remark' => $remark, 
							   'sdwan_job_site_id' => $site_ID,
							   'sdwan_job_status' => $status,  
							   'sdwan_job_entered_user_id' => $this->session->userdata('user_id'),
					  		   'sdwan_job_entered_time' => date("Y-m-d G:i:s") );
				
				$this->db->insert('nw_sdwan_job_details', $data);
				
			
				
		if ($this->db->trans_status() === FALSE)
			{
				$this->db->trans_rollback();
				$this->session->set_flashdata('fail', 'Data Not Saved. Try Again');
				header( 'Location: '.base_url("index.php/application/SDWANJobs") ) ;
			}
		else
			{
				$this->db->trans_commit();
				$this->session->set_flashdata('success', 'Data Successfully Saved');
				header( 'Location: '.base_url("index.php/application/SDWANJobs") ) ;
			}
	}
	

	public function editRecord($job_ID)
		{		
			$this->db->select('  sdwan_job_id,
								 sdwan_job_site_id,
								 sdwan_job_down_time,
								 sdwan_job_up_time,
								 sdwan_job_complaint_id,
								 sdwan_job_remark,
								 sdwan_category,
								 sdwan_provider,
								 sdwan_branch_id' );
			$this->db->from('nw_sdwan_job_details');
			$this->db->join('nw_sd_wan_details','sdwan_id =  sdwan_job_site_id','inner');			
			$this->db->where('sdwan_job_status', 0);
			$this->db->where('sdwan_job_id', $job_ID);
			$result = $this->db->get()->row();
			return $result;
		}	
		
	
	public function updateJobDetails( $downDate, $upDate, $complaintID, $remark, $site_ID, $job_id)
	{
		$this->db->trans_begin();
		
		if($upDate == "")
			{
				$data = array( 'sdwan_job_down_time' => $downDate ,
							   'sdwan_job_complaint_id' => $complaintID ,
							   'sdwan_job_remark' => $remark,
							   'sdwan_job_site_id' => $site_ID, 
							   'sdwan_job_last_updated_user_id' => $this->session->userdata('user_id'),
							   'sdwan_job_last_updated_time' => date("Y-m-d G:i:s") );
			}
			else
			{
				$data = array( 'sdwan_job_down_time' => $downDate ,
							   'sdwan_job_up_time' => $upDate, 
							   'sdwan_job_complaint_id' => $complaintID ,
							   'sdwan_job_remark' => $remark, 
							   'sdwan_job_site_id' => $site_ID,
							   'sdwan_job_status' => 1,  
							   'sdwan_job_completed_user_id' => $this->session->userdata('user_id'),
					  		   'sdwan_job_completed_time' => date("Y-m-d G:i:s") );
			}

			$this->db->where('sdwan_job_status', 0);
			$this->db->where('sdwan_job_id', $job_id);
			$this->db->where('sdwan_job_site_id', $site_ID);
			$this->db->update('nw_sdwan_job_details', $data);
						
		if ($this->db->trans_status() === FALSE)
		{
				$this->db->trans_rollback();
				$this->session->set_flashdata('fail', 'Data Not Saved. Try Again');
				header( 'Location: '.base_url("index.php/application/SDWANJobs") ) ;
		}
		else
		{
			$this->db->trans_commit();
			$this->session->set_flashdata('success', 'Data Successfully Updated');
			header( 'Location: '.base_url("index.php/application/SDWANJobs") ) ;
		}
	}	
}
