<section class="content-header">
    <h1>
        Create a New Request
    </h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="boxbox-primary">
                <form action="/requests/new" method="post" role="form">
                    <input type="hidden" name="reporter_user_id" value="<?php echo Auth::instance()->get_user()->id; ?>">
                    <input type="hidden" name="type_id" value="<?php echo Model_Issue_Type::SUPPORT_REQUEST; ?>">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Title <span class="required-field">*</span></label>
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
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="/users">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
