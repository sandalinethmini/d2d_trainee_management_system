<?php 
class Header_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();	
	}
	function menuLoad()
	{
		$session_id			=	session_id();
		$ip_address			=	$_SERVER['REMOTE_ADDR'];
		//$user_area			=	$this->session->userdata('user_area');
		$user_id			=	$this->session->userdata('user_id');
		$user_name			=	$this->session->userdata('user_name');
		
		$previous_session_id	=	"";
		$previous_session_ip	=	"";
		$data					=	"";
		
		$home = true;
		
		$master_data			=	false;
		$application			=	false;
		$job_report				=	false;
		$job_details			=	false;
		$history_reports		=	false;
		$officer_details		=	false;
		$circuit_details		=	false;
		$officer_detail_report	=	false;
		$sdwan_details          =   false;
		$sdwan_job_details      =   false;
		$sdwan_job_report       =   false;
		
		$reports	=	false;
		
		
		$user_details		=	false;
		
		$password_reset 	= false;
		
		
		$this->db->select('last_session_id,last_ip');
		$query		=	$this->db->get_where('ceb_last_session',array('last_user_id'=>$user_id)); 
		
			$row = $query->row();					
			$previous_session_id	=	$row->last_session_id;
			$previous_session_ip	=	$row->last_ip;	
		
		if($session_id==$previous_session_id)			
		{
			$this->db->trans_start();
			$this->db->select('ceb_page_names.page_name');
			$this->db->from('ceb_access_permission');
			$where_array	=	array('ceb_page_names.page_status' => 1, 'ceb_access_permission.access_status' => 1, 'ceb_access_permission.access_user_id' => $user_id);
			$this->db->where($where_array);
			$this->db->join('ceb_page_names','ceb_access_permission.access_page_id = ceb_page_names.page_id','inner');
			$query		=	$this->db->get();  
				
			foreach($query->result_array() as $row)
				{	
					if ($row["page_name"] == "user_details")
						{
							$master_data	=	true;
							$user_details	=	true;				
						}
					
					////////////////////////// Application
					
					if ($row["page_name"] == "application")
						{
							$application	=	true;			
						}
					
					if ($row["page_name"] == "password_reset") 
						{
							$password_reset	=	true;			
						}
					
					if ($row["page_name"] == "job_report")
						{
							$job_report	=	true;	
							$reports	=	true;		
						}
					
					if ($row["page_name"] == "job_details") 
						{
							$job_details	=	true;			
						}
						
					if ($row["page_name"] == "history_reports") 
						{
							$history_reports	=	true;
							$reports	=	true;			
						}
						
					if ($row["page_name"] == "officer_details") 
						{
							$officer_details	=	true;			
						}
						
					if ($row["page_name"] == "circuit_details") 
						{
							$circuit_details	=	true;			
						}
					if ($row["page_name"] == "officer_detail_report") 
						{
							$officer_detail_report	=	true;	
							$reports	=	true;		
						}
						
					if ($row["page_name"] == "sdwan_details") 
					{
						$sdwan_details	=	true;		
					}
					if ($row["page_name"] == "sdwan_job_details") 
					{
						$sdwan_job_details	=	true;		
					}
					if ($row["page_name"] == "sdwan_job_report") 
					{
						$sdwan_job_report	=	true;	
						$reports	=	true;		
					}
										
			}
									
			$data	=	array(	
				'master_data'=>$master_data, 
				'application'=>$application, 
				'user_details'=>$user_details,
				'password_reset'=>$password_reset,
				'job_report'=>$job_report,
				'job_details'=>$job_details,
				'history_reports'=>$history_reports,
				'officer_details'=>$officer_details,
				'circuit_details'=>$circuit_details,
				'officer_detail_report'=>$officer_detail_report,
				'reports'=>$reports,
				'sdwan_details'=>$sdwan_details,
				'sdwan_job_details'=>$sdwan_job_details,
				'sdwan_job_report'=>$sdwan_job_report
			);		
				
			$this->db->trans_complete();					
			return $data;		
		}
		else
			return "";				
	}
	
	function pageLoad($pageId)
	{
		if($pageId==-100)
		{			
			return true;
		}
		else
		{
			$user_id	=	$this->session->userdata('user_id');
		
			$this->db->trans_start();
			$this->db->select('access_id');
			$this->db->from('ceb_access_permission');
			$this->db->where('access_page_id',$pageId);
			$this->db->where('access_user_id',$user_id);
			
			$query		=	$this->db->get();
			$this->db->trans_complete();
			
			if($this->db->trans_status() === TRUE){}
			
			if ($query->num_rows() > 0)	
				return true;
			else
				return false;	
		}
		
		
		
	}
}
?>