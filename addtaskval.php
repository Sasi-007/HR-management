<?php
    session_start();
   $con=mysqli_connect("localhost","root","","employeetracker");
    if(!$con)
    {
        echo"Database is not connected";
    }
    $task=$_POST["addmore"];
 date_default_timezone_set('Asia/Kolkata');
        $date=date("d-m-Y");
        $_SESSION['DATE']=$date;
        $month=date("F");
        $day=date("l");
        $len=sizeof($task);
        $email2=$_SESSION['EMAIL'];
       for($i=0;$i<$len;$i++)
      {
        $query="INSERT INTO `addtask`(`name`, `date`, `month`, `day`,`done`,`referaltask`,`email`) VALUES  ('$task[$i]','$date','$month','$day','0','0','$email2')";
        $result=mysqli_query($con,$query);
       }
//echo "could not insert".mysqli_error($con).mysqli_errno($con);
 // echo $query;
   if($result)
   {
       echo"<script>
        location.href='overview.php';
       </script>";
   }
?>