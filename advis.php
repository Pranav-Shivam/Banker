<?php 
require 'dbcon.php';
// require 'adminCode.php';
require 'advisoryCode.php';
$email=$_SESSION['email'];
$x=strcasecmp($email,"advisory@banking.com");
//echo $email;
if($x!=0)
{
    header("Location:hLogin.php");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >

    <title>Advisor</title>
  </head>
  <body>
    <!-- <h1>Hello, world!</h1> -->
    <div class="container-fluid mt-2 ">
        <img src="image/advisor.jpg" style="float:right; width:25%">
        <h1 class="fs-1 mt-5 text-center" style="width:50%; margin-top:20px">Bank Account Management System</h1>
       
       </div>
       <br>
       <br><br>
    <div class="container mt-4">
      <div class="text-center mt-5 mb-4">
        <h2>Advisor Can View User Details</h2>
        <?php include('message.php');?>
      </div>
      <input type="text" class="form-control" id="live_searc" autocomplete="off" placeholder="search user email.......">

    </div>
    <div id="searchResult">
    
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function()
      {
        //alert("input");
        $("#live_searc").keyup(function()
        {
          var input=$(this).val();
          //alert(input);
          if(input !="")
          {
            $.ajax({
              url:"helper.php",
              method:"POST",
              data:{input:input},

              success:function(data){
                $("#searchResult").html(data);
               $("#searchResult").css("display","block");
              },
            });
          }
          else
          {
            $("#searchResult").css("display","none");
          }
        });
      });
    </script>
    <br><br> <center>
            <a href="logout.php" class="btn btn-primary mt-3" type="button">Go to Home Page</a></center><br><br><br>

    <?php include('footer.php');?>
  </body>
</html>