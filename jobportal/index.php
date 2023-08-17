<?php
	session_start();
	include("dbconnection.php");
        $sid=session_id();
	$_SESSION['USER_ID']=$sid;
	$result=mysql_query("select * from jobs_category");
	while($data=mysql_fetch_array($result))
	{
		$job_c[]=$data;
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>PHPGURUKUL Job Portal</title>
<link rel="stylesheet" type="text/css" href="css_menu/style.css" media="screen">
<link rel="stylesheet" href="style.css" type="text/css" />


<SCRIPT LANGUAGE="JavaScript">
<!-- 

// Generated at http://www.csgnetwork.com/puhtmlwincodegen.html 
function popUp(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=1,scrollbars=1,location=1,statusbar=1,menubar=0,resizable=1,width=830,height=600,left = 300,top = 100');");
}

// -->
</script>

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

<body style=" background-color:#000;" >
<!--main--><div style="width:100%; height:auto; border:solid 0px #CCC;">
<!--center--><div style="width:1050px; height:auto; margin:auto; border:solid 0px #00FF00;">
<!--header--><div style="width:1048px; height:123px; border:solid 0px #CCCCCC;">

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

<!--menu--><div style="width:1048px;  height:40px; border:solid 0px #CCCCCC;">

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

<!--slider prtal--><div style="width:1048px; height:300px; background-color:#FFFFFF; border:solid 0px #000;" >

<?php include('slider.php');?>

</div><!--slider close-->


<!--middle--><div style="width:1048px; height:auto; background-color:#FFFFFF; border:solid 1px #CCCCCC">
<table style="width:1048px; height:auto;" >
<tr>
<!--1part--><td style="width:256px; height:auto; float:left; border:solid 1px #CCCCCC;">
<div style="width:256px; height:40px; border:solid 0px #CCCCCC; color:#FFFFFF; background:#4171AF; font-size:20px; font-family:Comic Sans MS;" align="center"><div style="width:256px; height:31px; background-color:#4171AF; border:#000000 solid 0px;" align="center"><b>New User</b></div></div>
<!--************** LOGIN FORM--***************-->
  <form method="post" name="login" action="logindbc.php" >
 <table style="width:256px; margin-bottom:0px;background-color:#EFEFEF;"align='center'>
 	<tr><td>&nbsp; </td></tr>
	<tr><td>&nbsp;</td></tr>
 	<tr align="center" ><td style="margin-top:5px; border-radius:3px;"><input type="text" name="email" placeholder="Enter your Email_id."></td><tr>
 	 <tr align="center" > <td><input type="password" name="crpass" placeholder="Enter your Password."></td>

	
 
	
<tr>	<td colspan="2" width='100px' align='center'><input type="submit" name="b1" value="Login"></td>

	
	</tr><tr><td>&nbsp; </td></tr>

		<tr style="margin-top:0px;"align="center">

 	<td  >
	<a href="index.php" onClick="javascript:popUp('user_registration.php')" style=" text-decoration:none; color:#0066FF;">
	<b>Create An Account</b></a></td>
	
	</tr>
	<tr align="center" ><td ><a href="forget.php" style="text-decoration:none;color:#0066FF;"><b>&nbsp;&nbsp;Forgot Password</b></a></td></tr>
	 </tr>
 	<tr><td align='center' colspan='2'><?php $a=$_GET['y']; if($a==1){echo"<font color='red' ><b>User Id/Password is Incorrect.</b></font>";}echo"<font color='red' ><b>$msg</b></font>";?>
 	</td></tr>

	<tr><td>&nbsp; </td></tr>
	<tr><td>&nbsp;</td></tr>
</table>
 </form><!--*********FORM CLOSE***************-->

<table style="width:250px; margin-top:0px;background-color:#EFEFEF;" >
<tr><td><div style="width:250px; height:40px; border:solid 0px #CCCCCC; color:#FFFFFF; background:#4171AF; font-size:20px; font-family:Comic Sans MS;"><div style="width:250px; height:31px; background-color:#4171AF; border:#000000 solid 0px;" align="center"><b>Enquiry Now</b></div>
<?php include('enquiry.php');?></div></td></tr>
<tr><td><img src="images/career_icon.png"  width="250"/></td></tr>
</table>

</td><!--close 1part-->
<!--2nd part--><td style="width:462px; height:auto; float:left; border:solid 0px #CCC;">
<div style="width:462px; height:40px; border:solid 0px #CCCCCC; color:#FFFFFF; background:#4171AF; font-size:20px; font-family:Comic Sans MS;"><div style="width:460px; height:31px; background-color:#4171AF; border:#000000 solid 0px;" align="center"><b>Top Employers</b></div></div>
<div style="width:462px; height:auto; border:solid 0px #CCCCCC;">
<table style="width:462px; font-family:"Times New Roman", Times, serif; height:auto;">
<tr>
<td style="width:225px;height:50px;border:solid 0px #CCC; font-size:12px;">
<font color="#1B43E2"><b>Electrical& Electronics</b></font><br />
<font color="#000000">Toshiba Corporation<br />Bajaj Electricals Ltd<br />Jumbo Electronics <br />Havells India Pvt Ltd<br />Samsung Electonics</font></td>

<td style="width:225px;height:50px;border:solid 0px #CCC; font-size:12px;"><font color="#000000"><font color="#1B43E2"><b>Automobiles</b></font><br />
  <font color="#000000">Ashok Leyland Ltd <br />Ford India Pvt. Ltd<br />Mahindra & Mahindra Limited  <br />Maruti Suzuki India Limited <br />	Tata Motors Ltd  </font>
</td>
</tr>


<tr>
<td style="width:225px;height:50px;border:solid 0px #CCC; font-size:12px;">
<font color="#1B43E2"><b>Banking And Finance</b></font><font color="#000000"><br />
Citi Bank<br />HDFC Bank Limited <br />Federal Bank Ltd <br />ICICI Bank Limited <br />Yes Bank Limited </font></td>

<td style="width:225px;height:50px;border:solid 0px #CCC; font-size:12px;"><font color="#1B43E2"><b>Pharmaceutical</b></font><font color="#000000"><br />
Cipla Ltd <br />Hindustan Antibiotics Ltd <br />Ranbaxy Laboratories Ltd <br />Sun Pharmaceutical Industries Ltd <br />Zandu Pharmaceutical Works </font>
</td>
</tr>

<tr>
<td style="width:225px;height:50px;border:solid 0px #CCC; font-size:12px;">
<font color="#1B43E2"><b>Food and Beverages</b></font><br /><font color="#000000">Parle Agro Private Limited <br />Bisleri International Limited <br />PepsiCo International <br />Amul India
<br />Britannia</font></td>

<td style="width:225px;height:50px;border:solid 0px #CCC; font-size:12px;"><font color="#1B43E2"><b>IT Industries</b></font><br /><font color="#000000"> Accenture<br /> TCS E-Serve Limited <br /> Samsung Techwin <br />  HTC Global Services (India) Private Limited <br />   SanDisk India Device Centre Pvt .Ltd </font>
 </td>
</tr>






<tr>
<td style="width:225px;height:50px;border:solid 0px #CCC; font-size:12px;">
<font color="#1B43E2"><b>Manufacturing</b></font><br /><font color="#000000">BOC India Ltd <br />MRF LTD<br />Vedanta Resources plc<br />Tata Group
<br />
Maruti Suzuki</font></td>

<td style="width:225px;height:50px;border:solid 0px #CCC; font-size:12px;">
<font color="#1B43E2"><b>Shipping</b></font><br /><font color="#000000">Blue Water Trade Winds<br />Essar Shipping Ltd<br />Hindustan Shipyard Ltd<br />Mazagon Dock Ltd
<br />
Kuwaiti Coasts (KC)</font></td>
</tr>
<tr><td></td><td></td></tr>
<tr><td></td><td></td></tr>
<tr style=" margin-top:40px;">
<td style="width:225px;height:50px;border:solid 0px #CCC; font-size:12px;" >
<img src="images/index-bannr-img4.png"  width="140" height="140"/></td>

<td style="width:225px;height:50px;border:solid 0px #CCC; font-size:12px;" align="center">
<img src="images/index-bannr-img2.png"  width="140" height="140"/></td></tr>

<tr><td></td><td></td></tr>
<tr><td></td><td></td></tr>
<tr style=" margin-top:40px;">
<td style="width:225px;height:50px;border:solid 0px #CCC; font-size:12px;" >
<img src="images/index-bannr-img1.png"   width="140" height="140"/></td>

<td style="width:225px;height:50px;border:solid 0px #CCC; font-size:12px;" align="center">
<img src="images/index-bannr-img3.png"  width="140" height="140"/></td></tr>

<tr><td></td><td></td></tr>

</table>
</div>
</td><!--2nd part-->

<!--3rd part--><td style="width:256px; height:auto; float:left; border:solid 0px #CCC;">

<div style="width:320px; height:40px; border:solid 0px #CCCCCC; color:#FFFFFF; background:#4171AF; font-size:20px; font-family:Comic Sans MS;"><div style="width:318px; height:31px; background-color:#4171AF; border:#000000 solid 0px; "align="center"><b>Top MNC Companies</b></div> </div>
<div style="width:320px; height:auto; border:solid 0px #CCCCCC;">
<table style="width:320px; height:auto;">
<tr style="margin-top:1px;">
  <td style="width:90px; height:auto; float:left;"><img src="left-image/4.jpg" width="90" height="51" /><td>
<td></td>
<td style="width:90px; height:auto; float:left;"><img src="left-image/11.jpg" width="90" height="51" /><td>
<td></td>
<td style="width:90px; height:auto; float:left;"><img src="left-image/6.jpg" width="90" height="51" /><td>
</tr>
<tr style="margin-top:1px;">
  <td style="width:90px; height:auto; float:left;"><img src="left-image/10.jpg" width="90" height="51" /><td>
<td></td>
<td style="width:90px; height:auto; float:left;"><img src="left-image/5.jpg" width="90" height="51" /><td>
<td></td>
<td style="width:90px; height:auto; float:left;"><img src="left-image/12.jpg" width="90" height="51" /><td>
</tr>
<tr style="margin-top:1px;">
  <td style="width:90px; height:auto; float:left;"><img src="left-image/1.jpg" width="90" height="51" /><td>
<td></td>
<td style="width:90px; height:auto; float:left;"><img src="left-image/20.jpg" width="90" height="51" /><td>
<td></td>
<td style="width:90px; height:auto; float:left;"><img src="left-image/3.jpg" width="90" height="51" /><td>
</tr>

<tr style="margin-top:1px;">
  <td style="width:90px; height:auto; float:left;"><img src="left-image/17.jpg" width="90" height="51" /><td>
<td></td>
<td style="width:90px; height:auto; float:left;"><img src="left-image/8.jpg" width="90" height="51" /><td>
<td></td>
<td style="width:90px; height:auto; float:left;"><img src="left-image/9.jpg" width="90" height="51" /><td>
</tr>
<tr style="margin-top:1px;">
  <td style="width:90px; height:auto; float:left;"><img src="left-image/14.jpg" width="90" height="51" /><td>
<td></td>
<td style="width:90px; height:auto; float:left;"><img src="left-image/19.jpg" width="90" height="51" /><td>
<td></td>
<td style="width:90px; height:auto; float:left;"><img src="left-image/13.jpg" width="90" height="51" /><td>
</tr>
<tr style="margin-top:1px;">

  <td style="width:90px; height:auto; float:left;"><img src="left-image/18.jpg" width="90" height="51" /><td>
 <td></td>
<td style="width:90px; height:auto; float:left;"><img src="left-image/2.jpg" width="90" height="51" /><td>
<td></td>
<td style="width:90px; height:auto; float:left;"><img src="left-image/15.jpg" width="100" height="51" /><td>
</tr>
<tr style="margin-top:1px;">
  <td style="width:90px; height:auto; float:left;"><img src="left-image/16.jpg" width="90" height="51" /><td>
<td></td>
<td style="width:90px; height:auto; float:left;"><img src="left-image/7.jpg" width="90" height="51" /><td>
<td></td>
<td style="width:90px; height:auto; float:left;"><img src="left-image/21.jpg" width="90" height="51" /><td>
</tr>


</table>
</div>
<div style="width:320px; height:40px; border:solid 0px #CCCCCC; color:#FFFFFF; background:#4171AF;font-size:20px; font-family:Comic Sans MS;"><div style="width:320px; height:31px; background-color:#4171AF; border:#000000 solid 0px;" align="center"><b>Testimonials</b></div>
</div>
<div style="width:320px; height:auto; border:solid 0px #CCCCCC;">
<table style="width:320px; height:auto;">
<tr>
  <td style="width:318px; height:300px; background-color:#EFEFEF; border:solid 0px #CCCCCC;">
<marquee behavior="scroll" direction="up" scrollamount="3" onmouseover="stop();" onmouseout="start();"  onmousemove="stop"  style="height:300px;">
<?php include('dbconnection.php');
$server=mysql_query("select * from static where page='Testimonials'");
while($get=mysql_fetch_array($server))
{
       echo $get['details'];
}

?></marquee>


</td>

</tr>
</table></div>

</td><!--close 3rd part-->
</tr>
</table>

</div><!--middle close-->


<!--middle b-->
<div style="width:1048px; height:160px; background-color:#FFFFFF; border:solid 1px #CCCCCC;">
<table style="width:100%; height:160px; font-size:12px; ">
<tr>
<td colspan="5" style="width:1048px; height:30px; border:solid 0px #CC0000; color:#FFFFFF;font-size:20px; background:#4171AF;"><font style="margin-left:20px; "><b>More Way To Find Your Job</b></font></td>
</tr>
<tr>

<td style="width:206px; height:20px;  font-size:12px;"><b>Resume Forward</b></td>
<td style="width:206px; height:20px;  font-size:12px;"><b>Resume Writing</b></td>
<td style="width:206px; height:20px;  "><a href="JobSeeker.php" style=" text-decoration:none; color:#000000;"><b>Job Seeker</b></a></td>
<td style="width:206px; height:20px;  font-size:12px;"><b>Carrer Report</b></td>
<td style="width:206px; height:20px;  font-size:12px;"><b>Profile Verification</b></td>
</tr>
<tr>
<td ><a href="ResumeForwardIndia.php" style=" text-decoration:none; color:#000000;">Resume Forward India</a></td>
<td><a href="ResumeWritingIndia.php" style=" text-decoration:none; color:#000000;">Resume Writing India</a></td>
<td style="width:206px; height:20px;  font-size:12px;"><a href="InterviewPreparation.php" style=" text-decoration:none; color:#000000;">Interview Preparation</a></td>
<td><a href="Career&FinanceReport.php" style=" text-decoration:none; color:#000000;">Carrer &amp; Finance Report</a></td>
<td><a href="EducationVerification.php" style=" text-decoration:none; color:#000000;">Education Verification</a></td>
</tr>
<tr>
<td><a href="ResumeForwardInternational.php" style=" text-decoration:none; color:#000000;">Resume Forward International</a></td>
<td><a href="ResumeWritingInternational.php" style=" text-decoration:none; color:#000000;">Resume Writing International</a></td>
<td><a href="GrowthCombo.php" style=" text-decoration:none; color:#000000;"><b>Growth Combo</b></a></td>
<td><a href="JobChangePlanning.php" style=" text-decoration:none; color:#000000;">Job Change Planning</a></td>
<td><a href="EmployeeVerification.php" style=" text-decoration:none; color:#000000;">Employee Verification</a></td>
</tr>
<tr>
<td ><a href="ResumeForwardBoth.php" style=" text-decoration:none; color:#000000;">Resume Forward Both</a></td>
<td><a href="ResumeWritingBoth.php" style=" text-decoration:none; color:#000000;">Resume Writing Both</a></td>
<td style="width:206px; height:20px;  font-size:12px;"><a href="#" style=" text-decoration:none; color:#000000;"></a></td>
<td></td>
<td><a href="Employee&EducationVerification.php" style=" text-decoration:none; color:#000000;">Employee+Education Verification</a></td>
</tr>

<tr>
<td style="width:206px; height:20px;  font-size:12px;"><a href="CoverLetterIndia.php" style=" text-decoration:none; color:#000000;">Cover Letter India</a></td>
<td style="width:206px; height:20px;  font-size:12px;"><a href="CoverLetterInternational.php" style=" text-decoration:none; color:#000000;">Cover Letter International</a></td>
<td></td>
<td></td>
<td style="width:206px; height:20px;  font-size:12px;"><a href="#" style=" text-decoration:none; color:#000000;"><b>My Account</b></a></td>
</tr>
<tr>
<td ></td>
<td></td>
<td>&nbsp;</td>
<td></td>
<td></td>
</tr>

</table></div></div></div>

<!--midleclose-->

<!--footer--><div style="width:100%; height:200px;  border:solid 1px #000000;">
<?php include('footer.php');?>
</div>
<!--footer close-->

</body>
</html>
