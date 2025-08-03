<?php
require_once 'db.php';
date_default_timezone_set('Asia/Manila');
class Clients extends Db {
	//register user
	public function register($firstname,$lastname, $username,$email, $password, $type){
		$sql = "INSERT INTO `users` (`mem_id`, `firstname`, `lastname`, `username`, `email`, `password`, `type`, `imglink`)
		VALUES ('', :firstname, :lastname, :username, :email, :password, :type, '../userpics/avatar.png');";
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

	public function edit_profile($imglink, $mem_id){
		$sql = "UPDATE users SET imglink = :imglink WHERE mem_id = :mem_id";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute(['imglink' => $imglink, 'mem_id' => $mem_id]);
		return true;
	}
	public function edit_profile_cover($imglink, $mem_id){
		$sql = "UPDATE users SET coverPhoto = :imglink WHERE mem_id = :mem_id";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute(['imglink' => $imglink, 'mem_id' => $mem_id]);
		return true;
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
		$sql = "INSERT INTO `clients` ( `client_name`, `client_address`, `contact_person`, `contact_email`, `imglink`)
		VALUES (:client_name, :client_address, :contact_person, :contact_email, :img_link)";
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
public function add_contract($client_id, $machine_type, $brand, $model, $frequency, $contract_type, $pms_count, $first_pms, $turn_over, $coverage, $pTurn_over, $pCoverage, $count, $type, $svUnli) {
    try {
        $sql = "INSERT INTO `contract` 
                (`client_id`, `machine_type`, `brand`, `model`, `frequency`, `turn_over`, `coverage`, `pTurn_over`, `pCoverage`, `status`, `count`, `total`, `sv_call`, `svUnli`)
                VALUES 
                (:client_id, :machine_type, :brand, :model, :frequency, :turn_over, :coverage, :pTurn_over, :pCoverage, :status, :count, :total, :sv_call, :svUnli)";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'client_id' => $client_id,
            'machine_type' => $machine_type,
            'brand' => $brand,
            'model' => $model,
            'frequency' => $frequency,
            'turn_over' => $turn_over,
            'coverage' => $coverage,
            'pTurn_over' => $pTurn_over,
            'pCoverage' => $pCoverage,
            'status' => $contract_type,
            'count' => $count,
            'total' => $count,
            'sv_call' => $pms_count,
            'svUnli' => $svUnli
        ]);

        $last_id = $this->conn->lastInsertId();

       if (!$last_id) {
    return json_encode([
        'status' => 'error',
        'message' => 'Failed to insert contract.',
        'error_info' => $stmt->errorInfo() // 🔍 Add this
    ]);
}


        $sched_result = $this->add_schedule_contract($last_id, $first_pms, $type);

        return json_encode([
            'status' => 'success',
            'contract_id' => $last_id,
			'schedule_type' =>$type,
            'schedule_result' => $sched_result,
        ]);

    } catch (PDOException $e) {
        return json_encode([
            'status' => 'error',
            'message' => 'Insert Contract Failed: ' . $e->getMessage()
        ]);
    }
}

	// Add schedule 
	
public function add_schedule_contract($last_id, $schedule_date, $type) {
    try {
        $sql = "INSERT INTO `schedule` 
                (`schedule_type`, `contract_id`, `sv_id`, `schedule_date`, `status`) 
                VALUES (:type, :last_id, 0, :schedule_date, 0)";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'type' => $type,
            'last_id' => $last_id,
            'schedule_date' => $schedule_date
        ]);

        return [
            'status' => 'success',
            'schedule_id' => $this->conn->lastInsertId(),
			'type' => $type,
			'contract_id' => $last_id,
			'schedule_data' => $schedule_date
        ];

    } catch (PDOException $e) {
        return [
            'status' => 'error',
            'message' => 'Insert Schedule Failed: ' . $e->getMessage()
        ];
    }
}


	public function add_schedule_sv($last_id, $schedule_date, $type) {
		try {
			$sql = "INSERT INTO `schedule` 
					(`schedule_type`, `contract_id`, `sv_id`, `schedule_date`, `status`) 
					VALUES (:type, NULL, :last_id, :schedule_date, 0)";

			$stmt = $this->conn->prepare($sql);
			$stmt->execute([
				':type' => $type,
				':last_id' => $last_id,
				':schedule_date' => $schedule_date
			]);

			return $this->conn->lastInsertId();
		} catch (PDOException $e) {
			return json_encode([
				'status' => 'error',
				'message' => 'Schedule Insert Error: ' . $e->getMessage()
			]);
		}
	}

	//Add SV Call Client
