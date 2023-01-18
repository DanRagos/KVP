<?php
require_once 'session.php';
	
//Display all Users
if (isset($_POST['action'])&& $_POST['action'] == 'display_users'){
	$output= '';
	$row = $cuser->showUsers($id);
	if($row) {
		$output .= '  <table id="table" class="table align-items-center justify-content-center" >
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type</th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                  </thead>
                  <tbody>';
	foreach($row as $row){
		$output .= ' <tr>
						<td>
                         <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets/img/small-logos/machine-1.svg" class="avatar avatar-sm me-3 border-radius-lg" alt="user2">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">'.$row['mem_id'].'</h6>
                            <p class="text-xs text-secondary mb-0">'.$row['firstname'].' '.$row['lastname'].'</p>
                          </div>
                        </div>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">'.$row['username'].'</p>
               
                      </td>
					    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">'.$row['type'].'</p>
                 
                      </td>
					  <td>
					   
					   <button type="button" id="'.$row['mem_id'].'"data-bs-target = "#editUser" data-bs-toggle="modal" class="btn btn-warning editUserbtn"><i class="material-icons">edit</i></button>
					   <button type="button" id="'.$row['mem_id'].'"  data-bs-toggle="modal"  class="btn btn-danger deleteBtn"><i class="material-icons">delete</i></button>
					  </td>
                    </tr>';
	}
	$output .='</tbody> </table>';
	echo $output;
	}
}
//Display All Schedules 
if (isset($_POST['action'])&& $_POST['action'] == 'display_schedule'){
$result = $client ->display_schedule();
$sched_res = [];
foreach($result as $row){
    $row['sdate'] = date("F d, Y",strtotime($row['schedule_date']));
    $row['edate'] =  date("F d, Y",strtotime($row['schedule_date']));
	switch($row['status']) 
	{case 0:
	$row['color'] = "Blue";
	$row['status'] = "Not done";
	break;
	case 1: 
	$row['color'] = "Red";
	$row['status'] = "Delayed";
	break;
	case 2:
	$row['color'] = "Green";
	$row['status'] = "Done";
	break;	
	case 3:
	$row['color'] = "Orange";
	$row['status'] = "Unresolved";
	break;
	}
    $sched_res[$row['schedule_id']] = $row;
}
echo json_encode($sched_res);
}
// Edit Client Details
if (isset($_POST['edit_client'])){
	$id = $_POST['edit_client'];
	$row = $client ->edit_clients($id);
	echo json_encode($row);
	
}
//Update Update Client Details
if (isset($_POST['action'])&& $_POST['action'] == 'update_client'){
	$id = $_POST['client_id'];
	$name = $_POST['client_name'];
	$address = $_POST['address'];
	$cPerson = $_POST['cPerson'];
	$email = $_POST['email'];
	$row = $client->update_client($id,$name,$address,$cPerson,$email);
	print_r($_POST);
}

//Display all Clients
if (isset($_POST['action'])&& $_POST['action'] == 'display_clients'){
	$output= '';
	$row = $client->showClients();
	if($row) {
		$output .= '  <table id="table" class="table align-items-center justify-content-center" >
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Client</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Contacts</th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                  </thead>
                  <tbody>';
	foreach($row as $row){
		$output .= ' <tr>
						<td>
                         <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../image/uploads/mv santiago.webp" class="avatar avatar-sm me-3 border-radius-lg" alt="user2">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
							<input type = "hidden" name="client_id" value="'.$row['client_id'].'">
                            <h6 class="mb-0 text-sm clientName" value='.$row['client_name'].'>'.$row['client_name'].'</h6>
                            <p class="text-xs text-secondary mb-0">'.$row['client_address'].'</p>
                          </div>
                        </div>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
						<h6 class="mb-0 text-sm">'.$row['contact_person'].'</h6>
                        <p class="text-xs font-weight-bold mb-0">'.$row['contact_email'].'</p>
               
                      </td>
					  <td>
					   <button type="button" id="'.$row['client_id'].'"data-bs-target = "#addContract" data-bs-toggle="modal" class="btn btn-primary addContractBtn" ><i class="material-icons">add</i></button>
					   <button type="button" id="'.$row['client_id'].'"data-bs-target = "#editClient" data-bs-toggle="modal" class="btn btn-warning editClientBtn"><i class="material-icons">edit</i></button>
					   <button type="button" id="'.$row['client_id'].'"  data-bs-toggle="modal"  class="btn btn-danger deleteBtn"><i class="material-icons">delete</i></button>
					  </td>
                    </tr>';
	}
	$output .='</tbody> </table>';
	echo $output;
	}
}
//Add Client  
if (isset($_POST['action'])&& $_POST['action'] == 'register_client'){
print_r($_POST); 
}
/*$title = $_POST['title'];
$start_date = $_POST['sched_date'];
$deadline_date = $_POST['dead_date'];
$result= $tool -> add_schedule ($title, $start_date, $deadline_date);
echo $result; */

