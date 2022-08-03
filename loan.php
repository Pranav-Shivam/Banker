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
        <title>User Home</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    </head>

    <body>
        <?php include('nav.php');?><br>
   
        <div class="container"><center>
        <h1>Hello, <?= $email ?></h1></center>
          <br>
          
          
        <div class="container-fluid">
        
            <div class="" >
                <div class="rounded d-flex justify-content-center">
                    <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light">
                        <div class="text-center">
                            <h3 class="text-primary">User Can View Loan Details Here</h3>
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
                                    <label type="text" name="name" class="form-control" readonly placeholder="">Username :- <?= $cust['cname'];?></label>
                                </div>


                              
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="bi bi-bank text-white"></i></span>
                                    <label type="text" name="loan" class="form-control" readonly placeholder="Phone Number :- <?= $cust['loanApply'];?>" >Loan Status :- <?= $cust['loanApply'];?></label>
                                </div>
                                
                                <?php }}
                                $accn="APPLIED";
                                if(strcmp($accn, $cust['loanApply'])!=0)
                                { ?>
                                    <div class="d-grid col-12 mx-auto">
                                        <button class="btn btn-warning" type="submit" name="loan"><span></span> Apply For Loan</button>
                                    </div>
                                    <br>
                                    <br>
                                <?php }
                                ?>
                                <div class="d-grid col-12 mx-auto">
                                    <button class="btn btn-success" type="button" name="saveUser" onclick = "history.go(-1)"><span></span> Back</button>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <?php include('footer.php');?>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>

</html>

