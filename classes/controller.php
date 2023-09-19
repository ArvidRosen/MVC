<?php
require("model.php");
class Controller {
    function __construct() {
        if(!isset($_POST["passVerify"])) {
            Model::login();
        } else if(isset($_POST["passVerify"])) {
            Model::register();
        } else if(isset($_SESSION["user"])) {
            
        }
    }
}

?>