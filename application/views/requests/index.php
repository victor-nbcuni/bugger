<section class="content-header">
    <h1>
        <i class="fa fa-envelope"></i> Requests
        <small>View and Manage Requests</small>
    </h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <a href="/requests/new" class="btn btn-app">
                <i class="fa fa-plus"></i> Add New
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">View / Manage Requests</h3>
                </div>
                <div class="box-body table-responsive">
                    <table class="table table-striped table-hover tableClickable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Requester</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Priority</th>
                                <th>Created</th>
                                <th>Updated</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($requests as $request): ?>
                            <tr class="record">
                                <td><a href="/requests/view/<?php echo $request->id; ?>"><?php echo $request->id; ?></a></td>
                                <td><?php echo $request->reporter->name; ?></td>
                                <td><?php echo $request->summary; ?></td>
                                <td><span class="label label-default"><?php echo $request->status->name; ?></span></td>
                                <td><span class="label label-default"><?php echo $request->priority->name; ?></span></td>
                                <td><?php echo $request->created_at; ?></td>
                                <td><?php echo $request->updated_at; ?></td>
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
    $('table').on('click', 'tbody > tr.record', function() {
        window.location = $(this).find('td:first-child > a').attr('href');
    });
});
</script>
