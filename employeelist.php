<?php
  session_start();
  if(!isset($_SESSION['NAME']))
   {
       echo"<script>
          location.href='adminlogin.php';
       </script>";
   }
?>

<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="login.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body style="background-color:#f9f6f7;">
<div class="panel panel-default">
  <!--<div class="panel-heading">Add Employees</div>-->

    <?php
   include('navbar.php');
      ?>
    
</div>   
<div>

<table class="table table-borderless table-responsive" >
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Phone number</th>
    <th>Address</th>
    <th>Date of Joining</th>
    <th>DOB</th>
    <th>Religion</th>
    <th>Reference</th>
  </tr>
  <?php
    $con=mysqli_connect("localhost","root","","employeetracker");
    if(!$con)
    {
        echo"Database is not connected ";
    }
    $query="SELECT * FROM `employee_register` WHERE 1";
    $result=mysqli_query($con,$query);
    //echo "could not insert".mysqli_error($con).mysqli_errno($con);
 // echo $query;
    ?>
  <tr>
    <?php
      if(mysqli_num_rows($result)>=1)
      {
          $i=0;
          while($row=mysqli_fetch_array($result))
          {
          echo"<td>";
          echo $row[0];
          echo"</td>";
          echo"<td>";
          $_SESSION['EMAIL']=$row[1];
          //echo $_SESSION['EMAIL'];
          echo "<a href='redirect.php?message=$row[1]'>$row[1]</a>";
          echo "</td>";
          echo"<td>";
          echo $row[2];
          echo "</td>";
          echo"<td>";
          echo $row[3];
          echo "</td>";
          echo"<td>";
          echo $row[4];
          echo "</td>";
          echo"<td>";
          echo $row[5];
          echo "</td>";
          echo"<td>";
          echo $row[6];
          echo "</td>";
          echo"<td>";
          echo $row[7];
          echo "</td>";
          echo"<tr>";  
          }
      }
      else
      {
          echo"<center><h3><strong>No Employees Have Been Added</strong></h3></center>";
      }
      
     ?>
    
  </tr>
 
</table>    
    
</div>    
    
</body>
</html>

