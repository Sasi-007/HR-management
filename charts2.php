 <?php

//echo $hours;
?>

<?php
 
 $time1 = strtotime('11:30');
$time2 = strtotime('17:45');
if($time2 < $time1) {
    $time2 += 24 * 60 * 60;
}
$minutes= ($time2 - $time1) / 60; 
$hours = intdiv($minutes, 60).'.'. ($minutes % 60);
$hours=$hours.".".($minutes % 60);
  $dataPoints = array(
	array("label"=> "WORKING HOURS", "y"=>8),
	array("label"=> "WORKED HOURS", "y"=> $hours)
	
);
	
?>
<html>
 <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 </head>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	//exportEnabled: true,
	title:{
		//text: "EMPLOYEE LEAVE COUNT"
	},
	subtitles: [{
		//text: "Currency Used: Thai Baht (฿)"
	}],
	data: [{
		type: "bar",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 16,
		//indexLabel: "{label} - #percent%",
		yValueFormatString: "##0",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>

<!--<div class="w3-main" style="margin:40px">-->

			<!-- Push down content on small screens --> 
			<!--<div class="w3-hide-large" style="margin-top:83px"></div>-->
<body>

	<div id="chartContainer" style="height: 550px; width: 100%;padding-top:35px;" align="center"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

</body>
 </html>            