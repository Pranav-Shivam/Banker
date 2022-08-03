<?php
session_start();
require 'dbcon.php';

//admin login 
if(isset($_POST['alogin']))
{
    $email=mysqli_real_escape_string($con,$_POST['aemail']);
    $password=mysqli_real_escape_string($con,$_POST['apassword']);
    
    $select = " SELECT * FROM `mydb`.`bank_admin` WHERE email = '$email' && password = '$password' ";

    
    $run_query=mysqli_query($con,$select);
    
    if(mysqli_num_rows($run_query) > 0)
    {
        $_SESSION['message']="Admin Login Sucessfully ";
        $_SESSION['email']=$email;
        //print_r($run_query);
        header("Location:admin.php");
        exit(0);
    }
    else{
        $_SESSION['message']="Admin Can Not Login Sucessfully ";
        header("Location:aLogin.php");
        exit(0);
    }
} 
if(isset($_POST['cblock']))
{
    $cust_id=mysqli_real_escape_string($con,$_POST['cblock']);
    $query="SELECT * FROM customer_inf WHERE id='$cust_id' ";  
    $query_run=mysqli_query($con,$query);
    if(mysqli_num_rows($query_run)>0)
    {
        $customer=mysqli_fetch_array($query_run);
        
        $status="INACTIVE";
        $query1="UPDATE `mydb`.`customer_inf` SET status='$status' WHERE id='$cust_id' ";
        $run_query1=mysqli_query($con,$query1);
        
        if($run_query1)
        {
            $_SESSION['message']="Customer Blocked Sucessfully ";
            print_r($run_query);
            header("Location:admin.php");
            exit(0);
        }
        else{
            $_SESSION['message']="Customer Not Blocked Sucessfully ";
            header("Location:aLogin.php");
            exit(0);
        }
    }
    else{
        $_SESSION['message']="Customer  Not Blocked Sucessfully ";
        header("Location:aLogin.php");
        exit(0);
    }
    
} 
if(isset($_POST['cunblock']))
{
    $cust_id=mysqli_real_escape_string($con,$_POST['cunblock']);
    $query="SELECT * FROM customer_inf WHERE id='$cust_id' ";  
    $query_run=mysqli_query($con,$query);
    if(mysqli_num_rows($query_run)>0)
    {
        $customer=mysqli_fetch_array($query_run);
        
        $status="ACTIVE";
        $query1="UPDATE `mydb`.`customer_inf` SET status='$status' WHERE id='$cust_id' ";
        $run_query1=mysqli_query($con,$query1);
        
        if($run_query1)
        {
            $_SESSION['message']="Customer Unblock Sucessfully ";
            print_r($run_query);
            header("Location:admin.php");
            exit(0);
        }
        else{
            $_SESSION['message']="Customer Not Unblock Sucessfully ";
            header("Location:aLogin.php");
            exit(0);
        }
    }
    else{
        $_SESSION['message']="Customer Not Unblock Sucessfully ";
        header("Location:aLogin.php");
        exit(0);
    }
    
}

if(isset($_POST['cdetele']))
{
    $cust_id=mysqli_real_escape_string($con,$_POST['cdetele']);
   
    
        $query1="DELETE FROM `customer_inf` WHERE id='$cust_id' ";
        $run_query1=mysqli_query($con,$query1);
        
        if($run_query1)
        {
            $_SESSION['message']="Customer Deleted Sucessfully ";
            print_r($run_query);
            header("Location:admin.php");
            exit(0);
        }
        else{
            $_SESSION['message']="Customer Not Deleted Sucessfully ";
            header("Location:aLogin.php");
            exit(0);
        }
   
    
}

 ?>