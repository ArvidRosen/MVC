<?php
require("classes/mvc.php");
require_once("sql.php");
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
        <input type="radio" name="acc" id="login" value="login"><br><br>
        <label for="register">Register?</label><br>
        <input type="radio" name="acc" id="register" value="register"><br><br>
        <input type="submit" value="submit">
        <a href="<?php header("index.php");?>"><button>Clear form</button></a><br><br><br><br>
    </form>

<?php
if(isset($_GET["acc"])) {
    if($_GET["acc"] == "login") {
?>
        <form action="login.php" method="POST">
            <input type="text" placeholder="username">
            <input type="password" placeholder="password"><br><br>
            <input type="submit" value="submit">
        </form>
<?php
    } else if($_GET["acc"] == "register") {
?>
        <form action="register.php" method="POST">
            <input type="text" placeholder="username">
            <input type="password" placeholder="password">
            <input type="password" placeholder="password"><br><br>
            <input type="submit" value="submit">
        </form>
<?php
    } 
}
?>

    
</body>
</html>