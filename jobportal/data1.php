<?php session_start();
	$sid=session_id();
	$_SESSION['USER_ID']=$sid;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHPGURUKUL Job Portal</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/coin-slider.css" />
<script src="jquery-1.10.2.min.js"></script>
<script >
function validation()
{
	{
		var x=document.getElementById('tacc').checked;
	    if (x==false)
	    {
	    	alert('Please provide a valid email address');
	    	tacc.focus;
	    	return false;
	    }
	    else
	    {
	    	return true;
	    }
 	}
}
</script>

<script type="text/javascript">
	$(document).ready(function()
	{
		var ih = document.getElementById("g_t").innerHTML;
		ih=parseInt(ih);
		document.getElementById("g_t").innerHTML = ih+".00";
	});
</script>
<script type="text/javascript">
$(document).ready(function(){
    $('#service').change(function()
    {
    		var ser_code=$(this).val();

    	   load('delete.php',{id:id},function(){});
    });
});
</script>
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
?></div>
<table style=" width:1048px; background-color:#FFFFFF;height:auto; border:solid 0px #999900;">
<tr><td>
<!--left-->

<!--right-->
<div style="width:1038px; height:auto;background-color:#FFFFFF;border:1px #ffffff solid;float: left;">
<table  bgcolor='white' style="margin-left:10px; height=auto; width=1018px; margin-top:10px; margin-bottam:10px;">
	<tr><td align='center'>
