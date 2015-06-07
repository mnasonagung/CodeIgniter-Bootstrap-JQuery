var Dashboard = function() {
  
    // ------------------------------------------------------------------------
  
    this.__construct = function() {
        console.log('Dashboard Created');
        Template= new Template();
        Event= new Event();
        Result= new Result();
        load_parti();
        load_event();
    };
    
    // ------------------------------------------------------------------------
    
    var load_parti = function() {
        $.get('parti_api/get_parti', function(o) {
            var output = '';
            for (var i = 0; i < o.length; i++) {
                output += Template.parti(o[i]);
            }
            $("#parti_out").html(output);
        }, 'json');
    };
    
    // ------------------------------------------------------------------------
    
    var load_event = function() {
        $.get('parti_api/get_event', function(o) {
            var output = '';
            output += '<select name="event_id">';
            for (var i = 0; i < o.length; i++) {
                output += Template.eventinfo(o[i]);
            }
            output += '</select>';
            $("#event_list").html(output);
        }, 'json');
    };
    // ------------------------------------------------------------------------
    
    var load_note = function() {
        $.get('api/get_note', function(o) {
            var output = '';
            for (var i = 0; i < o.length; i++) {
                output += Template.note(o[i]);
            }
            $("#list_note").html(output);
        }, 'json');
    };
    
    // ------------------------------------------------------------------------
    
    this.__construct();
    
};
