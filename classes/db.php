<?php

class Db {
    private $host = "localhost";
    private $user = "root";
    private $pwd = "";
    private $dbName = "tms";
	
	public $conn;
    public function __construct() {
        try {
        $dsn = 'mysql:host='.$this->host.';dbname='.$this->dbName;
        $this->conn = new PDO($dsn, $this->user, $this->pwd);
    
        
        }
        catch(PDOException $e){
            echo 'Error :' .$e->getMessage();
        }
        return $this->conn;
    } 
	public function test_input($data) {
		$data = trim ($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	public function showMessage ($type, $message) {
		return '<h5 class="'.$type.'">
				<strong class="font-weight-bolder mb-0 text-center text-danger">'.$message.'</strong>
		</h5>';
	}
 
} 


?>