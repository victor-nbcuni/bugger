<section class="content-header">
    <h1>
        <i class="fa fa-bug"></i> <?php echo $title; ?>
        <small><?php echo $subtitle; ?></small>
    </h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <a href="/issues/new" class="btn btn-app">
                <i class="fa fa-plus"></i> Add New
            </a>
        </div>
    </div>
    <!--
    <div class="row">
        <div class="col-xs-12">
            <form class="form-inlsine">
                <label>Project</label>
                <select class="col-xs-2" multiple>
                    <option>1</option>
                    <option>2</option>
                </select>

                <label>Status</label>
                <select class="col-xs-2" multiple>
                    <option>1</option>
                    <option>2</option>
                </select>

                <label>Type</label>
                <select class="col-xs-2" multiple>
                    <option>1</option>
                    <option>2</option>
                </select>

                <label>Priority</label>
                <select class="col-xs-2" multiple>
                    <option>1</option>
                    <option>2</option>
                </select>

                <label>Reporter</label>
                <select class="col-xs-2" multiple>
                    <option>1</option>
                    <option>2</option>
                </select>

                <label>Assignee</label>
                <select class="col-xs-2" multiple>
                    <option>1</option>
                    <option>2</option>
                </select>
            </form>
        </div>
    </div>
    -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">View / Manage Tickets</h3>
                </div>
                <div class="box-body table-responsive">
                    <table class="table table-striped table-hover table-clickable">
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
                                <th>Updated</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($issues as $issue): ?>
                                <tr class="record">
                                    <td><a href="/issues/view/<?php echo $issue->id; ?>"><?php echo $issue->getKey(); ?></a></td>
                                    <td><?php echo $issue->project->name; ?></td>
                                    <td><span class="label label-default"><?php echo $issue->status->name; ?></span></td>
                                    <td><span class="label label-default"><?php echo $issue->type->name; ?></span></td>
                                    <td><span class="label label-default"><?php echo $issue->priority->name; ?></span></td>
                                    <td><?php echo $issue->reporter->name; ?></td>
                                    <td><?php echo $issue->assigned_department->name; ?></td>
                                    <td><?php echo Text::limit_chars($issue->summary, 20, '...'); ?></td>
                                    <td><?php echo $issue->created_at; ?></td>
                                    <td><?php echo $issue->updated_at; ?></td>
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
    //$('form select').multiselect();

    $('table').on('click', 'tbody > tr.record', function() {
        window.location = $(this).find('td:first-child > a').attr('href');
    });

    $('table').DataTable({
        'aaSorting': [[9, 'desc']],
        /*initComplete: function () {
            var api = this.api();
            api.columns().indexes().flatten().each(function(i) {
                if (i == 0 || i >= 7) return false;
                var column = api.column(i);
                var select = $('<select><option value="">All</option></select>')
                    .appendTo( $(column.header()) )
                    .on('change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each(function (d, j) {
                    if (d.indexOf('>') > -1) {
                        var start = d.indexOf('>') + 1;
                        var length = (d.indexOf('/') - 1) - start;
                        d = d.substr(start, length);
                        //console.log(d);
                    }
                    
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            });
        }*/
    });
});
</script>
