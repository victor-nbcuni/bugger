<section class="content-header">
    <h1>
        <?php echo ($record->id ? 'Edit ' : 'Add New ') . $config['model']['title']; ?>
        <?php if ($record->id): ?>
            <small><a href="<?php echo $config['base_url']; ?>/add">Add New</a></small>
        <?php endif; ?>
    </h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="boxbox-primary">
                <form data-parsley-validate action="<?php echo "{$config['base_url']}" . ($record->id ? '/edit/' . $record->id : '/add'); ?>" method="post" role="form">
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

                        <?php if ($config['model']['name'] == 'Department'): ?>
                            <div class="form-group">
                                <label>Group Email <span class="required-field">*</span></label>
                                <input type="email" maxlength="255" name="group_email" placeholder="Group Email Address" class="form-control" value="<?php echo $record->group_email; ?>" required>
                            </div>
                        <?php endif; ?>

                        <?php if ($config['model']['name'] == 'Issue_Priority' || $config['model']['name'] == 'Issue_Status'): ?>
                            <div class="form-group">
                                <label>Color <span class="required-field">*</span></label>
                                <p class="help-block">A color name or hex value. For example: green, red, #f0ad4e, #444444</p>
                                <input type="text" maxlength="20" name="color" placeholder="Color" class="form-control" value="<?php echo $record->color; ?>" required>
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

