<section class="content-header">
    <h1>
        <i class="fa fa-bug"></i> Issues
        <small>View and Manage Issues</small>
    </h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <a href="/issues/add" class="btn btn-app">
                <i class="fa fa-plus"></i> Report New Issue
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">View / Manage Issues</h3>
                </div>
                <div class="box-body table-responsive">
                    <table class="table table-striped table-hover tableClickable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Project</th>
                                <th>Status</th>
                                <th>Type</th>
                                <th>Priority</th>
                                <th>Reporter</th>
                                <th>Assignee</th>
                                <th>Summary</th>
                                <th>Created</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($issues as $issue): ?>
                            <tr>
                                <td><a href="/issues/view/<?php echo $issue->id; ?>"><?php echo $issue->getKey(); ?></a></td>
                                <td><?php echo $issue->project->name; ?></td>
                                <td><span class="label label-default"><?php echo $issue->status->name; ?></span></td>
                                <td><span class="label label-default"><?php echo $issue->type->name; ?></span></td>
                                <td><span class="label label-default"><?php echo $issue->priority->name; ?></span></td>
                                <td><?php echo $issue->reporter->name; ?></td>
                                <td><?php echo $issue->department->name; ?></td>
                                <td><?php echo Text::limit_chars($issue->summary, 20, '...'); ?></td>
                                <td><?php echo $issue->created_at; ?></td>
                                    <?php /*<div class="btn-group">
                                        <a href="/issues/edit/<?php echo $issue->id; ?>" class="btn btn-default">Edit</a>
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="/issues/edit/<?php echo $issue->id; ?>">Edit</a></li>
                                        </ul>
                                    </div> */ ?>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
$(function() {
    $('table').dataTable();
    $('table').on('click', 'tbody > tr', function() {
        window.location = $(this).find('td:first-child > a').attr('href');
    });
});
</script>
