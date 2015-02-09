<table class="table table-striped table-hover table-clickable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Project</th>
            <th>Type</th>
            <th>Status</th>
            <th>Priority</th>
            <th>Reporter</th>
            <th>Assignee</th>
            <th>Title</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($issues as $issue): 
            $status = $issue->status;
            $priority = $issue->priority;
        ?>
            <tr class="record">
                <td><a href="<?php echo $issue->url(); ?>"><?php echo $issue->trackingCode(); ?></a></td>
                <td><?php echo $issue->project->name; ?></td>
                <td><?php echo $issue->type->name; ?></span></td>
                <td><span class="label" style="background:<?php echo $status->color; ?>"><?php echo strtoupper($status->name); ?></span></td>
                <td><span class="label" style="background:<?php echo $priority->color; ?>"><?php echo strtoupper($priority->name); ?></span></td>
                <td><?php echo $issue->reporter->name; ?></td>
                <td><?php echo $issue->assigned_department->name; ?></td>
                <td><?php echo Text::limit_chars($issue->summary, 20, '...'); ?></td>
                <td><?php echo $issue->created_at; ?></td>
                <td><?php echo $issue->updated_at; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>