<div id="graph1" class="aGraph" style="width:600px; height:60px;"></div>

<script>
    function draw(id, width, height, updateDelay, transitionDelay) {
        var graph = d3.select(id).append("svg:svg").attr("width", "100%").attr("height", "100%");
        var data = [3, 6, 2, 7, 5, 2, 1, 3, 8, 9, 2, 5, 9, 3, 6, 3, 6, 2, 7, 5, 2, 1, 3, 8, 9, 2, 5, 9, 2, 7, 5, 2, 1, 3, 8, 9, 2, 5, 9, 3, 6, 2, 7, 5, 2, 1, 3, 8, 9, 2, 9];

    var x = d3.scale.linear().domain([0, 48]).range([-5, width]);
    var y = d3.scale.linear().domain([0, 10]).range([0, height]);

    var line = d3.svg.line()
            .x(function(d, i) { return x(i); })
            .y(function(d) { return y(d); })
            .interpolate("basis");

    graph.selectAll("path")
            .data([data])
            .enter()
            .append("svg:path")
            .attr("d", line);

    function redraw() {
        graph.selectAll("path")
                .data([data])
                .attr("transform", "translate(" + x(1) + ")")
                .attr("d", line)
                .transition()
                .ease("linear")
                .duration(transitionDelay)
                .attr("transform", "translate(" + x(0) + ")");
    }

    setInterval(function () {
                data.push(data.shift());
                redraw();
        }, updateDelay);
    }

    draw("#graph1", 300, 30, 1000, 1000);
</script>