<?php

class Controller {//create a class and name it "controller"
    function __construct($user, $pass, $passverify, $acc) {/* Creates a contructor with user, pass, passverify as parameters */
        if(isset($user)) {// checking if the code $user is existing and is not null
            if($acc == "login") {// if the code $user is set, checks if $acc is equal to the string login, then it will call the login function of the class User
                $user = new User($user, $pass);// assigns a call to the class User assigned to $user to initialize the class.for the login function
                $user->login(); // calls the login function 
            } else if($acc == "register") {/* If $acc is equal to the string register, then it will call the register function of the class User */
                $user = new User($user, $pass, $passverify); // assigns a call to the class User assigned to $user to initialize the class.for the register function
                $user->register(); // calls the register function

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