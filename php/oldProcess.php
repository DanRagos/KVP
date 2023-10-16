<?php 
include('../classes/oldClass.php');
$oldClass = new OldClass ();


if (isset($_GET['action'])&& $_GET['action'] == 'oldReportServiceClient'){
	$result = array();
	$users = $oldClass->showOldUsers();
	$clients = $oldClass->showOldClients();
	header('Content-Type: application/json');
	$result = array(
		'users' => $users,
		'clients' => $clients,
	);
	echo json_encode($result);

}

?>