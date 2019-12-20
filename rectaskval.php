<?php
  session_start();
   $con=mysqli_connect("localhost","root","","employeetracker");
    if(!$con)
    {
        echo"Database is not connected";
    } 
?>
  <?php
   
    $task=$_POST["check"];
    date_default_timezone_set('Asia/Kolkata');
    $date=date("d-m-Y");
    $_SESSION['DATE']=$date;
    $month=date("F");
    $day=date("l");
    $len=sizeof($task);
    $refer=1;
    $email=$_SESSION['EMAIL'];
   for($i=0;$i<$len;$i++)
   {
       
    $query1="UPDATE `assigntask` SET `addtotask`='1' where  `employeename`='$email' and `taskname`='$task[$i]'";
    $result1=mysqli_query($con,$query1);
    //echo "could not insert".mysqli_error($con).mysqli_errno($con);
    //echo $query;
    $query="SELECT `name`, `date`, `month`, `day`,  `referaltask`,`email` FROM `addtask` WHERE ((`name`='$task[$i](Assigned)' and `referaltask`='$refer') and `email`='$email')";
    $result=mysqli_query($con,$query);
    $verify=mysqli_num_rows($result);
      // echo $verify; 
    
    //echo "could not insert".mysqli_error($con).mysqli_errno($con);
    //echo $query;
   }
if($verify<1)
  {
    for($i=0;$i<$len;$i++)
    { 
      $query="INSERT INTO `addtask`(`name`, `date`, `month`, `day`,`done`,`referaltask`,`email`) VALUES  ('$task[$i](Assigned)','$date','$month','$day','0','1','$email')";
      $result=mysqli_query($con,$query);
    }
  // echo "could not insert".mysqli_error($con).mysqli_errno($con);
   // echo $query;
   if($result)
   {
       echo"<script>
       location.href='dayplaner.php';
       </script>";
   }
    else
    {
         echo"<script>
         alert('Database is not connected');
        location.href='dayplaner.php';
       </script>";
    }
}
else
{
    echo"<script>
         alert('The Task Have Been Already Added');
        location.href='rectask.php';
       </script>";
}
?>