<!--**********************************************************-->
		<form name="carform" action="pay.html" method="post" enctype="multipart/form-data" onsubmit="return validation()">
		<?php
			include("dbconnection.php");
			$butn=$_SESSION['BUTN'];
			$dat=date('y/m/d');
			if($butn=="Buy_Now")
			{
				$_SESSION['BUTN']="";
				$dat=date('y/m/d');
				$user_id=$_SESSION['USER_ID'];
				//$email=$_SESSION['$email'];
				$amount=$_SESSION['AMOUNT'];
				$service_name=$_SESSION['SERVICE'];
				$total=$_SESSION['TOTAL'];
				$tex=$_SESSION['TEX'];
				$grand_total=$_SESSION['GRAND'];
				//----------------------------------hgjghgkhkjh---------------------------------------------
				$ser_chack="select * from cart where ser_name='$service_name' and email='$user_id' and odat='$dat' ";
				$ress=mysql_query($ser_chack);
				$count=mysql_num_rows($ress);
					if($count==0)
				{
					include("dbconnection.php");
					$query1="insert into cart values('$user_id','$amount','$service_name','','','','$total','$tex','$grand_total','$dat')";
					$res=mysql_query("$query1");

				}
				else
				{
					echo"<div style='height:auto; width:980px; border:solid 1px red; background-color:#F0F0F0; margin-bottom:10px;'>
								<table style='height:auto; width:980px; border:solid 0px black; background-color:#FFE4E1; margin-top:0px; margin-left:0px; margin-right:0px; margin-bottom:0px;'>
								<tr><td colspan='2' align='center' align='top'><font face='arial black' color=#ff0000>*This Product Is Already Added In Your Card</font></td></tr>
								</table>
						</div>
								";
				}
//************************************************************


			}
			if($butn=="Buy Now")
			{
				$_SESSION['BUTN']="";
				$dat=date('y/m/d');
				$user_id=$_SESSION['USER_ID'];
				//$email=$_SESSION['$email'];
				$amount=$_SESSION['AMOUNT'];
				$service_name=$_SESSION['SERVICE'];
				$cover=$_SESSION['COVER'];
				$print=$_SESSION['PRINT'];
				$fast_del=$_SESSION['FAST_DEL'];
				$total=$_SESSION['TOTAL'];
				$tex=$_SESSION['TEX'];
				$grand_total=$_SESSION['GRAND_TOTAL'];
				//*******************************
					$ser_chack="select * from cart where ser_name='$service_name' and email='$user_id' and odat='$dat' ";
					$ress1=mysql_query($ser_chack);
					$count1=mysql_num_rows($ress1);
					if($count1==0)
					{

						$query2="insert into cart values('$user_id','$amount','$service_name','$cover','$print','$fast_del','$total','$tex','$grand_total','$dat')";
						$res=mysql_query("$query2");
					}
					else
					{
						echo"<div style='height:auto; width:980px; border:solid 1px red; background-color:#F0F0F0;margin-bottom:10px;'>
							<table style='height:autopx; width:980px; border:solid 0px black; background-color:#FFE4E1;margin-top:0px;margin-left:0px;margin-right:0px;margin-bottom:0px;'>
							<tr><td colspan='2' align='center' align='top'><font face='arial black' color=#ff0000>*This Product Is Already Added In Your Card</font></td></tr>
							</table>
							</div>
						";
					}
					//******************************

			}
			$msg=0;
			$dat=date('y/m/d');
			$user_id=$_SESSION['USER_ID'];
			include("dbconnection.php");
			$query="select * from cart where email='$user_id' and odat='$dat' ";
			$result=mysql_query("$query");
			$count=mysql_num_rows($result);
			$cart=array();
			if($count != 0)
			{
			while($data=mysql_fetch_array($result))
			{
				$cart[]=$data;
			}
			echo"<div style='height:auto; width:1000px; border:solid 1px black; background-color:#F0F0F0;margin:0px;'>
			<table style='height:autopx; width:980px; border:solid 0px black; background-color:#ffffff;margin-top:10px;margin-left:10px;margin-right:10px;margin-bottom:5px;'>
			<tr><td align='left'><b><h3>Service Name</h3></b></td><td align='right'><b><h3>Price</h3></b></td></tr>
			</table>";
			foreach($cart as $crt)
			{
				$amount=$crt[1];$service_name=$crt[2];$cover=$crt[3];$print=$crt[4];$fast_del=$crt[5];
				$total1=$total1+$crt[6];
				$tex1=$tex1+$crt[7];
				$grand_total1=$grand_total1+$crt[8];
				if($amount != 0)
				{
					echo"
					<table style='height:autopx; width:980px; border:solid 0px black; background-color:#ffffff;margin-top:2px;margin-left:10px;margin-right:10px;margin-bottom:5px;'>
					<tr><td width='30px' colspan='2'><font size='2' color='red'><b><a href='delete.php?x=$service_name'>Delete</a></b></font></td></tr></td></tr>
					<tr><td width='30px'><font size='4'><b>$service_name</b></td><td align='right' width='30px'><b>Rs.</b> $amount</td></tr>
					</table>";
				}
				if($fast_del != 0)
				{
					echo"
					<table style='height:autopx; width:980px; border:solid 0px black; background-color:#ffffff;margin-top:2px;margin-left:10px;margin-right:10px;margin-bottom:2px;'>
					<tr><td><b>Fast Delivery</b></td><td align='right'><b>Rs.</b> $fast_del</td></tr>
					</table>";
				}
				if($cover != 0)
				{
					echo"
					<table style='height:autopx; width:980px; border:solid 0px black; background-color:#ffffff;margin-top:2px;margin-left:10px;margin-right:10px;margin-bottom:2px;'>
					<tr><td><b>Cover Letter</b></td><td align='right'><b>Rs.</b> $cover</td></tr>
					</table>";
				}
				if($print != 0)
				{
					echo"
					<table style='height:autopx; width:980px; border:solid 0px black; background-color:#ffffff;margin-top:2px;margin-left:10px;margin-right:10px;margin-bottom:2px;'>
					<tr><td><b>Print</b></td><td align='right'><b>Rs.</b> $print</td></tr>
					</table>";
				}

			}//Close Foreach loop
			echo"
				<table style='height:autopx; width:980px; border:solid 0px black; background-color:#ffffff;margin-top:1px;margin-left:10px;margin-right:10px;margin-bottom:2px;'>
					<tr><td colspan='2' align='right'><font size='2'><b>Total : Rs.  $total1</b></font></td></tr>
					<tr><td colspan='2' align='right'><font size='2'><b>Service Tex (12.36%) :</b> Rs.  $tex1</font></td></tr>
					<tr><td colspan='2' align='right'><font size='4'><b>Grand Total : Rs.  <strong id='g_t'>$grand_total1</strong></b></font></td></tr>
					<tr><td colspan='2' align='right'>You were reffered by<select name='s1'><option>Select</option><option>Center 1</option></select></td></tr>
					<tr><td colspan='2' align='right'><input type=radio name='r' id='cards' />Credit Cards<input type=radio name='r' />Debit Cards<input type=radio name='r' />Internet Banking</td></tr>
					<tr><td colspan='2' align='right'><div id='banks'></div></td></tr>
				</table>";
			echo"
				<table style='height:autopx; width:980px; border:solid 0px black; background-color:#ffffff;margin-top:1px;margin-left:10px;margin-right:10px;margin-bottom:10px;'>
					";
					if(isset($_SESSION['EMAIL']))
					{
						echo"
						<tr> <td align='right' width='1028px'><a href='pay.html'><img src='images/pay_now.jpg' height='30px' width='90px' /></a>
						</td>
			   			</tr>";
					}
					else
					{
						echo"<tr>
						<td align='right' width='1028px'>
						<a href='login.php'><img src='images/signin.png' height='20px' width='80px' /></td>
						<td align='right'><a href='user_registration.php'><img src='images/signup.png' height='20px' width='80px' /></a>
						</td></tr>";
					}
					echo"</table>";
				}
				else
				{
					echo"<div style='height:auto; width:1000px; border:solid 1px black; background-color:#F0F0F0;margin:0px;'>
								<table style='height:autopx; width:980px; border:solid 0px black; background-color:#ffffff;margin-top:10px;margin-left:10px;margin-right:10px;margin-bottom:10px;'>
								<tr><td align='left'  face='arial black'><b><font size='4'>Service Name</font></b></td><td align='right'><b><font size='4'>Price</font></b></td></tr>
								<tr><td colspan='2' align='center' align='top'><font color='red' face='arial black'>Your shopping cart is empty</font></td></tr>
								</table>
								</div>
								";
				}

			?>
						</form>
		</tr></td></table>

			<!--**********************************************************-->
			</div>
			</tr></td></table>
			<!--centerclose-->



<!--footer--><div style="width:1050px; height:auto; margin:auto; border:solid 0px #000000;">
<?php include('footer.php');?>
</div>

<!--footer close-->


</div>
</div>
</body>
</html>
<?php /*	echo"$email<br>";
			echo"$amount<br>";
			echo"$service_name<br>";
			echo"$total<br>";
			echo"$tex<br>";
			echo"$grand_total<br>";
			echo"$butn<br>";*/
 ?>