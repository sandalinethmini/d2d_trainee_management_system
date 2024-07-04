<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
include "application/controllers/header/header_page.php";

class Trainee_pdf extends Header_page {
    public function __construct() {
        parent::__construct();
        $this->load->model('trainee_pdf_model');
        date_default_timezone_set('Asia/Colombo');
    }

    public function index() {
        if ($this->headerMenu(12)) {
            $data = array('form_valid' => false, 'print_type' => "");
            $this->load->view('trainee_pdf_view', $data);
        } else {
            header('Location: ' . base_url());
        }
    }

    public function printReport() {
        $selectedNIC = $this->input->post("txtSelectedNIC", TRUE);
        $print_type = $this->input->post('print_type', TRUE);
        $data = $this->trainee_pdf_model->printReport($selectedNIC);
    
        if (empty($data['trainee_data'])) {
            // Handle the case where no data is found
            $this->session->set_flashdata('fail', 'No data found for the provided NIC.');
            redirect('trainee_pdf/index');
        } else {
            // Initialize PDF
            $pdf = new FPDF();
            $pdf->AddPage();
            $pdf->Ln();
            $pdf->SetFont('Times', '', 12);
    
            // Assuming the image path is correct and the image exists
            $imagePath = 'images/logo.png';
            $pdf->Image($imagePath, 10, 10, 60, 0); // Change the coordinates and size as needed
    
            foreach ($data['trainee_data'] as $row) {
                // Add trainee data to the PDF
                $pdf->SetXY(130, 10);
                $pdf->Cell(35, 8, "Reference No :", 0, 0);
                $pdf->Cell(20, 8, $row->emp_reference, 0, 1);
    
                $pdf->SetXY(20, 30);
                $pdf->Cell(0, 5, "Trainee Registration Details", 0, 1, 'C');
                $pdf->Cell(20, 10, "", 0, 1);
    
                $pdf->Cell(20, 8, "", 0, 0);
                $pdf->Cell(50, 8, "Registration No", 0, 0);
                $pdf->Cell(30, 8, $row->emp_reg_no, 0, 1);
    
                $pdf->Cell(20, 8, "", 0, 0);
                $pdf->Cell(50, 8, "Branch", 0, 0);
                $pdf->Cell(30, 8, $row->branch_description, 0, 1);
    
                $pdf->Cell(20, 8, "", 0, 0);
                $pdf->Cell(50, 8, "District", 0, 0);
                $pdf->Cell(30, 8, $row->district_description, 0, 1);
    
                $pdf->Cell(20, 8, "", 0, 0);
                $pdf->Cell(50, 8, "Province", 0, 0);
                $pdf->Cell(30, 8, $row->province_description, 0, 1);
    
                $pdf->Cell(20, 8, "", 0, 0);
                $pdf->Cell(50, 8, "Full Name", 0, 0);
                $pdf->MultiCell(140, 8, $row->emp_full_name, 0, 1);
    
                $pdf->Cell(20, 10, "", 0, 0);
                $pdf->Cell(50, 10, "Permanent Address", 0, 0);
                $pdf->MultiCell(130, 8, $row->emp_address, 0, 1);
    
                $pdf->Cell(20, 8, "", 0, 0);
                $pdf->Cell(50, 8, "Contact No", 0, 0);
                $pdf->Cell(30, 8, $row->emp_phone, 0, 1);
    
                $pdf->Cell(20, 10, "", 0, 0);
                $pdf->Cell(50, 10, "Date of Birth", 0, 0);
                $pdf->MultiCell(130, 8, $row->emp_dob, 0, 1);
    
                $pdf->Cell(20, 10, "", 0, 0);
                $pdf->Cell(50, 10, "NIC", 0, 0);
                $pdf->MultiCell(130, 8, $row->emp_nic, 0, 1);
    
                $pdf->Cell(20, 10, "", 0, 1);
            }
    
            // Add education data to the PDF
            $pdf->Cell(20, 10, "", 0, 0);
            $pdf->Cell(50, 10, "Educational Qualifications", 0, 0);
            foreach ($data['education_data'] as $edu) {
                $pdf->MultiCell(130, 8, $edu->education_name, 0, 1);
                $pdf->Cell(70, 8, "", 0, 0);
            }
    
            $pdf->Cell(20, 10, "", 0, 1);
            $pdf->Cell(20, 1, "", 0, 1);
    
            $pdf->Cell(20, 10, "", 0, 0);
            $pdf->Cell(50, 10, "Received Documents", 0, 0);
            foreach ($data['document_data'] as $doc) {
                $pdf->MultiCell(130, 8, $doc->document_name, 0, 1);
                $pdf->Cell(70, 8, "", 0, 0);
            }
    
            $pdf->Cell(20, 10, "", 0, 1);
            $pdf->Cell(20, 1, "", 0, 1);
            $pdf->Cell(20, 8, "", 0, 0);
            $pdf->Cell(50, 8, "All Training Periods", 0, 0);
    
            foreach ($data['registration_data'] as $reg) {
                $pdf->Cell(20, 8, $reg->start_date, 0, 0);
                $pdf->Cell(5, 8, " : ", 0, 0);
                $pdf->Cell(20, 8, $reg->end_date, 0, 0);
                $pdf->Cell(1, 8, "(", 0, 0);
                $pdf->Cell(15, 8, $reg->trainee_type, 0, 0);
                $pdf->Cell(1, 8, ")", 0, 1);
                $pdf->Cell(70, 8, "", 0, 0);
            }
    
            $pdf->Cell(0, 8, "", 0, 1);
    
            // Send headers to force the download
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="' . $row->emp_reference . '.pdf"');
            header('Cache-Control: private, max-age=0, must-revalidate');
            header('Pragma: public');
    
            // Output PDF
            $pdf->Output('D', $row->emp_reference . '.pdf', true);
        }
    
    
    }

    public function getValidation() {
        $this->form_validation->set_rules('txtSelectedNIC', '', 'required');
        $action = $this->input->post('action', TRUE);

        $print_type = "";
        if ($action == 'view_PDF') {
            $print_type = "print_pdf";
        } else if ($action == 'view_Excel') {
            $print_type = "print_excel";
        }

        $this->form_validation->set_error_delimiters('<span class="spanError">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            if ($this->headerMenu(12)) {
                $data = array('form_valid' => false, 'print_type' => "");
                $this->load->view('trainee_pdf_view', $data);
            } else {
                $this->session->set_flashdata('fail', 'Session Expired or Access Denied.');
                header('Location: ' . base_url());
            }
        } else {
            if ($this->headerMenu(12)) {
                $data = array('form_valid' => true, 'print_type' => $print_type);
                $this->load->view('trainee_pdf_view', $data);
            } else {
                $this->session->set_flashdata('fail', 'Session Expired or Access Denied.');
                header('Location: ' . base_url());
            }
        }
    }
}
