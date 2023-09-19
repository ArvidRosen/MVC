<?php
session_name("login");
session_start();
require("users.sql");
$msg = "";
if(isset($_POST["username"])){
    $salt = '$6$rounds=5000$kebab$';
    $data = sql("SELECT * FROM users WHERE user = :user AND pass = :pass;",[
        ":user" => $_POST["username"],  
        ":pass" => substr(crypt($_POST["password"], $salt), strlen($salt))
    ]);
    if(isset($data[0])){
        $msg = "Loggades in";
        $_SESSION["user"] = $data[0]["user"]; 
    }else{
        $msg = "Kunde inte logga in";
    }   
}
    /* echo substr(crypt($_POST["password"], $salt), strlen($salt)); */
   /*  echo "<pre>";
    print_r($data);
    echo "</pre>";  */
?>