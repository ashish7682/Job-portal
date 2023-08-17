<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script>
function validation()
{
		{
		var email = document.getElementById('txtEmail');
	    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

	    if (!filter.test(email.value)) {
	    alert('Please provide a valid email address');
	    email.focus;
	    return false;
	 }

}
</script>


</head>

<body>

<form name="carform" action="frgt-dbc.php" method="post" enctype="multipart/form-data" onsubmit="return validation()">
<table align="center">
<tr>
<td>email :</td>
<td>
<input type="text" name="email" id="txtEmail" style="width:295px" />
</td>
</tr>
<tr>
<td>mobile No.</td>
<td><input type="text" name="mobile" placeholder="Eneter your mobile" /></td>
</tr>
<tr>
<td>New password</td>
<td><input type="text" name="npwd" placeholder="Eneter your New password" /></td>
</tr>
<tr>
<td>Confirm password</td>
<td><input type="text" name="cpwd" placeholder="Eneter your confirm password" /></td>
</tr>
<tr>
<td colspan="2">
<input type="submit" value="submit" name="submit" /></td>
</tr>
</table>
</form>

</body>
</html>