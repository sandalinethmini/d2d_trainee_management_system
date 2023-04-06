<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReConnectionModel extends CI_Model {

	

	public function __construct()
	{
		parent::__construct();
		
		require(APPPATH .'third_party/fpdf/fpdf.php');		
	}
	
	public function print_application($account,$ownerName,$mobileNo,$address1)
	{
		$pdf = new FPDF();
		$pdf -> AddPage('P','A4');
		$pdf -> setDisplayMode ('fullpage');	
		
		$pdf->AddFont('bindumathi','','FM_BINDU.php');	
		
		
		//$pdf->Cell(10, 2, "" , 0,1);
		
		if($address1!="")
		{
			$pdf->SetFont('courier','B',11);
			$pdf->Cell(10, 5, "" , 0,0);
			$pdf->MultiCell(55, 5, iconv('UTF-8', 'cp1252', strtoupper($address1))  , 0,'L');
		}
		
		else
		{
			$pdf->SetFont('Arial','',9);
			$pdf->Cell(10, 5, "" , 0,0);
			$pdf->Cell(40, 5, "............................................................" , 0,1);
			$pdf->Cell(10, 5, "" , 0,0);
			$pdf->Cell(40, 5, "............................................................" , 0,1);
			$pdf->Cell(10, 5, "" , 0,0);
			$pdf->Cell(40, 5, "............................................................" , 0,1);
		}
		
		
		$pdf->SetFont('bindumathi','U',11);
		$pdf->Cell(10, 3, "" , 0,1);
		$pdf->Cell(10, 5, "" , 0,0);
		$pdf->Cell(40, 5, iconv('UTF-8', 'cp1252', 'm%Odk úÿ,s bxðfkare ^lE.,a,&')  , 0,1);
		$pdf->Cell(10, 2, "" , 0,1);
		$pdf->SetFont('bindumathi','',12);
		$pdf->Cell(10, 5, "" , 0,0);
		$pdf->Cell(40, 5, iconv('UTF-8', 'cp1252', '.sKqu wjika l, fiajd kej; ,nd .ekSu')  , 0,1);
		$pdf->Cell(10, 2, "" , 0,1);
		$pdf->Cell(10, 5, "" , 0,0);
		$pdf->Cell(30, 5, iconv('UTF-8', 'cp1252', '.sKqï wxlh ')  , 0,0);
		
		$pdf->SetFont('courier','B',11);
		$finish = true;
		$account = str_split($account);
		for($i=0; $i<10; $i++){
			if($finish){
				foreach ($account as $char){	
					$pdf->Cell(5,5,$char,1,0,'C');
					$i++;
				}
				$finish = false;
			}
			if($i<10 ){
				$pdf->Cell(5 ,5,"",1,0,'C');
				
			}	
		}
		$pdf->Ln();

		$pdf->SetFont('Arial','',11);
		$pdf->Cell(5, 1, "" , 0,0);
		 $pdf->Cell(120, 1, "_____________________________________________________________________________________" , 0,1); //headder Line
		$pdf->Cell(10, 4, "" , 0,1);
		
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(10, 6, "" , 0,0);
		$pdf->MultiCell(175, 6, iconv('UTF-8', 'cp1252', "by; ,smskh ioyka ia:dkhg imhd ;snQ fiajdj fjkqfjka mej;s ish¿u ys`. uqo,a f.jd wjika lr we;s neúka\" tu fiajd kej; ,nd oSug lghq;= lrk fuka ldreKslj b,a,d isáñ'")  , 0,'J');
		
		$pdf->Cell(20, 6, "" , 0,1);
		
		$pdf->SetFont('Arial','',9);
		 $pdf->Cell(15, 3, "" , 0,0,'C');
		$pdf->Cell(60, 3, "..........................." , 0,0);
		$pdf->Cell(50, 3, "" , 0,0,'C');
		$pdf->Cell(60, 3, "................................................." , 0,1);
		$pdf->SetFont('bindumathi','',11);

		$pdf->Cell(22, 4, "" , 0,0,'C');
		$pdf->Cell(60, 4, iconv('UTF-8', 'cp1252', 'Èkh ') , 0,0); //Dat
		$pdf->Cell(48, 4, "" , 0,0,'C');
		$pdf->Cell(60, 4, iconv('UTF-8', 'cp1252', 'b,a,qïlref.a w;aik') , 0,1);//  requeser signature
		
		$pdf->Cell(20, 3, "" , 0,1);
		
		$pdf->Cell(10, 6, "" , 0,0);
		$pdf->Cell(30, 5, iconv('UTF-8', 'cp1252', 'ÿrl:k wxlh')  , 0,0);
		
		$pdf->SetFont('courier','B',11);
		$finish = true;
		$mobileNo = str_split($mobileNo);
		for($i=0; $i<10; $i++){
			if($finish){
				foreach ($mobileNo as $char){	
					$pdf->Cell(5,5,$char,1,0,'C');
					$i++;
				}
				$finish = false;
			}
			if($i<10 ){
				$pdf->Cell(5 ,5,"",1,0,'C');
				
			}	
		}
		$pdf->Ln();
		$pdf->Cell(20, 2, "" , 0,1);
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(5, 1, "" , 0,0);
		 $pdf->Cell(120, 1, "_____________________________________________________________________________________" , 0,1); //headder Line
		$pdf->Cell(10, 2, "" , 0,1);
		
		$pdf->SetFont('bindumathi','',11);

		$pdf->Cell(35, 4, "", 0,0,'C');
		$pdf->Cell(120, 4, iconv('UTF-8', 'cp1252', 'ld¾hd,hSh m%fhdackh ioyd')  , 0,1,'C');// Office Use
		
		$pdf->Cell(10, 4, "" , 0,1);
		$pdf->Cell(10, 6, "" , 0,0);
		$pdf->Cell(40, 6, iconv('UTF-8', 'cp1252', '.sKqu wjika l, Èkh')  , 0,0); // Account Close Date
		$pdf->SetFont('Arial','',9);
		$pdf->Cell(40, 6, ": ........................................."  , 0,1);

		
		
		
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(10, 6, "" , 0,0);
		$pdf->Cell(40, 6, iconv('UTF-8', 'cp1252', 'ys. uqo,')  , 0,0); // areas
		$pdf->SetFont('Arial','',9);
		$pdf->Cell(40, 6, ": ........................................."  , 0,0);
		$pdf->Cell(25, 6, ""  , 0,0);
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(20, 6, iconv('UTF-8', 'cp1252', 'f.jQ Èkh')  , 0,0); // payment Date
		$pdf->SetFont('Arial','',9);
		$pdf->Cell(40, 6, ": ........................................."  , 0,1);
		
		
		$pdf->Cell(20, 6, "" , 0,1);
		
		$pdf->SetFont('Arial','',9);
		 $pdf->Cell(15, 4, "" , 0,0,'C');
		$pdf->Cell(60, 4, "..........................." , 0,0);
		$pdf->Cell(50, 4, "" , 0,0,'C');
		$pdf->Cell(60, 4, "................................................." , 0,1);
		$pdf->SetFont('bindumathi','',11);

		$pdf->Cell(22, 3, "" , 0,0,'C');
		$pdf->Cell(60, 3, iconv('UTF-8', 'cp1252', 'Èkh ') , 0,0); //Dat
		$pdf->Cell(50, 3, "" , 0,0,'C');
		$pdf->Cell(60, 3, iconv('UTF-8', 'cp1252', 'úIh Ndr ,smslre') , 0,1);//  Subject clerk
		
		$pdf->Cell(20, 1, "" , 0,1);
		
		
		
		
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(5, 1, "" , 0,0);
		 $pdf->Cell(120, 1, "_____________________________________________________________________________________" , 0,1); //headder Line
		$pdf->Cell(10, 4, "" , 0,1);
		
		$pdf->SetFont('bindumathi','',11);

		$pdf->Cell(10, 4, "" , 0,0);
		$pdf->Cell(40, 4, iconv('UTF-8', 'cp1252', 'm%dfoaYSh úÿ,s bxðfkare ^lE.,a,&')  , 0,1); // regional engineer
		$pdf->Cell(10, 2, "" , 0,1);
		$pdf->Cell(20, 4, "" , 0,0);
		$pdf->Cell(70, 4, iconv('UTF-8', 'cp1252', "01'  mej;s fiajd kej; ,ndÈh yel")  , 0,0);// Can be
		$pdf->Cell(10, 4, "" , 1,1);
		$pdf->Cell(5, 2, "" , 0,1);
		$pdf->Cell(20, 4, "" , 0,0);
		$pdf->Cell(70, 4, iconv('UTF-8', 'cp1252', "02'  mej;s fiajd kej; ,ndÈh fkdyel")  , 0,0);// Cannot be
		$pdf->Cell(10, 4, "" , 1,1);
		
		$pdf->Cell(10, 3, "" , 0,1);
		
		$pdf->Cell(10, 4, "" , 0,0);
		$pdf->MultiCell(175, 4, iconv('UTF-8', 'cp1252', "weia;fïka;=fjka ''''''''''''''''''''''''''''''''' uqo,la whlr tu fiajdj iemhSu ks¾foaY lrñ'")  , 0,'J');
		
		$pdf->Cell(20, 8, "" , 0,1);
		
		$pdf->SetFont('Arial','',9);
		 $pdf->Cell(15, 4, "" , 0,0,'C');
		$pdf->Cell(60, 4, "..........................." , 0,0);
		$pdf->Cell(50, 4, "" , 0,0,'C');
		$pdf->Cell(60, 4, "................................................." , 0,1);
		$pdf->SetFont('bindumathi','',11);

		$pdf->Cell(22, 3, "" , 0,0,'C');
		$pdf->Cell(60, 3, iconv('UTF-8', 'cp1252', 'Èkh ') , 0,0); //Dat
		$pdf->Cell(48, 3, "" , 0,0,'C');
		$pdf->Cell(60, 3, iconv('UTF-8', 'cp1252', 'úÿ,s wêldÍ ^jdksc&') , 0,1);//  requeser signature
		
		$pdf->Cell(20, 1, "" , 0,1);
		
		$pdf->Cell(10, 5, "" , 0,0);
		$pdf->Cell(40, 5, iconv('UTF-8', 'cp1252', 'fjk;a f;dr;=re(')  , 0,1);
		
		
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(5, 1, "" , 0,0);
		 $pdf->Cell(120, 1, "_____________________________________________________________________________________" , 0,1); //headder Line
		$pdf->Cell(10, 4, "" , 0,1);
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(10, 5, "" , 0,0);
		$pdf->Cell(40, 5, iconv('UTF-8', 'cp1252', 'úÿ,s wêldÍ')  , 0,1); // viduli adhiari
		$pdf->Cell(20, 1, "" , 0,1);
		$pdf->Cell(10, 5, "" , 0,0);
		$pdf->Cell(170, 5, iconv('UTF-8', 'cp1252', 'by; ks¾foaYh mßÈ lghq;= lr bÈß lghq;= ioyd ^,smsf,aLk iys;j& ld¾hd,hg jd¾;d lrkak')  , 0,1); // viduli adhiari
		
		$pdf->Cell(20, 8, "" , 0,1);
		
		$pdf->SetFont('Arial','',9);
		 $pdf->Cell(15, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, "..........................." , 0,0);
		$pdf->Cell(50, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, "................................................." , 0,1);
		$pdf->SetFont('bindumathi','',11);

		$pdf->Cell(22, 3, "" , 0,0,'C');
		$pdf->Cell(60, 3, iconv('UTF-8', 'cp1252', 'Èkh ') , 0,0); //Dat
		$pdf->Cell(45, 3, "" , 0,0,'C');
		$pdf->Cell(60, 3, iconv('UTF-8', 'cp1252', 'úÿ,s bxðfkare-lE.,a,') , 0,1);//  requeser signature
		

		
		
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(5, 1, "" , 0,0);
		 $pdf->Cell(120, 1, "_____________________________________________________________________________________" , 0,1); //headder Line
		$pdf->Cell(10, 4, "" , 0,1);
		$pdf->SetFont('bindumathi','',11);
		
		
		$pdf->Cell(10, 5, "" , 0,0);
		$pdf->Cell(40, 5, iconv('UTF-8', 'cp1252', 'm%dfoaYSh úÿ,s bxðfkare-lE.,a,')  , 0,1); // vregional engineer Kegalle
		$pdf->Cell(20, 1, "" , 0,1);
		$pdf->Cell(10, 5, "" , 0,0);
		$pdf->MultiCell(170, 5, iconv('UTF-8', 'cp1252', "re ''''''''''''''''''''''''''' l uqo,la whlr  '''''''''''''''''''''''''''''   Èk fiajdj kej; imhk ,oS .sKqï kej; újD; lsÍu ioyd wod, ish¿ ,sms f,aLk fï iu. tjd we;s nj lreKdfjka i,lkak'")  , 0,1); // viduli adhiari
		
		$pdf->Cell(20, 8, "" , 0,1);
		
		$pdf->SetFont('Arial','',9);
		 $pdf->Cell(15, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, "..........................." , 0,0);
		$pdf->Cell(50, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, "................................................." , 0,1);
		$pdf->SetFont('bindumathi','',11);

		$pdf->Cell(22, 3, "" , 0,0,'C');
		$pdf->Cell(60, 3, iconv('UTF-8', 'cp1252', 'Èkh ') , 0,0); //Dat
		$pdf->Cell(50, 3, "" , 0,0,'C');
		$pdf->Cell(60, 3, iconv('UTF-8', 'cp1252', 'úÿ,s wêldÍ') , 0,1);//  regional Signature
		

		
		
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(5, 1, "" , 0,0);
		 $pdf->Cell(120, 1, "_____________________________________________________________________________________" , 0,1); //headder Line
		$pdf->Cell(10, 4, "" , 0,1);
		$pdf->SetFont('bindumathi','',11);
		
		
		$pdf->Cell(10, 4, "" , 0,0);
		$pdf->Cell(40, 4, iconv('UTF-8', 'cp1252', 'wdodhï ,smslre')  , 0,1); // subject clerk
		$pdf->Cell(20, 1, "" , 0,1);
		$pdf->Cell(10, 4, "" , 0,0);
		$pdf->Cell(170, 4, iconv('UTF-8', 'cp1252', '.sKqu kej; újD; lsÍug lghq;= lrkak$wjika lrk ,o Èmsf.dkqfõ f.dkq lr ;nkak')  , 0,1); // viduli adhiari
		
		$pdf->Cell(20, 8, "" , 0,1);
		
		$pdf->SetFont('Arial','',9);
		 $pdf->Cell(15, 3, "" , 0,0,'C');
		$pdf->Cell(60, 3, "..........................." , 0,0);
		$pdf->Cell(50, 3, "" , 0,0,'C');
		$pdf->Cell(60, 3, "................................................." , 0,1);
		$pdf->SetFont('bindumathi','',11);

		$pdf->Cell(22, 4, "" , 0,0,'C');
		$pdf->Cell(60, 4, iconv('UTF-8', 'cp1252', 'Èkh ') , 0,0); //Dat
		$pdf->Cell(40, 4, "" , 0,0,'C');
		$pdf->Cell(60, 4, iconv('UTF-8', 'cp1252', 'm%dfoaYSh úÿ,s bxðfkare-lE.,a,') , 0,1);//  requeser signature
		
		/////////////////////////////////////////
		
		
		
		
		
		
		
		 
			
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


