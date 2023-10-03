<?php
session_name("BAS");/* Names the session */
session_start();/* Starts the session */
session_destroy();/* Destroy the session */
header("Location: index.php");/* Redirects to index.php */
?>
