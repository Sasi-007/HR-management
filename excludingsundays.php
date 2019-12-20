<?php
    session_start();
    if(!isset($_SESSION['EMAIL']))
    {
        echo"<script>location.href='index.php'</script>";
    }
?>
<html>
	<head>
		<title>
            LEAVE FORM
		</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
		<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />	
			<link rel="stylesheet" href="registration.css">	
		<style>
		table {
			border-collapse: collapse;
			border-spacing: 0;
			width: 100%;
			border: 1px solid black ;
			}
			.padding{
			padding-left: 240px;
			}
			th, td {
			text-align: left;
			padding: 8px;
			}
			tr:nth-child(even){background-color: white}
		</style>
	</head>
 <body>
<?php include('employee.php'); ?>
	<div class="w3-main" style="margin-left:300px;margin-top:20px;">
	 <center><h5><b><strong>Date Of The Leave</h5></center>
				   <!--</th>-->
				  <table class="table table-bordered table-hover ">  
				   <tr>
				   <th>
                   Leave Taken From
				   </th>
				    <th>
                   Leave Taken To
				   </th>
				   </tr>
				   
				   <?php
                    
                    $row=array();
					$con=mysqli_connect("localhost","root","","employeetracker");
					if(!$con)
					{
						echo"Database is not connected";
					} 
                    $name=$_SESSION['NAME'];
                    $email =$_SESSION['EMAIL'];
                    $query="SELECT  `date_from`, `date_to`, `submission_date` FROM `leave_applied` WHERE  `employee_email_id`='$email';";
                    $result=mysqli_query($con,$query);
                    
                    //echo"could not insert data:". mysqli_error($con);
                    if((mysqli_num_rows($result))>=1)
                    {
                       // echo"could not insert data:". mysqli_error($con);
                     while($row=mysqli_fetch_array($result))
		                {
							 echo"<tr>";
                             echo"<td>$row[0]</td>";
							 echo"<td>$row[1]</td>";
							 echo"</tr>";
                        }
                    }
                    else{
                        //echo"0";
						echo"<tr>";
                        echo"<td>0000-00-00</td>";
						echo"<td>0000-00-00</td>";
					    echo"</tr>";
                    }
                   ?>
				   
				   </table>

 <?php
	
	//initialize the count variable
	$count=0;
	//Create an instance of now
	//This is used to determine the current month and also to calculate the first and last day of the month
	$now = new DateTime( 'now', new DateTimeZone( 'Asia/Kolkata' ) );
	//Create a DateTime representation of the first day of the current month based off of "now"
	$start = new DateTime( $now->format('m/01/Y'), new DateTimeZone( 'Asia/Kolkata' ) );
	//Create a DateTime representation of the last day of the current month based off of "now"
	$end = new DateTime( $now->format('m/t/Y'), new DateTimeZone( 'Asia/Kolkata' ) );
	//Define our interval (1 Day)
	$interval = new DateInterval('P1D');
	//Setup a DatePeriod instance to iterate between the start and end date by the interval
	$period = new DatePeriod( $start, $interval, $end );
	//Iterate over the DatePeriod instance
	foreach( $period as $date )
	{
		//Make sure the day displayed is ONLY sunday.
		if( $date->format('w') == 0 )
		{
			//echo $date->format( 'l, Y-m-d H:i:s' ).PHP_EOL;
			$count++;
		}	
	}
	$workingdays=(date("t")-$count);
	$con=mysqli_connect("localhost","root","","employeetracker");
	if(!$con)
    {
		 echo"Database is not connected";
    } 
    $email1=$_SESSION['EMAIL'];
	$query="SELECT `no_of_days_leavetaken` from `leave_applied` where `employee_email_id`='$email1';";
    $result=mysqli_query($con,$query); 
	$leavetaken=0;
	if(mysqli_num_rows($result)>=1)
       {
		    
		   	while($row=mysqli_fetch_array($result))
			{	
				$i=0;
				$leavetaken+=$row[$i];
				$i++;
			}
	   }
	   else
	   {
		   $leavetaken='0';
	   }
	include('charts.php'); 
	?>

 </div>
 
 </body>
 </html>