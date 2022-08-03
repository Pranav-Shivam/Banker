<?php
 session_start();
 include ("dbcon.php");
 if (isset($_POST['input'])) 
 {
     $input=$_POST['input'];
     //echo $input;
     $query="SELECT * FROM `customer_inf` WHERE email LIKE '{$input}%'";
     $result=mysqli_query($con,$query);
     if(mysqli_num_rows($result)>0)
     {
         ?>
         <table class="table table-bordered table-striped mt-4">
             <thead>
                 
                 <th>SIN</th>
                 <th>User Name</th>
                 <th>Phone No</th>
                 <th>Address</th>
                 <th>Saving Balance</th>
                 <th>Chequin Balance</th>
                 <th>Loan Apply</th>
                 <th>Login status</th>
                 <th>Action</th>
             </thead>
             <tbody>
                 <?php 
                 while($row=mysqli_fetch_assoc($result))
                 {
                     $id=$row['id'];
                     $name=$row['cname'];
                     $add=$row['phNo'];
                     $phn=$row['address'];
                     $bal=$row['balance'];
                     $chbal=$row['chequin'];
                     $status=$row['status'];
                     $loan=$row['loanApply'];
                     $sin=$row['SIN'];
                     ?>
                     <tr>
                         <td><?php echo $sin; ?></td>
                         <td><?php echo $name; ?></td>
                         <td><?php echo $add; ?></td>
                         <td><?php echo $phn; ?></td>
                         <td><?php echo $bal; ?></td>
                         <td><?php echo $chbal; ?></td>
                         <td><?php echo $status; ?></td>
                         <td><?php echo $loan; ?></td>
                         <td>
                         <form action="adminhelper.php" method="post" class="d-inline">
                            <button type="submit"name="acceptLoan" value="<?= $id; ?>" class="btn btn-success btn-sm">Accept</button>
                            <button type="submit"name="rejectLoan" value="<?= $id; ?>" class="btn btn-danger btn-sm">Reject</button>
                            <button type="submit"name="addbalance" value="<?= $id; ?>" class="btn btn-secondary btn-sm">Add Balance</button>
                            <button type="submit"name="cunblock" value="<?= $id; ?>" class="btn btn-info btn-sm">Unblock</button>
                            <button type="submit"name="cblock" value="<?= $id; ?>" class="btn btn-warning btn-sm">Block</button>
                      </form>
                         </td>
                     </tr>
                     <?php
                 }
                 ?>
             </tbody>
         </table>
         <?php
     }
     else
     {
         echo("No data found");
     }
 }

    //admin login 
if(isset($_POST['alogin']))
{
    $email=mysqli_real_escape_string($con,$_POST['aemail']);
    $password=mysqli_real_escape_string($con,$_POST['apassword']);
    
    $select = " SELECT * FROM `mydb`.`bank_admin` WHERE email = '$email' && password = '$password' ";

    
    $run_query=mysqli_query($con,$select);
    
    if(mysqli_num_rows($run_query) > 0)
    {
        $_SESSION['message']="Admin Login Sucessfully ";
        $_SESSION['email']=$email;
        //print_r($run_query);
        header("Location:admin.php");
        exit(0);
    }
    else{
        $_SESSION['message']="Admin Can Not Login Sucessfully ";
        header("Location:aLogin.php");
        exit(0);
    }
} 
//block bank advisory
if(isset($_POST['block']))
{
    $cust_id=mysqli_real_escape_string($con,$_POST['block']);
    $query="SELECT * FROM bank_advisory WHERE id='$cust_id' ";  
    $query_run=mysqli_query($con,$query);
    if(mysqli_num_rows($query_run)>0)
    {
        $customer=mysqli_fetch_array($query_run);
        
        $status="BLOCK";
        $query1="UPDATE `mydb`.`bank_advisory` SET status='$status' WHERE id='$cust_id' ";
        $run_query1=mysqli_query($con,$query1);
        
        if($run_query1)
        {
            $_SESSION['message']="Advisor Blocked Sucessfully ";
            //print_r($run_query);
            header("Location:admin.php");
            exit(0);
        }
        else{
            $_SESSION['message']="Advisor Not Blocked Sucessfully ";
            header("Location:aLogin.php");
            exit(0);
        }
    }
    else{
        $_SESSION['message']="Advisor  Not Blocked Sucessfully ";
        header("Location:aLogin.php");
        exit(0);
    }
    
} 
//unblock bank advisory
if(isset($_POST['unblock']))
{
    $cust_id=mysqli_real_escape_string($con,$_POST['unblock']);
    $query="SELECT * FROM bank_advisory WHERE id='$cust_id' ";  
    $query_run=mysqli_query($con,$query);
    if(mysqli_num_rows($query_run)>0)
    {
        $customer=mysqli_fetch_array($query_run);
        
        $status="UNBLOCK";
        $query1="UPDATE `mydb`.`bank_advisory` SET status='$status' WHERE id='$cust_id' ";
        $run_query1=mysqli_query($con,$query1);
        
        if($run_query1)
        {
            $_SESSION['message']="Advisor Unblock Sucessfully ";
            //print_r($run_query);
            header("Location:admin.php");
            exit(0);
        }
        else{
            $_SESSION['message']="Advisor Not Unblock Sucessfully ";
            header("Location:aLogin.php");
            exit(0);
        }
    }
    else{
        $_SESSION['message']="Advisor Not Unblock Sucessfully ";
        header("Location:aLogin.php");
        exit(0);
    }
    
} 


