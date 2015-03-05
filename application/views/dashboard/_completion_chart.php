<p class="text-center">
    <strong>Goal Completion</strong>
</p>

<?php foreach($data as $row): ?>
  <div class="progress-group">
      <span class="progress-text"><?php echo $row['status_name']; ?><a href="/issues#status_id[]=<?php echo $row['status_id']; ?>"> [View All]</a></span>
      <span class="progress-number"><b><?php echo $row['data']; ?></b>/<?php echo $total; ?></span>
      <div class="progress sm">
          <div class="progress-bar" style="width: <?php echo $row['data'] / $total * 100; ?>%; background: <?php echo $row['color']; ?>;"></div>
      </div>
  </div>
<?php endforeach; ?>
