<?php
	session_start();
	include("dbconnection.php");
	$result=mysql_query("select * from jobs_category");
	while($data=mysql_fetch_array($result))
	{
		$job_c[]=$data;
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>PHPGURUKUL Job Portal</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>

<body style=" background-color:#FFFFFF;" >
<!--main--><div style="width:100%; height:auto; border:solid 0px #990000;">
<!--center--><div style="width:1050px;  height:auto; margin:auto; border:solid 0px #00FF00;">
<!--header--><div style="width:1048px; height:120px; background-color:#FFFFFF; border:solid 1px #CCCCCC;">
<?php include('header.php');?></div><!--header close-->

<!--menu--><div style="width:1048px; height:50px; border:solid 1px #CCCCCC;">
<?php include('menu.php');?>
</div><!--menu close-->
<!--center-->
<table style=" width:1048px; background-color:#FFFFFF; height:auto; border:solid 0px #999900;">
<tr><td>
<!--centerleft-->
<div style=" width:710px; height:auto; float:left; background-color:#FFFFFF; border:solid 0px #999900;">
<table style="width:435px; height:auto;float:left;">
<tr><td  style="width:435px;border:solid 0px #999900; height:auto;" align="justify"><?php
	$butn= $skills = $city = $description = $experience = $experience = $job_category = $salary_expect = "";
	$skills=$_POST['skills'];
	$city=$_POST['city'];
	$experience=$_POST['experience'];
	$job_category=$_POST['job_category'];
	if(empty($skills) || empty($city) || empty($experience) || empty($job_category))
		{
				header("location:index.php?x=1");
		}
		else
		{
			if(isset($_POST['b1']))
			{
				include("dbconnection.php");
				$query="select * from jobs where skills like '$skills%' and city like '$city%' ";
				$res=mysql_query($query);
				$cnt=mysql_num_rows($res);
				while($data = mysql_fetch_array($res))
				{
								echo"<table align='center' background='images/bg-welcome.png' width='700px' height='auto' border='0'>
								<tr><td width='200'></td><td width='10'><img src='ppp.png'></td></tr>
								<tr><td width='200'></td><td width='10'><img src='ppp.png'></td><td width='80px' align='center'><a href='login.php'><img src='apply.jpg' height='30px' width='80px'></a></td></tr>
								<tr><td width='200'><font color = '#191970' size=5 face='times new romon'><b><u>";
									$query1="select * from jobs_category where category_code='$data[job_category]' ";
									$res1=mysql_query($query1);
									$cnt1=mysql_num_rows($res1);
									for($i=0;$i<$cnt1;$i++)
									{
										$a=mysql_result($res1,$i,'jobs_category');
										echo"<font color = '#191980' size=5 face='times new romon'>$a</font>";
									}
								echo"</u></b></font></td><td width='10'><img src='ppp.png'></td></tr>
								<tr><td width='200'><font color = 'maroon'><b>$data[city]<b /></font> </td><td width='10'><img src='ppp.png'></td></tr>
								<tr><td width='200'><font color='black'>$data[description]</font></td><td width='10'><img src='ppp.png'></td></tr>
								<tr><td width='200'><b>Experience : <b />$data[experience]</td><td width='10'><img src='ppp.png'></td></tr>
								<tr><td width='200'><font><b>Skills : <b /></font><font color='dimgray'><font color='black'>$data[skills]</font></td><td width='10'></td></tr>

							</table>";
				}
			}
		}
?>
</td>
</tr>
</table>














</div><!--centerleftclose-->
<!--centerright-->
<div style=" width:330px; height:auto; float:left; border:solid 0px #999900;">
<div style=" width:326px;background-color:#FFFFFF; height:60px;  border:solid 0px #999900;">

<table style="width:323px; height:40px; border:solid 1px #CCCCCC; color:#FFFFFF; margin-top:10px; background-color:#FF0000; font-size:20px; font-family:Comic Sans MS;"><tr><td><b>Top MNC Companies</b></td></tr> </table>
</div>
<?php include('right.php');?></div>
<!--centerrightclose-->
</td></tr></table>


<!--centerclose-->





</div>

<!--footer--><div style="width:1050px; height:auto; margin:auto; border:solid 0px #000000;">
<?php include('footer.php');?>
</div>
<!--footer close-->
		</div></div>

</body>
</html>