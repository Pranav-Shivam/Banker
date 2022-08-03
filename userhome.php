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
          <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
    <div class="col">
      <div class="p-3 border bg-light">
      <h2 style="margin-left:5px">User Balance Details</h2>
      </div>
    </div>
    &nbsp &nbsp
    &nbsp
    <?php
                        if(mysqli_num_rows($run_query)>0)
                            {
                                foreach($run_query as $cust){?>
    <div class="col">
      <div class="p-3 border bg-light"><div class="text-center">
                    <h2 style="margin-left:5px">Chequing</h2>
                    <h4 style="margin-left:5px"><?php echo("         ".$cust['chequin']); ?> $</h4></div></div>
    </div>
    <div class="col">
      <div class="p-3 border bg-light"><div class="text-center">
                    <h2 style="margin-left:5px">Saving</h2>
                    <h4 style="margin-left:5px"><?php echo("         ".$cust['saving']); ?> $</h4></div></div>
    </div>
    <div class="col">
      <div class="p-3 border bg-light"><div class="text-center">
                    <h2 style="margin-left:5px">Balance</h2>
                    <h4 style="margin-left:5px"><?php echo("         ".$cust['balance']); }}?> $</h4></div></div>
    </div>
          
    </div>
    <br>
        <br>
        <br>
        <br>
        <br>
        <br><br>

        <div class="container" style="height: 300px;">
        <div class="card">
            <div class="card-header">
              <h4>Recent Transaction History
              </h4>
            </div>
            <div class="card-body">
              
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>S No</th>
                    <th>Name</th>
                    <th>Account</th>
                    <th>Date</th>
                    <th>Debit</th>
                    <th>Credit</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                   <?php
                    $query="SELECT * FROM `customer_transaction` WHERE email='$email'";
                    $run_query=mysqli_query($con,$query);
                    if(mysqli_num_rows($run_query)>0)
                    {
                        $i=1;
                        foreach($run_query as $student){
                        ?>
                        <tr>
                        <td> <?= $i ?></td>
                        <td> <?= $student['toname']; ?></td>
                        <td> <?= $student['toaccount']; ?></td>
                        <td><?= $student['transactionTime']; ?></td>
                        <td> - <?= $student['debit']; ?></td>
                        <td> + <?= $student['credit']; ?></td>
                        <td><?= $student['status']; ?></td>
                        
                        </tr>
                        
                        <?php $i=$i+1;
                        
                    }
                    
                }
                else
                    {
                        echo "<h5>No RRecord Found</h5>";
                    }
                  ?>
                
                </tbody>
              </table>
            </div>
          </div>
            
        
        </div>

        <?php include('footer.php');?>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>

</html>

