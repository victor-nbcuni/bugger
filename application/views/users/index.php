<section class="content-header">
    <h1>
        <i class="fa fa-users"></i> Users
        <small>View and Manage Users</small>
    </h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <a href="/users/new" class="btn btn-success">
                <i class="fa fa-plus"></i> Add New
            </a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">View / Manage Users</h3>
                </div>
                <div class="box-body table-responsive">    
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>SSO</th>
                                <th>Email</th>
                                <th>Department</th>
                                <th>Roles</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($users as $user): ?>
                                <tr>
                                    <td><?php echo $user->id; ?></td>
                                    <td><?php echo $user->name; ?></td>
                                    <td><?php echo $user->username; ?></td>
                                    <td><?php echo $user->email; ?></td>
                                    <td><?php echo $user->department->name; ?></td>
                                    <td>
                                        <?php foreach ($user->roles->find_all() as $role): ?>
                                            <span class="label label-default"><?php echo $role->name; ?></span>
                                        <?php endforeach; ?>
                                    </td>
                                    <td>
                                        <a href="/users/edit/<?php echo $user->id; ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                    </td>
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
});
</script>
