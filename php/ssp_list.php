<?php
 require( '../classes/ssp.php' );
 $id = 2;
// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'kvp',
    'host' => 'localhost'
);

/*-----------------------------------------------------------------------------------Server Side for  Active List Datatable-------------------------------------------------------------------*/
 if(isset($_GET['db'])&& $_GET['db']==1){
	 $primaryKey = 'accomp_id';
	 // DB table to use
$table = <<<EOT
 (SELECT accomplished_schedule.id as accomp_id, accomplished_schedule.accomp_status, accomplished_schedule.withC, 
 schedule.*, COALESCE(contract.contract_id, service_call.sv_id) AS id, COALESCE(contract.brand, service_call.brand) as brand, 
 COALESCE(contract.model, service_call.model) as model, COALESCE(clients.client_name, CASE WHEN service_call.guest = 0 THEN service_call.guest_name END) AS client_name, 
 COALESCE(clients.imglink, '../image/uploads/mv santiago.webp') as imglink, COALESCE(clients.client_address, service_call.guest_address) AS client_address, service_call.rep_problem, accomplished_schedule.accomp_date 
 FROM schedule LEFT JOIN service_call ON (schedule.schedule_type = 2 AND schedule.sv_id = service_call.sv_id) 
  LEFT JOIN contract ON schedule.contract_id = contract.contract_id OR service_call.contract_id = contract.contract_id 
 LEFT JOIN clients ON (contract.client_id = clients.client_id) OR (service_call.client_id = clients.client_id) LEFT JOIN accomplished_schedule ON (schedule.schedule_id = accomplished_schedule.schedule_id) 
 WHERE schedule.status IN (2, 3) ORDER BY schedule.schedule_id DESC ) temp
EOT;
// indexes
$columns = array(
array( 'db' => 'schedule_id', 'dt' => 0,
'formatter' => function($d,$row){
return '<div class="d-flex px-2 py-1">
	<div class="d-flex flex-column justify-content-center">
	<h6 class="text-center mb-0 text-sm">'.$row['schedule_id'].'</h6>
	</div>';
}),
array( 'db' => 'accomp_id', 'dt' => 1,
'formatter' => function($d,$row){
return '<div class="d-flex px-2 py-1">
	<div class="d-flex flex-column justify-content-center">
	<h6 class="text-center mb-0 text-sm">'.$row['accomp_id'].'</h6>
	</div>';
}),
array( 'db' => 'client_name', 'dt' => 2,
'formatter' => function($d,$row){
return '
	<div class="d-flex flex-column justify-content-center">
	<h5 class="text-center text-xs text-secondary mb-0">'.$d.'</h5>
	</div>';
}),
array( 'db' => 'client_address', 'dt' => 3,
'formatter' => function($d,$row){
return '
	<div class="d-flex flex-column justify-content-center">
	<h5 class="text-center text-xs text-secondary mb-0">'.$d.'</h5>
	</div>';
}),
array( 'db' => 'schedule_type',  'dt' => 4,
'formatter'=> function($d,$row){
$type = $d == 2 ? "SV" : "PMS";
$color = $row['schedule_type'] == 1 ? "primary" :  "success";
return '   <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-'.$color.'">'.$type.'</span>
                      </td>';
}),

array( 'db' => 'brand', 'dt' => 5,
'formatter' => function($d,$row){
return '
	<div class="d-flex flex-column justify-content-center">
	<h6 class="text-center text-uppercase text-xs text-secondary mb-0">'.$d.'</h6>
	</div>';
}),

array( 'db' => 'model', 'dt' => 6, 'formatter' => function($d,$row){
return '<align-middle text-center text-sm">
	<div class="align-middle text-center text-sm">
	<h6 class="text-xs text-uppercase text-secondary mb-0">'.$d.'</h6> </div>';}),
array( 'db' => 'rep_problem', 'dt' => 7,
'formatter'=> function($d,$row){
return '<div class ="align-middle text-center text-sm">'.$d.'</div>';}),
array(
'db'        => 'accomp_date',
'dt'        => 8,
'formatter' => function( $d, $row) {
return ($d!==null) ? '<td class ="align-middle text-center text-sm"  "'.strtotime($d).'">
<span class="badge badge-sm bg-gradient-info">'.date( 'M d, Y', strtotime($d)).'</span>
</td>':' ' ;}),
array('db'=> 'withC', 'dt'=> ''), 
array(
	'db'        => 'accomp_status',
	'dt'        => 9,
	'formatter' => function( $d, $row) {
		$aStats = ($row['withC'] >0 )? "W/Collection": " ";
	$status =  ($row['accomp_status'] == 2) ? '<span class="badge badge-sm bg-gradient-success">DONE '. $aStats.'</span>' 
	: '<span class="badge badge-sm bg-gradient-warning">Unresolved '. $aStats.'</span>' ;
	return '<td class ="justify-content-center align-middle text-center text-sm"> '.$status.'</td>';
	}
),

array(
'db'        => 'accomp_id',
'dt'        => 10,
'formatter' => function( $d, $row) {
return
'<div class ="align-middle text-center text-sm">
<span class="data-bs-toggle="tooltip" data-bs-placement="top" title="View Report"> <button type="button" data-id="'.$row['accomp_id'].'" class="btn btn-secondary no_margin viewPms"><i class="fa-solid fa-eye"></i></span></button>
<span class="data-bs-toggle="tooltip" data-bs-placement="top" title="Edit tool details"> <button type="button" data-id="'.$row['accomp_id'].'"data-bs-target = "#edit-pm-modal" data-bs-toggle="modal" class="btn btn-warning no_margin editPm"><i class="fa-solid fa-edit"></i></span></button>
</div>';
}
),

);
 }
  else if(isset($_GET['db'])&& $_GET['db']==2){
	$primaryKey = 'accomp_id';
	$user_id = $_GET['user_id'];
	// DB table to use
$table = <<<EOT
(SELECT accomplished_schedule.id as accomp_id, schedule.*, COALESCE(contract.contract_id, service_call.sv_id) AS id, COALESCE(contract.brand, service_call.brand) as brand, COALESCE(contract.model, service_call.model) as model, COALESCE(clients.client_name, CASE WHEN service_call.guest = 0 THEN service_call.guest_name END) AS client_name,COALESCE(clients.client_address, service_call.guest_address) AS address, service_call.rep_problem, accomplished_schedule.accomp_date FROM schedule LEFT JOIN contract ON (schedule.schedule_type = 1 AND schedule.contract_id = contract.contract_id) LEFT JOIN service_call ON (schedule.schedule_type = 2 AND schedule.sv_id = service_call.sv_id) LEFT JOIN clients ON (contract.client_id = clients.client_id) OR (service_call.client_id = clients.client_id) LEFT JOIN accomplished_schedule ON (schedule.schedule_id = accomplished_schedule.schedule_id) 
LEFT JOIN user_sched ON schedule.schedule_id = user_sched.sched_id
WHERE schedule.status IN (2, 3) AND user_sched.uid = $user_id ORDER BY schedule.schedule_id DESC ) temp
EOT;
// indexes
$columns = array(
array( 'db' => 'schedule_id', 'dt' => 0,
'formatter' => function($d,$row){
return '<div class="d-flex px-2 py-1">
   <div class="d-flex flex-column justify-content-center">
   <h6 class="text-center mb-0 text-sm">'.$row['schedule_id'].'</h6>
   </div>';
}),
array( 'db' => 'client_name', 'dt' => 1,
'formatter' => function($d,$row){
return '
   <div class="d-flex flex-column justify-content-center">
   <h5 class="text-center text-xs text-secondary mb-0">'.$d.'</h5>
   </div>';
}),

array( 'db' => 'schedule_type',  'dt' => 2,
'formatter'=> function($d,$row){
$type = $d == 2 ? "SV" : "PMS";
$color = $row['schedule_type'] == 1 ? "primary" :  "success";
return '   <td class="align-middle text-center text-sm">
					   <span class="badge badge-sm bg-gradient-'.$color.'">'.$type.'</span>
					 </td>';
}),




array( 'db' => 'rep_problem', 'dt' =>3,
'formatter'=> function($d,$row){
return '<div class ="align-middle text-center text-sm">'.$d.'</div>';}),
array(
'db'        => 'accomp_date',
'dt'        => 4,
'formatter' => function( $d, $row) {
return ($d!==null) ? '<td class ="align-middle text-center text-sm"  "'.strtotime($d).'">
<span class="badge badge-sm bg-gradient-info">'.date( 'M d, Y', strtotime($d)).'</span>
</td>':' ' ;}),

array(

'db'        => 'accomp_id',
'dt'        => 5,
'formatter' => function( $d, $row) {
return
'<div class ="align-middle text-center text-sm">
<span class="data-bs-toggle="tooltip" data-bs-placement="top" title="View Report"> <button type="button" data-id="'.$row['accomp_id'].'" class="btn btn-secondary no_margin viewPms"><i class="fa-solid fa-eye"></i></span></button>
<span class="data-bs-toggle="tooltip" data-bs-placement="top" title="Edit tool details"> <button type="button" data-id="'.$row['accomp_id'].'"data-bs-target = "#edit-pm-modal" data-bs-toggle="modal" class="btn btn-warning no_margin editPm"><i class="fa-solid fa-edit"></i></span></button>
</div>';
}
),

);

 }
 else if(isset($_GET['db'])&& $_GET['db']==3){
	$primaryKey = 'contract_id';
	$user_id = $_GET['user_id'];
	// DB table to use
$table = <<<EOT
(SELECT contract.*, machine_type.machine_name, clients.client_name, clients.imglink from clients inner join contract on clients.client_id = contract.client_id
left join machine_type on contract.machine_type = machine_type.machine_id where contract.isActive = '1') temp
EOT;
// indexes
$columns = array(
array( 'db' => 'contract_id', 'dt' => 0,
'formatter' => function($d,$row){
return '<div class="d-flex px-2 py-1">
   <div class="d-flex flex-column justify-content-center">
   <h6 class="text-center mb-0 text-sm">'.$row['contract_id'].'</h6>
   </div>';
}),
array('db'=>'imglink', 'dt'=>''),
array( 'db' => 'client_name', 'dt' => 1,
'formatter' => function($d,$row){
return '
<div class="d-flex px-2 py-1">
<div>
  <img src="'.$row['imglink'].'" class="avatar avatar-sm me-3 border-radius-lg" alt="user2">
</div>
<div class="d-flex flex-column justify-content-center">
  <h6 class="mb-0 text-sm clientName" >'.$row['client_name'].'</h6>
  
</div>
</div>
</div>';
}),
array('db'=>'brand', 'dt'=> ''),
array( 'db' => 'model', 'dt' => 2,
'formatter' => function($d,$row){
return '
   <div class="d-flex flex-column justify-content-center text-uppercase">
   <h5 class="text-center text-xs text-secondary mb-0">'.$row['brand'].'/'.$d.'</h5>
   </div>';
}),
array('db'=>'turn_over', 'dt'=> ''),
array( 'db' => 'coverage', 'dt' => 3,
'formatter' => function($d,$row){
return '
   <div class="d-flex flex-column justify-content-center">
   <a href="#" ><p class="badge badge-sm bg-gradient-success">'.date('M-d-Y',strtotime($row['turn_over'])).'/'.date('M-d-Y',strtotime($d)).'</p></a>
   </div>';
}),
array( 'db' => 'frequency', 'dt' => 4,
'formatter' => function($d,$row){
	$contractFreq = ($row['frequency'] == 1) ? 'Quarterly' : (($row['frequency'] ==2) ? "Semi-Annual": "Annually" );
return
' <div class="d-flex flex-column justify-content-center">
   <p class="badge badge-sm bg-gradient-info">'.$contractFreq.'</p>
   </div>';
}),
array('db'=>'status', 'dt'=> 5,
'formatter'=>function($d,$row){
	$status = ($d == 1) ? "Installation Warranty": "PMS COntract";
	return '
	<div class="d-flex flex-column justify-content-center">
	<p class="badge badge-sm bg-gradient-primary">'.$status.'</p>
	</div>';
}),
array('db'=>'total', 'dt'=> ''),
array('db'=>'count', 'dt'=> 6,
'formatter'=> function($d, $row){
	$count = 100 - (($row['count'] / $row['total'])*100) ;
return '  <div class="align-middle text-center text-sm">
<p class="text-xs font-weight-bold mb-0">'.number_format($count).'%'.'</p>
</div>';
}),
array('db'=>'sv_call', 'dt'=>7,
'formatter'=>function($d, $row){
	return '
	<div class="align-middle text-center text-sm">
	<p class="text-xs font-weight-bold mb-0">'.$row['sv_call'].'</p>
  </div>';
}),



array(

'db'        => 'contract_id',
'dt'        => 8,
'formatter' => function( $d, $row) {
return
'<div class ="align-middle text-center text-sm">
<span class="data-bs-toggle="tooltip" data-bs-placement="top" title="View Report"> <button type="button" data-id="'.$row['contract_id'].'" class="btn btn-secondary no_margin viewContractReport"><i class="fa-solid fa-eye"></i></span></button>
</div>';
}
),

);

 }
 else if(isset($_GET['db'])&& $_GET['db']==4){
	$primaryKey = 'contract_id';
	$user_id = $_GET['user_id'];
	// DB table to use
$table = <<<EOT
(SELECT contract.*, machine_type.machine_name, clients.client_name, clients.imglink from clients inner join contract on clients.client_id = contract.client_id
left join machine_type on contract.machine_type = machine_type.machine_id where contract.isActive = '1') temp
EOT;
// indexes
$columns = array(
array( 'db' => 'contract_id', 'dt' => 0,
'formatter' => function($d,$row){
return '<div class="d-flex px-2 py-1">
   <div class="d-flex flex-column justify-content-center">
   <h6 class="text-center mb-0 text-sm">'.$row['contract_id'].'</h6>
   </div>';
}),
array('db'=>'imglink', 'dt'=>''),
array( 'db' => 'client_name', 'dt' => 1,
'formatter' => function($d,$row){
return '
<div class="d-flex px-2 py-1">
<div>
  <img src="'.$row['imglink'].'" class="avatar avatar-sm me-3 border-radius-lg" alt="user2">
</div>
<div class="d-flex flex-column justify-content-center">
  <h6 class="mb-0 text-sm clientName" >'.$row['client_name'].'</h6>
  
</div>
</div>
</div>';
}),
array('db'=>'brand', 'dt'=> ''),
array( 'db' => 'model', 'dt' => 2,
'formatter' => function($d,$row){
return '
   <div class="d-flex flex-column justify-content-center text-uppercase">
   <h5 class="text-center text-xs text-secondary mb-0">'.$row['brand'].'/'.$d.'</h5>
   </div>';
}),
array('db'=>'turn_over', 'dt'=> ''),
array( 'db' => 'coverage', 'dt' => 3,
'formatter' => function($d,$row){
return '
   <div class="d-flex flex-column justify-content-center">
   <p class="badge badge-sm bg-gradient-success">'.date('M-d-Y',strtotime($row['turn_over'])).'/'.date('M-d-Y',strtotime($d)).'</p>
   </div>';
}),
array('db'=>'status', 'dt'=> '4',
'formatter'=>function($d,$row){
	$status = ($d == 1) ? "Installation Warranty": "PMS COntract";
	return '
	<div class="d-flex flex-column justify-content-center">
	<p class="badge badge-sm bg-gradient-primary">'.$status.'</p>
	</div>';
}),
array('db'=>'total', 'dt'=> ''),
array('db'=>'count', 'dt'=> '5',
'formatter'=> function($d, $row){
	$count = 100 - (($row['count'] / $row['total'])*100) ;
return '  <div class="align-middle text-center text-sm">
<p class="text-xs font-weight-bold mb-0">'.number_format($count).'%'.'</p>
</div>';
}),
array('db'=>'sv_call', 'dt'=> '6',
'formatter'=>function($d, $row){
	return '
	<div class="align-middle text-center text-sm">
	<p class="text-xs font-weight-bold mb-0">'.$row['sv_call'].'</p>
  </div>';
}),



array(

'db'        => 'contract_id',
'dt'        => 7,
'formatter' => function( $d, $row) {
return
'<div class ="align-middle text-center text-sm">
<span class="data-bs-toggle="tooltip" data-bs-placement="top" title="View Report"> <button type="button" data-id="'.$row['contract_id'].'" class="btn btn-secondary no_margin viewContractReport"><i class="fa-solid fa-eye"></i></span></button>
</div>';
}
),

);

 }
 else if(isset($_GET['db'])&& $_GET['db']==5){
	$primaryKey = 'contract_id';
	$isActive = 1;
	$clientsId = $_GET['client_id'];

	// DB table to use
$table = <<<EOT
(SELECT clients.client_id as clientId, contract.*, machine_type.machine_name from clients inner join contract on clients.client_id = contract.client_id
left join machine_type on contract.machine_type = machine_type.machine_id where contract.client_id = $clientsId AND contract.isActive = 1 AND contract.count > 0) temp
EOT;
// indexes
$columns = array(
array( 'db' => 'contract_id', 'dt' => 'contractId'),
array( 'db' => 'clientId', 'dt' => 'clientId'),
array( 'db' => 'machine_name', 'dt' => 'machine_name'),
array('db' => 'brand', 'dt'=>'brand'),
array('db' => 'model', 'dt'=>'model'),
array('db' => 'turn_over', 'dt'=>'turnover'),
array('db' => 'coverage', 'dt'=>'coverage'),
array('db' => 'pTurn_over', 'dt'=>'pTurn_over'),
array('db' => 'pCoverage', 'dt'=>'pCoverage'),
array('db' => 'status', 'dt'=>'status'),
array('db' => 'frequency', 'dt'=>'frequency'),
array('db' => 'count', 'dt'=>'count'),
array('db' => 'total', 'dt'=>'total'),
array('db' => 'sv_call', 'dt'=>'sv_call'),
array('db' => 'contract_id', 'dt'=>'contract_id'),

);
 }
 else if(isset($_GET['db'])&& $_GET['db']==6){
	$primaryKey = 'contract_id';
	$isActive = 1;
	$clientsId = $_GET['client_id'];

	// DB table to use
$table = <<<EOT
(SELECT clients.client_id as clientId, contract.*, machine_type.machine_name from clients inner join contract on clients.client_id = contract.client_id
left join machine_type on contract.machine_type = machine_type.machine_id where contract.client_id = $clientsId AND contract.isActive = 1 AND contract.count <= 0) temp
EOT;
// indexes
$columns = array(
array( 'db' => 'clientId', 'dt' => 'clientId'),
array( 'db' => 'contract_id', 'dt' => 'contractId'),
array( 'db' => 'machine_name', 'dt' => 'machine_name'),
array('db' => 'brand', 'dt'=>'brand'),
array('db' => 'model', 'dt'=>'model'),
array('db' => 'turn_over', 'dt'=>'turnover'),
array('db' => 'coverage', 'dt'=>'coverage'),
array('db' => 'pTurn_over', 'dt'=>'pTurn_over'),
array('db' => 'pCoverage', 'dt'=>'pCoverage'),
array('db' => 'status', 'dt'=>'status'),
array('db' => 'frequency', 'dt'=>'frequency'),
array('db' => 'count', 'dt'=>'count'),
array('db' => 'total', 'dt'=>'total'),
array('db' => 'sv_call', 'dt'=>'sv_call'),
array('db' => 'contract_id', 'dt'=>'contract_id'),

);
 }
 else if(isset($_GET['db'])&& $_GET['db']==7){
	$primaryKey = 'id';
	$isActive = 1;
	$clientsId = $_GET['client_id'];

	// DB table to use
$table = <<<EOT
(select accomplished_schedule.*, schedule.schedule_date, COALESCE(service_call.brand, contract.brand) as brand, COALESCE(service_call.model, contract.model) as model, machine_type.machine_name, service_call.rep_problem, contract.contract_id as contract_id from accomplished_schedule LEFT JOIN schedule ON accomplished_schedule.schedule_id = schedule.schedule_id LEFT JOIN service_call ON schedule.sv_id = service_call.sv_id LEFT JOIN contract ON service_call.contract_id = 
contract.contract_id LEFT JOIN machine_type on contract.machine_type = machine_type.machine_id where service_call.client_id = $clientsId) temp
EOT;
// indexes
$columns = array(
array( 'db' => 'id', 'dt' => 'accomp_id'),
array( 'db' => 'schedule_id', 'dt' => 'sched_id'),
array( 'db' => 'accomp_date', 'dt' => 'accomp_date'),
array('db' => 'schedule_date', 'dt'=>'schedule_date'),
array('db' => 'diagnosis', 'dt'=>'diagnosis'),
array('db' => 'service_don', 'dt'=>'service_don'),
array('db' => 'recomm', 'dt'=>'recomm'),
array('db' => 'accomp_status', 'dt'=>'accomp_status'),
array('db' => 'withC', 'dt'=>'withC'),
array('db' => 'brand', 'dt'=>'brand'),
array('db' => 'model', 'dt'=>'model'),
array('db' => 'machine_name', 'dt'=>'machine_name'),
array('db' => 'rep_problem', 'dt'=>'rep_problem'),

);
 }
 else if(isset($_GET['db'])&& $_GET['db']==8){
	$primaryKey = 'contract_id';
	$isActive = 1;


	// DB table to use
$table = <<<EOT
(SELECT clients.client_id as clientId, clients.client_name, clients.client_address, contract.*, machine_type.machine_name from clients inner join contract on clients.client_id = contract.client_id
left join machine_type on contract.machine_type = machine_type.machine_id where contract.isActive = 1 AND contract.count > 0) temp
EOT;
// indexes
$columns = array(
array( 'db' => 'contract_id', 'dt' => 'contractId'),
array('db' => 'client_name', 'dt'=>'client_name'),
array('db' => 'client_address', 'dt'=>'client_address'),
array( 'db' => 'clientId', 'dt' => 'clientId'),
array( 'db' => 'machine_name', 'dt' => 'machine_name'),
array('db' => 'brand', 'dt'=>'brand'),
array('db' => 'model', 'dt'=>'model'),
array('db' => 'turn_over', 'dt'=>'turnover'),
array('db' => 'coverage', 'dt'=>'coverage'),
array('db' => 'pTurn_over', 'dt'=>'pTurn_over'),
array('db' => 'pCoverage', 'dt'=>'pCoverage'),
array('db' => 'status', 'dt'=>'status'),
array('db' => 'frequency', 'dt'=>'frequency'),
array('db' => 'count', 'dt'=>'count'),
array('db' => 'total', 'dt'=>'total'),
array('db' => 'sv_call', 'dt'=>'sv_call'),
array('db' => 'contract_id', 'dt'=>'contract_id'),


);
 }
 else if(isset($_GET['db'])&& $_GET['db']==9){
	$primaryKey = 'contract_id';
	$isActive = 1;


	// DB table to use
$table = <<<EOT
(SELECT clients.client_id as clientId, clients.client_name, clients.client_address, contract.*, machine_type.machine_name from clients inner join contract on clients.client_id = contract.client_id
left join machine_type on contract.machine_type = machine_type.machine_id where contract.isActive = 1 AND contract.count <= 0) temp
EOT;
// indexes
$columns = array(
array( 'db' => 'contract_id', 'dt' => 'contractId'),
array('db' => 'client_name', 'dt'=>'client_name'),
array('db' => 'client_address', 'dt'=>'client_address'),
array( 'db' => 'clientId', 'dt' => 'clientId'),
array( 'db' => 'machine_name', 'dt' => 'machine_name'),
array('db' => 'brand', 'dt'=>'brand'),
array('db' => 'model', 'dt'=>'model'),
array('db' => 'turn_over', 'dt'=>'turnover'),
array('db' => 'coverage', 'dt'=>'coverage'),
array('db' => 'pTurn_over', 'dt'=>'pTurn_over'),
array('db' => 'pCoverage', 'dt'=>'pCoverage'),
array('db' => 'status', 'dt'=>'status'),
array('db' => 'frequency', 'dt'=>'frequency'),
array('db' => 'count', 'dt'=>'count'),
array('db' => 'total', 'dt'=>'total'),
array('db' => 'sv_call', 'dt'=>'sv_call'),
array('db' => 'contract_id', 'dt'=>'contract_id'),


);
 }
 else if(isset($_GET['db'])&& $_GET['db']==10){
	$primaryKey = 'schedule_id';
	$isActive = 1;


	// DB table to use
$table = <<<EOT
(SELECT schedule.schedule_id, schedule.schedule_date, schedule.status, schedule.schedule_type, 
COALESCE(clients.client_address, service_call.guest_address) as address, 
CASE WHEN service_call.contract_id IS NOT NULL THEN COALESCE(contract.brand, service_call.brand) 
ELSE COALESCE(service_call.brand, contract.brand) END AS brand, CASE WHEN service_call.contract_id 
IS NOT NULL THEN COALESCE(contract.model, service_call.model) ELSE COALESCE(service_call.model, contract.model) END AS model,
 COALESCE(clients.client_name, CASE WHEN service_call.guest = 0 THEN service_call.guest_name END) AS client_name, service_call.rep_problem, machine_type.machine_name, 
 service_call.contract_id as sv_contract, contract.frequency, contract.contract_id, service_call.sv_id, contract.count, contract.total, contract.sv_call  FROM schedule
  LEFT JOIN service_call ON schedule.sv_id = service_call.sv_id 

  LEFT JOIN contract ON schedule.contract_id = contract.contract_id OR service_call.contract_id = contract.contract_id 
LEFT JOIN clients ON (contract.client_id = clients.client_id) OR (service_call.client_id = clients.client_id) 
LEFT JOIN machine_type on (contract.machine_type = machine_type.machine_id ) OR (service_call.machine_type = machine_type.machine_id)
WHERE schedule.status != 2) temp
EOT;
// indexes
$columns = array(
array( 'db' => 'schedule_id', 'dt' => 'schedule_id'),
array('db' => 'schedule_date', 'dt'=>'schedule_date'),
array('db' => 'status', 'dt'=>'status'),
array( 'db' => 'schedule_type', 'dt' => 'schedule_type'),
array( 'db' => 'address', 'dt' => 'address'),
array('db' => 'brand', 'dt'=>'brand'),
array('db' => 'model', 'dt'=>'model'),
array('db' => 'machine_name', 'dt'=>'machine_name'),
array('db' => 'client_name', 'dt'=>'client_name'),
array('db' => 'rep_problem', 'dt'=>'rep_problem'),
array('db' => 'sv_contract', 'dt'=>'sv_contract'),
array('db' => 'frequency', 'dt'=>'frequency'),
array('db' => 'contract_id', 'dt'=>'contract_id'),
array('db' => 'sv_id', 'dt'=>'sv_id'),
array('db' => 'count', 'dt'=>'count'),
array('db' => 'total', 'dt'=>'total'),
array('db' => 'sv_call', 'dt'=>'sv_call'),


);
 }
 else if(isset($_GET['db'])&& $_GET['db']==11){
	$primaryKey = 'report_id';
	$isActive = 1;


	// DB table to use
$table = <<<EOT
(SELECT report.*, CONCAT(users.firstname, ' ', users.lastname) as generatedBy from report LEFT JOIN users on report.generated_by = users.mem_id) temp
EOT;
// indexes
$columns = array(
array( 'db' => 'report_id', 'dt' => 'report_id'),
array('db' => 'location', 'dt'=>'location'),
array('db' => 'report_name', 'dt'=>'report_name'),
array('db' => 'report_date', 'dt'=>'report_date'),
array( 'db' => 'generated_by', 'dt' => 'generated_by'),
array( 'db' => 'generatedBy', 'dt' => 'generatedBy'),


);
 }
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);
 