<div id="container">
	<h1>Registration</h1>

	<div id="body">
    <div id="register_form_error" class="alert alert-error"><!-- dynamic --></div>
    <form id="register_form" class="form-horizontal" method="post" action="<?=site_url('api/register')?>">
            
        <div class="control-group">
            <label class="control-label">Login</label>
            <div class="controls">
                <input type="text" name="login" class="input-xlarge">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Email</label>
            <div class="controls">
                <input type="text" name="email" class="input-xlarge">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Password</label>
            <div class="controls">
                <input type="password" name="password" class="input-xlarge">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Confirm Password</label>
            <div class="controls">
                <input type="password" name="confirm_password" class="input-xlarge">
            </div>
        </div>
            
        <div class="control-group">
            <label class="control-label">I am a</label>
            <div class="controls">
                <input type="radio" name="user_type" value="0" checked>Participant
                <input type="radio" name="user_type" value="1">Sponsor
            </div>
        </div>

        <div class="control-group">
            <div class="controls">
                <input type="submit" value="Register" class="btn btn-primary">
            </div>
        </div>
            
</form>
            <a href="<?=site_url('/')?>">Back</a>

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
