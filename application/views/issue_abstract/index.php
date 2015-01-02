<section class="content-header">
    <h1>
        <?php echo $config['model']['title_plural']; ?>
        <small>View and Manage <?php echo $config['model']['title_plural']; ?></small>
    </h1>
</section>

<section class="content">
   <div class="row">
        <div class="col-xs-12">
            <a href="<?php echo $config['base_url']; ?>/add" class="btn btn-app">
                <i class="fa fa-plus"></i> Create New <?php echo $config['model']['title']; ?>
            </a>
        </div>
    </div>
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
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($rows as $row): ?>
                            <tr>
                                <td><?php echo $row->id; ?></td>
                                <td><?php echo $row->name; ?></td>
                                <?php if ($config['model']['name'] == 'Role'): ?>
                                    <td><?php echo $row->description; ?></td>
                                <?php endif; ?>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?php echo $config['base_url']; ?>/edit/<?php echo $row->id; ?>" class="btn btn-default">Edit</a>
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a class="btn-delete" href="#" data-href="<?php echo $config['base_url']; ?>/delete/<?php echo $row->id; ?>">Delete</a></li>
                                        </ul>
                                    </div>
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
        $('.btn-delete').click(function() {
            var self = $(this);
            if (confirm("Are you sure you want to delete this <?php echo $config['model']['title']; ?>?")) {
                window.location = self.attr('data-href');
            }
        });
    });
</script>
