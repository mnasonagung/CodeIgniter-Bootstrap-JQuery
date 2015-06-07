<div id="container">
	<h1>Register Event</h1>

	<div id="body">
	<form id="party_form" method="POST" action="<?=site_url('regevent_api/create_regparti')?>">
	<table>
            <div id="parti_out">
            <span class="ajax-loader-gray"></span>
            </div>  

            <div id="event_list">
            <span class="ajax-loader-gray"></span>
            </div>                          
            <tr>
                <td><input type="checkbox" name="event_type" value="M">Symposium<br></td>
                <td><input type="text" name="event_type_id" value="2"/></td>
                <td><input type="hidden" name="line_id" value="1"/></td>
		<td></td>
            </tr>
            <tr>
                <td><input type="checkbox" name="event_type" value="L">Workshop<br></td>
                <td><label>Event Type Id</label></td>
		<td></td>
		<td></td>
            </tr>
            <tr>
                <td><label>Sponsor</label></td>
                <td><input type="text" name="sponsor_id" value="1"/></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td><label>City</label></td>
                <td><input type="text" name="city"/></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td><label>Region</label></td>
                <td><input type="text" name="region"/></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td><label>Post Code</label></td>
                <td><input type="text" name="post_code"/></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td><label>Mailing Address</label></td>
                <td><input type="text" name="address"/></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="4"><input type="submit" name="submit" value="Next"/></td>
            </tr>
	</table>
</form>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>


<script type="text/javascript">
$(function() {
    $("#register_form_error").hide();
    
    $("#register_form").submit(function(evt) {
        evt.preventDefault();
        var url = $(this).attr('action');
        var postData = $(this).serialize();
        
        $.post(url,postData,function(o)  {
            if (o.result === 1){
                window.location.href = '<?=site_url('dashboard')?>';
            } else {
                $("#register_form_error").show();
                var output = '<ul>';
                for(var key in o.error) {
                    var value = o.error[key];
                    output += '<li>' + key + ':' + value + '</li>';
                }
                output += '</ul>';
                $("#register_form_error").html(output);
            }
        }, 'json');
    });
});
</script>
