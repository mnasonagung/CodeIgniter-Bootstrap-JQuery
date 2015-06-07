<div id="container">
	<h1>Participant</h1>

	<div id="body">
	<form method="POST" action="<?=site_url('parti_api/create_parti')?>">
	<table>
            <tr>
                <td><label>Name</label></td>
                <td><input type="text" name="parti_name"/></td>			
                <td><label>Title</label></td>
                <td><input type="text" name="title"/></td>
            </tr>
            <tr>
                <td><label>Email</label></td>
                <td><input type="text" name="email"/></td>
                <td><label>Participant Type</label></td>
		<td><select name="parti_type">
                        <option value="1">Specialist</option>
                        <option value="2">General Practitioner</option>
                        <option value="3">Nurse</option>
                        <option value="4">Public</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label>Phone</label></td>
                <td><input type="text" name="phone"/></td>
                <td></td>
		<td></td>
            </tr>
            <tr>
                <td><label>Institution</label></td>
                <td><input type="text" name="institution"/></td>
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
