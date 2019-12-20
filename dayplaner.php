<?php
include("employee.php");
?>
<?php
    
    if(!isset($_SESSION['EMAIL']))
    {
        echo"<script>location.href='index.php'</script>";
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

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="style.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <title>Day Planner</title>
</head>

<body>
<?php
 $con=mysqli_connect("localhost","root","","employeetracker");
 if(!$con)
    {
     echo"Database is not connected";
    }
 ?>
   	<div class="w3-main" style="margin-left:30px;margin-top:23px;">
       <div style="margin-left:20px;" >
    <span style="font-size:40px;" > <b>Today's Task</b></span>  
     <br>
    
       <span class="btn btn-info" style="font-weight:bold;border-radius:20px;"><?php 
                date_default_timezone_set('Asia/Kolkata');
                $date=date('l') ;
                $email=$_SESSION['EMAIL'];
                echo mysqli_num_rows(mysqli_query($con,"select * from addtask where `done`='1' and day='$date' and `email`='$email'")); ?> Done</span>
                      <span class="btn btn-info" style="font-weight:bold;border-radius:20px;"><?php
                date_default_timezone_set('Asia/Kolkata');
                $date=date('l') ;
                $email=$_SESSION['EMAIL'];
                echo mysqli_num_rows(mysqli_query($con,"select * from addtask where `done`='0' and day='$date'and `email`='$email'")); ?> Remaning</span>
                      <button type="button"class="btn btn-info" style="font-weight:bold;border-radius:20px;"name="task" class="btn btn-primary" data-target="#pendos"><?php
                date_default_timezone_set('Asia/Kolkata');
                $date=date('l') ;
                $email=$_SESSION['EMAIL'];
                echo mysqli_num_rows(mysqli_query($con,"select * from addtask where `done`='0' and `email`='$email'")); ?>  Pending</button>
     
        <?php 
            $con=mysqli_connect("localhost","root","","employeetracker");
            if(!$con)
                {
                    echo"Database is not connected";
                }
        ?>
      
    </div>
    <br>
    <br>
    <div id="demo" >
        
    <div class="row" style="padding-top:10px">
    <div class="col-sm-12" id="demo">
    
     <!--<input class="form-control"  type="text" name="text">-->
      <table class="table table-responsive">
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
           <th>
               Done
           </th>
       </tr> 
       <tr>
        <?php
           $email3=$_SESSION['EMAIL'];
           date_default_timezone_set('Asia/Kolkata');
           $day=date('l');
           $query="SELECT `name`, `date`, `month`, `day`,`email` FROM `addtask` WHERE `day`='$day' and `email`='$email3'";
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
            echo"<td>";
            echo"<div class='form-check'>";
            echo"<label class='form-check-label' for='check1'>";
            echo"<form action='check.php' method='post'>";
            echo"<input type='checkbox' class='form-check-input' id='check1'  name='check[]' value='$row[0]'>";   
            echo"</label>";
            echo"</div>";
            echo"</td>";
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
          echo"<input type='submit' style='margin-left:1050px;' name='sub' class='btn btn-success' >";
         
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
  ?>  <br> <span style="font-size:40px;margin-left:20px;" > <b>Completed Task</b></span>  
     <br>
 <div id="demos">
       
    <div class="row" style="padding-top:20px">
    <div class="col-sm-12" id="demos">
    
     <!--<input class="form-control"  type="text" name="text">-->
      <table class="table table-responsive">
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
           $email=$_SESSION['EMAIL'];
           $query="SELECT `name`, `date`, `day`,`email` FROM `addtask` WHERE  `done`='1' and `email`='$email'";
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
 <div id="pendos"  >
        <span style="font-size:40px;margin-left:20px;" > <b>Pending Task</b></span>
    <div class="row" style="padding-top:20px">
    <div class="col-sm-12" id="pendos">
    
     <!--<input class="form-control"  type="text" name="text">-->
      <table class="table table-responsive">
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
           <th>
               Done
           </th>

       </tr> 
       <tr>
        <?php
           date_default_timezone_set('Asia/Kolkata');
           $day=date('l');
           $email=$_SESSION['EMAIL'];
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
           echo"<td>";
            echo"<div class='form-check'>";
            echo"<label class='form-check-label' for='check1'>";
            echo"<form action='check.php' method='post'>";
            echo"<input type='checkbox' class='form-check-input' id='check1'  name='check[]' value='$row[0]'>";   
            echo"</label>";
            echo"</div>";
            echo"</td>";
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
          echo"<input type='submit' style='margin-left:1050px;' name='sub'   class='btn btn-success' >";
           echo"</form>";    
       }
     ?> 
    <br>
    <br>
    <br>
    </div>
    </div>
 </div>
 </div>

</body>
</html>
