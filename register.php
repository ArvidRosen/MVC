<?php
require("sql.php");
if(isset($_POST["user"])) {
    if(isset($_POST["pass"])) {
        if($_POST["pass"] == $_POST["passVerify"]) {
            $salt = '$6$rounds=5000$kebab$';
            $query = sql("INSERT INTO users(user,pass) Values('".$_POST["user"]."', '".substr(crypt($_POST["pass"], $salt), strlen($salt))."')");
        }
    }
}
?>