<?php
//session_start();
require 'dbcon.php';
require 'custCode.php';
 $email=$_SESSION['email'];
 $x=strlen($email);
//echo $email;
if($x==0)
{
    header("Location:sLogin.php");
}
//$email="Shiva@gmail.com";
$select = " SELECT * FROM `mydb`.`customer_inf` WHERE email = '$email' ";
$run_query=mysqli_query($con,$select);
    
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>User Change</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    </head>

    <body>
        <?php include('nav.php');?><br>
        <br>
   
        <div class="container">
            <div class="row g-2">
                <div class="col-6">
                    
                                <div class="text-center">
                                    <h3 class="text-primary">Change User Name</h3>
                                </div>
                            <?php include('message.php');?>
                            <form action="custCode.php" method="POST">
                                <div class="p-4">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-primary"><i
                                                class="bi bi-person-fill text-white"></i></span>
                                        <input type="text" name="name" class="form-control" placeholder=" Old Username">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-primary"><i
                                                class="bi bi-person-plus-fill text-white"></i></span>
                                        <input type="text" name="uname" class="form-control" placeholder=" New Username">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-primary"><i
                                                class="bi bi-key-fill text-white"></i></span>
                                        <input type="password"  name="upassword" class="form-control" placeholder="password">
                                    </div>
                                    
                                    <center>
                                    <br>
                                    
                                    <br>
                                    <button class="btn btn-primary text-center text-white mt-2" type="submit" name="ucname">
                                        Change User Name
                                    </button>
                                    
                                    </center>
                                    
                                </div>
                            </form>
                        
                       
                </div>


                <div class="col-6">
                <div class="text-center">
                                    <h3 class="text-primary">Change Password</h3>
                                </div>
                            <?php include('message.php');?>
                            <form action="custCode.php" method="POST">
                                <div class="p-4">
                                    
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-primary"><i
                                                class="bi bi-key-fill text-white"></i></span>
                                        <input type="password"  name="password" class="form-control" placeholder="Enter Old password">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-primary"><i
                                                class="bi bi-key-fill text-white"></i></span>
                                        <input type="password"  name="u1password" class="form-control" placeholder="Enter New password">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-primary"><i
                                                class="bi bi-key-fill text-white"></i></span>
                                        <input type="password"  name="u2password" class="form-control" placeholder="Enter New password">
                                    </div>
                                    
                                    <center>
                                    <br>
                                    
                                    <br>
                                    <button class="btn btn-info text-center text-white mt-2" type="submit" name="ucpassword">
                                        Change Password
                                    </button>
                                    
                                    </center>
                                    
                                </div>
                            </form>
                </div>
               
            </div>
        </div>
        <br><br><br><br>
        <br><?php include('footer.php');?>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>

</html>

