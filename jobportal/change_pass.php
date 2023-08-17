<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>PHPGURUKUL Job Portal/Change_password</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />

<script >
function validation()
{
	{
 	if(document.carform.oldpass.value.length<"8")
 	{
 		alert("Password length greater than 8 digit.");
 		document.carform.oldpass.focus();
 		return false;
 	}
}
{
 	if(document.carform.newpass.value.length<"8")
 	{
 		alert("Password length greater than 8 digit.");
 		document.carform.newpass.focus();
 		return false;
 	}
}
{
 	if(document.carform.conpass.value.length<"8")
  	{
 		alert("Password length greater than 8 digit.");
 		document.carform.conpass.focus();
 		return false;
 	}
}

	{
 	if((document.carform.newpass.value) != (document.carform.conpass.value))
 	{
 		alert("Both Password Are Not Equal");
 		document.carform.oldpass.focus();
 		return false;
 	}
	}
}
</script>

</head>

<body style=" background-color:#FFFFFF;" ><!--Main div-->
<div style="width:100%; margin:auto; height:auto; border:solid 0px #3F3F3F;">
<div style="width:1050px; margin:auto; height:auto; border:solid 0px #D2D2FF;">
 
<!--header--><div style="width:1048px; height:120px; border:solid 0px #CCCCCC;">

<?php
	if(isset($_SESSION['EMAIL']))
	{
		include('myaccountheader.php');
	}
	else
	{
		include('header.php');
	}

?></div><!--header close-->

<!--menu--><div style="width:1048px;  height:40px; border:solid 0px #CCCCCC;">

<?php
	if(isset($_SESSION['EMAIL']))
	{
		include('ma_menu.php');
	}
	else
	{
		include('menu.php');
	}
?></div>
			
<!--middle-->
     <table style=" width:1050px; background-color:#FFFFFF;height:auto; border:solid 0px #999900;">
<tr><td>
<!--left-->
<div style="width:200px; height:248px;background-color:#FFFFFF;border:1px #CCCCCC solid;float:left;"><?php include('left.php'); ?></div>
<!--right--><div style="width:810px; height:auto; font-family:"Times New Roman", Times, serif; float:left; ">
	
		<p>&nbsp;</p><center><h3>Change Password</h3></center>
<?php
		session_start();
		$count=$msg="";
		if($_POST['submit'])
	{
		include("dbconnection.php");
		$email=$_SESSION['EMAIL'];
		$oldpass=$_POST['oldpass'];
		$newpass=$_POST['newpass'];
		$conpass=$_POST['conpass'];

		$query_check="select * from user_registration where crpass='$oldpass' and email='$email' ";
		$result=mysql_query($query_check);
		$count=mysql_num_rows($result);
		if($count > 0)
		{
				$query="update user_registration set crpass='$newpass',conpass='$conpass' where crpass='$oldpass' and email='$email' ";
				$res=mysql_query($query);
				if($res)
				{
					echo"<script>alert('success')</script>";
				}
		}
		else
		{
			$msg="Old Password Is Incorrect";
		}
		}
	?>
   <center>
   <form name="carform" action="" method="post" enctype="multipart/form-data" onsubmit="return validation()">
      <table height="251" border="0" style="width:600px; height:245px; margin-left:300px;">
    <tr>
    <td width='200' height="36">Old Password:</td>
    <td width="70%">
    <input type="password" name="oldpass" style="width:275px" />
    </td>
    </tr>
    <tr>
    <td width='200' height="36">New Password:</td>
    <td width="70%">
    <input type="password" name="newpass" style="width:275px" />
    </td>
    </tr>

    <tr>
    <td width='200' height="36">Confirm Password:</td>
    <td width="70%">
    <input type="password" name="conpass" style="width:275px" />
    </td>
    </tr>

	<tr>
	    <td width='200' height="36" align='center' colspan='2'><font color='red'><?php echo"$msg"; ?></font></td>
    </tr>

	<tr><td colspan='2' align='center' >
	<input type="submit" name="submit" value="submit"  /></td></tr>
    </table>

  </form></center></div>
</td></tr></table>
</div>
</div>

<!--centerclose-->

 <!--footer--><div style="width:100%; height:200px;  background-color:#0066CC; border:solid 1px #000000;">
<?php include('footer.php');?>
</div>
<!--footer close-->

</body>

</html>