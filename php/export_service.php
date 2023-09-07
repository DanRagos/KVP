<?php
require 'session.php';
ob_start(); 
// Include the main TCPDF library (search for installation path).
require_once('../pdf/examples/tcpdf_include.php');

// creatp
if (isset($_POST['jsonData'])) {
    // Get the JSON data
    $jsonData = $_POST['jsonData'];
	$name = $jsonData['brand'];
	$schedule_type = ($jsonData['schedule_type'] == 2) ? "Service Call" : "PMS"; 
	$client_name = $jsonData['client_name'];
	$address = $jsonData['client_address'];
	$machine = $jsonData['brand'].' '.$jsonData['model'];
	$rep_problem = $jsonData['rep_problem'];
	$diagnosis = $jsonData['diagnosis'];
	$service_done = $jsonData['service_don'];
	$remarks = $jsonData['recomm'];
    $schedule_id=$jsonData['schedule_id'];
    $service ='';
    $service_by = $client->getServiceBy($jsonData['schedule_id']);           
                    foreach ($service_by as $user) {
                       
                        $service .= $user['firstname'].' '.$user['lastname'];
                        if (count($service_by)>1){
                            $service .= ', ';
                        }
                    }

 $fSchedDate = date('M d, Y', strtotime($jsonData['schedule_date']));
 $fAccompDate = date('M d, Y', strtotime($jsonData['accomp_date']));
  $status  = $jsonData['accomp_status'] == 2 ? 'Done' : 'Unresolved';     
  $withC = $jsonData['withC'] == 1 ? 'W/Collection' : '';   
	
	
    // Process the JSON data and generate the PDF using TCPDF or any other library
    // ...

    // Return a success or failure response
    
	class MYPDF extends TCPDF {
}
 $obj_pdf = new MYPDF('P', 'mm', 'A4'); 
        $obj_pdf->SetCreator(PDF_CREATOR);  
        $obj_pdf->SetTitle("Test");  
        $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
        
        // set header and footer fonts  
        $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
        $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA)); 
        
        // set default monospaced font
        $obj_pdf->SetDefaultMonospacedFont('helvetica');

        // set margins
        $obj_pdf->SetFooterMargin(10);
        $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '11', PDF_MARGIN_RIGHT);  
        $obj_pdf->setPrintHeader(false); 
        $obj_pdf->SetAutoPageBreak(TRUE, 17);

        $obj_pdf->SetFont('helvetica', '', 12); 

$obj_pdf->AddPage(); 
		$date_today = date('F d, Y');
        $content = '';
    
        /// PDF style
        $content .= '
            <style>
                th {
                    background-color: #ccc;
                }

            </style>
            <div class="header">';
		
               	$obj_pdf -> Image('../img/icon.jpg', 58, 7, 25);
                $obj_pdf -> SetFont('Helvetica', 'B', 12);
                $obj_pdf -> Cell(180, 6, "KVP Healthcare Inc.", 0, 1, 'C');
                $obj_pdf -> SetFont('Helvetica', '', 11);
                $obj_pdf -> Cell(180, 5, "Service Report", 0, 1, 'C');
				$obj_pdf -> SetFont('Helvetica', 'B', 10);
                $obj_pdf -> Cell(180, 5, "$schedule_type", 0, 1, 'C');
                $obj_pdf -> SetFont('Helvetica', '', 10);
                $obj_pdf -> Ln(10);
				
                $content .= '</div>';   
                $content .= '<h4 style= "text-align: center;"> '.$client_name.'</h4>'; 
				//$content .= "<hr> </hr>";
				$content .= <<<EOD
<table cellspacing="0" cellpadding="5" border="1">
    <tr>
        <td rowspan="1" ><b>Schedule Date :</b> <br />$fSchedDate</td>
       <td rowspan="1"><b>Service Date :</b> <br />$fAccompDate</td>
       <td rowspan="1" colspan="1"><b>Location :</b> <br />$address</td>
    </tr>
	<tr>
         <td ><b>Machine:</b> <br />$machine</td>
		 <td colspan="2"><b>Diagnosis :</b> <br />$diagnosis</td>
		 
		  
       
      
    </tr>
	<tr>
         <td colspan="3"><b>Service Done:</b> <br />$service_done</td>
			 
		
      
    </tr>
	<tr colspan="3">
         <td ><b>Remarks:</b> <br />$remarks</td>
		 <td ><b>Status:</b> <br />$status $withC</td>
		 <td><b>Service By:</b> <br />$service</td>
		 
		
      
    </tr>
		
	

