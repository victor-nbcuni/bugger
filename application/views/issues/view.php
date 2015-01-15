<section class="content-header">
    <h1>
        <i class="fa fa-bug"></i> <?php echo Text::limit_chars($issue->summary, 40); ?>
        <small><?php echo $issue->getKey(); ?></small>
    </h1>
</section>

<section class="content issue-view-page">
    <div class="row">
        <div class="col-xs-12">
            <h4 class="page-header">Details</h4>

            <div class="row" style="margin-bottom: 6px;">
                <div class="col-xs-2 text-muted">Type:</div> <div class="col-xs-2"><span id="type_id"><?php echo $issue->type->name; ?></span></div><div class="col-xs-2 text-muted">Status:</div> <div class="col-xs-2"><span class="label label-primary" id="status_id"><?php echo $issue->status->name; ?></span></div>
            </div>

            <div class="row" style="margin-bottom: 6px;">
                <div class="col-xs-2 text-muted">Project:</div> <div class="col-xs-2"><?php echo $issue->project->name; ?></div> <div class="col-xs-2 text-muted">Priority:</div> <div class="col-xs-2"><span id="priority_id"><?php echo $issue->priority->name; ?></span></div>
            </div>

            <div class="row" style="margin-bottom: 6px;">
                <div class="col-xs-2 text-muted">Reporter:</div> <div class="col-xs-2"><?php echo $issue->reporter->name; ?></div> <div class="col-xs-2 text-muted">Assignee:</div> <div class="col-xs-2"><span id="assigned_department_id"><?php echo $issue->assigned_department->name; ?></span></div>
            </div>

            <div class="row">
                <div class="col-xs-2 text-muted">Created:</div> <div class="col-xs-2"><?php echo $issue->created_at; ?></div>  <div class="col-xs-2 text-muted">Updated:</div> <div class="col-xs-2"><?php echo $issue->updated_at; ?></div> 
            </div>

            <h4 class="page-header">Summary</h4>

            <div class="row">
                <div class="col-xs-12"><span id="summary"><?php echo $issue->summary; ?></span></div>
            </div>

            <br>

            <h4 class="page-header">Description</h4>

            <div class="row">
                <div class="col-xs-12"><span id="description"><?php echo $issue->description; ?></span></div>
            </div>

            <br>

            <h4 class="page-header">Attachments</h4>

            <div class="row">
                <div class="dropzone">
                    <div class="dz-message text-muted" data-dz-message><span>Click or drop files to upload.</span></div>
                    <?php foreach($issue->files->find_all() as $file): ?>
                        <div class="col-xs-2">
                            <div class="alert alert-dismissible" role="alert">
                                <a class="btn-remove-attachment close" href="/issues/remove_attachment/<?php echo $issue->id; ?>?file_id=<?php echo $file->id; ?>" aria-label="Close"><span aria-hidden="true">×</span></a>
                                <a class="fancybox" rel="gallery1" href="<?php echo $file->url(); ?>" title="<?php echo $file->filename; ?>">
                                    <img class="img-thumbnail" src="<?php echo $file->url(); ?>">
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <h4 class="page-header">Comments</h4>

            <div class="row">
                <div class="col-xs-12">
                    <form data-parsley-validate id="comments-form" action="/issue_comments/new" method="post">
                        <input type="hidden" name="issue_id" value="<?php echo $issue->id; ?>">
                        <input type="hidden" name="user_id" value="<?php echo Auth::instance()->get_user()->id; ?>">
                        <div class="form-group">
                            <textarea id="comment-input" name="comment" class="form-control" rows="5" placeholder="Type your comment here..." required></textarea>
                        </div>
                        <button id="comment-submit" type="submit" class="btn btn-success">Add this comment</button>
                    </form>
                </div>
            </div>

            <hr>

            <div class="row">
                <?php echo View::factory('issue_comments/index')->set('comments', $comments); ?>
            </div>
        </div>
    </div>
</section>

<script src="/assets/js/app/issues/view.js"></script>
<script>
$(function() {
    // Bind fancybox
    $('.fancybox').fancybox({
        openEffect  : 'none',
        closeEffect : 'none'
    });

    // Bind Dropzone
    Dropzone.autoDiscover = false; // Disabling autoDiscover, otherwise Dropzone will try to attach twice.
    var dropzone = new Dropzone('.dropzone', {
        url: '/issues/upload_attachment/<?php echo $issue->id; ?>', 
        acceptedFiles: 'image/jpeg, image/jpg, image/png, image/gif',
        maxFilesize: 4, // MB
        maxFiles: 3,
        addRemoveLinks: false,
        autoProcessQueue: true,
        dictDefaultMessage: 'Click or drop files to upload',
        previewTemplate: '<div class="dz-preview dz-file-preview">' + 
              '<div class="dz-details">' +
                '<div class="dz-filename"><span data-dz-name></span></div>' +
                '<div class="dz-size" data-dz-size></div>' +
                '<img data-dz-thumbnail />' +
              '</div>' + 
              '<div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>' +
              '<div class="dz-success-mark"><span>✔</span></div>' +
              '<div class="dz-error-message"><span data-dz-errormessage></span></div>' +
            '</div>'
    });


    // Bind attachment remove button
    $('.btn-remove-attachment').click(function() {
        event.preventDefault();
        var self = $(this);
        if (confirm("Are you sure you want to delete this attachment?")) {
            $.get(self.attr('href'));
            self.parent().parent().remove();
        }
    });

    var issueId = '<?php echo $issue->id; ?>';

    var dataSources = {
        departments: "<?php echo Helper_View_Issues_View::getEditableSelectSource('Department'); ?>",
        issue_priorities: "<?php echo Helper_View_Issues_View::getEditableSelectSource('Issue_Priority'); ?>",
        issue_statuses: "<?php echo Helper_View_Issues_View::getEditableSelectSource('Issue_Status'); ?>",
        issue_types: "<?php echo Helper_View_Issues_View::getEditableSelectSource('Issue_Type'); ?>",
    }

    EditableFields.init(issueId, dataSources);
    LazyComments.init(issueId);
});
</script>