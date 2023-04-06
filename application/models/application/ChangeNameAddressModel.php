<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChangeNameAddressModel extends CI_Model {

	

	public function __construct()
	{
		parent::__construct();
		//define('FPDF_FONTPATH',APPPATH .'third_party/fpdf/font');
		require(APPPATH .'third_party/fpdf/fpdf.php');	
		//require(APPPATH .'third_party/tfpdf/tfpdf.php');	
	}
	
	public function print_application($ownerName,$account,$address1,$address2,$address3,$newAddress,$customerName,$nic,$mobileNo)
	{
		$pdf = new FPDF();
		$pdf -> AddPage('P','A4');
		$pdf -> setDisplayMode ('fullpage');			
		$pdf->AddFont('bindumathi','','FM_BINDU.php');	
		$pdf->SetFont('bindumathi','',11);

		//$pdf->SetXY(15, 10);
		$str = iconv('UTF-8', 'cp1252', ',xld úÿ,sn, uKav,h - lE.,a,');
		
		$pdf->Cell(180, 10, $str , 0,1,'C');
		$pdf->Cell(5, 8, "" , 0,0,'C');
		$str = iconv('UTF-8', 'cp1252', 'úÿ,s mdßfNda.sl .sKqï ysñhdf.a ku iy ,smskfhys ixfYdaOkh lsÍu');
		$pdf->Cell(180, 8, $str , 0,1,'C');
		
		$pdf->Ln();
		
		$pdf->Cell(15, 8, "01'" , 0,0,'C');
		

		$pdf->Cell(56, 8, iconv('UTF-8', 'cp1252', '.sKqï wxlh') , 0,0);
		$pdf->Cell(10, 8, "" , 0,0);
		$finish = true;
		$pdf->SetFont('courier','B',11);
		$all_characters= "";
		$all_characters = str_split($account);
		for($i=0; $i<10; $i++){
			if($finish){
				foreach ($all_characters as $char){
					
						$pdf->Cell(6,6,$char,1,0,'C');
						
					
					$i++;
				}
				//$pdf->SetXY(40, 157);
				$finish = false;
			}
			if($i<10 ){
				$pdf->Cell(6 ,6,"",1,0,'C');
				
			}
			
					
		}
		
		
		$pdf->SetFont('bindumathi','',11);
		
		$pdf->Cell(7 ,7,"",0,1,'C');
		$pdf->Ln();
		
		
		$ownerName = strtoupper($ownerName) ;
		
		$pdf->Cell(15, 7, "02'" , 0,0,'C');

		$pdf->Cell(65, 7, iconv('UTF-8', 'cp1252', 'úÿ,s whmf;ys oekg mj;sk ku') , 0,0);
		$pdf->SetFont('courier','B',11);
		$pdf->Cell(120, 7, $ownerName , 0,1);
		$pdf->Cell(75, 7, "" , 0,1);
		//$pdf->Cell(120, 7, ".............................................................................................." , 0,1);
		$pdf->SetFont('bindumathi','',11);
		
		//$currentAddress = strtoupper($address1) ;
		$pdf->Cell(15, 7, "03'" , 0,0,'C');
		$pdf->Cell(65, 7, iconv('UTF-8', 'cp1252', 'úÿ,s whmf;ys mj;sk ,smskh') , 0,0);
		$pdf->SetFont('courier','B',11);
		$pdf->Cell(120, 5, strtoupper($address1) , 0,1);
		$pdf->Cell(80, 5, "" , 0,0,'C');
		$pdf->Cell(120, 5, strtoupper($address2) , 0,1);
		$pdf->Cell(80, 5, "" , 0,0,'C');
		$pdf->Cell(120, 5, strtoupper($address3) , 0,1);
		$pdf->Cell(75, 5, "" , 0,1);
		//$pdf->Cell(120, 7, ".............................................................................................." , 0,1);
		
		$pdf->SetFont('Arial','',11);
		 $pdf->Cell(120, 2, "________________________________________________________________________________________" , 0,1);
		 $pdf->Ln();
		 
		 $pdf->Cell(25, 7, "(A)" , 0,0,'C');
		 $pdf->SetFont('bindumathi','',11);
		$pdf->Cell(60, 7, iconv('UTF-8', 'cp1252', 'oekg úÿ,s whmf;ys we;s kfuys fjkila isÿlsÍfïoS') , 0,1);
		$pdf->Cell(10, 4, "" , 0,1,'C');
		$pdf->Cell(15, 7, "04'" , 0,0,'C');

		$pdf->Cell(60, 7, iconv('UTF-8', 'cp1252', '.sKqï ysñhdf.a ixfYdaOkh úh hq;= ku uq,l=re iu. ^bx.s%isfhka&') , 0,1);
		$pdf->Cell(10, 2, "" , 0,1,'C');
		$pdf->Cell(10, 7, "" , 0,0,'C');
		//$finish = true;
		//$words = explode(" ", $name_with_initial);
		//$all_characters = str_split($name_with_initial);
		$finish = true;
		$pdf->SetFont('courier','B',10);
		$customerName = strtoupper($customerName) ;
		$all_characters = str_split($customerName);
		for($i=0; $i<50; $i++){
			if($finish){
				foreach ($all_characters as $char){
					if($i==24){
						$pdf->Cell(7 ,6,$char,1,1,'C');
						$pdf->Cell(10  ,1,"    ",0,1,'C');
						$pdf->Cell(10, 6, "" , 0,0,'C');
					}
					else{
						$pdf->Cell(7 ,6,$char,1,0,'C');
					}
					$i++;
				}
				$finish = false;
			}
			//}
			if($i==24 ){
				$pdf->Cell(7 ,6,"",1,1,'C');
				$pdf->Cell(10  ,1,"    ",0,1,'C');
				$pdf->Cell(10, 6, "" , 0,0,'C');
			}
			
			else{
				$pdf->Cell(7 ,6,"",1,0,'C');
			}
		}
		$pdf->Ln();
		
		$pdf->SetFont('bindumathi','',11);
		$pdf->Ln();
		$pdf->Cell(15, 6, "05'" , 0,0,'C');
		$pdf->Cell(56, 6, iconv('UTF-8', 'cp1252', 'cd;sl yeÿkqïm;a wxlh') , 0,0);
		$pdf->Cell(10, 6, "" , 0,0);
		$nic_characters = str_split($nic);
		$finish = true;
		$pdf->SetFont('courier','B',10);
		for($i=0; $i<12; $i++){
			if($finish){
				foreach ($nic_characters as $char){
					
						$pdf->Cell(6,6,$char,1,0,'C');
						
					
					$i++;
				}
				//$pdf->SetXY(40, 157);
				$finish = false;
			}
			if($i<12 ){
				$pdf->Cell(6 ,6,"",1,0,'C');
				
			}
			
					
		}
		
		$pdf->SetFont('bindumathi','',11);
		$pdf->Ln();
		$pdf->Cell(15, 5, "'" , 0,0,'C');

		$pdf->Cell(56, 5, iconv('UTF-8', 'cp1252', '^cd ye msgm;laa wuqKkak&') , 0,1);
		$pdf->Ln();
		
		$pdf->SetFont('Arial','',11);
		 $pdf->Cell(120, 2, "________________________________________________________________________________________" , 0,1);
		 
		 $pdf->Ln();
		 
		 $pdf->Cell(25, 7, "(B)" , 0,0,'C');
		 
		 $pdf->SetFont('bindumathi','',11);
		
		$pdf->Cell(60, 7, iconv('UTF-8', 'cp1252', 'ÈS we;s úÿ,s whmf;ys ,smskfhys fjkila isÿlsÍfïoS') , 0,1);
		$pdf->Cell(10, 4, "" , 0,1,'C');
		
		$pdf->Cell(15, 7, "06'" , 0,0,'C');
	
		$pdf->Cell(60, 7, iconv('UTF-8', 'cp1252', 'whmf;ys ixfYDaOkh úh hq;= ,smskh') , 0,1);
		$pdf->Cell(10, 2, "" , 0,1,'C');
		$pdf->Cell(10, 7, "" , 0,0,'C');
		//$finish = true;
		//$words = explode(" ", $name_with_initial);
		//$all_characters = str_split($name_with_initial);
		$full_address = strtoupper($newAddress) ;
		$all_characters = str_split($full_address);

		$finish = true;

		$pdf->SetFont('courier','B',10);
		
		for($i=0; $i<75; $i++){
			if($finish){
				foreach ($all_characters as $char){
					if($i==24){
						$pdf->Cell(7 ,6,$char,1,1,'C');
						$pdf->Cell(10  ,1,"    ",0,1,'C');
						$pdf->Cell(10, 6, "" , 0,0,'C');
					}
					else if($i==49){
						$pdf->Cell(7 ,6,$char,1,1,'C');
						$pdf->Cell(10  ,1,"    ",0,1,'C');
						$pdf->Cell(10, 6, "" , 0,0,'C');
					}
					else{
						$pdf->Cell(7 ,6,$char,1,0,'C');
					}
					$i++;
				}
				$finish = false;
			}
			//}
			if($i==24 ){
				$pdf->Cell(7 ,6,"",1,1,'C');
				$pdf->Cell(10  ,1,"    ",0,1,'C');
						$pdf->Cell(10, 6, "" , 0,0,'C');
			}
			else if($i==49){
				$pdf->Cell(7 ,6,"",1,1,'C');
				$pdf->Cell(10  ,1,"    ",0,1,'C');
						$pdf->Cell(10, 6, "" , 0,0,'C');
			}
			else{
				$pdf->Cell(7 ,6,"",1,0,'C');
			}
		}
		
		$pdf->Ln();$pdf->Ln();
		 $pdf->SetFont('bindumathi','',11);
		$pdf->Cell(15, 8, "07'" , 0,0,'C');
		$pdf->Cell(56, 8, iconv('UTF-8', 'cp1252', 'ÿrl;k wxlh') , 0,0);
		$pdf->Cell(10, 8, "" , 0,0);
		$finish = true;
		$pdf->SetFont('courier','B',10);
		$all_characters= "";
		$all_characters = str_split($mobileNo);
		for($i=0; $i<10; $i++){
			if($finish){
				foreach ($all_characters as $char){
					
						$pdf->Cell(6,6,$char,1,0,'C');
						
					
					$i++;
				}
				//$pdf->SetXY(40, 157);
				$finish = false;
			}
			if($i<10 ){
				$pdf->Cell(6 ,6,"",1,0,'C');
				
			}
			
					
		}
		
		$pdf->Ln();
		$pdf->SetFont('bindumathi','',11);
		//$pdf->Cell(7 ,7,"",1,1,'C');
		
		$pdf->Ln();
		$pdf->Ln();
		// $pdf->AddFont('Iskpota','I','iskpota.ttf');
		// $pdf->AddFont('Iskpota','','iskpota.ttf',true);
		// $pdf->SetFont('Iskpota','',11);
		 
		// $pdf->AddFont('bindumathi','','FM-Abhaya.ttf',true);
		//$pdf->SetFont('bindumathi','',13);
		 $pdf->Cell(15, 7, "" , 0,0,'C');
		$pdf->Cell(75, 7, iconv('UTF-8', 'cp1252', 'by; ud úiska whÿï l< úÿ,s ì,amf;ys ku ') , 0,0);
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(10, 7, "(A) / " , 0,0,'C');
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(10, 7, iconv('UTF-8', 'cp1252', ",smskh") , 0,0);
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(10, 7, " (B) " , 0,0,'C');
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(20, 7, iconv('UTF-8', 'cp1252', "by; mßÈ ixfYdaOkh lr fok f,i") , 0,1);
		$pdf->Cell(15, 7, "" , 0,0,'C');
		$pdf->Cell(60, 7, iconv('UTF-8', 'cp1252', "b,a,d isáñ'") , 0,1);
		
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
		
		
		
		$pdf->Cell(15, 7, "" , 0,0,'C');
		$pdf->Cell(60, 7, "''''''''''''''''''''''''''''''" , 0,0);
		$pdf->Cell(40, 7, "" , 0,0,'C');
		$pdf->Cell(60, 7, "''''''''''''''''''''''''''''''''''''''''''''''''''''''''''" , 0,1);
		
		$pdf->Cell(25, 7, "" , 0,0,'C');
		$pdf->Cell(60, 7, iconv('UTF-8', 'cp1252', 'Èkh ') , 0,0);
		$pdf->Cell(40, 7, "" , 0,0,'C');
		$pdf->Cell(60, 7, iconv('UTF-8', 'cp1252', 'whÿïlref.a w;aik') , 0,1);
		
		$pdf->SetXY(15, 315);
		//$pdf->Cell(60, 7, "dinaya " , 0,1);
		
		$pdf->Cell(15, 7, "" , 0,0,'C');
		$pdf->Cell(60, 7, iconv('UTF-8', 'cp1252', '^fuu fldgi .%du ks,OdÍ úiska iïmQ¾K l< hq;=h&') , 0,1);

		
		$pdf->Ln();
	
		
		$pdf->Cell(15, 7, "" , 0,0,'C');
		$pdf->Cell(60, 7, iconv('UTF-8', 'cp1252', 'm%dfoaYSh f,alï" ') , 0,1);
		$pdf->Cell(15, 7, "" , 0,0,'C');
		$pdf->Cell(12, 7, iconv('UTF-8', 'cp1252', ',smskh') , 0,0);
		
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(10, 7, " (B) " , 0,0,'C');
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(40, 7, iconv('UTF-8', 'cp1252', 'fjkia lsÍu') , 0,1);
		
		$pdf->Ln();
		 $pdf->Cell(15, 7, "" , 0,0,'C');
		$pdf->Cell(60, 7, iconv('UTF-8', 'cp1252', 'ksjerÈ lrk ,o ,smskhg wod, ia:dkh fmr úÿ,s whmf;ys ioyka ,smskhe;s ia:dkh nj ') , 0,1);
		$pdf->Cell(15, 7, "" , 0,0,'C');
		$pdf->Cell(60, 7, iconv('UTF-8', 'cp1252', "ks¾foaY lrñ'") , 0,1);
		
		$pdf->Ln();
		$pdf->Ln();
		
		$pdf->Cell(15, 7, "" , 0,0,'C');
		$pdf->Cell(60, 7, "''''''''''''''''''''''''''''''" , 0,0);
		$pdf->Cell(40, 7, "" , 0,0,'C');
		$pdf->Cell(60, 7, "''''''''''''''''''''''''''''''''''''''''''''''''''''''''''" , 0,1);
		
		$pdf->Cell(25, 7, "" , 0,0,'C');
		$pdf->Cell(60, 7, iconv('UTF-8', 'cp1252', 'Èkh ') , 0,0);
		$pdf->Cell(35, 7, "" , 0,0,'C');
		$pdf->Cell(60, 7, iconv('UTF-8', 'cp1252', '.%du ks,OdÍ^ks, uqødj ;nkak&') , 0,1);
		
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(120, 2, "________________________________________________________________________________________" , 0,1);
 		$pdf->SetFont('bindumathi','',11);

		$pdf->Cell(15, 7, "" , 0,0,'C');
		$pdf->Cell(60, 7, iconv('UTF-8', 'cp1252', '^fuu fldgi m%dfoaYSh f,alï úiska iïmQ¾K l< hq;=h&') , 0,1);

		
		$pdf->Ln();
	
		
		$pdf->Cell(15, 7, "" , 0,0,'C');
		$pdf->Cell(60, 7, iconv('UTF-8', 'cp1252', 'm%dfoaYSh úÿ,s bxðfkare - ^lE.,a,&') , 0,1);
		
		$pdf->Ln();
		 $pdf->Cell(15, 7, "" , 0,0,'C');
		$pdf->Cell(60, 7, iconv('UTF-8', 'cp1252', 'by; .sKQï ysñhdf.a ,smskh fjkiaùu ioyd ,nd fok .%du ks,OdÍf.a ks¾foaYh iy;sl lrñ '), 0,1);
		//$pdf->Cell(15, 7, "" , 0,0,'C');
		//$pdf->Cell(60, 7, "" , 0,1);
		
		$pdf->Ln();
		$pdf->Ln();
		
		$pdf->Cell(15, 7, "" , 0,0,'C');
		$pdf->Cell(60, 7, "''''''''''''''''''''''''''''''" , 0,0);
		$pdf->Cell(40, 7, "" , 0,0,'C');
		$pdf->Cell(60, 7, "''''''''''''''''''''''''''''''''''''''''''''''''''''''''''" , 0,1);
		
		$pdf->Cell(25, 7, "" , 0,0,'C');
		$pdf->Cell(60, 7, iconv('UTF-8', 'cp1252', 'Èkh ') , 0,0);
		$pdf->Cell(35, 7, "" , 0,0,'C');
		$pdf->Cell(60, 7, iconv('UTF-8', 'cp1252', 'm%dfoaYSh f,alï ^ks, uqødj ;nkak&') , 0,1);
		
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(120, 2, "________________________________________________________________________________________" , 0,1);
 		$pdf->SetFont('bindumathi','',11);
		
		$pdf->Cell(15, 7, "" , 0,0,'C');
		$pdf->Cell(60, 7, iconv('UTF-8', 'cp1252', '^ ld¾hd,Sh m%fhdackh ioyd &') , 0,1);

		
		$pdf->Ln();
	
		
		$pdf->Cell(15, 7, "" , 0,0,'C');
		$pdf->Cell(60, 7, iconv('UTF-8', 'cp1252', 'úÿ,s bxðfkare - ^lE.,a,&') , 0,1);
		
		$pdf->Ln();
		 $pdf->Cell(15, 7, "" , 0,0,'C');
		$pdf->Cell(60, 7, iconv('UTF-8', 'cp1252', 'mdßfNda.slhdf.a ku $ ,smskh ixfYdaOkh ks¾foaY lrñ') , 0,1);
		//$pdf->Cell(15, 7, "" , 0,0,'C');
		//$pdf->Cell(60, 7, "iïnkaO úh yels ÿrl:k wxl" , 0,1);
		
		$pdf->Ln();
		$pdf->Ln();
		
		$pdf->Cell(15, 7, "" , 0,0,'C');
		$pdf->Cell(60, 7, "''''''''''''''''''''''''''''''" , 0,0);
		$pdf->Cell(40, 7, "" , 0,0,'C');
		$pdf->Cell(60, 7, "''''''''''''''''''''''''''''''''''''''''''''''''''''''''''" , 0,1);
		
		$pdf->Cell(25, 7, "" , 0,0,'C');
		$pdf->Cell(60, 7, iconv('UTF-8', 'cp1252', 'Èkh ') , 0,0);
		$pdf->Cell(35, 7, "" , 0,0,'C');
		$pdf->Cell(60, 7, iconv('UTF-8', 'cp1252', 'úÿ,s wêldÍ ^ks, uqødj ;nkak&') , 0,1);
		
		
		$pdf->Ln();
		$pdf->Ln();
		
		$pdf->Cell(15, 7, "" , 0,0,'C');
		$pdf->Cell(60, 7, iconv('UTF-8', 'cp1252', 'úÿ,s wêldÍ^jdksc&f.a ks¾foaYh u; ku $ ,smskh ixfYdaOkh lsÍu wkqu; lrñ') , 0,1);
		
		$pdf->Ln();
		$pdf->Ln();
		
		$pdf->Cell(15, 7, "" , 0,0,'C');
		$pdf->Cell(60, 7, "''''''''''''''''''''''''''''''" , 0,0);
		$pdf->Cell(40, 7, "" , 0,0,'C');
		$pdf->Cell(60, 7, "''''''''''''''''''''''''''''''''''''''''''''''''''''''''''" , 0,1);
		
		$pdf->Cell(25, 7, "" , 0,0,'C');
		$pdf->Cell(60, 7, iconv('UTF-8', 'cp1252', 'Èkh ') , 0,0);
		$pdf->Cell(35, 7, "" , 0,0,'C');
		$pdf->Cell(60, 7, iconv('UTF-8', 'cp1252', 'm%dfoaYSh úÿ,s bxðfkare - ^lE.,a,&') , 0,1);
		
	
			
		$pdf -> output ('New Application.pdf','I');
	}
	
	//str_split('Thi Pro Wijewardana');
	
	
//	$full_name = strtoupper('U Nipuna') ;
//
//$words = explode(" ", $full_name);
//$initials = null;
//$last_name = end($words);
//array_pop($words);
//foreach ($words as $w) {
//
//     $initials .= $w[0].' ';
//}
//
//echo $initials.$last_name;
	
	
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
		$this->db->select('item_code,item_description,item_quantity,fruit_factory_area_code');
		$this->db->from('fruit_item');
		$this->db->where('item_status', 1);
		
		$this->db->join('fruit_factory','fruit_factory_area_id = item_area_code','inner');
		
		if($this->session->userdata('user_area')==2) {	$this->db->where('item_area_code',2);	}
		else if ($this->session->userdata('user_area')==3) {	$this->db->where('item_area_code',3);	}
		//$this->db->join('fruit_customer','customer_id = invoice_customer_id','inner');
		
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
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
	
	
	
	
	

private function viewRecord($invoiceId)
	{		
		$this->db->select('invoice_no,
							customer_name,
							invoice_date,
							invoice_amount,
							invoice_payment,
							customer_address1,
							customer_address2,
							customer_address3');
		$this->db->from('fruit_invoice');
		$this->db->join('fruit_customer','customer_id = invoice_customer_id','inner');
		$this->db->where('invoice_id', $invoiceId);
		$result = $this->db->get()->row();
		return $result;
	}
	
	private function viewItem($insert_id)
	{		
		$this->db->select('prod_description,invoice_item_quantity,invoice_item_amount,FORMAT((invoice_item_quantity*invoice_item_amount),2) as sub_total');
		$this->db->from('fruit_invoice_item');
		$this->db->join('fruit_production','invoice_item_code = prod_id','inner');
		$this->db->where('invoice_item_invoice_id', $insert_id);
		$result = $this->db->get()->result();
		return $result;
	}
	
	
	public function printInvoice($invoice_id)
	{
			
		$record = $this->viewRecord($invoice_id);
			$list = $this->viewItem($invoice_id);
			
			$pdf = new FPDF();
			$pdf -> AddPage();
			$pdf -> setDisplayMode ('fullpage');			
			$pdf->SetFont('Arial','B',14);

			$pdf->Cell(130 ,5,'Mango Friends PVT(Ltd)',0,0);
			$pdf->Cell(59 ,5,'INVOICE',0,1);//end of line
			
			$pdf->SetFont('Arial','',12);			
			$pdf->Cell(130 ,5,'933, Kandy Road,',0,0);
			$pdf->Cell(59 ,5,'',0,1);//end of line			
			$pdf->Cell(130 ,5,'Kelaniya',0,0);
			$pdf->Cell(25 ,5,'Date',0,0);
			$pdf->Cell(34 ,5,$record->invoice_date,0,1);//end of line			
			$pdf->Cell(130 ,5,'0718190291',0,0);
			$pdf->Cell(25 ,5,'Invoice #',0,0);
			$pdf->Cell(34 ,5,$record->invoice_no,0,1);//end of line

			$pdf->Cell(189 ,5,'',0,1);//end of line

			$pdf->Cell(100 ,5,'Bill To',0,1);//end of line
			
			$pdf->Cell(10 ,5,'',0,0);
			$pdf->Cell(90 ,5,$record->customer_name,0,1);
			
			$pdf->Cell(10 ,5,'',0,0);
			$pdf->Cell(90 ,5,$record->customer_address1,0,1);
			
			$pdf->Cell(10 ,5,'',0,0);
			$pdf->Cell(90 ,5,$record->customer_address2,0,1);
			
			$pdf->Cell(10 ,5,'',0,0);
			$pdf->Cell(90 ,5,$record->customer_address3,0,1);
			
			$pdf->Cell(189 ,5,'',0,1);//end of line
			
			$pdf->SetFont('Arial','B',11);
			
			$pdf->Cell(10 ,7,'#',1,0,'C');
			$pdf->Cell(95 ,7,'Description',1,0);
			$pdf->Cell(30 ,7,'Qty',1,0,'C');
			$pdf->Cell(25 ,7,'Unit Price',1,0,'C');
			$pdf->Cell(30 ,7,'Amount (Rs.)',1,1,'C');//end of line
			
			$pdf->SetFont('Arial','I',11);
			$no = 0;
			foreach ($list as $items) 
			{
				$no++;
				$pdf->Cell(10 ,5,$no,1,0,'C');
				$pdf->Cell(95 ,5,$items->prod_description,1,0);
				$pdf->Cell(30 ,5,$items->invoice_item_quantity,1,0,'R');
				$pdf->Cell(25 ,5,$items->invoice_item_amount,1,0,'R');
				$pdf->Cell(30 ,5,$items->sub_total,1,1,'R');//end of line			
			}
			$pdf->Cell(30 ,5,"",0,1);//end of line			
						
			$pdf->SetFont('Arial','',11);
			
			$pdf->SetFont('Arial','B',11);
			$pdf->Cell(130 ,5,'',0,0);
			$pdf->Cell(30 ,5,'Grand Total',0,0,'R');
			$pdf->Cell(30 ,5,$record->invoice_amount,0,1,'R');//end of line
				
			$pdf -> output ('Invoice.pdf','D');
				
	}
	
}


