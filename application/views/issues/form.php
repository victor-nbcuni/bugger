<section class="content-header">
    <h1>
        <i class="fa fa-bug"></i> <?php echo ($issue->id ? 'Edit Issue <br><small>' . $issue->getKey() . '</small>' : 'Add New Issue'); ?>
    </h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="boxbox-primary">
                <form action="<?php echo ($issue->id ? '/issues/edit/' . $issue->id : '/issues/new'); ?>" method="post" role="form">
                    <input type="hidden" name="issue[reporter_user_id]" value="<?php echo Auth::instance()->get_user()->id; ?>">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Project <span class="required-field">*</span></label>
                            <select name="issue[project_id]" class="form-control" required>
                                <option value="">&mdash; Choose Project &mdash;</option>
                                <?php foreach(ORM::factory('Project')->find_all() as $project): ?>
                                    <option value="<?php echo $project->id; ?>"<?php echo ($issue->project_id == $project->id ? 'selected' : ''); ?>><?php echo $project->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Priority <span class="required-field">*</span></label>
                            <select name="issue[priority_id]" class="form-control">
                                <?php 
                                    foreach(ORM::factory('Issue_Priority')->find_all() as $priority): 
                                        $selected = ( ($issue->id && $issue->priority_id == $priority->id) || ( ! $issue->id && $priority->name == 'Normal') ) ? 'selected' : '';
                                ?>
                                    <option value="<?php echo $priority->id; ?>" <?php echo $selected; ?>><?php echo $priority->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Type <span class="required-field">*</span></label>
                            <select name="issue[type_id]" class="form-control" required>
                                <option value="">&mdash; Choose Type&mdash;</option>
                                <?php foreach(ORM::factory('Issue_Type')->find_all() as $type): ?>
                                    <option value="<?php echo $type->id; ?>" <?php echo ($issue->type_id == $type->id ? 'selected' : ''); ?>><?php echo $type->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <?php if ($issue->id): ?>
                            <div class="form-group">
                                <label>Status <span class="required-field">*</span></label>
                                <select name="issue[status_id]" class="form-control" required>
                                    <?php foreach(ORM::factory('Issue_Status')->find_all() as $status): ?>
                                        <option value="<?php echo $status->id; ?>" <?php echo($issue->status_id == $status->id ? 'selected' : ''); ?>><?php echo $status->name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        <?php endif; ?>

                        <div class="form-group">
                            <label>Assignee <span class="required-field">*</span></label>
                            <select name="issue[assigned_department_id]" class="form-control" required>
                                <option value="">&mdash; Choose Department&mdash;</option>
                                <?php foreach(ORM::factory('Department')->find_all() as $department): ?>
                                    <option value="<?php echo $department->id; ?>" <?php echo ($issue->assigned_department_id == $department->id ? 'selected' : ''); ?>><?php echo $department->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Brief Description <span class="required-field">*</span></label>
                            <input type="text" maxlength="30" name="issue[summary]" class="form-control" value="<?php echo $issue->summary; ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Description <span class="required-field">*</span></label>
                            <textarea name="issue[description]" class="form-control" rows="5" required><?php echo $issue->description; ?></textarea>
                        </div>
                    </div>
                        
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="/issues">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

