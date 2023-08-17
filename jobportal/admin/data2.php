	<div style="width:800px; height:auto; border:solid 0px black; background-color:#F0F0F0;margin:auto;">
		<table border='0' height='auto' width='780px' bgcolor='white' style="margin-left:10px; height='auto'; width='780px'; margin-right:30px; margin-top:10px; margin-bottam:10px;">
				<tr><td align='left'><b><h3>Service Name</h3></b></td><td align='right'><b><h3>Price</h3></b></td></tr>
		</table>

	<?php
	/*		if($count1 > 0)
			{
				echo"
						<table border='0' height='auto' width='780px' align='center' bgcolor='white' style='margin-left:10px; height=auto; width=600px; margin-right:30px; margin-top:2px; margin-bottom:2px'>
								<tr><td width='60px' align='center'><b><font color='green' size='5'>You have already selected this package.</font></b></td></tr>
						</table>
				";
			}
			else
			{     */
				if($amount != 0)
			{
				echo"
						<table border='0' height='auto' width='780px' align='center' bgcolor='white' style='margin-left:10px; height=auto; width=600px; margin-right:30px; margin-top:2px; margin-bottom:2px'>
								<tr><td width='30px'><b>$service_name</b></td><td align='right' width='30px'><b>Rs.</b> $amount</td></tr>
						</table>
				";
			}
			if($cover != 0)
			{
				echo"
						<table border='0' height='auto' width='780px' align='center' bgcolor='white' style='margin-left:10px; height=auto; width=600px; margin-right:30px; margin-top:2px; margin-bottom:2px'>
								<tr><td><b>Cover Letter</b></td><td align='right'><b>Rs.</b> $cover</td></tr>
						</table>
				";
			}
			if($print != 0)
			{
					echo"
							<table border='0' height='auto' width='780px' align='center' bgcolor='white' style='margin-left:10px; height=auto; width=600px; margin-right:30px; margin-top:2px; margin-bottom:2px'>
									<tr><td><b>Print</b></td><td align='right'><b>Rs.</b> $print</td></tr>
							</table>
					";
			}
			if($fast_del != 0)
			{
					echo"
							<table border='0' height='auto' width='780px' align='center' bgcolor='white' style='margin-left:10px; height=auto; width=600px; margin-right:30px; margin-top:2px; margin-bottom:2px'>
									<tr><td><b>Fast Delivery</b></td><td align='right'><b>Rs.</b> $fast_del</td></tr>
							</table>
					";
			}
		/*	if($amount1 != 0)
			{
				echo"
						<table border='0' height='auto' width='780px' align='center' bgcolor='white' style='margin-left:10px; height=auto; width=600px; margin-right:30px; margin-top:2px; margin-bottom:2px'>
								<tr><td width='30px'><b>$service1</b></td><td align='right' width='30px'><b>Rs.</b> $amount1</td></tr>
						</table>
				";
			}   */
		echo"
				<table border='0' height='auto' width='780px' align='center' bgcolor='white' style='margin-left:10px; height=auto; width=600px; margin-right:30px; margin-top:2px; margin-bottom:2px; '>
					<tr><td colspan='2' align='right'><font size='2'><b>Total : Rs.  $total</b></font></td></tr>
					<tr><td colspan='2' align='right'><font size='2'><b>Service Tex (12.36%) :</b> Rs.  $tex</font></td></tr>
					<tr><td colspan='2' align='right'><font size='4'><b>Grand Total : Rs.  $grand_total</b></font></td></tr>
					<tr><td colspan='2' align='right'>You were reffered by<select name='s1'><option>Select</option><option>Center 1</option></select></td></tr>
					<tr><td colspan='2' align='right'>
					<input type=radio name='r' id='cards' />Credit Cards
					<input type=radio name='r' />Debit Cards
					<input type=radio name='r' />Internet Banking
					</td></tr>
					<tr><td colspan='2' align='right'>
						<div id='banks'></div>
					</td></tr>
				</table>

			";
			echo"
				<table border='0' height='auto' width='780px' align='center' bgcolor='white' style='margin-left:10px; height=auto; width=600px; margin-right:80px; margin-top:2px; margin-bottom:10px; border:0px solid; '>
					<tr><td colspan='2'>
						<input type='checkbox' name='c1' checked=''/ style='margin-left:445px;'>I Accept Terms And Conditions";
						if(isset($_SESSION['EMAIL']))
						{
							echo"<tr>
								<td align='right' width='800px'>
									<a href='pay.html'><img src='images/pay_now.GIF' height='30px' width='90px' /></a>
								</td>

							</td></tr>";

						}
						else
						{
							echo"<tr>
									<td align='right' width='780px'>
									<a href='login.php'><img src='images\signin.png' height='20px' width='80px' /></td>
									<td align='right'><a href='user_reg1.php'><img src='images\signup.png' height='20px' width='80px' /></a>
								</td></tr>";
						}
						echo"</td></tr>
				</table>
				";

	//		}

	?>
	</div>
