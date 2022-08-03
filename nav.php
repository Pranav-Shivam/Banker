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

    <style>
      .dropdown-menu[data-bs-popper] {
    top: 66% !important;
    left: 0 !important;
    margin-top: 0px !important;
}
    </style>
  </head>
  <body>
    <div class="container-fluid mt-4 text-lg ">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <h2>
            
          <center> 
          
          <a class="btn btn-secondary dropdown-toggle fa fa-bars" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" class="fa fa-bars" style="font-size:48px;color:black">
              
          </a>

          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <li><a class="dropdown-item" href="viewUser.php">View </a></li>
            <li><a class="dropdown-item" href="updateUser.php">Edit Profile</a></li>
              <li><a class="dropdown-item" href="userTransfer.php">Transfer</a></li>
              <li><a class="dropdown-item" href="userhome.php">Transaction</a></li>
              <li><a class="dropdown-item" href="userprofile.php">Profile</a></li>
              <li><a class="dropdown-item" href="cardDetails.php">Cards</a></li>
              <li><a class="dropdown-item" href="loan.php">Loans</a></li>
          </ul>
          </center>
          </i></h2>
          <h1>&nbsp &nbsp &nbsp &nbsp   Bank Management System &nbsp &nbsp &nbsp &nbsp 
            &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  
            </h1>   
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent" >
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              &nbsp
                <li class="nav-item">
                <a class="nav-link text-white btn btn-dark" aria-current="page" href="userHome.php"><h4>Home &nbsp</h4></a>
                </li>
                &nbsp &nbsp
                <li class="nav-item"> 
                <a class="nav-link text-white btn btn-dark" href="aboutUs.php"> <h4>About Us</h4> </a>
                </li>
                &nbsp &nbsp
                <li class="nav-item">
                <a class="nav-link text-white btn btn-dark" href="contactUs.php"> <h4>Contact Us</h4> </a>
                </li>
                
            </ul>
            &nbsp &nbsp
            <div class="d-flex text-center">
                
                <a class="" href="sLogin.php" target="_self"><h5><i  aria-hidden="true"></i> <?php if(isset($_SESSION['email'])) {  ?> 
                <a class="nav-link" class="fa fa-user-circle-o" class="btn btn-danger" href="logout.php">Log Out &nbsp &nbsp<?= $_SESSION['email'] ?></a>
              <?php } else {  ?>               
              <a class="nav-link" class="fa fa-user-circle-o" class="btn btn-primary" href="slogin.php">Login Here</a>
              <?php } ?>  </h5></a>
            </div>
            </div>
        </div>
    </nav>
</div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>

<!-- <?php if(isset($_SESSION['email'])) { ?>
                <a class="nav-link" href="logout.php">Log Out</a>
              <?php } else {  ?>               
              <a class="nav-link" href="login.php">Login Here</a>
              <?php } ?> -->