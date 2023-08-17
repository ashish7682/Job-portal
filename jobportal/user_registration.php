<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHPGURUKUL Job Portal</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/coin-slider.css" />
<script >
function validation()
{
{
	if(document.carform.full_name.value=="")
	{
		alert ("please enter the name");
		document.carform.full_name.focus();
		return false;
	}
}
{
	if(document.carform.curr_loc.value=="")
	{
		alert("Please Enter Your Location Here");
		document.carform.curr_loc.focus();
		return false;
	}
}
	{
		 if(document.carform.mob_no.value.length!=10)
		 {
			 alert("Please Enter The valid No.");
			 document.carform.mob_no.focus();
			 return false;
		 }
	}

	{
	    var email = document.getElementById('txtEmail');
	    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

	    if (!filter.test(email.value))
	    {
	    	alert('Please provide a valid email address');
	    	email.focus;
	    	return false;
	    }
 	}

	{
 	if(document.carform.crpass.value.length<"8")
 	{
 		alert("Password length greater than 8 digit.");
 		document.carform.crpass.focus();
 		return false;
 	}
	}
	{
 	if(document.carform.conpass.value.length<"8")
 	{
 		alert("Password length greater than 8 digit.");
 		document.carform.conpass.focus();
 		return false;
 	}
	}

	{
 	if((document.carform.crpass.value) != (document.carform.conpass.value))
 	{
 		alert("Both Password Are Not Equal");
 		document.carform.conpass.focus();
 		return false;
 	}
	}

	{
	if(document.carform.basicedu.value=="-1")
	{
		alert("Please Select Your Basic Education");
		document.carform.basicedu.focus();
		return false;
	}
	}

/*
	{
	if(document.carform.code1.value=="")
	{
		alert("Please Enter This Code");
		document.carform.code1.focus();
		return false;
	}
	}    */
	//var fup = document.getElementById('resume');
	//var fileName = fup.value;
	//var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
	//if(ext == "DOC" || ext == "pdf" || ext == "PDF" || ext == "doc"||ext == "docx")
	//{
	//	return true;
	//}
	//else
	//{
	//	alert("Upload doc & pdf files only");
	//	fup.focus();
	//	return false;
	//}


}
</script>

<style type="text/css">

h5 {
	color: #FF0000;

}
</style>
</head>
<body style=" background-color:#FFFFFF;" >
<!--main--><div style="width:100%; height:auto; border:solid 0px #990000;">
<!--center--><div style="width:1050px;  height:auto; margin:auto; border:solid 0px #00FF00;">
<!--header--><div style="width:1048px; height:120px; border:solid 0px #CCCCCC;">

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
  <!--middle-->
     <table style=" width:1048px; background-color:#FFFFFF;height:auto; border:solid 0px #999900;">
<tr><td>
<!--left-->
<div style="width:200px; height:248px;background-color:#FFFFFF;border:0px #CCCCCC solid;float:left;"></div>
<!--right-->

<!--YYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY-->

<div style="width:810px; height:auto; float:left; margin:auto;">

  <form name="carform" action="u_dbc.php" method="post" enctype="multipart/form-data" onsubmit="return validation()">


 <?php //****************************************************************?>

  <!--FIRST TABLE**************************************-->
 <table width="500" height="106" border="0" align="center"  bordercolor="#000000" >
  <p style="font-size:20px; margin-left:50px;"  ><b>Your Contact Information</b></p>
   <tr>
     <th width="337" height="20" scope="row"><div align="right"><font color='red'>*</font>Full Name : </div></th>
     <td width="501" height="20">
       <div align="left">

         <input name="full_name" type="text" maxlength="15"  size="30" value="" /><!--dfgdfgdfg-->
          </div></td>
   </tr>
   <tr>
     <td height="50" scope="row"><div align="right"> <font color='red'>*</font><b>Location :</b></div></td>
     <td width="501" height="20">
 	<div align="left">
       <label>
      <input name="curr_loc" type="text" maxlength="15"  size="30" value="" /><!--dfgdfgdfg-->

       </label>
     </div></td>
   </tr>
   <tr>
     <th height="20" scope="row"><div align="right"><font color='red'>*</font>Mobile Number : </div></th>
       <td width="501" height="20">
 	  <div align="left">

       <input type="text" name="mob_no"  size="30" value="" /><!--dfgdfgdfg-->

     </div></td>
   </tr>
 </table>
 <!--CLOSE FIRST TABLE-->

