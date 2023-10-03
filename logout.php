<?php
<<<<<<< Updated upstream
session_name("BAS");/* Names the session */
session_start();/* Starts the session */
session_destroy();/* Destroy the session */
header("Location: index.php");/* Redirects to index.php */
=======
session_name("BAS"); //setting the name of the session to "BAS"
session_start(); // start the session
session_destroy();//destroy the session and all variables
header("Location: index.php");// indicate the user to the index.php page
>>>>>>> Stashed changes
?>