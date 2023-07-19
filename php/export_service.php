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
	$client = $jsonData['client_name'];
	$address = $jsonData['address'];
	$machine = $jsonData['brand'].' '.$jsonData['model'];
	$rep_problem = $jsonData['rep_problem'];
	$diagnosis = $jsonData['diagnosis'];
	$service_done = $jsonData['service_don'];
	$remarks = $jsonData['recomm'];
	$service_by = $jsonData['service_by'];
	$status = $jsonData['status'] == 2? "DONE" : "Unresolved";
	
	
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
				//$content .= "<hr> </hr>";
				$content .= <<<EOD
<table cellspacing="0" cellpadding="5" border="1">
    <tr>
        <td rowspan="1" ><b>Client :</b> <br />$client</td>
       <td rowspan="1"><b>Machine :</b> <br />$machine</td>
       <td rowspan="1" colspan="1"><b>Location :</b> <br />$address</td>
    </tr>
	<tr>
         <td ><b>Reported Problem:</b> <br />$rep_problem</td>
		 <td colspan="2"><b>Diagnosis :</b> <br />$diagnosis</td>
		 
		  
       
      
    </tr>
	<tr>
         <td colspan="3"><b>Service Done:</b> <br />$service_done</td>
			 
		
      
    </tr>
	<tr colspan="3">
         <td ><b>Remarks:</b> <br />$remarks</td>
		 <td ><b>Status:</b> <br />$status</td>
		 <td><b>Service By:</b> <br />$service_by</td>
		 
		
      
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
	$result = $client->viewPmsContract($contract_id);
	$name =  $result[0]['client_name'];
	$machine = $result[0]['brand'].' '.$result[0]['model'];
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
				$content .= '<center><h4> '.$name.'</h4></center>';
				foreach ($result as $row) {
					    $fSchedDate = date('M d, Y', strtotime($row['schedule_date']));
						$fAccompDate = date('M d, Y', strtotime($row['accomp_date']));
				$content .= <<<EOD
			
				<div class="table-container">

<table cellspacing="0" cellpadding="1" border="1">
    <tr>
        <td rowspan="1" ><b>Schedule Date :</b> <br />$fSchedDate</td>
       <td rowspan="1"><b>Service Date :</b> <br />$fAccompDate</td>
       <td rowspan="1" colspan="1"><b>Location :</b> <br />{$row['address']}</td>
    </tr>
	<tr>
         <td ><b>Reported Problem:</b> <br />$date_today</td>
		 <td colspan="2"><b>Diagnosis :</b> <br />{$diagnosis}</td>
		 
		  
       
      
    </tr>
	<tr>
         <td colspan="3"><b>Service Done:</b> <br />{$row['service_don']}</td>
			 
		
      
    </tr>
	<tr colspan="3">
         <td ><b>Remarks:</b> <br />{$row['recomm']}</td>
		 <td ><b>Status:</b> <br />$date_today</td>
		 <td><b>Service By:</b> <br />{$row['service_by']}</td>
		 
		
      
    </tr>
		
	

</table>
</div>
EOD;
				}
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
				$content .= '<center><h4> '.$name.'</h4></center>';
					    $fSchedDate = date('M d, Y', strtotime($result['schedule_date']));
						$fAccompDate = date('M d, Y', strtotime($result['accomp_date']));
				$content .= <<<EOD
			
				<div class="table-container">

<table cellspacing="0" cellpadding="1" border="1">
    <tr>
        <td rowspan="1" ><b>Schedule Date :</b> <br />$fSchedDate</td>
       <td rowspan="1"><b>Service Date :</b> <br />$fAccompDate</td>
       <td rowspan="1" colspan="1"><b>Location :</b> <br />{$row['address']}</td>
    </tr>
	<tr>
         <td ><b>Reported Problem:</b> <br />$date_today</td>
		 <td colspan="2"><b>Diagnosis :</b> <br />{$result['diagnosis']}</td>
		 
		  
       
      
    </tr>
	<tr>
         <td colspan="3"><b>Service Done:</b> <br />{$result['service_don']}</td>
			 
		
      
    </tr>
	<tr colspan="3">
         <td ><b>Remarks:</b> <br />{$result['recomm']}</td>
		 <td ><b>Status:</b> <br />$date_today</td>
		 <td><b>Service By:</b> <br />{$result['service_by']}</td>
		 
		
      
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
else {
    // Return an error response
    $response = array('status' => 'error', 'message' => 'JSON data not received');
    echo json_encode($response);
}


?>
