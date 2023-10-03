<?php

class Controller {//create a class and name it "controller"
    function __construct($user, $pass, $passverify, $acc) {/* Creates a contructor with user, pass, passverify as parameters */
        if(isset($user)) {// checking if the code $user is existing and is not null
            if($acc == "login") {// if the code $user is set it's going to check if the code $passverify is not set
                $user = new User($user, $pass);
                $user->login();/* If passverify is not set, then it will call the login method of the class User  */
            } else if($acc == "register") {/* If passverify is set it will call register method of the class User */
                $user = new User($user, $pass, $passverify);
                $user->register();

            }     
        }
    }
    public static function throw() {/* Static function named throw */
        if(isset($_SESSION["user"])) {/* Check if User key is set in SESSION */
            View::printInfo();//is the "user"session is set it will display information of the user
        }
    }
}

    
?>