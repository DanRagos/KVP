<?php
require_once 'db.php';

class Tool extends Db {
	// Register New Tool
	public function add_new_tool ($id,$type,$name,$date_request,$model,$serial_no,$manufacturer,
	$location, $owner,$y_interval,$instruct_reference,$first_pm){
		$sql = "INSERT INTO `masterlist` (`id`,`type` , `name`, `model`, `serial`, `manufacturer`, `location`, `owner`, `interval_date`, `instruct_reference`, `last_calib`) 
		VALUES (?, ?,?,?,?,?,?,?,? ,?,?)";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute([$id, $type,$name,$model,$serial_no,$manufacturer,$location,$owner,$y_interval
		,$instruct_reference,$first_pm]);
		return true;
	}
	// Fetch all Masterlist
	
	public function get_list(){
		$sql ="Select * from masterlist where tool_stats != 0";
		$stmt = $this->conn->prepare($sql);
		$stmt ->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	// Edit Tool Details
	public function edit_tool($id){
		$sql ="Select * from masterlist where id = ?";
		$stmt = $this->conn->prepare($sql);
		$stmt ->execute([$id]);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
	}
	// Update Tool Details
	public function update_tool($id, $name){
		$sql ="UPDATE `masterlist` SET `name` = :name WHERE `masterlist`.`id` = :id";
		$stmt = $this->conn->prepare($sql);
		$stmt ->execute(['name'=>$name, 'id'=>$id]);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return true;
	}
	// Mark as Obsolete Details
	public function obsolete_tool ($id) {
		$sql = "UPDATE masterlist SET tool_stats = 0 where id = :id";
		$stmt = $this->conn->prepare($sql);
		$stmt -> execute (['id'=>$id]);
		return true;
	}
	//Show tools schedules
	public function display_schedule () {
		$sql = "Select * from schedule_list";
		$stmt = $this ->conn ->prepare($sql);
		$stmt -> execute();
		$result = $stmt ->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	//Add schedules
	public function add_schedule ($title, $start_date, $deadline_date) {
		$sql = "INSERT INTO `schedule_list` (`id`, `title`, `description`, `start_date`, `deadline_date`) VALUES (NULL, :title, 'Test Description', :start_date, :deadline_date);";
		$stmt = $this ->conn ->prepare($sql);
		$stmt -> execute(['title' => $title, 'start_date' =>$start_date, 'deadline_date' => $deadline_date]);
		$result = $stmt ->fetch(PDO::FETCH_ASSOC);
		return true;
	}
	
	
}
?>