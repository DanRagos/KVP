<?php

class Db {
    private $host = "localhost";
    private $port = "3310"; // ✅ Add this
    private $user = "root";
    private $pwd = "Dandan2x!";
    private $dbName = "kvp";
    
    public $conn;
    public function __construct() {
        try {
            $dsn = 'mysql:host=' . $this->host . ';port=' . $this->port . ';dbname=' . $this->dbName; // ✅ Include port here
            $this->conn = new PDO($dsn, $this->user, $this->pwd);
        }
        catch(PDOException $e){
            echo 'Error :' . $e->getMessage();
        }
        return $this->conn;
    } 
    public function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    public function showMessage($type, $message) {
        return '<h5 class="'.$type.'">
                <strong class="font-weight-bolder mb-0 text-center text-danger">'.$message.'</strong>
        </h5>';
    }
} 

?>
