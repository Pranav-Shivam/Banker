<?php
session_start();
require 'dbcon.php';
// // If file upload form is submitted 
// $status = $statusMsg = ''; 
// if(isset($_POST["upload"])){ 
//     $status = 'error'; 
//     if(!empty($_FILES["image"]["name"])) { 
//         // Get file info 
//         $fileName = basename($_FILES["image"]["name"]); 
//         $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
//         // Allow certain file formats 
//         $allowTypes = array('jpg','png','jpeg','gif'); 
//         if(in_array($fileType, $allowTypes)){ 
//             $image = $_FILES['image']['tmp_name']; 
//             $imgContent = addslashes(file_get_contents($image)); 
//             $email="xyz@gmail.com"
         
//             // Insert image content into database 
//             $insert = $con->query("INSERT into `customer_info` (`image`, `created`) VALUES ('$imgContent', NOW())"); 
             
//             if($insert){ 
//                 $status = 'success'; 
//                 $statusMsg = "File uploaded successfully."; 
//                 $_SESSION['message']='$statusMsg';
//                 //print_r($run_query);
//                 header("Location:sRegister.php");
//                 exit(0);
//             }else{ 
//                 $statusMsg = "File upload failed, please try again."; 
//             }  
//         }else{ 
//             $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
//         } 
//     }else{ 
//         $statusMsg = 'Please select an image file to upload.'; 
//     } 
// } 
 