</table>
EOD;
$content .=" </br>";
$content .=" \n Generated at $date_today";
// print a block of text using Write()
		   $obj_pdf->SetFont('helvetica', '', 10); 
		$obj_pdf->writeHTML($content, true, false, true, false, '');
		 $pdfContent = $obj_pdf->Output('', 'S'); // Capture the PDF content as a string

    // Set the appropriate headers for the response
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="test.pdf"');
	echo $pdfContent;
	exit;
//============================================================+
// END OF FILE
//============================================================+

} 
if (isset($_GET['action']) && $_GET['action'] == 'viewContracts') {
	$contract_id = $_GET['contract_id'];
    $status = 'AND schedule.status = 2';
	$result = $client->viewPmsContract($contract_id, $status);
    $result2 = $client->viewSvContract($contract_id, $status);
	$name =  $result[0]['client_name'];
    $client_address =  $result[0]['client_address'];
	$machine = $result[0]['brand'].'/'.$result[0]['model'];
    $contractFreq = ($result[0]['frequency'] == 1) ? 'Quarterly' : (($result[0]['frequency'] ==2) ? "Semi-Annual": "Annually" );
    $contractType = ($result[0]['status'] == 1) ? "Installation Warranty": "PMS Contract";
    $ctrType = $result[0]['status'];
    $contractDate = date('M d, Y', strtotime($result[0]['turn_over'])).' - '.date('M d, Y', strtotime($result[0]['coverage']));
		class MYPDF extends TCPDF {
}
 $obj_pdf = new MYPDF('P', 'mm', 'A4'); 
        $obj_pdf->SetCreator(PDF_CREATOR);  
        $obj_pdf->SetTitle("Test");  
        $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
        
        // set header and footer fonts  
        $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
        $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA)); 
        
        // set default monospaced font
        $obj_pdf->SetDefaultMonospacedFont('helvetica');

        // set margins
        $obj_pdf->SetFooterMargin(10);
        $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '11', PDF_MARGIN_RIGHT);  
        $obj_pdf->setPrintHeader(false); 
        $obj_pdf->SetAutoPageBreak(TRUE, 17);

        $obj_pdf->SetFont('helvetica', '', 12); 

$obj_pdf->AddPage(); 
		$date_today = date('F d, Y');
        $content = '';
		 $content .= '
            <style>
                th {
                    background-color: #ccc;
                }
				    .table-container {
        margin-bottom: 20px;
    }

            </style>
            <div class="header">';
               $obj_pdf -> Image('../img/icon.jpg', 58, 7, 25);
                $obj_pdf -> SetFont('Helvetica', 'B', 12);
                $obj_pdf -> Cell(180, 7, "KVP Healthcare Inc.", 0, 1, 'C');
                $obj_pdf -> SetFont('Helvetica', '', 11);
                $obj_pdf -> Cell(180, 5, "Preventive Maintenance", 0, 1, 'C');
				$obj_pdf -> SetFont('Helvetica', 'B', 10);
                $obj_pdf -> Ln(10);
				
                $content .= '</div>';    
				//$content .= "<hr> </hr>";
				$content .= '<h3 style= "text-align: center;"> '.$name.'</h3> 
                <h4 style="text-align:center" > '.$contractFreq.' - '.$contractType.'</h4>
                <h5 style="text-align:center" > '.$contractDate.'</h5>';
				foreach ($result as $row) {
                    $service_by = $client->getServiceBy($row['schedule_id']);
                    $service = '';
                    foreach ($service_by as $user) {
                       
                        $service .= $user['firstname'].' '.$user['lastname'];
                        if (count($service_by)>1){
                            $service .= ', ';
                        }
                    }
					    $fSchedDate = date('M d, Y', strtotime($row['schedule_date']));
						$fAccompDate = date('M d, Y', strtotime($row['accomp_date']));
                        $status  = $row['accomp_status'] = 2 ? 'Done' : 'Unresolved';
				$content .= <<<EOD
			
				<div class="table-container">

<table cellspacing="0" cellpadding="3" border="1">
    <tr>
        <td rowspan="1" ><b>Schedule Date :</b> <br />$fSchedDate</td>
       <td rowspan="1"><b>Service Date :</b> <br />$fAccompDate</td>
       <td rowspan="1" colspan="1"><b>Location :</b> <br />{$row['client_address']}</td>
    </tr>
	<tr>
         <td ><b>Machine:</b> <br />$machine</td>
       
		 <td colspan="2"><b>Diagnosis :</b> <br />{$row['diagnosis']}</td>
		 
		  
       
      
    </tr>
	<tr>
         <td colspan="3"><b>Service Done:</b> <br />{$row['service_don']}</td>   
    </tr>
	<tr colspan="3">
         <td ><b>Remarks:</b> <br />{$row['recomm']}</td>
		 <td ><b>Status:</b> <br />$status</td>
		 <td><b>Service By:</b> <br />$service</td>    
    </tr>


</table>
</div>
EOD;
				}
