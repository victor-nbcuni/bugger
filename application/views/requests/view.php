<section class="content-header">
    <h1>
        <i class="fa fa-envelope"></i> <?php echo Text::limit_chars($issue->summary, 40); ?>
        <small><?php echo $issue->getKey(); ?></small>
    </h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <h4 class="page-header">Details</h4>

            <div class="row" style="margin-bottom: 6px;">
                <div class="col-xs-2 text-muted">Requested By:</div> <div class="col-xs-2"><?php echo $issue->reporter->name; ?></div> <div class="col-xs-2 text-muted">Status:</div> <div class="col-xs-2"><span class="label label-primary" id="status_id"><?php echo $issue->status->name; ?></span></div>
            </div>

            <div class="row" style="margin-bottom: 6px;">
                <div class="col-xs-2 text-muted">Priority:</div> <div class="col-xs-2"><span id="priority_id"><?php echo $issue->priority->name; ?></span></div> 
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
                    <form id="comments-form" action="/issue_comments/new" method="post">
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
                                echo 'There are no comments yet...';
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

<script src="/assets/js/app/issues/view.js"></script>
<script>
$(function() {
    var issueId = '<?php echo $issue->id; ?>';
    var dataSources = {
        departments: "<?php echo Helper_View_Issues_View::getEditableSelectSource('Department'); ?>",
        issue_priorities: "<?php echo Helper_View_Issues_View::getEditableSelectSource('Issue_Priority'); ?>",
        issue_statuses: "<?php echo Helper_View_Issues_View::getEditableSelectSource('Issue_Status'); ?>",
    }

    EditableFields.init(issueId, dataSources);
    LazyComments.init(issueId);
});

</script>