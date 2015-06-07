<div id="container">
	<h1>Welcome to our Website!</h1>

	<div id="body">
	<form id="login_form" method="POST" action="<?=site_url('api/login')?>">
<table>
	<tr>
		<td> 
	<table>
		<tr>
			<td><label>User/Email</label></td>
		</tr>
		<tr>
			<td><input type="text" name="login"/></td>
		</tr>
		<tr>
			<td><label>Password</label></td>
		</tr>
		<tr>
			<td><input type="password" name="password"/></td>
		</tr>
		<tr>
			<td><input type="submit" name="login" value="Log in"/></td>
		</tr>

	</table>
	</td>
	<td><table>
		    <tr>
			    <td><a href="<?=site_url('home/register')?>">New User</a> </td>
		    </tr>
		    		    <tr>
			    <td><a href="forgot">Forgot Password</a></td>
		    </tr>
	    </table></td>
	</tr>
</table>
	</form>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

<script type="text/javascript">
$(function() {
    $("#login_form").submit(function(evt) {
        evt.preventDefault();
        var url = $(this).attr('action');
        var postData = $(this).serialize();
        
        $.post(url,postData,function(o)  {
            if (o.result === 1){
                window.location.href = '<?=site_url('regevent')?>';
            } else {
                alert('Invalid login');
            }
        }, 'json');
    });
});
</script>
