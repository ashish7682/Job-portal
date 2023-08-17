<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHPGURUKUL Job Portal</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/coin-slider.css" />
<style type="text/css">
</style>
</head>
<body style=" background-color:#FFFFFF;" >
<!--main--><div style="width:100%; height:auto; border:solid 0px #990000;">
<!--center--><div style="width:1050px;  height:auto; margin:auto; border:solid 0px #00FF00;">
<!--header--><div style="width:1048px; height:120px; background-color:#FFFFFF; border:solid 1px #CCCCCC;">
<?php include('myaccountheader.php');?></div><!--header close-->

<?php include("ma_menu.php");  ?>
  <!--middle-->
     <table style="width:1048px; background-color:#FFFFFF;height:auto; border:solid 0px #999900;">
<tr><td>
<!--left-->
<div style="width:200px; height:448px;background-color:#FFFFFF;border:0px #CCCCCC solid;float:left;">
<?php include('left.php'); ?></div>
<!--right-->

<!--**********************************************************-->

<div style="width:820px;background-color:#FFFFFF;border:1px #000000 solid;float:left;margin-left:12px;margin-top:10px;border-radius:5px;">
	<table><tr><td>
			<div style="height:40px;background-color:#0C70A4;border:1px #ffffff solid;float:center;border-radius:5px;margin-left:2px;margin-right:2px;margin-top:2px;margin-bottom:0px;">
				<div style="margin-top:8px;margin-bottom:10px;margin-left:10px;color:#FFFFFF"><font size='5'><b>My Order</b></font></div>
			</div></td></tr>
			<tr>
		<td><?php
	include("dbconnection.php");
	$email=$_SESSION['EMAIL'];
	$query="select * from my_order where email='$email' ";
	$result=mysql_query("$query");
	$count=mysql_num_rows($result);
	$cart=array();
	while($data=mysql_fetch_array($result))
	{
		$cart[]=$data;
	}
	$ord_stts=0;
	$pay_stts=0;
	if($ord_stts == 0)
		$ord_stts='Pending';
	else
		$ord_stts='Sucess';
	if($pay_stts == 0)
		$pay_stts='Pending';
	else
		$pay_stts='Sucess';
?>
<div style="background-color:#FFFFFF;border:0px #000000 solid;float:left;border-radius:5px;margin-left:5px;margin-right:5px;margin-top:8px;margin-bottom:5px;">
<table width="805px" border="0" style="border:1px solid #ccc; border-radius:5px;" cellpadding="0" cellspacing="2">
<tr height="25" style="color:#FFFFFF; text-align:center; font-family:Arial, Helvetica, sans-serif; font-size:14px;">

<td width="10%" style="background-color:#0C70A4;">Order No</td>
<td width="15%" style="background-color:#0C70A4;">Order Date</td>
<td width="30%" style="background-color:#0C70A4;">Product Name</td>
<td width="14%" style="background-color:#0C70A4;">Order Status</td>
<td width="18%" style="background-color:#0C70A4;">Payment Status</td>
<td width="13%" style="background-color:#0C70A4;">&nbsp;</td>
</tr>

<?php if($count > 0) { foreach($cart as $c) {   ?>
	<tr height="25" style="color:#000000; text-align:center; font-family:Arial, Helvetica, sans-serif; font-size:14px;">

	<td width="10%" style="background-color:#E0E0E0;"><?php echo"$c[1]"; $_SESSION['ORDER_ID']=$c[1];  ?></td>
	<td width="15%" style="background-color:#E0E0E0;"><?php echo"$c[2]";?></td>
	<td width="30%" style="background-color:#E0E0E0;"><?php echo"$c[3]";?></td>
	<td width="14%" style="background-color:#E0E0E0;"><?php echo"$ord_stts";?></td>
	<td width="18%" style="background-color:#E0E0E0;"><?php echo"$pay_stts";?></td>
	<td width="13%" style="background-color:#E0E0E0;"><a href='pay5.php'>Pay Now</a></td>
	</tr>

<?php
	}
}
else
{
	echo"<tr><td colspan='6' align='center'>No Orders found</td></tr>";
}

?>
</table>
</td></tr></table>

</div>
</td>
	</tr>
</table>


</div>
<!--**********************************************************-->

<!--centerclose-->
<!--footer--><div style="width:1050px; height:auto; margin:auto; border:solid 0px #000000;">
<?php include('footer.php');?>
</div>
<!--footer close-->


</div>
</div>
</body>
</html>
