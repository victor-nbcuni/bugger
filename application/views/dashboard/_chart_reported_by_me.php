<div class="col-lg-6">
    <div class="box box-primary">
        <div class="box-header">
            <i class="fa fa-bar-chart-o"></i>
            <h3 class="box-title">Reported By Me</h3>
        </div>
        <div class="box-body">
            <div id="chart-rbm" style="height: 300px; padding: 0px; position: relative;"><canvas class="flot-base" width="774" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 774px; height: 300px;"></canvas><canvas class="flot-overlay" width="774" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 774px; height: 300px;"></canvas><span class="pieLabel" id="pieLabel0" style="position: absolute; top: 71px; left: 445px;"><div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">Series2<br>30%</div></span><span class="pieLabel" id="pieLabel1" style="position: absolute; top: 211px; left: 423px;"><div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">Series3<br>20%</div></span><span class="pieLabel" id="pieLabel2" style="position: absolute; top: 130px; left: 264px;"><div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">Series4<br>50%</div></span></div>
        </div>
    </div>
</div>

<script>
$(function() {
    var data = <?php echo $data; ?>;

    $.plot('#chart-rbm', data, {
        series: {
            pie: {
                show: true,
                radius: 1,
                tilt: 0.5,
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

    function labelFormatter(label, series) {
        return "<div style='font-size:8pt; text-align:center; padding:2px; color:white;'>" + label + "<br/>" + Math.round(series.percent) + "%</div>";
    }
});
</script>