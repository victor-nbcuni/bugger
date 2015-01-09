<section class="content-header">
    <h1>
        Create Support Request
    </h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="boxbox-primary">
                <form action="/requests/new" method="post" role="form">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Project <span class="required-field">*</span></label>
                            <select name="project_id" class="form-control" required>
                                <option value="">&mdash; Choose Project &mdash;</option>
                                <?php foreach(ORM::factory('Project')->find_all() as $project): ?>
                                    <option value="<?php echo $project->id; ?>"><?php echo $project->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Summary <span class="required-field">*</span></label>
                            <input type="text" maxlength="30" name="summary" class="form-control" placeholder="" value="" required>
                        </div>
                        <div class="form-group">
                            <label>Description <span class="required-field">*</span></label>
                            <textarea name="description" class="form-control" rows="10" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Priority <span class="required-field">*</span></label>
                            <select name="priority_id" class="form-control">
                                <?php 
                                    foreach(ORM::factory('Issue_Priority')->find_all() as $priority): 
                                ?>
                                    <option value="<?php echo $priority->id; ?>"><?php echo $priority->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                       <div class="form-group row">
                            <div class="col-xs-2">
                                <label>Required Date / Time</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" name="due_date" class="form-control datepicker">
                                </div>
                            </div>
                            <div class="col-xs-2">
                                <label>&nbsp;</label>
                                <select name="due_time" class="form-control">
                                    <option value=""></option>
                                    <?php foreach(Helper_View_Requests_Form::getTimeSelectOptions() as $label): ?>
                                        <option value="<?php echo $label; ?>"><?php echo $label; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="/requests">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
$(function() {
    $('.datepicker').datepicker();
});
</script>