<?php
session_start();
require 'dbcon.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>updateCustomer</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    </head>

    <body>
    <?php include('nav.php');?><br>
        <div class="container-fluid">
        
            <div class="" >
                <div class="rounded d-flex justify-content-center">
                    <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light">
                        <div class="text-center">
                            <h3 class="text-primary">Register New User</h3>
                        </div>
                        <div class="p-4">
                        <?php include('message.php');?>
                            <form action="custCode.php" method="POST" enctype="multipart/form-data">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-person-plus-fill text-white"></i></span>
                                    <input type="text" name="name" class="form-control" placeholder="Username">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-envelope text-white"></i></span>
                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-key-fill text-white"></i></span>
                                    <input type="password" name="password" class="form-control" placeholder="password">
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary">
                                    <i class="bi bi-calendar-date text-white"></i></span>
                                    <input type="date" name="dob" class="form-control" placeholder="date of birth">
                                </div>
                                <div class="input-group mb-3">
                                <span class="input-group-text bg-primary">
                                     &nbspGender&nbsp</span>
                                    &nbsp
                                    &nbsp
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="MALE" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                        <span class="input-group-text bg-primary text-white">
                                        <i class="bi bi-gender-male"></i></span> &nbsp
                                            
                                            Male
                                        </label>
                                        </div> &nbsp
                                        &nbsp &nbsp &nbsp
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="FEMALE">
                                            <label class="form-check-label" for="exampleRadios2">
                                            <span class="input-group-text bg-primary text-white">
                                            <i class="bi bi-gender-female"></i></span>
                                                Female
                                            </label>
                                        </div>
                                        &nbsp
                                        &nbsp &nbsp &nbsp
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="OTHERS">
                                            <label class="form-check-label" for="exampleRadios2">
                                            <span class="input-group-text bg-primary text-white">
                                            <i class="bi bi-gender-trans"></i></span> &nbsp
                                                Other
                                            </label>
                                        </div>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-star-fill text-white"></i></span>
                                    <input type="number" name="sin" class="form-control" placeholder="Enter Your  SIN Number" >
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-telephone-fill text-white"></i></span>
                                    <input type="number" name="phno" class="form-control" placeholder="Phone Number" >
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-building text-white"></i></span>
                                            <textarea class="form-control" name="address" rows="3" placeholder="Enter Your Address"></textarea>
                                </div>
                                <!-- <div class="input-group mb-3">
                                    
                                <form action="custCode.php" method="post" enctype="multipart/form-data">
                                    <label>Select Image File:</label>
                                    <input type="file" name="image">
                                    <input type="submit" name="upload" value="Upload">
                                </form>
                                </div> -->
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-pin-fill text-white"></i></span>
                                    <input type="text" name="pin" class="form-control" placeholder="Enter Your Security Pin" >
                                </div>
                                
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-person text-white"></i></span>
                                    <input type="file" name="img" class="form-control">
                                </div>

                                <div class="d-grid col-12 mx-auto">
                                    <button class="btn btn-success" type="submit" name="register"><span></span> Sign up</button>
                                </div>
                                <p class="text-center mt-3">Already have an account?
                                    <span class="text-primary"><a class="btn btn-warning text-center mt-2" href="sLogin.php">
                                    Login here </a></span>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><?php include('footer.php');?>
    </body>
</html>