$content .=" </br>";
if ($ctrType != 1) {
    $obj_pdf->SetFont('helvetica', '', 11); 
    $obj_pdf->writeHTML($content, true, false, true, false, '');
    $obj_pdf->AddPage(); 
    $date_today = date('F d, Y');
    $content = '';
     $content .= '
        <style>
            th {
                background-color: #ccc;
            }
                .table-container {
    margin-bottom: 20px;
}

        </style>
        <div class="header">';
           $obj_pdf -> Image('../img/icon.jpg', 58, 7, 25);
            $obj_pdf -> SetFont('Helvetica', 'B', 12);
            $obj_pdf -> Cell(180, 7, "KVP Healthcare Inc.", 0, 1, 'C');
            $obj_pdf -> SetFont('Helvetica', '', 11);
            $obj_pdf -> Cell(180, 5, "Service Call", 0, 1, 'C');
            $obj_pdf -> SetFont('Helvetica', 'B', 10);
            $obj_pdf -> Ln(10);
            
            $content .= '</div>';    
            //$content .= "<hr> </hr>";
            $content .= '<h3 style= "text-align: center;"> '.$name.'</h3> 
            <h4 style="text-align:center" > '.$contractFreq.' - '.$contractType.'</h4>
            <h5 style="text-align:center" > '.$contractDate.'</h5>';
            foreach ($result2 as $row1) {
                $service_by = $client->getServiceBy($row1['schedule_id']);
                $service = '';
                foreach ($service_by as $user) {
                   
                    $service .= $user['firstname'].' '.$user['lastname'];
                    if (count($service_by)>1){
                        $service .= ', ';
                    }
                }
                    $fSchedDate = date('M d, Y', strtotime($row1['schedule_date']));
                    $fAccompDate = date('M d, Y', strtotime($row1['accomp_date']));
                    $status  = $row1['accomp_status'] == 2 ? 'Done' : 'Unresolved';
                    $withC  = $row1['withC'] == 1 ? 'W/Collection' : '';
            $content .= <<<EOD
        
            <div class="table-container">

<table cellspacing="0" cellpadding="3" border="1">
<tr>
    <td rowspan="1" ><b>Schedule Date :</b> <br />$fSchedDate</td>
   <td rowspan="1"><b>Service Date :</b> <br />$fAccompDate</td>
   <td rowspan="1" colspan="1"><b>Location :</b> <br/>$client_address</td>
</tr>
<tr>
     <td ><b>Machine:</b> <br />$machine</td>
     <td ><b>Reported Problem:</b> <br/>{$row1['rep_problem']}</td>
     <td colspan="2"><b>Diagnosis :</b> <br />{$row1['diagnosis']}</td>
     
      
   
  
</tr>
<tr>
     <td colspan="3"><b>Service Done:</b> <br />{$row1['service_don']}</td>   
</tr>
<tr colspan="3">
     <td ><b>Remarks:</b> <br />{$row1['recomm']}</td>
     <td ><b>Status:</b> <br />$status $withC</td>
     <td><b>Service By:</b> <br />$service</td>    
</tr>


</table>
</div>
EOD;
            }
}
// print a block of text using Write()
		 
