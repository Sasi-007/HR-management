<?php
    if(!isset($_SESSION['NAME']))
    {
        echo"<script>location.href='index.php'</script>";
    }
?>
<?php
 
$dataPoints1=array();
$dataPoints2 = array();
	
?>
<?php
 $email=$_SESSION['EMAIL'];
 $row=array();
 $con=mysqli_connect("localhost","root","","employeetracker");
 if(!$con)
     {
        echo"Database is not connected";
     } 
 //$query="SELECT distinct date_of_work_done  FROM `task` WHERE `employee_email_id`='venky@gmail.com' order by id desc limit 7   ";
 $query="SELECT distinct date  FROM `addtask` WHERE `email`='$email'";
 $result=mysqli_query($con,$query); 
 echo $query;
 while( $rrow=mysqli_fetch_assoc($result ))
 {
		$rdate=$rrow['date'];
        $_SESSION['DATE']=$rdate;
	 // $query2="SELECT  *  FROM `task` WHERE `employee_email_id`='venky@gmail.com' and `date_of_work_done` ='$rdate' ";
       $query2="SELECT  *  FROM `addtask` WHERE `email`='$email' and `date` ='$rdate' ";
      $result2=mysqli_query($con,$query2); 
     // $thours=0;
      $totaltask=mysqli_num_rows($result2);
      if($totaltask >=1)
       { 
		 //$day='';
        // echo"could not insert data:". mysqli_error($con);
         while($row2=mysqli_fetch_array($result2))
	    {
		  $timestamp = strtotime($row2['date']);
		  $day = date('l', $timestamp);
		  //echo $row[0];
		  //$thours+=$row2['hoursdiff'];		
       }
       //$cthours=number_format((float)$thours,2, '.', ''); 
       $dataPoints1[]=array("label"=>$day, "y"=> 2);
	   $dataPoints2[]=array("label"=>$day, "y"=> $totaltask);
   }
    else
    {
       $dataPoints1[]=array("label"=>$day, "y"=> 1);
	   $dataPoints2[]=array("label"=>$day, "y"=> $totaltask);
    }
 }
//echo $cthours;
 //sort($datapoints1);
 //sort($datapoints2);
//print_r ($dataPoints1);
//print_r ($dataPoints2);
	
?>
<?php
 
 $nhours=0;
 $row=array();
 $con=mysqli_connect("localhost","root","","employeetracker");
 if(!$con)
 {
    echo"Database is not connected";
 } 
 //$date=$_SESSION['DATE'];
 //$query="SELECT MONTH('$date')";

 $month=date('F');
 $query="SELECT `hoursdiff` from task where `month`='$month'";

 $result=mysqli_query($con,$query); 

//$date=$result;
//echo $date;
 //$month=date('F', strtotime($date));
//echo $month;
 if(mysqli_num_rows($result)>=1)
 {
     while($row=mysqli_fetch_array($result))
	  {
		
		//echo $row[0];
		 $nhours+=$row['hoursdiff'];		
      }
 }
 include("overallcalc.php");
  $workingdays*=8;
  $dataPoints = array(
	array("label"=> "Total No of Worked Hours", "y"=>$nhours),
	array("label"=> "Total No of Hours In This Month", "y"=>$workingdays)
	
);
	
?>
<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {
 
var chart1 = new CanvasJS.Chart("chartContaine", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Weekly Hours Tracking Report"
	},
	legend:{
		cursor: "pointer",
		verticalAlign: "center",
		horizontalAlign: "right",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "column",
		name: "Worked Hours",
		indexLabel: "{y}",
		yValueFormatString: "#0 task.##",//#0## task##",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
	},{
		type: "column",
		name: "Working Hours",
		indexLabel: "{y}",
		yValueFormatString: "#0 task.##",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	}]
});
chart1.render();
 
function toggleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else{
		e.dataSeries.visible = true;
	}
	chart1.render();
}
    
    
    var chart2 = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	//exportEnabled: true,
	title:{
		//text: "EMPLOYEE LEAVE COUNT"
	},
	subtitles: [{
		//text: "Currency Used: Thai Baht (฿)"
	}],
	data: [{
		type: "pie",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 16,
		//indexLabel: "{label} - #percent%",
		yValueFormatString: "##0",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
 chart2.render();
}
</script>
</head> 

<!--<script>
window.onload = function () {
 
var chart2 = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	//exportEnabled: true,
	title:{
		//text: "EMPLOYEE LEAVE COUNT"
	},
	subtitles: [{
		//text: "Currency Used: Thai Baht (฿)"
	}],
	data: [{
		type: "pie",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 16,
		//indexLabel: "{label} - #percent%",
		yValueFormatString: "##0",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart2.render();
 
}
</script>-->
<body>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<div id="chartContaine" style="width: 100%; height: 300px;display: inline-block;"></div>
    
<!--<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>-->
<br>
<br>
<center><h3><strong>Overall Report Of This Month </strong></h3></center>
<div id="chartContainer" style="width: 100%; height: 300px;display: inline-block;" align="center"></div>
</body>
</html>                              