//Add Contract to Clients
if (isset($_POST['action'])&& $_POST['action'] == 'add_contract'){
$count = 0;
$client_id = $_POST['id'];
$machine_type = $_POST['machine_type'];
$brand = $_POST['brand'];
$model = $_POST['model'];

$frequency = $_POST['frequency'];
$contract_type = $_POST['contract_type'];
$pms_count = $_POST['pms_count'];
$datefilter = $_POST['datefilter'];
$first_pms = $_POST['first_pms'];
$pms = $first_pms;

$string=$datefilter;
$last_space = strrpos($string, ' ');
$last_word = substr($string, $last_space);
$first_chunk = substr($string, 0, $last_space - 2);
$coverage = date('Y-m-d', strtotime($last_word));
$turn_over = date('Y-m-d', strtotime($first_chunk));

if ($frequency =="1"  ){$num = 3;}
elseif ($frequency =="2" ){$num = 6; }
elseif($frequency =="3" ){$num = 12;}
else {}
do {
		$pms = date('Y-m-d', strtotime("+$num months", strtotime($pms)));
		$count++;
} while($pms < $coverage);

$result = $client -> add_contract($client_id, $machine_type, $brand, $model,$frequency, $contract_type, $pms_count, $first_pms ,$turn_over, $coverage, $count );
echo $result;


print_r($_POST);
	/*$id = $_POST['add_id'];
	$row = $client ->add_contract($id);
	echo json_encode($row);*/
}

//Add Schedules 
if (isset($_POST['action'])&& $_POST['action'] == 'add_schedule'){
$title = $_POST['title'];
$start_date = $_POST['sched_date'];
$deadline_date = $_POST['dead_date'];
$result= $tool -> add_schedule ($title, $start_date, $deadline_date);
echo $result;
}

//Edit User Details
if (isset($_POST['edit_userid'])){
	$id = $_POST['edit_userid'];
	$row = $cuser->edit_user($id);
	echo json_encode($row);
}
//Update User Details
if (isset($_POST['action'])&& $_POST['action'] == 'update_user'){
	$id = $_POST['id'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$type = $_POST['type'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$row = $cuser ->update_user($firstname,$lastname,$email,$password, $type, $id);

}
// Display All Contracts
if (isset($_POST['action'])&& $_POST['action'] == 'display_contract'){
	$output= '';
	$result = $client ->displayContract();

	if($result) {
		$output .= '  <table id="contractTable" class="table align-items-center justify-content-center" >
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID/Client</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Machine</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Turnover - Coverage</th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Contract</th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Completion</th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No. SV Call</th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                  </thead>
                  <tbody>';
	foreach($result as $row){
		if ($row['frequency']==1) $frequency = 'Quarterly';
		else if ($row['frequency']==2) $frequency = 'Semi-Annualy';
		else $frequency = 'Annualy';
		if ($row['status']==1) $status = 'Installation Warranty';
		else  $status = 'PMS Contract';
		$count = ($row['count'] / $row['total'])*100;
		$output .= ' <tr>
						<td>
                         <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets/img/small-logos/machine-1.svg" class="avatar avatar-sm me-3 border-radius-lg" alt="user2">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">'.$row['client_id'].'</h6>
                            <p class="text-xs text-secondary mb-0">'.$row['client_name'].'</p>
                          </div>
                        </div>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <h6 class="mb-0 text-sm">'.$row['brand'].'/'.$row['model'].'</h6>
                        <p class="text-xs text-secondary mb-0">'.$row['machine_name'].'</p>
                      </td>
					    <td class="align-middle text-center text-sm">
                        <p class="badge badge-sm bg-gradient-success">'.date('M-d-Y',strtotime($row['turn_over'])).'/'.date('M-d-Y',strtotime($row['coverage'])).'</p>
                      </td>
					  <td class="align-middle text-center text-sm">
                        <h6 class="mb-0 text-sm">'.$frequency.'</h6>
                        <p class="text-xs text-secondary mb-0">'.$status.'</p>
                      </td>
					   <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">'.$count.'%'.'</p>
                      </td>
					  <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">'.$row['sv_call'].'</p>
                      </td>
					  <td>				
					   <button type="button" id="'.$row['contract_id'].'"data-bs-target = "#editUser" data-bs-toggle="modal" class="btn btn-warning editUserbtn"><i class="material-icons">edit</i></button>
					   <button type="button" id="'.$row['contract_id'].'"  data-bs-toggle="modal"  class="btn btn-danger deleteBtn"><i class="material-icons">delete</i></button>
					  </td>
                    </tr>';
	}
	$output .='</tbody> </table>';
	echo $output;
	}
}
// Edit Client Details

if (isset($_POST['user_id'])){
	$output ='';
	$id = $_POST['user_id'];
	$result = $client ->get_contract($id);
	$output .= '<option> Select </option> ';
	foreach($result as $row) {
		$output.=' <option value ="'.$row['contract_id'].'">'.$row['brand'].' '.$row['model'].'</option>';
	}
	echo $output;
	
}
if (isset($_POST['ctr'])){
	$id = $_POST['ctr'];
	$result = $client ->get_sv($id);
	
	echo ($result)? $result['sv_call']:'';
	
}
if (isset($_POST['action'])&& $_POST['action'] == 'add_sv'){
	print_r($_POST);

}


?>