<section class="content-header">
    <h1>
        <?php echo ($user->id ? 'Edit User' : 'Add New User'); ?>
    </h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <?php include Kohana::find_file('views', 'shared/flash_message'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="boxbox-primary">
                <form action="<?php echo ($user->id ? '/users/edit/' . $user->id : '/users/add'); ?>" method="post" role="form">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Roles <span class="required">*</span></label>
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
                            <select name="roles[]" id="roles-select" class="form-control" data-placeholder="Select User Roles" multiple required>
                                <?php foreach (ORM::factory('Role')->find_all() as $role): ?>
                                    <option value="<?php echo $role->id; ?>" <?php echo (in_array($role->id, $role_ids) ? 'selected' : ''); ?>><?php echo $role->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Name <span class="required">*</span></label>
                            <input type="text" maxlength="30" name="user[name]" class="form-control" placeholder="Name" value="<?php echo $user->name; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>SSO <span class="required">*</span></label>
                            <input type="text" maxlength="32" name="user[username]" class="form-control" placeholder="SSO" value="<?php echo $user->username; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Email <span class="required">*</span></label>
                            <input type="email" maxlength="254" name="user[email]" class="form-control" placeholder="Email Address" value="<?php echo $user->email; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Password <span class="required"><?php echo ($user->id ? '' : '*'); ?></span></label>
                            <input type="password" maxlength="64" name="user[password]" class="form-control" placeholder="Password" value="" <?php echo ($user->id ? '' : 'required'); ?>>
                        </div>
                        <div class="form-group">
                            <label>Department <span class="required">*</span></label>
                            <select name="user[department_id]" class="form-control" required>
                                <option value="">&mdash; Choose Department&mdash;</option>
                                <?php foreach (ORM::factory('Department')->find_all() as $department): ?>
                                    <option value="<?php echo $department->id; ?>" <?php echo ($department->id == $user->department->id ? 'selected' : ''); ?>><?php echo $department->name; ?></option>
                                <?php endforeach; ?>
                            </select>
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
    $('#roles-select').chosen(); 
});
</script>

