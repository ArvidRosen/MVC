<?php
session_name("BAS");/* Gives the session a name */
session_start();/* Starts the session */
require("controller.php");/* Uses the code in controll.php */
require("model.php");/* Uses the code in model.php */
require("view.php");/* Uses the code in view.php */
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
    <style>
        body{
            background-image: url("eggdavwater.png");
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>

    

<?php
    if(isset($_GET["acc"])) {/* Checks if the acc is set in GET request */
        View::form($_GET["acc"]);/* If acc is set to GET request, it will call with form method of the class View */
    } else {
        ?>
        <form action="index.php" method="GET">
        <label for="login">Login?</label><br>
        <input type="radio" name="acc" id="login" value="login"><br><br>
        <label for="register">Register?</label><br>
        <input type="radio" name="acc" id="register" value="register"><br><br>
        <input type="submit" value="submit"><br><br>
    </form>
    <?php
    }

?>
<?php
if(isset($_POST["user"])) {/* Checks if the user is set to in POST request */
    if(isset($_POST["pass"])) {/* Checks if the pass is set to in POST request */
        if($_POST["acc"] == "login") {
            $controller = new Controller($_POST["user"], $_POST["pass"], null, $_POST["acc"]);/* Creates a new instance of the Controller class with user, pass, passVerify as null and acc to prepare login*/
        } else if ($_POST["acc"] == "register")
            $controller = new Controller($_POST["user"], $_POST["pass"], $_POST["passVerify"], $_POST["acc"]);/* Creates a new instance of the Controller class with user, pass, passVerify, acc to prepare register */
    }
}
echo "<br>";/* Prints a linebreak */
if(!isset($_GET["msg"])) {
    echo Controller::throw();/* Calls the Controller class with the method throw */
} else {
    echo $_GET["msg"];
}

?>
</body>
</html>