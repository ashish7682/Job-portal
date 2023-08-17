<?php session_start(); ?>
<?php
	include"dbconnection.php";
	$query="select * from experience";
	$result = mysql_query($query);
	$states = array();
	while($data = mysql_fetch_array($result))
	{
	    $exp[] = $data;
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>PHPGURUKUL Job Portal/ResumeWritingIndia</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<script src="jquery-1.10.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#state').change(function()
    {
    		$("#city").slideDown("slow");
    	   var id=$(this).val();
    	   $('#city').load('rw_india.php',{id:id},function(){});
    });
});
</script>
<script type="text/javascript">
function reval()
{
	var ih = document.getElementById("tot_amount").innerHTML;
	ih=ih.replace("Rs. ","");
	ih=parseInt(ih);
	var cover=document.getElementById("cover_amt").innerHTML;
	cover=cover.replace("Rs. ","");
 	cover=parseInt(cover);
	var x=document.getElementById("check1").checked;
	if(x == true)
	{
			ih=ih+cover;
			document.getElementById("tot_amount").innerHTML = "Rs. "+ih;
			document.getElementById("tot_amount1").innerHTML = "Rs. "+ih;
	}
if(x == false)
 	{
 			ih=ih-cover;
 			document.getElementById("tot_amount").innerHTML = "Rs. "+ih;
 			document.getElementById("tot_amount1").innerHTML = "Rs. "+ih;
	}
}
</script>
<script type="text/javascript">
function reval3()
{
	var ih = document.getElementById("tot_amount").innerHTML;
	ih=ih.replace("Rs. ","");
	ih=parseInt(ih);
	var pr=document.getElementById("print").innerHTML;
	pr=pr.replace("Rs. ","");
	pr=parseInt(pr);
	var x=document.getElementById("check2").checked;
	if(x == true)
	{
		ih=ih+pr;
		document.getElementById("tot_amount").innerHTML = "Rs. "+ih;
		document.getElementById("tot_amount1").innerHTML = "Rs. "+ih;

	}
	if(x == false)
	{
		ih=ih-pr;
		document.getElementById("tot_amount").innerHTML = "Rs. "+ih;
		document.getElementById("tot_amount1").innerHTML = "Rs. "+ih;
	}
}

</script>

<style type="text/css">
#city
{
padding:10px;
display:none;
}
</style>
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
<img src="images/resumeforword.gif" />
</div><!--slider close-->


<!-- Main Middle--><table style="width:1048px; height:auto; border:solid 1px #E6E6E6; margin:auto;">
  <tr><td>
  	
		<!--main table--><table style=" border:#000000 0px solid;background-color:#FFFFFF; float:left; height:auto; width:1044px;">
		<tr>
		<td>
		<!--TABLE 1--><table style="width:255px; margin-top:0px;  background-color:#F0F0F0; font-size:14px; height:auto;border-radius: 4px; box-shadow: 0px 0px 4px #CCCCCC; float:left;  border: 1px #CCCCCC solid;">
	<tr><td>
	<table style="width:255px;margin-left:0px; margin-right:0px; background-color:#F0F0F0; margin-bottom:90px;margin-top:0px;">
	<tr>
	<td style="height:auto; border: 0px #CCCCCC solid; ">
<div style=" width:255px float:left; height:auto;  ">

<link rel="stylesheet" href="css_middle/style.css" type="text/css" />
<style type="text/css">
._css3m{display:none}
</style>
<ul id="css3menu11" class="topmenu" style="margin-top:18px;;border-radius: 14px;width:255px;border: 1px #CCCCCC solid; margin-left:0px;">
		<li class="topfirst"><a href="ResumeWritingIndia.php" style="height:40px;background-color:#000000; color:#FFFFFF;line-height:40px; width:255px; border-radius:15px 15px 0px 0px;  border:#000000 0px solid;"><div style="padding-left:0px;"><b> &nbsp;Resume Writing India</b></div></a></li>
		 
		 <li style="height:2px;width:265px;"></li>
		 
	<li class="toplast"><a href="ResumeWritingInternational.php" style="height:40px;  line-height:40px; width:255px;"><div style="padding-left:0px;"><b>  &nbsp;Resume Writing International</b></div></a></li>

 <li style="height:2px;width:265px;"></li>
 
    <li class="topmenu"><a href="ResumeWritingBoth.php" style="height:40px; line-height:40px;margin-left:0px; width:254px;"><div style="padding-left:0px;"><b> &nbsp;Resume Writing Both</b></div></a></li>

 <li style="height:2px;width:265px;"></li>
 
<li class="toplast"><a href="CoverLetterIndia.php" style="height:40px;line-height:40px; width:255px;"><div style="padding-left:0px;"><b> &nbsp;Cover Letter India</b></div></a></li>

 <li style="height:2px;width:265px;"></li>
 
    <li class="topmenu"><a href="CoverLetterInternational.php" style="height:40px; line-height:40px;margin-left:0px; width:254px;"><div style="padding-left:0px;"><b> &nbsp;Cover Letter International</b></div></a></li>

</ul></div>	
	
	</td></tr>
	
	</table></td></tr>
	
	
		<!-- CLOSE TABLE 1--></table>
		
		
				<!--TABLE 2--><table style="width:467px; background-color:#FFFFFF; font-size:14px; height:auto;border-radius: 4px; box-shadow: 0px 0px 4px #CCCCCC; float:left;  border: 1px #CCCCCC solid;">
	<tr><td>
	<table style="width:467px;margin-left:0px; margin-right:0px; margin-bottom:90px;">
	<tr>
	<td style="height:auto; border: 0px #CCCCCC solid; ">
	 <?php
include('dbconnection.php');
$server=mysql_query("select * from static where page='ResumeWritingIndia'");
while($get=mysql_fetch_array($server))
{
       echo $get['details'];
}

?></td></tr>
		<tr>
	<td style="height:auto; border: 0px #CCCCCC solid; " align="center">
	<hr />
	<!--*********************************************************-->
<form name='frm2' method='post' action='data.php'>
		<center><select id="state" name="v1">
		<option value="-1">Select Experience</option>
		<?php foreach($exp as $e)
		{
		    echo '<option value="'.$e[0].'">'.$e[1].'</option>';
		}?>
		</select>
		<center>
		<div id="city">
		</center>
		</div>
		</center>
		</form>
	<!--*********************************************************-->
	</td></tr>
	</table></td></tr>
	
	
		<!-- CLOSE TABLE 2--></table>
		
		
		
		<!--TABLE 3--><table style="width:270px;  float:right; height:auto;border: 0px #000 solid;" align="right">
				
		<tr style="width:270px; height:18px;border: 0px #F3F3F3 solid;">
		<td style="border:#000000 0px solid;" ><div style=" width:270px;background-color:#FFFFFF; float:left; height:60px;  border:solid 0px #999900;"><table style="width:270px; height:40px; border:solid 1px #CCCCCC; color:#FFFFFF; margin-top:5px; background-color:#DF0000; font-size:20px; font-family:Comic Sans MS;"><font style="margin-left:0px; ">
<tr style="width:270px; "align="center"><td><b>Top MNC Companies</b></td></tr></font> </table>
</div>
		<?php include('right.php');?>
</td>
</tr>
		<!-- CLOSE TABLE 3--></table>
		
				
		</td>
		</tr>
		<!-- close main table--></table>
	
	<!-- Main Middle Close--></td></tr></table>
</div></div></div>
<!--footer--><div style="width:100%; height:auto; margin:auto; border:solid 0px #000000;">
<?php include('footer.php');?>
</div>
<!--footer close-->
		


</body>
</html>
