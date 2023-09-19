<?php
require("model.php");
class Controller {
    public $user;
    protected $pass, $passVerify;
    function __construct($user, $pass, $passVerify) {
        $this->user = $user;
        $this->pass = $pass;
        $this->passVerify = $passVerify;
    }

    public static function check() {
        if(!isset($_POST["passVerify"])) {
            Model::login();
        } else if(isset($_POST["passVerify"])) {
            Model::register();
        }
    }
}

?>