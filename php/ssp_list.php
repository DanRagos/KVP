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
 (SELECT accomplished_schedule.id as accomp_id, schedule.*, COALESCE(contract.contract_id, service_call.sv_id) AS id, COALESCE(contract.brand, service_call.brand) as brand, COALESCE(contract.model, service_call.model) as model, COALESCE(clients.client_name, CASE WHEN service_call.guest = 0 THEN service_call.guest_name END) AS client_name,COALESCE(clients.client_address, service_call.guest_address) AS address, service_call.rep_problem, accomplished_schedule.accomp_date FROM schedule LEFT JOIN contract ON (schedule.schedule_type = 1 AND schedule.contract_id = contract.contract_id) LEFT JOIN service_call ON (schedule.schedule_type = 2 AND schedule.sv_id = service_call.sv_id) LEFT JOIN clients ON (contract.client_id = clients.client_id) OR (service_call.client_id = clients.client_id) LEFT JOIN accomplished_schedule ON (schedule.schedule_id = accomplished_schedule.schedule_id) WHERE schedule.status IN (2, 3) ORDER BY schedule.schedule_id DESC ) temp
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
$primaryKey = 'id';
	 // DB table to use
$table = <<<EOT
 (Select masterlist.id, masterlist.name, masterlist.type, masterlist.model,masterlist.serial, masterlist.manufacturer,masterlist.location,masterlist.owner,masterlist.interval_date,masterlist.instruct_reference, masterlist.obsolete_date from masterlist where masterlist.tool_stats = 0 ) temp
 EOT;
// indexes
$columns = array(
array( 'db' => 'name', 'dt' => 0,
'formatter' => function($d,$row){
return '<div class="d-flex px-2 py-1">
	<div>
	<img src="../assets/img/small-logos/machine-1.svg" class="avatar avatar-sm me-3 border-radius-lg" alt="user2">
	</div>
	<div class="d-flex flex-column justify-content-center">
	<h6 class="mb-0 text-sm">'.$row['id'].'</h6>
	<p class="text-xs text-secondary mb-0">'.$d.'</p>
	</div>';
}),
array( 'db' => 'id',  'dt' => '1',
),
array( 'db' => 'serial',  'dt' => '1' ),
array( 'db' => 'type',  'dt' => 1,
'formatter'=> function($d,$row){
	$type = $d == 2 ? "CAL" : ($d == 3 ? "NoCAL" : "VER");
$color = $row['type'] == 2 ? "primary" : ($row['type']==3? "secondary" : "success");
return '   <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-'.$color.'">'.$type.'</span>
                      </td>';
}),
array( 'db' => 'model', 'dt' => 2, 'formatter' => function($d,$row){
return '<align-middle text-center text-sm">
	<div class="align-middle text-center text-sm">
	<h6 class="mb-0 text-sm">'.$d.'</h6>
	<p class="text-xs text-secondary mb-0">'.$row['serial'].'</p> </div>';}),
array( 'db' => 'manufacturer', 'dt' => 3,
'formatter'=> function($d,$row){
return '<div class ="align-middle text-center text-sm">'.$d.'</div>';}),
array( 'db' => 'location', 'dt' => 4,
'formatter'=> function($d,$row){
return '<div class ="align-middle text-center text-sm">'.$d.'</div>';}),
array( 'db' => 'owner', 'dt' => 5,
'formatter'=> function($d,$row){
return '<div class ="align-middle text-center text-sm">'.$d.'</div>';}),
array( 'db' => 'interval_date', 'dt' => 6,
'formatter'=> function($d,$row){
return '<div class ="align-middle text-center text-sm">'.$d.'Y'.'</div>';}),
array( 'db' => 'instruct_reference', 'dt' => 7,
'formatter'=> function($d,$row){
return '<div class ="align-middle text-center text-sm">'.$d.'</div>';}),
array(
'db'        => 'obsolete_date',
'dt'        => 8,
'formatter' => function( $d, $row) {
return ($d!==null) ? '<div class ="align-middle text-center text-sm">
<span class="badge badge-sm bg-gradient-info">'.date( 'M d, Y', strtotime($d)).'</span>
</div>':' ' ;}),
array(

'db'        => 'id',
'dt'        => 9,
'formatter' => function( $d, $row) {
if ($row['obsolete_date']<= date('Y-m-t')){
return
'<div class ="align-middle text-center text-sm">
   <span class="data-bs-toggle="tooltip" data-bs-placement="top" title="Restore"> <button type="button" data-id="'.$row['id'].'"  class="btn btn-success restoreBtn"><i class="fa-solid fa-check"></i></span></button>
</div>';
}
else {
return 
	'<div class ="align-middle text-center text-sm">
<span class="data-bs-toggle="tooltip" data-bs-placement="top" title="Edit tool details"> <button type="button" id="'.$row['id'].'"data-bs-target = "#editTool" data-bs-toggle="modal" class="btn btn-warning editBtn"><i class="fa-solid fa-edit"></i></span></button>
<span class="data-bs-toggle="tooltip" data-bs-placement="top" title="Mark as obsolete"> <button type="button" data-id="'.$row['id'].'"  class="btn btn-danger deleteBtn"><i class="fa-solid fa-trash"></i></span></button>	
</div>';
}
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
 