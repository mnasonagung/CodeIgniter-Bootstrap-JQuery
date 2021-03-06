<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Payment</title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Payment</h1>

	<div id="body">
	<form>
	<table>
		<tr>
			<td><label>Name</label>
 </td>
 <td><label name="name">.........</label></td>			<td>
 </td>
 <td></td>
		</tr>
		<tr>
			<td><label>Email</label>
 </td>
 <td><label name="email">.........</label></td>			<td>
 </td>
 <td></td>
		</tr>
		<tr>
			<td><label>Cell phone</label>
 </td>
 <td><label  name="phone">.........</label></td>			<td>
 </td>
 <td></td>
		</tr>
		<tr>
			<td><label>Institution</label>
 </td>
 <td><label  name="institution">.........</label></td>			<td>
 </td>
 <td></td>
		</tr>
		<tr>
			<td><label>Address</label>
 </td>
 <td><label  name="address">.........</label></td>			<td>
 </td>
 <td></td>
		</tr>
		<tr>
			<td><label>Event</label>
			</td>
			<td><label  name="event">.........</label> </td>
			<td><label  name="price">.........</label></td>
			<td></td>
		</tr>
		<tr>
			<td>
			</td>
			<td><label  name="event">.........</label> </td>
			<td><label  name="price">.........</label></td>
			<td></td>
		</tr>
		<tr>
			<td><label>Hotel</label>
 </td>
 <td><label name="hotel">.....................</label>
 </td>
		<td><label name="price">.....................</label></td>
		<td></td>
		</tr>
		<tr>
		<td></td>
			<td><label>Total</label>
 </td>
 <td><label name="total">.....................</label>
 </td>
		<td></td>
		
		</tr>
		<tr>
			<td><label>Payment</label>
 </td>
 <td>Transfer to <label name="rekbank">...................</label>
 </td>
		<td>attach receipt</td>
		<td><input type="file" name="receipt" value="File"/></td>
		</tr>
				<tr>
		<tr>
			<td colspan="4"><input type="submit" name="submit" value="Submit"/>
 </td>
		</tr>

	</table>
</form>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>
