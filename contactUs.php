<?php
session_start();

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Contact Us</title>
  </head>
  <body>
  <?php include('nav.php');?>
    
    <div class="container-fluid"  style="margin-top:4vh;height:450px">
      <div class="container">
        
        <h2>Contact Us</h2>
        <h6>
          We would love to hear from you, Please drop us a message if you have any query.
          <br>
          Our experts will get back to you shortly.
        </h6>
        <br>
        <br>
        <form action="contactDone.php" method="POST">
        
        <div class="row">
          <div class="mb-3">
                <?php require 'message.php';  ?>
              </div>
                <div class="col-md-6 mb-4">
                
                
                  <div class="form-outline">
                    <input type="text" id="firstName" name="fname" class="form-control form-control-lg" placeholder="   First Name   "/>
                    
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text" id="lastName" name="lname" class="form-control form-control-lg" placeholder="   Last Name   "/>
                    
                  </div>

                </div>
              </div>
            <br>
            <div class="mb-3">
              
              <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="       Enter your Email Address ">
            </div>
            <div class="mb-3">
              <br>
              <textarea class="form-control" name="add" id="exampleFormControlTextarea1" rows="3" placeholder=" Message:   "></textarea>
            </div>
            <br>
            <center>
                    <button class="btn btn-success text-center mt-2" type="submit" name="contact">
                                    Contact Us
                                </button>

                                <button class="btn btn-danger text-center mt-2" type="button" name="Back" onclick='history.go(-1);'>
                                    Back
                                </button>
            </center>
        </form>
      </div>
    </div>
    <br>
    <br>
    <?php include('footer.php');?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>