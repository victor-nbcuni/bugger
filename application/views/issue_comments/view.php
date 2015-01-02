<div class="media" style="border-bottom: 1px solid #eee;">
    <a class="media-left" href="#">
        <img class="img-rounded" src="/assets/img/avatar6.png" width="25" alt="<?php echo $comment->user->name; ?>">
    </a>
    <div class="media-body">
        <h4 class="media-heading"><?php echo $comment->user->name; ?></h4>
        <div class="comment-text" data-pk="<?php echo $comment->id; ?>"><?php echo $comment->comment; ?></div>
        <p><small class="text-muted">Posted on <?php echo $comment->created_at; ?></small></p>
    </div>
</div>
