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
        <title>Customer Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    </head>

    <body>
    <?php include('nav.php');?><br>
    
        <div class="container-fluid">
            <div class="">
                <div class="rounded d-flex justify-content-center">
                    <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light">
                        <div class="text-center">
                            <h3 class="text-primary">Update Your Profile Pic</h3>
                        </div>
                       
                        <form action="updatePic.php?id=<?php echo $_GET['id']; ?>" method="POST" enctype="multipart/form-data">
                        <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-person text-white"></i></span>
                                    <input type="file" name="img" class="form-control">
                        </div>
                               
                            <center>
                              
                                <button class="btn btn-success text-center mt-2" type="submit" name="Update">
                                    Update
                                </button>

                                <button class="btn btn-danger text-center mt-2" type="button" name="Back" onclick='history.go(-1);'>
                                    Back
                                </button>
                                
                                </center>
                               
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br><?php include('footer.php');?>
    </body>

</html>

