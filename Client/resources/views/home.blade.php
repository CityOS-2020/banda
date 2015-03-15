<html>
    <head>
       <link rel="stylesheet" type="text/css" href="style.css">
       <link href="style.css" rel="stylesheet" type="text/css"/>
        <script src="js/canvasjs/canvasjs.min.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    </head>
    <body>
        <div id="chartContainer" style="height: 300px; width:100%;">
        </div>
        
        <div id="chartContainer3" style="height: 300px; width:100%;">
        </div>
    </body>
</head>

<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script> 
</html>

<script type="text/javascript">
            window.onload = function () {               

                var dps = []; // dataPoints
                var gs = [];
                var chart = new CanvasJS.Chart("chartContainer", {
                    title: {
                        text: "Sensor Value"
                    },
                    data: [{
                            type: "line",
                            dataPoints: dps
                        }]
                });
                var chartMoney = new CanvasJS.Chart("chartContainer3", {
                    title: {
                        text: "Money Value"
                    },
                    data: [{
                            type: "line",
                            dataPoints: gs
                        }]
                });

                var xVal = 0;
                var yVal = 100;
                var energy = 0;
                var money = 0;
                var updateInterval = 1000;
                var dataLength = 30; // number of dataPoints visible at any point

                var updateChart = function (count) {
                    count = count || 1;
                    // count is number of times loop runs to generate random dataPoints.
                       
                    $.ajax({
                        async: false,
                        method: "GET",
                        url: "{{ route('graphData1') }}",
                        
                            success: function(data) {
                                console.log(data.data.data);
                                 dps.push({
                                    x: xVal,
                                    y: data.data.data[0]
                                });
                                gs.push({
                                    x: xVal,
                                    y: data.data.data[0]/100
                                });
                            }
                        });
                            xVal++;
                            money++;
                            energy++;
                            
                    if (dps.length > dataLength)
                    {
                        dps.shift();
                    }

                    chart.render();
                    chartMoney.render();
                };

                // generates first set of dataPoints
                updateChart(dataLength);

                // update chart after specified time. 
                setInterval(function () {
                    updateChart()
                }, updateInterval);

            }
        </script>