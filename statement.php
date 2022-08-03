<?php 
require 'dbcon.php';
require 'adminCode.php';
$email=$_SESSION['email'];
$x=strcasecmp($email,"admin@banking.com");
//echo $email;
if($x!=0)
{
    header("Location:aLogin.php");
}
// require 'adminCode.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Statement</title>
	
	
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body
        {			
            font-family: sans-serif;
            background-color: #E6E6FA;
        }
        .Header
        {
            width: 100%;
            height: 100px;
        }
        .Header
        {
    

        }

        .Content
        {
            width: 78%;
            height: 450px;
            background-color: #FFFFE0;
            border: 2px solid black;
            text-align: center;
            float: right;
        }
        .Slide-bar
        {
        width: 22%;
        height: 450px;
        font-size: larger;
        background-color:white;
        text-align: center;
        float: left;
        }

    </style>
</head>
<body>
<?php include('header.php');?>
<br>
<br>
	<div class="container-fluid"  style="margin-top:10vh;">
    <?php include('message.php');?>
        <div class="Content" style="overflow-y:scroll;display:block;">
            
        <center>
        <h1>Account Details List</h1>
        <h5>View Account details, credit, debit, fund the account or fund transfer transaction summary by user</h5>
        </center>
       
          <div class="card" >
            <div class="card-header">
              <h4>
                User Details <?php
                  if(isset($_POST['statement']))
                  {
                    
                    $email=mysqli_real_escape_string($con,$_POST['statement']);

                    echo "  ".$email;?>
                <a href="sRegister.php" class="btn btn-primary float-end">Add Customer</a>
              </h4>
            </div>
            <div class="card-body">
              
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    
                    <th>Transaction Date</th>
                    <th>Reference No.</th>
                    <th>Transaction Description</th>
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
                        foreach($run_query as $student){
                        ?>
                        <tr>
                        <td><?= $student['transactionTime']; ?></td>
                        <td><?= $student['rfNo']; ?></td>
                        <td>fund transfer to ac <?= $student['toaccount']; ?></td>
                        <td><?= $student['debit']; ?></td>
                        <td><?= $student['credit']; ?></td>
                        <td><?= $student['status']; ?></td>
                        
                        </tr>
                        <?php
                        }
                    }
                    else
                    {
                        echo "<h5>No RRecord Found</h5>";
                    }
                }
                  ?>
                
                </tbody>
              </table>
            </div>
          </div>
            
        
        </div>

        <div class="Slide-bar">
            <div style="margin-top: 105px;">
                <table class="table table-bordered border-dark">
                    <tr>
                        <td class="table-success">
                            <a href="admin.php" >Admin Home</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-success">
                            <a href="userdetails.php" >User Details</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-success">
                            <a href="accountdetails.php" >Account Details</a>
                            
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="table-success">
                            <a href="logout.php">Log Out</a>
                            
                        </td>
                    </tr>   
                </table>
            </div>		
        </div>
    </div>
    <br>
    <br>
    <?php include('footer.php');?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
	<script src="https://code.jquery.com/jquery-3.4.1.min.js">
	</script>
	
</body>
</html>