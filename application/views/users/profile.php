<section class="content-header">
    <h1>
        My Profile
    </h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true"><i class="fa fa-user"></i> Basic Info</a></li>
                    <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false"><i class="fa fa-lock"></i> Password</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <form data-parsley-validate role="form" action="/users/profile" class="form-horizontal" method="post">
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="col-md-1">Name</label>
                                    <div class="col-md-4">
                                        <input type="text" name="name" class="form-control" value="<?php echo $user->name; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-1">Department</label>
                                    <div class="col-md-4">
                                        <select name="department_id" class="form-control" required>
                                            <option value="">&mdash; Choose Department &mdash;</option>
                                            <?php foreach (ORM::factory('Department')->find_all() as $department): ?>
                                            <option value="<?php echo $department->id; ?>" <?php echo ($department->id == $user->department->id ? 'selected' : ''); ?>><?php echo $department->name; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Update Profile</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="tab_2">
                        <form data-parsley-validate action="/users/change_password" class="form-horizontal" method="post" role="form">
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="col-md-2">Current Password</label>
                                    <div class="col-md-4">
                                        <input type="password" name="password_current" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2">New Password</label>
                                    <div class="col-md-4">
                                        <input type="password" id="password_new" name="password_new" class="form-control" data-parsley-minlength="6" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2">Re-type New Password</label>
                                    <div class="col-md-4">
                                        <input type="password" name="password_confirm" class="form-control" data-parsley-equalto="#password_new" required>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="password" class="btn btn-primary">Change Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