// Display status message 
if(isset($_POST['register']))
{
    $name=mysqli_real_escape_string($con,$_POST['name']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $password=mysqli_real_escape_string($con,$_POST['password']);
    $phno=mysqli_real_escape_string($con,$_POST['phno']);
    $add=mysqli_real_escape_string($con,$_POST['address']);
    $gender=mysqli_real_escape_string($con,$_POST['gender']);
    $sid=mysqli_real_escape_string($con,$_POST['sin']);
    $img = $_FILES['img']['name'];
    $new_img = rand(10,1000)."_".time()."_".$img;
    $img_path = $_FILES['img']['tmp_name'];
    move_uploaded_file($img_path,'uploaded_img/'.$new_img );
    $pin=mysqli_real_escape_string($con,$_POST['pin']);
    $sql = "SELECT * from customer_inf";
    
    $cv=rand(111,999);
    $cn = rand(1111111111111111,9999999999999999);
    $sid=$sid+1;  

    

    $query="INSERT INTO `customer_inf`( `SIN`, `cname`, `email`, `password`, `phNo`, `address`,`gender`,`pin`,`cvv`,`cardNo`, `cust_img`) VALUES($sid,'$name', '$email', '$password', '$phno','$add','$gender','$pin','$cv','$cn','$new_img')";
    $run_query=mysqli_query($con,$query);
    
    if($run_query)
    {
        $_SESSION['message']="User Created Sucessfully ";
        //print_r($run_query);
        header("Location:sLogin.php");
        exit(0);
    }
    else{
        $_SESSION['message']="Customer Not Created Sucessfully ";
        header("Location:sRegister.php");
        exit(0);
    }
} 
if(isset($_POST['saveUser']))
{
   
        $_SESSION['message']="Customer Saved Sucessfully ";
        //print_r($run_query);
        header("Location:userhome.php");
        exit(0);
    
} 
if(isset($_POST['updateUser']))
{
    $name=mysqli_real_escape_string($con,$_POST['name']);
    $gender=mysqli_real_escape_string($con,$_POST['gender']);
    $address=mysqli_real_escape_string($con,$_POST['address']);
    $phno=mysqli_real_escape_string($con,$_POST['phno']);
    $pin=mysqli_real_escape_string($con,$_POST['pin']);
    $email=$_SESSION['email'];


    $query="UPDATE `mydb`.`customer_inf` SET cname='$name',pin='$pin',phNo='$phno',address='$address',gender='$gender' WHERE email='$email'";
    $run_query=mysqli_query($con,$query);
    
    if($run_query)
    {
        $_SESSION['message']="Customer Updated Sucessfully ";
        //print_r($run_query);
        header("Location:userhome.php");
        exit(0);
    }
    else{
        $_SESSION['message']="Customer Not Updated Sucessfully ";
        header("Location:sLogin.php");
        exit(0);
    }
} 
if(isset($_POST['login']))
{
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $password=mysqli_real_escape_string($con,$_POST['password']);
    $status="ACTIVE";
    $select = " SELECT * FROM `mydb`.`customer_inf` WHERE email = '$email' && password = '$password' && status='$status' ";

    
    $run_query=mysqli_query($con,$select);
    
    if(mysqli_num_rows($run_query) > 0)
    {
        $_SESSION['message']="Customer Login Sucessfully ";
        $_SESSION['email']=$email;
        //print_r($run_query);
        header("Location:userhome.php");
        exit(0);
    }
    else{
        $_SESSION['message']="Customer Can Not Login Sucessfully ";
        header("Location:sLogin.php");
        exit(0);
    }
}
if(isset($_POST['transfer']))
{
    $account=mysqli_real_escape_string($con,$_POST['account']);
    $amount=mysqli_real_escape_string($con,$_POST['amt']);
    $accn=mysqli_real_escape_string($con,$_POST['accType']);
    $email=$_SESSION['email'];
    $nm=substr($account,0,6);
    $sav=0;$che=0;
    $rf=rand(11111,99999);
    $rf="Rx".$rf;
    $sta="debited";

    $query="SELECT * FROM `mydb`.`customer_inf` where email='$email' ";
    $run_query=mysqli_query($con,$query);
    if(mysqli_num_rows($run_query)>0)
    {
        foreach($run_query as $cust){
            
            $sav=$cust['saving'];
            $che=$cust['chequin'];
        }
    }
    $ats="saving";
    $atc="chequin";
    if(strcmp($accn, $ats)==0)
    {
        $send=$sav-$amount;
        $bal=$send+$che;
        if($send>0)
        {
            $query1="INSERT INTO `mydb`.`customer_transaction` (email,toaccount,toname,rfNo,debit,status,balance) VALUES( '$email','$account','$nm','$rf','$amount','$sta','$bal')";
            $run_query1=mysqli_query($con,$query1);

            $query2="UPDATE `mydb`.`customer_inf` SET saving='$send',balance='$bal' WHERE email='$email' ";
            $run_query2=mysqli_query($con,$query2);
            
            if(!$run_query2)
            {
                $_SESSION['message']="Amount Send Not  Sucessfully ";
                header("Location:userhome.php");
                exit(0);
            }
            
            if($run_query1)
            {
                $_SESSION['message']="Amount Send Sucessfully ";
                //print_r($run_query);
                header("Location:Userhome.php");
                exit(0);
            }
            else{
                $_SESSION['message']="Amount Send Not  Sucessfully ";
                header("Location:userhome.php");
                exit(0);
            }
        }
        else{
            $_SESSION['message']=" Amount is Over Limit ";
                header("Location:userTransfer.php");
                exit(0);
        }
    }
    else if(strcmp($accn, $atc)==0)
    {
        $send=$che-$amount;
        $bal=$send+$sav;
        if($send>0)
        {
            $query1="INSERT INTO `mydb`.`customer_transaction` (email,toaccount,toname,rfNo,debit,status,balance) VALUES( '$email','$account','$nm','$rf','$amount','$sta','$bal')";
            $run_query1=mysqli_query($con,$query1);

            $query2="UPDATE `mydb`.`customer_inf` SET chequin='$send',balance='$bal' WHERE email='$email' ";
            $run_query2=mysqli_query($con,$query2);
            
            if(!$run_query2)
            {
                $_SESSION['message']="Amount Send Not Sucessfully ";
                header("Location:userhome.php");
                exit(0);
            }
            
            if($run_query1)
            {
                $_SESSION['message']="Amount Send Sucessfully ";
                //print_r($run_query);
                header("Location:Userhome.php");
                exit(0);
            }
            else{
                $_SESSION['message']="Amount Send Not  Sucessfully ";
                header("Location:userhome.php");
                exit(0);
            }
        }
        else{
            $_SESSION['message']=" Amount is Over Limit ";
                header("Location:userTransfer.php");
                exit(0);
        }
    }
    else{
        $_SESSION['message']=" Please Provides Correct Details ";
            header("Location:userTransfer.php");
            exit(0);
    }
} 
if(isset($_POST['lock']))
{
    $email=$_SESSION['email'];
    $query="SELECT * FROM customer_inf WHERE email='$email' ";  
    $query_run=mysqli_query($con,$query);
    if(mysqli_num_rows($query_run)>0)
    {
        $customer=mysqli_fetch_array($query_run);
        
        $status="INACTIVE";
        $query1="UPDATE `mydb`.`customer_inf` SET cardStatus='$status' WHERE email='$email' ";
        $run_query1=mysqli_query($con,$query1);
        
        if($run_query1)
        {
            $_SESSION['message']="Customer Card Locked Sucessfully ";
            //print_r($run_query);
            header("Location:userhome.php");
            exit(0);
        }
        else{
            $_SESSION['message']="Customer Card Locked not Sucessfully ";
            header("Location:sLogin.php");
            exit(0);
        }
    }
    else{
        $_SESSION['message']="Customer  Card  Locked Never Sucessfully ";
        header("Location:logout.php");
        exit(0);
    }
}
if(isset($_POST['unlock']))
{
    $email=$_SESSION['email'];
    $query="SELECT * FROM customer_inf WHERE email='$email' ";  
    $query_run=mysqli_query($con,$query);
    if(mysqli_num_rows($query_run)>0)
    {
        $customer=mysqli_fetch_array($query_run);
        
        $status="ACTIVE";
        $query1="UPDATE `mydb`.`customer_inf` SET cardStatus='$status' WHERE email='$email' ";
        $run_query1=mysqli_query($con,$query1);
        
        if($run_query1)
        {
            $_SESSION['message']="Customer Card Locked Sucessfully ";
            //print_r($run_query);
            header("Location:userhome.php");
            exit(0);
        }
        else{
            $_SESSION['message']="Customer Card Locked not Sucessfully ";
            header("Location:sLogin.php");
            exit(0);
        }
    }
    else{
        $_SESSION['message']="Customer  Card  Locked Never Sucessfully ";
        header("Location:logout.php");
        exit(0);
    }
}
if(isset($_POST['loan']))
{
   
    
    $email=$_SESSION['email'];
    
    $query="UPDATE `mydb`.`customer_inf` SET loanApply='APPLIED' WHERE email='$email' ";
    $run_query=mysqli_query($con,$query);
    
    if($run_query)
    {
        $_SESSION['message']="Customer Loan Applied Sucessfully ";
        //print_r($run_query);
        header("Location:userhome.php");
        exit(0);
    }
    else{
        $_SESSION['message']="Customer Loan Not Applied Sucessfully ";
        header("Location:sLogin.php");
        exit(0);
    }
}
if(isset($_POST['forgot']))
{
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $password=mysqli_real_escape_string($con,$_POST['password']);
    $pin=mysqli_real_escape_string($con,$_POST['pin']);
    $select = " SELECT * FROM `mydb`.`customer_inf` WHERE email = '$email' ";
    $run_qry=mysqli_query($con,$select);
    $data = mysqli_fetch_assoc($run_qry);

    $query="UPDATE `mydb`.`customer_inf` SET password='$password' WHERE email='$email'and pin ='$pin'";
    $run_query=mysqli_query($con,$query);
    $sav=$data['pin'];
    if($run_query)
    {
        if(strcmp($sav, $pin)==0){
        $_SESSION['message']="Customer password changed Sucessfully ";
    }
        else{
            // $_SESSION['message']=$sav." ------- ".$email;
            $_SESSION['message']="Pin Was not Correct So password changed Not Sucessfully ";
        header("Location:sLogin.php");
        exit(0);
        }
        //print_r($run_query);
        header("Location:sLogin.php");
        exit(0);
    }
    else{
        $_SESSION['message']="Customer password changed Not Sucessfully ";
        header("Location:index.php");
        exit(0);
    }
} 
if(isset($_POST['ucname']))
{

    $email=$_SESSION['email'];
    $uname=mysqli_real_escape_string($con,$_POST['uname']);
    $name=mysqli_real_escape_string($con,$_POST['name']);
    $upassword=mysqli_real_escape_string($con,$_POST['upassword']);
    
    $query="UPDATE `mydb`.`customer_inf` SET cname='$uname' WHERE email='$email' ";
    $run_query=mysqli_query($con,$query);
    
    if($run_query)
    {
        $_SESSION['message']="Customer Updated Sucessfully ";
        //print_r($run_query);
        header("Location:userhome.php");
        exit(0);
    }
    else{
        $_SESSION['message']="Customer Not Updated Sucessfully ";
        header("Location:sLogin.php");
        exit(0);
    }
} 
if(isset($_POST['ucpassword']))
{
    $email=$_SESSION['email'];
    $u1password=mysqli_real_escape_string($con,$_POST['u1password']);
    $password=mysqli_real_escape_string($con,$_POST['password']);
    $u2password=mysqli_real_escape_string($con,$_POST['u2password']);
    
    if(strcmp($u1password,$u2password)==0)
    {
        $query="UPDATE `mydb`.`customer_inf` SET password='$u1password' WHERE email='$email' ";
        $run_query=mysqli_query($con,$query);
        
        if($run_query)
        {
            $_SESSION['message']="Customer Updated Sucessfully ";
            //print_r($run_query);
            header("Location:userhome.php");
            exit(0);
        }
        else{
            $_SESSION['message']="Customer Not Updated Sucessfully :)";
            header("Location:sLogin.php");
            exit(0);
        }
    }
    else{
        $_SESSION['message']="Customer Not Updated Sucessfully ";
        header("Location:sLogin.php");
        exit(0);
    }
} 
?>