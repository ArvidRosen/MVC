<?php
require("controller.php");
class User {
    public $user;
    protected $pass, $passVerify;

    function __construct($user, $pass) {
        $this->user = $user;
        $this->pass = $pass;
    }

    public static function login($user, $pass) {

    }

    public static function register($user, $pass, $passVerify) {
        if(isset($_POST["user"])) {
            if(isset($_POST["pass"])) {
                if($_POST["pass"] == $_POST["passVerify"]) {
                    $salt = '$6$rounds=5000$kebab$';
                    $query = sql("INSERT INTO users(user,pass) Values('".$_POST["user"]."', '".substr(crypt($_POST["pass"], $salt), strlen($salt))."')");
                    
                }
            }
            header("index.php");
        }
    }

}

?>