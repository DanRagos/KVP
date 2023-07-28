<?php
require_once 'db.php';

class Clients extends Db {
	//register user
	public function register($firstname,$lastname, $username,$email, $password, $type){
		$sql = "INSERT INTO `users` (`mem_id`, `firstname`, `lastname`, `username`, `email`, `password`, `type`, `imglink`)
		VALUES (NULL, :firstname, :lastname, :username, :email, :password, :type, '../userpics/avatar.png');";
		$stmt = $this ->conn->prepare($sql);
		$result = $stmt->execute(['firstname' => $firstname,'lastname' => $lastname, 'username' => $username, 'email' =>$email, 'password' => $password, 'type' =>$type]);
		return $result;
	}
	
	//check if exists
	public function user_exist ($username) {
		$sql = "Select username from users where username = :username";
		$stmt = $this ->conn->prepare($sql);
		$stmt->execute(['username' =>$username]);
		$result = $stmt->fetch();
		return $result;
		
	}
	// login existing user
	public function login ($username) {
		$sql = "SELECT mem_id,username, password from users where username = ?";
		$stmt = $this ->conn->prepare($sql);
		$stmt -> execute([$username]);
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		return $row;
	}
	//Session 
	public function currentUser ($username) {
		$sql = "Select * from users where username = ?";
		$stms = $this -> conn -> prepare($sql);
		$stms -> execute ([$username]);
		$row = $stms -> fetch(PDO::FETCH_ASSOC);
		return $row; 
	}
	
	//Register Client
		public function register_client($client_name,$client_address, $contact_person, $contact_email, $img_link){
		$sql = "INSERT INTO `clients` (`client_id`, `client_name`, `client_address`, `contact_person`, `contact_email`, `imglink`)
		VALUES (NULL, :client_name, :client_address, :contact_person, :contact_email, :img_link)";
		$stmt = $this ->conn->prepare($sql);
		$result = $stmt->execute(['client_name' => $client_name,'client_address' => $client_address, 'contact_person' => $contact_person,
		'contact_email' =>$contact_email, 'img_link' => $img_link]);
		return $result;
	}
	public function showUsers() {
		$sql = "SELECT * FROM `users`" ;
		$stms = $this -> conn ->prepare($sql);
		 $stms ->execute();
		$result = $stms->fetchAll(PDO::FETCH_ASSOC);
		return $result;
		
	}
	//Display all Clients
	public function showClients () {
		$sql = "SELECT * FROM `clients`" ;
		$stms = $this -> conn ->prepare($sql);
		 $stms ->execute();
		$result = $stms->fetchAll(PDO::FETCH_ASSOC);
		return $result;
		
	}
	//Edit Clients 
	public function edit_clients($id) {
		$sql = "Select * from clients where client_id = ? ";
		$stmt = $this -> conn -> prepare($sql);
		$stmt ->execute([$id]);
		$row = $stmt -> fetch(PDO::FETCH_ASSOC);
		return $row;
		
	}
	//Update Clients
	public function update_client($id,$name,$address,$cPerson,$email) {
		$sql = "Update clients set client_name = :name, client_address = :address, contact_person= :cPerson, contact_email = :email where client_id = :id ";
		$stmt = $this -> conn -> prepare($sql);
		$stmt ->execute(['name'=>$name,'address'=>$address,'cPerson'=>$cPerson,'email'=>$email,'id'=>$id]);
		$row = $stmt -> fetch(PDO::FETCH_ASSOC);
		return true;
		
	}
		//Add Contract to Clients 
	public function add_contract($client_id, $machine_type, $brand, $model,$frequency, $contract_type, $pms_count, $first_pms ,$turn_over, $coverage, $count, $type ) {
		$sql = "INSERT INTO `contract` (`contract_id`, `client_id`, `machine_type`,`brand`, `model`, `frequency`, `turn_over`, `coverage`, `status`, `count`, `total`, `sv_call`)
		VALUES ('', :client_id, :machine_type, :brand,:model, :frequency, :turn_over, :coverage, :status, :count, :total, :sv_call);";
		$stmt = $this -> conn -> prepare($sql);
		$stmt ->execute(['client_id'=>$client_id,'machine_type' =>$machine_type,'brand'=>$brand, 'model'=>$model, 'frequency'=>$frequency,
		'turn_over'=>$turn_over, 'coverage'=>$coverage, 'status' =>$contract_type,'count'=>$count, 'total'=>$count, 'sv_call'=>$pms_count]);
		$row = $stmt -> fetch(PDO::FETCH_ASSOC);
		$last_id = $this->conn->lastInsertId();
		$add_sched = $this->add_schedule_contract($last_id, $first_pms, $type);
		return $row;
		
	}
	// Add schedule 
	