$content .=" </br>";
$content .=" \n Generated at $date_today";
// print a block of text using Write()
		   $obj_pdf->SetFont('helvetica', '', 11); 
		$obj_pdf->writeHTML($content, true, false, true, false, '');
		 $pdfContent = $obj_pdf->Output('', 'S'); // Capture the PDF content as a string

    // Set the appropriate headers for the response
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="test.pdf"');
	echo $pdfContent;
	exit;

}
if (isset($_GET['action']) && $_GET['action'] == 'viewContractPm') {
	$accomp_id = $_GET['accomp_id'];
	$result = $client->get_pms_report($accomp_id); 
	$name =  $result['client_name'];
	$machine = $result['brand'].' '.$result['model'];
    $service_by = $client->getServiceBy($result['schedule_id']);
    $status  = $row['accomp_status'] = 2 ? 'DONE' : 'Unresolved';
    $service = '';
    foreach ($service_by as $user) {
       
        $service .= $user['firstname'].' '.$user['lastname'];
        if (count($service_by)>1){
            $service .= ', ';
        }
    }
		class MYPDF extends TCPDF {
}
 $obj_pdf = new MYPDF('P', 'mm', 'A4'); 
        $obj_pdf->SetCreator(PDF_CREATOR);  
        $obj_pdf->SetTitle("Test");  
        $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
        
        // set header and footer fonts  
        $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
        $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA)); 
        
        // set default monospaced font
        $obj_pdf->SetDefaultMonospacedFont('helvetica');

        // set margins
        $obj_pdf->SetFooterMargin(10);
        $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '11', PDF_MARGIN_RIGHT);  
        $obj_pdf->setPrintHeader(false); 
        $obj_pdf->SetAutoPageBreak(TRUE, 17);

        $obj_pdf->SetFont('helvetica', '', 12); 

$obj_pdf->AddPage(); 
		$date_today = date('F d, Y');
        $content = '';
		 $content .= '
            <style>
                th {
                    background-color: #ccc;
                }
				    .table-container {
        margin-bottom: 20px;
    }

            </style>
            <div class="header">';
               $obj_pdf -> Image('../img/icon.jpg', 58, 7, 25);
                $obj_pdf -> SetFont('Helvetica', 'B', 12);
                $obj_pdf -> Cell(180, 7, "KVP Healthcare Inc.", 0, 1, 'C');
                $obj_pdf -> SetFont('Helvetica', '', 11);
                $obj_pdf -> Cell(180, 5, "Preventive Maintenance", 0, 1, 'C');
				$obj_pdf -> SetFont('Helvetica', 'B', 10);
                $obj_pdf -> Ln(10);
				
                $content .= '</div>';    
				//$content .= "<hr> </hr>";
				$content .= '<h4 style= "text-align: center;"> '.$name.'</h4>';
					    $fSchedDate = date('M d, Y', strtotime($result['schedule_date']));
						$fAccompDate = date('M d, Y', strtotime($result['accomp_date']));
				$content .= <<<EOD
			
				<div class="table-container">

<table cellspacing="0" cellpadding="3" border="1">
    <tr>
        <td rowspan="1" ><b>Schedule Date :</b> <br />$fSchedDate</td>
       <td rowspan="1"><b>Service Date :</b> <br />$fAccompDate</td>
       <td rowspan="1" colspan="1"><b>Location :</b> <br />{$result['address']}</td>
    </tr>
	<tr>
    <td ><b>Machine :</b> <br />$machine</td>
		 <td colspan="2"><b>Diagnosis :</b> <br />{$result['diagnosis']}</td>
		 
		  
       
      
    </tr>
	<tr>
         <td colspan="3"><b>Service Done:</b> <br />{$result['service_don']}</td>
			 
		
      
    </tr>
	<tr colspan="3">
         <td ><b>Remarks:</b> <br />{$result['recomm']}</td>
		 <td ><b>Status:</b> <br />$status</td>
		 <td><b>Service By:</b> <br />$service</td>
		 
		
      
    </tr>
		
	

</table>
</div>
EOD;
				
