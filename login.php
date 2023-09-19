<?php
session_name("login");/* Session namn */
session_start();/* Starta sessionen */
require("sql.php");/* Hämtar koden som finns i sql.php */
$msg = "";/* Variabel som är tom som används senare i if statment */
if(isset($_POST["username"])){
    $salt = '$6$rounds=5000$kebab$';/* Saltet för kryptering */
    $data = sql("SELECT * FROM users WHERE user = :user AND pass = :pass;",[
        ":user" => $_POST["username"],/* hämtar upp informationen user */
        ":pass" => substr(crypt($_POST["password"], $salt), strlen($salt))/* använder saltet för att kryptera lösenordet och sedan hämtar informationen från pass*/
    ]);
    if(isset($data[0])){/* If statment för att som skickar ett meddelande som beror på ifall man ger rätt lösenord och användarnamn*/
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