<?php $msg=""; ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>PHPGURUKUL Job Portal</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/coin-slider.min.js"></script>
<script>
			function f1()
			{
				ok=0;
				pa=0;
				a=document.login.elements.email.value;
				pass=document.login.elements.crpass.value;
				b=a.length;
				at=0;
				dot=0;
				p1=0;
				p2=0;
				d1=0;
				d2=0;
				sp=0;
				at1=0;
				for(i=0;i<b;i++)
				{
					c=a.charAt(i);
					if(c=='@')
					{
						at=1;
						p1=i;
						at1++;
					}
					if(c=='.')
					{
						dot=1;
						p2=i;
					}
					if(c==' ')
					{
						sp=1;
					}
				}
				d1=p2-p1;
				d2=b-p2;
				//alert(d2);
				if(at==0 || dot==0 || d1<3 || p1<3 || d2<3 || sp==1 || at1!=1)
				{

					alert("Not valid email id");
					ok=1;

				}
				if(pass.length==0)
				{
					alert("Please Enter Password.");
					pa=1;
				}
		//		if(ok==0 && (pa==0))
		//		{
		//			document.login.submit();
			//	}
			}
		</script>
</head>

<body>
<!--**************FORM--***************-->
<!--**************FORM--***************-->
<!--**************FORM--***************-->
<!--**************FORM--***************-->


<body style=" background-color:#FFFFFF;" >
<!--main--><div style="width:100%; height:auto; border:solid 0px #990000;">
<!--center--><div style="width:1050px;  height:auto; margin:auto; border:solid 0px #00FF00;">
<!--header--><div style="width:1048px; height:120px; background-color:#FFFFFF; border:solid 1px #CCCCCC;">
<?php include('header.php');?></div><!--header close-->

<!--menu--><div style="width:1048px; height:40px; border:solid 1px #CCCCCC;">
<?php include('menu.php');?>
</div><!--menu close-->
 <!--middle-->
     <table style=" width:1048px; background-color:#FFFFFF;height:300px;border:solid 0px #999900;">
<tr><td>
<!--left-->
<div style="width:600px; height:300px;background-color:#3069FF;border:0px #CCCCCC solid;float:left;"><a href="user_registration.php"><img src="images/createaccount.png"></a></div>
<!--right-->

<div style="width:435px; height:300px; float:left;border:1px #CCCCCC solid;margin:auto; ">
 <form method="post" name="login" action="logindbc1.php">
<table align='center' style="width:430px; height:298px;">

	<tr ><td colspan='2' width='140px' style="font-size:20px; " align="center" ><b>Jobseeker Login</b></td></tr>
	<tr><td><input type="text" name="email" placeholder="Enter your Email_id."></td>
	<td><input type="password" name="crpass" placeholder="Enter your Password."></td></tr>
	<tr><td style="padding-left:20px;"><a href="forget.php" style="text-decoration:none;color:#0066FF;">Forget Password</a></td><td colspan='2' width='100px' align='center'><input type="submit" name="b1" value="Login"></td>
	</tr>
	<tr><td align='center' colspan='2'><?php $a=$_GET['y']; if($a==1){echo"<font color='red' ><b>User Id/Password is Incorrect.</b></font>";}echo"<font color='red' ><b>$msg</b></font>"; ?>
	</td></tr>
	<tr><td>&nbsp;</td><td>&nbsp;</td>  </tr>
</table>
</form>
</div>


<tr><td></table></div></div></div>

<!--midleclose-->

<!--footer--><div style="width:100%; height:200px;  background-color:#0066CC; border:solid 1px #000000;">
<?php include('footer.php');?>
</div>
<!--footer close-->

</body>
</html>
