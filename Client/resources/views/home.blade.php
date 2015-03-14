<html>
    <head>
        <script type="text/javascript">

            window.onload = function () {               

                var dps = []; // dataPoints

                var chart = new CanvasJS.Chart("chartContainer", {
                    title: {
                        text: "Live Random Data"
                    },
                    data: [{
                            type: "line",
                            dataPoints: dps
                        }]
                });

                var xVal = 0;
                var yVal = 100;
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
                            }
                        });
                    

                       
                            xVal++;
           
                    if (dps.length > dataLength)
                    {
                        dps.shift();
                    }

                    chart.render();

                };

                // generates first set of dataPoints
                updateChart(dataLength);

                // update chart after specified time. 
                setInterval(function () {
                    updateChart()
                }, updateInterval);

            }
        </script>
        <script src="js/canvasjs/canvasjs.min.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="chartContainer" style="height: 300px; width:100%;">
        </div>
    </body>
</head>

<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script> 
</html>