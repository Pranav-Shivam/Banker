<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <title>Fogot your password</title>
</head>
<body>

<?php include('nav.php');?><br>
    <div class="container-fluid">
            <div class="">
                <div class="rounded d-flex justify-content-center">
                    <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light">
                        <div class="text-center">
                            <h3 class="text-primary">Customer Can Change Paasword</h3>
                        </div>
                        <?php include('message.php');?>
                        <form action="custCode.php" method="POST">
                            <div class="p-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-person-plus-fill text-white"></i></span>
                                    <input type="text" name="email" class="form-control" placeholder="Enter your Email">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-pin-fill text-white"></i></span>
                                    <input type="number" name="pin" class="form-control" placeholder="Enter Your 4-digit Security Pin" >
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-key-fill text-white"></i></span>
                                    <input type="password"  name="password" class="form-control" placeholder="Enter New Paasword">
                                </div>
                                
                                <center>
                                <br>
                                <div class="form-group">
                                    <button name="forgot" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">Reset Password</button>
                                 </div>
                                </center>
                                <p class="text-center mt-5">Don't have an account?
                                    <span class="text-primary"><a class="btn btn-warning text-center mt-2" href="sRegister.php">
                                    Register here </a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br><?php include('footer.php');?>
    
</body>
</html>