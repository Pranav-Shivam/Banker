<?php
session_start();
require 'dbcon.php';

 
if(isset($_POST['contact']))
{
    $name=mysqli_real_escape_string($con,$_POST['fname'])."  ".mysqli_real_escape_string($con,$_POST['lname']);

    $email=mysqli_real_escape_string($con,$_POST['email']);
    $ad=mysqli_real_escape_string($con,$_POST['add']);

    if(strlen($name)>3)
    {
        $_SESSION['message']="Thanks For Contacting Us";
       
        //print_r($run_query);
        header("Location:sLogin.php");
        exit(0);
    }
    else if(strlen($ad)>3)
    {
        $_SESSION['message']="Thanks For Contacting Us";
       
        //print_r($run_query);
        header("Location:sLogin.php");
        exit(0);
    }
    else if(strlen($email)>3)
    {
        $_SESSION['message']="Thanks For Contacting Us";
       
        //print_r($run_query);
        header("Location:sLogin.php");
        exit(0);
    }
    else{
        $_SESSION['message']="We are Sorry Please Fill Your Details CareFully ";
        header("Location:contactUs.php");
        exit(0);
    }
} 

?>