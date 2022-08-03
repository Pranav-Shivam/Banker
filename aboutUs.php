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
        <title>About Us</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <style>
            body {
                    font-family: Arial, Helvetica, sans-serif;
                    margin: 0;
                    }

                    html {
                    box-sizing: border-box;
                    }

                    *, *:before, *:after {
                    box-sizing: inherit;
                    }

                    .column {
                    float: left;
                    width: 33.3%;
                    margin-bottom: 16px;
                    padding: 0 8px;
                    }

                    .card {
                    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                    margin: 8px;
                    }

                    .about-section {
                    padding: 50px;
                    text-align: center;
                    background-color: #474e5d;
                    color: white;
                    }

                    .container {
                    padding: 0 16px;
                    }

                    .container::after, .row::after {
                    content: "";
                    clear: both;
                    display: table;
                    }

                    .title {
                    color: grey;
                    }

                    .button {
                    border: none;
                    outline: 0;
                    display: inline-block;
                    padding: 8px;
                    color: white;
                    background-color: #000;
                    text-align: center;
                    cursor: pointer;
                    width: 100%;
                    }

                    .button:hover {
                    background-color: #555;
                    }

                    @media screen and (max-width: 450px) {
                    .column {
                        width: 100%;
                        display: block;
                    }
                }
        </style>
    </head>

    <body>
        <?php include('nav.php');?><br>
        <div class="about-section">
  <h1>About Us Page</h1>
  <p>We are Bank Management Team</p>
  <p>We Provide a bank management Website for User Where he/she Can view,update,transfer, apply for loan, etc. activities  </p>
</div>
<div class="container mt-3">
<h2 style="text-align:center">Our Admin and Advisor</h2>
<div class="row">
  <div class="column">
    <div class="card">
        <center>
      <img src="image/admin.jpg" alt="Admin" style="width:50%">
      <div class="container">
        <h2>Admin</h2>
        <p class="title">CEO & Founder</p>
        <p>Our Admin Is Controling whole Website </p>
        <p>admin@banking.com</p></center>
        <p><a class="button" href="contactUs.php">Contact Us</a></p>
      </div>
    </div>
  </div>


  </div>
</div>
        <br><?php include('footer.php');?>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>

</html>

