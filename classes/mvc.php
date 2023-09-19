<?php 
require("sql.php");

class MVC {
    
    function __construct($dns, $db_user, $db_pass) {
        $db = new ConnectionDB($this->dns, $this->db_user, $this->db_pass);
    }
}

?>