<!--SECOND TABLE-->

<table width='500' height='60'  align="center" border="0"  bordercolor="#000000" >
  <p style="font-size:20px; margin-left:50px;"  ><b>Your Account Information</b></p>
  <tr>     <td width="337" height="20" scope="row"><div align="right"> <b><font color='red'>*</font>Email ID :</b> </div></td>

    <td width="501" height="20">
      <div align="left">

        <input type="text" name="email" id="txtEmail" style="width:295px" />

      </div></td>
  </tr>
  <tr height="30">
      <th height="20" scope="row"><div align="right"><font color='red'>*</font>Create a password :</div></th>
     <td width="501" height="20">
  	<div align="left">
     <input type="password" name="crpass" size="30" id="crpass" />	<!--dfgdfgdfg-->
      </div></td>
    </tr>
     <tr height="30">
      <th height="20" scope="row"><div align="right"><font color='red'>*</font>Confirm password : </div></th>
         <td width="501" height="20">
  	   <div align="left">

        <input type="password" name="conpass" id="conpass"  size="30" /><!--dfgdfgdfg-->

      </div></td>
  </tr>

</table>
<!--CLOSE SECOND TABLE-->

<?php //****************************************************************?>

<!--THIRD TABLE-->
<table width="500" height="126" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000" summary="rcmsandbjas">

<p style="font-size:20px;margin-left:50px;" ><b>Your Current Employment</b></p>
    <tr>
    <th width="337" height="20" scope="row"><div align="right">Experience : </div></th>
<td width="501" height="20">
      <div align="left">

           <select style="width:70px;" name="expyear">
		       <option value="-1">Select</option><option value="99">Fresher</option><option value="0" label="0"></option><option value="1" label="1">1</option><option value="2" label="2">2</option><option value="3" label="3">3</option><option value="4" label="4">4</option><option value="5" label="5">5</option><option value="6" label="6">6</option><option value="7" label="7">7</option><option value="8" label="8">8</option><option value="9" label="9">9</option><option value="10" label="10">10</option><option value="11" label="11">11</option><option value="12" label="12">12</option><option value="13" label="13">13</option><option value="14" label="14">14</option><option value="15" label="15">15</option><option value="16" label="16">16</option><option value="17" label="17">17</option><option value="18" label="18">18</option><option value="19" label="19">19</option><option value="20" label="20">20</option><option value="21" label="21">21</option><option value="22" label="22">22</option><option value="23" label="23">23</option><option value="24" label="24">24</option><option value="25" label="25">25</option><option value="26" label="26">26</option><option value="27" label="27">27</option><option value="28" label="28">28</option><option value="29" label="29">29</option><option value="30" label="30">30</option><option value="31" label="30+">30+</option></select>
        </div></td>
  </tr>
  <tr>
    <th width="337" height="20" scope="row"><div align="right">Skills : </div></th>
<td width="501" height="20">
      <div align="left">
        <input name="key_skill" type="text" maxlength="15"  size="30" value="" /><!--dfgdfgdfg-->

      </div></td>
  </tr>
  <tr>
    <th height="20" scope="row"><div align="right">Profile :</div></th>
    <td width="501" height="20"><div align="left">

      <input type="text" name="profile" size="30" value="" />
        </div></td>
  </tr>
  <tr>
    <th height="20" scope="row"><div align="right">Company Name : </div></th>
    <td width="501" height="20"><div align="left">

      <input type="text" name="comp_name"  size="30" />

    </div></td>
  </tr>


     </td>




