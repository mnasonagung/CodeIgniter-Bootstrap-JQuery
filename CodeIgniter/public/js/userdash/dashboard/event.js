var Event = function() {
  
    // ------------------------------------------------------------------------
  
    this.__construct = function() {
        console.log('Event Created');
        create_todo();
        create_note();
        update_todo();
        update_note();
        update_note_display();
        delete_todo();
        delete_note();
    };
    
    // ------------------------------------------------------------------------
    var create_todo = function() {
        $("#create_todo").submit(function(evt){
            evt.preventDefault();
            
            var url = $(this).attr('action');
            var postData = $(this).serialize();
            
            $.post(url, postData, function(o) {
                if (o.result === 1) {
                    Result.success('Test');
                    var output = Template.todo(o.data[0]);
                    $("#list_todo").append(output);
                } else {
                    Result.error(o.error);
                }
            }, 'json');
            
        });
    };
    // ------------------------------------------------------------------------
    var create_note = function() {
        $("#create_note").submit(function(evt){
            evt.preventDefault();
            
            var url = $(this).attr('action');
            var postData = $(this).serialize();
            
            $.post(url, postData, function(o) {
                if (o.result === 1) {
                    Result.success('Test');
                    var output = Template.note(o.data[0]);
                    $("#list_note").append(output);
                } else {
                    Result.error(o.error);
                }
            }, 'json');
            
        });
    };
    // ------------------------------------------------------------------------
    var update_todo = function() {
        $("body").on('click', '.todo_update', function(e) {
            e.preventDefault();
            
            var self = $(this);
            var url = $(this).attr('href');
            var postData = {
                'todo_id': $(this).attr('data-id'),
                'completed': $(this).attr('data-completed')
            };
            
            $.post(url, postData, function(o) {
                if(o.result === 1) {
                    Result.success('Saved');
                    self.parents('div').addClass('todo_complete');
                } else {
                    Result.error('Nothing updated');
                }
            }, 'json');
        });
    };
    // ------------------------------------------------------------------------
    var update_note_display = function() {
        $("body").on("click", ".note_update_display", function(e) {
            e.preventDefault();
            var note_id  = $(this).data('id');
            var output = Template.note_edit(note_id);
            $("#note_edit_container_" + note_id).html(output);
        });

        $("body").on("click", ".note_edit_cancel", function(e) {
            e.preventDefault();
            $(this).parents('.note_edit_container').html('');
        });
    };
    // ------------------------------------------------------------------------
    var update_note = function() {
        $("body").on("submit", ".note_edit_form", function(e) {
            e.preventDefault();
            var url = $(this).attr('action');
            var postData = {
                note_id: $(this).find('.note_id').val(),
                title: $(this).find('.title').val(),
                content: $(this).find('.content').val()
            };

            
            $.post(url, postData, function(o){
                if (o.result == 1) {
                    Result.success("Successfully updated note");
                    $("#note_title_" + postData.note_id).html(postData.title);
                } else {
                    Result.error("Error saving");
                }
            }, 'json');
        });


    };
    // ------------------------------------------------------------------------
    var delete_todo = function() {
        $("body").on('click', '.todo_delete', function(e) {
            e.preventDefault();
            
            var self = $(this).parent('div');
            var url = $(this).attr('href');
            var postData = {
                'todo_id': $(this).attr('data-id')
            };
            $.post(url, postData, function(o) {
                if (o.result ===1) {
                    Result.success('Item Deleted.');
                    self.remove();
                } else {
                    Result.error(o.msg);
                }
            },'json');
        });
    };
    // ------------------------------------------------------------------------
    var delete_note = function() {

    };
    // ------------------------------------------------------------------------
    this.__construct();
    
};
