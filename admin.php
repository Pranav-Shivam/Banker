<?php 
require 'dbcon.php';
// require 'adminCode.php';
require 'adminCode.php';
$email=$_SESSION['email'];
$x=strcasecmp($email,"admin@banking.com");
//echo $email;
if($x!=0)
{
    header("Location:aLogin.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
    
	
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
        <div class="Content">
            
        <center>
        <h1>Admin Home Page</h1>
    
            <div class="container" style="margin-top:15vh;">
                <div style="float:left;border: 3px solid black;padding: 50px;">
                    <h4>Account Information </h4>
                    <br>
                    <a href="accountdetails.php"  targer="_self"  class="text-center">Account Information </a>
                </div>
                <div style="float:right;border: 3px solid black;padding: 50px;">
                    <h4>User Details </h4>
                    <br>
                    <a href="userdetails.php" targer="_self"  style="float:center" >User Details</a></div>
                </div>
            
        </center>
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