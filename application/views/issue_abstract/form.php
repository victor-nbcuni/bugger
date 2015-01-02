<section class="content-header">
    <h1>
        <?php echo ($model->id ? 'Edit ' : 'Create ') . $config['model']['title']; ?>
        <small><?php echo ($model->id ? 'Update an Existing ' : 'Add a New ') . $config['model']['title']; ?></small>
    </h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <form action="<?php echo "{$config['base_url']}" . ($model->id ? '/edit/' . $model->id : '/add'); ?>" method="post" role="form">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Name <span class="required">*</span></label>
                            <input type="text" maxlength="30" name="name" class="form-control" value="<?php echo $model->name; ?>" required>
                        </div>
                        <?php if ($config['model']['name'] == 'Role'): ?>
                            <div class="form-group">
                                <label>Description <span class="required">*</span></label>
                                <input type="text" maxlength="100" name="description" class="form-control" value="<?php echo $model->description; ?>" required>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary"><?php echo ($model->id ? 'Update' : 'Create'); ?></button>
                        <a href="<?php echo $config['base_url']; ?>">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

