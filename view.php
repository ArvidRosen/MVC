<?php

class View {

    public static function form($acc) {
        if($acc == "register") {
        ?>
            <form action="index.php" method="POST">
                <input type="text" name="user" placeholder="username">
                <input type="password" name="pass" placehoslder="password">
                <input type="password" name="passVerify" placeholder="password verify"><br><br>
                <input type="submit" value="submit">
            </form>
        <?php
        } else if ($acc == "login") {
            ?>
            <form action="index.php" method="POST">
                <input type="text" name="user" placeholder="username">
                <input type="password" name="pass" placeholder="password"><br><br>
                <input type="submit" value="submit">
            </form>
            <?php
        }
    }
    public static function printInfo() {
        $salt = '$6$rounds=5000$mvcproject$';
        $query = sql("SELECT * FROM Users WHERE user = :user AND pass = :pass", [
            ":user" => $_POST["user"],
            ":pass" => trim(crypt($_POST["pass"], $salt), $salt)
        ]);
        echo "Username: ".$_POST["user"]."<br>"; 
        echo "Password: ".$query[0]["pass"]."<br>";
        ?>
        <a href="logout.php">Logga ut</a><br>
        <?php
    }

    public static function err() {
        echo urldecode($_GET["msg"]);
    }
}


?>