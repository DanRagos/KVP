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
	$row['color'] = "#033268";
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
	$row['title'] = $row['schedule_type'] == 1 ? 'PMS '.$row['client_name'] : 'SVC '.$row['client_name'];
    $sched_res[$row['schedule_id']] = $row;
}
echo json_encode($sched_res);
}
//show sched details
if (isset($_POST['action'])&& $_POST['action'] == 'show_sched_details'){
	$id = $_POST['id'];
	$result = $client->get_schedule($id);
	$output ='';
	$status = $result['status'] == 1 ? "Delayed" : ($result['status'] == 3 ? "Unresolved" : " ");
	$check_collection = $client->with_collection ($result['sv_contract']);
	$output.='  <div class="modal-header rounded-0">
                <h5 class="modal-title">Schedule Details</h5>
                </div>
                <div class="modal-body rounded-0">
                    <div class="container-fluid">
                        <dl> ';
						
						if ($check_collection && $check_collection['status'] == 2 && $check_collection['sv_call'] == 0){
							$output .= '  <dt class="text-danger">With Collection!</dt>';
						}
						else {
							
						}
						$output .='
                            <dt class="text-primary">ID / IMTE Name</dt>
                            <dd id="title" class="fw-bold fs-5">'.$result['client_name'].'</dd>
                            <dt class="text-primary">Brand / Model</dt>
                            <dd id="description" class="">'.$result['brand'].'/'.$result['model'].'</dd>
							<dt class="text-primary">Client Address</dt>
                            <dd id="address" class="">'.$result['address'].'</dd>
                            <dt class="text-primary">Schedule</dt>
                            <dd id="start" class="">'.$result['schedule_date'].'</dd>
							<dt class="text-primary">Status</dt>
                            <dd id="stats" class="">'.$status.'</dd>
							<dt class="text-primary">Problem</dt>
                            <dd id="" class="">'.$result['rep_problem'].'</dd>
                        </dl>
                    </div>
                </div>
                <div class="modal-footer rounded-0">
                    <div class="text-end">
                        <button type="button" class="btn btn-primary btn-sm rounded-0" data-id='.$id.' id="updateBtn" data-bs-target="#confirm-sched-modal" data-bs-toggle="modal" > Confirm</button>
                        <button type="button" class="btn btn-info btn-sm rounded-0 reschedBtn" data-id='.$id.' data-bs-target="#reschedModal" data-bs-toggle="modal">Re-Schedule</button>
                        ';
						if ($result['schedule_type'] == '2') {
						$output .= '	
						<button type="button" class="btn btn-danger btn-sm rounded-0 cancelSv" data-id="'.$id.'">Cancel</button> ';
						}
						$output.='
						<button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>';
	echo $output;
	
	
}
//Resched Btn
if (isset($_POST['resched_id'])){
$id = $_POST['resched_id'];
$result = $client->get_schedule($id);
$output ='';
if ($result) {
	$output .= '
	                <div class="modal-header rounded-0">
                    <h5 class="modal-title">Resched '.$result['client_name'].'</h5>
                </div>
                <div class="modal-body rounded-0">
                    <div class="container-fluid">
					  <form id="resched_form" action ="#" method="post" autocomplete="off">
					  <input type="hidden" name="schedule_id" value="'.$id.'">
                      <div class="row">
			<div class="col">
				<div class="input-group input-group-static mb-4">
					<label>Re-sched Date</label>
					<input type="date" class="form-control" name="schedule_date" value= "'.$result['schedule_date'].'" >
				</div>
			</div>
						</div>	
                    </div>
                </div>
                <div class="modal-footer rounded-0">
                    <div class="text-end">
                        <button type="button" class="btn btn-primary btn-sm rounded-0" data-id="'.$id.'" id="reschedConfirm"> Confirm</button>
                        <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-target="#schedule_details_modal" data-bs-toggle="modal">Back</button>
                    </div>
                </div>
				</form>
	';
	
}
	echo $output;
}
//Confirm Reschedule 
if (isset($_POST['action'])&& $_POST['action'] == 'confirm_resched'){
	$id = $_POST['schedule_id'];
	$schedule_date = $_POST['schedule_date'];
	$resched = $client ->reschedule($id, $schedule_date) ;
	echo $resched;
	
}
//Show Confirm Schedule Form
if (isset($_POST['sched_id'])){
$id = $_POST['sched_id'];
$result = $client->get_schedule($id);
$output ='';
if ($result) {
	$output .= '
	      <div class="modal-header">
	  <img src="../img/icon.jpg" class="img-fluid" style="width:10%;height:5%;padding-right:14px;" alt="...">
	
        <h6 class="modal-title ">Update details for '.$result['contract_id'].'</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  <div class="container">
	  <form id="confirm_form" action ="#" method="post" autocomplete="off">
         <div class="row">
  
    <div class="col">
      <div class="input-group input-group-static my-3">
        <label class="form-">Schedule Date</label>
        <input type="date" id="c_schedule" value = "'.$result['schedule_date'].'" name="c_schedule" class="form-control" readonly>
		<input type="hidden" name="schedule_type" value="'.$result['schedule_type'].'">
	   <input type="hidden" name="contract_id" value="'.$result['contract_id'].'">
	   <input type="hidden" name="sv_id" value="'.$result['sv_id'].'">
	   <input type="hidden" name="frequency" value="'.$result['frequency'].'">
      </div>
    </div>
		<div class="col">
      <div class="input-group input-group-static my-3">
        <label for="interval_date" class="ms-0">Service Date</label>
		<input type="hidden" value="'.$result['schedule_id'].'" name="schedule_id">
        <input type="date" name="s_date" id="s_date" class="form-control" required>
      </div>
    </div>
	
    <div class="col">
      <div class="input-group input-group-static my-3">
        <label class="form-">Reported Problem</label> ';
	$rep_problem = ($result['rep_problem'] == '')? '': $result['rep_problem'] ;
	$output .= '	
		 <input type="text" name="c_rep" id="c_rep"  value = "'.$rep_problem.'" class="form-control">
      </div>
    </div>
  </div>
  <div class="row">
  	<div class="col">
      <div class="input-group input-group-static my-3">
        <label class="form">Location:</label>
        <input type="text" name="c_loc" id="c_loc" value= "'.$result['address'].'" class="form-control"readonly>
      </div>
    </div>
  <div class="col">
      <div class="input-group input-group-static my-3">
        <label class="form">Diagnosis:</label>
        <input type="text" name="diagnosis" class="form-control">
      </div>
    </div>
	 <div class="col">
      <div class="input-group input-group-static my-3">
        <label class="form">Service Done:</label>
        <input type="text" name="c_done" class="form-control">
      </div>
    </div>

  </div>
  <div class="row">
	<div class="col">
      <div class="input-group input-group-static my-0">
        <label for="interval_date" class="ms-0">Status</label>
       <select class="form-control" id="interval_date" name="status" >
	    <option value=2>Resolved</option>
       <option value= 3>Unresolved</option>
     </select>
      </div>
    </div>
	 <div class="col">
      <div class="input-group input-group-static my-0">
        <label class="form">Recommendation</label>
        <input type="text" name="c_recom" class="form-control">
      </div>
    </div>
  </div>
  <div class="row">
	<div class="col">
      <div class="input-group input-group-static my-0">
        <label for="interval_date" class="ms-0">Service By:</label>
            <input type="text" name="c_sby"  class="form-control">
      </div>
    </div>
  </div>
  </div>
      </div>
      <div class="modal-footer">
	  <button type="submit" id="c_confirmBtn" name="c_button" class="btn btn-primary">Confirm</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
	  </form>
	  ';
	
}
	echo $output;
}
//Update Schedule Details
if (isset($_POST['action'])&& $_POST['action'] == 'update_sched'){
print_r($_POST);
$schedule_type = $_POST['schedule_type'];
$contract_id = $_POST['contract_id'];
$sv_id = $_POST['sv_id'];
$schedule_id = $_POST['schedule_id'];
$s_date = $_POST['s_date'];
$c_rep = $_POST['c_rep'];
$c_loc = $_POST['c_loc'];
$diagnosis = $_POST['diagnosis'];
$c_done = $_POST['c_done'];
$status = $_POST['status'];
$c_recom = $_POST['c_recom'];
$c_sby = $_POST['c_sby'];
$accomp = $client->accomplished_schedule($schedule_id, $s_date, $c_rep, $c_loc, $diagnosis, $c_done, $status, $c_recom, $c_sby);
$update_schedule = $client->update_schedule($schedule_id, $status);
if ($schedule_type == '1') {
	$frequency = $_POST['frequency'];
	$contract_det = $client->get_contract_details($contract_id);
	print_r($contract_det);
	$count = $contract_det['count'] + 1;
	print_r($count);
	$add_count= $client->add_pms_count($contract_id, $count);
	if ($contract_det['total']- $count > 0) {
	$add_pms_sched = $client->add_pms_sched ($contract_id, $frequency, $s_date);
	if ($add_pms_sched) {
		$remove_pms = "";
	}
}
else {
	$set_contract_expi = $client->expire_sched($contract_id);
}
	}

else {
	$check_sv_contract = $client->get_sv_details($sv_id);
	print_r($check_sv_contract);
	if ($check_sv_contract['contract_id'] > 0 ) {
	$contract_det = $client->get_contract_details($check_sv_contract['contract_id']);
	$count = $contract_det['sv_call'] > 0 ? $contract_det['sv_call'] - 1 : 0 ;
	$add_sv_count =  $client->add_sv_count($check_sv_contract['contract_id'], $count);
	
	}
	
}
echo 'Success';
}

