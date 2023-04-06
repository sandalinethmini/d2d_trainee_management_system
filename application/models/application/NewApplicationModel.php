<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NewApplicationModel extends CI_Model {

	

	public function __construct()
	{
		parent::__construct();
		require(APPPATH .'third_party/fpdf/fpdf.php');	

	}
	
	public function get_report($customerName,$nic,$mobileNo,$phoneNo,$statusType,$purposeType,$comAddress1,$comAddress2,$comAddress3,$phaseType,$ampType,																																			    							$pemAddress1,$pemAddress2,$pemAddress3,$nebAccount,$prvAccount,$ownAccount1,$ownAccount2,$lamp,$fans,$socket5,$socket15,$airCapacity,$airNo,
					$motor1Capacity,$motor1No,$motor2Capacity,$motor2No,$motor3Capacity,$motor3No,$pumpCapacity,$pumpNo,$weldingCapacity,$weldingNo,$other,$otherNo)
	{
		$pdf = new FPDF();
		//$pdf = new FPDF();
		$pdf -> AddPage();
		$pdf -> setDisplayMode ('fullpage');			
		
		$pdf->AddFont('bindumathi','','FM_BINDU.php');	
		$pdf->SetFont('bindumathi','',10);

		$pdf->SetXY(15, 10);
		$pdf->Cell(180, 7, iconv('UTF-8', 'cp1252', 'ld¾hd,Sh m%fhdackh ioyd') , 1,1,'C');// office use
		
		//$pdf->SetFont('Arial','',8);
		$pdf->SetXY(15, 17);
		$pdf->Cell(60, 45, "" , 1,0,'C');
		$pdf->Cell(60, 45, "" , 1,0,'C');
		$pdf->Cell(60, 45, "" , 1,1,'C');
		
		$pdf->SetXY(20, 20);
		$pdf->Cell(50 ,5,iconv('UTF-8', 'cp1252', 'f.ùï jjqp¾ wxlh'),0,1,'L'); //"Payment Voucher No"
		
		$pdf->SetXY(20, 25);
		for($i=0;$i<10;$i++){
			$pdf->Cell(5 ,6,"",1,0,'C');
		}
		
		$pdf->SetXY(20, 38);
		
		$pdf->Cell(25 ,6,iconv('UTF-8', 'cp1252', 'tl,d'),1,0,'C'); //"Single Phase"
		$pdf->Cell(25 ,6,iconv('UTF-8', 'cp1252', 'f;l,d'),1,0,'C');  //"Three Phase"
		
		$pdf->SetXY(17, 52);
		
		$pdf->Cell(19 ,6,iconv('UTF-8', 'cp1252', 'weïmsh¾ 15'),1,0,'C');  //15 Amps
		$pdf->Cell(19,6,iconv('UTF-8', 'cp1252', 'weïmsh¾ 30'),1,0,'C');  //30 Amps
		$pdf->Cell(19,6,iconv('UTF-8', 'cp1252', 'weïmsh¾ 60'),1,0,'C');  //0 Amps
		
		
		$pdf->SetXY(80,20);
		
		$pdf->Cell(50 ,5,iconv('UTF-8', 'cp1252', 'whÿïm;a wxlh'),0,1,'L'); //Application No
		
		$pdf->SetXY(80, 25);
		
		for($i=0;$i<10;$i++){
			$pdf->Cell(5 ,6,"",1,0,'C');
		}
		
		$pdf->SetXY(97, 34);
		
		$pdf->Cell(15 ,5,iconv('UTF-8', 'cp1252', 'wh l%uh '),0,0,'C');  //"Tariff"
		$pdf->SetXY(95, 38);
		$pdf->Cell(5 ,6,"",1,0,'C');
		$pdf->Cell(5 ,6,"",1,0,'C');
		$pdf->Cell(5 ,6,"",1,0,'C');
		$pdf->Cell(5 ,6,"",1,0,'C');
		
		
		$pdf->SetXY(82, 48);
		
		$pdf->Cell(15 ,5,iconv('UTF-8', 'cp1252', ';rdmeúfha isg ÿr^óg¾&'),0,1,'L');  //"Distance from the Transformer (m)"
		$pdf->SetXY(95, 52);
		$pdf->Cell(5 ,6,"",1,0,'C');
		$pdf->Cell(5 ,6,"",1,0,'C');
		$pdf->Cell(5 ,6,"",1,0,'C');
		$pdf->Cell(5 ,6,"",1,0,'C');
		
		
		
		$pdf->SetXY(145,20);
		
		$pdf->Cell(50 ,5,iconv('UTF-8', 'cp1252', 'whÿïm; ,enqKq Èkh'),0,1,'L'); //"Application Received Date"
		
		$pdf->SetXY(145, 25);
		for($i=0;$i<8;$i++){
			$pdf->Cell(5 ,6,"",1,0,'C');
		}
		
		$pdf->SetXY(145,47);
		
		$pdf->Cell(50 ,5,iconv('UTF-8', 'cp1252', 'weia;fïka;= l< Èkh '),0,1,'L');  //"Estimated Date"
		 
		$pdf->SetXY(145, 52);
		for($i=0;$i<8;$i++){
			$pdf->Cell(5 ,6,"",1,0,'C');
		}
		
		$pdf->Image('images/ceb_logo.png',15,65,25,30);
		$pdf->SetXY(15, 65);// Logo Start
		$pdf->Cell(25 ,30,"",1,0,'C'); //Logo End
		
		//$pdf->SetFont('Arial','',15);
		$pdf->SetXY(85, 65);// Header Start
		$pdf->SetFont('bindumathi','',15);
		$pdf->Cell(60 ,10,iconv('UTF-8', 'cp1252', ',xld úÿ,sn, uKav,h '),0,1,'C');  //Ceylon Electricity Board
		$pdf->SetXY(70, 73);
		//$pdf->AddFont('DejaVu','','iskpota.ttf',true);
		//$pdf->SetFont('DejaVu','',14);
		$pdf->Cell(100 ,10,iconv('UTF-8', 'cp1252', 'úÿ,s fiajdjla ,nd .ekSu ioyd whÿï m;%h'),0,1,'C'); //Application for Obtaining an Electricity Service Connection
		$pdf->SetFont('bindumathi','',13);
		$pdf->SetXY(45, 90);
		//$pdf->SetFont('Arial','B',13);
		$pdf->Cell(25 ,7,iconv('UTF-8', 'cp1252', ') whÿïm; iïmQ¾K lsÍug m%:u fï iu. we;s Wmfoia m;%sldj lshjkak'),0,1); //Read the Instructions Paper before Filling the Application
		$pdf->SetFont('bindumathi','',10);
		//$pdf->SetFont('Arial','',11);
		$pdf->SetXY(15, 98);
		$pdf->MultiCell(170 ,5,iconv('UTF-8', 'cp1252', "^lreKdlr fuu whÿïm; mqrjd wod, mdßfNda.sl fiajd uOHia:dkhg Ndrfokak'wkkH;djh iy;sl lsÍu ioyd lreKdlr cd;sl yeÿkqïm; fyda fjk;a ms<s.; yels ,shú,a,l Pdhd msgm;la uq,a msgm; iu. bÈßm;a lrkak&"),0,1); //Please fill  form 
		//$pdf->SetXY(15, 103);$pdf->Cell(25 ,5,"In  order  to  confirm  the identity of  the  applicant,  please handover  a  photocopy  of the  National  Identity",0,1); //
		//$pdf->SetXY(15, 108);$pdf->Cell(25 ,5,"card or any other acceptable document with its original. )",0,1); //Header End
		
		$pdf->SetFont('bindumathi','',11);
		$pdf->SetXY(15, 117);
		$pdf->Cell(10 ,5,"01'",0,0,'C');
		$pdf->Cell(150 ,5,iconv('UTF-8', 'cp1252', "1'1 whÿïlref.a iïmQ¾K ku ^bx.%sis lemsg,a wl=ßka tl fldgqjl tl wl=rla isák fia ,shkak&"),0,1); //Full name
		
		
		$pdf->SetXY(25, 123);
		
		
		
		
		//$pdf->Cell(25 ,7,"ok. ",1,1); //Header End
		
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
						$pdf->SetXY(25, 130);
					}
					else if($i==49){
						$pdf->Cell(7 ,6,$char,1,1,'C');
						$pdf->SetXY(25, 137);
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
				$pdf->SetXY(25, 130);
			}
			else if($i==49){
				$pdf->Cell(7 ,6,"",1,1,'C');
				$pdf->SetXY(25, 137);
			}
			else{
				$pdf->Cell(7 ,6,"",1,0,'C');
			}
		}
		$pdf->SetFont('bindumathi','',11);
		//$pdf->SetFont('Arial','',11);
		$pdf->SetXY(15, 147);
		$pdf->Cell(10 ,5,"",0,0,'C');
		$pdf->Cell(150 ,5,iconv('UTF-8', 'cp1252', "úÿ,s fiajdjla ,nd .ekSu ioyd whÿï m;%h"),0,1); //Name with initials
		$pdf->SetFont('courier','B',11);
		$pdf->SetXY(25, 153);
		$finish = true;
		//$words = explode(" ", $name_with_initial);
		$all_characters = str_split($name_with_initial);
		for($i=0; $i<50; $i++){
			if($finish){
				foreach ($all_characters as $char){
					if($i==24){
						$pdf->Cell(7 ,6,$char,1,1,'C');
						$pdf->SetXY(25, 160);
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
				$pdf->SetXY(25, 160);
			}
			
			else{
				$pdf->Cell(7 ,6,"",1,0,'C');
			}
		}
		//$pdf->SetFont('Arial','',11);
		$pdf->SetFont('bindumathi','',11);
		$pdf->SetXY(15, 170);
		$pdf->Cell(10 ,5,"",0,0,'C');
		$pdf->Cell(25 ,5,iconv('UTF-8', 'cp1252', "1'3 cd;sl yeÿkqïm;a wxlh"),0,1,'L'); //"1.3 National Identity Card Number"
		
		$pdf->SetFont('courier','B',11);
		$pdf->SetXY(25, 176);
		$finish = true;
		$nic_characters = str_split($nic);
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
		//$pdf->SetFont('Arial','',11);
		$pdf->SetFont('bindumathi','',11);
		$pdf->SetXY(15, 186);
		$pdf->Cell(10 ,5,"",0,0,'C');
		$pdf->Cell(80 ,5,iconv('UTF-8', 'cp1252', "1'4 whs;slreo\$nÿlreo\$kS;Hdkql+, mÈxÑlreo hk j."),0,0,'L'); //"1.4 Whether the Owner/ Leaser / Lawful Occupant:"
		$pdf->Cell(25 ,5,"",0,0,'C');
		//$pdf->SetFont('courier','B',11);
		$pdf->SetFont('bindumathi','',11);
		if($statusType == 1){	$pdf->Cell(10 ,5,iconv('UTF-8', 'cp1252', "whs;slre"),0,1,'C');	}  //"Owner"
		else if($statusType == 2){	$pdf->Cell(10 ,5,iconv('UTF-8', 'cp1252', "nÿlre"),0,1,'C'); }	 //"Leaser"
		else if($statusType == 3){	$pdf->Cell(10 ,5,iconv('UTF-8', 'cp1252', "kS;Hdkql+, mÈxÑlre"),0,1,'C'); }  //"Lawful Occupant"
		else {	$pdf->SetFont('Arial','',11);	$pdf->Cell(12 ,5,".............................................................",0,1,'L');}
		
		//$pdf->SetFont('Arial','',11);
		$pdf->SetXY(15, 195);
		$pdf->Cell(10 ,5,"",0,0,'C');
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(80 ,5,iconv('UTF-8', 'cp1252', "1'5 ,sms túh hq;= ,smskh"),0,0,'L'); //"1.5 Postal Address for Communication:"
		
		$pdf->SetFont('courier','B',11);
		if($comAddress1!="" || $comAddress2!="" || $comAddress3!="")
		{	$pdf->SetFont('courier','B',11);
			$pdf->Cell(10 ,6,"",0,0,'C');
			$pdf->MultiCell(80 ,6,$comAddress1." " .$comAddress2." ".$comAddress3 ,0,'L');
			//$pdf->Cell(105 ,6,"",0,0,'C');
			//$pdf->Cell(120 ,6,$comAddress2,0,1,'L');
			//$pdf->Cell(105 ,6,"",0,0,'C');
			//$pdf->Cell(120 ,6,$comAddress3,0,1,'L');
		}
		
		else
		{
			$pdf->SetFont('Arial','',11);
			$pdf->Cell(120 ,7,"....................................................................................",0,1,'L');
			$pdf->Cell(95 ,7,"",0,0,'C');
			$pdf->Cell(120 ,7,"....................................................................................",0,1,'L');
			$pdf->Cell(95 ,7,"",0,0,'C');
			$pdf->Cell(120 ,7,"....................................................................................",0,1,'L');
		}
		
		//s$pdf->SetFont('Arial','',11);
		$pdf->SetFont('bindumathi','',11);
		$pdf->SetXY(5, 218);
		$pdf->Cell(20 ,5,"",0,0,'C');
		$pdf->Cell(80 ,5,iconv('UTF-8', 'cp1252', "1'6 iïnkaO úh yels ÿrl:k wxl"),0,1,'L'); //"1.6 The Contact Telephone Numbers:"
		
		$pdf->Cell(25 ,5,"",0,0,'C');
		$pdf->Cell(17 ,5,iconv('UTF-8', 'cp1252', "cx.u") ,0,0,'L');//mobile
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
				$pdf->Cell(5 ,6,"",1,0,'C');
				
			}	
		}
		//$pdf->SetFont('Arial','',11);
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(20 ,5,"",0,0,'C');
		$pdf->Cell(15 ,5,iconv('UTF-8', 'cp1252', "ksji"),0,0,'L'); //"Residence"
		$pdf->SetFont('courier','B',11);
		$finish = true;
		$phoneNo = str_split($phoneNo);
		for($i=0; $i<10; $i++){
			if($finish){
				foreach ($phoneNo as $char){
						$pdf->Cell(5 ,6,$char,1,0,'C');
					$i++;
				}
				$finish = false;
			}
			if($i<10 ){
				$pdf->Cell(5 ,6,"",1,0,'C');
				
			}		
		}
		$pdf->Ln();
		
		$pdf->SetFont('bindumathi','',11);
		$pdf->SetXY(15, 233);
		$pdf->Cell(5 ,5,"",0,0,'C');
		$pdf->Cell(10 ,5,"02'",0,0,'C');
		$pdf->Cell(150 ,5,iconv('UTF-8', 'cp1252', "2'1 úÿ,s wjYH;djh "),0,1); //"2.1 Purpose of electricity service connection:"
		$pdf->SetXY(10, 242);
		$pdf->Cell(20 ,8,"",0,0,'C');
		$pdf->SetFont('Arial','B',12);
		if($purposeType == 1){	$pdf->Cell(6 ,6,"X",1,0,'C');	} else {	$pdf->Cell(6 ,6,"",1,0,'C');	}
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(40 ,8,iconv('UTF-8', 'cp1252', "ksjdi"),0,0,'L');  //House
		$pdf->SetFont('Arial','B',12);
		if($purposeType == 4){	$pdf->Cell(6 ,6,"X",1,0,'C');	} else {	$pdf->Cell(6 ,6,"",1,0,'C');	}
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(25 ,8,iconv('UTF-8', 'cp1252', "fydg,a"),0,0,'L'); //Hotel
		$pdf->SetFont('Arial','B',12);
		if($purposeType == 7){	$pdf->Cell(6 ,6,"X",1,0,'C');	} else {	$pdf->Cell(6 ,6,"",1,0,'C');	}
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(50 ,8,iconv('UTF-8', 'cp1252', ",S$.,a fuda,la "),0,0,'L'); //Saw Mill/ Metal Crusher
		$pdf->SetFont('Arial','B',12);	
		if($purposeType == 10){	$pdf->Cell(6 ,6,"X",1,0,'C');	} else {	$pdf->Cell(6 ,6,"",1,0,'C');	}
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(30 ,8,iconv('UTF-8', 'cp1252', "fmdïmd.drh"),0,1,'L');	 //Pump House
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(20 ,8,"",0,0,'C');
		if($purposeType == 2){	$pdf->Cell(6 ,6,"X",1,0,'C');	} else {	$pdf->Cell(6 ,6,"",1,0,'C');	}
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(40 ,8,iconv('UTF-8', 'cp1252', ";Ügq ksjdi"),0,0,'L'); //Apartment
		$pdf->SetFont('Arial','B',12);
		if($purposeType == 5){	$pdf->Cell(6 ,6,"X",1,0,'C');	} else {	$pdf->Cell(6 ,6,"",1,0,'C');	}
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(25 ,8,iconv('UTF-8', 'cp1252', "fj<o ie,"),0,0,'L'); //Shops
		$pdf->SetFont('Arial','B',12);
		if($purposeType == 8){	$pdf->Cell(6 ,6,"X",1,0,'C');	} else {	$pdf->Cell(6 ,6,"",1,0,'C');	}
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(50 ,8,iconv('UTF-8', 'cp1252', "mEiaiqï jev fmd,l"),0,0,'L'); //Welding Work Shop
		$pdf->SetFont('Arial','B',12);	
		if($purposeType == 11){	$pdf->Cell(6 ,6,"X",1,0,'C');	} else {	$pdf->Cell(6 ,6,"",1,0,'C');	}
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(30 ,8,iconv('UTF-8', 'cp1252', "ld¾ñl"),0,1,'L');	 //Industrial
		$pdf->SetFont('Arial','B',12);
		
		$pdf->Cell(20 ,8,"",0,0,'C');
		if($purposeType == 3){	$pdf->Cell(6 ,6,"X",1,0,'C');	} else {	$pdf->Cell(6 ,6,"",1,0,'C');	}
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(40 ,8,iconv('UTF-8', 'cp1252', "hdno ksji"),0,0,'L'); //Adjoining
		$pdf->SetFont('Arial','B',12);
		if($purposeType == 6){	$pdf->Cell(6 ,6,"X",1,0,'C');	} else {	$pdf->Cell(6 ,6,"",1,0,'C');	}
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(25 ,8,iconv('UTF-8', 'cp1252', "ld¾hd,"),0,0,'L');//Office
		$pdf->SetFont('Arial','B',12);
		if($purposeType == 9){	$pdf->Cell(6 ,6,"X",1,0,'C');	} else {	$pdf->Cell(6 ,6,"",1,0,'C');	}
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(50 ,8,iconv('UTF-8', 'cp1252', "ù fuda,la\$ñßia fuda,l"),0,0,'L'); //Rice Mill/ Grinding Mill
		$pdf->SetFont('Arial','B',12);	
		if($purposeType == 12){	$pdf->Cell(6 ,6,"X",1,0,'C');	} else {	$pdf->Cell(6 ,6,"",1,0,'C');	}
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(30 ,8,iconv('UTF-8', 'cp1252', "wd.ñl"),0,1,'L');	//Religious
		$pdf->SetFont('Arial','B',12);	
		
		$pdf->Cell(20 ,8,"",0,0,'C');
		if($purposeType == 13){	$pdf->Cell(6 ,6,"X",1,0,'C');	} else {	$pdf->Cell(6 ,6,"",1,0,'C');	}
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(15 ,8,iconv('UTF-8', 'cp1252', "fjk;a"),0,0,'L');//Other
		
		$pdf->Cell(50 ,10,iconv('UTF-8', 'cp1252', "úia;r lrkak ''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''"),0,1,'L');
		
		
		// -------------------------------------------------------------------------------
		$pdf -> AddPage();
		//$pdf->SetFont('Arial','',11);
		//$pdf->SetXY(15, 315);
		$pdf->SetXY(15, 10);
		
		$pdf->Cell(10 ,6,"",0,0,'C');
		$pdf->Cell(150 ,6,iconv('UTF-8', 'cp1252', "2'2 fiajdj wjYH ia:dkfha ,smskh ^bx.%sis lemsg,a wl=frka&"),0,1); //2.2 Address of the premises where the service is required
		
		$pdf->SetXY(25, 16);
		
		
		
		
		//$pdf->Cell(25 ,7,"ok. ",1,1); //Header End
		
		$full_address = strtoupper($pemAddress1.' '.$pemAddress2.' '.$pemAddress3) ;
		$all_characters = str_split($full_address);

		$finish = true;

		$pdf->SetFont('courier','B',11);
		
		for($i=0; $i<75; $i++){
			if($finish){
				foreach ($all_characters as $char){
					if($i==24){
						$pdf->Cell(7 ,6,$char,1,1,'C');
						$pdf->SetXY(25, 23);
					}
					else if($i==49){
						$pdf->Cell(7 ,6,$char,1,1,'C');
						$pdf->SetXY(25, 30);
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
				$pdf->SetXY(25, 23);
			}
			else if($i==49){
				$pdf->Cell(7 ,6,"",1,1,'C');
				$pdf->SetXY(25, 30);
			}
			else{
				$pdf->Cell(7 ,6,"",1,0,'C');
			}
		}
		$pdf->SetFont('bindumathi','',10);
		//$pdf->SetFont('Arial','',9);
		$pdf->SetXY(15, 36);
		
		$pdf->Cell(15 ,5,"",0,0,'C');
		$pdf->Cell(150 ,5,iconv('UTF-8', 'cp1252', "^fuu ia:dkhg <.d úh yels ud¾. úia;rh rEm igykla u.ska msgq wxl 04 ys olajkak&"),0,1); //Please indicate how to access to the premises,
		//$pdf->SetFont('Arial','',11);
		$pdf->SetFont('bindumathi','',11);
		$pdf->SetXY(15, 42);
		$pdf->Cell(10 ,6,"",0,0,'C');
		$pdf->Cell(150 ,6,iconv('UTF-8', 'cp1252', "2'3 wi,ajeis ksjil úÿ,s whmf;a .sKqï wxlh("),0,1); //.3 The Electricity Account number neghibour
		
		$pdf->SetFont('courier','B',11);
		$pdf->SetXY(25, 48);
		$finish = true;
		$all_characters= "";
		$all_characters = str_split($nebAccount);
		for($i=0; $i<10; $i++){
			if($finish){
				foreach ($all_characters as $char){
					
						$pdf->Cell(7,6,$char,1,0,'C');
						
					
					$i++;
				}
				//$pdf->SetXY(40, 157);
				$finish = false;
			}
			if($i<10 ){
				$pdf->Cell(7 ,6,"",1,0,'C');
				
			}
			
					
		}
		$pdf->SetFont('bindumathi','',10);
		//$pdf->SetFont('Arial','',9);
		$pdf->SetXY(15, 54);
		
		$pdf->Cell(15 ,5,"",0,0,'C');
		$pdf->Cell(150 ,5,iconv('UTF-8', 'cp1252', "^fuu f;dr;=re iemhSu mdßfNda.sl ia:dkh yÿkd.ekSu ioyd myiq fõ&"),0,1); //(Providing this information facilitates the identification of the location
		//$pdf->SetFont('Arial','',11);
		$pdf->SetFont('bindumathi','',11);
		
		$pdf->SetXY(10, 62);
		$pdf->Cell(5 ,7,"",0,0,'C');
		$pdf->Cell(10 ,6,"03'",0,0,'C');
		$pdf->Cell(75 ,6,iconv('UTF-8', 'cp1252', "3'1 f.dvke.s,a, ;;eÿï lr we;s wdldrh ("),0,0); //3.1 Wiring installation of the building
		
		$pdf->SetFont('Arial','B',11);
		if($phaseType == 1){	$pdf->Cell(7 ,6,"X",1,0,'C');	$pdf->SetFont('bindumathi','',11);
																 $pdf->Cell(20 ,7,iconv('UTF-8', 'cp1252', "tl,d"),0,0);	$pdf->Cell(15 ,6,"",0,0,'C'); //Single Phase
								$pdf->Cell(7 ,6,"",1,0,'C');		$pdf->Cell(17,7,iconv('UTF-8', 'cp1252', "f;l,d"),0,0);	 //Three Phase
							} 
		 //Header End
		 //Header End
		else if($phaseType == 2){	$pdf->Cell(7 ,6,"",1,0,'C');
								$pdf->SetFont('bindumathi','',11); $pdf->Cell(20 ,7,iconv('UTF-8', 'cp1252', "tl,d"),0,0);		$pdf->Cell(10 ,6,"",0,0,'C'); //Single Phase
			$pdf->SetFont('Arial','B',11);						$pdf->Cell(7 ,6,"X",1,0,'C'); 
			$pdf->SetFont('bindumathi','',11);				$pdf->Cell(20 ,7,iconv('UTF-8', 'cp1252', "f;l,d"),0,0);	//Three Phase
								}
								
		else{	
			$pdf->SetFont('bindumathi','',11);
			$pdf->Cell(7 ,6,"",1,0,'C'); $pdf->Cell(20 ,7,iconv('UTF-8', 'cp1252', "tl,d"),0,0);		$pdf->Cell(10 ,6,"",0,0,'C');//Single Phase
									$pdf->Cell(7 ,6,"",1,0,'C');$pdf->Cell(20 ,7,iconv('UTF-8', 'cp1252', "f;l,d"),0,0);	}//Three Phase
		
		 //Header End
		//$pdf->Cell(100 ,8,"3.1 Wiring installation of the building :",0,0); //Header End
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(12 ,6,"",0,0); //Header End
		if($ampType == 1){	$pdf->Cell(10,6,"30A",1,0,'C');	} 
		else if($ampType == 2) {	$pdf->Cell(10,6,"60A",1,1,'C');	} 
		else {	$pdf->Cell(10,6,"30A",1,0,'C');		$pdf->Cell(10,6,"60A",1,1,'C');}
		//$pdf->Cell(20 ,7,"Three Phase",0,0); //Header End
		
		$pdf->SetXY(10, 71);
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(15 ,6,"",0,0,'C');
		//$pdf->Cell(10 ,7,"03.",0,0,'C');
		$pdf->Cell(15 ,6,"3'2",0,0); //Header End
		//$pdf->SetFont('Arial','B',11);
		$pdf->Cell(20 ,6,iconv('UTF-8', 'cp1252', "wxl"),1,0,'C'); //"No"
		
		$pdf->SetXY(60,71);
		$pdf->Cell(100 ,6,iconv('UTF-8', 'cp1252', "úÿ,sh msysgqùu ms<sno úia;r"),1,0,'L'); //"Details of Installation"
		$pdf->SetXY(100,71);
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(60 ,6,"/Details of installation",0,0,'C'); //"Details of Installation"
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(30 ,6,iconv('UTF-8', 'cp1252', ".Kk"),1,1,'C'); //"Number"
		
		//$pdf->SetFont('Arial','',11);
		$pdf->Cell(30 ,6,"",0,0,'C');
		$pdf->Cell(20 ,6,"01",1,0,'C');
		$pdf->Cell(100 ,6,iconv('UTF-8', 'cp1252', "úÿ,s nqnq¿ "),1,0,'L');//"Lamp Points"
		$pdf->SetXY(80,77);
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(80 ,6,"(Lamp points)",0,0,'L'); //"Details of Installation"
		$pdf->SetFont('bindumathi','',11);
		if($lamp){	$pdf->Cell(30 ,6,$lamp,1,1,'C');	} else {	$pdf->Cell(30 ,6,"",1,1,'C');	}
		
		$pdf->Cell(30 ,6,"",0,0,'C');
		$pdf->Cell(20 ,6,"02",1,0,'C');
		$pdf->Cell(100 ,6,iconv('UTF-8', 'cp1252', "úÿ,s mxld "),1,0,'L'); //"Fans"
		$pdf->SetXY(80,83);
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(80 ,6,"(Fans)",0,0,'L'); //"Details of Installation"
		$pdf->SetFont('bindumathi','',11);
		if($fans){	$pdf->Cell(30 ,6,$fans,1,1,'C');	} else {	$pdf->Cell(30 ,6,"",1,1,'C');	}
		
		$pdf->Cell(30 ,6,"",0,0,'C');
		$pdf->Cell(20 ,6,"03",1,0,'C');
		$pdf->Cell(100 ,6,iconv('UTF-8', 'cp1252', "úÿ,s fljqka msguka weï(5"),1,0,'L'); //"Socket Outlets - 5 Amp"
		$pdf->SetXY(88,89);
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(72 ,6,"(Socket outlets-5Amp)",0,0,'C'); //"Details of Installation"
		$pdf->SetFont('bindumathi','',11);
		if($socket5){	$pdf->Cell(30 ,6,$socket5,1,1,'C');	} else {	$pdf->Cell(30 ,6,"",1,1,'C');	}
		
		$pdf->Cell(30 ,6,"",0,0,'C');
		$pdf->Cell(20 ,6,"04",1,0,'C');
		$pdf->Cell(100 ,6,iconv('UTF-8', 'cp1252', "úÿ,s fljqka msguka weï( 15"),1,0,'L'); //"Socket Outlets - 15 Amp"
		$pdf->SetXY(95,95);
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(65 ,6,"(Socket outlets-15Amp)",0,0,'C'); //"Details of Installation"
		$pdf->SetFont('bindumathi','',11);
		if($socket15){	$pdf->Cell(30 ,6,$socket15,1,1,'C');	} else {	$pdf->Cell(30 ,6,"",1,1,'C');	}
		
		
		$pdf->SetXY(40, 101);
		//$pdf->Cell(30 ,24,"",0,0,'C');
		$pdf->Cell(20 ,24,"",1,0,'C');
		$pdf->Cell(100 ,24,"",1,0,'L');
		$pdf->Cell(30 ,24,"",1,1,'C');
		
		$pdf->SetXY(40, 101);
		$pdf->Cell(20 ,6,"05",0,0,'C');
		$pdf->Cell(100 ,6,iconv('UTF-8', 'cp1252', "nujk Odß;djh"),0,0,'L'); //"Motor Capacity"
		$pdf->SetXY(70,101);
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(85 ,6,"(Motor Capacity)",0,0,'C'); //"Details of Installation"
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(30 ,6,"",0,1,'C');
		
		//$pdf->SetXY(40, 100);
		$pdf->Cell(50 ,6,"",0,0,'C');
		if($motor1Capacity){	
			$pdf->Cell(100 ,6,iconv('UTF-8', 'cp1252', "wxl 1 nujkh"),0,0,'L'); //"Motor Capacity"
			$pdf->SetXY(100,107);
			$pdf->SetFont('Arial','B',11);
			$pdf->Cell(60 ,6,$motor1Capacity."              HP/kW",0,0,'L'); //"Details of Installation"
			$pdf->SetFont('bindumathi','',11);
		
		//$pdf->Cell(100 ,6,"    1. Motor    ".$motor1Capacity."    HP/kW",0,0,'L');	
		}  //1. Motor
		
		
		else {	
		
		$pdf->Cell(100 ,6,iconv('UTF-8', 'cp1252', "wxl 1 nujkh"),0,0,'L'); //"Motor Capacity"
		$pdf->SetXY(70,107);
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(85 ,6,"........................ HP/kW",0,0,'C'); //"Details of Installation"
		$pdf->SetFont('bindumathi','',11);
		
		
		
		//$pdf->Cell(100 ,6,"    1. Motor ........................ HP/kW",0,0,'L');	
		}
		
		$pdf->Cell(30 ,6,$motor1No,0,1,'C');
		
		$pdf->Cell(50 ,6,"",0,0,'C');
		if($motor2Capacity){	
		$pdf->Cell(100 ,6,iconv('UTF-8', 'cp1252', "wxl 2 nujkh"),0,0,'L'); //"Motor Capacity"
			$pdf->SetXY(100,113);
			$pdf->SetFont('Arial','B',11);
			$pdf->Cell(60 ,6,$motor2Capacity."              HP/kW",0,0,'L'); //"Details of Installation"
			$pdf->SetFont('bindumathi','',11);
		
		//$pdf->Cell(100 ,6,"    2. Motor    ".$motor2Capacity."    HP/kW",0,0,'L');	
		
		} //2. Motor 
		else {	
			$pdf->Cell(100 ,6,iconv('UTF-8', 'cp1252', "wxl 2 nujkh"),0,0,'L'); //"Motor Capacity"
			$pdf->SetXY(70,113);
			$pdf->SetFont('Arial','',11);
			$pdf->Cell(85 ,6,"........................ HP/kW",0,0,'C'); //"Details of Installation"
			$pdf->SetFont('bindumathi','',11);	
		} 
		$pdf->Cell(30 ,6,$motor2No,0,1,'C');
		
		$pdf->Cell(50 ,6,"",0,0,'C');
		if($motor3Capacity){	
			$pdf->Cell(100 ,6,iconv('UTF-8', 'cp1252', "wxl 3 nujkh"),0,0,'L'); //"Motor Capacity"
			$pdf->SetXY(100,119);
			$pdf->SetFont('Arial','B',11);
			$pdf->Cell(60 ,6,$motor3Capacity."              HP/kW",0,0,'L'); //"Details of Installation"
			$pdf->SetFont('bindumathi','',11);	
			//$pdf->Cell(100 ,6,"    2. Motor    ".$motor3Capacity."    HP/kW",0,0,'L');	
		} //3. Motor
		else {	
			$pdf->Cell(100 ,6,iconv('UTF-8', 'cp1252', "wxl 3 nujkh"),0,0,'L'); //"Motor Capacity"
			$pdf->SetXY(70,119);
			$pdf->SetFont('Arial','',11);
			$pdf->Cell(85 ,6,"........................ HP/kW",0,0,'C'); //"Details of Installation"
			$pdf->SetFont('bindumathi','',11);		
		} 
		$pdf->Cell(30 ,6,$motor3No,0,1,'C');
		
		
		$pdf->Cell(30 ,6,"",0,0,'C');
		$pdf->Cell(20 ,6,"06",1,0,'C');
		if($weldingCapacity){	
			$pdf->Cell(100 ,6,iconv('UTF-8', 'cp1252', "úÿ,s mEiaiqï hka;%"),1,0,'L'); //"Motor Capacity"
			$pdf->SetXY(95,125);
			$pdf->SetFont('Arial','B',11);
			$pdf->Cell(65 ,6,"Welding Plant-Capacity ".$weldingCapacity."  (kWA)",0,0,'C'); //"Details of Installation"
			$pdf->SetFont('bindumathi','',11);	
		
		//$pdf->Cell(100 ,6,"Electric Welding Plant - Capacity    ".$weldingCapacity."    (kWh)",1,0,'L');	
		}  //"Electric Welding Plant - Capacity
		else {	
			$pdf->Cell(100 ,6,iconv('UTF-8', 'cp1252', "úÿ,s mEiaiqï hka;%"),1,0,'L'); //"Motor Capacity"
			$pdf->SetXY(95,125);
			$pdf->SetFont('Arial','',11);
			$pdf->Cell(65 ,6,"Welding Plant-Capacity ............ (kWA)",0,0,'C'); //"Details of Installation"
			$pdf->SetFont('bindumathi','',11);	
		
		//$pdf->Cell(100 ,6,"Electric Welding Plant - Capacity  ................... ",1,0,'L');	
		
		
		}  //Electric Welding Plant - Capacity
		$pdf->Cell(30 ,6,$weldingNo,1,1,'C');
		
		$pdf->Cell(30 ,6,"",0,0,'C');
		$pdf->Cell(20 ,6,"07",1,0,'C');
		if($airCapacity){	
			$pdf->Cell(100 ,6,iconv('UTF-8', 'cp1252', "jdhq iólrK hka;%"),1,0,'L'); //"Motor Capacity"
			$pdf->SetXY(100,131);
			$pdf->SetFont('Arial','B',11);
			$pdf->Cell(60 ,6,$airCapacity."    (BTU)",0,0,'C'); //"Details of Installation"
			$pdf->SetFont('bindumathi','',11);	
		
		//$pdf->Cell(100 ,6,"Air Conditioning    ".$airCapacity."    (BTU)",1,0,'L');	
		} //"Air Conditioning
		else {	
		
			$pdf->Cell(100 ,6,iconv('UTF-8', 'cp1252', "jdhq iólrK hka;%"),1,0,'L'); //"Motor Capacity"
			$pdf->SetXY(100,131);
			$pdf->SetFont('Arial','',11);
			$pdf->Cell(60 ,6,"....................... (BTU)",0,0,'L'); //"Details of Installation"
			$pdf->SetFont('bindumathi','',11);	
		
			}  //Air Conditioning
		$pdf->Cell(30 ,6,$airNo,1,1,'C');
		
		$pdf->Cell(30 ,6,"",0,0,'C');
		$pdf->Cell(20 ,6,"08",1,0,'C');
		if($pumpCapacity){	
		
			$pdf->Cell(100 ,6,iconv('UTF-8', 'cp1252', "c, fmdïm"),1,0,'L'); //"Motor Capacity"
			$pdf->SetXY(100,137);
			$pdf->SetFont('Arial','B',11);
			$pdf->Cell(60 ,6,$pumpCapacity."   HP/kW",0,0,'C'); //"Details of Installation"
			$pdf->SetFont('bindumathi','',11);
		
		//$pdf->Cell(100 ,6,"Air Conditioning    ".$pumpCapacity."    (BTU)",1,0,'L');	
		} //Water Pump
		else {	
			$pdf->Cell(100 ,6,iconv('UTF-8', 'cp1252', "c, fmdïm"),1,0,'L'); //"Motor Capacity"
			$pdf->SetXY(100,137);
			$pdf->SetFont('Arial','',11);
			$pdf->Cell(60 ,6,"....................... HP/kW",0,0,'L'); //"Details of Installation"
			$pdf->SetFont('bindumathi','',11);
		
		
		//$pdf->Cell(100 ,6,"Water Pump  .......................... HP/kW",1,0,'L');	
		} //Water Pump
		$pdf->Cell(30 ,6,$pumpNo,1,1,'C');
		
		$pdf->Cell(30 ,12,"",0,0,'C');
		$pdf->Cell(20 ,12,"09",1,0,'C');
		$pdf->Cell(130 ,6,iconv('UTF-8', 'cp1252', "fjk;a WmlrK^ioyka lrkak&"),0,1,'L');//Other apparatus 
		//$pdf->Cell(100 ,6,"Other apparatus (specify)",1,0,'L');
		//$pdf->Cell(30 ,12,"",1,1,'C');
		
		$pdf->Cell(50 ,12,"",0,0,'C');
		//pdf->Cell(20 ,12,"09",1,0,'C');
		$pdf->Cell(100 ,6,$other,1,0,'L');
		//$pdf->Cell(100 ,6,"Other apparatus (specify)",1,0,'L');
		$pdf->Cell(30 ,6,$otherNo,1,1,'C');
		
		
		$pdf->SetXY(10, 158);
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(5 ,6,"",0,0,'C');
		$pdf->Cell(10 ,6,"04.",0,0,'C');
		$pdf->Cell(70 ,6,iconv('UTF-8', 'cp1252', "4'1 úÿ,sh b,a,qï lrk ia:dkhg fuhg fmr úÿ,sh ,ndf.k ;snqKso@ Tõ\$ke;"),0,1); //"4.1 Has electricity been supplied previously to this premises :" 
		$pdf->Cell(27 ,5,"",0,0,'C');
		
		$pdf->Cell(75 ,5,iconv('UTF-8', 'cp1252', "tfia úÿ,sh ,nd ;snqfKa kï .sKqï wxlh"),0,0); //Header End //f so, the Account No
		$pdf->SetFont('courier','B',11);
		//$pdf->SetXY(25, 80);
		$all_characters= "";
		$finish = true;
		$all_characters = str_split($prvAccount);
		for($i=0; $i<10; $i++){
			if($finish){
				foreach ($all_characters as $char){
					
						$pdf->Cell(7,6,$char,1,0,'C');
						
					
					$i++;
				}
				//$pdf->SetXY(40, 157);
				$finish = false;
			}
			if($i<10 ){
				$pdf->Cell(7 ,6,"",1,0,'C');
				
			}
			
					
		}
		
		$pdf->Cell(10 ,7,"",0,1,'C');
		//////////////////////
		$pdf->SetXY(10, 173);
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(15 ,6,"",0,0,'C');
		//$pdf->Cell(10 ,6,"04.",0,0,'C');
		$pdf->Cell(70 ,6,iconv('UTF-8', 'cp1252', "4'2 b,a,qïlref.a kñka fjk;a ia:dk ioyd úÿ,sh ,ndf.k ;sfío @"),0,1); //4.2 Has electricity been supplied previously to this premises 
		$pdf->Cell(27 ,5,"",0,0,'C');
		
		$pdf->Cell(65 ,5,iconv('UTF-8', 'cp1252', "4'2 tfia kï tu .sKqï wxlh"),0,0); //"If so, the Account No.
		$pdf->SetFont('courier','B',11);
		//$pdf->SetXY(25, 80);
		$all_characters= "";
		$finish = true;
		$all_characters = str_split($ownAccount1);
		
		$pdf->Cell(10 ,6,"(i) ",0,0,'C');
		for($i=0; $i<10; $i++){
			if($finish){
				foreach ($all_characters as $char){
					
						$pdf->Cell(7,6,$char,1,0,'C');
						
					
					$i++;
				}
				//$pdf->SetXY(40, 157);
				$finish = false;
			}
			if($i<10 ){
				$pdf->Cell(7 ,6,"",1,0,'C');
				
			}
		}
		
		$pdf->Cell(10 ,7,"",0,1,'C');
		$all_characters= "";
		$finish = true;
		$all_characters = str_split($ownAccount2);
		
		$pdf->Cell(92 ,7,"",0,0,'C');
		$pdf->Cell(10 ,7,"(ii) ",0,0,'C');
		for($i=0; $i<10; $i++){
			if($finish){
				foreach ($all_characters as $char){
					
						$pdf->Cell(7,6,$char,1,0,'C');
						
					
					$i++;
				}
				//$pdf->SetXY(40, 157);
				$finish = false;
			}
			if($i<10 ){
				$pdf->Cell(7 ,6,"",1,0,'C');
				
			}
		}
		$pdf->Cell(10 ,7,"",0,1,'C');
		$pdf->SetXY(10, 195);
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(15 ,6,"",0,0,'C');
		$pdf->MultiCell(170 ,4,iconv('UTF-8', 'cp1252', "4'3 idudkHfhka úÿ,s /yeka wÈkqfha wod, ia:dkhg we;s m%fõY ud¾.h Tiafiah'tfia iaÓr m%fõY ud¾.hla fkdue;s wjia:djl muKla wkai;= foam,lg by,ska úÿ,s /yeka weoSug we;akï tu foam, whs;slrejkaf.a kdu f,aLKh yd Tjqkaf.a leue;a;\$wlue;a; ^ukdmh m%ldY lsÍug msgq wxl 5 ys ioyka fmdaruh Ndú;d lrkak&"),0,'J'); //4.3  In case of electricity lines are to be drawn over the property of other owners, please state 

		//$pdf->Cell(23 ,6,"",0,0,'C');
		//$pdf->Cell(70 ,6,"their list of names and their consent or objection.",0,1); //their list of names and their consent or objection
		//$pdf->SetFont('Arial','',9);
		//$pdf->Cell(23 ,5,"",0,0,'C');
		
		//$pdf->Cell(70 ,5,"(Use the form in page 5, to express their consent)",0,1,'L');  //Use the form in page 5, to express their consen
		
		//$pdf->SetFont('Arial','',11);
		$pdf->Cell(23 ,7,"",0,0,'C');
		$pdf->Cell(120 ,7,iconv('UTF-8', 'cp1252', "ku yd ,smskh"),0,0); //name address
		$pdf->Cell(90 ,7,iconv('UTF-8', 'cp1252', "ukdmh fyda úreoaO nj"),0,1);
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(23 ,7,"",0,0,'C');
		$pdf->Cell(120 ,7,"1. .................................................................................................",0,0); //Header End
		$pdf->Cell(90 ,7,".....................................",0,1);
		
		$pdf->Cell(23 ,7,"",0,0,'C');
		$pdf->Cell(120 ,7,"2. .................................................................................................",0,0); //Header End
		$pdf->Cell(90 ,7,".....................................",0,1);
		
		$pdf->Cell(23 ,7,"",0,0,'C');
		$pdf->Cell(120 ,7,"3. .................................................................................................",0,0); //Header End
		$pdf->Cell(90 ,7,".....................................",0,1);


		
		$pdf->SetXY(10, 243);
		$pdf->SetFont('bindumathi','',11);
		//$pdf->SetXY(15, 63);
		//$pdf->SetFont('Arial','',10);
		$pdf->Cell(10 ,5,"",0,0,'C');
		$pdf->MultiCell(170 ,4,iconv('UTF-8', 'cp1252', "by; ud úiska bÈßm;a lr we;s lreKq i;H nj m%ldY lrk w;r hï fyhlska fjk;a wfhl=f.a bvï \$ksjdi \$foam, yryd wÈk ,o /yeka ud¾.hla fjkia lsÍug isÿjqjfyd;a tA ioyd jehjk iïmQ¾K uqo, f.ùugo fuhska fmdfrdkaÿ fjñ' by; ia:dkhg úÿ,sh ,nd.ekSu ioyd weia;fïka;=jla ,nd fok f,i fuhska b,a,qï lrñ';jo wkqu; Odß;dj blaujd hdug fya;=úh  yels fjk;a wNHka;r úÿ,s ;;eÿï isÿ fkdlrk njgo fuhska fmdfrdkaÿ fjñ'"),0,'J');//I certify that
		//$pdf->Cell(10 ,5,"",0,0,'C');
		//$pdf->Cell(170 ,5,"lands/houses/property of others, I hereby promise to pay the entire cost incurred due to shifting the electricity line ",0,1,'L'); //Header End
		//$pdf->Cell(10 ,5,"",0,0,'C');
		//$pdf->Cell(170 ,5,"on their request. I request to provide me an estimate to obtain electricity service connection to the premises",0,1,'L'); //Header End
		//$pdf->Cell(10 ,5,"",0,0,'C');
		//$pdf->Cell(170 ,5,"mentioned above. I hereby promise not to install any other electrical loads which exceed the declared capacity.",0,1,'L'); //Header End
		$pdf->Ln();
		 $pdf->Cell(15, 4, "" , 0,1,'C');
		
		$pdf->SetXY(15, 270);
		
		$pdf->SetFont('Arial','',9);
		 $pdf->Cell(15, 2, "" , 0,0,'C');
		$pdf->Cell(60, 2, "..........................." , 0,0);
		$pdf->Cell(50, 2, "" , 0,0,'C');
		$pdf->Cell(60, 2, "................................................." , 0,1);
		$pdf->SetFont('bindumathi','',11);

		$pdf->Cell(22, 4, "" , 0,0,'C');
		$pdf->Cell(60, 4, iconv('UTF-8', 'cp1252', 'Èkh ') , 0,0); //Dat
		$pdf->Cell(53, 4, "" , 0,0,'C');
		$pdf->Cell(60, 4, iconv('UTF-8', 'cp1252', 'whÿïlref.a w;aik') , 0,1);//  Subject Clert
		
		
			
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


