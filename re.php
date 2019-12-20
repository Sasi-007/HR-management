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
   <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script
  src="https://code.jquery.com/jquery-3.4.1.slim.js"
  integrity="sha256-BTlTdQO9/fascB1drekrDVkaKd9PkwBymMlHOiG+qLI="
  crossorigin="anonymous"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="style.css">
    <title>Employee Day Planner</title>
</head>

<body style="background-color:#f9f6f7;">
    <?php
    // echo $_GET['message'];
     $email="venky@gmail.com";
     $empname=$email;
     ?>
      <?php include("navbar.php"); ?>
   	<div class="w3-main" style="margin-left:200px;margin-top:20px;">
     <table class="table table-borderless">
      <tr class="row">
       <th class="">
           <span name="user" class="btn btn-primary">hii</span>
        </th>
       <th class="">
        <button type="submit" data-toggle="collapse" name="task" class="btn btn-primary" data-target="#demo">Today's Task</button>
        </th>
        <th class="">
            <button data-toggle="collapse" name="demos" data-target="#demos"  type="submit" class="btn btn-primary">Completion</button>
        </th>
        <?php 
            $con=mysqli_connect("localhost","root","","employeetracker");
            if(!$con)
                {
                    echo"Database is not connected";
                }
        ?>
        <th class="">
            <span class="btn btn-primary"><?php 
                date_default_timezone_set('Asia/Kolkata');
                $date=date('l') ;
                 echo mysqli_num_rows(mysqli_query($con,"select * from addtask where `done`='1' and day='$date' and `email`='$email'")); ?> Done</span>
        </th>
        <th class="">
           <span class="btn btn-primary"><?php
                date_default_timezone_set('Asia/Kolkata');
                $date=date('l') ;
                echo mysqli_num_rows(mysqli_query($con,"select * from addtask where `done`='0' and day='$date'and `email`='$email'")); ?> Remaning</span>
        </th>                 
        <th class="">
            <button type="button" class="btn btn-primary" data-toggle="collapse" name="task" class="btn btn-primary" data-target="#pendos"><?php
                date_default_timezone_set('Asia/Kolkata');
                $date=date('l') ;
               echo mysqli_num_rows(mysqli_query($con,"select * from addtask where `done`='0' and `email`='$email'")); ?>  Pending</button>
        </th>
    </tr>
        </table>
    <br>
    <br>
    <div id="demo" class="collapse">
        <center><strong>Today's Task</strong></center>
    <div class="row" style="padding-top:20px">
    <div class="col-sm-12" id="demo">
    
     <!--<input class="form-control"  type="text" name="text">-->
      <table class="table ">
       <tr>
           <th>
               Task Name
           </th>
           <th>
               Date
           </th>
           <th>
               Day
           </th>
       </tr> 
       <tr>
        <?php
           //$empname=$email;
           //echo $empname;
           date_default_timezone_set('Asia/Kolkata');
           $month=date('l');
           $query="SELECT `name`, `date`, `month`, `day`,`email` FROM `addtask` WHERE `email`='$empname'";
           $result=mysqli_query($con,$query);
        //echo "could not insert".mysqli_error($con).mysqli_errno($con);
  //echo $query; 
     if(mysqli_num_rows($result)>=1)
        {
          while($row=mysqli_fetch_array($result))
           {
            echo"<td>";
            echo $row['name'];
            echo "</td>";
            echo"<td>";
            echo $row['date'];
            $_SESSION['DATE']=$row['date'];
            echo "</td>";
            echo"<td>";
            echo $row['day'];
            echo "</td>";
            echo"<tr>";  
            }
         
           
        
           }
        else
        {
            echo"<h3>No task Have Been Added</h3>";
        }
        ?>
       </tr>
     
      </table>
            <?php
       if(mysqli_num_rows($result)>=1)
       {
          echo"<input type='submit' style='margin-left:1050px;' name='sub' class='btn btn-primary' >";
         
           echo"</form>";    
       }
     ?> 
    
    </div>
    </div>
 </div>
 <?php 
    $con=mysqli_connect("localhost","root","","employeetracker");
    if(!$con)
    {
        echo"Database is not connected";
    }
  ?>
 <div id="demos" class="collapse">
        <center><strong>Completion Of the Task</strong></center>
    <div class="row" style="padding-top:20px">
    <div class="col-sm-12" id="demos">
    
     <!--<input class="form-control"  type="text" name="text">-->
      <table class="table ">
       <tr>
           <th>
               Task Name
           </th>
           <th>
               Date
           </th>
           <th>
               Day
           </th>

       </tr> 
       <tr>
        <?php
           date_default_timezone_set('Asia/Kolkata');
           $day=date('l');
           $query="SELECT `name`, `date`, `day` FROM `addtask` WHERE  `done`='1' and `email`='$empname'";
           $result=mysqli_query($con,$query);
        //echo "could not insert".mysqli_error($con).mysqli_errno($con);
  //echo $query; 
     if(mysqli_num_rows($result)>=1)
        {
          while($row=mysqli_fetch_array($result))
           {
            echo"<td>";
            echo $row['name'];
            echo "</td>";
            echo"<td>";
            echo $row['date'];
         $_SESSION['DATE']=$row['date'];
            echo "</td>";
            echo"<td>";
            echo $row['day'];
            echo "</td>";
          /* echo"<td>";
            echo"<div class='form-check'>";
            echo"<label class='form-check-label' for='check1'>";
            echo"<form action='check.php' method='post'>";
            echo"<input type='checkbox' class='form-check-input' id='check1'  name='check[]' value='$row[0]'>";   
            echo"</label>";
            echo"</div>";
            echo"</td>";*/
            echo"<tr>";  
            }
         
           
        
           }
        else
        {
            echo"<h3>No task Have Been Finished</h3>";
        }
        ?>
       </tr>
     
      </table>
          
    
    
    </div>
    </div>
 </div>
 <div id="pendos" class="collapse">
        <center><strong>Pending Task</strong></center>
    <div class="row" style="padding-top:20px">
    <div class="col-sm-12" id="pendos">
    
     <!--<input class="form-control"  type="text" name="text">-->
      <table class="table ">
       <tr>
           <th>
               Task Name
           </th>
           <th>
               Date
           </th>
           <th>
               Day
           </th>  
       </tr> 
       <tr>
        <?php
           date_default_timezone_set('Asia/Kolkata');
           $day=date('l');
           $query="SELECT `name`, `date`, `day`,`email` FROM `addtask` WHERE  `done`='0' and `email`='$email'";
           $result=mysqli_query($con,$query);
        //echo "could not insert".mysqli_error($con).mysqli_errno($con);
  //echo $query; 
     if(mysqli_num_rows($result)>=1)
        {
          while($row=mysqli_fetch_array($result))
           {
            echo"<td>";
            echo $row['name'];
            echo "</td>";
            echo"<td>";
            echo $row['date'];
            $_SESSION['DATE']=$row['date'];
            echo "</td>";
            echo"<td>";
            echo $row['day'];
            echo "</td>";
          /* echo"<td>";
            echo"<div class='form-check'>";
            echo"<label class='form-check-label' for='check1'>";
            echo"<form action='check.php' method='post'>";
            echo"<input type='checkbox' class='form-check-input' id='check1'  name='check[]' value='$row[0]'>";   
            echo"</label>";
            echo"</div>";
            echo"</td>";*/
            echo"<tr>";  
            }
         
           
        
           }
        else
        {
            echo"<h3>No task Have Been Pended</h3>";
        }
        ?>
       </tr>
     
      </table> 
       <?php
       if(mysqli_num_rows($result)>=1)
       {
          echo"<input type='submit' style='margin-left:1050px;' name='sub'   class='btn btn-primary' >";
           echo"</form>";    
       }
     ?> 
    
    </div>
    </div>
 </div>
 </div>

</body>
</html>

   