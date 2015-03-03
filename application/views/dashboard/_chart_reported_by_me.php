<div class="col-lg-6">
    <p class="text-center"><strong>Reported By Me</strong></p>
    <div id="chartReportedByMe" style="height: 350px; padding: 0px; position: relative;"></div>
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
                    formatter: function (label, series) {
                        var arr = label.split(',');
                        return '<a style="font-size:12px;padding:2px;" class="btn btn-default" href="/issues#status_id[]=' + arr[1] + '">' + arr[0] + ' (' + series.data[0][1] + ')</a>';
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
