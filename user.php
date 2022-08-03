<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >

    <title>Hello, world!</title>
  </head>
  <body>
    <!-- <h1>Hello, world!</h1> -->

    <div class="container mt-4">
      <div class="text-center mt-5 mb-4">
        <h2>User Details</h2>
      </div>
      <input type="text" class="form-control" id="live_search" autocomplete="off" placeholder="search your email.......">

    </div>
    <div id="searchResult"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function()
      {
        //alert("input");
        $("#live_search").keyup(function()
        {
          var input=$(this).val();
          //alert(input);
          if(input !="")
          {
            $.ajax({
              url:"adminhelper.php",
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
  </body>
</html>