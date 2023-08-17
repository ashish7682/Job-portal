<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHPGURUKUL Job Portal</title>

<link rel="stylesheet" href="style.css" type="text/css" />

<script type="text/javascript" src="nicEdit.js"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
</head>

<body style="background-color:#EFEFEF;">
<?php include('header.php');?>
  <!--middle-->
      <div style="width:1050px; height:auto; margin:auto;border:#000099 1px solid;">
	   
<!--left-->
<div ><?php include('left.php'); ?></div>
<!--right-->

<div style="width:840px; height:auto; float:left; margin:auto; ">
<?php include("price_menu.php"); ?>
<?php
	if($_POST['submit'])
	{
		include('dbconnection.php');
		for($i=1;$i<5;$i++)
		{
			$amount=$_POST['a'.$i];
			$cover=$_POST['b'.$i];
			$fd1=$_POST['c'.$i];
			$fd2=$_POST['d'.$i];
			$print=$_POST['e'.$i];
			$query="update rw_inter_nat set amount='$amount',cover='$cover',fd1='$fd1',fd2='$fd2',print='$print' where exp_id='$i' ";
			$res=mysql_query($query);
		}
		if($res)
		{
			echo"<script>alert('Sucess')</script>";
	}
	}
?>
<form name='frm1' method='post'>
<!--**********************************************************-->

<div style="width:820px;background-color:#FFFFFF;border:1px #000000 solid;float:left;margin-left:12px;margin-top:10px;border-radius:5px;">
	<table><tr><td>
			<div style="height:40px;background-color:#0C70A4;border:1px #ffffff solid;float:center;border-radius:5px;margin-left:2px;margin-right:2px;margin-top:2px;margin-bottom:0px;">
				<div style="margin-top:8px;margin-bottom:10px;margin-left:10px;color:#FFFFFF"><font size='5'><b>Resume Writing International</b></font></div>
			</div></td></tr>
			<tr>
		<td>
		<?php
			$rwi = array();
			include("dbconnection.php");
			$query="select * from rw_inter_nat";
			$result=mysql_query($query);
			while($data=mysql_fetch_array($result))
			{
				$rwi[]=$data;
			}
		?>
	<div style="background-color:#FFFFFF;border:0px #000000 solid;float:left;border-radius:5px;margin-left:5px;margin-right:5px;margin-top:8px;margin-bottom:5px;">
	<table width="805px" border="0" style="border:1px solid #ccc; border-radius:5px;" cellpadding="0" cellspacing="2">
	<tr height="25" style="color:#FFFFFF; text-align:center; font-family:Arial, Helvetica, sans-serif; font-size:14px;">

	<td width="18%" style="background-color:#0C70A4;">Service Name</td>
	<td width="15%" style="background-color:#0C70A4;">Amount</td>
	<td width="15%" style="background-color:#0C70A4;">Cover</td>
	<td width="15%" style="background-color:#0C70A4;">Fast Delivery<font size='1'>(48 Hour Delivery)</font></td>
	<td width="15%" style="background-color:#0C70A4;">Fast Delivery<font size='1'>(24 Hour Delivery)</font></td>
	<td width="15%" style="background-color:#0C70A4;">Print</td>
	</tr>

	<?php $i=1; foreach($rwi as $r) {   ?>
		<tr height="25" style="color:#000000; text-align:center; font-family:Arial, Helvetica, sans-serif; font-size:14px;">

		<td width="18%" style="background-color:#E0E0E0;"><input type='text' size='35' readonly="readonly" value="<?php echo"$r[7]"; ?>"</td>
		<td width="15%" style="background-color:#E0E0E0;"><input type='text' name='a<?php echo $i; ?>'  size='10' value="<?php echo"$r[2]"; ?>"</td>
		<td width="15%" style="background-color:#E0E0E0;"><input type='text' name='b<?php echo $i; ?>'  size='10' value="<?php echo"$r[3]"; ?>"</td>
		<td width="15%" style="background-color:#E0E0E0;"><input type='text' name='c<?php echo $i; ?>'  size='10' value="<?php echo"$r[4]"; ?>"</td>
		<td width="15%" style="background-color:#E0E0E0;"><input type='text' name='d<?php echo $i; ?>'  size='10' value="<?php echo"$r[5]"; ?>"</td>
		<td width="15%" style="background-color:#E0E0E0;"><input type='text' name='e<?php echo $i; ?>'  size='10' value="<?php echo"$r[6]"; ?>"</td>
	</tr>
<?php
$i++;	}
?>
</table>
</td></tr>
<tr><td colspan='6' align='center'><input type='submit' name='submit'></td></tr></table>
</div>
</td>
</tr>
</table>
</div>
<!--**********************************************************-->
</div>
</div>
</body>
</html>
