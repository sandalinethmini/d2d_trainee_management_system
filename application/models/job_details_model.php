<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH .'third_party\fpdf\fpdf.php');
class job_details_model extends CI_Model {

    protected $table = 'job_details';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'time_range', 'employer_name', 'position', 'no_of_years', 'reason_to_resign'];
    
}
