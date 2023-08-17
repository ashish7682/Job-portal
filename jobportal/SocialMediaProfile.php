<?php
session_start();
	$sid=session_id();
	$_SESSION['USER_ID']=$sid;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>PHPGURUKUL Job Portal/SocialMediaProfile</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>

<body style=" background-color:#FFFFFF;" >
<!--main--><div style="width:100%; height:auto; border:solid 0px #990000;">
<!--center--><div style="width:1050px;  height:auto; margin:auto; border:solid 0px #00FF00;">
<!--header--><div style="width:1048px; height:120px; background-color:#FFFFFF; border:solid 1px #CCCCCC;">
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

<!--menu--><div style="width:1048px; height:30px;background-color:#1B43E2; border:solid 1px #CCCCCC;">

<?php
	if(isset($_SESSION['EMAIL']))
	{
		include('ma_menu.php');
	}
	else
	{
		include('menu.php');
	}
?>
</div><!--menu close-->

<!--slider--><div style="1048px; height:300px; border:solid 1px #999900;">
<img src="images/socialmedia.gif" />
</div><!--slider close-->

<!--menu2-->

<div style=" width:1048px;background-color:#FFFFFF; height:60px;  border:solid 0px #999900;">
<div style=" width:720px; float:left; height:60px;  border:solid 0px #999900;">

<link rel="stylesheet" href="css_middle/style.css" type="text/css" />
<style type="text/css">
._css3m{display:none}
</style>
<ul id="css3menu11" class="topmenu" style="margin-top:18px;margin-left:8px;">
	<li ><a href="SocialMediaProfile.php" style="height:40px;line-height:40px; font-size:15px; width:185px; border-radius:10px 10px 1px 1px; border:#000000 0px solid;"><div style="padding-left:12px;"><b>Social Media Profile</b></div></a></li>

</ul></div>
<div style=" width:323px;background-color:#FFFFFF; float:left; height:60px;  border:solid 0px #999900;"><table style="width:323px; height:40px; border:solid 1px #CCCCCC; color:#FFFFFF; margin-top:20px; background-color:#DF0000; font-size:20px; font-family:Comic Sans MS;"><font style="margin-left:20px; ">
<tr><td><b>Top MNC Companies</b></td></tr></font> </table>
</div>

</div><!--menu2close-->
<!--center-->
<table style=" width:1048px; height:auto;background-color:#FFFFFF; border:solid 0px #999900;">
<tr><td>
<!--centerleft-->
<div style=" width:710px; height:auto; float:left;background-color:#FFFFFF; border:solid 0px #999900;">
<table style="width:435px; height:auto;float:left;background-color:#FFFFFF;">
<tr><td  style="width:435px;border:solid 0px #999900; height:auto;" align="justify"> <?php


			include('dbconnection.php');
$server=mysql_query("select * from static where page='SocialMediaProfile'");
while($get=mysql_fetch_array($server))
{
       echo $get['details'];
}

?></td>
</tr>
</table>



<table style="width:250px;float:left;border:solid 0px #999900;background-color:#FFFFFF; height:auto;">
<tr>
<td style="width:250px;">


<table style="width:250px;float:left; margin-top:80px;border:solid 0px #999900; height:auto;">
<tr>
<td style="width:250px;">

	<p style="width:250px; height:70px;" align="center"> <b>Total Amount</b><hr />
	<div style="width:200px; height:50px;border:solid 0px #999900;background-color:#EFEFEF; font-size:40px; margin-left:25px;border-radius:17px 17px 17px 17px;"align="center">
	<div style="width:200px; height:40px; margin-top:10px; border:#000000 0px solid;">
		<form method='post' action='data.php' name='frm1'>
				<?php include('dbconnection.php');
				$ser="Social Media Profile";
				$result=mysql_query("select * from resume_frwd_price where detail='$ser' ");
				$resume=array();
				while($data=mysql_fetch_array($result))
				{
			       $resume[]=$data;
				} ?>
				<font color='red' size='6'><b><?php foreach($resume as $res){ echo"Rs. $res[3]";} ?></b></font>
				<input type='hidden' name='amount' value='<?php foreach($resume as $res){ echo $res[3];
				} ?>' />
				<input type='hidden' name='service' value='<?php foreach($resume as $res){ echo $res[2];} ?>' /></div></div></p>
				<p align="center"><a href="data.php"><input type="submit" name="RF" value="Buy_Now" style=" color:#FFFFFF; margin-left:20px;font-family:Arial, Helvetica, sans-serif; background-color:#1014C2; border-radius:10px 10px 10px 10px; width:120px; height:40px; font-size:14px;"></a></p></td>
		</form>

	</div></div></p>


		</td>
</tr>
</table>
		</td>
</tr>
</table>





</div><!--centerleftclose-->
<!--centerright-->
<div style=" width:320px; height:auto; margin-left:7px; float:left; border:solid 0px #999900;">
<?php include('right.php');?>
</div><!--centerrightclose-->
</td></tr></table>


<!--centerclose-->


<!--footer--><div style="width:1050px; height:auto; margin:auto; border:solid 0px #000000;">
<?php include('footer.php');?>
</div>
<!--footer close-->




		</div></div>






</body>
</html>