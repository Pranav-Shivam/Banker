<style>
    li.nav-item {
    width: 200px;
}
a.nav-link {
    width: 200px;
}
</style>


<?php
$con=mysqli_connect("localhost","root","","mydb");

if(!$con)
{
    die('connection failed'.mysqli_connect_error());
}


?>