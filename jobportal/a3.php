<?php
	session_start();
	$v1=$_SESSION['FD1'];
	$v2=$_SESSION['FD2'];
 	echo"
 		<table bgcolor='#ffffff' align='center'>
 		<tr><td><input type='radio' name='v3' value='$v1' onclick='reval1();' id='fdv1'/>Express 48 Hour Delivery</td></tr>

 		<tr><td>-<font color='red'> <strong id='fd1'>Rs. $v1</strong></font></td></tr>


 		<tr><td><input type='radio' name='v3' value='$v2'  onclick='reval1();' id='fdv2' />Express 24 Hour Delivery</td></tr>

 		<tr><td>- <font color='red'><strong id='fd2'>Rs. $v2</strong></font></td></tr>

 		<tr><td width='420px'><hr /></td></tr>
 		</table>";
 ?>



