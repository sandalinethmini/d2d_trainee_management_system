<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChangeOwnerModel extends CI_Model {

	

	public function __construct()
	{
		parent::__construct();
		//define('FPDF_FONTPATH',APPPATH .'third_party\fpdf\font');
		require(APPPATH .'third_party/fpdf/fpdf.php');	
		//require(APPPATH .'third_party/tfpdf/tfpdf.php');
		
			
	}
	
	public function get_report($customerName,$nic,$mobileNo,$ownerName,$account)
	{
		$pdf = new FPDF();
		$pdf -> AddPage('P','A4');
		$pdf -> setDisplayMode ('fullpage');	
		
		$pdf->AddFont('bindumathi','','FM_BINDU.php');	
		$pdf->SetFont('bindumathi','',14);

		$pdf->SetXY(15, 10);
		$pdf->Cell(180, 7, iconv('UTF-8', 'cp1252', ',xld úÿ,sn, uKav,h - lE.,a,') , 0,1,'C');
		$pdf->SetFont('bindumathi','',12);
		$pdf->Cell(5, 8, "" , 0,0,'C');
		$pdf->Cell(180, 7, iconv('UTF-8', 'cp1252', 'úÿ,s mdßfNda.slhd$.sKQï ysñhd fjkia lsÍu') , 0,1,'C');
		
		$pdf->Ln();
		
		$pdf->SetFont('bindumathi','',11);
		 $str = iconv('UTF-8', 'cp1252', 'whÿïlref.a iïmQ¾K ku');
		
		$pdf->Cell(15, 5, "01'" , 0,0,'C');
		$pdf->Cell(60, 5, $str , 0,1);
		$pdf->Cell(10, 5, "" , 0,1,'C');
		$pdf->Cell(10, 5, "" , 0,0,'C');
		//$finish = true;
		//$words = explode(" ", $name_with_initial);
		//$all_characters = str_split($name_with_initial);
		
		
		$full_name = strtoupper($customerName) ;
		$all_characters = str_split($full_name);
		
		$words = explode(" ", $full_name);
		$initials = null;
		$last_name = ' '.end($words);
		array_pop($words);
		
		$finish = true;
		
		foreach ($words as $w) 
		{
			$initials .= $w[0].'';
		}
		
		$name_with_initial = $initials.$last_name;
		$pdf->SetFont('courier','B',11);
		
		for($i=0; $i<75; $i++){
			
			if($finish){
				foreach ($all_characters as $char){
					if($i==24){
						$pdf->Cell(7 ,6,$char,1,1,'C');
						$pdf->Cell(10  ,1,"    ",0,1,'C');
						$pdf->Cell(10, 6, "" , 0,0,'C');
						//$pdf->SetXY(25, 130);
					}
					else if($i==49){
						$pdf->Cell(7 ,6,$char,1,1,'C');
						$pdf->Cell(10  ,1,"    ",0,1,'C');
						$pdf->Cell(10, 6, "" , 0,0,'C');
						//$pdf->SetXY(25, 137);
					}
					else{
						$pdf->Cell(7 ,6,$char,1,0,'C');
					}
					$i++;
				}
				$finish = false;
			}
			
			if($i==24 ){
				$pdf->Cell(7 ,6,"",1,1,'C');
				$pdf->Cell(10  ,1,"    ",0,1,'C');
				$pdf->Cell(10, 6, "" , 0,0,'C');
				//$pdf->SetXY(25, 130);
			}
			else if($i==49){
				$pdf->Cell(7 ,6,"",1,1,'C');
				$pdf->Cell(10  ,1,"    ",0,1,'C');
				$pdf->Cell(10, 6, "" , 0,0,'C');
				//$pdf->SetXY(25, 137);
			}
			else{
				$pdf->Cell(7 ,6,"",1,0,'C');
			}
			

		}
		$pdf->Ln();$pdf->Ln();
		$pdf->SetFont('bindumathi','',11);

		
		$pdf->Cell(15, 5, "02'" , 0,0,'C');
		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', 'whÿïlref.a uq,l=re iu. ku ^bx.%sisfhka&') , 0,1);
		$pdf->Cell(10, 5, "" , 0,1,'C');
		$pdf->Cell(10, 5, "" , 0,0,'C');
		
		
		$pdf->SetFont('courier','B',11);
		//$pdf->SetXY(25, 153);
		$finish = true;
		//$words = explode(" ", $name_with_initial);
		$all_characters = str_split($name_with_initial);
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
		
		
		$pdf->Ln();
		
		
		
		$pdf->SetFont('bindumathi','',11);

		
		$pdf->Cell(15, 5, "03'" , 0,0,'C');
		$pdf->Cell(56, 5, iconv('UTF-8', 'cp1252', "cd;sl yeÿkqïm;a wxlh ") , 0,0);
		$pdf->Cell(30, 5, "" , 0,0);
		
		$nic_characters = str_split($nic);
		$finish = true;
		$pdf->SetFont('courier','B',11);
		for($i=0; $i<12; $i++){
			if($finish){
				foreach ($nic_characters as $char){
					
						$pdf->Cell(7,6,$char,1,0,'C');
						
					
					$i++;
				}
				//$pdf->SetXY(40, 157);
				$finish = false;
			}
			if($i<12 ){
				$pdf->Cell(7 ,6,"",1,0,'C');
				
			}
			
					
		}
		
		$pdf->SetFont('bindumathi','',11);
		//$pdf->Ln();
		$pdf->Cell(15,5, "" , 0,1,'C');
		
		$pdf->Cell(15, 5, "'" , 0,0,'C');

		$pdf->Cell(56, 5, iconv('UTF-8', 'cp1252', '^cd ye msgm;laa wuqKkak&') , 0,1);
		$pdf->Ln();
		
		$pdf->SetFont('bindumathi','',11);

		//for($i=0;$i<9;$i++){
		//	$pdf->Cell(7 ,7,"",1,0,'C');
		//}
		//$pdf->Cell(7 ,7,"",1,1,'C');
		//$pdf->Ln();
		
		
		$pdf->Cell(15, 5, "04'" , 0,0,'C');
		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', 'úÿ,s ì,amf;a ioyka ku') , 0,0);
		$pdf->Cell(25, 5, "" , 0,0);
		$pdf->SetFont('courier','B',11);
		$pdf->Cell(120, 5, strtoupper($ownerName) , 0,1);

		//$pdf->SetFont('bindumathi','',11);

		$pdf->SetFont('bindumathi','',11);
	
		$pdf->Ln();
		
		$pdf->Cell(15, 5, "05'" , 0,0,'C');
		$pdf->Cell(56, 5, iconv('UTF-8', 'cp1252', 'mdßfNda.sl .sKQï wxlh') , 0,0);
		$pdf->Cell(30, 5, "" , 0,0);
		
		$finish = true;
		$pdf->SetFont('courier','B',11);
		$all_characters= "";
		$all_characters = str_split($account);
		for($i=0; $i<9; $i++){
			if($finish){
				foreach ($all_characters as $char){
					
						$pdf->Cell(7,6,$char,1,0,'C');
						
					
					$i++;
				}
				//$pdf->SetXY(40, 157);
				$finish = false;
			}
			if($i<9 ){
				$pdf->Cell(7 ,6,"",1,0,'C');
				
			}
			
					
		}
		
		
		$pdf->SetFont('bindumathi','',11);

		
		
		
		//for($i=0;$i<9;$i++){
		//	$pdf->Cell(7 ,7,"",1,0,'C');
		//}
		
		$pdf->Ln();
		$pdf->Cell(7 ,6,"",0,1,'C');
		
		
		$pdf->Cell(15, 5, "06'" , 0,0,'C');
		$pdf->Cell(56, 5,  iconv('UTF-8', 'cp1252', 'ÿrl:k wxlh')  , 0,0);
		$pdf->Cell(30, 5, "" , 0,0);
		
		
		$pdf->SetFont('courier','B',11);
		$finish = true;
		$mobileNo = str_split($mobileNo);
		for($i=0; $i<9; $i++){
			if($finish){
				foreach ($mobileNo as $char){	
					$pdf->Cell(7,6,$char,1,0,'C');
					$i++;
				}
				$finish = false;
			}
			if($i<9 ){
				$pdf->Cell(7 ,6,"",1,0,'C');
				
			}	
		}
		
		
		
			$pdf->SetFont('bindumathi','',11);

		//for($i=0;$i<9;$i++){
		//	$pdf->Cell(7 ,7,"",1,0,'C');
		//}
		
		$pdf->Ln();
		
		$pdf->Ln();
		$pdf->Cell(7 ,6,"",0,1,'C');
		$pdf->SetFont('Arial','',9);
		 $pdf->Cell(25, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, "......................" , 0,0);
		$pdf->Cell(40, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, "................................................." , 0,1);
		$pdf->SetFont('bindumathi','',11);

		$pdf->Cell(30, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', 'Èkh ') , 0,0);
		$pdf->Cell(40, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', 'whÿïlref.a w;aik') , 0,1);
		
		$pdf->Ln();
	//    karyalayen laba gath
		$pdf->Cell(20, 4, "" , 0,0);
 		$pdf->Cell(120, 4, iconv('UTF-8', 'cp1252', ' ld¾hd,fhka ,nd fok f.ùï jjqprhla u.ska wdrlaIl wem ;eïm;= .dia;= f.úh h;= fõ') , 0,1);
		$pdf->Cell(25, 2, "" , 0,1,'C');
		$pdf->SetFont('Arial','',12);
		 $pdf->Cell(120, 1, "________________________________________________________________________________________" , 0,1);
		 $pdf->Ln();
		 $pdf->Cell(120, 2, "" , 0,1);
		 $pdf->SetFont('bindumathi','',11);
		 $pdf->Cell(15, 5, "" , 0,0,'C');
		$pdf->Cell(25, 5, iconv('UTF-8', 'cp1252', 'my; ioyka ') , 0,0);
		
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(25, 5, "A / B / C / D " , 0,0);
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', 'hk wdldrhg úÿ,s mdßfNda.slhd $ .sKqï ysñhd fjkiaùu u; úÿ,s ') , 0,1);
		$pdf->Cell(15, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', "ìf,ys ku fjkia lr .ekSug yelshdj we;'wod, fldgqfõ ,l=K fhdokak'oekg Tng ,nd oS we;s ") , 0,1);
		$pdf->Cell(15, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', "úÿ,s ì, f.ùï lr ref.k tkak'úuiSï ioyd ÿ'w 0354928099&") , 0,1);
		 $pdf->Ln(); 
		 
		 $pdf->Cell(10, 7, "" , 0,0,'C');
		 $pdf->Cell(7, 7, "" , 1,0,'C');
		 $pdf->Cell(5, 7, "" , 0,0,'C');
		 
		 $pdf->SetFont('Arial','B',13);
		 
		 $pdf->Cell(10, 7, " A - " , 0,0);
		 
		 $pdf->SetFont('bindumathi','',11);

		 
		$pdf->Cell(55, 7, iconv('UTF-8', 'cp1252', 'kS;Hdkql+, whs;slre fjkiaùu u; úÿ,s .sKqï ysñhd fjkia lsÍu') , 0,1);
		$pdf->SetFont('bindumathi','',10);
		$pdf->Cell(25, 5, "" , 0,0,'C');
		 //$pdf->Cell(7, 7, "" , 1,0,'C');
		// $pdf->Cell(5, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', "by; whÿïlref.a ^wxl 01& whs;sh ;yjqre lsÍu ioyd my; ioyka ,shlshú,s j,ska tlla fyda ") , 0,1);
		$pdf->Cell(25, 5, "" , 0,0,'C');
		 //$pdf->Cell(7, 7, "" , 1,0,'C');
		// $pdf->Cell(5, 5, "" , 0,0,'C');
		
		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', "lsysmhla bÈßm;a l, hq;=h'") , 0,1);
		$pdf->Cell(25, 2, "" , 0,1,'C');
		$pdf->Cell(25, 5, "" , 0,0,'C');
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(10, 5, "i." , 0,0,'C');
		$pdf->SetFont('bindumathi','',11);

		$pdf->Cell(130, 5, iconv('UTF-8', 'cp1252', "wod, ia:dkfha ysñlï Tmamqj") , 0,0);
		$pdf->Cell(5, 5, "" , 1,1,'C');
		$pdf->Cell(25, 1, "" , 0,1,'C');
		$pdf->Cell(25, 5, "" , 0,0,'C');
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(10, 5, "ii." , 0,0,'C');
		$pdf->SetFont('bindumathi','',11);

		$pdf->Cell(130, 5,iconv('UTF-8', 'cp1252', "wod, ia:dkfha nÿ Tmamqj") , 0,0);
		
		$pdf->Cell(5, 5, "" , 1,1,'C');
		$pdf->Cell(25, 1, "" , 0,1,'C');
		$pdf->Cell(25, 5, "" , 0,0,'C');
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(10, 5, "iii." , 0,0,'C');
		$pdf->SetFont('bindumathi','',11);

		$pdf->Cell(130, 5, iconv('UTF-8', 'cp1252', "whs;sh mjrk ,o l=uk fyda ,shú,a,la") , 0,0);
		$pdf->Cell(5, 5, "" , 1,1,'C');
		 $pdf->Ln();
		 
		 $pdf->Cell(10, 7, "" , 0,0,'C');
		 $pdf->Cell(7, 7, "" , 1,0,'C');
		 $pdf->Cell(5, 7, "" , 0,0,'C');
		$pdf->SetFont('Arial','',11);
		 
		 $pdf->Cell(10, 7, " B - " , 0,0);
		 
		 $pdf->SetFont('bindumathi','',11);

		$pdf->Cell(60, 7, iconv('UTF-8', 'cp1252', "mÈxÑlre fjkiajSu u; .sKqï ysñhd fjkia lsÍu") , 0,1);
		$pdf->SetFont('bindumathi','',10);
		$pdf->Cell(25, 5, "" , 0,0,'C');
		 //$pdf->Cell(7, 7, "" , 1,0,'C');
		// $pdf->Cell(5, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', "by; whÿïlref.a ^wxl 01& whs;sh ;yjqre lsÍu ioyd my; ioyka ,shlshú,s j,ska tlla fyda ") , 0,1);
		$pdf->Cell(25, 5, "" , 0,0,'C');
		 //$pdf->Cell(7, 7, "" , 1,0,'C');
		// $pdf->Cell(5, 5, "" , 0,0,'C');
		
		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', "lsysmhla bÈßm;a l, hq;=h'") , 0,1);
		$pdf->Cell(25, 2, "" , 0,1,'C');
		$pdf->Cell(25, 5, "" , 0,0,'C');
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(10, 5, "i." , 0,0,'C');
		$pdf->SetFont('bindumathi','',11);

		$pdf->Cell(130, 5, iconv('UTF-8', 'cp1252', "oekg fuu úÿ,s whm; we;s mßY%fha mÈxÑj issákafka by; whÿïlre") , 0,0);
		$pdf->Cell(5, 5, "" , 1,1,'C');
		$pdf->Cell(35, 5, "" , 0,0,'C');

		$pdf->Cell(130, 5, iconv('UTF-8', 'cp1252', "njg Pkao kdu f,aLKfhka Wmqgd.;a ,shú,a,la") , 0,1);
		 $pdf->SetFont('Arial','',11);
		 $pdf->Cell(25, 5, "" , 0,0,'C');
		$pdf->Cell(10, 5, "ii." , 0,0,'C');
		$pdf->SetFont('bindumathi','',11);

		
		$pdf->Cell(130, 5, iconv('UTF-8', 'cp1252', "m%foaYfha .%du ks,OdÍ úiska ksl=;a lrkq ,nk moxÑ iy;slh") , 0,0);
		$pdf->Cell(5, 5, "" , 1,1,'C');
		//$pdf->Cell(25, 10, "" , 0,1,'C');
		
		 //$pdf->Ln();
		  
		 
		  $pdf->Cell(10, 7, "" , 0,0,'C');
		 $pdf->Cell(7, 7, "" , 1,0,'C');
		 $pdf->Cell(5, 7, "" , 0,0,'C');
		 
		  $pdf->SetFont('Arial','B',13);
		  
		 
		 $pdf->Cell(10, 7, " C - " , 0,0);
		 
		 $pdf->SetFont('bindumathi','',11);

		 
		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', "fmr whs;slref.a urKh fya;=fjka úÿ,s .sKqï yssñhd fjkia lsÍu") , 0,1);
		$pdf->SetFont('bindumathi','',10);
		$pdf->Cell(25, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', "by; whÿïlref.a ^wxl 01& whs;sh ;yjqre lsÍu ioyd my; ioyka ,shlshú,s j,ska tlla fyda ") , 0,1);
		$pdf->Cell(25, 5, "" , 0,0,'C');
		 //$pdf->Cell(7, 7, "" , 1,0,'C');
		// $pdf->Cell(5, 5, "" , 0,0,'C');
		
		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', "lsysmhla bÈßm;a l, hq;=h'") , 0,1);
		$pdf->Cell(25, 5, "" , 0,0,'C');
		 //$pdf->Cell(7, 7, "" , 1,0,'C');
		// $pdf->Cell(5, 5, "" , 0,0,'C');
		
		//$pdf->Cell(60, 5, "whÿïlref.a iïmQ¾ " , 0,1);
		$pdf->Cell(25, 2, "" , 0,1,'C');
		$pdf->Cell(25, 5, "" , 0,0,'C');
		 $pdf->SetFont('Arial','',11);
		$pdf->Cell(10, 5, "i." , 0,0,'C');
		$pdf->SetFont('bindumathi','',11);

		$pdf->Cell(130, 5, iconv('UTF-8', 'cp1252', "fmr whs;slref.a urK iy;slh") , 0,0);
		$pdf->Cell(5, 5, "" , 1,1,'C');
		$pdf->Cell(25, 1, "" , 0,1,'C');
		$pdf->Cell(25, 5, "" , 0,0,'C');
		 $pdf->SetFont('Arial','',11);
		$pdf->Cell(10, 5, "ii." , 0,0,'C');
		$pdf->SetFont('bindumathi','',11);

		$pdf->Cell(130, 5, iconv('UTF-8', 'cp1252', "fmr whs;slref.a {d;s ino;djh ikd; lrk ,shú,a,la") , 0,0);
		$pdf->Cell(5, 5, "" , 1,1,'C');
		//$pdf->Cell(25, 2, "" , 0,1,'C');
		
		$pdf->Cell(35, 5, "" , 0,0,'C');
		$pdf->SetFont('bindumathi','',10);
		$pdf->Cell(130, 5, iconv('UTF-8', 'cp1252', "^b,a,qïlre orefjlakï Wmamekak iy;slh l,;%hdkï újdy iy;slh&") , 0,1);
		$pdf->Cell(35, 5, "" , 0,0,'C');

		$pdf->Cell(130, 5, iconv('UTF-8', 'cp1252', "fyda j¾;udk whÿïlre\$mÈxÑlre njg ioyka ,shú,a,la") , 0,1);
	
		
		 $pdf->Ln();
		 
		 $pdf->Cell(10, 7, "" , 0,0,'C');
		 $pdf->Cell(7, 7, "" , 1,0,'C');
		 $pdf->Cell(5, 7, "" , 0,0,'C');
		 
		  $pdf->SetFont('Arial','B',13);
		 
		 $pdf->Cell(10, 7, " D - " , 0,0);
		 
		 $pdf->SetFont('bindumathi','',11);

		 
		$pdf->Cell(60, 7, iconv('UTF-8', 'cp1252', "fmr whs;slref.a leue;a; u; úÿ,s .sKqï ysñhd fjkia lsÍu") , 0,1);
		
		$pdf->Cell(25, 5, "" , 0,0,'C');
		 //$pdf->Cell(7, 7, "" , 1,0,'C');
		// $pdf->Cell(5, 5, "" , 0,0,'C');
		$pdf->SetFont('bindumathi','',10);
		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', 'wod, ,shlshú,s iu. my; m%ldYh .%du ks<OdÍ bÈßfha oS m%ldY fldg w;aik ;eìh hq;=h') , 0,1);
		$pdf->Cell(25, 5, "" , 0,0,'C');
		 //$pdf->Cell(7, 7, "" , 1,0,'C');
		// $pdf->Cell(5, 5, "" , 0,0,'C');
		$pdf->SetFont('bindumathi','',11);

		//$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', '') , 0,1);
		$pdf->Cell(25, 2, "" , 0,1,'C');
		$pdf->Cell(25, 5, "" , 0,0,'C');
		 $pdf->SetFont('Arial','',11);
		$pdf->Cell(10, 5, "i." , 0,0,'C');
		$pdf->SetFont('bindumathi','',11);

		$pdf->Cell(130, 5, iconv('UTF-8', 'cp1252', "fmr whs;slref.a yeÿkqïmf;a Pdhd msgm;la") , 0,0);
		$pdf->Cell(5, 5, "" , 1,1,'C');
		$pdf->Cell(25, 1, "" , 0,1,'C');
		
		 $pdf->SetFont('Arial','',11);
		$pdf->Cell(25, 7, "" , 0,0,'C');
		$pdf->Cell(10, 7, "ii." , 0,0,'C');
		$pdf->SetFont('bindumathi','',11);

		$pdf->Cell(85, 7, iconv('UTF-8', 'cp1252', 'by; .sKqï wxl orK úÿ,s iemhqfuys ysñldß;ajh') , 0,0);
		$pdf->SetFont('Arial','',9);
		$pdf->Cell(25, 8, "....................................................................." , 0,0);
		$pdf->Cell(25, 5, "" , 0,1);
		$pdf->Cell(35, 6, "" , 0,0,'C');
		$pdf->SetFont('bindumathi','',11);

		$pdf->Cell(63, 6, iconv('UTF-8', 'cp1252', '^wxl 04& jk ud yg mej;s w;r th ') , 0,0);
		
		$pdf->SetFont('Arial','',9);
		$pdf->Cell(35, 7, ".............................................................................." , 0,0);
		$pdf->Cell(35, 6, "" , 0,0,'C');
		$pdf->SetFont('bindumathi','',11);

		$pdf->Cell(80, 6, iconv('UTF-8', 'cp1252', '^wxl 01&') , 0,1);
		$pdf->Cell(35, 5, "" , 0,0,'C');
		
		$pdf->Cell(130, 5, iconv('UTF-8', 'cp1252', 'hk whg mejÍug leu;s nj fuhska m%ldY lrñ') , 0,1);
		

		$pdf->Cell(15, 7, "" , 0,1,'C');
		 //$pdf->Ln();
		 $pdf->SetFont('Arial','',9);
		 $pdf->Cell(25, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, "......................" , 0,0);
		$pdf->Cell(40, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, "................................................." , 0,1);
		$pdf->SetFont('bindumathi','',11);

		$pdf->Cell(30, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', 'Èkh ') , 0,0);
		$pdf->Cell(35, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', 'fmr whs;slref.a w;aik') , 0,1);
		
		 //////////////////////////////////////
		 
	
		$pdf->Cell(25, 2, "" , 0,1,'C');
		$pdf->SetFont('Arial','',9);
		$pdf->Cell(120, 1, "________________________________________________________________________________________" , 0,1);
		$pdf->Cell(120, 1, "" , 0,1);
		$pdf->SetFont('bindumathi','',11);

		$pdf->Cell(15, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', '^fuu fldgi .%du ks<OdÍ úiska iïmQ¾K l< hq;=h&') , 0,1);

		
		$pdf->Ln();
	
		
		$pdf->Cell(15, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', 'm%dfoaYSh f,aLï"') , 0,1);
		$pdf->Cell(15, 2, "" , 0,1,'C');
		$pdf->Cell(15, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', "úÿ,s .sKqï ysñhdf.a ysñldß;ajh fjkiaùu ioyd whÿïlre úiska bÈßm;a lrk ,o ,smsf,aLK ") , 0,1);
		//$pdf->Cell(15, 2, "" , 0,1,'C');
	
		 $pdf->Cell(15, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', "mßlaId lrk ,oS' ta wkqj by; "), 0);
		
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(22, 5, " A / B / C / D   " , 0,0,'C');
		$pdf->SetFont('bindumathi','',11);

		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', "hgf;a mdßfNda.slhd fjkia ùu ks¾foaY lrñ'"), 0,1);
		
		$pdf->Cell(15, 5, "" , 0,0,'C');
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', '^wkjYH wl=re lmd yßkak&') , 0,1);
		
		//$pdf->Ln();
		$pdf->Cell(15, 8, "" , 0,1,'C');
		
		$pdf->SetFont('Arial','',9);
		 $pdf->Cell(25, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, "......................" , 0,0);
		$pdf->Cell(40, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, "................................................." , 0,1);
		$pdf->SetFont('bindumathi','',11);

		$pdf->Cell(30, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', 'Èkh ') , 0,0);
		$pdf->Cell(30, 5, "" , 0,0,'C');
		
		
		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', '.%du ks<OdÍ ^ks, uqødj ;nkak&') , 0,1);
		$pdf->Cell(25, 2, "" , 0,1,'C');
		$pdf->SetFont('Arial','',9);
		$pdf->Cell(120, 1, "________________________________________________________________________________________" , 0,1);
		$pdf->Cell(120, 1, "" , 0,1);
		$pdf->SetFont('bindumathi','',11);



		$pdf->Cell(15, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', '^fuu fldgi m%dfoaYSh f,aLï úiska iïmQ¾K l< hq;=h&') , 0,1);

		
		//$pdf->Ln();
	
		
		//$pdf->Cell(15, 5, "" , 0,0,'C');
		//$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', 'úÿ,s bxðfkare- ^lE.,a,&'), 0,1);
		$pdf->Cell(15, 2, "" , 0,1,'C');
		
		$pdf->Ln();
		 $pdf->Cell(15, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', 'm%dfoaYSh úÿ,s bxðfkare-^lE.,a,&') , 0,1);
		$pdf->Cell(15, 2, "" , 0,1,'C');
		
		$pdf->Cell(15, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', 'by; .sKqï ysñhdf.a ku fjkiaùu ioyd ,ndfok .%du ks,OdÍf.a ks¾foaY iy;sl lrñ') , 0,1);
		
		//$pdf->Ln();
		
		$pdf->Cell(15, 10, "" , 0,1,'C');
		$pdf->SetFont('Arial','',9);
		 $pdf->Cell(25, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, "......................" , 0,0);
		$pdf->Cell(40, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, "................................................." , 0,1);
		$pdf->SetFont('bindumathi','',11);

		$pdf->Cell(30, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', 'Èkh ') , 0,0);
		$pdf->Cell(30, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', 'm%dfoaYSh f,aLï ^ks, uqødj ;nkak&') , 0,1);
		$pdf->Cell(25, 2, "" , 0,1,'C');
		
		$pdf->SetFont('Arial','',9);
		$pdf->Cell(120, 1, "________________________________________________________________________________________" , 0,1);
		$pdf->Cell(120, 1, "" , 0,1);
		$pdf->SetFont('bindumathi','',11);

		
		$pdf->Cell(15, 6, "" , 0,0,'C');
		$pdf->Cell(60, 6, iconv('UTF-8', 'cp1252', '^ld¾hd,Sh m%fhdackh i`oyd&') , 0,1);
	
		$pdf->Cell(25, 4, "" , 0,1,'C');
		$pdf->Cell(15, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', 'úÿ,s bxðfkare- ^lE.,a,&') , 0,1);
		
		$pdf->Cell(25, 2, "" , 0,1,'C');
		 $pdf->Cell(15, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', "by; úÿ,s .sKqï ysñhd fjkiaùu ks¾foaY lrñ'") , 0,1);
		$pdf->Cell(15, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', '') , 0,1);
		
		//$pdf->Ln();
		
		//$pdf->Cell(25, 2, "" , 0,1,'C');
		$pdf->SetFont('Arial','',9);
		 $pdf->Cell(25, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, "......................" , 0,0);
		$pdf->Cell(40, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, "................................................." , 0,1);
		$pdf->SetFont('bindumathi','',11);

		$pdf->Cell(30, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', 'Èkh ') , 0,0);
		$pdf->Cell(40, 5, "" , 0,0,'C');
		$pdf->Cell(15, 5, iconv('UTF-8', 'cp1252', 'úÿ,s wêldÍ ^jdksc&') , 0,1);
		
		$pdf->Ln();

		$pdf->Cell(25, 3, "" , 0,1,'C');
		$pdf->Cell(15, 6, "" , 0,0,'C');
		$pdf->Cell(60, 6, iconv('UTF-8', 'cp1252', "by; úÿ,s .sKqï ysñhd fjkiaùu ks¾foaY lrñ'") , 0,1);
		
		$pdf->Ln();
	
		
		$pdf->SetFont('Arial','',9);
		 $pdf->Cell(25, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, "......................" , 0,0);
		$pdf->Cell(40, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, "................................................." , 0,1);
		$pdf->SetFont('bindumathi','',11);

		$pdf->Cell(30, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', 'Èkh ') , 0,0);
		$pdf->Cell(30, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', 'm%dfoaYSh úÿ,s bxðfkare-^lE.,a,&') , 0,1);
		

			
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
			$pdf->SetFont('Arial','B',13);

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
						
			$pdf->SetFont('bindumathi','',11);

			
			$pdf->SetFont('Arial','B',11);
			$pdf->Cell(130 ,5,'',0,0);
			$pdf->Cell(30 ,5,'Grand Total',0,0,'R');
			$pdf->Cell(30 ,5,$record->invoice_amount,0,1,'R');//end of line
				
			$pdf -> output ('Invoice.pdf','D');
				
	}
	
}


