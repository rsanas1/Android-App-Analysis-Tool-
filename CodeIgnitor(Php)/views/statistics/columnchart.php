<html>
<div id="page-wrapper">
	<head>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
	google.load("visualization", "1", {
		packages : [ "corechart" ]
	});
	google.setOnLoadCallback(drawChart);
	function drawChart() {
		var data = new google . visualization. DataTable ();
	data . addColumn( 'string' , 'ActivityName' );
	data . addColumn( 'number' , 'ActivityCount' );

	data . addRows([
               
	<?php foreach($activities as $key => $value) {?>
	['<?php echo ucfirst($key); ?>',
	<?php echo $value; ?>
	],
<?php } ?>
	]);

		var options = {
			title : 'Activities',
			hAxis : {
				title : 'No. of Activities',
				titleTextStyle : {
					color : 'red'
				}
			}
		};

		var chart = new google.visualization.ColumnChart(document
				.getElementById('chart_div'));
		chart.draw(data, options);
	}
</script>
	</head>
	<body>
		<div id="chart_div" style="width: 900px; height: 500px;"></div>
		
	</body>
</div>
</html>