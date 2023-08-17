<?php session_start(); ?>
<?php
$cover=0;
$id = $_REQUEST['id'];mysql_connect('localhost','root','') or die(mysql_error());mysql_select_db('naukri2jobs');$result = mysql_query("select * from rw_both WHERE exp_id=$id") or die(mysql_error());
$amount = array();
while($data = mysql_fetch_array($result))
{
	$amount[] = $data;
}
?>
<?php
    	if($id != '-1')
    	{
			foreach($amount as $am)
    		{
    			$amount=$am[2];
    			$cover=$am[3];
    			$_SESSION['COVER']=$cover;
    			$fd1=$am[4];
    			$fd2=$am[5];
    			$_SESSION['FD1']=$fd1;
    			$_SESSION['FD2']=$fd2;
    			$_SESSION['AMOUNT']=$amount;
    			$pr=$am[6];
    			$service_name=$am[7];
				$_SESSION['SERVICE']=$service_name;
    		}    		echo"<div id='tot_amount1' style='color:white'>$amount</div>";

			echo"<table bgcolor='#ffffff' align='center' height='auto' width='230px'>
			<tr><td ><hr /></td></tr>
			<tr><td align='center'><font size=4 color='black'><strong>Total Amount</strong></font></td></tr>
			<tr><td align=center><font size=6 color='red'>
			<strong id='tot_amount' >";
					echo"Rs. $amount";

			echo"</strong></td></tr>
			<tr><td align='center' style='font-size:15px;'>"; $_SESSION['AMOUNT']=$amount;
				echo"<input onclick='reval();'type='checkbox' name='cover' value='$cover'  id='check1' >
				Including Coverletter<font color='red'>(Rs.<strong id='cover_amt' >$cover</strong>)</font></td>
				
				
				<tr><td ><hr /></td></tr>";
				echo"
				<html>
				<head>
				<script src='jquery-1.10.2.min.js'></script>
				<script type='text/javascript'>
					$(document).ready(function(){
						$('#state1').click(function()
						{
							$('#city1').slideToggle('fast');
							$('#city1').load('a3.php',function(){});
							});
						});
				</script>
				<script type='text/javascript'>
					function reval1()
					{
						var f1=document.getElementById('fdv1').checked;
						var f2=document.getElementById('fdv2').checked;

						var ih = document.getElementById('tot_amount1').innerHTML;
						ih=ih.replace('Rs. ','');
						ih=parseInt(ih);

						var fast=document.getElementById('fd1').innerHTML;
						fast=fast.replace('Rs. ','');
						fast=parseInt(fast);

						var fast1=document.getElementById('fd2').innerHTML;
						fast1=fast1.replace('Rs. ','');
						fast1=parseInt(fast1);

						if(f1 == true)
						{
							ih=ih+fast;
							document.getElementById('tot_amount').innerHTML = 'Rs. '+ih;
						}
						if(f2 == true)
						{
							ih=ih+fast1;
							document.getElementById('tot_amount').innerHTML = 'Rs. '+ih;
						}
					}

					function fast_del_off()
					{
						var ih = document.getElementById('tot_amount1').innerHTML;
						ih=ih.replace('Rs. ','');
						ih=parseInt(ih);
						var x=document.getElementById('state1').checked;
						if(x == false)
						{
							document.getElementById('tot_amount').innerHTML = 'Rs. '+ih;
						}
					}
					</script>
					<style type='text/css'>
					#city1
					{
						padding:10px;
						display:none;
					}
					</style>
				</head>
				<body>
				<form name='frm3' method='post'>
							<tr><td>Delivery in 21 working days</td></tr>
							<tr><td align='left'><input type='checkbox' name='fd' id='state1' onClick='fast_del_off();' />Need a Faster Delivery ?</td></tr>
							<tr><td><hr></td></tr>
							<tr><td><div id='city1'></div></td></tr>
							<tr><td></td></tr>
						</form>
						</body>
						</html></td></tr>";
						 echo"<tr><td><font size=3 color='gray' face='arial'><b>Add Ons</b></font></td></tr>
						<tr><td>
						<input onclick='reval3();' type='checkbox' name='v2' value='$pr' id='check2'  />

						Printout - 5 copies  <font color='red'><strong id='print'>Rs. $pr</strong></font> </td></tr>
						<tr><td><hr /></td></tr>
						<tr><td align='center'><input type='submit' name='groth_pack' value='Buy Now'style='color:#FFFFFF; margin-left:20px;font-family:Arial, Helvetica, sans-serif; background-color:#1014C2; border-radius:10px 10px 10px 10px; width:120px; height:40px; font-size:14px;'/></td><tr>
						<tr><td><hr /></td></tr>
					</table>";
   	}
 ?>
