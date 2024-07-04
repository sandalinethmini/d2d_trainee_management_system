<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recent_trainee_model extends CI_Model {

    public function get_all_trainees($search = '', $start = 0, $length = 10, $order_column = 1, $order_dir = 'asc') {
        $this->db->select('td.*, d.district_description, b.branch_description, rd.start_date, rd.end_date')
                 ->from('trainee_data as td')
                 ->join('district as d', 'td.emp_district = d.district_code', 'left')
                 ->join('registration_details as rd', 'td.emp_nic = rd.nic', 'left')
                 ->join('branch as b', 'td.emp_branch = b.branch_code', 'left');

        if (!empty($search)) {
            $this->db->group_start()
                     ->like('td.emp_full_name', $search)
                     ->or_like('td.emp_nic', $search)
                     ->group_end();
        }

        
        $this->db->where('(DATEDIFF(CURDATE(), td.emp_start_date) < 30 OR DATEDIFF(CURDATE(), rd.start_date) < 30)');

        $order_columns = array('td.emp_nic', 'b.branch_description', 'd.district_description', 'td.emp_full_name', 'td.emp_reg_no', 'rd.start_date', 'rd.end_date');
        $this->db->order_by($order_columns[$order_column], $order_dir);

        if ($length != -1) {
            $this->db->limit($length, $start);
        }

        $query = $this->db->get();
        return $query->result_array();
    }

    public function count_all_trainees() {
        $this->db->from('trainee_data as td')
                 ->join('district as d', 'td.emp_district = d.district_code', 'left')
                 ->join('registration_details as rd', 'td.emp_nic = rd.nic', 'left')
                 ->join('branch as b', 'td.emp_branch = b.branch_code', 'left');

        
        $this->db->where('(DATEDIFF(CURDATE(), td.emp_start_date) < 30 OR DATEDIFF(CURDATE(), rd.start_date) < 30)');

        return $this->db->count_all_results();
    }

    public function count_filtered_trainees($search = '') {
        $this->db->from('trainee_data as td')
                 ->join('district as d', 'td.emp_district = d.district_code', 'left')
                 ->join('registration_details as rd', 'td.emp_nic = rd.nic', 'left')
                 ->join('branch as b', 'td.emp_branch = b.branch_code', 'left');

        if (!empty($search)) {
            $this->db->group_start()
                     ->like('td.emp_full_name', $search)
                     ->or_like('td.emp_nic', $search)
                     ->group_end();
        }

        
        $this->db->where('(DATEDIFF(CURDATE(), td.emp_start_date) < 30 OR DATEDIFF(CURDATE(), rd.start_date) < 30)');

        return $this->db->count_all_results();
    }
}
?>
