<div class="row">
    <?php foreach($data as $status): ?>
        <div class=" col-xs-2">
            <div class="small-box" style="color: #f9f9f9; background: <?php echo $status['color']; ?>;">
                <div class="inner">
                    <h3>
                        <?php echo $status['total']; ?>
                    </h3>
                    <p>
                        <?php echo $status['label']; ?>
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="<?php echo $status['url']; ?>" class="small-box-footer">
                    View <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    <?php endforeach; ?>
</div>