</table>
<!--CLOSE THIRD TABLE-->

<?php ?>

<!--FOURTH TABLE-->
<table width="500" height="96" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000" summary="rcmsandbjas">

    <p style="font-size:20px;margin-left:50px;" ><b>Your Education Background</b></p>

  <tr>
    <th width="337" height="20" scope="row"><div align="right"><font color='red'>*</font>Education : </div></th>
   <td width="501" height="20">
      <div align="left">

        <select name="basicedu">
        <?php foreach($user_data as $ud) echo"<option value=$ud[11]>$ud[11]</option>"; ?>
        <option value="-1" label="Select">Select</option>
        <option value="Not Pursuing Graduation" label="Not Pursuing Graduation">Not Pursuing Graduation</option>
        <option value="B.A" label="B.A">B.A</option>
        <option value="B.Arch" label="B.Arch">B.Arch</option><option value="BCA" label="BCA">BCA</option><option value="5" label="B.B.A">B.B.A</option><option value="6" label="B.Com">B.Com</option><option value="7" label="B.Ed">B.Ed</option><option value="8" label="BDS">BDS</option><option value="9" label="BHM">BHM</option><option value="10" label="B.Pharma">B.Pharma</option><option value="11" label="B.Sc">B.Sc</option><option value="12" label="B.Tech/B.E.">B.Tech/B.E.</option><option value="13" label="LLB">LLB</option><option value="14" label="MBBS">MBBS</option><option value="15" label="Diploma">Diploma</option><option value="16" label="BVSC">BVSC</option><option value="9999" label="Other">Other</option></select>

      </div></td>
  </tr>

  <tr>
  	<th width="450" height="40" scope="row"><div align="right"><div align="right">Upload Resume: </div>
  	<span style="float:left; color: #999999; font-style:italic;"> </span></th>
	   <td width="400" height="30">
	      <div align="left">
				<input type="file" name="resume" id="resume" style="width:295px" />
	   </div></td>
  </tr>
  <tr><td><font color='red'><?php $r=$_GET['r']; if($r==1) echo"Invalid File"; ?></font><td></tr>

<!--
  <tr>
      <td width="600" height="20" ><font style="font-size:10px;" color='red'>*</font>Please Enter This Code:</td>
     <td width="400" height="30" style="margin-top:10px;">
        <div style="margin-top:0px;">
    <table><tr><td >
          	<input type=text name='code1'></td>
			<td>
          	<?php
					$str="RK0123456789";
						$b="";
						for($i=0;$i<4;$i++)
												{
													$a=$str{rand()%12};
													$c=$a.".jpg";
													echo"<img src='images/phpimages/$c'>";
													$b=$b.$a;

						}
				echo"<input type=hidden value=$b name='code2'>";
				?>
		       </td></tr>

		       -->
	   </table>
		       <tr><td colspan='2' align='center'><?php
		   				$a1=$_GET['x'];
		   				if($a1==1)
		   				{
		   					echo"<b><font face=times new roman size=3 color=Red>Your Information Updated Sucessfully.</b></font><br>";
		   				}
		   				if($a1==2)
		   				{

		   					echo"<b><font face=times new roman size=3 color=Red>Code are incorrect.</b></font><br>";
		   				}
 				?>

 				</td>
  
<tr><td colspan='2' height="30"align="center"><input type="submit" value="submit" name="submit" ></td></tr>   </tr>
</table>
<!--CLOSE FOURTH TABLE--></td></tr></table></div>
</div>
<!--midleclose-->

<!--footer-->
<div style="width:100%; height:200px;  background-color:#0066CC; border:solid 1px #000000;">
<?php include('footer.php');?>
</div>
<!--footer close-->

</body>
</html>
