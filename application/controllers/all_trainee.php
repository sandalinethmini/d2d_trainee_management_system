<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'third_party/PHPExcel.php';
include "application/controllers/header/header_page.php";

class All_trainee extends Header_page {

    function __construct() {
        parent::__construct();
        $this->load->model('all_trainee_model');
        $this->load->library('form_validation');
        $this->load->model('Commen_model');
        $this->load->model('Commen_model');
        $this->load->model('Commen_model');
    }

    public function index() {
        if ($this->headerMenu(11)) {
            $data['branches'] = $this->Commen_model->get_branches();
            $data['provinces'] = $this->Commen_model->get_provinces();
            $data['districts'] = $this->Commen_model->get_districts();
            
            $this->load->view('all_trainee_view', $data);
        } else {
            header('Location: ' . base_url());
        }
    }

    public function get_districts_by_province() {
        $province_code = $this->input->post('province_code');
        $districts = $this->Commen_model->get_districts_by_province($province_code);
        echo json_encode($districts);
    }

    public function get_branches_by_district() {
        $district_code = $this->input->post('district_code');
        $branches = $this->Commen_model->get_branches_by_district($district_code);
        echo json_encode($branches);
    }

    public function recordlist() {
        $fromDate = $this->input->post("startDate", TRUE);
        $toDate = $this->input->post("endDate", TRUE);
        $branch = $this->input->post("branch", TRUE);
        $district = $this->input->post("district", TRUE);
        $province = $this->input->post("province", TRUE);

        $list = $this->all_trainee_model->get_datatables($fromDate, $toDate, $branch, $district, $province);
        $data = array();
        $no = $_POST['start'] + 1;
        foreach ($list as $item) {
            $row = array();
            $row[] = $no++;
            $row[] = $item->emp_reg_no;
            $row[] = $item->branch_description;
            $row[] = $item->district_description;
            $row[] = $item->province_description;
            $row[] = $item->emp_full_name;
            $row[] = $item->emp_nic;
            $row[] = $item->emp_phone;
            $row[] = $item->start_date;
            $row[] = $item->end_date;
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => count($list),
            "recordsFiltered" => count($list),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function download_excel() {
        $from_date = $this->input->post('txtFromDate');
        $to_date = $this->input->post('txtToDate');
        $branch = $this->input->post("branch");
        $district = $this->input->post("district");
        $province = $this->input->post("province");

        $data = $this->all_trainee_model->get_datatables($from_date, $to_date, $branch, $district, $province);

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()
            ->setCreator("Your Name/Application")
            ->setLastModifiedBy("Your Name/Application")
            ->setTitle("Trainee Details Report")
            ->setSubject("Trainee Details Export")
            ->setDescription("Trainee Details exported on " . date('Y-m-d H:i:s'));

        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Registration Number')
            ->setCellValue('C1', 'Branch')
            ->setCellValue('D1', 'District')
            ->setCellValue('E1', 'Province')
            ->setCellValue('F1', 'Name')
            ->setCellValue('G1', 'NIC')
            ->setCellValue('H1', 'Phone Number')
            ->setCellValue('I1', 'Start Date')
            ->setCellValue('J1', 'Effective Date');

        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(15);

        $row_index = 2;
        $no = 1;
        foreach ($data as $item) {
            $objPHPExcel->getActiveSheet()
                ->setCellValue('A' . $row_index, $no++)
                ->setCellValue('B' . $row_index, $item->emp_reg_no)
                ->setCellValue('C' . $row_index, $item->emp_branch)
                ->setCellValue('D' . $row_index, $item->district_description)
                ->setCellValue('E' . $row_index, $item->province_description)
                ->setCellValue('F' . $row_index, $item->emp_full_name)
                ->setCellValue('G' . $row_index, $item->emp_nic)
                ->setCellValue('H' . $row_index, $item->emp_phone)
                ->setCellValue('I' . $row_index, $item->start_date)
                ->setCellValue('J' . $row_index, $item->end_date);
            $row_index++;
        }

        $objPHPExcel->getActiveSheet()->freezePane('A2');
        $objPHPExcel->setActiveSheetIndex(0);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Trainee_Details.xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit();
    }
}
?>
