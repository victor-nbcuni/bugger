<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

<section class="content-header">
    <h1>
        <i class="fa fa-bug"></i> <?php echo Text::limit_chars($issue->summary, 40); ?>
        <small><?php echo $issue->getKey(); ?></small>
    </h1>
</section>

<section class="content">
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
                <div class="col-xs-2 text-muted">Reporter:</div> <div class="col-xs-2"><?php echo $issue->reporter->name; ?></div> <div class="col-xs-2 text-muted">Assignee:</div> <div class="col-xs-2"><span id="assigned_department_id"><?php echo $issue->department->name; ?></span></div>
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

            <h4 class="page-header">Comments</h4>

            <div class="row">
                <div class="col-xs-12">
                    <form id="comments-form" action="/issue_comments/add" method="post">
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
                <div class="col-xs-12">
                    <div id="comments-list">
                        <?php 
                            $comments = $issue->comments->order_by('created_at', 'DESC')->offset(0)->limit(5)->find_all();
                            if (count($comments)) {
                                foreach($comments as $comment) 
                                    echo View::factory('issue_comments/view')->set('comment', $comment); 
                            }
                            else {
                                echo 'There are no comments yet on this issue.';
                            }
                        ?>
                    </div>
                    <div class="comments-footer">
                        <?php if (count($comments) == 5): ?>
                            <button id="show-more-btn" class="btn btn-default btn-block">Show More</button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
/** Lazy Load Comments Class */
var lazyComments = {
    perPage: 5,
    currentPage: 1,
    added: 0, 

    init: function() {
        $('#comments-form').on('submit', this.add);
        $('#show-more-btn').on('click', this.showMore);
    },

    /** Lazy load comments */
    showMore: function() {
        var showMoreBtn = $(this).attr('disabled', true).text('Loading...');

        $.ajax({
            url: '/issue_comments',
            type: 'GET',
            data: {
                issue_id: '<?php echo $issue->id; ?>',
                limit: lazyComments.perPage,
                offset: lazyComments.added + (lazyComments.currentPage * lazyComments.perPage)
            }
        }).done(function(response) {
            lazyComments.currentPage++;

            if (response.length > 0) {
                $('#comments-list').append(response);
                showMoreBtn.attr('disabled', false).text('Show More');
            }
            else {
                showMoreBtn.hide();
            }
        }).fail(function() {
            showMoreBtn.attr('disabled', false).text('Show More');
        });
    },

    /** Submit a new comment */
    add: function() {
        event.preventDefault();
        var form = $(this);
        var submitBtn = $('#comment-submit').attr('disabled', true);

        $.ajax({
            url: '/issue_comments/create',
            type: 'POST',
            data: form.serialize()
        }).done(function(response) {
            form[0].reset();
            submitBtn.attr('disabled', false);
            lazyComments.added++;

            if ($('#comments-list').find('.media').length) {
                $('#comments-list').prepend(response);
            }
            else {
                $('#comments-list').html(response);
            } 
        }).fail(function() {
            submitBtn.attr('disabled', false);
        });
    }
};

var editables = {
    init: function() {
        $.fn.editable.defaults.mode = 'inline';
        $.fn.editableform.buttons = '<button type="submit" class="btn btn-success editable-submit"><i class="fa fa-check"></i></button><button type="button" class="btn btn-danger editable-cancel"><i class="fa fa-close"></i></button>';
        
        $('#summary').editable({
            url: '/issues/update_editable_field',
            type: 'text',
            pk: <?php echo $issue->id; ?>,
            name: 'summary',
            ajaxOptions: {
                type: 'POST'
            }
        });

        $('#description').editable({
            url: '/issues/update_editable_field',
            type: 'textarea',
            pk: <?php echo $issue->id; ?>,
            name: 'description',
            ajaxOptions: {
                type: 'POST'
            }
        });

        $('#priority_id').editable({
            url: '/issues/update_editable_field',
            type: 'select',
            pk: <?php echo $issue->id; ?>,
            name: 'priority_id',
            ajaxOptions: {
                type: 'POST'
            }, 
            source: "<?php echo Helper_View_Issues_View::getEditableSelectSource('Issue_Priority'); ?>"
        });

        $('#status_id').editable({
            url: '/issues/update_editable_field',
            type: 'select',
            pk: <?php echo $issue->id; ?>,
            name: 'status_id',
            ajaxOptions: {
                type: 'POST'
            }, 
            source: "<?php echo Helper_View_Issues_View::getEditableSelectSource('Issue_Status'); ?>"
        });

        $('#assigned_department_id').editable({
            url: '/issues/update_editable_field',
            type: 'select',
            pk: <?php echo $issue->id; ?>,
            name: 'assigned_department_id',
            ajaxOptions: {
                type: 'POST'
            }, 
            source: "<?php echo Helper_View_Issues_View::getEditableSelectSource('Department'); ?>"
        });

        $('#type_id').editable({
            url: '/issues/update_editable_field',
            type: 'select',
            pk: <?php echo $issue->id; ?>,
            name: 'type_id',
            ajaxOptions: {
                type: 'POST'
            }, 
            source: "<?php echo Helper_View_Issues_View::getEditableSelectSource('Issue_Type'); ?>"
        });

        $('#comments-list').editable({
            selector: '.comment-text',
            url: '/issue_comments/update_editable_field',
            type: 'textarea',
            name: 'comment',
            ajaxOptions: {
                type: 'POST'
            }, 
            source: "<?php echo Helper_View_Issues_View::getEditableSelectSource('Issue_Type'); ?>"
        });
    }
}

$(function() {
    lazyComments.init();
    editables.init();
});
</script>