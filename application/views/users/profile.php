<section class="content-header">
    <h1>
        My Profile
    </h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Edit Profile</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form data-parsley-validate role="form" action="/users/profile" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $user->name; ?>" required>
                        </div>
                         <div class="form-group">
                            <label>Department</label>
                            <select name="department_id" class="form-control" required>
                                <option value="">&mdash; Choose Department &mdash;</option>
                                <?php foreach (ORM::factory('Department')->find_all() as $department): ?>
                                    <option value="<?php echo $department->id; ?>" <?php echo ($department->id == $user->department->id ? 'selected' : ''); ?>><?php echo $department->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>

            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Password</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form data-parsley-validate action="/users/change_password" method="post" role="form">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Current Password</label>
                            <input type="password" name="password_current" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" id="password_new" name="password_new" class="form-control" data-parsley-minlength="6" required>
                        </div>
                         <div class="form-group">
                            <label>Re-type New Password</label>
                            <input type="password" name="password_confirm" class="form-control" data-parsley-equalto="#password_new" required>
                        </div>           
              
                    </div>
                    <div class="box-footer">
                        <button type="password" class="btn btn-primary">Change Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

