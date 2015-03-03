<h4 class="page-header">Attachments</h4>

<div class="row">
    <div class="dropzone">
        <input type="hidden" name="xxx" value="">
        <div class="dz-message text-muted" data-dz-message><h4>Click or drop files to upload.</h4></div>
        <?php foreach($issue->files->find_all() as $file): ?>
            <div class="col-xs-2">
                <div style="text-align:center;">
                    <a class="fancybox" rel="gallery1" href="<?php echo $file->url(); ?>" title="<?php echo $file->filename; ?>">
                        <img class="img-thumbnail" src="<?php echo $file->url(); ?>">
                    </a>
                    <a class="btn-remove-attachment btn btn-sm btn-default" href="/issue_files/remove/<?php echo $issue->id; ?>?file_id=<?php echo $file->id; ?>"><i class="fa fa-trash"></i> Remove</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
