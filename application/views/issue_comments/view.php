<div class="media" style="border-bottom: 1px solid #eee;">
    <a class="media-left" href="#">
        <img class="img-rounded" src="/assets/img/avatar6.png" width="25" alt="<?php echo $comment->user->name; ?>">
    </a>
    <div class="media-body">
        <h4 class="media-heading">
          <?php echo $comment->user->name; ?>
        </h4>
        <div class="comment" data-url="/issue_comments/update/<?php echo $comment->id; ?>" data-pk="<?php echo $comment->id; ?>"><?php echo $comment->comment; ?></div>
        <p>
          <small class="text-muted">Posted on <?php echo $comment->created_at; ?></small>
          <?php if ($comment->can_edit && $comment->user_id == $auth_user->id): ?>
            <a href="#" class="btn-edit-comment"><i class="fa fa-edit"></i></a>
            <a href="#" data-id="<?php echo $comment->id; ?>" class="btn-remove-comment"><i class="fa fa-trash"></i></a>
          <?php endif; ?>
        </p>
    </div>
</div>
