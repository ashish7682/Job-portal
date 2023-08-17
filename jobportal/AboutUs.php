<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>PHPGURUKUL Job Portal/AboutUs</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>

<body style="background-color:#FFFFFF;">
<!--main--><div style="width:100%; height:auto; border:solid 0px #990000;">
<!--center--><div style="width:1050px;  height:auto; margin:auto; border:solid 0px #00FF00;">
<!--header--><div style="width:1048px; height:120px; background-color:#FFFFFF; border:solid 1px #CCCCCC;">
<?php include('header.php');?></div><!--header close-->

<!--menu--><div style="width:1048px; height:50px; border:solid 1px #CCCCCC;"> 
<?php include('menu.php');?>
</div><!--menu close-->

<!--slider--><div style="1048px; height:300px; border:solid 1px #999900;">
<img src="images/socialmedia.gif" />
</div><!--slider close-->

<!-- Main Middle--><table style="width:1048px; height:auto; border:solid 1px #E6E6E6; margin:auto;">
  <tr><td>
  	
		<!--main table--><table style=" border:#000000 0px solid; float:left; height:auto; width:1046px;">
		<tr>
		<td>
		<!--TABLE 1--><table style="width:690px; font-size:14px; height:auto;border-radius: 4px; box-shadow: 0px 0px 4px #CCCCCC; float:left;  border: 1px #CCCCCC solid;">
	<tr><td>
	<table style="width:670px;margin-left:10px; margin-right:10px; margin-bottom:5px;margin-top:5px;">
	<tr>
	<td style="height:auto; border: 0px #CCCCCC solid; ">
	
	<?php  
		
		
			include('dbconnection.php');
$server=mysql_query("select * from static where page='About Us'");
while($get=mysql_fetch_array($server))
{
       echo $get['details']; 
}

?>
	
		
	
	
	
	</td></tr>
	
	</table></td></tr>
	
	
		<!-- CLOSE TABLE 1--></table>
		
		
				
		
		<!--TABLE 2--><table style="width:318px;  float:left; height:auto;border: 0px #F3F3F3 solid;">
				
		<tr style="width:318px; height:18px;border: 0px #F3F3F3 solid;">
		<td style="border:#000000 0px solid;" >
		<?php include('right.php');?>
</td>
</tr>
		<!-- CLOSE TABLE 2--></table>
		
				
		</td>
		</tr>
		<!-- close main table--></table>
	
	<!-- Main Middle Close--></td></tr></table></div></div></div>

<!--midleclose-->

<!--footer--><div style="width:100%; height:200px;  background-color:#000; border:solid 1px #000000;">
<?php include('footer.php');?>
</div>
<!--footer close-->

</body>
</html>