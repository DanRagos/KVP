<?php
session_start();
require_once '../classes/auth.php';
$user = new Auth ();
//For Registration Ajax
	if (isset($_POST['action'])&& $_POST['action'] == 'register'){

		$name = $user->test_input($_POST['firstname']);
		$lastname = $user->test_input($_POST['lastname']);
		$username = $user->test_input($_POST['username']);
		$password = $user->test_input($_POST['password']);
		$email = $user->test_input($_POST['email']);
		$type = $user->test_input($_POST['level']);
		
		$hpass = password_hash($password, PASSWORD_DEFAULT);
		
		if($user->user_exist($username)){
			echo $user->showMessage('danger','Username already exists');
		}
		else {
			if($user->register($name,$lastname,$username,$email, $password, $type)) {
				echo 'register';
				$_SESSIONS['user'] = $username;
			
			}
			else {
				echo $user->showMessage('danger','Something went wrong');
			}
		} 
		
	}
	//For Login Ajax
	if (isset($_POST['action'])&& $_POST['action'] == 'login'){
		$username = $user -> test_input($_POST['username']);
		$password = $user -> test_input($_POST['password']);
		$loggedInUser = $user ->login($username);
			if ($loggedInUser != null){
				if ($password == $loggedInUser['password']){
					setcookie("username", $username, time()+(7*24*60*60),'/');
					setcookie("password", $loggedInUser['password'], time()+(7*24*60*60),'/');
					echo 'login';
					$_SESSION['user'] = $username;
					$_SESSIONS['id'] = $loggedInUser['mem_id'];
				}
				else {
				echo $user ->showMessage ('danger', 'Pasword is incorrect');
			}	
			}
			else {
				echo $user ->showMessage ('danger', "User doesn't exists");
			}
			
	}

	//DElete

	if (isset($_POST['action'])&& $_POST['action']== 'delete'){
		$user->delete_user($_POST['id']);
		echo 'done';
	}
?>