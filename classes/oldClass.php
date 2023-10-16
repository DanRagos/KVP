<?php
require_once 'oldDb.php';

class OldClass extends OldDb {

    public function showOldClients (  ) {
        $sql = "SELECT * from clients";
        $stmt = $this->oldConn->prepare( $sql );
        $stmt->execute();
        return $stmt->fetchAll( PDO::FETCH_ASSOC );

    }
    public function showOldUsers (  ) {
        $sql = "SELECT DISTINCT(pms.service_by) FROM pms";
        $stmt = $this->oldConn->prepare( $sql );
        $stmt->execute();
        return $stmt->fetchAll( PDO::FETCH_ASSOC );

    }
}
?>