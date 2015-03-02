
<section class="content-header">
    <h1>
        <i class="fa fa-dashboard"></i> Dashboard
        <small>Control panel</small>
    </h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Summary Report</h3>
                    <div class="box-tools pull-right">
                        <div class="btn-group">
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-8">
                            <?php echo $pending_chart; ?>
                            <?php echo $reported_by_me_chart; ?>
                        </div>
                        <div class="col-md-4">
                            <?php echo $completion_chart; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

