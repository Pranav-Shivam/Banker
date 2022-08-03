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
                <th>User Name</th>
                    <th>A/c No.</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>Total Balance</th>
                    <th>Login Status</th>
                    <th>Loan Status</th>
                    <th>Action</th>
                 
             </thead>
             <tbody>
                 <?php 
                 while($row=mysqli_fetch_assoc($result))
                 {
                     $name=$row['cname'];
                     $sin=$row['SIN'];
                     $email=$row['email'];
                     $m=$row['phNo'];
                     $a=$row['address'];
                     $b=$row['balance'];
                     $s=$row['status'];
                     $l=$row['loanApply'];

                     
                     ?>
                     <tr>
                         <td><?php echo $name; ?></td>
                         <td><?php echo $sin; ?></td>
                         <td><?php echo $email; ?></td>
                         <td><?php echo $m; ?></td>
                         <td><?php echo $a; ?></td>
                         <td><?php echo $b; ?></td>
                         <td><?php echo $s; ?></td>
                         <td><?php echo $l ; ?></td>
                         <td>
                         <form action="advisoryCode.php" method="post" class="d-inline">
                        <button type="submit"name="acceptLoan" value="<?= $row['id']; ?>" class="btn btn-success btn-sm">Accept</button>
                        <button type="submit"name="rejectLoan" value="<?= $row['id']; ?>" class="btn btn-danger btn-sm">Reject</button>
                        
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
?>