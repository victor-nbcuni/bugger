<div class="col-xs-12">
  <div id="comments-list">
      <?php 
          if (count($comments)):
              foreach($comments as $comment) 
                  echo View::factory('issue_comments/view')->set('comment', $comment); 
          else:
              echo '<span class="text-muted">There are no comments yet on this issue.</span>';
          endif;
      ?>
  </div>
  <div class="comments-footer">
      <?php if (count($comments) == 5): ?>
          <button id="show-more-btn" class="btn btn-default btn-block">Show More</button>
      <?php endif; ?>
  </div>
</div>