//CancelSv
if (isset($_POST['del_id'])){
$id = $_POST['del_id'];
$result = $client->get_schedule($id);
$sv_call = $result['sv_id'];
$deleteSv = $client->delete_schedule($id);
$client->delete_svcall($sv_call);
echo true;


}

if (isset($_GET['action'])&& $_GET['action'] == 'display_schedule2'){
$result = $client ->display_schedule();
  header('Content-Type: application/json');
echo json_encode($result);
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
                            <img src="'.$row['imglink'].'" class="avatar avatar-sm me-3 border-radius-lg" alt="user2">
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
$type= 1;
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

$result = $client -> add_contract($client_id, $machine_type, $brand, $model,$frequency, $contract_type, $pms_count, $first_pms ,$turn_over, $coverage, $count, $type );
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
	$output = '';
	$id = $_POST['user_id'];
	$result = $client ->get_contract($id);
	$output .= ' <option value=" " selected ></option>';
	foreach($result as $row) {
		$output.= ' <option value ="'.$row['contract_id'].'">'.$row['brand'].' '.$row['model'].'</option>				
		';
	}
	echo $output;
}
if (isset($_POST['contract_id_1'])){
	$output = '';
	$id = $_POST['contract_id'];
	$result = $client ->get_contract($id);
	echo $result;
}
//
//
if (isset($_POST['ctr'])){
	$id = $_POST['ctr'];
	$result = $client ->get_sv($id);
	echo ($result)? $result['sv_call']:'';
	
}

