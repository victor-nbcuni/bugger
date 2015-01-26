<section class="content-header">
    <h1>
        <?php echo ($user->id ? 'Edit User' : 'Add New User'); ?>
        <?php if ($user->id): ?>
            <small><a href="/users/add">Add New</a></small>
        <?php endif; ?>
    </h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="boxbox-primary">
                <form data-parsley-validate action="<?php echo ($user->id ? '/users/edit/' . $user->id : '/users/add'); ?>" class="form-horizontal" method="post" role="form">
                    <input type="hidden" name="_token" value="<?php echo Session::instance()->getToken(); ?>">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-1 control-label">Roles<span class="required-field">*</span></label>
                            <?php
                                if ($user->id) {
                                    $roles = $user->roles->find_all();
                                    $role_ids = array();
                                    foreach($roles as $role) {
                                        $role_ids[] = $role->id;
                                    }
                                }
                                else {
                                    $role_ids = array(1, 3);
                                }
                            ?>
                            <div class="col-sm-7">
                                <select name="roles[]" id="role-select" class="form-control" data-placeholder="Select User Roles" multiple required>
                                    <?php foreach (ORM::factory('Role')->find_all() as $role): ?>
                                        <option value="<?php echo $role->id; ?>" <?php echo (in_array($role->id, $role_ids) ? 'selected' : ''); ?>><?php echo $role->name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label">Name<span class="required-field">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" maxlength="30" name="user[name]" class="form-control" placeholder="Name" value="<?php echo $user->name; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label">SSO<span class="required-field">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" maxlength="32" name="user[username]" class="form-control" placeholder="SSO" value="<?php echo $user->username; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label">Email<span class="required-field">*</span></label>
                            <div class="col-sm-7">
                                <input type="email" maxlength="254" name="user[email]" class="form-control" placeholder="Email Address" value="<?php echo $user->email; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label">Password<span class="required-field"><?php echo ($user->id ? '' : '*'); ?></span></label>
                            <div class="col-sm-7">
                                <input type="password" maxlength="64" name="user[password]" class="form-control" placeholder="Password" value="" <?php echo ($user->id ? '' : 'required'); ?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label">Department<span class="required-field">*</span></label>
                            <div class="col-sm-7">
                                <select name="user[department_id]" class="form-control" required>
                                    <option value="">&mdash; Choose Department &mdash;</option>
                                    <?php foreach (ORM::factory('Department')->find_all() as $department): ?>
                                        <option value="<?php echo $department->id; ?>" <?php echo ($department->id == $user->department->id ? 'selected' : ''); ?>><?php echo $department->name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="/users">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
$(function() {
    $('#role-select').chosen(); 
});
</script>