	public function add_schedule_contract($last_id, $schedule_date, $type){
		$sql = "INSERT INTO `schedule` (`schedule_id`, `schedule_type`, `contract_id`, `sv_id`, `schedule_date`, `status`) 
		VALUES (NULL, :type, :last_id, '',  :schedule_date, '')";
		$stmt = $this -> conn -> prepare($sql);
		$stmt ->execute(['type'=>$type, 'last_id'=>$last_id, 'schedule_date'=>$schedule_date]);
		return true;
		
	}
		public function add_schedule_sv($last_id, $schedule_date, $type){
		$sql = "INSERT INTO `schedule` (`schedule_id`, `schedule_type`, `contract_id`, `sv_id`, `schedule_date`, `status`) 
		VALUES (NULL, :type,'', :last_id,  :schedule_date, '')";
		$stmt = $this -> conn -> prepare($sql);
		$stmt ->execute(['type'=>$type, 'last_id'=>$last_id, 'schedule_date'=>$schedule_date]);
		return true;
		
	}
	//Add SV Call Client
	public function add_sv_client($client_id, $sv_type, $contract_id, $machine_type, $brand, $model, $rep_problem, $sv_date){
		$type = 2;
	    $sql = "INSERT INTO `service_call` (`sv_id`, `guest`, `client_id`, `contract_id`, `guest_name`, `guest_address`, `machine_type`, `brand`, `model`, `rep_problem`)
		VALUES (NULL, :sv_type , :client_id,  :contract_id ,'' , '', :machine_type, :brand, :model, :rep_problem)";
		$stmt = $this->conn-> prepare($sql);
		$stmt ->execute(['sv_type'=>$sv_type, 'client_id'=>$client_id, 'contract_id'=>$contract_id, 'machine_type'=>$machine_type, 'brand'=>$brand, 'model'=>$model, 'rep_problem'=>$rep_problem]);
		$last_id = $this->conn->lastInsertId();
		$test = $add_sched = $this->add_schedule_sv($last_id, $sv_date, $type);
		return $test;
	}
	//Add SV Call Guest
		public function add_sv_guest($gName, $gAddress, $machine_type, $brand, $model, $rep_problem, $sv_date){
		$type = 2;
	    $sql = "INSERT INTO `service_call` (`sv_id`, `guest`, `client_id`, `contract_id`, `guest_name`, `guest_address`, `machine_type`, `brand`, `model`, `rep_problem`)
		VALUES (NULL, 0 , '',  '' , :gName , :gAddress, :machine_type, :brand, :model, :rep_problem)";
		$stmt = $this->conn-> prepare($sql);
		$stmt ->execute(['gName'=>$gName, 'gAddress'=>$gAddress, 'machine_type'=>$machine_type, 'brand'=>$brand, 'model'=>$model, 'rep_problem'=>$rep_problem]);
		$last_id = $this->conn->lastInsertId();
		$add_sched = $this->add_schedule_sv($last_id, $sv_date, $type);
		return true;
	}
	
