<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>PHPGURUKUL Job Portal/Privacy/Policy</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>

<body style="background-color:#F2F2F2;">
<!--main--><div style="width:100%; height:auto; border:solid 0px #990000;">
<!--center--><div style="width:700px; background-color:#D6D6D6; height:auto; margin:auto; border:solid 1px #D3D3D3;">


<!--middle--><table style="700px; margin-top:0px;border-radius: 4px; box-shadow: 0px 0px 4px #CCCCCC; background-color:#D6D6D6; font-family:Arial, Helvetica, sans-serif; font-size:12px; height:auto; border:solid 1px #FFFFFF;">
<tr>
<td>
<!--TABLE 1--><table style="width:690px; font-size:14px; height:auto; float:left;  border: 0px #000000 solid;">
	<tr><td>
	<?php  
		
		
			include('dbconnection.php');
$server=mysql_query("select * from static where page='PrivacyAndPolicy'");
while($get=mysql_fetch_array($server))
{
       echo $get['details']; 
}

?>

</td></tr>
</table><!--TABLE 1close-->

</td></tr>
</table><!--middle close-->



</div><!--center close-->

</div><!--main close-->
</body>
</html>