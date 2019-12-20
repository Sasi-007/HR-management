<?php include("employee.php"); ?>
<?php
    
    if(!isset($_SESSION['EMAIL']))
    {
        echo"<script>location.href='index.php'</script>";
    }
?>
<html lang="en">
<head>
  <title>Receive  Task</title>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <style>
  input[type=text]:focus
      {
          background-color: lightblue;
      }
  </style>
</head>
<body>
<div class="w3-main" style="margin-left:300px;margin-top:20px;">
<?php
    
    $con=mysqli_connect("localhost","root","","employeetracker");
    if(!$con)
    {
        echo"Database is not connected";
    }
?>
  <?php
    /* echo"<div class='toast' data-autohide='false'>";
          echo"<div class='toast-header'>";
          echo"<strong class='mr-auto text-primary'>Toast Header</strong>";
          echo"<small class='text-muted'>5 mins ago</small>";
          echo"<button type='button' class='ml-2 mb-1 close' data-dismiss='toast'>&times;</button>";
          echo"</div>";
          echo"<div class='toast-body'>";
          echo"Some text inside the toast body";
          echo"</div>";
          echo"</div>";*/
          ?>
    
      <script>
      $(document).ready(function(){
      $('.toast').toast('show');
   });
</script>
<div id="pendos" class="">
    <center><strong><h1>Received Task</h1></strong></center>
  <div class="row" style="padding-top:20px">
     <div class="col-sm-12" id="pendos">
     <!--<input class="form-control"  type="text" name="text">-->
      <table class="table ">
       <tr>
           <th>
               Assigned Employee ID
           </th>
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
             Add To Task
           </th>

       </tr> 
       <tr>
        <?php
           date_default_timezone_set('Asia/Kolkata');
           $day=date('l'); 
           $id=$_SESSION['EMAIL'];
           $query="SELECT * FROM `assigntask` WHERE `employeename`='$id'";
        $result=mysqli_query($con,$query);
        //echo "could not insert".mysqli_error($con).mysqli_errno($con);
  //echo $query; 
     if(mysqli_num_rows($result)>=1)
        {
          while($row=mysqli_fetch_array($result))
           {
            echo"<td>";
            echo $row['sendemployeeid'];
            echo "</td>";
            echo"<td>";
            echo $row['taskname'];
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
            echo"<form action='rectaskval.php' method='post'>";
            echo"<input type='checkbox' class='form-check-input' id='check1'  name='check[]' value='$row[1]'>";   
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
          echo"<input type='submit' style='margin-left:1200px;' name='sub'   class='btn btn-primary' >";
           echo"</form>";    
       }
     ?> 
    
    </div>
    </div>
 </div>
</div>