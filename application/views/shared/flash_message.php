<div style="display: none;" class="alert flash flash-<?php echo $style['theme']; ?>" role="alert"><i class="fa <?php echo $style['icon']; ?>"></i> <?php echo $message; ?></div>
<script>
$(function() {
    $('.flash').slideDown(200, function() {
        var self = $(this);
        setTimeout(function() {
          self.slideUp(500);
        }, 2000);
        
    });
});
</script>
