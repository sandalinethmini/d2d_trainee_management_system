<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PhaseChangeModel extends CI_Model {

	

	public function __construct()
	{
		parent::__construct();
		
		require(APPPATH .'third_party/fpdf/fpdf.php');		
	}
	
	public function print_application($customerName,$nic,$account,$ownerName,$address,$mobileNo,$phoneNo,$currentPhase,$newPhase)
	{
		$pdf = new FPDF();
		$pdf -> AddPage('P','A4');
		$pdf -> setDisplayMode ('fullpage');	
		
		$pdf->AddFont('bindumathi','','FM_BINDU.php');	
		$pdf->SetFont('bindumathi','',11);

		//$pdf->SetXY(15, 10);
		//$pdf->Cell(180, 5, iconv('UTF-8', 'cp1252', 'weuqKqu-1') , 0,1,'R');
		
		$pdf->SetFont('bindumathi','',14);
		$pdf->Cell(190, 5, iconv('UTF-8', 'cp1252', ',xld úÿ,sn, uKav,h')  , 0,1,'C');
		
		$pdf->SetFont('bindumathi','',12);
		$pdf->Cell(190, 5, iconv('UTF-8', 'cp1252', 'l,d mßj¾;k ld¾hhka lsÍu ioyd whÿïm;%h ') , 0,1,'C');
		//$pdf->Cell(15, 4, "" , 0,10,'C');
		$pdf->Ln();
		//$pdf->SetFont('bindumathi','',11);
		//$pdf->Cell(15, 5, "" , 0,0,'C');
		//$pdf->Cell(56, 5, iconv('UTF-8', 'cp1252', 'ld¾hd,Sh m%fhdackh ioyd muKhs') , 0,1);
		
		$pdf->SetFont('Arial','',11);
		 $pdf->Cell(120, 2, "________________________________________________________________________________________" , 0,1);// address
		 $pdf->Cell(15, 10, "" , 0,1,'C');
		 
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(10, 7, "" , 0,0,'C');
		$pdf->Cell(50, 7, iconv('UTF-8', 'cp1252', 'whÿïlref.a iïmQ¾K ku') , 0,0);//Name
		$pdf->SetFont('courier','B',11);
		if($customerName)
			$pdf->Cell(120, 7, strtoupper($customerName)  , 1,1);
		else
		$pdf->Cell(120, 7, "" , 1,1);
		
		$pdf->Cell(20, 5, "" , 0,1);
		
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(10, 7, "" , 0,0,'C');
		$pdf->Cell(50, 7, iconv('UTF-8', 'cp1252', ',smskh') , 0,0);//address 
		$pdf->SetFont('courier','B',11);
		if($address)
			$pdf->MultiCell(120, 7, strtoupper($address)  , 1,1);
		else
		{
			$pdf->Cell(120, 7, "" , 1,1);
			
			$pdf->Cell(20, 1, "" , 0,1);
			
			$pdf->Cell(60, 7, "" , 0,0);
			$pdf->Cell(120, 7, "" , 1,1);
		}
		
		$pdf->Cell(20, 5, "" , 0,1);
		
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(10, 5, "" , 0,0,'C');
		$pdf->Cell(50, 5, iconv('UTF-8', 'cp1252', 'cd;sl yeÿkqïm;a wxlh') , 0,0);//NIC 
		$pdf->SetFont('courier','B',11);
		
		
		$nic_characters = str_split($nic);
		$finish = true;
		for($i=0; $i<12; $i++){
			if($finish){
				foreach ($nic_characters as $char){
						$pdf->Cell(5,5,$char,1,0,'C');
					$i++;
				}
				$finish = false;
			}
			if($i<12 ){
				$pdf->Cell(5 ,5,"",1,0,'C');		
			}			
		}
		$pdf->Ln();
		$pdf->Cell(20, 5, "" , 0,1);
		
		
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(10, 5, "" , 0,0,'C');
		$pdf->Cell(50, 5, iconv('UTF-8', 'cp1252', 'ÿrl;k wxlh ia:djr ') , 0,0);//Land Phone 
		$pdf->SetFont('courier','B',11);
		
		$finish = true;
		$landNo = str_split($mobileNo);
		for($i=0; $i<10; $i++){
			if($finish){
				foreach ($landNo as $char){	
					$pdf->Cell(5,5,$char,1,0,'C');
					$i++;
				}
				$finish = false;
			}
			if($i<10 ){
				$pdf->Cell(5 ,5,"",1,0,'C');
				
			}	
		}
		
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(5, 5, "" , 0,0,'C');
		$pdf->Cell(15, 5, iconv('UTF-8', 'cp1252', 'cx.u') , 0,0);//mobile Phone 
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
		$pdf->Cell(20, 7, "" , 0,1);
		
		if( strlen($address)<50 && $address!="")
			$pdf->SetXY(10, 83);		
		else
			$pdf->SetXY(10, 91);
		
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(10, 4, "" , 0,0,'C');
		
		$pdf->MultiCell(50, 4, iconv('UTF-8', 'cp1252', 'fiajdj mj;sk whs;slref.a iïamQ¾K ku') , 0,'L');//current owner
		//$pdf->Cell(10, 4, "" , 0,0,'C');
		//$pdf->Cell(50, 4, iconv('UTF-8', 'cp1252', 'iïamQ¾K ku') , 0,1);//current owner 
		
		$pdf->SetFont('courier','B',11);
		if( strlen($address)<50 && $address!="")
			$pdf->SetXY(70, 83);	
		else
			$pdf->SetXY(70, 91);
		
		
		if($ownerName)
			$pdf->Cell(120, 7, strtoupper($ownerName) , 1,1);
		else
			$pdf->Cell(120, 7, "" , 1,1);
		
		$pdf->Cell(20, 5, "" , 0,1);
		
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(10, 7, "" , 0,0,'C');
		$pdf->Cell(50, 7, iconv('UTF-8', 'cp1252', '.sKqï wxlh') , 0,0);//address 
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
		$pdf->Cell(20, 5, "" , 0,1);
		
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(10, 7, "" , 0,0,'C');
		$pdf->Cell(50, 7, iconv('UTF-8', 'cp1252', 'mj;sk fiajd iemhqu ') , 0,0);//current Service 
		$pdf->Cell(40, 7, iconv('UTF-8', 'cp1252', 'tl,d weïmsh¾ 30') , 0,0);//single phase
		$pdf->SetFont('courier','B',13);
		if($currentPhase==1)  
			$pdf->Cell(8, 7, "X" , 1,0,'C');
		else
			$pdf->Cell(8, 7, "" , 1,0);
		$pdf->Cell(20, 7, "" , 0,0);
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(40, 7, iconv('UTF-8', 'cp1252', 'f;l,d weïmsh¾ 30 ') , 0,0);//three phase 
		$pdf->SetFont('courier','B',13);
		if($currentPhase==2)  
			$pdf->Cell(8, 7, "X" , 1,0,'C');
		else
			$pdf->Cell(8, 7, "" , 1,1);
		
		$pdf->Cell(20, 5, "" , 0,1);
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(10, 7, "" , 0,0,'C');
		$pdf->Cell(50, 7, iconv('UTF-8', 'cp1252', 'b,a,qï lrk fiajd iemhqu ') , 0,0);//current Service 
		$pdf->Cell(40, 7, iconv('UTF-8', 'cp1252', 'f;l,d weïmsh¾ 30') , 0,0);//single phase  
		$pdf->SetFont('courier','B',13);
		if($newPhase==1)  
			$pdf->Cell(8, 7, "X" , 1,0,'C');
		else
			$pdf->Cell(8, 7, "" , 1,0);
		$pdf->Cell(20, 7, "" , 0,0);
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(40, 7, iconv('UTF-8', 'cp1252', 'f;l,d weïmsh¾ 60') , 0,0);//three phase
		$pdf->SetFont('courier','B',13); 
		if($newPhase==2)  
			$pdf->Cell(8, 7, "X" , 1,0,'C');
		else
			$pdf->Cell(8, 7, "" , 1,1);
		
		$pdf->Cell(20, 15, "" , 0,1);
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(25, 7, "" , 0,0,'C');
		$pdf->Cell(50, 7, iconv('UTF-8', 'cp1252', "by; ioyka f;dr;=re udf.a oekSu wkqj i;H yd ksjerÈ njg iy;sl lrñ'") , 0,1);//Oath 
		
		$pdf->Cell(20, 10, "" , 0,1);
		
		$pdf->Cell(10, 7, "" , 0,0,'C');
		$pdf->Cell(15, 7, iconv('UTF-8', 'cp1252', 'Èkh') , 0,0); //date
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(50, 7, ": ..................................." , 0,0);
		$pdf->Cell(45, 7, "" , 0,0);
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(15, 5, iconv('UTF-8', 'cp1252', 'w;aik') , 0,0); //Signature
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(50, 5, ": ..................................." , 0,1);
		
		if(strlen($address)<50 && $address!="")
			$pdf->Cell(20, 8, "" , 0,1);
		else
			$pdf->Cell(20, 6, "" , 0,1);
		
		$pdf->Cell(120, 5, "________________________________________________________________________________________" , 0,1);// address
		 //$pdf->Cell(15, 5, "" , 0,1,'C');
		 
		 $pdf->SetFont('bindumathi','',11);
		//$pdf->Cell(10, 7, "" , 0,0,'C');
		$pdf->Cell(190, 7, iconv('UTF-8', 'cp1252', '^ld¾hd,Sh m%fhdackh ioyd&') , 0,1,'C');// office use 
		
		$pdf->Cell(20, 5, "" , 0,1);
		
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(10, 7, "" , 0,0,'C');
		$pdf->Cell(50, 7, iconv('UTF-8', 'cp1252', 'weia;fïka;= wxlh') , 0,0);//estimate no
		$pdf->SetFont('courier','B',11);
		$pdf->Cell(60, 7, "" , 1,1);
		
		$pdf->Cell(20, 5, "" , 0,1);
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(10, 7, "" , 0,0,'C');
		$pdf->Cell(50, 7, iconv('UTF-8', 'cp1252', 'f.ùï jjqp¾ wxlh') , 0,0);//estimate no
		$pdf->SetFont('courier','B',11);
		$pdf->Cell(60, 7, "" , 1,1);
		
		
		
		$pdf->Cell(20, 5, "" , 0,1);
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(10, 7, "" , 0,0,'C');
		$pdf->Cell(50, 7, iconv('UTF-8', 'cp1252', 'mj;sk fiajd iemhqfï ') , 0,0);
		$pdf->Cell(30, 7, iconv('UTF-8', 'cp1252', 'úÿ,s uKq wxlh ') , 0,0);//mter no
		$pdf->Cell(30, 7, "" , 1,0);
		$pdf->Cell(5, 7, "" , 0,0);
		$pdf->Cell(33, 7, iconv('UTF-8', 'cp1252', 'úÿ,s uKq mdGdxlh') , 0,0);//mter reading
		$pdf->Cell(28, 7, "" , 1,1);
		
		
		$pdf->Cell(20, 5, "" , 0,1);
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(10, 7, "" , 0,0,'C');
		$pdf->Cell(50, 7, iconv('UTF-8', 'cp1252', 'kj fiajd iemhqfï ') , 0,0);
		$pdf->Cell(30, 7, iconv('UTF-8', 'cp1252', 'úÿ,s uKq wxlh ') , 0,0);// new mter no
		$pdf->Cell(30, 7, "" , 1,0);
		$pdf->Cell(5, 7, "" , 0,0);
		$pdf->Cell(33, 7, iconv('UTF-8', 'cp1252', 'úÿ,s uKq mdGdxlh') , 0,0);// newmter reading
		$pdf->Cell(28, 7, "" , 1,1);
		
		
		$pdf->Cell(20, 10, "" , 0,1);
		
		$pdf->Cell(25, 5, "" , 0,0,'C');
		$pdf->Cell(50, 5, iconv('UTF-8', 'cp1252', "by; ld¾hh ,xld úÿ,sn, uKav,Sh m%ñ;sh wkqj ksulrk ,o nj okajd isáñ'") , 0,1);//Oath  
		
		$pdf->Cell(20, 15, "" , 0,1);
		
		//$pdf->Cell(10, 5, "" , 0,0,'C');
		//$pdf->Cell(15, 5, iconv('UTF-8', 'cp1252', 'Èkh') , 0,0); //date
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(120, 5, "" , 0,0);
		$pdf->Cell(50, 5, "................................................" , 0,1);
		//$pdf->Cell(45, 5, "" , 0,0);
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(120, 5, "" , 0,0);
		$pdf->Cell(15, 5, iconv('UTF-8', 'cp1252', 'úÿ,s wêldß ^                   &') , 0,1); //Signature


		
		///////////////////////////////////////////////////////
		
		
		
		
		
		
		
		
		 
		// $pdf->Cell(25, 7, "(A)" , 0,0,'C');
//		$pdf->Cell(60, 7, "Danat pavathina name wenasak sidu kirimedai" , 0,1);
//		$pdf->Cell(10, 4, "" , 0,1,'C');
//		$pdf->Cell(15, 7, "3." , 0,0,'C');
//		$pdf->Cell(60, 7, "ginum himige sanshodanaya viyayuthu nama()" , 0,1);
//		$pdf->Cell(10, 2, "" , 0,1,'C');
//		$pdf->Cell(10, 7, "" , 0,0,'C');
//		//$finish = true;
//		//$words = explode(" ", $name_with_initial);
//		//$all_characters = str_split($name_with_initial);
//		for($i=0; $i<50; $i++){
//			
//			//}
//			if($i==24 ){
//				$pdf->Cell(7 ,7,"",1,1,'C');
//				//$pdf->SetXY(25, 160);
//				//$pdf->SetFont('Arial','',1);
//				$pdf->Cell(10  ,1,"    ",0,1,'C');
//				$pdf->Cell(10, 7, "" , 0,0,'C');
//			}
//			
//			else{
//				$pdf->Cell(7 ,7,"",1,0,'C');
//			}
//		}
//		$pdf->Ln();$pdf->Ln();
//		$pdf->Cell(15, 8, "4." , 0,0,'C');
//		$pdf->Cell(56, 8, "NIC ()" , 0,0);
//		$pdf->Cell(30, 8, "" , 0,0);
//		for($i=0;$i<9;$i++){
//			$pdf->Cell(7 ,7,"",1,0,'C');
//		}
//		$pdf->Cell(7 ,7,"",1,1,'C');
//		$pdf->Ln();
//		$pdf->SetFont('Arial','',11);
//		 $pdf->Cell(120, 2, "________________________________________________________________________________________" , 0,1);
//		 
//		 $pdf->Ln();
//		 
//		 $pdf->Cell(25, 7, "(B)" , 0,0,'C');
//		$pdf->Cell(60, 7, "Danat pavathina name wenasak sidu kirimedai" , 0,1);
//		$pdf->Cell(10, 4, "" , 0,1,'C');
//		
//		$pdf->Cell(15, 7, "06." , 0,0,'C');
//		$pdf->Cell(60, 7, "ginum himige sanshodanaya viyayuthu nama()" , 0,1);
//		$pdf->Cell(10, 2, "" , 0,1,'C');
//		$pdf->Cell(10, 7, "" , 0,0,'C');
//		//$finish = true;
//		//$words = explode(" ", $name_with_initial);
//		//$all_characters = str_split($name_with_initial);
//		for($i=0; $i<74; $i++){
//			
//			//}
//			if($i==24 ){
//				$pdf->Cell(7 ,7,"",1,1,'C');
//				//$pdf->SetXY(25, 160);
//				//$pdf->SetFont('Arial','',1);
//				$pdf->Cell(10  ,1,"    ",0,1,'C');
//				$pdf->Cell(10, 7, "" , 0,0,'C');
//			}
//			
//			if($i==48 ){
//				$pdf->Cell(7 ,7,"",1,1,'C');
//				//$pdf->SetXY(25, 160);
//				//$pdf->SetFont('Arial','',1);
//				$pdf->Cell(10  ,1,"    ",0,1,'C');
//				$pdf->Cell(10, 7, "" , 0,0,'C');
//			}
//			
//			
//			else{
//				$pdf->Cell(7 ,7,"",1,0,'C');
//			}
//		}
//		$pdf->Ln();$pdf->Ln();
//		
//		$pdf->Cell(15, 8, "07." , 0,0,'C');
//		$pdf->Cell(56, 8, "NIC ()" , 0,0);
//		$pdf->Cell(30, 8, "" , 0,0);
//		for($i=0;$i<9;$i++){
//			$pdf->Cell(7 ,7,"",1,0,'C');
//		}
//		$pdf->Cell(7 ,7,"",1,1,'C');
//		
//		$pdf->Ln();
//		// $pdf->AddFont('Iskpota','I','iskpota.ttf');
//		// $pdf->AddFont('Iskpota','','iskpota.ttf',true);
//		// $pdf->SetFont('Iskpota','',11);
//		 
//		// $pdf->AddFont('DejaVu','','FM-Abhaya.ttf',true);
//		//$pdf->SetFont('DejaVu','',13);
//		 $pdf->Cell(15, 7, "" , 0,0,'C');
//		$pdf->Cell(60, 7, "whÿïlref.a iïmQ¾K ku^bx.%Sis lemsg,a wl=ßka tl fldgqjl tl wl=rla isák fia ,shkak& " , 0,1);
//		$pdf->Cell(15, 7, "" , 0,0,'C');
//		$pdf->Cell(60, 7, "iïnkaO úh yels ÿrl:k wxl" , 0,1);
//		
//		$pdf->Ln();
//		$pdf->Ln();
//		$pdf->Ln();
//		$pdf->Ln();
//		$pdf->Ln();
//		
//		$pdf->Cell(15, 7, "" , 0,0,'C');
//		$pdf->Cell(60, 7, "......................" , 0,0);
//		$pdf->Cell(50, 7, "" , 0,0,'C');
//		$pdf->Cell(60, 7, "......................" , 0,1);
//		
//		$pdf->Cell(15, 7, "" , 0,0,'C');
//		$pdf->Cell(60, 7, "dinaya " , 0,0);
//		$pdf->Cell(50, 7, "" , 0,0,'C');
//		$pdf->Cell(60, 7, "athsana" , 0,1);
//		
//		$pdf->SetXY(15, 315);
//		$pdf->Cell(60, 7, "dinaya " , 0,1);
//		
//		$pdf->Cell(15, 7, "" , 0,0,'C');
//		$pdf->Cell(60, 7, "grama nila dari" , 0,1);
//
//		
//		$pdf->Ln();
//	
//		
//		$pdf->Cell(15, 7, "" , 0,0,'C');
//		$pdf->Cell(60, 7, "pradeshiya lekam" , 0,1);
//		$pdf->Cell(15, 7, "" , 0,0,'C');
//		$pdf->Cell(60, 7, "lipinaya wenas kirima" , 0,1);
//		
//		$pdf->Ln();
//		 $pdf->Cell(15, 7, "" , 0,0,'C');
//		$pdf->Cell(60, 7, "whÿïlref.a iïmQ¾K ku^bx.%Sis lemsg,a wl=ßka tl fldgqjl tl wl=rla isák fia ,shkak& " , 0,1);
//		$pdf->Cell(15, 7, "" , 0,0,'C');
//		$pdf->Cell(60, 7, "iïnkaO úh yels ÿrl:k wxl" , 0,1);
//		
//		$pdf->Ln();
//		$pdf->Ln();
//		
//		$pdf->Cell(15, 7, "" , 0,0,'C');
//		$pdf->Cell(60, 7, "......................" , 0,0);
//		$pdf->Cell(50, 7, "" , 0,0,'C');
//		$pdf->Cell(60, 7, "......................" , 0,1);
//		
//		$pdf->Cell(120, 2, "________________________________________________________________________________________" , 0,1);
//
//
//		$pdf->Cell(15, 7, "" , 0,0,'C');
//		$pdf->Cell(60, 7, "grama nila dari" , 0,1);
//
//		
//		$pdf->Ln();
//	
//		
//		$pdf->Cell(15, 7, "" , 0,0,'C');
//		$pdf->Cell(60, 7, "pradeshiya lekam" , 0,1);
//		
//		$pdf->Ln();
//		 $pdf->Cell(15, 7, "" , 0,0,'C');
//		$pdf->Cell(60, 7, "whÿïlref.a iïmQ¾K ku^bx.%Sis lemsg,a wl=ßka tl fldgqjl tl wl=rla isák fia ,shkak& " , 0,1);
//		$pdf->Cell(15, 7, "" , 0,0,'C');
//		$pdf->Cell(60, 7, "iïnkaO úh yels ÿrl:k wxl" , 0,1);
//		
//		$pdf->Ln();
//		$pdf->Ln();
//		
//		$pdf->Cell(15, 7, "" , 0,0,'C');
//		$pdf->Cell(60, 7, "......................" , 0,0);
//		$pdf->Cell(50, 7, "" , 0,0,'C');
//		$pdf->Cell(60, 7, "......................" , 0,1);
//		
//		$pdf->Cell(120, 2, "________________________________________________________________________________________" , 0,1);
//		
//		$pdf->Cell(15, 7, "" , 0,0,'C');
//		$pdf->Cell(60, 7, "grama nila dari" , 0,1);
//
//		
//		$pdf->Ln();
//	
//		
//		$pdf->Cell(15, 7, "" , 0,0,'C');
//		$pdf->Cell(60, 7, "pradeshiya lekam" , 0,1);
//		
//		$pdf->Ln();
//		 $pdf->Cell(15, 7, "" , 0,0,'C');
//		$pdf->Cell(60, 7, "whÿïlref.a iïmQ¾K ku^bx.%Sis lemsg,a wl=ßka tl fldgqjl tl wl=rla isák fia ,shkak& " , 0,1);
//		$pdf->Cell(15, 7, "" , 0,0,'C');
//		$pdf->Cell(60, 7, "iïnkaO úh yels ÿrl:k wxl" , 0,1);
//		
//		$pdf->Ln();
//		$pdf->Ln();
//		
//		$pdf->Cell(15, 7, "" , 0,0,'C');
//		$pdf->Cell(60, 7, "......................" , 0,0);
//		$pdf->Cell(50, 7, "" , 0,0,'C');
//		$pdf->Cell(60, 7, "......................" , 0,1);
//		
//		$pdf->Ln();
//		$pdf->Ln();
//		
//		$pdf->Cell(15, 7, "" , 0,0,'C');
//		$pdf->Cell(60, 7, "iïnkaO úh yels ÿrl:k wxl" , 0,1);
//		
//		$pdf->Ln();
//		$pdf->Ln();
//		
//		$pdf->Cell(15, 7, "" , 0,0,'C');
//		$pdf->Cell(60, 7, "......................" , 0,0);
//		$pdf->Cell(50, 7, "" , 0,0,'C');
//		$pdf->Cell(60, 7, "......................" , 0,1);
		

		//for($i=0;$i<10;$i++){
//			$pdf->Cell(7 ,7,"",1,0,'C');
//		}
		
		//$pdf->SetFont('Arial','',8);
//		$pdf->SetXY(15, 17);
//		$pdf->Cell(60, 45, "" , 1,0,'C');
//		$pdf->Cell(60, 45, "" , 1,0,'C');
//		$pdf->Cell(60, 45, "" , 1,1,'C');
//		
//		$pdf->SetXY(20, 20);
//		$pdf->Cell(50 ,5,"Payment Voucher No",0,1,'L');
//		
//		$pdf->SetXY(20, 25);
//		for($i=0;$i<10;$i++){
//			$pdf->Cell(5 ,6,"",1,0,'C');
//		}
//		
//		$pdf->SetXY(20, 38);
//		
//		$pdf->Cell(25 ,6,"Single Phase",1,0,'C');
//		$pdf->Cell(25 ,6,"Three Phase",1,0,'C');
//		
//		$pdf->SetXY(18, 52);
//		
//		$pdf->Cell(18 ,6,"15 Amps",1,0,'C');
//		$pdf->Cell(18,6,"30 Amps",1,0,'C');
//		$pdf->Cell(18,6,"60 Amps",1,0,'C');
//		
//		
//		$pdf->SetXY(80,20);
//		
//		$pdf->Cell(50 ,5,"Application No",0,1,'L');
//		
//		$pdf->SetXY(80, 25);
//		
//		for($i=0;$i<10;$i++){
//			$pdf->Cell(5 ,6,"",1,0,'C');
//		}
//		
//		$pdf->SetXY(97, 34);
//		
//		$pdf->Cell(15 ,5,"Tariff",0,0,'C');
//		$pdf->SetXY(95, 38);
//		$pdf->Cell(5 ,6,"",1,0,'C');
//		$pdf->Cell(5 ,6,"",1,0,'C');
//		$pdf->Cell(5 ,6,"",1,0,'C');
//		$pdf->Cell(5 ,6,"",1,0,'C');
//		
//		
//		$pdf->SetXY(82, 48);
//		
//		$pdf->Cell(15 ,5,"Distance from the Transformer (m)",0,1,'L');
//		$pdf->SetXY(95, 52);
//		$pdf->Cell(5 ,6,"",1,0,'C');
//		$pdf->Cell(5 ,6,"",1,0,'C');
//		$pdf->Cell(5 ,6,"",1,0,'C');
//		$pdf->Cell(5 ,6,"",1,0,'C');
//		
//		
//		
//		$pdf->SetXY(145,20);
//		
//		$pdf->Cell(50 ,5,"Application Received Date",0,1,'L');
//		
//		$pdf->SetXY(145, 25);
//		for($i=0;$i<8;$i++){
//			$pdf->Cell(5 ,6,"",1,0,'C');
//		}
//		
//		$pdf->SetXY(145,47);
//		
//		$pdf->Cell(50 ,5,"Estimated Date",0,1,'L');
//		
//		$pdf->SetXY(145, 52);
//		for($i=0;$i<8;$i++){
//			$pdf->Cell(5 ,6,"",1,0,'C');
//		}
//		
//		
//		$pdf->SetXY(15, 65);// Logo Start
//		$pdf->Cell(25 ,30,"",1,0,'C'); //Logo End
//		
//		$pdf->SetFont('Arial','',15);
//		$pdf->SetXY(85, 65);// Header Start
//		$pdf->Cell(60 ,10,"Ceylon Electricity Board",0,1,'C'); 
//		$pdf->SetXY(70, 73);
//		//$pdf->AddFont('DejaVu','','iskpota.ttf',true);
//		//$pdf->SetFont('DejaVu','',14);
//		$pdf->Cell(100 ,10,"Application for Obtaining an Electricity Service Connection",0,1,'C'); //Header End
//		
//		$pdf->SetXY(45, 90);
//		$pdf->SetFont('Arial','B',13);
//		$pdf->Cell(25 ,7,"* Read the Instructions Paper before Filling the Application. ",0,1); //Header End
//		
//		$pdf->SetFont('Arial','',11);
//		$pdf->SetXY(15, 98);
//		$pdf->Cell(25 ,5,"( Please fill up this application form and hand over to the relevant Electricity Consumer Service Center.",0,1); //Header End
//		$pdf->SetXY(15, 103);$pdf->Cell(25 ,5,"In  order  to  confirm  the identity of  the  applicant,  please handover  a  photocopy  of the  National  Identity",0,1); //Header End
//		$pdf->SetXY(15, 108);$pdf->Cell(25 ,5,"card or any other acceptable document with its original. )",0,1); //Header End
//		
//		
//		$pdf->SetXY(15, 117);
//		$pdf->Cell(10 ,5,"01.",0,0,'C');
//		$pdf->Cell(150 ,5,"1.1 Full name of the applicant (In English Capital letters, one letter in one cage)",0,1); //Header End
//		
//		
//		$pdf->SetXY(25, 123);
//		
//		
//		
//		
//		//$pdf->Cell(25 ,7,"ok. ",1,1); //Header End
//		
//		$full_name = strtoupper($customerName) ;
//		$all_characters = str_split($full_name);
//		
//		$words = explode(" ", $full_name);
//		$initials = null;
//		$last_name = ' '.end($words);
//		array_pop($words);
//		
//		$finish = true;
//		
//		foreach ($words as $w) 
//		{
//			$initials .= $w[0].'';
//		}
//		
//		$name_with_initial = $initials.$last_name;
//		$pdf->SetFont('courier','B',10);
//		
//		for($i=0; $i<75; $i++){
//			if($finish){
//				foreach ($all_characters as $char){
//					if($i==24){
//						$pdf->Cell(7 ,6,$char,1,1,'C');
//						$pdf->SetXY(25, 130);
//					}
//					else if($i==49){
//						$pdf->Cell(7 ,6,$char,1,1,'C');
//						$pdf->SetXY(25, 137);
//					}
//					else{
//						$pdf->Cell(7 ,6,$char,1,0,'C');
//					}
//					$i++;
//				}
//				$finish = false;
//			}
//			//}
//			if($i==24 ){
//				$pdf->Cell(7 ,6,"",1,1,'C');
//				$pdf->SetXY(25, 130);
//			}
//			else if($i==49){
//				$pdf->Cell(7 ,6,"",1,1,'C');
//				$pdf->SetXY(25, 137);
//			}
//			else{
//				$pdf->Cell(7 ,6,"",1,0,'C');
//			}
//		}
//		
//		$pdf->SetFont('Arial','',11);
//		$pdf->SetXY(15, 147);
//		$pdf->Cell(10 ,5,"",0,0,'C');
//		$pdf->Cell(150 ,5,"1.2 Name with initials (Write in Capital letters in English)",0,1); //Header End
//		$pdf->SetFont('courier','B',10);
//		$pdf->SetXY(25, 153);
//		$finish = true;
//		//$words = explode(" ", $name_with_initial);
//		$all_characters = str_split($name_with_initial);
//		for($i=0; $i<50; $i++){
//			if($finish){
//				foreach ($all_characters as $char){
//					if($i==24){
//						$pdf->Cell(7 ,6,$char,1,1,'C');
//						$pdf->SetXY(25, 160);
//					}
//					else{
//						$pdf->Cell(7 ,6,$char,1,0,'C');
//					}
//					$i++;
//				}
//				$finish = false;
//			}
//			//}
//			if($i==24 ){
//				$pdf->Cell(7 ,6,"",1,1,'C');
//				$pdf->SetXY(25, 160);
//			}
//			
//			else{
//				$pdf->Cell(7 ,6,"",1,0,'C');
//			}
//		}
//		$pdf->SetFont('Arial','',11);
//		$pdf->SetXY(15, 170);
//		$pdf->Cell(10 ,5,"",0,0,'C');
//		$pdf->Cell(25 ,5,"1.3 National Identity Card Number",0,1,'L');
//		
//		$pdf->SetFont('courier','B',10);
//		$pdf->SetXY(25, 176);
//		$finish = true;
//		$nic_characters = str_split($nic);
//		for($i=0; $i<12; $i++){
//			if($finish){
//				foreach ($nic_characters as $char){
//					
//						$pdf->Cell(7,6,$char,1,0,'C');
//						
//					
//					$i++;
//				}
//				//$pdf->SetXY(40, 157);
//				$finish = false;
//			}
//			if($i<12 ){
//				$pdf->Cell(7 ,6,"",1,0,'C');
//				
//			}
//			
//					
//		}
//		$pdf->SetFont('Arial','',11);
//		
//		$pdf->SetXY(15, 186);
//		$pdf->Cell(10 ,5,"",0,0,'C');
//		$pdf->Cell(80 ,5,"1.4 Whether the Owner/ Leaser / Lawful Occupant:",0,0,'L');
//		$pdf->Cell(25 ,5,"",0,0,'C');
//		$pdf->SetFont('courier','B',12);
//		if($statusType == 1){	$pdf->Cell(10 ,5,"Owner",0,1,'C');	} 
//		else if($statusType == 2){	$pdf->Cell(10 ,5,"Leaser",0,1,'C'); }	
//		else if($statusType == 3){	$pdf->Cell(10 ,5,"Lawful Occupant",0,1,'C'); }
//		else {	$pdf->SetFont('Arial','',11);	$pdf->Cell(12 ,5,".............................................................",0,1,'L');}
//		
//		$pdf->SetFont('Arial','',11);
//		$pdf->SetXY(15, 195);
//		$pdf->Cell(10 ,5,"",0,0,'C');
//		$pdf->Cell(80 ,5,"1.5 Postal Address for Communication:",0,0,'L');
//		
//		if($comAddress1!="" || $comAddress2!="" || $comAddress3!="")
//		{	$pdf->SetFont('courier','B',12);
//			$pdf->Cell(10 ,6,"",0,0,'C');
//			$pdf->Cell(120 ,6,$comAddress1,0,1,'L');
//			$pdf->Cell(105 ,6,"",0,0,'C');
//			$pdf->Cell(120 ,6,$comAddress2,0,1,'L');
//			$pdf->Cell(105 ,6,"",0,0,'C');
//			$pdf->Cell(120 ,6,$comAddress3,0,1,'L');
//		}
//		
//		else
//		{
//			
//			$pdf->Cell(120 ,7,"....................................................................................",0,1,'L');
//			$pdf->Cell(95 ,7,"",0,0,'C');
//			$pdf->Cell(120 ,7,"....................................................................................",0,1,'L');
//			$pdf->Cell(95 ,7,"",0,0,'C');
//			$pdf->Cell(120 ,7,"....................................................................................",0,1,'L');
//		}
//		
//		$pdf->SetFont('Arial','',11);
//		$pdf->SetXY(5, 218);
//		$pdf->Cell(15 ,5,"",0,0,'C');
//		$pdf->Cell(80 ,5,"1.6 The Contact Telephone Numbers:",0,1,'L');
//		
//		$pdf->Cell(25 ,5,"",0,0,'C');
//		$pdf->Cell(17 ,5,"Mobile",0,0,'L');
//		$pdf->SetFont('courier','',10);
//		$finish = true;
//		$mobileNo = str_split($mobileNo);
//		for($i=0; $i<10; $i++){
//			if($finish){
//				foreach ($mobileNo as $char){	
//					$pdf->Cell(5,6,$char,1,0,'C');
//					$i++;
//				}
//				$finish = false;
//			}
//			if($i<10 ){
//				$pdf->Cell(5 ,6,"",1,0,'C');
//				
//			}	
//		}
//		$pdf->SetFont('Arial','',11);
//		$pdf->Cell(15 ,5,"",0,0,'C');
//		$pdf->Cell(25 ,5,"Residence",0,0,'L');
//		$pdf->SetFont('courier','',10);
//		$finish = true;
//		$phoneNo = str_split($phoneNo);
//		for($i=0; $i<10; $i++){
//			if($finish){
//				foreach ($phoneNo as $char){
//						$pdf->Cell(5 ,6,$char,1,0,'C');
//					$i++;
//				}
//				$finish = false;
//			}
//			if($i<10 ){
//				$pdf->Cell(5 ,6,"",1,0,'C');
//				
//			}		
//		}
//		$pdf->Ln();
//		
//		$pdf->SetFont('Arial','',11);
//		$pdf->SetXY(15, 233);
//		$pdf->Cell(5 ,5,"",0,0,'C');
//		$pdf->Cell(10 ,5,"02.",0,0,'C');
//		$pdf->Cell(150 ,5,"2.1 Purpose of electricity service connection:",0,1); //Header End
//		$pdf->SetXY(10, 242);
//		$pdf->Cell(20 ,8,"",0,0,'C');
//		if($purposeType == 1){	$pdf->Cell(6 ,6,"X",1,0,'C');	} else {	$pdf->Cell(6 ,6,"",1,0,'C');	}
//		$pdf->Cell(40 ,8,"House",0,0,'L');
//		if($purposeType == 4){	$pdf->Cell(6 ,6,"X",1,0,'C');	} else {	$pdf->Cell(6 ,6,"",1,0,'C');	}
//		$pdf->Cell(25 ,8,"Hotel",0,0,'L');
//		if($purposeType == 7){	$pdf->Cell(6 ,6,"X",1,0,'C');	} else {	$pdf->Cell(6 ,6,"",1,0,'C');	}
//		$pdf->Cell(50 ,8,"Saw Mill/ Metal Crusher",0,0,'L');	
//		if($purposeType == 10){	$pdf->Cell(6 ,6,"X",1,0,'C');	} else {	$pdf->Cell(6 ,6,"",1,0,'C');	}
//		$pdf->Cell(30 ,8,"Pump House",0,1,'L');	
//		
//		$pdf->Cell(20 ,8,"",0,0,'C');
//		if($purposeType == 2){	$pdf->Cell(6 ,6,"X",1,0,'C');	} else {	$pdf->Cell(6 ,6,"",1,0,'C');	}
//		$pdf->Cell(40 ,8,"Apartment",0,0,'L');
//		if($purposeType == 5){	$pdf->Cell(6 ,6,"X",1,0,'C');	} else {	$pdf->Cell(6 ,6,"",1,0,'C');	}
//		$pdf->Cell(25 ,8,"Shops",0,0,'L');
//		if($purposeType == 8){	$pdf->Cell(6 ,6,"X",1,0,'C');	} else {	$pdf->Cell(6 ,6,"",1,0,'C');	}
//		$pdf->Cell(50 ,8,"Welding Work Shop",0,0,'L');	
//		if($purposeType == 11){	$pdf->Cell(6 ,6,"X",1,0,'C');	} else {	$pdf->Cell(6 ,6,"",1,0,'C');	}
//		$pdf->Cell(30 ,8,"Industrial",0,1,'L');	
//		
//		$pdf->Cell(20 ,8,"",0,0,'C');
//		if($purposeType == 3){	$pdf->Cell(6 ,6,"X",1,0,'C');	} else {	$pdf->Cell(6 ,6,"",1,0,'C');	}
//		$pdf->Cell(40 ,8,"Adjoining House",0,0,'L');
//		if($purposeType == 6){	$pdf->Cell(6 ,6,"X",1,0,'C');	} else {	$pdf->Cell(6 ,6,"",1,0,'C');	}
//		$pdf->Cell(25 ,8,"Office",0,0,'L');
//		if($purposeType == 9){	$pdf->Cell(6 ,6,"X",1,0,'C');	} else {	$pdf->Cell(6 ,6,"",1,0,'C');	}
//		$pdf->Cell(50 ,8,"Rice Mill/ Grinding Mill",0,0,'L');	
//		if($purposeType == 12){	$pdf->Cell(6 ,6,"X",1,0,'C');	} else {	$pdf->Cell(6 ,6,"",1,0,'C');	}
//		$pdf->Cell(30 ,8,"Religious",0,1,'L');		
//		
//		$pdf->Cell(20 ,8,"",0,0,'C');
//		if($purposeType == 13){	$pdf->Cell(6 ,6,"X",1,0,'C');	} else {	$pdf->Cell(6 ,6,"",1,0,'C');	}
//		$pdf->Cell(15 ,8,"Other",0,0,'L');
//		$pdf->Cell(50 ,10,"(Specify) ...........................................................................",0,1,'L');
//		
//		
//		// -------------------------------------------------------------------------------
//		$pdf -> AddPage();
//		$pdf->SetFont('Arial','',11);
//		//$pdf->SetXY(15, 315);
//		$pdf->SetXY(15, 10);
//		
//		$pdf->Cell(10 ,6,"",0,0,'C');
//		$pdf->Cell(150 ,6,"2.2 Address of the premises where the service is required. (In English Capital Letters)",0,1); //Header End
//		
//		$pdf->SetXY(25, 16);
//		
//		
//		
//		
//		//$pdf->Cell(25 ,7,"ok. ",1,1); //Header End
//		
//		$full_address = strtoupper($pemAddress1.' '.$pemAddress2.' '.$pemAddress3) ;
//		$all_characters = str_split($full_address);
//
//		$finish = true;
//
//		$pdf->SetFont('courier','',10);
//		
//		for($i=0; $i<75; $i++){
//			if($finish){
//				foreach ($all_characters as $char){
//					if($i==24){
//						$pdf->Cell(7 ,6,$char,1,1,'C');
//						$pdf->SetXY(25, 23);
//					}
//					else if($i==49){
//						$pdf->Cell(7 ,6,$char,1,1,'C');
//						$pdf->SetXY(25, 30);
//					}
//					else{
//						$pdf->Cell(7 ,6,$char,1,0,'C');
//					}
//					$i++;
//				}
//				$finish = false;
//			}
//			//}
//			if($i==24 ){
//				$pdf->Cell(7 ,6,"",1,1,'C');
//				$pdf->SetXY(25, 23);
//			}
//			else if($i==49){
//				$pdf->Cell(7 ,6,"",1,1,'C');
//				$pdf->SetXY(25, 30);
//			}
//			else{
//				$pdf->Cell(7 ,6,"",1,0,'C');
//			}
//		}
//		
//		$pdf->SetFont('Arial','',9);
//		$pdf->SetXY(15, 36);
//		
//		$pdf->Cell(15 ,5,"",0,0,'C');
//		$pdf->Cell(150 ,5,"(Please indicate how to access to the premises, by a diagram on page 04)",0,1); //Header End	
//		$pdf->SetFont('Arial','',11);
//		$pdf->SetXY(15, 42);
//		$pdf->Cell(10 ,6,"",0,0,'C');
//		$pdf->Cell(150 ,6,"2.3 The Electricity Account number of a neighboring house",0,1); //Header End
//		
//		$pdf->SetFont('courier','',10);
//		$pdf->SetXY(25, 48);
//		$finish = true;
//		$all_characters= "";
//		$all_characters = str_split($nebAccount);
//		for($i=0; $i<10; $i++){
//			if($finish){
//				foreach ($all_characters as $char){
//					
//						$pdf->Cell(7,6,$char,1,0,'C');
//						
//					
//					$i++;
//				}
//				//$pdf->SetXY(40, 157);
//				$finish = false;
//			}
//			if($i<10 ){
//				$pdf->Cell(7 ,6,"",1,0,'C');
//				
//			}
//			
//					
//		}
//		$pdf->SetFont('Arial','',9);
//		$pdf->SetXY(15, 54);
//		
//		$pdf->Cell(15 ,5,"",0,0,'C');
//		$pdf->Cell(150 ,5,"(Providing this information facilitates the identification of the location.)",0,1); //Header End	
//		$pdf->SetFont('Arial','',11);
//		
//		
//		$pdf->SetXY(10, 62);
//		$pdf->Cell(5 ,7,"",0,0,'C');
//		$pdf->Cell(10 ,6,"03.",0,0,'C');
//		$pdf->Cell(75 ,6,"3.1 Wiring installation of the building :",0,0); //Header End
//		
//		$pdf->SetFont('Arial','',10);
//		if($phaseType == 1){	$pdf->Cell(7 ,6,"X",1,0,'C');		 $pdf->Cell(20 ,7,"Single Phase",0,0);	$pdf->Cell(15 ,6,"",0,0,'C');
//								$pdf->Cell(7 ,6,"",1,0,'C');		$pdf->Cell(17,7,"Three Phase",0,0);	
//							} 
//		 //Header End
//		 //Header End
//		else if($phaseType == 2){	$pdf->Cell(7 ,6,"",1,0,'C'); $pdf->Cell(20 ,7,"Single Phase",0,0);		$pdf->Cell(10 ,6,"",0,0,'C');
//									$pdf->Cell(7 ,6,"X",1,0,'C');$pdf->Cell(20 ,7,"Three Phase",0,0);	
//								}
//		else{		$pdf->Cell(7 ,6,"",1,0,'C'); $pdf->Cell(20 ,7,"Single Phase",0,0);		$pdf->Cell(10 ,6,"",0,0,'C');
//									$pdf->Cell(7 ,6,"",1,0,'C');$pdf->Cell(20 ,7,"Three Phase",0,0);	}
//		
//		 //Header End
//		//$pdf->Cell(100 ,8,"3.1 Wiring installation of the building :",0,0); //Header End
//		
//		$pdf->Cell(12 ,6,"",0,0); //Header End
//		if($ampType == 1){	$pdf->Cell(10,6,"30A",1,0,'C');	} 
//		else if($ampType == 2) {	$pdf->Cell(10,6,"60A",1,1,'C');	} 
//		else {	$pdf->Cell(10,6,"30A",1,0,'C');		$pdf->Cell(10,6,"60A",1,1,'C');}
//		//$pdf->Cell(20 ,7,"Three Phase",0,0); //Header End
//		
//		$pdf->SetXY(10, 71);
//		$pdf->SetFont('Arial','',11);
//		$pdf->Cell(15 ,6,"",0,0,'C');
//		//$pdf->Cell(10 ,7,"03.",0,0,'C');
//		$pdf->Cell(15 ,6,"3.2",0,0); //Header End
//		$pdf->SetFont('Arial','B',11);
//		$pdf->Cell(20 ,6,"No",1,0,'C');
//		$pdf->Cell(100 ,6,"Details of Installation",1,0,'C');
//		$pdf->Cell(30 ,6,"Number",1,1,'C');
//		
//		$pdf->SetFont('Arial','',11);
//		$pdf->Cell(30 ,6,"",0,0,'C');
//		$pdf->Cell(20 ,6,"01",1,0,'C');
//		$pdf->Cell(100 ,6,"Lamp Points",1,0,'L');
//		if($lamp){	$pdf->Cell(30 ,6,$lamp,1,1,'C');	} else {	$pdf->Cell(30 ,6,"",1,1,'C');	}
//		
//		$pdf->Cell(30 ,6,"",0,0,'C');
//		$pdf->Cell(20 ,6,"02",1,0,'C');
//		$pdf->Cell(100 ,6,"Fans",1,0,'L');
//		if($fans){	$pdf->Cell(30 ,6,$fans,1,1,'C');	} else {	$pdf->Cell(30 ,6,"",1,1,'C');	}
//		
//		$pdf->Cell(30 ,6,"",0,0,'C');
//		$pdf->Cell(20 ,6,"03",1,0,'C');
//		$pdf->Cell(100 ,6,"Socket Outlets - 5 Amp",1,0,'L');
//		if($socket5){	$pdf->Cell(30 ,6,$socket5,1,1,'C');	} else {	$pdf->Cell(30 ,6,"",1,1,'C');	}
//		
//		$pdf->Cell(30 ,6,"",0,0,'C');
//		$pdf->Cell(20 ,6,"04",1,0,'C');
//		$pdf->Cell(100 ,6,"Socket Outlets - 15 Amp",1,0,'L');
//		if($socket15){	$pdf->Cell(30 ,6,$socket15,1,1,'C');	} else {	$pdf->Cell(30 ,6,"",1,1,'C');	}
//		
//		
//		$pdf->SetXY(40, 101);
//		//$pdf->Cell(30 ,24,"",0,0,'C');
//		$pdf->Cell(20 ,24,"",1,0,'C');
//		$pdf->Cell(100 ,24,"",1,0,'L');
//		$pdf->Cell(30 ,24,"",1,1,'C');
//		
//		$pdf->SetXY(40, 101);
//		$pdf->Cell(20 ,6,"05",0,0,'C');
//		$pdf->Cell(100 ,6,"Motor Capacity",0,0,'L');
//		$pdf->Cell(30 ,6,"",0,1,'C');
//		
//		//$pdf->SetXY(40, 100);
//		$pdf->Cell(50 ,6,"",0,0,'C');
//		if($motor1Capacity){	$pdf->Cell(100 ,6,"    1. Motor    ".$motor1Capacity."    HP/kW",0,0,'L');	} 
//		else {	$pdf->Cell(100 ,6,"    1. Motor ........................ HP/kW",0,0,'L');	}
//		
//		$pdf->Cell(30 ,6,$motor1No,0,1,'C');
//		
//		$pdf->Cell(50 ,6,"",0,0,'C');
//		if($motor2Capacity){	$pdf->Cell(100 ,6,"    2. Motor    ".$motor2Capacity."    HP/kW",0,0,'L');	}
//		else {	$pdf->Cell(100 ,6,"    2. Motor ........................ HP/kW",0,0,'L');	} 
//		$pdf->Cell(30 ,6,$motor2No,0,1,'C');
//		
//		$pdf->Cell(50 ,6,"",0,0,'C');
//		if($motor3Capacity){	$pdf->Cell(100 ,6,"    2. Motor    ".$motor3Capacity."    HP/kW",0,0,'L');	}
//		else {	$pdf->Cell(100 ,6,"    3. Motor ........................ HP/kW",0,0,'L');	} 
//		$pdf->Cell(30 ,6,$motor3No,0,1,'C');
//		
//		
//		$pdf->Cell(30 ,6,"",0,0,'C');
//		$pdf->Cell(20 ,6,"06",1,0,'C');
//		if($weldingCapacity){	$pdf->Cell(100 ,6,"Electric Welding Plant - Capacity    ".$weldingCapacity."    (kWh)",1,0,'L');	}
//		else {	$pdf->Cell(100 ,6,"Electric Welding Plant - Capacity  ................... (kWh)",1,0,'L');	} 
//		$pdf->Cell(30 ,6,$weldingNo,1,1,'C');
//		
//		$pdf->Cell(30 ,6,"",0,0,'C');
//		$pdf->Cell(20 ,6,"07",1,0,'C');
//		if($airCapacity){	$pdf->Cell(100 ,6,"Air Conditioning    ".$airCapacity."    (BTU)",1,0,'L');	}
//		else {	$pdf->Cell(100 ,6,"Air Conditioning  .......................... (BTU)",1,0,'L');	} 
//		$pdf->Cell(30 ,6,$airNo,1,1,'C');
//		
//		$pdf->Cell(30 ,6,"",0,0,'C');
//		$pdf->Cell(20 ,6,"08",1,0,'C');
//		if($pumpCapacity){	$pdf->Cell(100 ,6,"Air Conditioning    ".$pumpCapacity."    (BTU)",1,0,'L');	}
//		else {	$pdf->Cell(100 ,6,"Water Pump  .......................... HP/kW",1,0,'L');	} 
//		$pdf->Cell(30 ,6,$pumpNo,1,1,'C');
//		
//		$pdf->Cell(30 ,12,"",0,0,'C');
//		$pdf->Cell(20 ,12,"09",1,0,'C');
//		$pdf->Cell(130 ,6,"Other apparatus (specify)",0,1,'L');
//		//$pdf->Cell(100 ,6,"Other apparatus (specify)",1,0,'L');
//		//$pdf->Cell(30 ,12,"",1,1,'C');
//		
//		$pdf->Cell(50 ,12,"",0,0,'C');
//		//pdf->Cell(20 ,12,"09",1,0,'C');
//		$pdf->Cell(100 ,6,$other,1,0,'L');
//		//$pdf->Cell(100 ,6,"Other apparatus (specify)",1,0,'L');
//		$pdf->Cell(30 ,6,$otherNo,1,1,'C');
//		
//		
//		$pdf->SetXY(10, 158);
//		$pdf->SetFont('Arial','',11);
//		$pdf->Cell(5 ,6,"",0,0,'C');
//		$pdf->Cell(10 ,6,"04.",0,0,'C');
//		$pdf->Cell(70 ,6,"4.1 Has electricity been supplied previously to this premises :",0,1); //Header End
//		$pdf->Cell(27 ,5,"",0,0,'C');
//		
//		$pdf->Cell(60 ,5,"If so, the Account No.",0,0); //Header End
//		$pdf->SetFont('courier','',10);
//		//$pdf->SetXY(25, 80);
//		$all_characters= "";
//		$finish = true;
//		$all_characters = str_split($prvAccount);
//		for($i=0; $i<10; $i++){
//			if($finish){
//				foreach ($all_characters as $char){
//					
//						$pdf->Cell(7,6,$char,1,0,'C');
//						
//					
//					$i++;
//				}
//				//$pdf->SetXY(40, 157);
//				$finish = false;
//			}
//			if($i<10 ){
//				$pdf->Cell(7 ,6,"",1,0,'C');
//				
//			}
//			
//					
//		}
//		$pdf->Cell(10 ,7,"",0,1,'C');
//		//////////////////////
//		$pdf->SetXY(10, 173);
//		$pdf->SetFont('Arial','',11);
//		$pdf->Cell(15 ,6,"",0,0,'C');
//		//$pdf->Cell(10 ,6,"04.",0,0,'C');
//		$pdf->Cell(70 ,6,"4.2 Has electricity been supplied previously to this premises :",0,1); //Header End
//		$pdf->Cell(27 ,5,"",0,0,'C');
//		
//		$pdf->Cell(50 ,5,"If so, the Account No.",0,0); //Header End
//		$pdf->SetFont('courier','',10);
//		//$pdf->SetXY(25, 80);
//		$all_characters= "";
//		$finish = true;
//		$all_characters = str_split($ownAccount1);
//		
//		$pdf->Cell(10 ,6,"(i) ",0,0,'C');
//		for($i=0; $i<10; $i++){
//			if($finish){
//				foreach ($all_characters as $char){
//					
//						$pdf->Cell(7,6,$char,1,0,'C');
//						
//					
//					$i++;
//				}
//				//$pdf->SetXY(40, 157);
//				$finish = false;
//			}
//			if($i<10 ){
//				$pdf->Cell(7 ,6,"",1,0,'C');
//				
//			}
//		}
//		
//		$pdf->Cell(10 ,7,"",0,1,'C');
//		$all_characters= "";
//		$finish = true;
//		$all_characters = str_split($ownAccount2);
//		
//		$pdf->Cell(77 ,7,"",0,0,'C');
//		$pdf->Cell(10 ,7,"(ii) ",0,0,'C');
//		for($i=0; $i<10; $i++){
//			if($finish){
//				foreach ($all_characters as $char){
//					
//						$pdf->Cell(7,6,$char,1,0,'C');
//						
//					
//					$i++;
//				}
//				//$pdf->SetXY(40, 157);
//				$finish = false;
//			}
//			if($i<10 ){
//				$pdf->Cell(7 ,6,"",1,0,'C');
//				
//			}
//		}
//		$pdf->Cell(10 ,7,"",0,1,'C');
//		$pdf->SetXY(10, 195);
//		$pdf->SetFont('Arial','',11);
//		$pdf->Cell(15 ,6,"",0,0,'C');
//		$pdf->Cell(70 ,6,"4.3  In case of electricity lines are to be drawn over the property of other owners, please state ",0,1); //Header End
//
//		$pdf->Cell(23 ,6,"",0,0,'C');
//		$pdf->Cell(70 ,6,"their list of names and their consent or objection.",0,1); //Header End
//		$pdf->SetFont('Arial','',9);
//		$pdf->Cell(23 ,5,"",0,0,'C');
//		
//		$pdf->Cell(70 ,5,"(Use the form in page 5, to express their consent)",0,1,'L');
//		
//		$pdf->SetFont('Arial','',11);
//		$pdf->Cell(23 ,7,"",0,0,'C');
//		$pdf->Cell(120 ,7,"Name & Address",0,0); //Header End
//		$pdf->Cell(90 ,7,"Consent or objection",0,1);
//		
//		$pdf->Cell(23 ,7,"",0,0,'C');
//		$pdf->Cell(120 ,7,"1. .................................................................................................",0,0); //Header End
//		$pdf->Cell(90 ,7,".....................................",0,1);
//		
//		$pdf->Cell(23 ,7,"",0,0,'C');
//		$pdf->Cell(120 ,7,"2. .................................................................................................",0,0); //Header End
//		$pdf->Cell(90 ,7,".....................................",0,1);
//		
//		$pdf->Cell(23 ,7,"",0,0,'C');
//		$pdf->Cell(120 ,7,"3. .................................................................................................",0,0); //Header End
//		$pdf->Cell(90 ,7,".....................................",0,1);
//
//
//		
//		$pdf->SetXY(10, 243);
//		
//		//$pdf->SetXY(15, 63);
//		$pdf->SetFont('Arial','',10);
//		$pdf->Cell(10 ,5,"",0,0,'C');
//		$pdf->Cell(170 ,5,"I certify that the above facts are true and correct and if is become necessary to install the electricity line over the ",0,1,'L');
//		$pdf->Cell(10 ,5,"",0,0,'C');
//		$pdf->Cell(170 ,5,"lands/houses/property of others, I hereby promise to pay the entire cost incurred due to shifting the electricity line ",0,1,'L'); //Header End
//		$pdf->Cell(10 ,5,"",0,0,'C');
//		$pdf->Cell(170 ,5,"on their request. I request to provide me an estimate to obtain electricity service connection to the premises",0,1,'L'); //Header End
//		$pdf->Cell(10 ,5,"",0,0,'C');
//		$pdf->Cell(170 ,5,"mentioned above. I hereby promise not to install any other electrical loads which exceed the declared capacity.",0,1,'L'); //Header End
		//$pdf->Ln();
//		
//		$pdf->Cell(10 ,5,"",0,0,'C');
//		$pdf->Cell(60 ,5,"Date : ......................................",0,0,'L');
//		$pdf->Cell(80 ,5,"",0,0,'C');
//		$pdf->Cell(35 ,5,"...................................................",0,1,'R'); 
//		
//		$pdf->Cell(130 ,3,"",0,0,'C');
//		$pdf->Cell(60 ,3,"Signature of the Applicant",0,0,'C');	
			
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


