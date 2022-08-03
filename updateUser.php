<?php
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
        <title>updateCustomer</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    </head>

    <body>
    <?php include('nav.php');?><br>
    
    <br>
        <div class="container-fluid">
        
            <div class="" >
                <div class="rounded d-flex justify-content-center">
                    <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light">
                        <div class="text-center">
                            <h3 class="text-primary">User Can Update Here</h3>
                        </div>
                        <div class="p-4">
                        <?php include('message.php');?>
                            <form action="custCode.php" method="POST" enctype="multipart/form-data">
                            <?php
                        if(mysqli_num_rows($run_query)>0)
                            {
                                foreach($run_query as $cust){?>
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-person-plus-fill text-white"></i></span>
                                    <input type="text" name="name" class="form-control" value="<?= $cust['cname'];?>">
                                </div>


                                <div class="input-group mb-3">
                                <span class="input-group-text bg-primary"><i
                                            class="bi bi-gender-trans text-white"></i></span>
                                    <input type="text" name="gender" class="form-control" value="<?= $cust['gender'];?>">
                                    
                                </div>
                                
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-telephone-fill text-white"></i></span>
                                    <input type="number" name="phno" class="form-control" value="<?= $cust['phNo'];?>" >
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-building text-white"></i></span>
                                            <textarea class="form-control" name="address" rows="3"><?= $cust['address'];?></textarea>
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
                                    <input type="text" name="pin" class="form-control" value="<?= $cust['pin'];?>" >
                                </div>
                                <?php }} ?>
                                <div class="d-grid col-12 mx-auto">
                                    <button class="btn btn-success" type="submit" name="updateUser"><span></span> Update User</button>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><?php include('footer.php');?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>