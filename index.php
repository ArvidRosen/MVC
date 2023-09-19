<?php
require("classes/mvc.php");
require("login.php")
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
        <form action="classes/controller.php" method="POST">
            <input type="text" name="user" placeholder="username">
            <input type="password" name="pass" placeholder="password"><br><br>
            <input type="submit" value="submit">
        </form>
<?php
    } else if($_GET["acc"] == "register") {
?>
        <form action="classes/controller.php" method="POST">
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
    ?>
        <?php
        } else{
      ?>
      <a href="logout.php">Logga ut</a><br>
      <?php
      }
       echo $msg;
      ?>
      <!DOCTYPE html>
      <html lang="en">
      <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
      </head>
      <body>
      <style>
            body{
                font-family: verdana;
                background-image: url("https://cdn.pixabay.com/photo/2023/08/20/10/32/ai-generated-8202111_1280.jpg" );
                background-repeat: no-repeat;
                background-size: cover;

        </style>
      </body>
      </html>