<?php
require_once("sql.php");
class User {

    public static function login($user, $pass) {
        if(isset($user)) {
            $salt = '$6$rounds=5000$mvcproject$';
            $data = sql("SELECT * FROM users WHERE user = :user AND pass = :pass;", [
                ":user" => $user,
                ":pass" => trim(crypt($pass, $salt), $salt)
            ]);

            if(isset($data[0])) {
                $_SESSION["user"] = $data[0]["user"]; 
            } else {
                header("Location: index.php?msg=" . urlencode("Var god och försök igen."));
            }
        }
    }

    public static function register($user, $pass, $passverify) {
        if(isset($user)) {
            if(isset($pass)) {
                if($pass == $passverify) {
                    $salt = '$6$rounds=5000$mvcproject$';
                    $query = sql("INSERT INTO users(user, pass) Values('".$user."', '".trim(crypt($pass, $salt), $salt)."')");
                    header("Location: index.php?msg=".urlencode(trim(crypt($pass, $salt), $salt)));
                } else {
                    header("Location: index.php?msg=".urlencode("Du kunde inte registrera dig, vänligen försök igen."));
                }
            }
        }
    }
}

?>