$content .=" </br>";
$content .=" \n Generated at $date_today";
// print a block of text using Write()
		   $obj_pdf->SetFont('helvetica', '', 11); 
		$obj_pdf->writeHTML($content, true, false, true, false, '');
		 $pdfContent = $obj_pdf->Output('', 'S'); // Capture the PDF content as a string

    // Set the appropriate headers for the response
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="test.pdf"');
	echo $pdfContent;
	exit;

}


if (isset($_POST['action']) && $_POST['action'] == 'viewReport')
{
    

  
 $data = json_decode($_POST['rData'], true);
 $isSave = $_POST['isSave'];
 $headers = $data['headers'];
 $arrData = $data['data'];
 $parameter = $data['parameters'];

 $reportType = $parameter['reportType'];
 $string=$parameter['dateFilter'];
		$last_space = strrpos($string, ' ');
		$last_word = substr($string, $last_space);
		$first_chunk = substr($string, 0, $last_space - 2);
		$dateTo = date('Y-m-d', strtotime($last_word));
		$dateFrom = date('Y-m-d', strtotime($first_chunk));
 //print_r($arrData);

 class MYPDF extends TCPDF {
}
 $obj_pdf = new MYPDF('P', 'mm', 'A4'); 
        $obj_pdf->SetCreator(PDF_CREATOR);  
        $obj_pdf->SetTitle($parameter['reportName']);  
        $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
        
        // set header and footer fonts  
        $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
        $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA)); 
        
        // set default monospaced font
        $obj_pdf->SetDefaultMonospacedFont('helvetica');

        // set margins
        $obj_pdf->SetFooterMargin(10);
        $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '11', PDF_MARGIN_RIGHT);  
        $obj_pdf->setPrintHeader(false); 
        $obj_pdf->SetAutoPageBreak(TRUE, 17);

        $obj_pdf->SetFont('helvetica', '', 12); 

$obj_pdf->AddPage(); 

