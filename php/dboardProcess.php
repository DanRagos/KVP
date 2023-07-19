<?php
require_once 'session.php';

if (isset($_GET['action'])&& $_GET['action'] == 'dboardCards'){
	$serviceSched = $client->countAllSchedule();
	$svCall = $client->countAllSv();
	$pms = $client->countAllPms();
	$pendSv = $client->pendSv();
	$pendPms = $client->pendPms();
	$resolved = $client->resolved();
	
	$response = array (
	'serviceSchedule'=>$serviceSched,
	'svCall' =>$svCall,
	'pms'=>$pms,
	'pendSv' => $pendSv,
	'pendPms' =>$pendPms,
	'resolved'=> $resolved
	);
	echo json_encode($response);
}
?>