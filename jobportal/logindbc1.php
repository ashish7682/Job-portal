<?php
		session_start();
		$cnt = $res = $query = $email = $crpass = $msg="";
		$b1=$_POST['b1'];
	//	echo"jjjjj=$b1";
		$email=$_POST['email'];
		$crpass=$_POST['crpass'];
		if(empty($email) || empty($crpass))
		{
			header("location:login.php?y=1");
		}
		else
		{
				if(isset($_POST['b1']))
				{
						include("dbconnection.php");
						$query="select * from user_registration where email='$email' and crpass='$crpass' ";
						$res=mysql_query("$query");
						$cnt=mysql_num_rows($res);
						$cnt=mysql_num_rows($res);
						for($i=0;$i<$cnt;$i++)
						{
							$name=mysql_result($res,$i,"full_name");
						}
					//	echo"$cnt";
						if($cnt > 0)
						{
							$_SESSION['EMAIL']=$email;
							$_SESSION['PASS']=$crpass;
							$_SESSION['NAME']=$name;
							header("location:view_cart.php");
						}
						else
						{
							header("location:login.php?y=1");
						}
				}
		}
?>