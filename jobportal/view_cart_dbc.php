<?php  session_start(); ?>
<?php
		$email=$_SESSION['EMAIL'];
		include("dbconnection.php");
		$query="select order_id from order_id where email='$email' ";
		$result=mysql_query("$query");
		$count=mysql_num_rows($result);
		$ord=array();
		while($data=mysql_fetch_array($result))
		{
			$ord[]=$data;
		}
		foreach($ord as $r)
		{
			$ord_id=$r[0];

		}
?>
<?php
	$tac=$_POST['tac'];
	if($tac=='tnc')
	{
		header("location:pay5.php");
	}
	else
	{
		header("location:view_cart.php?x=1");
	}

?>
<?php
	$tac=$_POST['tac'];
	if($tac=='tnc')
	{
	if($_POST['submit'])
	{
 		include("dbconnection.php");
 		$dat=date('y/m/d');
 		$email=$_SESSION['EMAIL'];

		//---------------------------CODE GENERATE-----------------------

			$s1=substr($ord_id,3,3);
			$s1=$s1+1;
			$s2=substr($ord_id,6);
			$order_id="R2N"."$s1"."$s2";
			$_SESSION['ORDER_ID']=$order_id;
		//	echo"$ord_id<br>";
		//	echo"$order_id";
		//----------------------------------------------------------------------------
		//-------------------------------------------
		$my_ser_name[]=array();
		$query="select ser_name from cart where email='$email' and odat='$dat' ";
		$result=mysql_query("$query");
		$count=mysql_num_rows($result);
		$cart=array();
		while($data=mysql_fetch_array($result))
		{
			$cart[]=$data;
		}
		foreach($cart as $c)
		{
			$s_n="$s_n"." $c[0]".",";
		}
		$grand_total1=$_SESSION['FGT'];
	//	echo"$order_id"."<br/>"."$dat"."<br />"."$s_n"."<br />"."$email"."<br/>"."<br>"."$grand_total1";


		$query2="select * from my_order where email='$email' and order_date='$dat' and product_name='$s_n'  and order_status='0' and payment_status='0' ";
		$result2=mysql_query("$query2");
		$count2=mysql_num_rows($result2);
	//	echo"rrrrrrr=====$count2";
	//	if($count2==0)
	//	{
			$query3="select * from my_order where email='$email' and order_date='$dat' and order_id='$order_id' and order_status='0' and payment_status='0' ";
			$result3=mysql_query("$query3");
			$count3=mysql_num_rows($result3);
		//	echo"hghghhghg====$count3";
	//		if($count3==0)
	//		{
				$query5="insert into my_order values('$email','$order_id','$dat','$s_n','$grand_total1','0','0')";
				$res=mysql_query("$query5");
				$query6="update order_id set order_id='$order_id' where email='$email' ";
				$res6=mysql_query("$query6");
//			}
	//		else
	//		{
	//			$query="delete from my_order where email='$email' and order_date='$dat' and order_id='$order_id' and order_status='0' and payment_status='0' ";
	//			$res=mysql_query($query);
	//			$query5="insert into my_order values('$email','$order_id','$dat','$s_n','$grand_total1','0','0')";
	//			$res=mysql_query("$query5");
	//			$query7="update order_id set order_id='$order_id' where email='$email' ";
	//			$res7=mysql_query("$query6");

		//	}//if close
		//	else
		//	{
				header("location:pay5.php");
		//	}

	//	}


//-------------------------------------------
//---------------------------------------------------------------------
	/*	$query="select * from cart where email='$email' and odat='$dat' ";
		$result=mysql_query("$query");
		$count=mysql_num_rows($result);
		$cart=array();
		while($data=mysql_fetch_array($result))
		{
			$cart[]=$data;
		}
		foreach($cart as $c)
		{
			$query2="select * from my_order where email='$email' and order_date='$c[9]' and product_name='$c[2]' and order_id='$order_id' ";
			$result2=mysql_query("$query2");
			$count2=mysql_num_rows($result2);

			if($count2==0)
			{
				$query1="insert into my_order values('$email','$order_id','$c[9]','$c[2]','$c[8]','','')";
				$res=mysql_query("$query1");
			}
		}
*/
	//------------------------------------------------------------------------

	}
	}
	?>
