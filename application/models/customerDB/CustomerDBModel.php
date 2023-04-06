<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerDBModel extends CI_Model {

	var $table = 'branch_details';
	var $column_order = array(null, 'branch_code','branch_description','address','b_office_no','b_email'); //set column field database for datatable orderable
	var $column_search = array('branch_code','branch_description','address','b_office_no','b_email'); //set column field database for datatable searchable 
	var $order = array('branch_description' => 'asc'); // default order 

	public function __construct()
	{
		parent::__construct();	
	}

	public function getConsumerDetails($cif)
	{
		$DB1 = $this->load->database('customer_db', TRUE);

			
				$DB1->select('ACCT_NUM,CUST_FNAME,CUST_LNAME,ADDRESS_1,ADDRESS_2,ADDRESS_3');
				$DB1->from('customer_info_366');
				$DB1->where('ACCT_NUM', $cif);
				$result = $DB1->get();
				
				$row = $result->row();					
				$customer = "";		//$previous_session_id	=	$row->last_session_id;
				if($row)
				{
					//if($row->CLIENTS_CATEGORY=='I'){$CLIENTS_CATEGORY ='Individual Account';} 
					//elseif($row->CLIENTS_CATEGORY=='J') { $CLIENTS_CATEGORY = 'Joint Account';}
					//else {$CLIENTS_CATEGORY = 'Invalid Account Type';}
					
					$customer = array();
					
					$customer = array('firstname' => $row->CUST_FNAME,
										'lastname' => $row->CUST_LNAME,
										'addr1' => $row->ADDRESS_1,
										'addr2' => $row->ADDRESS_2,
										'addr3' => $row->ADDRESS_3,
										'account' => $row->ACCT_NUM);

			}
			$this->load->database('customer_db', false);
			return $customer;

	}

}
