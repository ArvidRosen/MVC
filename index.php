<?php
session_name("BAS");
session_start();
require("controller.php");
require("model.php");
require("view.php");

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
        <input type="submit" value="submit"><br><br>
    </form>

<?php
    if(isset($_GET["acc"])) {
        View::form($_GET["acc"]);
    }

?>
<?php
if(isset($_POST["user"])) {
    if(isset($_POST["pass"])) {
        $controller = new Controller($_POST["user"], $_POST["pass"], $_POST["passVerify"]);
    }
}
echo "<br>";
echo Controller::throw();
?>
</body>
</html>