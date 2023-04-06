<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TempConnectionModel extends CI_Model {

	

	public function __construct()
	{
		parent::__construct();
		
		require(APPPATH .'third_party/fpdf/fpdf.php');		
	}
	
	public function print_application($NIC,$comAddress,$customerName,$pemAddress,$reason,$center,$account,$period,$poleDistance,$centerDistance)
	{
		$pdf = new FPDF();
		$pdf -> AddPage('P','A4');
		$pdf -> setDisplayMode ('fullpage');	
		
		$pdf->AddFont('bindumathi','','FM_BINDU.php');	
		
		$pdf->SetFont('bindumathi','',14);

		$pdf->Cell(35, 7, "", 0,0,'C');
		$pdf->Cell(120, 7, iconv('UTF-8', 'cp1252', ',xld úÿ,sn, uKav,h')  , 0,0,'C');// header
		$pdf->Cell(30, 7, "", 0,1);
		
		$pdf->SetFont('bindumathi','',10);
		$pdf->SetXY(10,20);
		
		$pdf->Cell(5, 5, "" , 0,0,'C');
		$pdf->MultiCell(75, 5, iconv('UTF-8', 'cp1252', "fuu whÿïm; iïmQ¾K lr .súiqïm; iu. ;djld,sl úÿ,s fiajdj wjYH Èkg wju jYfhka Èk 03 lg m%:u úÿ,s mdßfnda.sl fiajd uOHia:dkhg NdrÈh hq;=h") , 0 ,'J');//account 
		
		$pdf->SetXY(120,20);
		

		$pdf->Cell(80, 5, iconv('UTF-8', 'cp1252', "ld¾hd,Sh m%fhdackh ioyd") , 1,1 ,'C');
		$pdf->Cell(110, 5, "", 0,0 ,'C');
		$pdf->Cell(40, 5, iconv('UTF-8', 'cp1252', "whÿïm;a wxlh") , 1,0 ,'L');
		$pdf->Cell(40, 5, "" , 1,1 ,'C');
		$pdf->Cell(110, 5, "", 0,0 ,'C');
		$pdf->Cell(40, 5, iconv('UTF-8', 'cp1252', "f.ùï jjqpr wxlh") , 1,0 ,'L');
		$pdf->Cell(40, 5, "" , 1,1 ,'C');
		$pdf->Cell(110, 5, "", 0,0 ,'C');
		$pdf->Cell(40, 5, iconv('UTF-8', 'cp1252', "ld¾h wxlh") , 1,0 ,'L');
		$pdf->Cell(40, 5, "" , 1,1 ,'C');
		
		
		$pdf->Cell(30, 4, "", 0,1);
		$pdf->SetFont('bindumathi','',12);
		
		$pdf->Cell(35, 5, "", 0,0,'C');
		$pdf->Cell(120, 5, iconv('UTF-8', 'cp1252', ';djld,sl úÿ,s fiajdjla ioyd b,a,qï m;%h')  , 0,0,'C');// header
		$pdf->Cell(30, 5, "", 0,1);
		
		$pdf->SetFont('Arial','',11);
		 $pdf->Cell(120, 1, "________________________________________________________________________________________" , 0,1); //headder Line
				
		
		 $pdf->Cell(15, 5, "" , 0,1,'C');
		 
		 
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(5, 5, "" , 0,0,'C');
		$pdf->Cell(90, 5, iconv('UTF-8', 'cp1252', "01'  b,a,qïlref.a ku ") , 0,0);//Name
		
		$pdf->SetFont('courier','B',11);
		if($customerName)
			$pdf->Cell(120, 5, strtoupper($customerName)  , 0,1);
		
		else{
			$pdf->SetFont('Arial','',9);
			$pdf->Cell(120, 5, "................................................................................................" , 0,1);}
		
		$pdf->Cell(20, 4, "" , 0,1);
		
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(5, 5, "" , 0,0,'C');
		$pdf->Cell(90, 5, iconv('UTF-8', 'cp1252', "02'  ,smskh") , 0,0);//address
		$pdf->SetFont('courier','B',11);
		if($comAddress)
			$pdf->MultiCell(90, 5, strtoupper($comAddress)  , 0,'L');
		
		else{
			$pdf->SetFont('Arial','',9);
			$pdf->Cell(120, 5, "................................................................................................" , 0,1);
			$pdf->Cell(95, 5, "" , 0,0);
			$pdf->Cell(120, 5, "................................................................................................" , 0,1);}
		
		$pdf->Cell(20, 4, "" , 0,1);
		
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(5, 5, "" , 0,0,'C');
		$pdf->Cell(90, 5, iconv('UTF-8', 'cp1252', "03'  cd;sl yeÿkqïm;a wxlh") , 0,0);//nic 
		$pdf->SetFont('courier','B',11);
		$finish = true;
		$nic = str_split($NIC);
		for($i=0; $i<12; $i++){
			if($finish){
				foreach ($nic as $char){	
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
		$pdf->Cell(20, 4, "" , 0,1);
		
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(5, 5, "" , 0,0,'C');
		$pdf->Cell(90, 5, iconv('UTF-8', 'cp1252', "04'  ;djld,sl úÿ,s fiajdj wjYH ia:dkfha ,smskh") , 0,'L');//temp location address
		
		$pdf->SetFont('courier','B',11);
		if($pemAddress)
			$pdf->MultiCell(90, 5, strtoupper($pemAddress)  , 0,'L');
		
		else{
			$pdf->SetFont('Arial','',9);
			$pdf->Cell(120, 5, "................................................................................................" , 0,1);
			$pdf->Cell(95, 5, "" , 0,0);
			$pdf->Cell(120, 5, "................................................................................................" , 0,1);}
		
		$pdf->Cell(20, 4, "" , 0,1);
		
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(5, 5, "" , 0,0,'C');
		$pdf->Cell(90, 5, iconv('UTF-8', 'cp1252', "05'  wdikaku mdßfNd.sl fiajd uOHia:dkh") , 0,0);//nearest Branch
		
		
		if($center){
			$pdf->SetFont('bindumathi','',11);
			$pdf->Cell(120, 5,iconv('UTF-8', 'cp1252', $center) , 0,1);
		}
		else{
			$pdf->SetFont('Arial','',9);
			$pdf->Cell(120, 5, "................................................................................................" , 0,1);}
		
		$pdf->Cell(20, 4, "" , 0,1);
		
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(5, 5, "" , 0,0,'C');
		$pdf->Cell(90, 5, iconv('UTF-8', 'cp1252', "06'  ;djld,sl úÿ,sh wjYH ld, iSudj") , 0,0);//time Period
		
		$pdf->SetFont('courier','B',11);
		if($period)
			$pdf->Cell(120, 5, $period  , 0,1);
		
		else{
			$pdf->SetFont('Arial','',9);
			$pdf->Cell(120, 5, "................................................................................................" , 0,1);}
		
		$pdf->Cell(20, 4, "" , 0,1);
		
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(5, 5, "" , 0,0,'C');
		$pdf->Cell(90, 5, iconv('UTF-8', 'cp1252', "07'  iaÓr úÿ,s iemhqula we;akï tys .sKqï wxlh") , 0,0);// permenet acccount no
		
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
		
		//$pdf->Cell(20, 2, "" , 0,1);
		
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(5, 5, "" , 0,0,'C');
		$pdf->Cell(90, 5, iconv('UTF-8', 'cp1252', "08'  ;djld,sl úÿ,sh ,nd .ekSï wjYH;djh") , 0,0);// reason
		
		$pdf->SetFont('bindumathi','',11);
		if($reason)
			$pdf->Cell(120, 5, iconv('UTF-8','cp1252',  $reason)  , 0,1);
		
		else{
			$pdf->SetFont('Arial','',9);
			$pdf->Cell(120, 5, "................................................................................................" , 0,1);}
		
		$pdf->Cell(20, 4, "" , 0,1);
		
		
		//$pdf->Cell(20, 2, "" , 0,1);
		
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(5, 5, "" , 0,0,'C');
		$pdf->MultiCell(75, 5, iconv('UTF-8', 'cp1252', "09'  wdikaku úÿ,sh fnodyeÍï lKqfú isg       úÿ,sh wjYH ia:dkhg ÿr ") , 0,'L');// length from the pole
		
		$pdf->SetXY(105,140);
		
		$pdf->SetFont('bindumathi','',11);
		if($poleDistance){
			//$pdf->Cell(120, 5, $poleDistance  , 0,1);
			$pdf->Cell(15, 5, iconv('UTF-8', 'cp1252', "óg¾ ") , 0,0);
			$pdf->SetFont('courier','B',11);
			$pdf->Cell(120, 5, $poleDistance  , 0,1);
		}
		else{
			$pdf->SetFont('bindumathi','',11);
			$pdf->Cell(90, 5, iconv('UTF-8', 'cp1252', "óg¾  ''''''''''''''''''''''''''''''''''''") , 0,1);
			}
		
		$pdf->Cell(20, 5, "" , 0,1);
		
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(5, 5, "" , 0,0,'C');
		$pdf->MultiCell(75, 5, iconv('UTF-8', 'cp1252', "10'  úÿ,sh wjYH ia:dkhg mdßfNd.sl fiajd      uOHia:dkfha isg ÿr") , 0,'L');// length from the branch
		
		$pdf->SetXY(105,152);
		$pdf->SetFont('bindumathi','',11);
		if($centerDistance){
			$pdf->Cell(25, 5, iconv('UTF-8', 'cp1252',  "lsf,da óg¾  ") , 0,0);
			$pdf->SetFont('courier','B',11);
			$pdf->Cell(20, 5, $centerDistance  , 0,1);
		}
		else{
			$pdf->SetFont('bindumathi','',11);
			$pdf->Cell(90, 5, iconv('UTF-8', 'cp1252', "lsf,da óg¾  ''''''''''''''''''''''''''''''''''''") , 0,1);}
		
		$pdf->Cell(20, 5, "" , 0,1);
		
		
		$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(5, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', "11'  úÿ,sh ia:dmkh ms<sn`o úia;r") , 0,0);//upakarana
		
		$pdf->Cell(30, 5, "" , 0,0,'C');
		$pdf->Cell(40, 5, iconv('UTF-8', 'cp1252', "úÿ,s myka ixLHdj") , 0,0);//lights
		$pdf->Cell(20, 5, "" , 1,1);
		$pdf->Cell(10, 1, "" , 0,1);
		$pdf->Cell(95, 5, "" , 0,0,'C');
		$pdf->Cell(40, 5, iconv('UTF-8', 'cp1252', "fjk;a WmlrK") , 0,0);//other
		$pdf->Cell(20, 5, "" , 1,1);
		$pdf->Cell(10, 1, "" , 0,1);
		$pdf->Cell(95, 5, "" , 0,0,'C');
		$pdf->Cell(40, 5, iconv('UTF-8', 'cp1252', "uq¿ fjdÜ m%udKh") , 0,0);//total watts
		$pdf->Cell(20, 5, "" , 1,1);
		
		
		
		$pdf->Cell(20, 10, "" , 0,1);
		
		$pdf->Cell(5, 5, "" , 0,0,'C');
		$pdf->MultiCell(180, 5, iconv('UTF-8', 'cp1252', 'by; ioyka lr we;s úia;r ish,a, ksjerÈ nj;a" ;djld,sl úÿ,s ia:dkhg wod< ;;eoSï lghq;= ish,a, wdrlaIl fr.=,dis m%ldrj bgqlr m%Odk jyrejo iú lr we;s nj;a" fiajdj bÈlsÍug fhdað; bvï ysñhkaf.a fuu lreK ms<snoj lsisu úfrdaO;djla fkdue;s nj;a iy;sl lr isáñ\''), 0,'J');
		
		$pdf->Cell(20, 8, "" , 0,1);
		
		$pdf->SetFont('Arial','',9);
		 $pdf->Cell(15, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, "..........................." , 0,0);
		$pdf->Cell(50, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, "................................................." , 0,1);
		$pdf->SetFont('bindumathi','',11);

		$pdf->Cell(22, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', 'Èkh ') , 0,0); //Dat
		$pdf->Cell(45, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', 'b,a,qïlref.a w;aik') , 0,1);//  requeser signature
		
		$pdf->Cell(20, 5, "" , 0,1);
		
		//$pdf->SetFont('bindumathi','',11);
		$pdf->Cell(5, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', "wemlre m%ldYh") , 0,1);//apakaru prakashaya
		
		$pdf->Cell(20, 3, "" , 0,1);
		
		$pdf->Cell(5, 5, "" , 0,0,'C');
		$pdf->MultiCell(180, 5, iconv('UTF-8', 'cp1252', "by; ,smskfhys ioyka ia:dkfha ;djld,sl úÿ,s iemhqu wkqj hïlsis w,dN fyda ys`. uqo,la f.ùug isÿjqjfyd;a tlS uqo, f.ùug fmdfrdkaÿ fjñ' ud kñka we;s úÿ,s ì,amf;a .sKqï wxlh '''''''''''''''''''''''''''''' ^ì,am;la weñKsh hq;=h&"), 0,'J');
		
		$pdf->Cell(20, 8, "" , 0,1);
		
		$pdf->SetFont('Arial','',9);
		 $pdf->Cell(15, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, "..........................." , 0,0);
		$pdf->Cell(50, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, "................................................." , 0,1);
		$pdf->SetFont('bindumathi','',11);

		$pdf->Cell(22, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', 'Èkh ') , 0,0); //Dat
		$pdf->Cell(45, 5, "" , 0,0,'C');
		$pdf->Cell(60, 5, iconv('UTF-8', 'cp1252', 'mdßfNda.slhdf.a w;aik') , 0,1);//  requeser signature
		 
		/////////////////////////////////////////////// 
		
		
		$pdf->SetXY(5,300);
		
		$pdf->Cell(180, 5, iconv('UTF-8', 'cp1252', "weuqKqu") , 0,0,'R');
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(10, 5,"II", 0,1,'L');
		$pdf->Cell(20, 5, "" , 0,1);
		$pdf->SetFont('bindumathi','',13);
		$pdf->Cell(180, 4, iconv('UTF-8', 'cp1252', ";djld,sl fiajd iemhqï f,aLkh - mdßfNda.sl fiajd uOHia:dkh") , 0,1,'C');
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(30, 1, "" , 0,0);
		 $pdf->Cell(120, 1, "_____________________________________________________________" , 0,1,'C'); //headder Line
		$pdf->Ln();
		$pdf->Cell(20, 10, "" , 0,1);
		 
		 $pdf->SetFont('bindumathi','',11);
		 $pdf->Cell(5, 5, "" , 0,0);
		 $pdf->Cell(10, 12, "01" , 1,0);
		 $pdf->Cell(50, 12,iconv('UTF-8', 'cp1252', "b,a,qïm;a wxlh")  , 1,0); //application no
		 $pdf->Cell(40, 12, "" , 1,0);
		 $pdf->Cell(40, 12,iconv('UTF-8', 'cp1252', "Èkh")  , 1,0,'C'); //date
		 $pdf->Cell(40, 12, "" , 1,1);
		 
		  $pdf->Cell(5, 25, "" , 0,0);
		 $pdf->Cell(10, 25, "02" , 1,0);
		 $pdf->Cell(90, 25,iconv('UTF-8', 'cp1252', "úÿ,sh wjYH ia:dkfha ku ")  , 1,0); 
		
		 $pdf->Cell(80, 25, "" , 1,1);
		 
		  $pdf->Cell(5,12, "" , 0,0);
		 $pdf->Cell(10, 12, "03" , 1,0);
		 $pdf->Cell(90, 12,iconv('UTF-8', 'cp1252', "b,a,qïm; ld¾hd,hg hejQ Èkh")  , 1,0); //application no
		 
		 $pdf->Cell(80, 12, "" , 1,1);
		 
		  $pdf->Cell(5,12, "" , 0,0);
		 $pdf->Cell(10, 12, "04" , 1,0);
		 $pdf->Cell(90, 12,iconv('UTF-8', 'cp1252', "m%d' ú 'b ld¾hd,fhka wdmiq ,enqKq Èkh")  , 1,0); //application no
		 
		 $pdf->Cell(80, 12, "" , 1,1);
		 
		  $pdf->Cell(5,12, "" , 0,0);
		 $pdf->Cell(10, 12, "05" , 1,0);
		 $pdf->Cell(90, 12,iconv('UTF-8', 'cp1252', "ld¾h wxlh")  , 1,0); //application no
		 
		 $pdf->Cell(80, 12, "" , 1,1);
		 
		  $pdf->Cell(5,12, "" , 0,0);
		 $pdf->Cell(10, 12, "06" , 1,0);
		 $pdf->Cell(90, 12,iconv('UTF-8', 'cp1252', "iemhqu wjYH ld, iSudj")  , 1,0); //application no
		 $pdf->Cell(40, 12,iconv('UTF-8', 'cp1252', "isg")  , 1,0,'R'); //date 
		 $pdf->Cell(40, 12,iconv('UTF-8', 'cp1252', "olajd")  , 1,1,'R'); //date
		 //$pdf->Cell(70, 10, "" , 1,1);
		 
		 $pdf->Cell(5,12, "" , 0,0);
		 $pdf->Cell(10, 12, "07" , 1,0);
		 $pdf->Cell(50, 12,iconv('UTF-8', 'cp1252', "weia;fïka;= uqo,")  , 1,0); //application no
		 $pdf->Cell(40, 12, "" , 1,0); 
		 $pdf->Cell(40, 12,iconv('UTF-8', 'cp1252', ";ekam;a uqo,")  , 1,0,'C'); //date
		 $pdf->Cell(40, 12, "" , 1,1);
		 
		 
		 $pdf->Cell(5,12, "" , 0,0); //08
		 $pdf->Cell(10, 12, "08" , 1,0);
		 $pdf->Cell(50, 12,iconv('UTF-8', 'cp1252', "f.ùï jjqpr wxlh")  , 1,0); //voucher no
		 $pdf->Cell(40, 12, "" , 1,0); 
		 $pdf->Cell(40, 12,iconv('UTF-8', 'cp1252', "Èkh")  , 1,0,'C'); //date 
		 $pdf->Cell(40, 12, "" , 1,1);
		 
		 $pdf->Cell(5,12, "" , 0,0); //09
		 $pdf->Cell(10, 12, "09" , 1,0);
		 $pdf->Cell(50, 12,iconv('UTF-8', 'cp1252', "iemhqu ,nd we;s Èkh")  , 1,0); //supply date
		 $pdf->Cell(40, 12, "" , 1,0); 
		 $pdf->Cell(40, 12,iconv('UTF-8', 'cp1252', "lïì ud¾.lref.a ku")  , 1,0,'C'); //date 
		 $pdf->Cell(40, 12, "" , 1,1);
		 
		 $pdf->Cell(5,12, "" , 0,0); //10
		 $pdf->Cell(10, 12, "10" , 1,0);
		 $pdf->Cell(50, 12,iconv('UTF-8', 'cp1252', "WmlrK ksfõok m;a wxlh")  , 1,0); //
		 $pdf->Cell(40, 12, "" , 1,0); 
		 $pdf->Cell(40, 12,iconv('UTF-8', 'cp1252', "Èkh")  , 1,0,'C'); //date 
		 $pdf->Cell(40, 12, "" , 1,1);
		 
		 $pdf->Cell(5,12, "" , 0,0); //11
		 $pdf->Cell(10, 12, "11" , 1,0);
		 $pdf->Cell(50, 12,iconv('UTF-8', 'cp1252', "ukq wxlh")  , 1,0); //meter no
		 $pdf->Cell(40, 12, "" , 1,0); 
		 $pdf->Cell(40, 12,iconv('UTF-8', 'cp1252', "wdrïNl lshjqu")  , 1,0,'C'); //start meter reading 
		 $pdf->Cell(40, 12, "" , 1,1);
		 
		 $pdf->Cell(5,12, "" , 0,0); //12
		 $pdf->Cell(10, 12, "12" , 1,0);
		 $pdf->Cell(50, 12,iconv('UTF-8', 'cp1252', "iemhqï úikê l< Èkh")  , 1,0); //disconnect date
		 $pdf->Cell(40, 12, "" , 1,0); 
		 $pdf->Cell(40, 12,iconv('UTF-8', 'cp1252', "lïì ud¾.lref.a ku")  , 1,0,'C'); //date 
		 $pdf->Cell(40, 12, "" , 1,1);
		 
		 $pdf->Cell(5,12, "" , 0,0); //13
		 $pdf->Cell(10, 12, "13" , 1,0);
		 $pdf->Cell(50, 12,iconv('UTF-8', 'cp1252', "wjika lshjqu ")  , 1,0); //last reading no
		 $pdf->Cell(40, 12, "" , 1,0);
		  $pdf->Cell(40, 12,iconv('UTF-8', 'cp1252', "mdúÉÑ l< tall .Kk")  , 1,0,'C'); //no units
		   $pdf->Cell(40, 12, "" , 1,1);
		 
		 
		 $pdf->Cell(5,12, "" , 0,0);
		 $pdf->Cell(10, 12, "14" , 1,0);
		 $pdf->Cell(90, 12,iconv('UTF-8', 'cp1252', "b,a,qïm; ld¾hd,hg hejQ Èkh")  , 1,0); //cost
		 $pdf->Cell(80, 12, "" , 1,1);
		 
		 $pdf->Cell(5,12, "" , 0,0);
		 $pdf->Cell(10, 12, "15" , 1,0);
		 $pdf->Cell(90, 12,iconv('UTF-8', 'cp1252', "m%dfoaYSh ld¾hd,hg hejQ Èkh")  , 1,0); //application no
		 $pdf->Cell(80, 12, "" , 1,1);
		
		
		 $pdf->Cell(5,18, "" , 0,0);
		 $pdf->Cell(10, 18, "16" , 1,0);
		 $pdf->Cell(90, 18,iconv('UTF-8', 'cp1252', "úÿ,s wêldßf.a w;aik ")  , 1,0); //application no
		 
		 $pdf->Cell(80, 18, "" , 1,1);
		
		
		
		
		 
			
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


