<?php
require_once 'db.php';

class Auth extends Db {
	//register user
	public function register($firstname,$lastname, $username,$email, $password, $type){
		$sql = "INSERT INTO `users` (`mem_id`, `firstname`, `lastname`, `username`, `email`, `password`, `type`, `imglink`)
		VALUES (NULL, :firstname, :lastname, :username, :email, :password, :type, '../uploads/user.png');";
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
		$sql = "SELECT mem_id,username, password from users where username = ? AND userStatus != 0 ";
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
	//Display all Users
	public function showUsers ($id) {
		$sql = "Select * from users where mem_id != ? AND  userStatus !=0 " ;
		$stms = $this -> conn ->prepare($sql);
		 $stms ->execute([$id]);
		$result = $stms->fetchAll(PDO::FETCH_ASSOC);
		return $result;
		
	}
	//Edit Users 
	public function edit_user($id) {
		$sql = "Select * from users where mem_id = ? ";
		$stmt = $this -> conn -> prepare($sql);
		$stmt ->execute([$id]);
		$row = $stmt -> fetch(PDO::FETCH_ASSOC);
		return $row;
		
	}
	public function update_user($firstname,$lastname,$email,$password, $type, $id) {
		$sql = "Update users set firstname = :firstname, lastname = :lastname,email= :email, password = :password, type = :type where mem_id = :id ";
		$stmt = $this -> conn -> prepare($sql);
		$stmt ->execute(['firstname'=>$firstname,'lastname'=>$lastname,'email'=>$email,'password'=>$password,'type'=>$type,'id'=>$id]);
		$row = $stmt -> fetch(PDO::FETCH_ASSOC);
		return true;
		
	}

	public function delete_user($id) {
		$sql = "UPDATE users SET userStatus = 0 where mem_id = :id";
		$stmt = $this -> conn -> prepare($sql);
		$stmt ->execute(['id'=>$id]);
		return true;
		
	}
	
	
}

?>