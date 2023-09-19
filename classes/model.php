<?php
require("controller.php");
session_name("BAS");
session_start();
class User {

    public static function login() {
        $msg = "";
        if(isset($_POST["user"])) {
            $salt = '$6$rounds=5000$kebab$';
            $data = sql("SELECT * FROM users WHERE user = :user AND pass = :pass;", [
                ":user" => $_POST["user"],
                ":pass" => substr(crypt($_POST["pass"], $salt), strlen($salt))
            ]);
            if(isset($data[0])) {
                $_SESSION["user"] = $data[0]["user"]; 
                $msg = "Loggades in.";
                
            } else {
                $msg = "Var god och försök igen.";
            }
        }
    }

    public static function register() {
        if(isset($_POST["user"])) {
            if(isset($_POST["pass"])) {
                if($_POST["pass"] == $_POST["passVerify"]) {
                    $salt = '$6$rounds=5000$kebab$';
                    $query = sql("INSERT INTO users(user,pass) Values('".$_POST["user"]."', '".substr(crypt($_POST["pass"], $salt), strlen($salt))."')");
                    
                }
            }
            
        }
    }
}

?>