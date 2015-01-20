<?php 
    foreach($comments as $comment) 
        echo View::factory('issue_comments/view')
            ->set('auth_user', $auth_user)
            ->set('comment', $comment); 
?>
