<?php
	session_start();
	$email=$_SESSION['EMAIL'];
	include("dbconnection.php");
	$query="select * from user_registration where email='$email' ";
	$result=mysql_query($query);
	$cnt=mysql_num_rows($result);
	if($cnt>0)
	{
		while($data=mysql_fetch_array($result))
		{
				$user_data[]=$data;
		}
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHPGURUKUL Job Portal</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/coin-slider.css" />

<style type="text/css">

h5 {
	color: #FF0000;

}
</style>
<script >
function validation()
{
	if(document.carform.full_name.value=="")
	{
		alert ("please enter the name");
		document.carform.full_name.focus();
		return false;
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
	if(document.carform.key_skill.value=="")
	{
		alert("Please Enter Your Skills Here");
		document.carform.key_skill.focus();
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
	{
	if(document.carform.code1.value=="")
	{
		alert("Please Enter This Code");
		document.carform.code1.focus();
		return false;
	}
	}
	var fup = document.getElementById('resume');
	var fileName = fup.value;
	var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
	if(ext == "DOC" || ext == "pdf" || ext == "PDF" || ext == "doc"||ext == "docx")
	{
		return true;
	}
	else
	{
		alert("Upload doc & pdf files only");
		fup.focus();
		return false;
	}
}
</script>


</head>
<body style=" background-color:#FFFFFF;" >
<!--main--><div style="width:100%; height:auto; border:solid 0px #990000;">
<!--center--><div style="width:1050px;  height:auto; margin:auto; border:solid 0px #00FF00;">
<!--header--><div style="width:1048px; height:120px; background-color:#FFFFFF; border:solid 1px #CCCCCC;">
<?php include('myaccountheader.php');?></div><!--header close-->

<?php include("ma_menu.php");  ?>
  <!--middle-->
     <table style=" width:1048px; background-color:#FFFFFF;height:auto; border:solid 0px #999900;">
<tr><td>
<!--left-->
<div style="width:200px; height:248px;background-color:#FFFFFF;border:0px #CCCCCC solid;float:left;"><?php include('left.php'); ?></div>
<!--right-->
<?php session_start(); ?>
<?php
	if($_POST['submit'])
	{
		$resume = $_FILES["resume"]["name"];
		$dat=date('y/m/d');
		include('dbconnection.php');
		@move_uploaded_file($_FILES["resume"]["tmp_name"],"upload/".$_FILES["resume"]["name"]);
         $id=$_SESSION['id'];
		$email=$_SESSION['EMAIL'];
		$full_name=$_POST['full_name'];
		$cur_loc=$_POST['cur_loc'];
		$exp_year=$_POST['exp_year'];
		$key_skill=$_POST['key_skill'];
		$profile=$_POST['profile'];
		$comp_name=$_POST['comp_name'];
		$basicedu=$_POST['basicedu'];

		$code1=$_POST['code1'];
		$code2=$_POST['code2'];


		include('dbconnection.php');
		if($code1 == $code2)
		{
			$query="update user_registration set id='$id',email='$email', full_name='$full_name',cur_loc='$cur_loc',exp_year='$exp_year',key_skill='$key_skill',profile='$profile',comp_name='$comp_name',basicedu='$basicedu',resume='$resume',dop='$dat' where email='$email' ";
		}
		$res=mysql_query($query);
		if($res)
		{
			echo "<script>alert('success')</script>";
		}


	}

?>


<div style="width:810px; height:auto; float:left; margin:auto;">

  <form name="carform" action="" method="post" enctype="multipart/form-data" onsubmit="return validation()">
  <!--FIRST TABLE-->
<table width='500' height='60'  align="center" border="0"  bordercolor="#000000" >




  <tr>     <td width="337" height="20" scope="row"><div align="right"> <b>Email ID :</b> </div></td>

    <td width="501" height="20">
      <div align="left">

        <input name="email" type="text" maxlength="30"  size="30" readonly="readonly" value='<?php foreach($user_data as $ud){ echo "$ud[1]";} ?>' />  <!--dfgdfgdfg-->

      </div></td>
  </tr>

</table>
<!--CLOSE FIRST TABLE-->


<?php //****************************************************************?>

<!--SECOND TABLE-->
<table width="500" height="106" border="0" align="center"  bordercolor="#000000" >
 <p style="font-size:20px; margin-left:50px;"  ><b>Your Contact Information</b></p>
  <tr>
    <th width="337" height="20" scope="row"><div align="right"><font color='red'>*</font>Full Name : </div></th>
    <td width="501" height="20">
      <div align="left">

        <input name="full_name" type="text" maxlength="15"  size="30" value='<?php foreach($user_data as $ud){ echo "$ud[4]";} ?>' /><!--dfgdfgdfg-->
         </div></td>
  </tr>
  <tr>
    <td height="50" scope="row"><div align="right"> <font color='red'>*</font><b>Location :</b></div></td>
    <td width="501" height="20">
	<div align="left">
      <label>
      <input type="text" name="cur_loc" size="30" value='<?php foreach($user_data as $ud){ echo "$ud[5]";} ?>' /><!--dfgdfgdfg-->
      </label>
    </div></td>
  </tr>
  <tr>
    <th height="20" scope="row"><div align="right">Mobile Number : </div></th>
      <td width="501" height="20">
	  <div align="left">

      <input type="text" name="mob_no"  size="30" readonly="readonly" value='<?php foreach($user_data as $ud){ echo "$ud[6]";} ?>' /><!--dfgdfgdfg-->

    </div></td>
  </tr>
</table>
<!--CLOSE SECOND TABLE-->

<?php //****************************************************************?>

<!--THIRD TABLE-->
<table width="500" height="126" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000" summary="rcmsandbjas">

<p style="font-size:20px;margin-left:50px;" ><b>Your Current Employment</b></p>
    <tr>
    <th width="337" height="20" scope="row"><div align="right"> <font color='red'>*</font>Experience : </div></th>
<td width="501" height="20">
      <div align="left">

           <select style="width:70px;" name="expyear" >
		            <?php foreach ($user_data as $ud) echo"<option value=$ud[7]>$ud[7]</option>"; ?>
          <option value="99">Fresher</option><option value="0" label="0"></option><option value="1" label="1">1</option><option value="2" label="2">2</option><option value="3" label="3">3</option><option value="4" label="4">4</option><option value="5" label="5">5</option><option value="6" label="6">6</option><option value="7" label="7">7</option><option value="8" label="8">8</option><option value="9" label="9">9</option><option value="10" label="10">10</option><option value="11" label="11">11</option><option value="12" label="12">12</option><option value="13" label="13">13</option><option value="14" label="14">14</option><option value="15" label="15">15</option><option value="16" label="16">16</option><option value="17" label="17">17</option><option value="18" label="18">18</option><option value="19" label="19">19</option><option value="20" label="20">20</option><option value="21" label="21">21</option><option value="22" label="22">22</option><option value="23" label="23">23</option><option value="24" label="24">24</option><option value="25" label="25">25</option><option value="26" label="26">26</option><option value="27" label="27">27</option><option value="28" label="28">28</option><option value="29" label="29">29</option><option value="30" label="30">30</option><option value="31" label="30+">30+</option></select>
        </div></td>
  </tr>
  <tr>
    <th width="337" height="20" scope="row"><div align="right"><font color='red'>*</font>Skills : </div></th>
<td width="501" height="20">
      <div align="left">
        <input name="key_skill" type="text" maxlength="15"  size="30" value='<?php foreach($user_data as $ud){ echo "$ud[8]";} ?>' /><!--dfgdfgdfg-->

      </div></td>
  </tr>
  <tr>
    <th height="20" scope="row"><div align="right"> <font color='red'>*</font>Profile :</div></th>
    <td width="501" height="20"><div align="left">

      <input type="text" name="profile" size="30" value='<?php foreach($user_data as $ud){ echo "$ud[9]";} ?>' />
        </div></td>
  </tr>
  <tr>
    <th height="20" scope="row"><div align="right"> <font color='red'>*</font>Company Name : </div></th>
    <td width="501" height="20"><div align="left">

      <input type="text" name="comp_name"  size="30" value='<?php foreach($user_data as $ud){ echo "$ud[10]";} ?>' />

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
  	<th width="450" height="40" scope="row"><div align="right"><div align="right"><font color='red'>*</font>Upload Resume: </div>
  	<span style="float:left; color: #999999; font-style:italic;"> </span></th>
	   <td width="400" height="30">
	      <div align="left">
				<input type="file" name="resume" id="resume" style="width:295px" />
	   </div></td>
  </tr>
  <tr><td><font color='red'><?php $r=$_GET['r']; if($r==1) echo"Invalid File"; ?></font><td></tr>


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

 				</div></td>
  </tr>
<tr><td colspan='2' height="30"align="center"><input type="submit" value="submit" name="submit" ></td></tr>   </tr>
</table>
<!--CLOSE FOURTH TABLE-->


</form>



</td></tr></table></div></div></div>

<!--midleclose-->

<!--footer--><div style="width:100%; height:200px;  background-color:#0066CC; border:solid 1px #000000;">
<?php include('footer.php');?>
</div>
<!--footer close-->

</body>
</html>
