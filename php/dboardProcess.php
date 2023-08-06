<?php
require_once 'session.php';

if (isset($_GET['action'])&& $_GET['action'] == 'dboardCards'){
	$serviceSched = $client->countAllSchedule();
	$svCall = $client->countAllSv();
	$pms = $client->countAllPms();
	$pendSv = $client->pendSv();
	$pendPms = $client->pendPms();
	$resolved = $client->resolved();
	$schedule = $client->schedule();
	
	$response = array (
	'serviceSchedule'=>$serviceSched,
	'svCall' =>$svCall,
	'pms'=>$pms,
	'pendSv' => $pendSv,
	'pendPms' =>$pendPms,
	'resolved'=> $resolved,
	'schedule' =>$schedule
	);
	echo json_encode($response);
}

if(isset($_GET['action'])&& $_GET['action']=='pendingSvModal'){
	$output ='';
	$schedules = $client->display_pend_sv();
	foreach($schedules as $row){
		$output .= '
		<tr>
		<td>
		 <div class="d-flex px-2 py-1">
		  <div>
			<img src="'.$row['imglink'].'" class="avatar avatar-sm me-3 border-radius-lg" alt="user2">
		  </div>
		  <div class="d-flex flex-column justify-content-center">
			<h6 class="text-center mb-0 text-sm clientName">'.$row['clientName'].'</h6>
			<p class="text-center text-xs text-secondary mb-0">'.$row['clientAddress'].'</p>
		  </div>
		</div>
		</div>
	  </td>
	  <td class="text-center">SV</td>
	  <td class="align-middle text-center text-sm">
		<h6 class="mb-0 text-sm text-center">'.$row['brand'].'</h6>
		<p class="text-center text-xs font-weight-bold mb-0">'.$row['model'].'</p>

	  </td>
	  <td class="align-middle text-center text-sm">
	  <p class="badge badge-sm bg-gradient-success">'.date('M-d-Y',strtotime($row['schedule_date'])).'</p>
	</td>
	</tr>';

	}
	echo $output;
}
if(isset($_GET['action'])&& $_GET['action']=='pendingPmModal'){
	$output ='';
	$schedules = $client->display_pend_pm();
	foreach($schedules as $row){
		$output .= '
		<tr>
		<td>
		 <div class="d-flex px-2 py-1">
		  <div>
			<img src="'.$row['imglink'].'" class="avatar avatar-sm me-3 border-radius-lg" alt="user2">
		  </div>
		  <div class="d-flex flex-column justify-content-center">
			<h6 class="text-center mb-0 text-sm clientName">'.$row['client_name'].'</h6>
			<p class="text-center text-xs text-secondary mb-0">'.$row['client_address'].'</p>
		  </div>
		</div>
		</div>
	  </td>
	  <td class="text-center">PM</td>
	  <td class="align-middle text-center text-sm">
		<h6 class="mb-0 text-sm text-center">'.$row['brand'].'</h6>
		<p class="text-center text-xs font-weight-bold mb-0">'.$row['model'].'</p>

	  </td>
	  <td class="align-middle text-center text-sm">
	  <p class="badge badge-sm bg-gradient-success">'.date('M-d-Y',strtotime($row['schedule_date'])).'</p>
	</td>
	</tr>';

	}
	echo $output;
}
?>