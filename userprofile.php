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
        <title>User Profile</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    </head>

    <body>
        <?php include('nav.php');?><br>
        <br>
        <div class="container" style="height: 600px;">
            <div class="row g-2">
                <div class="col-6" style="height: 300px;" >

                <img src="uploaded_img/<?php echo $data['cust_img']  ?>" style="width:50%;"> <br><br>
                <a class="btn btn-outline-success" href="userPic.php?id=<?php echo $data['id'] ?>">Update Your Profile Pic</a>

                </div>
                <div class="col-6" style="height: 300px;border: 3px solid white;padding: 15px;">
                    <div class="container" style="border: 3px solid white;padding: 15px;">
                        <h1 style="margin-left:25px">Account Details</h1>
                        <table style="margin-left:35px"><?php
                        if(mysqli_num_rows($run_query)>0)
                            {
                                foreach($run_query as $cust){?>
       
                            <tr>
                                <td><h5 style="margin-left:15px">Account Number   :  </h5></td>
                                <td><h6 style="margin-left:15px"><?php   $x=$cust['SIN'];
                                $x=$x*5;echo("         ".$x); 
                                 ?></h6></td>
                                
                            </tr>
                            <tr>
                                <td><h5 style="margin-left:15px">Account Type     :  </h5></td>
                                <td><h6 style="margin-left:15px"><?php echo("         Saving"); ?></h6></td>
                                
                            </tr>
                            <tr>
                            <td><h5 style="margin-left:15px">SIN Number           :  </h5></td>
                                <td ><h6 style="margin-left:15px"><?php echo("         ".$cust['SIN']); ?></h6></td>
                                
                            </tr>
                            <tr>
                            <td><h5 style="margin-left:15px">Account Status       :  </h5></td>
                                <td><h6 style="margin-left:15px"><?php echo("         ".$cust['status']); ?></h6></td>
                                
                            </tr> <?php  }
                        } ?>
                        </table>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="row g-2">
                <div class="col-6" style="height: 200px;padding: 4px; margin-top:10px;">
                <h2 style="margin-left:15px">Login Details</h2>
                <table style="margin-left:35pxmargin-top:40px;"><?php
                        if(mysqli_num_rows($run_query)>0)
                            {
                                foreach($run_query as $cust){?>
                                <tr>
                                <td><h5 style="margin-left:15px"> </h5></td>
                                <td><h6 style="margin-left:15px"> <td><a href="userChange.php">Change</a></td></h6></td>
                                 
                                
                            </tr>
       
                            <tr>
                                <td><h5 style="margin-left:15px">User Name  :  </h5></td>
                                <td><h6 style="margin-left:15px"><?php  echo("         ".$cust['email']); ?></h6></td>
                                 
                                
                            </tr>
                            <tr>
                                <td><h5 style="margin-left:15px">Password     :  </h5></td>
                                <td><h6 style="margin-left:15px"><?php echo("         ".$cust['password']); ?></h6></td>
                                
                            </tr>
                            <?php  }
                        } ?>
                        </table>
                
                </div>
                <div class="col-6" style="height: 200px;padding: 4px;">
                    <div class="container" style="border: 3px solid white;padding: 15px;">
                        <h1 style="margin-left:25px">Contact Details</h1>
                        <table style="margin-left:35px"><?php
                        if(mysqli_num_rows($run_query)>0)
                            {
                                foreach($run_query as $cust){?>
       
                           
                            <td><h5 style="margin-left:15px">Mobile Number           :  </h5></td>
                                <td ><h6 style="margin-left:15px"><?php echo("         ".$cust['phNo']); ?></h6></td>
                                
                            </tr>
                            <tr>
                            <td><h5 style="margin-left:15px">Address        :  </h5></td>
                                <td><h6 style="margin-left:15px"><?php echo("         ".$cust['address']); ?></h6></td>
                                
                            </tr> <?php  }
                        } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <br><?php include('footer.php');?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>

</html>

