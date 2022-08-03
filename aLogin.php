<?php
session_start();
require 'dbcon.php';
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    </head>

    <body>
    <?php include('header.php');?>
    <br>
    <br>
    <center>
        <div class="container-fluid " style="margin-top:13vh;">
            <div class="" >
                <div class="rounded d-flex justify-content-center">
                    <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light">
                        <div class="text-center">
                            <h3 class="text-primary">Admin Login</h3>
                        </div>
                        <?php include('message.php');?>
                        <form action="adminCode.php" method="POST">
                            <div class="p-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-person-plus-fill text-white"></i></span>
                                    <input type="text" name="aemail" class="form-control" placeholder="Username">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-key-fill text-white"></i></span>
                                    <input type="password" name="apassword" class="form-control" placeholder="password">
                                </div>
                                
                                <br>
                                <center>
                                <a type="button" href="index.php" class="btn btn-danger text-center mt-2">Back to Home Page</a>
                                &nbsp
                                &nbsp
                                &nbsp
                                &nbsp
                                &nbsp
                                <button class="btn btn-primary text-center mt-2" type="submit" name="alogin">
                                    Login
                                </button>
                                
                                </center>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </center>
        <br>
        
        <?php include('footer.php');?>
    </body>

</html>
.
