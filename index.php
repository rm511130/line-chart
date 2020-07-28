<!DOCTYPE HTML>
<html>
<head>
<script type="text/javascript">
window.onload = function() {
	var dataPoints = [];
	var chart; 
	$.getJSON("https://cutemp.apps.ourpcf.com/user1-fact.apps.ourpcf.com/10000", function(data) {  
		$.each(data, function(key, value){
			dataPoints.push({x: value[0], y: parseInt(value[1])});
		});
		chart = new CanvasJS.Chart("chartContainer",{
			title:{
				text:"Live Line-Chart of HTTP GET Response Time in Milliseconds"
			},
			data: [{
				type: "line",
				dataPoints : dataPoints,
			}]
		});
		chart.render();
		updateChart();
	});
	function updateChart() {
	$.getJSON("https://cutemp.apps.ourpcf.com/user1-fact.apps.ourpcf.com/10000", function(data) {
		$.each(data, function(key, value) {
			dataPoints.push({
			x: parseInt(value[0]),
			y: parseInt(value[1])
			});
		});
		chart.render();
		setTimeout(function(){updateChart()}, 1000);
	});
	}
}
</script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</head>
<body>
<div id="chartContainer" style="height: 300px; width: 100%;"></div>
</body>
</html>

