<html>
<div id="page-wrapper">
  <head>
    <script type='text/javascript' src='https://www.google.com/jsapi'></script>
    <script type='text/javascript'>
     google.load('visualization', '1', {'packages': ['geochart']});
     google.setOnLoadCallback(drawRegionsMap);

      function drawRegionsMap() {
        var data = google.visualization.arrayToDataTable([
          ['Country', 'Popularity'],
          
          <?php foreach($installs as $key => $value) {?>
		['<?php echo ucfirst($key); ?>',
		<?php echo $value; ?>
		],
		<?php } ?>
        ]);

        var options = {};

        var chart = new google.visualization.GeoChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    };
    </script>
  </head>
  <body>
  <h1>Number Of Installations</h1>
    <div id="chart_div" style="width: 600px; height: 400px;"></div>
    
  </body>
  </div>
</html>

