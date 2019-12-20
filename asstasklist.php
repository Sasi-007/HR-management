<?php
 include("employee.php");
?>
<html>
<head>
    <title>
        Assigned Task List
    </title>
</head>
<body>
<?php
    $con=mysqli_connect("localhost","root","","employeetracker");
    if(!$con)
    {
        echo"Database is not connected";
    }
    $email=$_SESSION['NAME'];
?>
<div class="w3-main" style="margin-left:300px;margin-top:20px;">
<div class="table-respnsive">
<h2 class="text-primary" align="center">ASSIGNED TASK EMPLOYEE LIST</h2>
<table class="table">
  <thead>
    <tr>
        
      <th scope="col">S.No</th>
      <th scope="col">Employee Name</th>
      <th scope="col">Task Name</th>
      <th scope="col">Date</th>
      <th scope="col">Day</th>
    </tr>
  </thead>
  <tbody>
    <?php
      
      $query="SELECT `employeename`, `taskname`, `date`, `day` FROM `assigntask` WHERE `sendemployeeid`='$email'";
      $result=mysqli_query($con,$query);
      if(mysqli_num_rows($result)>=1)
      {
          while($row=mysqli_fetch_array($result))
          {
              $i=1;
      ?>
    <tr>
     <?php
      
      echo"<th scope='row'>$i</th>";
      echo"<td>";
      echo $row['employeename'];
      echo"</td>";
      echo"<td>";
      echo $row['taskname'];
      echo"</td>";
      echo"<td>";
      echo $row['date'];
      echo"</td>";
      echo"<td>";
      echo $row['day'];
      echo"</td>";
          }
     ?>
    </tr>
    <?php
   }
   
   else{
       echo"<h2>No Task has been Assigned</h2>";
   }
    ?>
  </tbody>
</table>
</div>
    </div>
</body>
</html>