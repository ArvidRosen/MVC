<?php
session_name("BAS");
session_start();
require("controller.php");
require("model.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC</title>
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
    $controller = new Controller($_POST["user"], $_POST["pass"], $_POST["passVerify"]);
    if($_GET["acc"] == "login") {
?>
        <form action="index.php" method="POST">
            <input type="text" name="user" placeholder="username">
            <input type="password" name="pass" placeholder="password"><br><br>
            <input type="submit" value="submit">
        </form>
<?php
    } else if($_GET["acc"] == "register") {
?>
        <form action="index.php" method="POST">
            <input type="text" name="user" placeholder="username">
            <input type="password" name="pass" placeholder="password">
            <input type="password" name="passVerify" placeholder="password verify"><br><br>
            <input type="submit" value="submit">
        </form>
       
<?php
    } 
}
?>
<?php
        if(!isset($_SESSION["user"])){
            echo urldecode($_GET["msg"]);
    ?>
    <?php
        } else {
            ?>
           <a href="logout.php">Logga ut</a><br>
           <?php
        }
?>
</body>
</html>