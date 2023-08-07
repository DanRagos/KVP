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
if(isset($_GET['action'])&& $_GET['action']=='resolvedModal'){
	$output ='';
	$schedules = $client->display_resolved_month();
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
	  <p class="badge badge-sm bg-gradient-success">'.date('M-d-Y',strtotime($row['accomp_date'])).'</p>
	</td>
	</tr>';

	}
	echo $output;
}
if(isset($_GET['action'])&& $_GET['action']=='scheduleModalMonth'){
	$output ='';
	$schedules = $client->display_schedule_month();
	foreach($schedules as $row){
		$output .= '
		<tr>
		<td class="text-center">'.$row['schedule_id'].'</td>
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
if (isset($_GET['action']) && $_GET['action']=='getScheduleDoneChart') {
	$sv = array();
	$pm = array();
	$month = 1;
	$year = date('Y');
	while ($month <=12){

		$stmt = "SELECT COUNT(schedule_id) as schedId FROM schedule LEFT JOIN contract on schedule.contract_id = contract.contract_id 
		where schedule.status = 2 AND schedule.schedule_type = 1 AND MONTH(schedule.schedule_date) = $month AND YEAR(schedule.schedule_date) = $year";
		
		array_push($pm, $client->countSchedClient($stmt));
		$stmt = "SELECT COUNT(schedule_id) as schedId FROM schedule LEFT JOIN contract on schedule.contract_id = contract.contract_id 
		where schedule.status = 2 AND schedule.schedule_type = 2 AND MONTH(schedule.schedule_date) = $month AND YEAR(schedule.schedule_date) = $year";
		array_push($sv, $client->countSchedClient($stmt));
		$month++;
	}
	echo json_encode(array(
		'pm'=>$pm,
		'sv'=>$sv
	));
}
if (isset($_GET['action']) && $_GET['action']=='getUserScheduleDoneChart') {
	$resultsArray = array();
	$month = 1;
	$year = date('Y');
		$stmt = "SELECT COUNT(schedule.schedule_id)as totalCount, users.firstname 
		FROM schedule INNER JOIN user_sched on schedule.schedule_id = user_sched.uid 
		LEFT JOIN users on user_sched.uid = users.mem_id WHERE user_sched.us_status = 1 GROUP BY users.firstname;";
	$result = $client->countUserScheduleDone($stmt);
	foreach($result as $row){
		$resultsArray [] = array(
			'firstname'=> $row['firstname'],
			'totalCount'=> $row['totalCount']
		);
	}
	echo json_encode($resultsArray);
}
?>