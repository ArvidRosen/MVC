<?php
require("classes/class.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="GET">
        <label for="login">Login?</label><br>
        <input type="radio" name="reglog" id="login" value="login"><br><br>
        <label for="register">Register?</label><br>
        <input type="radio" name="reglog" id="register" value="register">
        <input type="submit" value="submit2>
    </form>


    <form action="register.php" method="POST"></form>


    <form action="login.php" method="POST"></form>
</body>
</html>