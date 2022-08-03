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


$select = " SELECT * FROM `mydb`.`customer_inf` WHERE email = '$email' ";
$run_query=mysqli_query($con,$select);
 $data = mysqli_fetch_assoc($run_query); 
    
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Card Details</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    </head>

    <body>
        <?php include('nav.php');?><br>
        
        <div class="container" style="height: 200px;">
            <br>
    
            <br>
            
            <?php
            if(mysqli_num_rows($run_query)>0)
                            {
                                foreach($run_query as $cust){?>
       
                           
                <div class="input-group mb-3">
                    <span class="input-group-text bg-primary"><i
                            class="bi bi-card-list text-white"></i></span>
                    <label type="text" name="card"  class="form-control text-center"><h2 style="margin-left:15px"><?php echo("         ".$cust['cardNo']); ?></h2> <p style="float:right"><a href="" >View</a></p> </label>
                </div>
                <?php
                                }
                            }?>
            
            <br>
        </div>
        <div class="container">
        <div class="row g-2">
                <div class="col-6" style="border: 1px solid black;padding: 4px;height: 300px;" >
                <center>
                <img src="uploaded_img/<?php echo $data['cust_img']  ?>" style="width:50%;">
                    </center>
                </div>
                <div class="col-6" style="height: 300px;border: 3px solid white;padding: 15px;">
                    <div class="container" style="border: 3px solid white;padding: 15px;">
                        <h1 style="margin-left:25px">Card Details</h1>
                        <table style="margin-left:35px"><?php
                        if(mysqli_num_rows($run_query)>0)
                            {
                                foreach($run_query as $cust){?>
       
                            <tr>
                                <td><h5 style="margin-left:15px">Card Number   :  </h5></td>
                                <td><h6 style="margin-left:15px"><?php echo("         ".$cust['cardNo']); ?></h6></td>
                                
                            </tr>
                            <tr>
                                <td><h5 style="margin-left:15px">User Name     :  </h5></td>
                                <td><h6 style="margin-left:15px"><?php echo("         ".$cust['cname']); ?></h6></td>
                                
                            </tr>
                            <tr>
                            <td><h5 style="margin-left:15px">Expiry Date           :  </h5></td>
                                <td ><h6 style="margin-left:15px"><?php echo("         ".$cust['exDate']); ?></h6></td>
                                
                            </tr>
                            <tr>
                            <td><h5 style="margin-left:15px">CVV       :  </h5></td>
                                <td><h6 style="margin-left:15px"><?php echo("         ".$cust['cvv']); ?></h6></td>
                                
                            </tr>
                            <td><h5 style="margin-left:15px">Status       :  </h5></td>
                                <td><h6 style="margin-left:15px"><?php echo("         ".$cust['cardStatus']); ?></h6></td>
                                
                            </tr>
                            
                        </table>
                        
                    </div>
                    <form action="custCode.php" method="post" style="float:right">
                    <?php
                        $cs=$cust['cardStatus'];
                        $l="ACTIVE";
                        if(strcmp($cs, $l)==0){
                    ?>
                        <button class="btn btn-danger text-center mt-2" type="submit" name="lock">
                                    LOCK
                                </button>
                                <?php
                        }

                        $cs=$cust['cardStatus'];
                        $l="INACTIVE";
                        if(strcmp($cs, $l)==0){
                    ?>
                        <button class="btn btn-warning text-center mt-2" type="submit" name="unlock">
                                    UN-LOCK
                                </button>
                                <?php }  }
                        } ?>
                        </form>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br><?php include('footer.php');?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>

</html>

