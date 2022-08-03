<?php
session_start();
unset($_SESSION["email"]);
$_SESSION['message']="You Sucessfully Logout  ";
header("Location:index.php");
?>