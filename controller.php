<?php

class Controller {/* Creates a class named Controller */
    function __construct($user, $pass, $passverify) {/* Creates a contructor with user, pass, passverify as parameters */
        if(isset($user)) {/* Checks if user is checked */
            if(!isset($passverify)) {/* If user is set , checks if passverify is not set */
                User::login($user, $pass);/* If passverify is not set, then it will call the login method of the class User  */
            } else if(isset($passverify)) {/* If passverify is set it will call register method of the class User */
                User::register($user, $pass, $passverify);
            }   
        }     
    }

    public static function throw() {/* Static function named throw */
        if(isset($_SESSION["user"])) {/* Check if User key is set in SESSION */
            View::printInfo();/* If user is set, call the printInfo method of the class View */
        } else {
            View::err();/* If user is not set, call the err method of the class View */
        }
    }
}
?>