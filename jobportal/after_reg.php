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


<body style=" background-color:#FFFFFF;" >
<!--main--><div style="width:100%; height:auto; border:solid 0px #990000;">
<!--center--><div style="width:1050px;  height:auto; margin:auto; border:solid 0px #00FF00;">
<!--header--><div style="width:1048px; height:120px; background-color:#FFFFFF; border:solid 1px #CCCCCC;">
<?php include('header.php');?></div><!--header close-->

<!--menu--><div style="width:1048px; height:50px; border:solid 1px #CCCCCC;">
<?php include('menu.php');?>
</div><!--menu close-->
 <!--middle-->
     <table style=" width:1048px; background-color:#FFFFFF;height:300px;border:solid 0px #999900;">
<tr><td>
<!--left-->
<!----------------------------------------------------------------------------------------------------------->
<div style="border-radius:5px;background-color:white;width:1035px; height:300px;border:1px #FF0000 solid;float:center;margin-top:2px;margin-left:2px;margin-right:2px;margin-bottom:2px;">
<table>
	<tr>
		<td align='center'>
			<div style="width:760px; height:200px; float:left;border:0px #FF0000 solid;margin-top:45px;">
				<table><tr><td>
				<div style="width:auto; height:auto; float:left;border:0px #FF0000 solid;margin-top:10px;margin-left:5px;margin-right:10px;margin-bottom:10px;">
					<img src="images/thanks1.png">
				</div></td>
				<td><div style="width:auto; height:auto; float:right;border:0px #FF0000 solid;margin-top:10px;margin-left:5px;margin-right:10px;margin-bottom:10px;font-family:Arial, Helvetica, sans-serif; font-size:16px;">
					<b>Thanks for becoming a part of <font color='red'>resume2naukri</font> family,You have been registered sucessfully. Please Login Here.</b>
				</div></td></tr></table>

			</div></td>
		<td align='center'>
			<div style="background-color:#0C70A4;width:250px; height:200px; float:right;border:1px #FF0000 solid;margin:auto;margin-top:45px; ">

		<!--**************FORM--***************-->
		<!--**************FORM--***************-->
		 <form method="post" name="login" action="after_reg_dbc.php">


	<table align='center' style="width:250px; height:200px;" border="0">

	<tr ><td  align="center"style="font-size:20px; " ><b><font color='white'>Jobseeker Login</font></b></td></tr>
	<tr><td width="50%" align='center'><input type="text" name="email" placeholder="Enter your Email_id." style="height:30px; width:200px;"></td></tr>
	<tr><td width="50%" align='center'><input type="password" name="crpass" placeholder="Enter your Password." style="height:30px; width:200px;"></td></tr>
	<tr><td align='center' style="font-family:Arial, Helvetica, sans-serif; font-size:12px;"><?php $a=$_GET['y']; if($a==1){echo"<font color='yellow' ><b>User Id/Password is Incorrect.</b></font>";}echo"<font color='red' ><b>$msg</b></font>"; ?></td></tr>
	<tr><td width="30%" align='center'><input type="submit" name="b1" value="Login"></td></tr>

</table>
</form>
</div>


</td></tr>
</table>
<!----------------------------------------------------------------------------------------------------------->
<!--right-->




<tr><td></table>

<!--centerclose-->

<!--footer--><div style="width:1050px; height:auto; margin:auto; border:solid 0px #000000;">
<?php include('footer.php');?>
</div>
<!--footer close-->

		</div></div>






</body>
</html>