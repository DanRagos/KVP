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
 (SELECT accomplished_schedule.id as accomp_id, schedule.*, COALESCE(contract.contract_id, service_call.sv_id) AS id, COALESCE(contract.brand, service_call.brand) as brand, COALESCE(contract.model, service_call.model) as model, COALESCE(clients.client_name, CASE WHEN service_call.guest = 0 THEN service_call.guest_name END) AS client_name,COALESCE(clients.client_address, service_call.guest_address) AS address, service_call.rep_problem, accomplished_schedule.accomp_date FROM schedule RIGHT JOIN contract ON (schedule.schedule_type = 1 AND schedule.contract_id = contract.contract_id) LEFT JOIN service_call ON (schedule.schedule_type = 2 AND schedule.sv_id = service_call.sv_id) LEFT JOIN clients ON (contract.client_id = clients.client_id) OR (service_call.client_id = clients.client_id) LEFT JOIN accomplished_schedule ON (schedule.schedule_id = accomplished_schedule.schedule_id) WHERE schedule.status IN (2, 3) ORDER BY schedule.schedule_id DESC ) temp
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
array( 'db' => 'address', 'dt' => 2,
'formatter' => function($d,$row){
return '
	<div class="d-flex flex-column justify-content-center">
	<h5 class="text-center text-xs text-secondary mb-0">'.$d.'</h5>
	</div>';
}),
array( 'db' => 'schedule_type',  'dt' => 3,
'formatter'=> function($d,$row){
$type = $d == 2 ? "SV" : "PMS";
$color = $row['schedule_type'] == 1 ? "primary" :  "success";
return '   <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-'.$color.'">'.$type.'</span>
                      </td>';
}),

array( 'db' => 'brand', 'dt' => 4,
'formatter' => function($d,$row){
return '
	<div class="d-flex flex-column justify-content-center">
	<h6 class="text-center text-uppercase text-xs text-secondary mb-0">'.$d.'</h6>
	</div>';
}),

array( 'db' => 'model', 'dt' => 5, 'formatter' => function($d,$row){
return '<align-middle text-center text-sm">
	<div class="align-middle text-center text-sm">
	<h6 class="text-xs text-uppercase text-secondary mb-0">'.$d.'</h6> </div>';}),
array( 'db' => 'rep_problem', 'dt' => 6,
'formatter'=> function($d,$row){
return '<div class ="align-middle text-center text-sm">'.$d.'</div>';}),
array(
'db'        => 'accomp_date',
'dt'        => 7,
'formatter' => function( $d, $row) {
return ($d!==null) ? '<td class ="align-middle text-center text-sm"  "'.strtotime($d).'">
<span class="badge badge-sm bg-gradient-info">'.date( 'M d, Y', strtotime($d)).'</span>
</td>':' ' ;}),

array(

'db'        => 'accomp_id',
'dt'        => 8,
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
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);
 