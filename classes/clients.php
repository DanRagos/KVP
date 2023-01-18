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
	public function add_contract($client_id, $machine_type, $brand, $model,$frequency, $contract_type, $pms_count, $first_pms ,$turn_over, $coverage, $count ) {
		$sql = "INSERT INTO `contract` (`contract_id`, `client_id`, `machine_type`,`brand`, `model`, `frequency`, `turn_over`, `coverage`, `status`, `count`, `total`, `sv_call`)
		VALUES ('', :client_id, :machine_type, :brand,:model, :frequency, :turn_over, :coverage, :status, '', :total, :sv_call);";
		$stmt = $this -> conn -> prepare($sql);
		$stmt ->execute(['client_id'=>$client_id,'machine_type' =>$machine_type,'brand'=>$brand, 'model'=>$model, 'frequency'=>$frequency,
		'turn_over'=>$turn_over, 'coverage'=>$coverage, 'status' =>$contract_type,'total'=>$count, 'sv_call'=>$pms_count]);
		$row = $stmt -> fetch(PDO::FETCH_ASSOC);
		$last_id = $this->conn->lastInsertId();
		$add_sched = $this->add_schedule($last_id, $first_pms);
		return $row;
		
	}
	// Add schedule 
	
	public function add_schedule($last_id, $schedule_date){
		$sql = "INSERT INTO `schedule` (`schedule_id`, `client_id`, `machine_type`, `model`, `contract_id`, `schedule_date`, `status`, `count`, `guest`, `rep_problem`) 
		VALUES (NULL, '', '', '', :last_id, :schedule_date, '', '', '', '')";
		$stmt = $this -> conn -> prepare($sql);
		$stmt ->execute(['last_id'=>$last_id, 'schedule_date'=>$schedule_date]);
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
		$sql = "SELECT schedule.schedule_id, schedule.schedule_date, schedule.status, schedule.contract_id, contract.brand, contract.model, clients.client_name, clients.client_address from schedule inner join contract on schedule.contract_id = contract.contract_id
		inner join clients on contract.client_id = clients.client_id where schedule.status != 2";
		$stmt = $this ->conn ->prepare($sql);
		$stmt -> execute();
		$result = $stmt ->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	//
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
	
}

?>