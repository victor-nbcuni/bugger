/**
 * X-Editable Fields Class
 */
var EditableFields = {
    init: function(issueId) {
        var self = this;

        $.fn.editable.defaults.mode = 'popup';
        $.fn.editableform.buttons = '<button type="submit" class="btn btn-primary editable-submit"><i class="fa fa-check"></i></button><button type="button" class="btn btn-default editable-cancel"><i class="fa fa-close"></i></button>';
        
        $('#summary').editable({
            url: '/issues/update_editable_field',
            type: 'textarea',
            pk: issueId,
            name: 'summary',
            params: {_token: _token},
            ajaxOptions: {
                type: 'POST'
            }
        });

        $('#description').editable({
            url: '/issues/update_editable_field',
            type: 'textarea',
            pk: issueId,
            name: 'description',
            params: {_token: _token},
            ajaxOptions: {
                type: 'POST'
            }
        });

        $('#priority_id').editable({
            url: '/issues/update_editable_field',
            type: 'select',
            pk: issueId,
            name: 'priority_id',
            params: {_token: _token},
            ajaxOptions: {
                type: 'POST'
            }, 
            source: '/issues/priority_options/' + issueId,
            sourceCache: true          
        });

        $('#status_id').editable({
            url: '/issues/update_editable_field',
            type: 'select',
            pk: issueId,
            name: 'status_id',
            params: {_token: _token},
            ajaxOptions: {
                type: 'POST'
            }, 
            source: '/issues/status_options/' + issueId,
            sourceCache: false
        });

        /*$('#assigned_department_id').editable({
            url: '/issues/update_editable_field',
            type: 'select',
            pk: issueId,
            name: 'assigned_department_id',
            ajaxOptions: {
                type: 'POST'
            }, 
            source: dataSources.departments
        });*/

        $('#type_id').editable({
            url: '/issues/update_editable_field',
            type: 'select',
            pk: issueId,
            name: 'type_id',
            params: {_token: _token},
            ajaxOptions: {
                type: 'POST'
            }, 
            source: '/issues/type_options/' + issueId,
            sourceCache: true        
        });
    }
}