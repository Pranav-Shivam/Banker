<?php
session_start();
require 'dbcon.php';
if(isset($_POST['Update']))
{
    $img = $_FILES['img']['name'];
    $new_img = rand(10,1000)."_".time()."_".$img;
    $img_path = $_FILES['img']['tmp_name'];
    move_uploaded_file($img_path,'uploaded_img/'.$new_img );
    $id = $_GET['id'];
    if($img!=='')   {        
        $query="UPDATE `mydb`.`customer_inf` SET cust_img='$new_img' WHERE id='$id'";
        $run_query=mysqli_query($con,$query);
        if($run_query)
        {
            $_SESSION['message']="Profile Pic Updated ";
            //print_r($run_query);
            header("Location:userprofile.php");
            exit(0);
        }
    }     

    else {
        header("Location:userprofile.php");
        exit(0);
    }
   
  
}


?>