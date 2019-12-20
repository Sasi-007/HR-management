
<?php
 $con=mysqli_connect("localhost","root","","employeetracker");
 if(!$con)
 {
     echo"Database is not connected";
 }
/* $dataPoints = array(
	array("y" => 2, "label" => "Sunday"),
	array("y" => 1, "label" => "Monday"),
	array("y" => 2, "label" => "Tuesday"),
	array("y" => 2, "label" => "Wednesday"),
	array("y" => 1, "label" => "Thursday"),
	array("y" => 0, "label" => "Friday"),
	array("y" => 2, "label" => "Saturday")
); */
 $email=$_SESSION['EMAIL'];
 $datapoints=array();
 $query="select distinct date from `addtask` where `email`='$email' order by date asc limit 7 ";
 $result=mysqli_query($con,$query);
 // echo "could not insert".mysqli_error($con).mysqli_errno($con);
 //echo $query;
 $email=$_SESSION['EMAIL'];
 //echo $email;
 if(mysqli_num_rows($result)>=1)
 {
  while($row1=mysqli_fetch_assoc($result))
  {
      
     $date=$row1['date']; 
    // echo $date;
     $query1="select * from `addtask` where (`date`='$date' and `email`='$email') and `done`='1'";
     $result1=mysqli_query($con,$query1);
       // echo "could not insert".mysqli_error($con).mysqli_errno($con);
 // echo $query;
     $row2=mysqli_fetch_array($result1);
     if(mysqli_num_rows($result1)>=1)
     {
         $day=$row2['day'];
         //echo $day;
         $totaltask=mysqli_num_rows($result1);
         //echo $totaltask;
         $dataPoints[]=array("y" =>$totaltask, "label" =>$day);
     }
     else
     { 
       //$day=date('l');
      // $dataPoints[]=array("y" =>0, "label" =>$day);
         echo"<h3><strong>No Task Have Been Finished</strong></h3>";
     }  
 }
 }
else
{
  //$day=date('l');
      // $dataPoints[]=array("y" =>0, "label" =>$day);
     echo"<center><h3><strong>No Task Have Been Added</strong></center></h3>";
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
    //$query="SELECT distinct date  FROM `addtask` WHERE `email`='$email'";
    //$result=mysqli_query($con,$query); 
    //echo $query;
    // while( $rrow=mysqli_fetch_assoc($result ))
  {
     //$rdate=$rrow['date'];
     //$_SESSION['DATE']=$rdate;
	 // $query2="SELECT  *  FROM `task` WHERE `employee_email_id`='venky@gmail.com' and `date_of_work_done` ='$rdate' ";
       $curdate=date('d-m-Y');
       $query2="SELECT  *  FROM `addtask` WHERE `email`='$email' and `date` ='$curdate' ";
      $result2=mysqli_query($con,$query2); 
     // $thours=0;
      $totaltask=mysqli_num_rows($result2);
      if($totaltask >=1)
       { 
		 //$day='';
        // echo"could not insert data:". mysqli_error($con);
         $row2=mysqli_fetch_array($result2);
	    {
		  $timestamp = strtotime($row2['date']);
		  $day = date('l', $timestamp);
		  //echo $row[0];
		  //$thours+=$row2['hoursdiff'];
         $query3="SELECT  *  FROM `addtask` WHERE (`email`='$email' and `done` ='1') and `date` ='$curdate'";
        $result3=mysqli_query($con,$query3); 
        $row3=mysqli_fetch_assoc($result3);
        $done=mysqli_num_rows($result3);
       }
       //$cthours=number_format((float)$thours,2, '.', ''); 
       $dataPoints1[]=array("label"=>$day, "y"=> $done);
	   $dataPoints2[]=array("label"=>$day, "y"=> $totaltask);
   }
    else
    {
        $day=date('l');
         $done=0;
        $totaltask=0;
       $dataPoints1[]=array("label"=>$day, "y"=> $done);
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
 if(($done!=0)&&($totaltask!=0))
 {
  $percent=($done/$totaltask)*100;
 }
 else
 {
     $percent=0;
 }
  if($percent>=85)
  {
      $message="“The success you got is the result of your hard work, keep it up for the future. Help each other to reach the destination, you desire.”";
  }
  elseif(($percent >= 66)&&($percent <= 84))
  {
    
       $message="“The responsibility and dedication you play in this company has given us great satisfaction, keep it up and we will all reach success.”"; 
  }
 elseif(($percent >= 50)&&($percent <= 65))
  {
       $message="“Talent wins games, but teamwork and intelligence wins championships.”"; 
  }
else
{
  $message="“A person who never made a mistake never tried anything new.”";   
}
  echo"<div class='modal fade' id='ignismyModal' role='dialog'>";
  echo"<div class='modal-dialog'>";
  echo"<div class='modal-content'>";
  echo"<div class='modal-header'>";
  echo"<button type='button' class='close' data-dismiss='modal' aria-label=''><span>×</span></button>";
  echo"</div>";	
  echo"<div class='modal-body'>"; 
  echo"<div class='thank-you-pop'>";
 //echo"<img src='http://goactionstations.co.uk/wp-content/uploads/2017/03/Green-Round-Tick.png' alt=''>";
echo"<img src='smile.png' alt=''>";
 echo"<h1>$message</h1>";
 echo"</div>";                        
 echo"</div>
					
                </div>
            </div>
        </div>";
 $dataPoints3 = array(
	array("label"=> "Work Done By the Employee","y"=>$percent),
	array("label"=> "Total work in Percentage ","y"=>100),
    );
?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="pop.css">
<link rel="stylesheet" href="sticky.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
window.onload = function () {
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "Task Completed Over a Week"
	},
	axisY: {
		title: "Number of Task"
	},
	data: [{
		type: "line",
        yValueFormatString: "#0 task.##",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
    var chart2 = new CanvasJS.Chart("chartContain", {
	animationEnabled: true,
	//exportEnabled: true,
	title:{
		text: "Today Percentage of work Report"
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
		dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
	}]
});         
  var chart1 = new CanvasJS.Chart("chartContaine", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Today Task Tracking Report"
	},
    axisY: {
		title: "Number of Task"
	},
	legend:{
		cursor: "pointer",
		verticalAlign: "center",
		horizontalAlign: "right",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "column",
		name: "Completed Task",
		indexLabel: "{y}",
		yValueFormatString: "#0 task.##",//#0## task##",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
	},{
		type: "column",
		name: "Target Task",
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
 chart2.render();
}
    </script>
<!--<script>
window.onload = function () {
    var chart2 = new CanvasJS.Chart("chartContain", {
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
		dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
	}]
});
 chart2.render();
}
</script>-->
</head>
<body>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<br>
<div id="chartContaine" style="width: 35%;padding-left:1em; height: 300px;display:inline-block;"></div>
<div id="chartContain" style="width:32%; padding-left:20em;height:300px;display:inline-block;" ></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<div class="icon-bar">
 <button class="google btn " style="text-decoration:none;font-size:18px;" data-toggle="modal" href="#ignismyModal">open Popup</button>
  <!--<a href="#" class="facebook"><i class="fa fa-facebook"></i></a> 
  <a href="#" class="twitter"><i class="fa fa-twitter"></i></a> 
  <a href="#" class="google"><i class="fa fa-google"></i></a> 
  <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
  <a href="#" class="youtube"><i class="fa fa-youtube"></i></a> -->
</div>

</body>
</html> 