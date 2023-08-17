<?php
	if($_POST['submit'])
	{
		include('dbconnection.php');
		$resume = $_FILES["resume"]["name"];
		$dat=date('y/m/d');
		@move_uploaded_file($_FILES["resume"]["tmp_name"],"upload/".$_FILES["resume"]["name"]);
         $id=$_SESSION['id'];

		$email=$_POST['email'];
		$crpass=$_POST['crpass'];
		$conpass=$_POST['conpass'];

		$full_name=$_POST['full_name'];
		$cur_loc=$_POST['curr_loc'];
		$mob_no=$_POST['mob_no'];

		$exp_year=$_POST['expyear'];
		$key_skill=$_POST['key_skill'];
		$profile=$_POST['profile'];

		$comp_name=$_POST['comp_name'];
		$basicedu=$_POST['basicedu'];

		$code1=$_POST['code1'];
		$code2=$_POST['code2'];

		//echo"$email<BR>pass=$crpass<BR>conpass=$conpass<BR>name=$full_name<BR>loc=$cur_loc<BR>num=$mob_no<BR>exp=$expyear<BR>skill=$key_skill<BR>profile=$profile<BR>com_name=$comp_name<BR>basic=$basicedu<BR>resume=$resume<BR>date=$dat";

		$query_check="select * from user_registration where email='$email' ";
		$result=mysql_query($query_check);
		$count=mysql_num_rows($result);
		if($count > 0)
		{
			echo "<script>alert('You Are Also Registered Here.')</script>";
		}
		else
		{
			//	if($code1 == $code2)
			//	{
					$query_ch="select * from user_registration";
					$res_ch=mysql_query($query_ch);
					$count_ch=mysql_num_rows($res_ch);
					if($count_ch==0)
					{
						$query1="insert into user_registration values('10001','$email','$crpass','$conpass','$full_name','$cur_loc','$mob_no','$expyear','$key_skill','$profile','$comp_name','$basicedu','$resume','$dat')";
					}
					else
					{
						$query1="insert into user_registration values('','$email','$crpass','$conpass','$full_name','$cur_loc','$mob_no','$expyear','$key_skill','$profile','$comp_name','$basicedu','$resume','$dat')";
					}


					$res=mysql_query($query1);
					if($res)
					{
						$query="select user_id from user_registration where email='$email' ";
								$result=mysql_query("$query");
								$count=mysql_num_rows($result);
								$user=array();
								while($data=mysql_fetch_array($result))
								{
									$user[]=$data;
								}
								foreach($user as $u)
								{
									$user_id=$u[0];
								}
								$order_id="R2N"."$user_id";
								$query1="insert into order_id values('','$email','$user_id','$order_id')";
								$res=mysql_query($query1);
								header("location:after_reg.php");
					}
			//	}
			//	else
			//	{
			//		echo "<script>alert('Please Enter Correct Code.')</script>";
			//		//$msg="Please Enter Correct Code.";
			//	}
		}
}

?>
