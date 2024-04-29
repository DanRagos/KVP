<?php
require_once 'session.php';
$sql ="Select * from machine_type";
		$stmt = $tool->conn->prepare($sql);
		$stmt ->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			/*foreach($result as $row){
				echo $row['machine_id'];
			}
			*/
?>