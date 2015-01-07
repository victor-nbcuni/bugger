<section class="content-header">
    <h1>
        <?php echo ($record->id ? 'Edit ' : 'Add New ') . $config['model']['title']; ?>
        <?php if ($record->id): ?>
            <small><a href="<?php echo $config['base_url']; ?>/new">Add New</a></small>
        <?php endif; ?>
    </h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="boxbox-primary">
                <form action="<?php echo "{$config['base_url']}" . ($record->id ? '/edit/' . $record->id : '/new'); ?>" method="post" role="form">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Name <span class="required-field">*</span></label>
                            <input type="text" maxlength="30" name="name" placeholder="Name" class="form-control" value="<?php echo $record->name; ?>" required>
                        </div>
                        <?php if ($config['model']['name'] == 'Role'): ?>
                            <div class="form-group">
                                <label>Description <span class="required-field">*</span></label>
                                <input type="text" maxlength="100" name="description" placeholder="Description" class="form-control" value="<?php echo $record->description; ?>" required>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="<?php echo $config['base_url']; ?>">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

