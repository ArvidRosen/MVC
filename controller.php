<?php

class Controller {/* Creates a class named Controller */
    function __construct($user, $pass, $passverify, $acc) {/* Creates a contructor with user, pass, passverify as parameters */
        if(isset($user)) {/* Checks if user is checked */
            if($acc == "login") {/* If user is set , checks if passverify is not set */
                $user = new User($user, $pass);
                $user->login();/* If passverify is not set, then it will call the login method of the class User  */
            } else if($acc == "register") {/* If passverify is set it will call register method of the class User */
                $user = new User($user, $pass, $passverify);
                $user->register();
                /* User::register($user, $pass, $passverify); */
            }   
        }     
    }

    public static function throw() {/* Static function named throw */
        if(isset($_SESSION["user"])) {/* Check if User key is set in SESSION */
            View::printInfo();/* If user is set, call the printInfo method of the class View */
        }
    }
}
?>