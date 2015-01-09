<div style="display: none;" class="flash-message alert alert-<?php echo $style['theme']; ?>" role="alert"><i class="fa <?php echo $style['icon']; ?>"></i> <?php echo $message; ?></div>
<script>
$(function() {
    $('.flash-message').slideDown(200, function() {
        var self = $(this);
        setTimeout(function() {
          self.slideUp(500);
        }, 2000);
        
    });
});
</script>