// Add SV Call Client
public function add_sv_client($client_id, $sv_type, $contract_id, $machine_type, $brand, $model, $rep_problem, $sv_date) {
    $type = 2;

    try {
        $sql = "INSERT INTO `service_call` 
                (`guest`, `client_id`, `contract_id`, `guest_name`, `guest_address`, `machine_type`, `brand`, `model`, `rep_problem`)
                VALUES (:sv_type, :client_id, :contract_id, NULL, NULL, :machine_type, :brand, :model, :rep_problem)";
        
        $stmt = $this->conn->prepare($sql);
        $executed = $stmt->execute([
            'sv_type' => $sv_type,
            'client_id' => $client_id,
            'contract_id' => $contract_id,
            'machine_type' => $machine_type,
            'brand' => $brand,
            'model' => $model,
            'rep_problem' => $rep_problem
        ]);

        if (!$executed) {
            return json_encode([
                'status' => 'error',
                'message' => 'Failed to insert into service_call',
                'errorInfo' => $stmt->errorInfo()
            ]);
        }

        $last_id = $this->conn->lastInsertId();

        if (!$last_id || $last_id == 0) {
            return json_encode([
                'status' => 'error',
                'message' => 'No service_call ID returned. Insert may have failed.'
            ]);
        }

        $last_sched = $this->add_schedule_sv($last_id, $sv_date, $type);

        return json_encode([
            'service_call_id' => $last_id,
            'schedule_id' => $last_sched
        ]);
    } catch (PDOException $e) {
        return json_encode([
            'status' => 'error',
            'message' => 'Service Call Insert Error: ' . $e->getMessage()
        ]);
    }
}


	//Add SV Call Guest
	public function add_sv_guest($gName, $gAddress, $machine_type, $brand, $model, $rep_problem, $sv_date) {
		$type = 2;
		$sql = "INSERT INTO `service_call` 
			(`guest`, `client_id`, `contract_id`, `guest_name`, `guest_address`, `machine_type`, `brand`, `model`, `rep_problem`)
			VALUES (0, 0, 0, :gName, :gAddress, :machine_type, :brand, :model, :rep_problem)";

		$stmt = $this->conn->prepare($sql);
		$stmt->execute([
			':gName' => $gName,
			':gAddress' => $gAddress,
			':machine_type' => $machine_type,
			':brand' => $brand,
			':model' => $model,
			':rep_problem' => $rep_problem
		]);

		$last_id = $this->conn->lastInsertId();

		// Still add schedule, but do not return its result
		$this->add_schedule_sv($last_id, $sv_date, $type);

		return $last_id; // ✅ Return the service_call ID instead
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

	public function display_schedule_contract() {
		$sql = "SELECT s.schedule_id, s.schedule_date, s.status, s.schedule_type, cl.client_name, m.machine_name, c.brand, c.model, cl.client_address, 
		NULL AS problem FROM schedule AS s LEFT JOIN contract AS c ON s.contract_id = c.contract_id
		 LEFT JOIN clients AS cl ON c.client_id = cl.client_id 
		 LEFT JOIN machine_type as m ON c.machine_type = m.machine_id WHERE s.status != 2 AND c.isActive = 1 AND s.schedule_type = 1";
		$stmt = $this -> conn ->prepare ($sql);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	public function display_schedule_sv() {
		$sql = "SELECT 
				s.schedule_id, 
				s.schedule_date, 
				s.status, 
				s.schedule_type, 
				sc.rep_problem AS problem,
				CASE 
					WHEN sc.guest = 0 THEN sc.guest_name 
					WHEN sc.guest = 1 THEN c1.client_name 
					WHEN sc.guest = 2 THEN c2.client_name 
					ELSE NULL 
				END AS client_name,
				CASE 
					WHEN sc.guest = 0 THEN sc.guest_address 
					WHEN sc.guest = 1 THEN c1.client_address 
					WHEN sc.guest = 2 THEN c2.client_address 
					ELSE NULL 
				END AS client_address,
				CASE 
					WHEN sc.guest IN (0, 1) THEN m1.machine_name 
					WHEN sc.guest = 2 THEN m2.machine_name 
					ELSE NULL 
				END AS machine_name,
				CASE 
					WHEN sc.guest IN (0, 1) THEN sc.brand 
					WHEN sc.guest = 2 THEN ct.brand 
					ELSE NULL 
				END AS brand,
				CASE 
					WHEN sc.guest IN (0, 1) THEN sc.model 
					WHEN sc.guest = 2 THEN ct.model 
					ELSE NULL 
				END AS model
			FROM 
				schedule AS s
			LEFT JOIN 
				service_call AS sc ON s.sv_id = sc.sv_id
			LEFT JOIN 
				clients AS c1 ON sc.client_id = c1.client_id
			LEFT JOIN 
				contract AS ct ON sc.contract_id = ct.contract_id
			LEFT JOIN 
				clients AS c2 ON ct.client_id = c2.client_id
			LEFT JOIN 
				machine_type AS m1 ON sc.machine_type = m1.machine_id
			LEFT JOIN 
				machine_type AS m2 ON ct.machine_type = m2.machine_id
			WHERE 
				s.schedule_type = 2 
				AND s.status != 2 AND
				 (ct.isActive = 1 OR ct.contract_id IS NULL) ";
		$stmt = $this -> conn ->prepare ($sql);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	// Display Schedule
	public function display_schedule () {
		$sql = "SELECT schedule.schedule_id, schedule.schedule_date, schedule.status, schedule.schedule_type, 
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
		WHERE schedule.status != 2 ";
		$stmt = $this ->conn ->prepare($sql);
		$stmt -> execute();
		$result = $stmt ->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	public function display_schedule_user ($user_id) {
		$sql = "SELECT schedule.schedule_id, schedule.schedule_date, schedule.status, schedule.schedule_type,service_call.rep_problem,  COALESCE(contract.brand, service_call.brand) 
		as brand, COALESCE(contract.model, service_call.model) as model, COALESCE(clients.client_name, CASE WHEN service_call.guest = 0 THEN service_call.guest_name END) 
		AS client_name FROM schedule LEFT JOIN contract ON schedule.contract_id = contract.contract_id LEFT JOIN service_call ON schedule.sv_id = service_call.sv_id 
		LEFT JOIN clients ON (contract.client_id = clients.client_id) OR (service_call.client_id = clients.client_id)
		 LEFT JOIN user_sched ON schedule.schedule_id = user_sched.sched_id WHERE schedule.status != 2 AND user_sched.uid = :user_id ";
		$stmt = $this ->conn ->prepare($sql);
		$stmt -> execute(['user_id'=>$user_id]);
		$result = $stmt ->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	public function display_schedule_month (){
		$sql = "SELECT 
			s.schedule_id, 
			s.schedule_date, 
			s.status, 
			s.schedule_type, 
			sc.rep_problem AS problem,
			CASE 
				WHEN sc.guest = 0 THEN sc.guest_name 
				WHEN sc.guest = 1 THEN c1.client_name 
				WHEN sc.guest = 2 THEN c2.client_name 
				ELSE NULL 
			END AS client_name,
			CASE 
				WHEN sc.guest = 0 THEN sc.guest_address 
				WHEN sc.guest = 1 THEN c1.client_address 
				WHEN sc.guest = 2 THEN c2.client_address 
				ELSE NULL 
			END AS client_address,
			CASE 
				WHEN sc.guest IN (0, 1) THEN m1.machine_name 
				WHEN sc.guest = 2 THEN m2.machine_name 
				ELSE NULL 
			END AS machine_name,
			CASE 
				WHEN sc.guest IN (0, 1) THEN sc.brand 
				WHEN sc.guest = 2 THEN ct.brand 
				ELSE NULL 
			END AS brand,
			CASE 
				WHEN sc.guest IN (0, 1) THEN sc.model 
				WHEN sc.guest = 2 THEN ct.model 
				ELSE NULL 
			END AS model,
			CASE 
				WHEN sc.guest = 0 THEN NULL 
				WHEN sc.guest = 1 THEN c1.imglink
				WHEN sc.guest = 2 THEN c2.imglink
				ELSE NULL 
			END AS imglink,
			ac.accomp_date,
			ac.accomp_status,
			ac.withC
		FROM 
			schedule AS s
		LEFT JOIN 
			service_call AS sc ON s.sv_id = sc.sv_id
		LEFT JOIN 
			clients AS c1 ON sc.client_id = c1.client_id
		LEFT JOIN 
			contract AS ct ON sc.contract_id = ct.contract_id
		LEFT JOIN 
			clients AS c2 ON ct.client_id = c2.client_id
		LEFT JOIN 
			machine_type AS m1 ON sc.machine_type = m1.machine_id
		LEFT JOIN 
			machine_type AS m2 ON ct.machine_type = m2.machine_id
		LEFT JOIN 
			accomplished_schedule as ac on s.schedule_id = ac.schedule_id
		WHERE 
			s.schedule_type = 2 
			AND s.status != 2 
			AND (ct.isActive = 1 OR ct.contract_id IS NULL)
			AND YEAR(s.schedule_date) = YEAR(CURRENT_DATE())
			AND MONTH(s.schedule_date) = MONTH(CURRENT_DATE())

		UNION ALL

		SELECT 
			s.schedule_id, 
			s.schedule_date, 
			s.status, 
			s.schedule_type, 
			NULL AS problem,
			cl.client_name, 
			cl.client_address, 
			m.machine_name, 
			c.brand, 
			c.model,
			cl.imglink,
			ac.accomp_date,
			ac.accomp_status,
			ac.withC
		FROM 
			schedule AS s
		LEFT JOIN 
			contract AS c ON s.contract_id = c.contract_id
		LEFT JOIN 
			clients AS cl ON c.client_id = cl.client_id
		LEFT JOIN 
			machine_type AS m ON c.machine_type = m.machine_id
		LEFT JOIN 
			accomplished_schedule as ac on s.schedule_id = ac.schedule_id
		WHERE 
			s.status != 2 
			AND c.isActive = 1
			AND YEAR(s.schedule_date) = YEAR(CURRENT_DATE())
			AND MONTH(s.schedule_date) = MONTH(CURRENT_DATE());";

	$stmt = $this ->conn ->prepare($sql);
	$stmt -> execute([]);
	$result = $stmt ->fetchAll(PDO::FETCH_ASSOC);
	return $result;
		
}
	public function display_pend_sv (){
		$sql = "SELECT 
					s.schedule_id, 
					s.schedule_date, 
					s.status, 
					s.schedule_type, 
					sc.rep_problem AS problem,
					COALESCE (c1.imglink, c2.imglink) as imglink,
					CASE 
						WHEN sc.guest = 0 THEN sc.guest_name 
						WHEN sc.guest = 1 THEN c1.client_name 
						WHEN sc.guest = 2 THEN c2.client_name 
						ELSE NULL 
					END AS client_name,
					CASE 
						WHEN sc.guest = 0 THEN sc.guest_address 
						WHEN sc.guest = 1 THEN c1.client_address 
						WHEN sc.guest = 2 THEN c2.client_address 
						ELSE NULL 
					END AS client_address,
					CASE 
						WHEN sc.guest IN (0, 1) THEN m1.machine_name 
						WHEN sc.guest = 2 THEN m2.machine_name 
						ELSE NULL 
					END AS machine_name,
					CASE 
						WHEN sc.guest IN (0, 1) THEN sc.brand 
						WHEN sc.guest = 2 THEN ct.brand 
						ELSE NULL 
					END AS brand,
					CASE 
						WHEN sc.guest IN (0, 1) THEN sc.model 
						WHEN sc.guest = 2 THEN ct.model 
						ELSE NULL 
					END AS model
				FROM 
					schedule AS s
				LEFT JOIN 
					service_call AS sc ON s.sv_id = sc.sv_id
				LEFT JOIN 
					clients AS c1 ON sc.client_id = c1.client_id
				LEFT JOIN 
					contract AS ct ON sc.contract_id = ct.contract_id
				LEFT JOIN 
					clients AS c2 ON ct.client_id = c2.client_id
				LEFT JOIN 
					machine_type AS m1 ON sc.machine_type = m1.machine_id
				LEFT JOIN 
					machine_type AS m2 ON ct.machine_type = m2.machine_id
				WHERE 
					s.schedule_type = 2 
					AND s.status != 2
	AND s.schedule_date <  DATE_FORMAT(CURRENT_DATE, '%Y-%m-01')";
		$stmt = $this ->conn ->prepare($sql);
		$stmt -> execute([]);
		$result = $stmt ->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	public function display_pend_pm (){
		// $sql = "SELECT schedule.*, contract.brand, contract.model, clients.client_name, clients.client_address, clients.imglink FROM schedule INNER JOIN contract ON schedule.contract_id = contract.contract_id 
		// LEFT JOIN clients ON contract.client_id = clients.client_id WHERE schedule.schedule_date < DATE_FORMAT(CURRENT_DATE, '%Y-%m-01') 
		// AND schedule.status != 2 and contract.isActive = 1";
		$sql = "SELECT contract.*, schedule.schedule_id, schedule.schedule_date, clients.imglink, clients.client_name, clients.client_address from contract RIGHT JOIN schedule on contract.contract_id = schedule.contract_id INNER JOIN clients on contract.client_id = clients.client_id where schedule.status != 2 and contract.isActive = 1 
		and schedule.schedule_date < DATE_FORMAT(CURRENT_DATE, '%Y-%m-01')";
		$stmt = $this ->conn ->prepare($sql);
		$stmt -> execute([]);
		$result = $stmt ->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	public function display_resolved_month (){
		$sql = "SELECT 
			s.schedule_id, 
			s.schedule_date, 
			s.status, 
			s.schedule_type, 
			sc.rep_problem AS problem,
			CASE 
				WHEN sc.guest = 0 THEN sc.guest_name 
				WHEN sc.guest = 1 THEN c1.client_name 
				WHEN sc.guest = 2 THEN c2.client_name 
				ELSE NULL 
			END AS client_name,
			CASE 
				WHEN sc.guest = 0 THEN sc.guest_address 
				WHEN sc.guest = 1 THEN c1.client_address 
				WHEN sc.guest = 2 THEN c2.client_address 
				ELSE NULL 
			END AS client_address,
			CASE 
				WHEN sc.guest IN (0, 1) THEN m1.machine_name 
				WHEN sc.guest = 2 THEN m2.machine_name 
				ELSE NULL 
			END AS machine_name,
			CASE 
				WHEN sc.guest IN (0, 1) THEN sc.brand 
				WHEN sc.guest = 2 THEN ct.brand 
				ELSE NULL 
			END AS brand,
			CASE 
				WHEN sc.guest IN (0, 1) THEN sc.model 
				WHEN sc.guest = 2 THEN ct.model 
				ELSE NULL 
			END AS model,
			CASE 
				WHEN sc.guest = 0 THEN NULL 
				WHEN sc.guest = 1 THEN c1.imglink
				WHEN sc.guest = 2 THEN c2.imglink
				ELSE NULL 
			END AS imglink,
			ac.accomp_date,
			ac.accomp_status,
			ac.withC
		FROM 
			schedule AS s
		LEFT JOIN 
			service_call AS sc ON s.sv_id = sc.sv_id
		LEFT JOIN 
			clients AS c1 ON sc.client_id = c1.client_id
		LEFT JOIN 
			contract AS ct ON sc.contract_id = ct.contract_id
		LEFT JOIN 
			clients AS c2 ON ct.client_id = c2.client_id
		LEFT JOIN 
			machine_type AS m1 ON sc.machine_type = m1.machine_id
		LEFT JOIN 
			machine_type AS m2 ON ct.machine_type = m2.machine_id
		LEFT JOIN 
			accomplished_schedule as ac on s.schedule_id = ac.schedule_id
		WHERE 
			s.schedule_type = 2 
			AND s.status IN(2,3) 
			AND (ct.isActive = 1 OR ct.contract_id IS NULL)
			AND YEAR(s.schedule_date) = YEAR(CURRENT_DATE())
			AND MONTH(s.schedule_date) = MONTH(CURRENT_DATE())

		UNION ALL

		SELECT 
			s.schedule_id, 
			s.schedule_date, 
			s.status, 
			s.schedule_type, 
			NULL AS problem,
			cl.client_name, 
			cl.client_address, 
			m.machine_name, 
			c.brand, 
			c.model,
			cl.imglink,
			ac.accomp_date,
			ac.accomp_status,
			ac.withC
		FROM 
			schedule AS s
		LEFT JOIN 
			contract AS c ON s.contract_id = c.contract_id
		LEFT JOIN 
			clients AS cl ON c.client_id = cl.client_id
		LEFT JOIN 
			machine_type AS m ON c.machine_type = m.machine_id
		LEFT JOIN 
			accomplished_schedule as ac on s.schedule_id = ac.schedule_id
		WHERE 
			s.status IN(2,3)
			AND c.isActive = 1
			AND YEAR(s.schedule_date) = YEAR(CURRENT_DATE())
			AND MONTH(s.schedule_date) = MONTH(CURRENT_DATE());";
		$stmt = $this ->conn ->prepare($sql);
		$stmt -> execute([]);
		$result = $stmt ->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	public function service_done_all () {
		$sql = "SELECT 
			s.schedule_id, 
			s.schedule_date, 
			s.status, 
			s.schedule_type, 
			sc.rep_problem AS problem,
			ct.svUnli,
			CASE 
				WHEN sc.guest = 0 THEN sc.guest_name 
				WHEN sc.guest = 1 THEN c1.client_name 
				WHEN sc.guest = 2 THEN c2.client_name 
				ELSE NULL 
			END AS client_name,
			CASE 
				WHEN sc.guest = 0 THEN sc.guest_address 
				WHEN sc.guest = 1 THEN c1.client_address 
				WHEN sc.guest = 2 THEN c2.client_address 
				ELSE NULL 
			END AS client_address,
			CASE 
				WHEN sc.guest IN (0, 1) THEN m1.machine_name 
				WHEN sc.guest = 2 THEN m2.machine_name 
				ELSE NULL 
			END AS machine_name,
			CASE 
				WHEN sc.guest IN (0, 1) THEN sc.brand 
				WHEN sc.guest = 2 THEN ct.brand 
				ELSE NULL 
			END AS brand,
			CASE 
				WHEN sc.guest IN (0, 1) THEN sc.model 
				WHEN sc.guest = 2 THEN ct.model 
				ELSE NULL 
			END AS model,
			CASE 
				WHEN sc.guest = 0 THEN NULL 
				WHEN sc.guest = 1 THEN c1.imglink
				WHEN sc.guest = 2 THEN c2.imglink
				ELSE NULL 
			END AS imglink,
			ac.accomp_date,
			ac.accomp_status,
			ac.withC,
			ac.id as accomp_id
		FROM 
			schedule AS s
		LEFT JOIN 
			service_call AS sc ON s.sv_id = sc.sv_id
		LEFT JOIN 
			clients AS c1 ON sc.client_id = c1.client_id
		LEFT JOIN 
			contract AS ct ON sc.contract_id = ct.contract_id
		LEFT JOIN 
			clients AS c2 ON ct.client_id = c2.client_id
		LEFT JOIN 
			machine_type AS m1 ON sc.machine_type = m1.machine_id
		LEFT JOIN 
			machine_type AS m2 ON ct.machine_type = m2.machine_id
		LEFT JOIN 
			accomplished_schedule as ac on s.schedule_id = ac.schedule_id
		WHERE 
			s.schedule_type = 2 
			AND s.status IN(2,3) 
			AND (ct.isActive = 1 OR ct.contract_id IS NULL)

		UNION ALL

		SELECT 
			s.schedule_id, 
			s.schedule_date, 
			s.status, 
			s.schedule_type, 
			NULL AS problem,
			c.svUnli,
			cl.client_name, 
			cl.client_address, 
			m.machine_name, 
			c.brand, 
			c.model,
			cl.imglink,
			ac.accomp_date,
			ac.accomp_status,
			ac.withC,
			ac.id as accomp_id
		FROM 
			schedule AS s
		LEFT JOIN 
			contract AS c ON s.contract_id = c.contract_id
		LEFT JOIN 
			clients AS cl ON c.client_id = cl.client_id
		LEFT JOIN 
			machine_type AS m ON c.machine_type = m.machine_id
		LEFT JOIN 
			accomplished_schedule as ac on s.schedule_id = ac.schedule_id
		WHERE 
		 s.status IN(2,3) 
			AND c.isActive = 1";
		$stmt = $this->conn->prepare($sql);
		$stmt ->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;

	}
		public function get_schedule ($id) {
			$sql = "SELECT schedule.schedule_id, schedule.schedule_date, schedule.status, schedule.schedule_type, 
			COALESCE(clients.client_address, service_call.guest_address) as address, 
			CASE WHEN service_call.contract_id IS NOT NULL THEN COALESCE(contract.brand, service_call.brand) 
			ELSE COALESCE(service_call.brand, contract.brand) END AS brand, CASE WHEN service_call.contract_id 
			IS NOT NULL THEN COALESCE(contract.model, service_call.model) ELSE COALESCE(service_call.model, contract.model) END AS model,
			 COALESCE(clients.client_name, CASE WHEN service_call.guest = 0 THEN service_call.guest_name END) AS client_name, service_call.rep_problem, 
			 service_call.contract_id as sv_contract, contract.frequency, contract.contract_id, service_call.sv_id, contract.count, contract.total, contract.sv_call  FROM schedule
			  LEFT JOIN service_call ON schedule.sv_id = service_call.sv_id 

			  LEFT JOIN contract ON schedule.contract_id = contract.contract_id OR service_call.contract_id = contract.contract_id 
			LEFT JOIN clients ON (contract.client_id = clients.client_id) OR (service_call.client_id = clients.client_id) 
			WHERE schedule.status != 2 AND schedule.schedule_id= :id";
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
	$sql = "INSERT INTO `accomplished_schedule` ( `schedule_id`, `accomp_date`, `diagnosis`, `service_don`, `recomm`, `accomp_status`, `withC`)
	VALUES (:schedule_id, :s_date,  :diagnosis,  :c_done, :c_recom,  :aStatus, :withC)";
	$stmt = $this->conn->prepare($sql);
	$stmt -> execute(['schedule_id'=>$schedule_id, 's_date'=>$s_date, 'diagnosis'=>$diagnosis,'c_done'=>$c_done, 'c_recom'=>$c_recom, 'aStatus'=>$status, 'withC'=>$withC]);
	return $this->conn->lastInsertId();
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
	$sql = "DELETE FROM schedule WHERE `schedule`.`schedule_id` = :schedule_id AND schedule.schedule_type = 2";
	$stmt = $this->conn->prepare($sql);
	$result = $stmt -> execute(['schedule_id'=>$schedule_id]);
	return $result;
}
public function delete_svcall($sv_call) {
		$sql = "DELETE FROM service_call WHERE `service_call`.`sv_id` = :sv_call";
	$stmt = $this->conn->prepare($sql);
	$stmt -> execute(['sv_call'=>$sv_call]);
	return true;
	
}

public function add_pms_sched ($contract_id, $frequency, $s_date){
	$sql = "INSERT INTO `schedule` (`schedule_type`, `contract_id`, `sv_id`, `schedule_date`, `status`) VALUES ('1', :contract_id, 0, :s_date, '0')";
	$stmt = $this->conn->prepare($sql);
	$months  = ($frequency == '1') ? 3 : ($frequency == '2' ? 6 : 12);
	$new_date = date('Y-m-d', strtotime("+$months month", strtotime($s_date)));
	$stmt -> execute(['contract_id'=>$contract_id, 's_date'=>$new_date]);
	return true;	
}
public function add_pms_bulk ($contract_id, $s_date, $status){
	$sql = "INSERT INTO `schedule` (`schedule_id`, `schedule_type`, `contract_id`, `sv_id`, `schedule_date`, `status`) VALUES ('', '1', :contract_id, 0, :s_date, :status)";
	$stmt = $this->conn->prepare($sql);
	$stmt -> execute(['contract_id'=>$contract_id, 's_date'=>$s_date, 'status'=>$status]);
	return $this->conn->lastInsertId();
}
public function get_contract($id) {
		$sql = "SELECT * FROM `contract` WHERE client_id = :id and status = 2 AND isActive != 0";
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

	public function udpate_contract($contract_id, $brand, $model, $frequency, $turn_over, $coverageInput, $pTurn_over, $pCoverage, $status, $newCount, $newTotal, $sv_count ) {
		try{
$sql = "Update contract SET brand = :brand, model = :model, frequency = :frequency, turn_over = :turn_over, coverage = :coverage, pTurn_over = :pTurn_over, pCoverage = :pCoverage,
		status = :status, count = :newCount, total = :newTotal, sv_call = :sv_count WHERE contract_id = :contract_id";
		$stmt = $this->conn->prepare($sql);
		$result = $stmt->execute(['brand'=>$brand, 'model'=>$model, 'frequency'=>$frequency, 'turn_over'=>$turn_over, 'coverage'=>$coverageInput, 'pTurn_over'=>$pTurn_over,
	'pCoverage'=>$pCoverage, 'status'=>$status, 'newCount'=>$newCount, 'newTotal'=>$newTotal, 'sv_count'=>$sv_count, 'contract_id'=>$contract_id]);
		return $result; 
		}
		catch (PDOException $e) {
        return json_encode([
            'status' => 'error',
            'message' => 'Insert Contract Failed: ' . $e->getMessage()
        ]);
    }
		
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
public function restore_contract($contract_id){
	$sql = "Update contract SET isActive = 1 where contract_id = :contract_id";
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
		$result = $stmt->fetch();
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
		$sql = "SELECT accomplished_schedule.id as accomp_id,  accomplished_schedule.diagnosis,  accomplished_schedule.service_don,  accomplished_schedule.recomm ,accomplished_schedule.accomp_status, accomplished_schedule.withC, 
		schedule.*, COALESCE(contract.contract_id, service_call.sv_id) AS id, COALESCE(contract.brand, service_call.brand) as brand, 
		COALESCE(contract.model, service_call.model) as model, COALESCE(clients.client_name, CASE WHEN service_call.guest = 0 THEN service_call.guest_name END) AS client_name, 
		COALESCE(clients.imglink, '../image/uploads/mv santiago.webp') as imglink, COALESCE(clients.client_address, service_call.guest_address) AS client_address, service_call.rep_problem, accomplished_schedule.accomp_date 
		FROM schedule LEFT JOIN service_call ON (schedule.schedule_type = 2 AND schedule.sv_id = service_call.sv_id) 
		 LEFT JOIN contract ON schedule.contract_id = contract.contract_id OR service_call.contract_id = contract.contract_id 
		LEFT JOIN clients ON (contract.client_id = clients.client_id) OR (service_call.client_id = clients.client_id) LEFT JOIN accomplished_schedule ON (schedule.schedule_id = accomplished_schedule.schedule_id) 
		WHERE schedule.status IN (2, 3) and accomplished_schedule.id = :accomp_id ORDER BY schedule.schedule_id DESC;";
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
	public function viewSvContract($contract_id, $status) {
		$sql = "SELECT accomplished_schedule.*, schedule.schedule_date, service_call.rep_problem FROM accomplished_schedule LEFT JOIN schedule on accomplished_schedule.schedule_id = schedule.schedule_id 
		LEFT JOIN service_call on schedule.sv_id = service_call.sv_id where service_call.contract_id = :contract_id";
		$stmt = $this ->conn ->prepare($sql);
		$stmt -> execute(['contract_id'=>$contract_id]);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
		
	}	
public function countAllSchedule() {
    $sql = "SELECT 
		SUM(allSchedule) AS totalSchedules
			FROM (
				-- Count schedules with status = 2, linked to an active contract, within the current month
				SELECT 
					COUNT(schedule.schedule_id) AS allSchedule 
				FROM 
					schedule 
				LEFT JOIN 
					contract ON schedule.contract_id = contract.contract_id 
				WHERE 
					schedule.status = 2 
					AND YEAR(schedule.schedule_date) = YEAR(CURRENT_DATE()) 
					AND contract.isActive = 1

				UNION ALL

				-- Count schedules linked to service calls, active contracts, or no contract, excluding status 2
				SELECT 
					COUNT(schedule.schedule_id) AS allSchedule 
				FROM 
					schedule 
				LEFT JOIN 
					service_call ON schedule.sv_id = service_call.sv_id 
				LEFT JOIN 
					contract ON service_call.contract_id = contract.contract_id 
				WHERE 
					(contract.isActive = 1 OR contract.contract_id IS NULL) -- Include active contracts or no contract
					AND schedule.contract_id = 0 -- Schedule not directly linked to a contract
					AND schedule.status = 2 
					AND YEAR(schedule.schedule_date) = YEAR(CURRENT_DATE()) 
			) AS combinedCounts;";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchColumn();
}
public function countAllSv() {
    $sql = "SELECT COUNT(schedule_id) as allSchedule FROM schedule
			LEFT JOIN 
				service_call ON schedule.sv_id = service_call.sv_id
			LEFT JOIN 
				contract ON service_call.contract_id = contract.contract_id
			WHERE 
				(contract.isActive = 1 OR contract.contract_id IS NULL) -- Include active contracts or no contract at all
				AND YEAR(`schedule_date`) = YEAR(CURRENT_DATE())
			 AND schedule_type = 2 -- Schedule not directly linked to a contract
				AND schedule.status = 2;";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchColumn();
}
public function countAllPms() {
    $sql = "SELECT COUNT(schedule_id) as allSchedule FROM schedule RIGHT join contract on schedule.contract_id = contract.contract_id where YEAR(`schedule_date`) = YEAR(CURRENT_DATE())  and schedule.contract_id > 0 and schedule.status = 2 and contract.isActive = 1;";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchColumn();
}
public function pendPms() {
    $sql = "SELECT COUNT(schedule_id) as allSchedule 
	FROM schedule RIGHT join contract on schedule.contract_id = contract.contract_id 
	where schedule.schedule_date < DATE_FORMAT(CURRENT_DATE, '%Y-%m-01')  and schedule.contract_id > 0 and schedule.status != 2 and contract.isActive = 1;";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchColumn();
}
public function pendSv() {
    $sql = "SELECT COUNT(schedule_id) as allSchedule FROM schedule
			LEFT JOIN 
				service_call ON schedule.sv_id = service_call.sv_id
			LEFT JOIN 
				contract ON service_call.contract_id = contract.contract_id
			WHERE 
				(contract.isActive = 1 OR contract.contract_id IS NULL) -- Include active contracts or no contract at all
				AND schedule.schedule_date < DATE_FORMAT(CURRENT_DATE, '%Y-%m-01') -- Match up to the last day of the current month
				AND schedule.contract_id = 0 -- Schedule not directly linked to a contract
				AND schedule.status != 2;";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchColumn();
}
public function resolved() {
    $sql = "SELECT COUNT(schedule_id) as allSchedule 
	FROM schedule 
	WHERE schedule.status = 2 
	AND YEAR(schedule_date) = YEAR(CURRENT_DATE())
	AND MONTH(schedule_date) = MONTH(CURRENT_DATE())";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchColumn();
}

public function resolved_all() {
	$sql = "SELECT 
    SUM(allSchedule) AS totalSchedules
		FROM (
			-- Count schedules with status = 2, linked to an active contract, within the current month
			SELECT 
				COUNT(schedule.schedule_id) AS allSchedule 
			FROM 
				schedule 
			LEFT JOIN 
				contract ON schedule.contract_id = contract.contract_id 
			WHERE 
				schedule.status IN(2,3)
				AND YEAR(schedule.schedule_date) = YEAR(CURRENT_DATE()) 
				AND MONTH(schedule.schedule_date) = MONTH(CURRENT_DATE()) 
				AND contract.isActive = 1

			UNION ALL

			-- Count schedules linked to service calls, active contracts, or no contract, excluding status 2
			SELECT 
				COUNT(schedule.schedule_id) AS allSchedule 
			FROM 
				schedule 
			LEFT JOIN 
				service_call ON schedule.sv_id = service_call.sv_id 
			LEFT JOIN 
				contract ON service_call.contract_id = contract.contract_id 
			WHERE 
				(contract.isActive = 1 OR contract.contract_id IS NULL) -- Include active contracts or no contract
				AND schedule.contract_id = 0 -- Schedule not directly linked to a contract
				AND schedule.status IN(2,3) 
				AND YEAR(schedule.schedule_date) = YEAR(CURRENT_DATE()) 
				AND MONTH(schedule.schedule_date) = MONTH(CURRENT_DATE())
		) AS combinedCounts;";
				$stmt = $this->conn->prepare($sql);
				$stmt->execute();
				return $stmt->fetchColumn();
		}
		public function schedule() {
			$sql = "SELECT 
			SUM(allSchedule) AS totalSchedules
		FROM (

			SELECT 
				COUNT(schedule.schedule_id) AS allSchedule 
			FROM 
				schedule 
			LEFT JOIN 
				contract ON schedule.contract_id = contract.contract_id 
			WHERE 
				schedule.status != 2 
				AND YEAR(schedule.schedule_date) = YEAR(CURRENT_DATE()) 
				AND MONTH(schedule.schedule_date) = MONTH(CURRENT_DATE()) 
				AND contract.isActive = 1

			UNION ALL

			-- Count schedules linked to service calls, active contracts, or no contract, excluding status 2
			SELECT 
				COUNT(schedule.schedule_id) AS allSchedule 
			FROM 
				schedule 
			LEFT JOIN 
				service_call ON schedule.sv_id = service_call.sv_id 
			LEFT JOIN 
				contract ON service_call.contract_id = contract.contract_id 
			WHERE 
				(contract.isActive = 1 OR contract.contract_id IS NULL) -- Include active contracts or no contract
				AND schedule.contract_id = 0 -- Schedule not directly linked to a contract
				AND schedule.status != 2 
				AND YEAR(schedule.schedule_date) = YEAR(CURRENT_DATE()) 
				AND MONTH(schedule.schedule_date) = MONTH(CURRENT_DATE())
		) AS combinedCounts";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchColumn();
}


public function countSchedule($client_id) {
    $sql = "SELECT SUM(total_schedules) AS total_schedules FROM (
        SELECT COUNT(*) AS total_schedules FROM service_call 
        WHERE client_id = :client_1
        UNION ALL
        SELECT COUNT(*) FROM schedule 
        LEFT JOIN contract ON schedule.contract_id = contract.contract_id 
        WHERE client_id = :client_2
    ) AS all_schedules";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['client_1' => $client_id, 'client_2' => $client_id]);
    $result = $stmt->fetchColumn();
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

	public function check_user_service($user_id, $schedule_id){
		$sql = "SELECT uid from user_sched where user_sched.uid = :user_id AND user_sched.sched_id = :sched_id ";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute(['user_id'=>$user_id, 'sched_id'=>$schedule_id]);
		$result = $stmt->fetchColumn();
		return $result > 0;
	}
	public function user_sched_status($user_id, $schedule_id){
		$sql = "UPDATE user_sched SET user_sched.us_status = 1 where user_sched.uid = :user_id AND user_sched.sched_id = :schedule_id ";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute(['user_id'=>$user_id, 'schedule_id'=>$schedule_id]);
		return true;


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
	$sql = "INSERT INTO `user_notification` (`user_id`, `notification_id`,`is_read`, `read_at`) VALUES (:user_id, :notification_id, 0, NULL)";
	$stmt = $this->conn->prepare($sql);
	$stmt -> execute(['user_id'=>$user_id, 'notification_id'=>$notification_id]);
	return true; 
}
public function getUserNotification($user_id, $limit){
	$sql = "SELECT notification.*, user_notification.user_id from notification LEFT JOIN user_notification 
	on notification.id = user_notification.notification_id where user_notification.user_id = :user_id ORDER BY notification.id DESC LIMIT $limit";
	$stmt = $this->conn->prepare($sql);
	$stmt -> execute(['user_id'=>$user_id]);
	return $stmt->fetchAll(PDO::FETCH_ASSOC); 
}

public function readUserNotification ($user_id){
	$dateTime = date('Y-m-d H:i:s');
	$sql = "UPDATE user_notification SET is_read = 1, read_at = :dateAndTime where user_id = :user_id AND is_read = 0";
	$stmt= $this->conn->prepare($sql);
	$stmt->execute(['dateAndTime'=>$dateTime, 'user_id'=>$user_id]);
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

public function countSchedClient($stmt) {
	$sql = $stmt;
	$stmt= $this->conn->prepare($sql);
	$stmt->execute([]);
	return $stmt->fetchColumn();
}
public function countSchedUser($stmt) {
	$sql = $stmt;
	$stmt= $this->conn->prepare($sql);
	$stmt->execute([]);
	return $stmt->fetchColumn();
}
public function countUserScheduleDone($stmt) {
	$sql = $stmt;
	$stmt= $this->conn->prepare($sql);
	$stmt->execute([]);
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function getUserServ($client_id){
	$sql = "SELECT ud.firstname AS FirstName, SUM(CASE WHEN st.schedule_type = 1 THEN 1 ELSE 0 END) AS TotalCount FROM users ud 
	LEFT JOIN user_sched us ON ud.mem_id = us.uid LEFT JOIN schedule st ON us.sched_id = st.schedule_id AND st.status = 2 
	LEFT JOIN contract c ON st.contract_id = c.contract_id 
	LEFT JOIN service_call sc ON st.sv_id = sc.sv_id WHERE (c.client_id = :client_id OR sc.client_id = :client_id) GROUP BY ud.firstname;";
	$stmt = $this->conn->prepare($sql);
	$stmt->execute(['client_id'=>$client_id]);
	return $stmt->fetchAll(PDO::FETCH_ASSOC);

}

public function display_contract_expiraton () {
	$sql = "SELECT contract.*, clients.* from contract LEFT JOIN clients on contract.client_id = clients.client_id 
	where contract.count =1 AND contract.isActive != 0";
	$stmt = $this ->conn ->prepare($sql);
	$stmt -> execute();
	$result = $stmt ->fetchAll(PDO::FETCH_ASSOC);
	return $result;
}

public function contractExpire() {
    $sql = "SELECT COUNT(contract_id) FROM contract where contract.count = 1 AND isActive = 1";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    $stmt->execute();
    return $stmt->fetchColumn();
}
public function expiredPartsCount() {
    $sql = "SELECT COUNT(contract_id) 
	FROM contract  
	WHERE pCoverage >= DATE_SUB(CURDATE(), INTERVAL 3 MONTH) AND pCoverage <= DATE_ADD(CURDATE(), INTERVAL 2 MONTH)
	AND status = 1 
	AND isActive = 1 
	AND pCoverage != '0000-00-00'";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchColumn();
}
public function expiredParts() {
    $sql = "SELECT contract.*, clients.client_name, clients.client_address, clients.imglink FROM contract LEFT JOIN clients on contract.client_id = clients.client_id 
	WHERE  pCoverage >= DATE_SUB(CURDATE(), INTERVAL 3 MONTH) AND pCoverage <= DATE_ADD(CURDATE(), INTERVAL 2 MONTH)  AND status = 1 AND isActive = 1 AND pCoverage != '0000-00-00';";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    $result = $stmt ->fetchAll(PDO::FETCH_ASSOC);
	return $result;
}

public function reportQuery($query){
	$sql = "$query";
	$stmt= $this->conn->prepare($sql);
	$stmt->execute([]);
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function save_report($location, $filename, $user_id, $dbType){
	$sql = "INSERT INTO `report` (`report_id`, `location`, `report_name`, `report_date`, `generated_by`, `db_type`) VALUES (NULL, :location, :reportName, current_timestamp(), :user_id, :dbType)";
	$stmt = $this->conn->prepare($sql);
	$execute = $stmt->execute(["location"=>$location, "reportName"=>$filename, "user_id"=>$user_id, "dbType"=>$dbType]);
	return $execute;
}
public function delete_report($reportId){
	$sql = "DELETE from report where report.report_id = :reportId";
	$stmt = $this->conn->prepare($sql);
	$execute = $stmt->execute(["reportId"=>$reportId]);
	return $execute;
}

}


?>