var Template = function() {
  
    // ------------------------------------------------------------------------
  
    this.__construct = function() {
        console.log('Template Created');
    };
    
    // ------------------------------------------------------------------------
    this.todo = function(obj)
    {
        var output = '';
        output += '<div id="todo_' + obj.todo_id + '">';
        output += '<span>' + obj.content + '</span>';
        output += '<a data-id="'+ obj.todo_id + '" data-completed="1" class="todo_update" href="api/update_todo">| update</a>';
        output += '<a data-id="'+ obj.todo_id + '" class="todo_delete" href="api/delete_todo">| delete</a>';
        output += '<div>';
        return output;
    }
    
    // ------------------------------------------------------------------------
    this.note = function(obj)
    {
        var output = '';
        output += '<div id="note_' + obj.note_id + '">';
        output += '<span><a id="note_title_' + obj.note_id + '" href="#">' + obj.title + '</a></span>';
        output += '<a data-id="' + obj.note_id + '" class="note_update_display" href="#">Edit</a>';
        output += '<a data-id="' + obj.note_id + '" class="note_delete" href="api/delete_note"><i class="icon-remove"></i></a>';
        output += '<div class="note_edit_container" id="note_edit_container_' + obj.note_id + '"></div>';
        output += '<div id="note_content_' + obj.note_id + '" class="hide">'+ obj.content +'</div>';
        output += '<div>';
        return output;
    }
    
    // ------------------------------------------------------------------------
    this.note_edit = function(note_id) {
        var output = '';
        
        output += '<form method="post" class="note_edit_form" action="api/update_note">';
        output += '<input class="title" type="text" name="title" />';
        output += '<input class="note_id" type="hidden" name="note_id" value="' + note_id + '"/>';
        output += '<textarea class="content" name="content"></textarea>';

        output += '<input type="submit" value="Save" />';
        output += '<input type="submit" class="note_edit_cancel" value="Cancel" />';
        output += '</form>';
        return output;
    }
    // ------------------------------------------------------------------------
    
    this.__construct();
    
};
