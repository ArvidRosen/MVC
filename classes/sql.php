<?php 
class ConnectionDB {
    function __construct($dns, $db_user, $db_pass) {
        $this->dns = $dns;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $conn = new PDO($dns, $db_user, $db_pass);
        $conn->setAtttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    function sql($sql, $values = []) {
        global $pdo;
        $queue = $pdo->prepare($sql);
        foreach($vals as $konstants => $val) {
            $queue->bindParam($konstant, $values[$konstants]);
        }
        $queue->execute();
        return $queue->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>