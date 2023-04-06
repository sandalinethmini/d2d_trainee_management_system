<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChangeTariffModel extends CI_Model {

	

	public function __construct()
	{
		parent::__construct();
		//define('FPDF_FONTPATH',APPPATH .'third_party/fpdf/font');
		require(APPPATH .'third_party/fpdf/fpdf.php');	
		//require(APPPATH .'third_party/tfpdf/tfpdf.php');	
	}
	
	public function print_report($account,$ownerName,$mobileNo,$address)
	{
		$pdf = new FPDF();
		$pdf -> AddPage('P','A4');
		$pdf -> setDisplayMode ('fullpage');			
		$pdf->SetFont('Arial','',11);
		$pdf->AddFont('bindumathi','','FM_BINDU.php');	
		$pdf->SetFont('bindumathi','',13);
		$pdf->SetXY(15, 10);
		$pdf->Cell(180, 10, iconv('UTF-8', 'cp1252', "whl%uh udre lsÍu b,a,qï m;%h") , 0,1,'C');
		$pdf->Cell(15, 4, "" , 0,10,'C');
		//$pdf->Ln();
		
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(5, 8, "" , 0,0,'C');
		$pdf->Cell(56, 8, iconv('UTF-8', 'cp1252', "01'  .sKqï wxlh") , 0,0);//account
		$pdf->Cell(10, 8, "" , 0,0);
		$pdf->SetFont('courier','B',11);
		$finish = true;
		$account = str_split($account);
		for($i=0; $i<10; $i++){
			if($finish){
				foreach ($account as $char){	
					$pdf->Cell(5,6,$char,1,0,'C');
					$i++;
				}
				$finish = false;
			}
			if($i<10 ){
				$pdf->Cell(6 ,6,"",1,0,'C');
				
			}	
		}
		$pdf->Ln();
		$pdf->Cell(5, 4, "" , 0,10,'C');
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(5, 6, "" , 0,0,'C');
		$pdf->Cell(60, 6, iconv('UTF-8', 'cp1252', "02'  .sKqï ysñhdf.a ku") , 0,0);//name
		$pdf->Cell(5, 6, "" , 0,0);
		if($ownerName){
			$pdf->SetFont('courier','B',11);
			$pdf->Cell(120, 6, $ownerName , 0,1);	
		}else{
			$pdf->SetFont('Arial','',11);
			$pdf->Cell(120, 6, ".............................................................................................." , 0,1);	
		}
		
		
		
		
		$pdf->Cell(5, 2, "" , 0,1,'C');
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(5, 6, "" , 0,0,'C');
		$pdf->Cell(65, 6, iconv('UTF-8', 'cp1252', "03'  .sKqï ysñhdf.a  ,smskh") , 0,0);//address
		
		$pdf->SetFont('courier','B',11);
		if($address)
			$pdf->MultiCell(100, 5, strtoupper($address)  , 0,'L');
		
		else{
			$pdf->SetFont('Arial','',11);
			$pdf->Cell(120, 6, ".............................................................................................." , 0,1);
			$pdf->Cell(70, 6, "" , 0,0);
			$pdf->Cell(120, 6, ".............................................................................................." , 0,1);
			$pdf->Cell(15, 2, "" , 0,1,'C');
			
		}
		$pdf->Cell(5, 6, "" , 0,1,'C');
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(5, 6, "" , 0,0,'C');
		$pdf->Cell(56, 6, iconv('UTF-8', 'cp1252', "04'  ÿrl:k wxlh") , 0,0);
		$pdf->Cell(10, 6, "" , 0,0);
		$pdf->SetFont('courier','B',11);
		$finish = true;
		$mobileNo = str_split($mobileNo);
		for($i=0; $i<10; $i++){
			if($finish){
				foreach ($mobileNo as $char){	
					$pdf->Cell(5,6,$char,1,0,'C');
					$i++;
				}
				$finish = false;
			}
			if($i<10 ){
				$pdf->Cell(6 ,6,"",1,0,'C');
				
			}	
		}
		$pdf->Ln();
		$pdf->Cell(5, 6, "" , 0,1,'C');
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(5, 6, "" , 0,0,'C');
		$pdf->Cell(65, 6, iconv('UTF-8', 'cp1252', "05'  úÿ,s wjYH;djh") , 0,0);//"05. Viduli avashthawaya"
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(120, 6, ".............................................................................................." , 0,1);
		$pdf->Cell(15, 3, "" , 0,1,'C');
		
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(5, 6, "" , 0,0,'C');
		$pdf->Cell(65, 6, iconv('UTF-8', 'cp1252', "06'  ud¾. úia;rh"), 0,0);
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(120, 6, ".............................................................................................." , 0,1);
		
		$pdf->Cell(70, 6, "" , 0,0);
		$pdf->Cell(120, 6, ".............................................................................................." , 0,1);
		$pdf->Cell(70, 6, "" , 0,0);
		$pdf->Cell(120, 6, ".............................................................................................." , 0,1);
		$pdf->Cell(70, 6, "" , 0,0);
		$pdf->Cell(120, 6, ".............................................................................................." , 0,1);
		$pdf->Cell(15, 4, "" , 0,1,'C');
		
		$pdf->SetFont('bindumathi','',11);
		 $pdf->Cell(10, 5, "" , 0,0,'C');
		$pdf->MultiCell(170, 5,  iconv('UTF-8', 'cp1252', "by; úia;r ioyka ia:dkfha whl%uh b,a,Su mßÈ udre lsÍu ioyd wjYH lghq;= i,id fok fuka ldreKslj b,a,d isáñ'") , 0,1);
		//$pdf->Cell(15, 5, "" , 0,0,'C');
		//$pdf->Cell(60, 5, "iïnkaO úh yels ÿrl:k wxl" , 0,1);
		
		$pdf->Cell(15, 8, "" , 0,1,'C');
		
		$pdf->SetFont('Arial','',9);
		 $pdf->Cell(15, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, "..........................." , 0,0);
		$pdf->Cell(50, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, "................................................." , 0,1);
		$pdf->SetFont('bindumathi','',11);

		$pdf->Cell(22, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', 'Èkh ') , 0,0); //Dat
		$pdf->Cell(45, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', 'mdßfNda.slhdf.a w;aik ') , 0,1);//  Subject Clert
		

		
		$pdf->Cell(20, 2, "" , 0,1);
		
		
		$pdf->SetFont('Arial','',11);
		 $pdf->Cell(120, 2, "________________________________________________________________________________________" , 0,1);
		 $pdf->Ln();
		 $pdf->Cell(15, 3, "" , 0,1,'C');
		 $pdf->Cell(15, 5, "01." , 0,0,'C');
		 $pdf->SetFont('bindumathi','',11);
		$pdf->Cell(45, 5, iconv('UTF-8', 'cp1252', "ukq wxlh") , 0,0);//meter no
		$pdf->SetFont('Arial','',9);
		$pdf->Cell(120, 5, "........................................" , 0,1);
		$pdf->Cell(15, 2, "" , 0,1,'C');
		
		$pdf->Cell(15, 5, "02." , 0,0,'C');
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(45, 5, iconv('UTF-8', 'cp1252', "f.ùï jjqpr wxlh "), 0,0);//voucher no
		$pdf->SetFont('Arial','',9);
		$pdf->Cell(40, 5, "........................................    " , 0,0);
		$pdf->Cell(5, 5, "" , 0,0);
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(20, 5, iconv('UTF-8', 'cp1252', "Èkh") , 0,0);//date
		$pdf->SetFont('Arial','',9);
		$pdf->Cell(30, 5, "............................." , 0,1);
		$pdf->Cell(15, 2, "" , 0,1,'C');
		
		$pdf->Cell(15, 5, "03." , 0,0,'C');
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(45, 5, iconv('UTF-8', 'cp1252', "f.jq uqo,") , 0,0);//paid amount
		$pdf->SetFont('Arial','',9);
		$pdf->Cell(120, 5, "........................................" , 0,1);
		$pdf->Cell(15, 2, "" , 0,1,'C');
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(15, 5, "04'" , 0,0,'C');
		$pdf->Cell(45, 5, iconv('UTF-8', 'cp1252', "oekg mj;sk whl%uh")  , 0,0);
		$pdf->SetFont('Arial','',9);
		$pdf->Cell(40, 5, "........................................    " , 0,0);
		$pdf->Cell(5, 5, "" , 0,0);
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(40, 5, iconv('UTF-8', 'cp1252', "fjkia úh hq;= whl%uh") , 0,0);// nava aya karamaya
		$pdf->SetFont('Arial','',9);
		$pdf->Cell(30, 5, "........................................" , 0,1);
		$pdf->Cell(15, 10, "" , 0,1,'C');
		
		
		//$pdf->Cell(125, 1, "" , 0,0,'C');
//		//$pdf->Cell(60, 1, "......................" , 0,0);
//		//$pdf->Cell(50, 1, "" , 0,0,'C');
//		$pdf->Cell(60, 1, "......................" , 0,1);
//		
//		$pdf->Cell(125, 5, "" , 0,0,'C');
//		//$pdf->Cell(60, 5, "dinaya " , 0,0);
//		//$pdf->Cell(50, 5, "" , 0,0,'C');
//		$pdf->Cell(60, 5, "vishaya bara lipikaru" , 0,1);
		
		$pdf->SetFont('Arial','',9);
		 $pdf->Cell(15, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, "..........................." , 0,0);
		$pdf->Cell(50, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, "................................................." , 0,1);
		$pdf->SetFont('bindumathi','',11);

		$pdf->Cell(22, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', 'Èkh ') , 0,0); //Dat
		$pdf->Cell(50, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', 'úIhNdr ,smslre ') , 0,1);//  Subject Clert
		
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(120, 2, "________________________________________________________________________________________" , 0,1);
		$pdf->Ln();
	
		$pdf->SetFont('bindumathi','',11);

		$pdf->Cell(10, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', 'm%Odk úÿ,s bxðfkare ^lE.,a,&')  , 0,1);
		$pdf->Cell(10, 2, "" , 0,1,'C');
		//$pdf->Ln();
		 $pdf->Cell(10, 5, "" , 0,0,'C');
		$pdf->Cell(170, 5, iconv('UTF-8', 'cp1252', "by; úia;r ioyka ia:dk mßlaId lr whl%uh '''''''''''''''''''''''''''''''' f,i udre lroSu ks¾foaY lrñ'") , 0,1);
		$pdf->Cell(15, 5, "" , 0,1,'C');
		//$pdf->Cell(60, 5, "iïnkaO úh yels ÿrl:k wxl" , 0,1);
		
		$pdf->Ln();
		$pdf->Ln();
		
		$pdf->SetFont('Arial','',9);
		 $pdf->Cell(15, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, "..........................." , 0,0);
		$pdf->Cell(50, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, "................................................." , 0,1);
		$pdf->SetFont('bindumathi','',11);

		$pdf->Cell(22, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', 'Èkh ') , 0,0);// Date
		$pdf->Cell(50, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', 'úÿ,s wêldÍ ^jdksc& ') , 0,1); // Adikari Signature
		
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(120, 2, "________________________________________________________________________________________" , 0,1);
		$pdf->Ln();
	
		
		$pdf->SetFont('bindumathi','',11);
		
		
		$pdf->Cell(10, 6, "" , 0,0);
		$pdf->Cell(40, 6, iconv('UTF-8', 'cp1252', 'wdodhï ,smslre')  , 0,1); // subject clerk
		$pdf->Cell(20, 2, "" , 0,1);
		$pdf->Cell(10, 4, "" , 0,0);
		$pdf->Cell(170, 4, iconv('UTF-8', 'cp1252', 'úÿ,s wêldÍ ^jdksc& ks¾foaYh  wkqj lghq;=  lsÍu wkqu; lrñ\'')  , 0,1); // viduli adhiari
		
		$pdf->Cell(20, 12, "" , 0,1);
		
		$pdf->SetFont('Arial','',9);
		 $pdf->Cell(15, 3, "" , 0,0,'C');
		$pdf->Cell(60, 3, "..........................." , 0,0);
		$pdf->Cell(50, 3, "" , 0,0,'C');
		$pdf->Cell(60, 3, "................................................." , 0,1);
		$pdf->SetFont('bindumathi','',11);

		$pdf->Cell(22, 4, "" , 0,0,'C');
		$pdf->Cell(60, 4, iconv('UTF-8', 'cp1252', 'Èkh ') , 0,0); //Dat
		$pdf->Cell(40, 4, "" , 0,0,'C');
		$pdf->Cell(60, 4, iconv('UTF-8', 'cp1252', "m%Odk úÿ,s bxðfkare ^lE.,a,&'") , 0,1);//  requeser signature
		$pdf->Cell(25, 3, "" , 0,1,'C');
		$pdf->SetFont('bindumathi','',10);
		 $pdf->Cell(10, 3, "" , 0,0,'C');
		$pdf->Cell(60, 3, iconv('UTF-8', 'cp1252', '^fjk;a igyka&') , 0,1); // wenat satahan
		
		 
	
			
		$pdf -> output ('New Tarrif Application.pdf','I');
	}
	
}


