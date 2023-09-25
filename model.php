<?php
require("sql.php");

class User {

    public static function login($user, $pass) {
        if(isset($user)) {
            $salt = '$6$rounds=5000$mvcproject$';
            $data = sql("SELECT * FROM users WHERE user = :user AND pass = :pass;", [
                ":user" => $user,
                ":pass" => substr(crypt($pass, $salt), strlen($salt))
            ]);

            if(isset($data[0])) {
                $_SESSION["user"] = $data[0]["user"]; 
                header("Location: index.php?msg=1s");
                
            } else {
                header("Location: index.php?msg=" . urlencode("Var god och försök igen."));
            }
        }
    }

    public static function register($user, $pass, $passverify) {
        if(isset($user)) {
            if(isset($pass)) {
                if($pass == $pasverify) {
                    $salt = '$6$rounds=5000$mvcproject$';
                    $query = sql("INSERT INTO users(user,pass) Values('".$pass."', '".substr(crypt($pass, $salt), strlen($salt))."')");
                }
            }
        }
    }
}

?>