<?php
include 'db.php';
class Test extends Db {
    public function getUsers () {
        $sql = "Select * from users";
        $stmt = $this->connect()->query($sql);
        while ($row = $stmt->fetch()){
            echo $row['id'] .'ID <br>';
        }
    }
    public function getUsersStmt ($firstname, $lastname) {
        $sql = "Select * from users where firstname = ? and lastname = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt ->execute([$firstname, $lastname]);
        $names = $stmt->fetchAll();

        foreach ($names as $name) {
            echo $name ['firstname']. '<br>';
        }
    }
    public function setUsersStmt ($firstname, $lastname, $username, $level, $position) {
        $sql = "INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `level`, `position`) VALUES 
        (NULL,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt ->execute([$firstname, $lastname, $username, $level, $position]);
    }
}
?>