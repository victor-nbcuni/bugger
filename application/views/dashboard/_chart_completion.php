
<p class="text-center">
    <strong>Goal Completion</strong>
</p>

<?php foreach($chart_data as $status): ?>
  <div class="progress-group">
      <span class="progress-text"><a href="/issues#status_id[]=<?php echo $status['status_id']; ?>"><?php echo $status['label']; ?></a></span>
      <span class="progress-number"><b><?php echo $status['data']; ?></b>/<?php echo $total_issues; ?></span>
      <div class="progress sm">
          <div class="progress-bar" style="width: <?php echo $status['data'] / $total_issues * 100; ?>%; background: <?php echo $status['color']; ?>;"></div>
      </div>
  </div>
<?php endforeach; ?>
