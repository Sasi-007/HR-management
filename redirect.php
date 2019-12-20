<?php
 session_start();
 if(!isset($_SESSION['NAME']))
 {
     echo"<script>
       location.href='adminlogin.php';
     </script>";
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
<script
  src="https://code.jquery.com/jquery-3.4.1.slim.js"
  integrity="sha256-BTlTdQO9/fascB1drekrDVkaKd9PkwBymMlHOiG+qLI="
  crossorigin="anonymous"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="style.css">
    <title>Employee Day Planner</title>
    <link rel="stylesheet" href="pop.css">
<link rel="stylesheet" href="sticky.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!--<script>
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
-->
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

<body style="background-color:#f9f6f7;">
    <?php
    // echo $_GET['message'];
     $email=$_GET['message'];
     $empname=$email;
     ?>
      <?php include("navbar.php"); ?>
   	<div class="w3-main" style="margin-left:0px;margin-top:10px;">
      <div class="container-fluid">
       <div class="row">
        <div class="col-sm-2">
           <span name="user" class="btn btn-primary"><?php echo $_GET['message'];?></span>
        </div>
       <div class="col-sm-2">
        <button type="submit" data-toggle="collapse" name="task" class="btn btn-primary" data-target="#demo">Today's Task</button>
        </div>
        <div class="col-sm-2">
            <button data-toggle="collapse" name="demos" data-target="#demos"  type="submit" class="btn btn-primary">Completion</button>
        </div>
        <?php 
            $con=mysqli_connect("localhost","root","","employeetracker");
            if(!$con)
                {
                    echo"Database is not connected";
                }
        ?>
        <div class="col-sm-2">
            <span class="btn btn-primary"><?php 
                date_default_timezone_set('Asia/Kolkata');
                $date=date('l') ;
                 echo mysqli_num_rows(mysqli_query($con,"select * from addtask where `done`='1' and day='$date' and `email`='$email'")); ?> Done</span>
        </div>
        <div class="col-sm-2">
           <span class="btn btn-primary"><?php
                date_default_timezone_set('Asia/Kolkata');
                $date=date('l') ;
                echo mysqli_num_rows(mysqli_query($con,"select * from addtask where `done`='0' and day='$date'and `email`='$email'")); ?> Remaning</span>
        </div>                 
        <div class="col-sm-2">
            <button type="button" class="btn btn-primary" data-toggle="collapse" name="task" class="btn btn-primary" data-target="#pendos"><?php
                date_default_timezone_set('Asia/Kolkata');
                $date=date('l') ;
               echo mysqli_num_rows(mysqli_query($con,"select * from addtask where `done`='0' and `email`='$email'")); ?>  Pending</button>
        </div>
        <!--  <div class="col-sm-1">
            <button type="button" class="btn btn-primary" data-toggle="collapse" name="task" class="btn btn-primary" data-target="#graph"><?php
                date_default_timezone_set('Asia/Kolkata');
                $date=date('l') ;
                mysqli_num_rows(mysqli_query($con,"select * from addtask where `done`='0' and `email`='$email'")); ?>Visualization</button>
        </div>-->
    </div>
        </div>
    <br>
    <br>
    <div id="demo" class="collapse">
        <center><strong>Today's Task</strong></center>
    <div class="row" style="padding-top:20px">
    <div class="col-sm-12" id="demo">
    
     <!--<input class="form-control"  type="text" name="text">-->
      <table class="table ">
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
           //$empname=$email;
           //echo $empname;
           date_default_timezone_set('Asia/Kolkata');
           $day=date('l');
           $query="SELECT `name`, `date`, `month`, `day`,`email` FROM `addtask` WHERE `email`='$empname' and `day`='$day'";
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
     /*  if(mysqli_num_rows($result)>=1)
       {
          echo"<input type='submit' style='margin-left:1050px;' name='sub' class='btn btn-primary' >";
         
           echo"</form>";    
       }*/
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
  ?>
 <div id="demos" class="collapse">
        <center><strong>Completion Of the Task</strong></center>
    <div class="row" style="padding-top:20px">
    <div class="col-sm-12" id="demos">
    
     <!--<input class="form-control"  type="text" name="text">-->
      <table class="table ">
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
           $query="SELECT `name`, `date`, `day` FROM `addtask` WHERE  `done`='1' and `email`='$empname'";
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
 <div id="pendos" class="collapse">
        <center><strong>Pending Task</strong></center>
    <div class="row" style="padding-top:20px">
    <div class="col-sm-12" id="pendos">
    
     <!--<input class="form-control"  type="text" name="text">-->
      <table class="table ">
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
            echo"<h3>No task Have Been Pended</h3>";
        }
        ?>
       </tr>
     
      </table> 
       <?php
       if(mysqli_num_rows($result)>=1)
       {
          echo"<input type='submit' style='margin-left:1050px;' name='sub'   class='btn btn-primary' >";
           echo"</form>";    
       }
     ?> 
    
    </div>
    </div>
 </div>
 <div id="graph">
 <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<br>
<div id="chartContaine" style="width: 35%;padding-left:1em; height: 300px;display:inline-block;"></div>
<div id="chartContain" style="width:32%; padding-left:20em;height:300px;display:inline-block;" ></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<div class="icon-bar">
<!-- <button class="google btn " style="text-decoration:none;font-size:18px;" data-toggle="modal" href="#ignismyModal">open Popup</button>-->
  <!--<a href="#" class="facebook"><i class="fa fa-facebook"></i></a> 
  <a href="#" class="twitter"><i class="fa fa-twitter"></i></a> 
  <a href="#" class="google"><i class="fa fa-google"></i></a> 
  <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
  <a href="#" class="youtube"><i class="fa fa-youtube"></i></a> -->
</div>
 </div>
    </div>
</body>
</html>

   