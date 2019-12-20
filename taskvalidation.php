<?php
	session_start();
	$email=$_SESSION['EMAIL'];
	$task=$_POST['taskname'];
	$starttime=$_POST['starttime'];
	$endtime=$_POST['endtime'];
	$start_time_in_24_hour_format = strtotime("$starttime");
	$end__time_in_24_hour_format =  strtotime("$endtime");
	$time1 = $start_time_in_24_hour_format;
 $time2 = $end__time_in_24_hour_format;
 if($time2 < $time1) 
 {
    $time2 += 24 * 60 * 60;
 }
	$minutes= ($time2 - $time1) / 60; 
	$hours = intdiv($minutes, 60).'.'. ($minutes % 60);
	//echo $start_time_in_24_hour_format;
	//echo $end__time_in_24_hour_format;
	$date1=date('Y/m/d ', $start_time_in_24_hour_format);
	//echo $date1;
    $dwd=date('F',strtotime($date1));
    //echo $dwd;
	$d=($end__time_in_24_hour_format -$start_time_in_24_hour_format)/3600;
	//echo "dif:".$d;
	//echo $hours;
//	$date=date_create($start_time_in_24_hour_format);
	//$date1= date_format($date,"Y/m/d");
    $con=mysqli_connect("localhost","root","","employeetracker");
	if(!$con)
     {
        echo"Database is not connected";
     } 
						
	$query="INSERT INTO `task`(`employee_email_id`,`name_of_the_task`, `start_time`, `end_time`,`date_of_work_done`,`hoursdiff`,`month`) VALUES ('$email','$task','$start_time_in_24_hour_format ','$end__time_in_24_hour_format','$date1','$hours','$dwd');";
    $result=mysqli_query($con,$query); 
    // echo "could not insert".mysqli_error($con).mysqli_errno($con);
	 if(is_bool($result)==false)
	 {
        echo"<center><h4>Please Re-enter the details again</h4></center>";
     }
     else
	 {
		 echo"<script>alert('submitted successfully')</script>";
         echo"<script>location.href='overview.php'</script>";
     }
?>