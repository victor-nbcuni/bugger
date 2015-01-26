<h4 class="page-header">Comments</h4>

<?php if ($issue->status_id != Model_Issue_Status::CLOSED): ?>
    <div class="row">
        <div class="col-xs-12">
            <form data-parsley-validate id="comments-form" action="/issue_comments/add" method="post">
                <input type="hidden" name="_token" value="<?php echo Session::instance()->getToken(); ?>">
                <input type="hidden" name="issue_id" value="<?php echo $issue->id; ?>">
                <input type="hidden" name="user_id" value="<?php echo Auth::instance()->get_user()->id; ?>">
                <div class="form-group">
                    <textarea id="comment-textarea" name="comment" class="form-control" rows="5" placeholder="Type your comment here..." required></textarea>
                </div>
                <button id="comment-submit" type="submit" class="btn btn-success">Add this comment</button>
            </form>
        </div>
    </div>
    <hr>
<?php endif; ?>

<div class="row">
    <div class="col-xs-12">
        <div id="comments-list">
            <?php 
                if (count($comments)) {
                    foreach($comments as $comment) echo View::factory('issue_comments/view')->set('comment', $comment); 
                }
                else {
                    echo '<span class="text-muted">There are no comments yet on this ticket.</span>';
                }
            ?>
        </div>
        <div class="comments-footer">
            <?php if (count($comments) == 5): ?>
                <button id="btn-show-more" class="btn btn-default btn-block">Show More</button>
            <?php endif; ?>
        </div>
    </div>
</div>