<?php session_start();
	$sid=session_id();
	$_SESSION['USER_ID']=$sid;
?>
<?php
$amount=$service=$cover=$print=$fast_del=$total=$tex=$grand_total="";
if(isset($_POST['groth_pack']))
{
	$email=$_SESSION['EMAIL'];
	$amount=$_SESSION['AMOUNT'];
	$service_name=$_SESSION['SERVICE'];
	$cover=$_POST['cover'];
	$print=$_POST['v2'];
	$fast_del=$_POST['v3'];
	$total=$amount+$cover+$print+$fast_del;
	$tex=($total*12.36)/100;
	$grand_total=$total+$tex;
	$_SESSION['COVER']=$cover;
	$_SESSION['PRINT']=$print;
	$_SESSION['FAST_DEL']=$fast_del;
	$_SESSION['TOTAL']=$total;
	$_SESSION['TEX']=$tex;
	$_SESSION['GRAND_TOTAL']=$grand_total;
	$_SESSION['BUTN']=$_POST['groth_pack'];

	include("dbconnection.php");
	$query="select * from user_registration where email='$email' ";
	$result=mysql_query("$query");
	$login=mysql_num_rows($result);
	if($login > 0)
	{

		header("location:view_cart.php");
	}
	else
	{
		header("location:data1.php");
	}
}

if(isset($_POST['RF']))
{
	$email=$_SESSION['EMAIL'];
	$amount=$_POST['amount'];
	$service_name=$_POST['service'];
	$total=$amount;
	$tex=($total*12.36)/100;
	$grand_total=$total+$tex;

	$_SESSION['EMAIL']=$email;
	$_SESSION['AMOUNT']=$amount;
	$_SESSION['SERVICE']=$service_name;
	$_SESSION['TOTAL']=$total;
	$_SESSION['TEX']=$tex;
	$_SESSION['GRAND']=$grand_total;
	$_SESSION['BUTN']=$_POST['RF'];

	include("dbconnection.php");
	$query="select * from user_registration where email='$email' ";
	$result=mysql_query("$query");
	$login=mysql_num_rows($result);
	if($login==1)
	{
		header("location:view_cart.php");
	}
	else
	{
		include("data1.php");
	}
}


?>


