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
                      <th class="text-center-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
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
                            <img src="'.$row['imglink'].'" class="avatar avatar-sm me-3 border-radius-lg" alt="user2">
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
					  <td class="align-middle text-center text-sm">
					   
					   <button type="button" id="'.$row['mem_id'].'"data-bs-target = "#editUser" data-bs-toggle="modal" class="btn btn-warning editUserbtn"><i class="material-icons">edit</i></button>
					   <button type="button" data-id="'.$row['mem_id'].'"  data-bs-toggle="modal"  class="btn btn-danger deleteBtn"><i class="material-icons">delete</i></button>
					  </td>
                    </tr>';
	}
	$output .='</tbody> </table>';
	echo $output;
	}
}
//Display All Schedules 
if (isset($_POST['action'])&& $_POST['action'] == 'display_schedule'){

if(isset($_POST['user_idNotif'])) {
	$result = $client ->display_schedule_user($_POST['user_idNotif']);
}
else {
	$result = $client ->display_schedule();
}

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

if (isset($_GET['action'])&& $_GET['action'] == 'display_schedule_table'){
	$user_id = $_GET['user_id'];
	$result = $client->display_schedule_user($user_id);
	$output ='';
	$output .='
	<table id="tableCalendarData" class="table-responsive">
        <thead>
            <tr>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Schedule No. </th>
					  <th class="text-center text-uppercase text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Client Name</th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Brand / Model</th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type</th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Schedule Date</th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Reported Problem</th>
					  
					
            </tr>
        </thead>
 
    <tbody>';
foreach($result as $row) {
	$type=($row['schedule_type']==1)? "PMS" : "SV";
	$color = $row['schedule_type'] == 1 ? "primary" :  "success";
	$output .= '
		<tr>
		<td> <div class="d-flex px-2 py-1">
	<div class="d-flex flex-column justify-content-center">
	<h6 class="text-center mb-0 text-sm">'.$row['schedule_id'].'</h6>
	</div>
		</td>
		<td> <div class="d-flex flex-column justify-content-center">
	<h5 class="text-center text-xs text-secondary mb-0">'.$row['client_name'].'</h5>
	</div>
		</td>
		<td> <div class="d-flex flex-column justify-content-center">
	<h5 class="text-center text-xs text-secondary mb-0">'.$row['brand'].' / '.$row['model'].'</h5>
	</div>
		</td>
		<td> <div class="d-flex flex-column justify-content-center">
	<h5 class="badge badge-sm bg-gradient-'.$color.'">'.$type.'</h5>
	</div>
		</td>
			<td> <div class="d-flex flex-column justify-content-center">
	<h5 class="badge badge-sm bg-gradient-info text-center mb-0">'.date('M-d-Y',strtotime($row['schedule_date'])).'</h5>
	</div>
		</td>
		<td> <div class="d-flex flex-column justify-content-center">
	<h5 class="text-center text-xs text-secondary mb-0">'.$row['rep_problem'].'</h5>
	</div>
		</td>
		</tr>
	';
}
$output .='</tbody></table>';
	echo $output;
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
                         ';
						
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
	echo "'".$resched."'";
	
}
//Show Confirm Schedule Form
if (isset($_POST['sched_id'])&& $_POST['action']=='updateSchedule'){
$id = $_POST['sched_id'];
$result = $client->get_schedule($id);
$service_by = $client->getServiceBy($id);
	$mem_arr = [];
	foreach ($service_by as $user) {
		array_push($mem_arr, intval($user['mem_id']));
	}
$output ='';
if ($result) {
	$output .= '
	      <div class="modal-header">
	  <img src="../img/icon.jpg" class="img-fluid" style="width:10%;height:5%;padding-right:14px;" alt="...">
	
        <h6 class="modal-title ">Update details for '.$result['client_name'].'</h6>
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
  <div class="row"> ';
  if ($result['sv_id'] != '0') {
	  $output .= '
	<div class="col">
      <div class="input-group input-group-static my-0">
        <label for="interval_date" class="ms-0">Status</label>
       <select class="form-control" id="interval_date" name="status" >
	    <option value="2">Resolved</option>
       <option value="3">Unresolved</option>
     </select>
      </div>
    </div> ';
  }
  else {
	  $output .= '<input type="hidden" name="status" value="2">';
  }
 
	$output .='
	 <div class="col">
      <div class="input-group input-group-static my-0">
        <label class="form">Recommendation</label>
        <input type="text" name="c_recom" class="form-control">
      </div>
    </div>
  </div>
  <div class="row">
	<div class="col">
      <div class="input-group input-group-static mt-4">
        <label for="interval_date" class="ms-0">Service By:</label>
		<div  class="form-control p-0 ml-1 sample-select-update" id="serviceByDiv" name="service_by_con" data-array-value="'.json_encode( $mem_arr).'"></div>  
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
$s_by = explode(",", $_POST['service_by_con']);
$withC = 0;
if ($schedule_type == '1') {
	$frequency = $_POST['frequency'];
	$contract_det = $client->get_contract_details($contract_id);
	print_r($contract_det);
	$add_count= $client->add_pms_count_1($contract_id);
	if ($contract_det['count'] - 1 > 0) {
	$add_pms_sched = $client->add_pms_sched ($contract_id, $frequency, $s_date);
	if ($add_pms_sched) {
		$remove_pms = "";
	}
}
else {
	
}
	}

else {
	$check_sv_contract = $client->get_sv_details($sv_id);
	if ($check_sv_contract['contract_id'] > 0 ) {
	$contract_det = $client->get_contract_details($check_sv_contract['contract_id']);
	$count = $contract_det['sv_call'] > 0 ? $contract_det['sv_call'] - 1 : 0 ;
	$add_sv_count =  $client->add_sv_count($check_sv_contract['contract_id'], $count);
	$withC =  $contract_det['sv_call'] > 0 ? 0 : 1;	
	}
	

}

$accomp = $client->accomplished_schedule($schedule_id, $s_date, $c_rep, $c_loc, $diagnosis, $c_done, $status, $c_recom, $withC);
$update_schedule = $client->update_schedule($schedule_id, $status);
$notif_content = 'Your schedule no:#'.$schedule_id.' has been verified';
$notif_title = 'Schedule Service Done';
$notif_id = $client->add_user_notification($notif_title, $notif_content,  0 , date('Y-m-d h:i:s'), 1, $schedule_id);
foreach ($s_by as $user) {
$check = $client->check_user_service($user, $schedule_id);
	if (!$check) {
		$client->add_user_service($user, $schedule_id, 1);
		echo 'check';

	}
	$client->user_notification($user, $notif_id);	
	$client->user_sched_status($user, $schedule_id);


}

// echo 'Success';
print_r($_POST);
print_r($s_by);
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
		$output .= '  <table id="table" class="table align-items-center justify-content-center" style= "width:100%;" >
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
					   <button type="button" id="'.$row['client_id'].'"data-bs-target = "#addContract" data-bs-toggle="modal" class="btn btn-primary no_margin addContractBtn" ><i class="material-icons">add</i></button>
					   <button type="button" id="'.$row['client_id'].'"data-bs-target = "#editClient" data-bs-toggle="modal" class="btn btn-warning no_margin editClientBtn"><i class="material-icons">edit</i></button>
					   <span class="data-bs-toggle="tooltip" data-bs-placement="top" title="View Profile"> <button type="button" data-id="'.$row['client_id'].'" class="btn btn-secondary no_margin viewProfile"><i class="fa-solid fa-eye"></i></span></button>
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

if (isset($_GET['action'])&& $_GET['action'] == 'del_Contract'){
	$contract_id = $_GET['contract_id'];
	$del_contract = $client->delete_contract($contract_id);
	return $del_contract;
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
if (isset($_POST['action'])&& $_POST['action']=='isClient'){
	$output = '';
	$id = $_POST['client_id'];
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
//SV TYPE : 1 if client, 2 if contract, 0 if guest
if (isset($_POST['action'])&& $_POST['action'] == 'confirm_sched'){
	print_r($_POST);

	$client_id = $_POST['client_id'];
	$contract_id = $_POST['contract_id'];
	
	$sv_type = 2;
	if ($_POST['pmsCheck'] == 0) {
	$sv_type = 1;	
	$machine_type = $_POST['machine_type'];
	$brand = $_POST['brand'];
	$model = $_POST['model'];
	}
	else {
	$result1= $client ->get_contract_details($contract_id);
	$machine_type = $result1['machine_type'];
	$brand = $result1['brand'];
	$model = $result1['model'];
	}
	
	$rep_problem = $_POST['rep_problem'];
	$sv_date = $_POST['sv_date'];
	$last_id = $client->add_sv_client($client_id, $sv_type, $contract_id, $machine_type, $brand, $model, $rep_problem, $sv_date);
	$sched_Date = date('M d, Y', strtotime($sv_date));
	$service_by = explode("," , $_POST['service_by']); 
	$notif_title = "Service Assigned";
	$notif_content = "You have been asigned for schedule no.#$last_id at $sched_Date";
	$notif_createdAt= date('Y-m-d h:i:s');
	//Add Notification
	$last_notif= $client->add_user_notification($notif_title, $notif_content,  0 , $notif_createdAt, 1 , $last_id);
	foreach ($service_by as $row){
		//insert user_sched
		$client->add_user_service ($row, $last_id, 0);
		//inser user notification
		$client->user_notification($row, $last_notif);
	}

}
//Add sv guest
if (isset($_POST['action'])&& $_POST['action'] == 'confirm_g_sched'){
	print_r($_POST);
	$gName = $_POST[0]['value'];
	$gAddress = $_POST[1]['value'];
	$machine_type = $_POST[2]['value'];
	$brand = $_POST[3]['value'];
	$model = $_POST[4]['value'];
	$rep_problem = $_POST[5]['value'];
    $sv_date = $_POST[6]['value'];
	$last_id = $client->add_sv_guest($gName, $gAddress, $machine_type, $brand, $model, $rep_problem, $sv_date);

	$sched_Date = date('M d, Y', strtotime($sv_date));
	$service_by = $_POST['service_by1'];
	$notif_title = "Service Assigned";
	$notif_content = "You have been asigned for schedule no.#$last_id at $sched_Date";
	$notif_createdAt= date('Y-m-d h:i:s');
	//Add Notification
	$last_notif= $client->add_user_notification($notif_title, $notif_content,  0 , $notif_createdAt, 1 , $last_id);
	foreach ($service_by as $row){
		//insert user_sched
		$client->add_user_service ($row, $last_id, 0);
		//inser user notification
		$client->user_notification($row, $last_notif);
	}

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
        echo "Valid";
    } else {
         echo '<h5 class="danger">
				<strong class="font-weight-bolder mb-0 text-center text-danger">Error! Please try again</strong>
		</h5>';
    }
        }
    }




}

//View PDF Report PMS
if (isset($_GET['action'])&& $_GET['action'] == 'view_report'){
	$accomp_id = $_GET['accomp_id'];
	$result = $client->get_pms_report($accomp_id);
	header("Content-Type: application/json");
	echo json_encode ($result);
}

if (isset($_POST['formDataArray'])){
	$formDataArray = json_decode($_POST['formDataArray'], true);
	$last_sched = $client->last_pm($_POST['contract_id']);
	$delete_sched = $client->delete_last($last_sched['schedule_id']);
	$last_serv_date = null;
	$frequency = $_POST['frequency'];
// Loop through each item in the $formDataArray and insert it into the database
foreach ($formDataArray as $formData) {
	
    // Ensure all the required fields are present in the formData
    if (
        isset($formData['sched_date']) &&
        isset($formData['serv_date']) &&
        isset($formData['diagnosis']) &&
        isset($formData['recomm']) &&
        isset($formData['service_done']) &&
        isset($formData['service_by'])
    ) {
		
        $sched_date = $formData['sched_date'];
        $contract_id = $_POST['contract_id']; // Assuming you have the contract_id from somewhere else
         // Assuming you have the frequency from somewhere else

        // Call the add_pms_sched function to insert the data into the database
        $last_Id =$client-> add_pms_bulk($contract_id, $sched_date, 2);
		$accomp = $client->accomplished_schedule($last_Id, $formData['serv_date'], ' ', ' ', $formData['diagnosis'], $formData['service_done'],'2', $formData['recomm'], 0);
			$notif_content = 'Your schedule no:#'.$last_Id.' has been verified';
			$notif_title = 'Schedule Service Done';
			$notif_id = $client->add_user_notification($notif_title, $notif_content,  0 , date('Y-m-d h:i:s'), 1, $last_Id);
		foreach ($formData['service_by'] as $user) {
		$client->add_user_service($user, $last_Id, 1);
		$client->user_notification($user, $notif_id);
		echo ($user);
		}
		$client->add_pms_count_1($contract_id);
		$last_serv_date = $formData['serv_date'];
    }
}
//Check if the contract still have pms. if there is still have pms, create a schedue
$check_pms = $client->check_pms($contract_id);
$months  = ($frequency == '1') ? 3 : ($frequency == '2' ? 6 : 12);
	$new_date = date('Y-m-d', strtotime("+$months month", strtotime($last_serv_date)));
if ($check_pms){
	$client->add_pms_bulk($contract_id, $new_date, 0);
}
echo true;
	
}


//Display Contracts
if (isset($_GET['action'])&& $_GET['action'] == 'displayContracts'){
	$client_id = $_GET['client_id'];
	$isActive = $_GET['isActive'];
	$results = $client -> get_contracts($client_id, $isActive);
	$output = '';
    $output .= '<div class="table-responsive" > <table class="table table-light table-striped table-hover">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ">Machine </th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Turnover - Coverage</th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type</th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Completion</th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No. of SV Call</th>
					   <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                  </thead>
                  <tbody> ';
	foreach($results as $row){
		if ($row['frequency']==1) $frequency = 'Quarterly';
		else if ($row['frequency']==2) $frequency = 'Semi-Annualy';
		else $frequency = 'Annualy';
		if ($row['status']==1) $status = 'Installation Warranty';
		else  $status = 'PMS Contract';
		$count = 100 - (($row['count'] / $row['total'])*100) ;
		$output .= ' <tr class="table-row load-accordion">
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
                        <p class="text-xs font-weight-bold mb-0">'.number_format($count).'%'.'</p>
                      </td>
					  <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">'.$row['sv_call'].'</p>
                      </td>
					  <td class="text-center">				
						<button type="button" data-id="'.$row['contract_id'].'"class="btn btn-success no_margin accordion-btn"> <i id="dropToggle_' . $row['contract_id'] . '" class="fa-solid fa-sort-down"></i></button>
		 <span class="data-bs-toggle="tooltip" data-bs-placement="top" title="View Contract Report"> <button type="button" data-id="'.$row['contract_id'].'" class="btn btn-secondary no_margin viewContractReport "><i class="fa-solid fa-eye"></i></span></button>
		 <span class="data-bs-toggle="tooltip" data-bs-placement="top" title="Add PMS"> <button type="button" data-id="'.$row['contract_id'].'" data-bs-toggle="modal" data-bs-target = "#exampleModal" data-id="'.$row['contract_id'].'" data-sv="'.$row['count'].'" data-frequency = "'.$row['frequency'].'" class="btn btn-primary no_margin addPms "><i class="fa-solid fa-add"></i></span></button>
		 <span class="data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Contract"> <button type="button" data-bs-toggle="modal" data-bs-target = "#editContractModal" data-id="'.$row['contract_id'].'" class="btn btn-warning no_margin editContract "><i class="fa-solid fa-edit"></i></span></button>
		 <span class="data-bs-toggle="tooltip" data-bs-placement="top" title="Delete/Cancel Contract"> <button type="button" data-id="'.$row['contract_id'].'" class="btn btn-danger no_margin delContract "><i class="fa-solid fa-trash"></i></span></button>

					   </td>
                    </tr>
					<tr class="accordion-content">
                      <td colspan="6">
                        <div class="card">
                          <div class="card-body">
                            <div class="accordion-placeholder"></div>
                          </div>
                        </div>
                      </td>
                    </tr>
					';
	}
	$output .='</tbody> </table> </div>';			  
				  
				  
				  


    echo $output;
}

if (isset($_GET['action'])&& $_GET['action'] == 'displayExpContracts'){
	$client_id = $_GET['client_id'];
	$isActive = $_GET['isActive'];
	$results = $client -> get_exp_contracts($client_id, $isActive);
	$output = '';
    $output .= '<div class="table-responsive" > <table class="table table-light table-striped table-hover">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ">Machine </th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Turnover - Coverage</th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type</th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Completion</th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No. of SV Call</th>
					   <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                  </thead>
                  <tbody> ';
	foreach($results as $row){
		if ($row['frequency']==1) $frequency = 'Quarterly';
		else if ($row['frequency']==2) $frequency = 'Semi-Annualy';
		else $frequency = 'Annualy';
		if ($row['status']==1) $status = 'Installation Warranty';
		else  $status = 'PMS Contract';
		$count = 100 - (($row['count'] / $row['total'])*100) ;
		$output .= ' <tr class="table-row load-accordion">
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
					  <td class="text-center">				
						<button type="button" data-id="'.$row['contract_id'].'"class="btn btn-success no_margin accordion-btn"> <i id="dropToggle_' . $row['contract_id'] . '" class="fa-solid fa-sort-down"></i></button>
		 <span class="data-bs-toggle="tooltip" data-bs-placement="top" title="View Contract Report"> <button type="button" data-id="'.$row['contract_id'].'" class="btn btn-secondary no_margin viewContractReport "><i class="fa-solid fa-eye"></i></span></button>
					   </td>
                    </tr>
					<tr class="accordion-content">
                      <td colspan="6">
                        <div class="card">
                          <div class="card-body">
                            <div class="accordion-placeholder"></div>
                          </div>
                        </div>
                      </td>
                    </tr>
					';
	}
	$output .='</tbody> </table> </div>';			  
				  
				  
				  


    echo $output;
}

if (isset($_GET['action'])&& $_GET['action'] == 'last_pm'){
	$contract_id = $_GET['contract_no'];
	echo json_encode($client->last_pm($contract_id));
}
if (isset($_GET['action'])&& $_GET['action'] == 'editContract'){
	$contract_id = $_GET['contract_id'];
	$result = $client->get_contract_details($contract_id);
	$output = '';
	$output .= '<div class="modal-header">
	<img src="../img/line_jpg.jpg" class="img-fluid" style="width:25%;height:15%;padding-right:14px;" alt="...">
	  <h5 class="modal-title ">Edit Contract</h5>
	  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	</div>
	<div class="modal-body">
	<div class="container">
	<form action="#" method="POST" id="edit-contract-form" autocomplete="off">
	<input type="hidden" name="contract_id" value = '.$result['contract_id'].'>
	<input type="hidden" name="cType" value = '.$result['status'].'>
	<input type="hidden" name="frequency" value = '.$result['frequency'].'>
	<input type="hidden" name="count" value = '.$result['count'].'>
	<input type="hidden" name="total" value = '.$result['total'].'>
	<input type="hidden" name="coverage" value = '.$result['coverage'].'>
   <div class="row">
	 <div class="col">
	<div class="input-group input-group-static mb-4">
	  <label class="form-">Brand :</label>
	  <input type="text" name="brand" class="form-control" required value='.$result['brand'].'>
	</div>
  </div>
  <div class="col">
	<div class="input-group input-group-static mb-4">
	  <label class="form-">Model :</label>
	  <input type="text"  name="model" class="form-control" required value='.$result['model'].'> 
	</div>
  </div>
  
   </div>
<div class="row">
	  <div class="col">
	<div class="input-group input-group-static mb-4">
	  <label class="form-">Turn Over</label>
	  <input type="input" class="form-control"name="turn_over" readonly value='.date('m/d/Y', strtotime($result['turn_over'])).'>
	</div>
  </div>
  <div class="col">
  <div class="input-group input-group-static mb-4">
	<label class="form-">Coverage:</label>
	<input type="date" class="form-control"name="coverage_input" required value='.$result['coverage'].' min = '.$result['coverage'].'>
  </div>
</div>
</div>';
if ($result['status'] != '1') {
$output .='  <div class="row">
<div class="col">
<div class="input-group input-group-outline is-filled" >
<label class="form-label">PMS Count:</label>
<input type="number" min=1 name="pms_count"  value = '.$result['sv_call'].' class="form-control" required>
</div>
</div></div>';
}
  $output .= '
 </div>

</div>
	</div>
	<div class="modal-footer">
	<button type="submit" class="btn btn-primary" data-id="'.$contract_id.'" id="edit-contract-btn" >Confirm</button>
	  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	  
	</div>
	</form>';

echo $output;
}
if (isset($_GET['action']) && $_GET['action'] == 'getAccordionContent') {
    $contract_id = $_GET['dataId'];
	$status = '';
	$result = $client->viewPmsContract($contract_id,$status);
	$output = '';
			
    // Generate the accordion content based on the rowData
// Generate the accordion content based on the rowData
$output .= '<div class="table-responsive" >
        <table id="" class="table testTable table-hover" style="width:100%;">
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                    <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Schedule Date</th>
                    <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Accomplished Date</th>
					 <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                </tr>
            </thead>
            <tbody  class="align-middle ">';
foreach ($result as $row) {
	if ($row['accomp_date']) {
		$status = 'DONE';
		$status_style='success';
		$accomp_date = date('M-d-Y',strtotime($row['accomp_date']));
		
	}
	else {
		$status = 'NOT DONE';
		$status_style='danger';
		$accomp_date = '';
	}
	
    $output .= '
                <tr>
                    <td >' . $row['sched_id'] . '</td>
                    <td class="text-sm font-weight-bolder text-primary">' .date('M-d-Y',strtotime($row['schedule_date'])). '</td>
                    <td class="text-sm font-weight-bolder text-success">' .$accomp_date . '</td>
					  <td class="text-sm font-weight-bolder text-'.$status_style.'">' .$status.'</td>
					  <td class="align-middle text-center text-sm">';
					  
					  if ($row['accomp_date']) {
					  $output .= '
                                   
                        <span class="data-bs-toggle="tooltip" data-bs-placement="top" title="View MMR Report">
                            <button type="button" data-id="' . $row['id'] . '"  class="btn btn-secondary no_margin viewContractPmReport ">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                        </span> ';
					  }
                        $output .='<span class="data-bs-toggle="tooltip" data-bs-placement="top" title="Edit PM Details">
                            <button data-bs-toggle = "modal" data-bs-target="#edit-pm-modal" type="button" data-id="' . $row['id'] . '" class="btn btn-warning no_margin editPm ">
                                <i class="fa-solid fa-edit"></i>
                            </button>
                        </span>
                        
                    </td>
                </tr>';
}
$output .= '
            </tbody>
        </table>
</div>
';


    echo $output;
	
	
}
if(isset($_POST['viewContracts'])) {
	echo 'ho';
}

if (isset($_GET['action']) && $_GET['action'] == 'viewSummaryDashboard') {
$client_id = $_GET['client_id'];


$response = array(
 'serviceSched' =>  $client->countSchedule ($client_id),
  'pmSched' => $client->countPMS ($client_id)['pmsSched'],
   'svSched' =>  $client->countSV ($client_id)['svSched'],
 
);
echo json_encode($response);


}

if (isset($_GET['action'])&& $_GET['action'] == 'getServiceBy'){
	$users = $client->showUsers();
	header('Content-Type: application/json');
	echo json_encode($users);

}


if (isset($_GET['action'])&& $_GET['action'] == 'edit_pm_details'){
	$accomp_id = $_GET['accomp_id'];
	$result = $client->get_pms_report($accomp_id); 
	$service_by = $client->getServiceBy($result['schedule_id']);
	$mem_arr = [];
	foreach ($service_by as $user) {
		array_push($mem_arr, intval($user['mem_id']));
	}

	$output ='';
	$output .= '
	<div class="modal-header">
	<img src="../img/line_jpg.jpg" class="img-fluid" style="width:25%;height:15%;padding-right:14px;" alt="...">
	  <h5 class="modal-title " id="title"></h5>
	  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	</div>
	<div class="modal-body">
	<form id="update_pm_form" autocomplete="off">
	<div class="row ">   
                 <div class="col">   
				 <input type="hidden" name="sched_id" value="'.$result['schedule_id'].'" hidden>
				 <input type="hidden" name="accomp_id" value="'.$accomp_id.'" hidden>
                 <div class="input-group input-group-outline my-3 is-filled">   
                 <label class="form-label">Schedule Date</label>   
                 <input type="date" class="form-control" name="sched_date" value="'.$result['schedule_date'].'" readonly>   
                 </div>   
                 </div>   
                 <div class="col">   
                 <div class="input-group input-group-outline my-3 is-filled">   
                 <label class="form-label">Service Date</label>   
                 <input type="date" class="form-control" value="'.$result['accomp_date'].'" name="serv_date" required>   
                 </div>   
                 </div>    
                 <div class="col">   
                 <div class="input-group input-group-outline my-3 is-filled">   
                 <label class="form-label">Diagnosis:</label>   
                 <input class="form-control" type="text" name="diagnosis" value="'.$result['diagnosis'].'">   
                 </div>   
                 </div>   
                 <div class="row align-items-center">   
                 <div class="col">   
                 <div class="input-group input-group-outline my-3 is-filled">   
                 <label class="form-label">Service Done</label>   
                 <input type="text" class="form-control" name="service_done" value="'.$result['service_don'].'" required>   
                 </div>   
                 </div>   
                 <div class="col">   
                 <div class="input-group input-group-outline my-3 is-filled">   
                 <label class="form-label">Recommendation</label>   
                 <input type="text" class="form-control"  name="recomm" value="'.$result['recomm'].'"required>   
                 </div>   
                 </div>   
                 <div class="col">   
                 <div class="input-group input-group-outline my-3 is-filled">   
                 <label class="form-label">Service By</label>   
                  <div  class="form-control p-0 sample-select" id="myDiv" name="service_by" data-array-value="'.json_encode( $mem_arr).'"></div>    
                 </div>   
                 </div>   
                
                 </div>   
                 </div>
				 <div class="modal-footer mb-0">
				 <button type="button" class="btn btn-primary mb-0 updatePm">Confirm</button>
				   <button type="button" class="btn btn-secondary mb-0" data-bs-dismiss="modal">Close</button>   
				 </div>
				 </form> 
				 </div>  ';

	echo $output;
}

if(isset($_POST['action'])&& $_POST['action']=='updatePms'){
	$serv_date = $_POST['serv_date'];
	$diagnosis = $_POST['diagnosis'];
	$service_done = $_POST['service_done'];
	$recomm = $_POST['recomm'];

	$sched_id = $_POST['sched_id'];
	$accomp_id = $_POST['accomp_id'];
	$service_by_values = explode(',', $_POST['service_by']);
	//delete notification, notif_user, and user_shced
	$remove_notif = $client->remove_notif($sched_id);
	$notif_content = 'Your schedule no:#'.$sched_id.' has been verified';
	$notif_title = 'Schedule Service Done';
		$notif_id = $client->add_user_notification($notif_title, $notif_content,  0 , date('Y-m-d h:i:s'), 1, $sched_id);
		foreach ($service_by_values as $user) {
		$client->add_user_service($user, $sched_id, 1);
		$client->user_notification($user, $notif_id);
		echo $notif_id;
	}

	//update accomp table;
	$update_accomp = $client->update_accomp($serv_date, $diagnosis, $service_done, $recomm, $accomp_id);
print_r( $update_accomp);


}
if(isset($_GET['action'])&& $_GET['action']== 'getUserSchedStats'){
	$user_id = $_GET['user_id'];
	$month = 1;
	$year = date('Y');
	$sv = array();
	$pm = array();
	while ($month <=12){
		$stmt = "SELECT COUNT(accomplished_schedule.id) AS taskDone from accomplished_schedule 
		LEFT JOIN schedule on accomplished_schedule.schedule_id = schedule.schedule_id INNER JOIN user_sched ON schedule.schedule_id = user_sched.sched_id 
		WHERE schedule.schedule_type = '1' AND user_sched.uid = $user_id AND user_sched.us_status = '1' AND MONTH(schedule.schedule_date) = $month  AND YEAR(schedule.schedule_date) = $year
		";
		array_push($pm, $client->countSchedUser($stmt));
		$stmt= "SELECT COUNT(accomplished_schedule.id) AS taskDone from accomplished_schedule 
		LEFT JOIN schedule on accomplished_schedule.schedule_id = schedule.schedule_id 
		INNER JOIN user_sched ON schedule.schedule_id = user_sched.sched_id 
		WHERE schedule.schedule_type = '2' AND user_sched.uid = $user_id AND user_sched.us_status = '1' AND MONTH(schedule.schedule_date) = $month  AND YEAR(schedule.schedule_date) = $year";
		array_push($sv, $client->countSchedUser($stmt));
		$month++;
	}
	echo json_encode( array(
		'pm'=> $pm,
		'sv'=> $sv
	));

}
if (isset($_GET['action'])&& $_GET['action']=='getSchedStats') {
	
	$client_id = $_GET['client_id'];
	$month = 1;
	$year = date('Y');
	$arr = array();
	$pm = array();
	$sv = array();
	while ($month <=12){
		$stmt = "SELECT COUNT(schedule_id) as schedId FROM schedule 
		LEFT JOIN contract on schedule.contract_id = contract.contract_id where contract.client_id = $client_id and schedule.status = 2 
		AND MONTH(schedule.schedule_date) = $month  AND YEAR(schedule.schedule_date) = $year";
		
		array_push($pm, $client->countSchedClient($stmt));
		$stmt = "SELECT COUNT(schedule.schedule_id)as schedId from schedule INNER JOIN service_call ON schedule.sv_id = service_call.sv_id 
		WHERE service_call.client_id  = $client_id and schedule.status = 2 AND MONTH(schedule.schedule_date) = $month  AND YEAR(schedule.schedule_date) = $year";
		array_push($sv, $client->countSchedClient($stmt));
		$month++;
	}
	
	echo json_encode (array(
		'pm' => $pm,
		'sv' => $sv
	));
}

if (isset($_GET['action'])&& $_GET['action']=='getxD') {
	$client_id = $_GET['client_id'];
	$year = date('Y');
	$resultsArray = array();
	$user_Serv = $client->getUserServ($client_id);
	foreach($user_Serv as $row) {
		$resultsArray[] = array (
			"firstname" => $row['FirstName'],
			"count" => $row['TotalCount']
		);

	}

	echo json_encode($resultsArray);

}

if (isset($_GET['action'])&& $_GET['action'] =='getUserNotification'){
	$output ='';
	$user_id = $_GET['user_id'];
	$notifs = $client->getUserNotification($user_id, 5);
	foreach($notifs as $row) {
		$output .='
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex align-items-center py-1">
                      <div class="my-auto">
                        <span class="material-icons">
                          email
                        </span>
                      </div>
                      <div class="ms-2">
                        <h6 class="text-sm font-weight-normal mb-0">
                         '.$row['content'].'
                        </h6>
                      </div>
                    </div>
                  </a>
                </li>
          
	';
	}
	$client->readUserNotification($user_id);
	echo $output;

}

if (isset($_GET['action'])&& $_GET['action']=='getUserNotifications'){
	$user_id = $_GET['user_id'];
	$count= $_GET['count'];
	$notifs  = $client->getUserNotification($user_id, $count);
	$output ='';
	foreach ($notifs as $notif){
		$output .= '  <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2 pt-0">
		<div class="avatar me-3">
		  <img src="../assets/img/user_notif.png" alt="kal" class="border-radius-lg shadow">
		</div>
		<div class="d-flex align-items-start flex-column justify-content-center">
		  <h6 class="mb-0 text-sm">'.$notif['title'].'</h6>
		  <p class="mb-0 text-sm">'.$notif['content'].'</p>
		</div>
		
	  </li>';

	}
	$output .= '<li class="text-center">
	<span class="text-sm text-uppercase viewMore">View More</span>
	</li> ';
	echo $output;


}

if (isset($_POST['action'])&& $_POST['action']=='uploadProfilePic'){
	$user_id = $_POST['user_id'];
	$fileTmpLocation = $_FILES["file"]["tmp_name"];

	// Destination directory on your server to move the uploaded file
	$destinationDirectory = "../uploads/";

	// Get the original file name
	$originalFileName = $_FILES["file"]["name"];
	// Generate a new file name (you can use other techniques to make it unique)
	
	// Perform image resizing
   $uploadFile = $destinationDirectory . $originalFileName;
		// Handle the uploaded file here, e.g., move it to a specific directory
		$targetWidth = 400;
		$targetHeight = 400;
		list($width, $height) = getimagesize($fileTmpLocation);

		// Calculate new dimensions while maintaining aspect ratio
		if ($width > $height) {
			$newWidth = $targetWidth;
			$newHeight = intval($height * ($targetWidth / $width));
		} else {
			$newWidth = intval($width * ($targetHeight / $height));
			$newHeight = $targetHeight;
		}

		// Create a new image with the desired dimensions
		$resizedImage = imagecreatetruecolor($newWidth, $newHeight);

		// Get the image type (you can support other formats as needed)
		$imageType = exif_imagetype($fileTmpLocation);

		// Create a new image from the uploaded file based on its type
		switch ($imageType) {
			case IMAGETYPE_JPEG:
				$sourceImage = imagecreatefromjpeg($fileTmpLocation);
				break;
			case IMAGETYPE_PNG:
				$sourceImage = imagecreatefrompng($fileTmpLocation);
				break;
			case IMAGETYPE_GIF:
				$sourceImage = imagecreatefromgif($fileTmpLocation);
				break;
			// Add support for other image types if needed
			default:
				echo "Unsupported image type.";
				exit;
		}

		// Resize the image
		imagecopyresampled($resizedImage, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

		// Save the resized image to the destination directory
		switch ($imageType) {
			case IMAGETYPE_JPEG:
				imagejpeg($resizedImage, $destinationDirectory . $originalFileName, 80); // 80 is the image quality (0-100)
				break;
			case IMAGETYPE_PNG:
				imagepng($resizedImage, $destinationDirectory . $originalFileName, 9); // 9 is the compression level (0-9)
				break;
			case IMAGETYPE_GIF:
				imagegif($resizedImage, $destinationDirectory . $originalFileName);
				break;
			// Add support for other image types if needed
			default:
				echo "Unsupported image type.";
				exit;
		}

		// Free up memory
		imagedestroy($resizedImage);
		imagedestroy($sourceImage);

		$client-> edit_profile($uploadFile, $user_id);

		echo $uploadFile;
}

if (isset($_POST['action'])&& $_POST['action']=='updateProfileCover'){
	$user_id = $_POST['user_id'];
	$fileTmpLocation = $_FILES["file"]["tmp_name"];

	// Destination directory on your server to move the uploaded file
	$destinationDirectory = "../uploads/cover/";

	// Get the original file name
	$originalFileName = $_FILES["file"]["name"];
	// Generate a new file name (you can use other techniques to make it unique)
	
	// Perform image resizing
   $uploadFile = $destinationDirectory . $originalFileName;
		// Handle the uploaded file here, e.g., move it to a specific directory
		$targetWidth = 1920;
		$targetHeight = 1080;
		list($width, $height) = getimagesize($fileTmpLocation);

		// Calculate new dimensions while maintaining aspect ratio
		if ($width > $height) {
			$newWidth = $targetWidth;
			$newHeight = intval($height * ($targetWidth / $width));
		} else {
			$newWidth = intval($width * ($targetHeight / $height));
			$newHeight = $targetHeight;
		}

		// Create a new image with the desired dimensions
		$resizedImage = imagecreatetruecolor($newWidth, $newHeight);

		// Get the image type (you can support other formats as needed)
		$imageType = exif_imagetype($fileTmpLocation);

		// Create a new image from the uploaded file based on its type
		switch ($imageType) {
			case IMAGETYPE_JPEG:
				$sourceImage = imagecreatefromjpeg($fileTmpLocation);
				break;
			case IMAGETYPE_PNG:
				$sourceImage = imagecreatefrompng($fileTmpLocation);
				break;
			case IMAGETYPE_GIF:
				$sourceImage = imagecreatefromgif($fileTmpLocation);
				break;
			// Add support for other image types if needed
			default:
				echo "Unsupported image type.";
				exit;
		}

		// Resize the image
		imagecopyresampled($resizedImage, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

		// Save the resized image to the destination directory
		switch ($imageType) {
			case IMAGETYPE_JPEG:
				imagejpeg($resizedImage, $destinationDirectory . $originalFileName, 80); // 80 is the image quality (0-100)
				break;
			case IMAGETYPE_PNG:
				imagepng($resizedImage, $destinationDirectory . $originalFileName, 9); // 9 is the compression level (0-9)
				break;
			case IMAGETYPE_GIF:
				imagegif($resizedImage, $destinationDirectory . $originalFileName);
				break;
			// Add support for other image types if needed
			default:
				echo "Unsupported image type.";
				exit;
		}

		// Free up memory
		imagedestroy($resizedImage);
		imagedestroy($sourceImage);

		$client-> edit_profile_cover($uploadFile, $user_id);

		echo $uploadFile;
}
if (isset($_POST['action']) && $_POST['action'] == 'update_contract') {
    $contract_id = $_POST['contract_id'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $turn_over = $_POST['turn_over'];
    $coverage = $_POST['coverage'];
    $coverageInput = $_POST['coverage_input'];
    $sv_count = $_POST['pms_count'];
    $frequency = $_POST['frequency'];
    $contractType = $_POST['cType'];
	$pmCount = $_POST['count'];
	$pmTotal = $_POST['total'];
////////////////
$months = ($frequency == 1) ? "3":  (($frequency)== 2 ? "6":"12");
$pmsCount = 0;
$done = true;
do {
$turn_over = date('Y-m-d', strtotime("$turn_over + $months months"));
$pmsCount++;
}while($turn_over < $coverageInput);
    try {
		$checkPmsCountValid = 
        $coverageTimestamp = strtotime($coverage);
        $coverageInputTimestamp = strtotime($coverageInput);

        if ($pmsCount<($pmTotal - $pmCount)) {
            $response = array(
                'message' => "Invalid coverage input. Please input later dates",
                'status' => 0,
				'pmsCount' => $pmsCount

            );
          
        } else {
            // Process the valid input
            // ...
			$newTotal = $pmsCount;
			$newCount = $pmsCount - ($pmTotal - $pmCount);
			if($newCount == 0){
				$response = array(
					'message' => "Success, PMS Count reached so the Contract will expired",
					'status' => 1,
					'pmsCount' => $newCount

	
				);
				
			}
			else {	$response = array(
                'message' => "Success",
                'status' => 1,
				'pmsCount' => $newTotal

            );}
		

        }
		echo json_encode($response);
    } catch (Exception $e) {
        echo "An error occurred. Please contact the administrator";
    }
}
if (isset($_GET['action'])&& $_GET['action']=='show_contract_acrdn'){
	$contract_id = $_GET['contract_id'];
	$status = '';
	$result = $client->viewPmsContract($contract_id,$status);
	$output = '';
			
    // Generate the accordion content based on the rowData
// Generate the accordion content based on the rowData
$output .= '<div class="table-responsive" >
        <table  class="table test-table " style="width:100%;">
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Schedule Id</th>
                    <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Schedule Date</th>
                    <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Accomplished Date</th>
					 <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                </tr>
            </thead>
            <tbody  class="align-middle ">';
foreach ($result as $row) {
	if ($row['accomp_date']) {
		$status = 'DONE';
		$status_style='success';
		$accomp_date = date('M-d-Y',strtotime($row['accomp_date']));
		
	}
	else {
		$status = 'NOT DONE';
		$status_style='danger';
		$accomp_date = '';
	}
	
    $output .= '
                <tr>
                    <td >' . $row['sched_id'] . '</td>
                    <td class="text-sm font-weight-bolder text-primary">' .date('M-d-Y',strtotime($row['schedule_date'])). '</td>
                    <td class="text-sm font-weight-bolder text-success">' .$accomp_date . '</td>
					  <td class="text-sm font-weight-bolder text-'.$status_style.'">' .$status.'</td>
					  <td class="align-middle text-center text-sm">';
					  
					  if ($row['accomp_date']) {
					  $output .= '
                                   
                        <span class="data-bs-toggle="tooltip" data-bs-placement="top" title="View MMR Report">
                            <button type="button" data-id="' . $row['id'] . '"  class="btn btn-secondary no_margin viewContractPmReport ">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                        </span> ';
					  }
                        $output .='<span class="data-bs-toggle="tooltip" data-bs-placement="top" title="Edit PM Details">
                            <button data-bs-toggle = "modal" data-bs-target="#edit-pm-modal" type="button" data-id="' . $row['id'] . '" class="btn btn-warning no_margin editPm ">
                                <i class="fa-solid fa-edit"></i>
                            </button>
                        </span>
                        
                    </td>
                </tr>';
}
$output .= '
            </tbody>
        </table>
</div>
';


    echo $output;
}
?>

