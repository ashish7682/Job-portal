<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHPGURUKUL Job Portal</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/coin-slider.css" />
<script >function validation()
{
{

    var email = document.getElementById('txtEmail');
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (!filter.test(email.value)) {
    alert('Please provide a valid email address');
    email.focus;
    return false; }
 }
  if(document.carform.mobile.value.length!=10)
  {
 	 alert("Please Enter The valid Mobile No.");
 	 document.carform.mobile.focus();
 	 return false;
 	 }
if(document.carform.newpass.value=="")
{
	alert ("please enter the new Password");
	document.carform.newpass.focus();
	return false;
}
{
if(document.carform.conpass.value=="")
{
alert("Please Enter confirm password");
document.carform.conpass.focus();
return false;
}

}


}

</script>
</head>
<body style=" background-color:#FFFFFF;" >
<!--Main div-->
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
		


 <!--Main 2div--> <div style="width:1048px; height:auto; background-color:#FFFFFF; font-family:Tahoma, Geneva, sans-serif; color:#000; border:solid 2px #D2D2FF;">
 <div style="width:1044px; height:auto; font-family:Tahoma, Geneva, sans-serif; color:#000; border:solid 2px #FFF;">
		 <div style="width:1040px; height:auto; margin-left:10px; margin-right:10px; margin-top:30px; font-family:Arial, Helvetica, sans-serif; color:#000; border:solid 0px #00FF00;">
	<center><h3>Forget Password</h3></center>
	<?php

				if($_POST['submit'])
				{
					include("dbconnection.php");
					$id=$_POST['id'];
					$email=$_POST['email'];
					$mobile=$_POST['mobile'];
					$npwd=$_POST['newpass'];
					$cpwd=$_POST['conpass'];
//					echo"$a1<br>";
//					echo"$a2<br>";
//					echo"$new<br>";
//					echo"$con<br>";

					$query_check="select * from user_registration where email='$email' and mob_no='$mobile' ";
					$result1=mysql_query($query_check);
					$count1=mysql_num_rows($result1);
					if($count1 > 0)
					{
						$query="update user_registration set crpass='$npwd',conpass='$cpwd' where email='$email' and mob_no='$mobile'";
						$res=mysql_query($query);
						if($res)
						{
							echo "<script>alert('success')</script>";
						 }
					}
					else
					{
						echo "<script>alert('Email/Mobile.No is Incorrect.')</script>";
					}

				}

	?>
   <center><form name="carform" action="" method="post" enctype="multipart/form-data" onsubmit="return validation()">
    <table border="0">



    <tr>
    <td width='200' height="36">Email-ID:</td>
    <td width="70%">
    <input type="text" name="email" id="txtEmail" style="width:275px" />
    </td>
    </tr>

    <tr>
    <td width='200' height="36">Mobile:</td>
    <td width="70%">
    <input type="text" name="mobile"  style="width:275px" />
    </td>
    </tr>

    <tr>
    <td width='200' height="36">New Password:</td>
    <td width="70%">
    <input type="password" name="newpass" id="cno" style="width:275px" />
    </td>
    </tr>

    <tr>
    <td width='200' height="36">Confirm Password:</td>
    <td width="70%">
    <input type="password" name="conpass" id="cno" style="width:275px" />
    </td>
    </tr>

<tr><td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value="submit"  /></td></tr>
    </table>

    </form></center>
<br /><br />
		  </div></div>


</table></div></div></div>

<!--midleclose-->

<!--footer--><div style="width:100%; height:200px;  background-color:#0066CC; border:solid 1px #000000;">
<?php include('footer.php');?>
</div>
<!--footer close-->

</body>
</html>
