<div class="col-lg-6">
    <p class="text-center"><strong>Pending Tickets</strong></p>
    <div id="chartPending" style="height: 300px; padding: 0px; position: relative;"></div>
</div>

<script>
$(function() {
    var data = <?php echo $chart_data; ?>;

    $.plot('#chartPending', data, {
        series: {
            pie: {
                show: true,
                radius: 1,
                innerRadius: .5,
                //tilt: 0.5,
                label: {
                    show: true,
                    radius: 1,
                    formatter: labelFormatter,
                    background: {
                        opacity: 0.8
                    }
                },
                combine: {
                    color: '#999',
                    threshold: 0.1
                }
            }
        }
    });

    function labelFormatter(label, series) {console.log(series);
        return '<div style="font-size:8pt; text-align:center; padding:2px; color:white;">' + label + '<br>' + series.data[0][1] + '</div>';
    }
});
</script>
