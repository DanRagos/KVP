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
	$address = $jsonData['address'];
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
  $status  = $row['accomp_status'] = 2 ? 'DONE' : 'Unresolved';               
	
	
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
		 <td ><b>Status:</b> <br />$status</td>
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
   
	$name =  $result[0]['client_name'];
	$machine = $result[0]['brand'].'/'.$result[0]['model'];

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
else {
    // Return an error response
    $response = array('status' => 'error', 'message' => 'JSON data not received');
    echo json_encode($response);
}


?>