//Add SV Call Client
if (isset($_POST['action'])&& $_POST['action'] == 'confirm_sched'){
	print_r($_POST);
	$client_id = $_POST['client_id'];
	$contract_id = $_POST['contract_id'];
	//SV TYPE : 1 if client, 2 if contract, 0 if guest
	$sv_type = 2;
	if ($_POST['pmsCheck'] == 0) {
	$sv_type = 1;	
	$machine_type = $_POST['machine_type'];
	$brand = $_POST['brand'];
	$model = $_POST['model'];
	}
	else {
	$result1= $client ->get_contract_details($contract_id);
	foreach($result1 as $row) {
	$machine_type = $row['machine_type'];
	$brand = $row['brand'];
	$model = $row['model'];
	}

	}
	$rep_problem = $_POST['rep_problem'];
	$sv_date = $_POST['sv_date'];
	$result = $client->add_sv_client($client_id, $sv_type, $contract_id, $machine_type, $brand, $model, $rep_problem, $sv_date);

}
//Add sv guest
if (isset($_POST['action'])&& $_POST['action'] == 'confirm_g_sched'){
	$gName = $_POST['gName'];
	$gAddress = $_POST['gAddress'];
	$machine_type = $_POST['machine_type'];
	$brand = $_POST['brand'];
	$model = $_POST['model'];
	$rep_problem = $_POST['rep_problem'];
    $sv_date = $_POST['sv_date'];
	$result = $client->add_sv_guest($gName, $gAddress, $machine_type, $brand, $model, $rep_problem, $sv_date);

}


if(isset($_FILES['picture']) && $_POST['action'] == 'add_client') {
	
    $picture = $_FILES['picture'];
	$upload_dir = "../image/uploads/"; // specify the directory where you want to upload the file
    $file_name = $picture['name'];
    $file_path = $upload_dir . $file_name;
	$allowed_pattern = '/^(CAL|VER)-\d{2}-\d{2}-\d/'; // pattern for the file name
    // Check if file is a PDF
    $allowed_types = array('image/jpeg');
    if(!in_array($picture['type'], $allowed_types)) {
         echo '<h5 class="danger">
				<strong class="font-weight-bolder mb-0 text-center text-danger">Invalid file type. Please upload .JPG File</strong>
		</h5>';
		exit();
    } else {
        // Check the file size
        if ($picture['size'] > 5242880) { // 1MB in bytes
           
		   echo '<h5 class="danger">
				<strong class="font-weight-bolder mb-0 text-center text-danger">File is exceeded to 5MB</strong>
		</h5>';
		exit();

        } 

		else {/*
			if ($tool->check_filename($file_name)) {
					 echo '<h5 class="danger">
				<strong class="font-weight-bolder mb-0 text-center text-danger">File name is already in used</strong>
		</h5>';
			exit();
			} */
            // File is a valid PDF and within size limit, do something with it
            // ...
      
    if (move_uploaded_file($picture['tmp_name'], $file_path)) {
        // File is uploaded successfully, save the file path and name in the database
        // perform database insertion here using the $remark_id, $file_name, and $file_path variables
		$client_name = $_POST['client_name'];
		$client_address = $_POST['client_address'];
		$contact_person = $_POST['contact_person'];
		$contact_email = $_POST['email'];
		$img_link = $file_path;
		
		$register_client = $client->register_client($client_name,$client_address, $contact_person,$contact_email, $img_link);
		
		
	
        echo "Valid file";
    } else {
         echo '<h5 class="danger">
				<strong class="font-weight-bolder mb-0 text-center text-danger">Error! Please try again</strong>
		</h5>';
    }
        }
    }



}

?>