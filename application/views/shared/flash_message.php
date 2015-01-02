<?php 
if ($flash = Session::instance()->getFlash()):
    if ($flash['type'] == 'warning') {
        $alert_css_cls = 'warning';
        $icon_css_cls = 'fa-exclamation-circle';
    } 
    elseif ($flash['type'] == 'success') {
        $alert_css_cls = 'success';
        $icon_css_cls = 'fa-check-circle';
    } 
    else {
        $alert_css_cls = 'danger';
        $icon_css_cls = 'fa-times-circle';
    }
?>
    <div class="alert alert-<?php echo $alert_css_cls; ?>" role="alert"><i class="fa <?php echo $icon_css_cls; ?>"></i> <?php echo $flash['message']; ?></div>
<?php endif; ?>
