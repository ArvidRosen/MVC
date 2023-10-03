<?php

<<<<<<< Updated upstream
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
=======
class Controller {//create a class and name it "controller"
    function __construct($user, $pass, $passverify) { //a function for the constructer code that tell us about the 
        if(isset($user)) { // checking if the code $user is existing and is not null
            if(!isset($passverify)) { // if the code $user is set it's going to check if the code $passverify is not set
                User::login($user, $pass); // we need to log in the user
            } else if(isset($passverify)) { // checking if $user and $passveify are set
                User::register($user, $pass, $passverify);//trying to register the user by $user, $pass and $passveify
>>>>>>> Stashed changes
            }   
        }     
    }

<<<<<<< Updated upstream
    public static function throw() {/* Static function named throw */
        if(isset($_SESSION["user"])) {/* Check if User key is set in SESSION */
            View::printInfo();/* If user is set, call the printInfo method of the class View */
=======
    public static function throw() { //this is a statis method named "throw" within a class
        if(isset($_SESSION["user"])) { // checking if the session named $user is set
            View::printInfo(); //is the "user"session is set it will display information of the user
        } else { // if not
            View::err();// is the "user" session is not set it will display an error
>>>>>>> Stashed changes
        }
    }
}
?>