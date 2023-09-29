<?php

class Controller {
    function __construct($user, $pass, $passverify) {
        if(isset($user)) {
            if(!isset($passverify)) {
                User::login($user, $pass);
            } else if(isset($passverify)) {
                User::register($user, $pass, $passverify);
            }   
        }     
    }

    public static function throw() {
        if(isset($_SESSION["user"])) {
            View::printInfo();
        } else {
            View::err();
        }
    }
}
?>