	//Display Contract
		public function displayContract(){
		$sql = "SELECT *, machine_type.machine_name from clients inner join contract on clients.client_id = contract.client_id
left join machine_type on contract.machine_type = machine_type.machine_id";
		$stmt = $this -> conn -> prepare($sql);
		$row = $stmt ->execute([]);
		$row = $stmt -> fetchAll(PDO::FETCH_ASSOC);
		return $row;
		
	}
	// Display Schedule
	public function display_schedule () {
		$sql = "SELECT schedule.schedule_id, schedule.schedule_date, schedule.status, schedule.schedule_type,
COALESCE(contract.brand, service_call.brand) as brand,
COALESCE(contract.model, service_call.model) as model,
COALESCE(clients.client_name,
CASE WHEN service_call.guest = 0 THEN service_call.guest_name
END) AS client_name
FROM schedule
LEFT JOIN contract ON schedule.contract_id = contract.contract_id
LEFT JOIN service_call ON schedule.sv_id = service_call.sv_id
LEFT JOIN clients ON (contract.client_id = clients.client_id) OR (service_call.client_id = clients.client_id)
WHERE schedule.status != 2;";
		$stmt = $this ->conn ->prepare($sql);
		$stmt -> execute();
		$result = $stmt ->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

		public function get_schedule ($id) {
			$sql = "SELECT schedule.*, COALESCE(contract.contract_id, service_call.sv_id) AS id,
			COALESCE(contract.brand, service_call.brand) as brand, 
			COALESCE(contract.model, service_call.model) as model, 
			COALESCE(clients.client_name, CASE WHEN service_call.guest = 0 THEN service_call.guest_name END)
			AS client_name,COALESCE(clients.client_address, service_call.guest_address) 
			AS address, service_call.rep_problem, schedule.schedule_type, service_call.contract_id as sv_contract, contract.frequency, contract.count, contract.total, contract.sv_call FROM schedule LEFT JOIN contract ON (schedule.schedule_type = 1
			AND schedule.contract_id = contract.contract_id) LEFT JOIN service_call ON
			(schedule.schedule_type = 2 AND schedule.sv_id = service_call.sv_id)
			LEFT JOIN clients ON (contract.client_id = clients.client_id) 
			OR (service_call.client_id = clients.client_id) WHERE schedule.schedule_id= :id";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute(['id'=>$id]);
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			return $result;
		}
		public function with_collection ($contract_id) {
	$sql = "SELECT * from contract where contract_id = :contract_id";
	$stmt = $this->conn->prepare($sql);
	$stmt ->execute(['contract_id'=>$contract_id]);
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	return $result;
}
public function accomplished_schedule($schedule_id, $s_date, $c_rep, $c_loc, $diagnosis, $c_done, $status, $c_recom, $withC) {
	
	$sql = "INSERT INTO `accomplished_schedule` (`id`, `schedule_id`, `accomp_date`, `diagnosis`, `service_don`, `recomm`, `accomp_status`, `withC`)
	VALUES (NULL, :schedule_id, :s_date,  :diagnosis,  :c_done, :c_recom,  :aStatus, :withC)";
	$stmt = $this->conn->prepare($sql);
	$stmt -> execute(['schedule_id'=>$schedule_id, 's_date'=>$s_date, 'diagnosis'=>$diagnosis,'c_done'=>$c_done, 'c_recom'=>$c_recom, 'aStatus'=>$status, 'withC'=>$withC]);
	return true;
}
public function update_accomp($serv_date, $diagnosis, $service_done, $recomm, $id) {
	
	$sql = "UPDATE accomplished_schedule SET accomp_date = :serv_date, diagnosis = :diagnosis, service_don = :service_done, recomm = :recomm where accomplished_schedule.id = :id";
	$stmt = $this->conn->prepare($sql);
	$stmt -> execute(['serv_date'=>$serv_date, 'diagnosis'=>$diagnosis, 'service_done'=>$service_done,'recomm'=>$recomm, 'id'=>$id]);
	return true;
}
public function reschedule($id, $schedule_date) {
	$sql = "UPDATE schedule SET schedule_date = :schedule_date where schedule_id = :id";
	$stmt = $this->conn->prepare($sql);
	$stmt -> execute(['id'=>$id, 'schedule_date'=>$schedule_date]);
	return $schedule_date;
}
public function update_schedule($schedule_id, $status) {
	$sql = "Update schedule SET status  = :status where schedule_id = :schedule_id";
	$stmt = $this->conn->prepare($sql);
	$stmt -> execute(['schedule_id'=>$schedule_id, 'status'=>$status]);
	return true;
}
public function delete_schedule($schedule_id) {
	$sql = "DELETE FROM schedule WHERE `schedule`.`schedule_id` = :schedule_id";
	$stmt = $this->conn->prepare($sql);
	$stmt -> execute(['schedule_id'=>$schedule_id]);
	return true;
}
public function delete_svcall($sv_call) {
		$sql = "DELETE FROM service_call WHERE `service_call`.`sv_id` = :sv_call";
	$stmt = $this->conn->prepare($sql);
	$stmt -> execute(['sv_call'=>$sv_call]);
	return true;
	
}

public function add_pms_sched ($contract_id, $frequency, $s_date){
	$sql = "INSERT INTO `schedule` (`schedule_id`, `schedule_type`, `contract_id`, `sv_id`, `schedule_date`, `status`) VALUES (NULL, '1', :contract_id, 0, :s_date, '0')";
	$stmt = $this->conn->prepare($sql);
	$months  = ($frequency == '1') ? 3 : ($frequency == '2' ? 6 : 12);
	$new_date = date('Y-m-d', strtotime("+$months month", strtotime($s_date)));
	$stmt -> execute(['contract_id'=>$contract_id, 's_date'=>$new_date]);
	return true;	
}
public function add_pms_bulk ($contract_id, $s_date, $status){
	$sql = "INSERT INTO `schedule` (`schedule_id`, `schedule_type`, `contract_id`, `sv_id`, `schedule_date`, `status`) VALUES (NULL, '1', :contract_id, 0, :s_date, :status)";
	$stmt = $this->conn->prepare($sql);
	$stmt -> execute(['contract_id'=>$contract_id, 's_date'=>$s_date, 'status'=>$status]);
	return $this->conn->lastInsertId();
}
public function get_contract($id) {
		$sql = "SELECT * FROM `contract` WHERE client_id = :id and status = 2";
		$stmt = $this ->conn ->prepare($sql);
		$stmt -> execute(['id'=>$id]);
		$result = $stmt ->fetchAll(PDO::FETCH_ASSOC);
		return $result;
		
	}
	public function get_sv($id) {
		$sql = "SELECT * FROM `contract` WHERE contract_id = :id";
		$stmt = $this ->conn ->prepare($sql);
		$stmt -> execute(['id'=>$id]);
		$result = $stmt ->fetch(PDO::FETCH_ASSOC);
		return $result;
		
	}
public function expire_sched($contract_id){
	$sql = "Update contract SET status = 3 where contract_id = :contract_id";
	$stmt = $this ->conn ->prepare($sql);
	$stmt -> execute(['contract_id'=>$contract_id]);
	return $stmt;
}
public function delete_contract($contract_id){
	$sql = "Update contract SET isActive = 0 where contract_id = :contract_id";
	$stmt = $this ->conn ->prepare($sql);
	$stmt -> execute(['contract_id'=>$contract_id]);
	return $stmt;
}
public function add_pms_count($contract_id, $count){
	$sql = "Update contract SET count = :count where contract_id = :contract_id";
	$stmt = $this ->conn ->prepare($sql);
	$stmt -> execute(['contract_id'=>$contract_id, 'count'=>$count]);
	return $stmt;
}
public function add_pms_count_1($contract_id){
	$sql = "Update contract SET count = count - 1 where contract_id = :contract_id";
	$stmt = $this ->conn ->prepare($sql);
	$stmt -> execute(['contract_id'=>$contract_id]);
	return $stmt;
}
public function add_sv_count($contract_id, $count){
	$sql = "Update contract SET sv_call = :count where contract_id = :contract_id";
	$stmt = $this ->conn ->prepare($sql);
	$stmt -> execute(['contract_id'=>$contract_id, 'count'=>$count]);
	return $stmt;
	
}
public function get_contract_details($id) {
		$sql = "SELECT * FROM `contract` WHERE contract_id = :id";
		$stmt = $this ->conn ->prepare($sql);
		$stmt -> execute(['id'=>$id]);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
		
	}	
	public function last_pm($contract_id) {
		$sql = "SELECT * FROM `schedule` WHERE contract_id = :id ORDER BY schedule_id DESC LIMIT 1";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute(['id' => $contract_id]);
		$result = $stmt->fetch();
		return $result;
	}
	public function delete_last($schedule_id){
		$sql = "DELETE from schedule where schedule.schedule_id = :schedule_id";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute(['schedule_id'=>$schedule_id]);
		return true;
	}
	public function check_pms($contract_id) {
		$sql = "SELECT count FROM contract WHERE contract_id = :contract_id";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute(['contract_id' => $contract_id]);
		$result = $stmt->fetchColumn();
		return $result > 0;
	}
	
	
	public function get_sv_details($id) {
		$sql = "SELECT * FROM `service_call` WHERE sv_id = :id";
		$stmt = $this ->conn ->prepare($sql);
		$stmt -> execute(['id'=>$id]);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
		
	}	
		public function get_pms_report($accomp_id) {
		$sql = "SELECT accomplished_schedule.id as accomp_id, accomplished_schedule.accomp_date, schedule.*, COALESCE(contract.contract_id, service_call.sv_id) AS id, COALESCE(contract.brand, service_call.brand) 
		as brand, COALESCE(contract.model, service_call.model) as model, COALESCE(clients.client_name, 
		CASE WHEN service_call.guest = 0 THEN service_call.guest_name END) 
		AS client_name,COALESCE(clients.client_address, service_call.guest_address)
		AS address, service_call.rep_problem, accomplished_schedule.accomp_date, accomplished_schedule.diagnosis, accomplished_schedule.service_don
, accomplished_schedule.recomm FROM schedule LEFT JOIN contract ON (schedule.schedule_type = 1 AND schedule.contract_id = contract.contract_id) LEFT JOIN service_call ON (schedule.schedule_type = 2 AND schedule.sv_id = service_call.sv_id) LEFT JOIN clients ON (contract.client_id = clients.client_id) OR (service_call.client_id = clients.client_id) LEFT JOIN accomplished_schedule ON (schedule.schedule_id = accomplished_schedule.schedule_id) WHERE schedule.status IN (2, 3) AND accomplished_schedule.id = :accomp_id";
		$stmt = $this ->conn ->prepare($sql);
		$stmt -> execute(['accomp_id'=>$accomp_id]);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
		
	}	
			public function get_contracts($client_id, $isActive) {
		$sql = "SELECT *, machine_type.machine_name from clients inner join contract on clients.client_id = contract.client_id
left join machine_type on contract.machine_type = machine_type.machine_id where contract.client_id = :client_id AND contract.isActive = :isActive AND contract.count > 0";
		$stmt = $this ->conn ->prepare($sql);
		$stmt -> execute(['client_id'=>$client_id, 'isActive'=>$isActive]);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
		
	}	
	public function get_exp_contracts($client_id, $isActive) {
		$sql = "SELECT *, machine_type.machine_name from clients inner join contract on clients.client_id = contract.client_id
left join machine_type on contract.machine_type = machine_type.machine_id where contract.client_id = :client_id AND contract.isActive = :isActive AND contract.count <= 0 ";
		$stmt = $this ->conn ->prepare($sql);
		$stmt -> execute(['client_id'=>$client_id, 'isActive'=>$isActive]);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
		
	}	
			public function viewPmsContract($contract_id, $status) {
		$sql = "select contract.* , clients.client_name, clients.client_address, schedule.schedule_date, schedule.schedule_id as sched_id, accomplished_schedule.* from contract right join schedule on contract.contract_id = schedule.contract_id left join clients on contract.client_id = clients.client_id left join accomplished_schedule on schedule.schedule_id = accomplished_schedule.schedule_id where 
		contract.contract_id = :contract_id $status";
		$stmt = $this ->conn ->prepare($sql);
		$stmt -> execute(['contract_id'=>$contract_id]);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
		
	}	
public function countAllSchedule() {
    $sql = "SELECT COUNT(schedule_id) as allSchedule FROM schedule";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchColumn();
}
public function countAllSv() {
    $sql = "SELECT COUNT(schedule_id) as allSchedule FROM schedule where schedule.contract_id  = 0";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchColumn();
}
public function countAllPms() {
    $sql = "SELECT COUNT(schedule_id) as allSchedule FROM schedule where schedule.contract_id  > 0";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchColumn();
}
public function pendPms() {
    $sql = "SELECT COUNT(schedule_id) as allSchedule FROM schedule where schedule.contract_id  > 0 and schedule.status = 1";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchColumn();
}
public function pendSv() {
    $sql = "SELECT COUNT(schedule_id) as allSchedule FROM schedule where schedule.contract_id  = 0 and schedule.status = 1";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchColumn();
}
public function resolved() {
    $sql = "SELECT COUNT(schedule_id) as allSchedule FROM schedule where schedule.status = 2";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchColumn();
}


	public function countSchedule ($client_id) {
		$sql ="SELECT COUNT(schedule_id) as serviceSched from contract right join schedule on contract.contract_id = schedule.contract_id where contract.client_id = :client_id";
		$stmt = $this ->conn->prepare($sql);
		$stmt->execute(['client_id'=>$client_id]);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
	}
		public function countPMS ($client_id) {
		$sql ="SELECT COUNT(schedule_id) as pmsSched from contract right join schedule on contract.contract_id = schedule.contract_id where contract.client_id = :client_id AND contract.contract_id > 0 ";
		$stmt = $this ->conn->prepare($sql);
		$stmt->execute(['client_id'=>$client_id]);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
	}
		public function countSV ($client_id) {
		$sql ="SELECT COUNT(schedule_id) as svSched from schedule RIGHT JOIN  service_call on schedule.sv_id = service_call.sv_id WHERE service_call.client_id = :client_id";
		$stmt = $this ->conn->prepare($sql);
		$stmt->execute(['client_id'=>$client_id]);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
	}
		public function accomp_report ($accomp_id) {
		$sql ="select * from accomplished_schedule where accomplished_schedule.id = :accomp_id";
		$stmt = $this ->conn->prepare($sql);
		$stmt->execute(['accomp_id'=>$accomp_id]);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
	}
	
	public function add_user_service ($user_id, $sched_id, $status){
	$sql = "INSERT INTO `user_sched` (`uid`, `sched_id`, `us_status`) VALUES (:user_id, :sched_id,  :status)";
	$stmt = $this->conn->prepare($sql);
	$stmt -> execute(['user_id'=>$user_id, 'sched_id'=>$sched_id, 'status'=>$status]);
	return true;
}

	public function add_user_notification($notif_title, $notif_content,  $isGeneral , $current_date, $isSchedule , $schedule_id){
	$sql = "INSERT INTO `notification` (`title`, `content`, `is_general`, `created_at`, `isSchedule`, `schedule_id`) 
	VALUES (:notif_title, :notif_content, :isGeneral,  :current_date, :isSchedule, :schedule_id)";
	$stmt = $this->conn->prepare($sql);
	$stmt -> execute(['notif_title'=>$notif_title, 'notif_content'=>$notif_content, 'isGeneral'=>$isGeneral, 
	'current_date'=>$current_date, 'isSchedule'=>$isSchedule,'schedule_id'=>$schedule_id ]);
	return $this->conn->lastInsertId();
}
	public function user_notification($user_id, $notification_id){
	$sql = "INSERT INTO `user_notification` (`user_id`, `notification_id`) VALUES (:user_id, :notification_id)";
	$stmt = $this->conn->prepare($sql);
	$stmt -> execute(['user_id'=>$user_id, 'notification_id'=>$notification_id]);
	return true; 
}

public function getServiceBy($schedule_id) {
	$sql = "SELECT users.*, user_sched.us_status from users LEFT JOIN user_sched on users.mem_id = user_sched.uid where user_sched.sched_id = :schedule_id";
	$stmt = $this ->conn ->prepare($sql);
	$stmt -> execute(['schedule_id'=>$schedule_id]);
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $result;
	
}	

public function remove_notif($sched_id) {
	$stmt = $this->conn->prepare("SELECT id FROM notification WHERE schedule_id = :sched_id");
$stmt->bindParam(':sched_id', $sched_id, PDO::PARAM_INT);
$stmt->execute();
$deletedId = $stmt->fetchColumn();

// Execute the DELETE query on notification
$stmt = $this->conn->prepare("DELETE FROM notification WHERE id = :deletedId");
$stmt->bindParam(':deletedId', $deletedId, PDO::PARAM_INT);
$stmt->execute();

// Execute the Delete Query on user_notification
$stmt = $this->conn->prepare("DELETE FROM user_notification WHERE notification_id = :deletedId");
$stmt->bindParam(':deletedId', $deletedId, PDO::PARAM_INT);
$stmt->execute();

// Execute the Delete Query on user_sched
$stmt = $this->conn->prepare("DELETE FROM user_sched WHERE sched_id = :sched_id");
$stmt->bindParam(':sched_id', $sched_id, PDO::PARAM_INT);
$stmt->execute();

	
	
}

public function fetchNotificationsFromDatabase($user_id){
	$sql = "SELECT COUNT(id) as notif FROM user_notification where is_read = 0 and user_id = :user_id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['user_id'=>$user_id]);
    return $stmt->fetchColumn();
}

public function sendNotificationsToClient($notifCount) {
    // Send each notification to the client
   $message = array (
	'count' => $notifCount
   );
        // Flush the output buffer to send the data immediately
        ob_flush();
        flush();
	return $message;
    
}

}


?>