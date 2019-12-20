<?php
   session_start();
   $con=mysqli_connect("localhost","root","","employeetracker");
   if(!$con)
    {
        echo"Database is not connected";
    }
    $empname=$_POST["empaddmore"];
    $task=$_POST["addmore"];
    date_default_timezone_set('Asia/Kolkata');
    $date=date("d-m-Y");
    $_SESSION['DATE']=$date;
    $month=date("F");
    $day=date("l");
    $len=sizeof($task);
    $sendemp=$_SESSION['NAME'];
    for($i=0;$i<$len;$i++)
    {
        $query="INSERT INTO `assigntask`(`employeename`, `taskname`,`date`,`day`,`month`,`sendemployeeid`) VALUES  ('$empname[$i]','$task[$i]','$date','$day','$month','$sendemp')";
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
else
{
     echo"<script>
        alert('Database is not connected');
        location.href='asstask.php';
       </script>";
}
?>