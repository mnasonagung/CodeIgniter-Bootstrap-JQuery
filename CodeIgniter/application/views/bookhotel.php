<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Book Hotel</title>

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
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="application/views/assets/jquery/jquery-ui.js"></script>
<script type="text/javascript" src="application/views/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="application/views/assets/bootstrap/js/bootstrap.js"></script>
<link href="application/views/assets/bootstrap-datepicker/css/datepicker.css" rel="stylesheet">
<link href="application/views/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<body>


<div id="container">
	<h1>Book Hotel</h1>

	<div id="body">
	<form method="POST" action="payment">
	<table>
		<tr>
			<td><label>Name</label>
 </td>
 <td><label name="name">.........</label></td>			<td>
 </td>
 <td></td>
		</tr>
		<tr>
			<td><label>Hotel</label>
 </td>
 <td><select name="hotel">
 <option>option 1</option>
 <option>option 2</option>
 </select>
 </td>
		<td></td>
		<td></td>
		</tr>
		<tr>
			<td><label>Room Type</label>
 </td>
 <td><select name="roomtype">
 <option>option 1</option>
 <option>option 2</option>
 </select>
 </td>
		<td></td>
		<td></td>
		</tr>
				<tr>
			<td><label>Stay From</label>
 </td>
 <td><input type="text" class="datepicker" placeholder="From"/>
 </td>
		<td>to</td>
		<td><input type="text" class="datepickerto" placeholder="To"/></td>
		</tr>
				<tr>
			<td colspan="4"><label>Duration .... days total Rp. .......</label>
 </td>
 		</tr>
		<tr>
			<td colspan="4"><input type="submit" name="submit" value="Next"/>
 </td>
		</tr>

	</table>
</form>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
<script  type="text/javascript">
$('.datepicker').datepicker({format: 'mm/dd/yyyy'});
$('.datepickerto').datepicker({format: 'mm/dd/yyyy'});

</script>

</html>
