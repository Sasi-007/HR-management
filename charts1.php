<?php
 
$dataPoints1 = array(
	
	array("label"=> "no of days leave taken", "y"=>4)
);
 
$dataPoints2 = array(
	
	array("label"=> "no of days worked", "y"=>26)
);
 
$dataPoints3 = array(
	
	array("label"=> "no of working days", "y"=>26)
);
 
 
?>
<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "Spending of Money Based on Household Composition"
	},
	theme: "light2",
	animationEnabled: true,
	toolTip:{
		shared: true,
		reversed: true
	},
	axisY: {
		suffix: "%"
	},
	data: [
		{
			type: "stackedColumn31",
			name: "Housing",
			showInLegend: true,
			yValueFormatString: "$#,##0 K",
			dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
		},{
			type: "stackedColumn31",
			name: "Transportation",
			showInLegend: true,
			yValueFormatString: "$#,##0 K",
			dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
		},{
			type: "stackedColumn100",
			name: "Food",
			showInLegend: true,
			yValueFormatString: "$#,##0 K",
			dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
		}
	]
});
 
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>                              