//CUstomer
if(isset($_POST['acceptLoan']))
{
    $cust_id=mysqli_real_escape_string($con,$_POST['acceptLoan']);
    $query="SELECT * FROM customer_inf WHERE id='$cust_id' ";  
    $query_run=mysqli_query($con,$query);
    if(mysqli_num_rows($query_run)>0)
    {
        $customer=mysqli_fetch_array($query_run);
        $loan=$customer['balance']*10;
        $status="YES";
        $query1="UPDATE `mydb`.`customer_inf` SET loanApply='$status',balance='$loan' WHERE id='$cust_id' ";
        $run_query1=mysqli_query($con,$query1);
        
        if($run_query1)
        {
            $_SESSION['message']="Customer Loan Applied Sucessfully ";
            print_r($run_query);
            header("Location:admin.php");
            exit(0);
        }
        else{
            $_SESSION['message']="Customer Loan Not Applied Sucessfully ";
            header("Location:aLogin.php");
            exit(0);
        }
    }
    else{
        $_SESSION['message']="Customer Loan Not Applied Sucessfully ";
        header("Location:aLogin.php");
        exit(0);
    }
    
} 
if(isset($_POST['rejectLoan']))
{
    $cust_id=mysqli_real_escape_string($con,$_POST['rejectLoan']);
    $query="SELECT * FROM customer_inf WHERE id='$cust_id' ";  
    $query_run=mysqli_query($con,$query);
    if(mysqli_num_rows($query_run)>0)
    {
        $customer=mysqli_fetch_array($query_run);
        
        $status="NO";
        $query1="UPDATE `mydb`.`customer_inf` SET loanApply='$status' WHERE id='$cust_id' ";
        $run_query1=mysqli_query($con,$query1);
        
        if($run_query1)
        {
            $_SESSION['message']="Customer Loan Canceled Sucessfully ";
            print_r($run_query);
            header("Location:admin.php");
            exit(0);
        }
        else{
            $_SESSION['message']="Customer Loan Not Applied Sucessfully ";
            header("Location:aLogin.php");
            exit(0);
        }
    }
    else{
        $_SESSION['message']="Customer Loan Not Applied Sucessfully ";
        header("Location:aLogin.php");
        exit(0);
    }
    
} 
if(isset($_POST['cblock']))
{
    $cust_id=mysqli_real_escape_string($con,$_POST['cblock']);
    $query="SELECT * FROM customer_inf WHERE id='$cust_id' ";  
    $query_run=mysqli_query($con,$query);
    if(mysqli_num_rows($query_run)>0)
    {
        $customer=mysqli_fetch_array($query_run);
        
        $status="INACTIVE";
        $query1="UPDATE `mydb`.`customer_inf` SET status='$status' WHERE id='$cust_id' ";
        $run_query1=mysqli_query($con,$query1);
        
        if($run_query1)
        {
            $_SESSION['message']="Customer Blocked Sucessfully ";
            print_r($run_query);
            header("Location:admin.php");
            exit(0);
        }
        else{
            $_SESSION['message']="Customer Not Blocked Sucessfully ";
            header("Location:aLogin.php");
            exit(0);
        }
    }
    else{
        $_SESSION['message']="Customer  Not Blocked Sucessfully ";
        header("Location:aLogin.php");
        exit(0);
    }
    
} 
if(isset($_POST['cunblock']))
{
    $cust_id=mysqli_real_escape_string($con,$_POST['cunblock']);
    $query="SELECT * FROM customer_inf WHERE id='$cust_id' ";  
    $query_run=mysqli_query($con,$query);
    if(mysqli_num_rows($query_run)>0)
    {
        $customer=mysqli_fetch_array($query_run);
        
        $status="ACTIVE";
        $query1="UPDATE `mydb`.`customer_inf` SET status='$status' WHERE id='$cust_id' ";
        $run_query1=mysqli_query($con,$query1);
        
        if($run_query1)
        {
            $_SESSION['message']="Customer Unblock Sucessfully ";
            print_r($run_query);
            header("Location:admin.php");
            exit(0);
        }
        else{
            $_SESSION['message']="Customer Not Unblock Sucessfully ";
            header("Location:aLogin.php");
            exit(0);
        }
    }
    else{
        $_SESSION['message']="Customer Not Unblock Sucessfully ";
        header("Location:aLogin.php");
        exit(0);
    }
    
}
if(isset($_POST['hRegister']))
{
    
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $password=mysqli_real_escape_string($con,$_POST['password']);
    

    $query="INSERT INTO `mydb`.`bank_advisory` (email,password) VALUES( '$email', '$password')";
    $run_query=mysqli_query($con,$query);
    
    if($run_query)
    {
        $_SESSION['message']="Advisor Created Sucessfully ";
        //print_r($run_query);
        // header("Location:admin.php");
        // exit(0);
    }
    else{
        $_SESSION['message']="Advisor Not Created Sucessfully ";
        // header("Location:aLogin.php");
        // exit(0);
    }
} 
 ?>