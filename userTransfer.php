<?php
//session_start();
require 'dbcon.php';
require 'custCode.php';
$email=$_SESSION['email'];
//$email="Shiva@gmail.com";
$x=strlen($email);
//echo $email;
if($x==0)
{
    header("Location:sLogin.php");
}
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
        <title>Transfer</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    </head>

    <body>
        <?php include('nav.php');?><br>
      <br>
        <div class="container" style="height: 500px;">
            <div class="container">
            <div class="text-center">
                            <h3 class="text-primary">User Can Transfer Here</h3>
                            <?php include('message.php');?>
                        </div>
                <form action="custCode.php" method="post" style="margin:45px">
                    <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-envelope text-white"></i></span>
                                    <input type="text" name="account" class="form-control" placeholder="Email/Account">
                    </div>
                    <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-currency-dollar text-white"></i></span>
                                    <input type="number" name="amt" class="form-control" placeholder="Amount " >
                    </div>
                    <div class="input-group mb-3">
                                <span class="input-group-text bg-primary">
                                     &nbspAccount Type &nbsp</span>
                                    &nbsp
                                    &nbsp
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="accType" id="exampleRadios1" value="saving" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                        <span class="input-group-text bg-primary text-white">
                                        <i class="bi bi-save-fill"></i></span> &nbsp
                                            
                                            Saving
                                        </label>
                                        </div> &nbsp
                                        &nbsp &nbsp &nbsp
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="accType" id="exampleRadios2" value="chequin">
                                            <label class="form-check-label" for="exampleRadios2">
                                            <span class="input-group-text bg-primary text-white">
                                            <i class="bi bi-cash-stack"></i></span>
                                                Chequin
                                            </label>
                                        </div>
                                        
                                        
                                </div>
                    <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary">
                                    <i class="bi bi-question-circle text-white"></i></span>
                                    <input type="text" name="sq" class="form-control" placeholder="Security Question">
                                </div>
                    <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-pin-fill text-white"></i></span>
                                    <input type="text" name="pin" class="form-control" placeholder=" Security Answer" >
                    </div>
                    <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-telegram text-white"></i></span>
                                    <textarea class="form-control" name="msg" rows="3" placeholder="Message : (Optional)"></textarea>
                    </div>
                    <div class="d-grid col-12 mx-auto">
                                    <button class="btn btn-success" type="submit" name="transfer"><span></span> Send/Transfer</button>
                    </div>
                </form>
            </div>
        </div>
        
        <br><?php include('footer.php');?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>

</html>