$content = '';
$content .= '
   <style>
   table {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }
  
  table td, #table th {
    border: 1px solid #ddd;
    padding: 8px;
  }
  
  table tr:nth-child(even){background-color: #f2f2f2;}
  
  table tr:hover {background-color: #ddd;}
  
  table th {
    
    font-weight: bold;
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #04AA6D;
    color: white;
  }
           .table-container {
margin-bottom: 20px;
}

   </style>
   <div class="header">';
      $obj_pdf -> Image('../img/icon.jpg', 58, 7, 25);
       $obj_pdf -> SetFont('Helvetica', 'B', 12);
       $obj_pdf -> Cell(180, 7, "KVP Healthcare Inc.", 0, 1, 'C');
       $obj_pdf -> SetFont('Helvetica', '', 11);
       $obj_pdf -> Cell(180, 5, "Preventive Maintenance", 0, 1, 'C');
       $obj_pdf -> SetFont('Helvetica', 'B', 10);
       $obj_pdf -> Ln(10);
       
       $content .= '</div>';  
       $content .= '<div style= "text-align: center;"> 
       <h3>'.$parameter['reportTitle'].'</h3> 
       <h5> Coverage : '.date('M d, Y ', strtotime ($dateFrom)).' - '.date('M d, Y ', strtotime ($dateTo)).'</h5>
       </div>';

       $content .= '<table id="table">
       <tr style= "text-align: center;" >';
       foreach($headers as $header) {
        $content .= '<th> '.$header.'</th>';
       }
       $content .='
       </tr>';
       
      
    if ($reportType == 1) {
        if($parameter['schedSt'] == 2) {
            foreach ($arrData as $dData) {
                $scheduleType = $dData['schedule_type'] == 1? 'PM' : 'SV';
                $scheduleStatus = $dData['status'] == 1? 'PM' : 'SV';
                $content .= ' <tr style="text-align: center;"> 
                <td> '.$dData['schedule_id'].' </td>
                <td> '.$scheduleType.' </td>
                <td> '.$dData['client_name'].' </td>
                <td> '.$dData['brand'].'- '.$dData['model'].'</td>
                <td> '.date('M d, Y',strtotime($dData['schedule_date'])).'</td>
                <td> '.$dData['rep_problem'].'</td>
                <td> '.$dData['ServicedBy'].'</td>
    
                </tr>';
            } 
        }
        elseif ($parameter['schedSt'] == 3) {
            foreach ($arrData as $dData) {
                $scheduleType = $dData['schedule_type'] == 1? 'PM' : 'SV';
                $scheduleStatus = $dData['status'] == 1? 'PM' : 'SV';
                $content .= ' <tr style="text-align: center;"> 
                <td> '.$dData['schedule_id'].' </td>
                <td> '.$scheduleType.' </td>
                <td> '.$dData['client_name'].' </td>
                <td> '.$dData['brand'].'- '.$dData['model'].'</td>
                <td> '.date('M d, Y',strtotime($dData['schedule_date'])).'</td>
                <td> '.$dData['rep_problem'].'</td>
                <td> '.$dData['ServicedBy'].'</td>
    
                </tr>';
            } 

        }
        elseif ($parameter['schedSt'] == 0) {
            foreach ($arrData as $dData) {
                $scheduleType = $dData['schedule_type'] == 1? 'PM' : 'SV';
                $scheduleStatus = $dData['status'] == 1? 'PM' : 'SV';
                $content .= ' <tr style="text-align: center;"> 
                <td> '.$dData['schedule_id'].' </td>
                <td> '.$scheduleType.' </td>
                <td> '.$dData['client_name'].' </td>
                <td> '.$dData['brand'].'- '.$dData['model'].'</td>
                <td> '.date('M d, Y',strtotime($dData['schedule_date'])).'</td>
                <td> '.$dData['assignedTo'].'</td>
                <td> '.$dData['rep_problem'].'</td>
               

    
                </tr>';
            } 

        }
     
    }
    else if ($reportType == 2 ) {
        foreach($arrData as $dData) {
            $frequency = $dData['status'] == 1 ? 'Quarterly': ($dData['status'] == 2 ? 'Semi-Annual': 'Annually');
       $content .= ' <tr style="text-align: center;"> 
       <td> '.$dData['contract_id'].'</td>
       <td> '.$dData['client_name'].'</td>
       <td> '.$dData['brand'].'- '.$dData['model'].'</td>
       <td> '.date('M d, Y', strtotime($dData['turn_over'])).' - '.date('M d, Y', strtotime($dData['coverage'])).'</td>
       <td> '. 100 - (($dData['count'] /$dData['total']) * 100).'%</td>
       <td> '. $frequency.'</td>
       </tr> ';
       }
    }
    else if ($reportType == 3) {
        $serviceStatus = $dData['accomp_status'] == 2 ? "Done" : "Unresolved";
        foreach($arrData as $dData) {
       $content .= ' <tr style="text-align: center;"> 
       <td> '.$dData['schedule_id'].'</td>
       <td> '.$dData['client_name'].'</td>
       <td> '.$dData['brand'].'- '.$dData['model'].'</td>
       <td> '.$dData['accomp_id'].'</td>
       <td> '.date('M d, Y', strtotime($dData['accomp_date'])).'</td>
       <td> '. $dData['ServicedBy'].'</td>
       <td> '. $serviceStatus.'</td>
       <td> '. $dData['rep_problem'].'</td>
       </tr> ';
       }

    }
       
       $content.='</table>';

       $obj_pdf->SetFont('helvetica', '', 11); 
       $obj_pdf->writeHTML($content, true, false, true, false, '');
        $pdfContent = $obj_pdf->Output('', 'S'); // Capture the PDF content as a string

   // Set the appropriate headers for the response
   header('Content-Type: application/pdf');
   header('Content-Disposition: inline; filename="'.$parameter['reportName'].'.pdf"');
    if ($_POST['isSave'] == 1){
        $outputPath = $_SERVER['DOCUMENT_ROOT'] . '/kvp/pdfReport/' . $parameter['reportName'] . '.pdf';
        $obj_pdf->Output($outputPath, 'F');
        $test = $client->save_report('../pdfReport/'.$parameter['reportName'].'.pdf', $parameter['reportName'], $id);
        // echo $test;

     
    }
    else {
        echo $pdfContent;
       
    }
   
        
    
   


}

else {
    // Return an error response
    $response = array('status' => 'error', 'message' => 'JSON data not received');
    echo json_encode($response);
}


?>
