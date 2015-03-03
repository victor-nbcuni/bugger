
<p class="text-center">
    <strong>Goal Completion</strong>
</p>

<?php foreach($data as $status): ?>
  <div class="progress-group">
      <span class="progress-text"><?php echo $status['label']; ?><a href="/issues#status_id[]=<?php echo $status['status_id']; ?>"> [View]</a></span>
      <span class="progress-number"><b><?php echo $status['data']; ?></b>/<?php echo $total; ?></span>
      <div class="progress sm">
          <div class="progress-bar" style="width: <?php echo $status['data'] / $total * 100; ?>%; background: <?php echo $status['color']; ?>;"></div>
      </div>
  </div>
<?php endforeach; ?>
