<div class="col-lg-6">
    <p class="text-center"><strong>Reported By Me</strong></p>
    <div id="chartReportedByMe" style="height: 300px; padding: 0px; position: relative;"></div>
</div>

<script>
$(function() {
    var data = <?php echo $data; ?>;
    $.plot('#chartReportedByMe', data, {
        series: {
            pie: {
                show: true,
                radius: 1,
                innerRadius: .5,
                label: {
                    show: true,
                    radius: 1,
                    formatter: function (label, series) {
                        return '<div style="font-size:12px; text-align:center; padding:2px; color:white;">' + label + '<br>' + series.data[0][1] + '</div>';
                    },
                    background: {
                        opacity: 0.8
                    }
                }
            }
        },
        legend: {
            show: false
        }
    });
});
</script>
