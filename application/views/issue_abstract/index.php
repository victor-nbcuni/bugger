<section class="content-header">
    <h1>
        <?php echo $config['model']['title_plural']; ?>
        <small>View and Manage <?php echo $config['model']['title_plural']; ?></small>
    </h1>
</section>

<section class="content">
   <div class="row">
        <div class="col-xs-12">
            <?php if ( ! in_array($config['model']['name'], array('Issue_Status', 'Issue_Priority'))): ?>
                <a href="<?php echo $config['base_url']; ?>/add" class="btn btn-success">
                    <i class="fa fa-plus"></i> Add New
                </a>
            <?php endif; ?>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">View / Manage <?php echo $config['model']['title_plural']; ?></h3>
                </div>
                <div class="box-body table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <?php if ($config['model']['name'] == 'Role'): ?>
                                    <th>Description</th>
                                <?php endif; ?>
                                
                                <?php if ($config['model']['name'] == 'Department'): ?>
                                    <th>Group Email</th>
                                <?php endif; ?>

                                <?php if ($config['model']['name'] == 'Issue_Priority' || $config['model']['name'] == 'Issue_Status'): ?>
                                    <th>Color</th>
                                <?php endif; ?>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($records as $record): ?>
                                <tr>
                                    <td><?php echo $record->id; ?></td>
                                    <td><?php echo $record->name; ?></td>

                                    <?php if ($config['model']['name'] == 'Role'): ?>
                                        <td><?php echo $record->description; ?></td>
                                    <?php endif; ?>

                                    <?php if ($config['model']['name'] == 'Department'): ?>
                                        <td><?php echo $record->group_email; ?></td>
                                    <?php endif; ?>

                                    <?php if ($config['model']['name'] == 'Issue_Priority' || $config['model']['name'] == 'Issue_Status'): ?>
                                        <td><span class="label" style="background: <?php echo $record->color; ?>;"><?php echo $record->color; ?></span></td>
                                    <?php endif; ?>

                                    <td>
                                        <a href="<?php echo $config['base_url']; ?>/edit/<?php echo $record->id; ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                        <a class="btn-remove btn btn-danger" href="<?php echo $config['base_url']; ?>/delete/<?php echo $record->id; ?>"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
$(function() {
    $('table').dataTable();
    $('.btn-remove').click(function() {
        event.preventDefault();
        var self = $(this);
        if (confirm("Are you sure you want to delete this record?")) {
            window.location = self.attr('href');
        }
    });
});
</script>
