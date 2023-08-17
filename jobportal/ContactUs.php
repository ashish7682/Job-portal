<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>PHPGURUKUL Job Portal/ContactUs</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>

<body style="background-color:#FFFFFF;">
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

 <!-- Main Middle--><table style="width:1046px; height:auto; border:solid 0px #E6E6E6;border-radius: 4px; box-shadow: 0px 0px 4px #CCCCCC; background-color:#FFFFFF;margin:auto;">
  <tr><td>

		<!--main table--><table style=" border:#000000 0px solid; float:left; height:auto; width:1044px;">
		<tr>
		<td>


		<!--TABLE 1--><table style="width:700px; margin-right:5px; margin-top:2px; margin-bottom:5px; margin-left:8px;border-radius: 4px; box-shadow: 0px 0px 4px #CCCCCC; float:left; height:auto;border: 1px #F3F3F3 solid;">
		<tr><td><h1><b>Contact Us :</b></h1></td></tr>
		<tr style="width:700px; height:18px;border: 0px #F3F3F3 solid;">
		<td style="border:#000000 0px solid;" >
		<table style="width:670px;margin-left:10px; margin-right:10px; margin-bottom:5px;margin-top:5px;">
	<tr>
	<td style="height:auto; border: 0px #CCCCCC solid; ">

		<?php


			include('dbconnection.php');
$server=mysql_query("select * from static where page='ContactUs'");
while($get=mysql_fetch_array($server))
{
       echo $get['details'];
}

?>


	</td></tr>

	</table></td></tr>


		<!-- CLOSE TABLE 1--></table>

		<!--TABLE 2--><table style="width:283px; font-size:14px; height:280px; float:left;border-radius: 0px; box-shadow: 0px 0px 0px #CCCCCC;  border: 0px #CCCCCC solid;">
		  <tr><td><img src="images/carer&financereport.gif" width="278" height="280" /></td>
		</tr>

		<!-- CLOSE TABLE 2--> </table>

		</td>
		</tr>
		<!-- close main table--></table>

	<!-- Main Middle Close--></td></tr></table>
<!--footer--><div style="width:1050px; height:auto; margin:auto; border:solid 0px #000000;">
<?php include('footer.php');?>
</div>
<!--footer close-->

</div><!--center close-->

</div><!--main close-->
</body>
</html>