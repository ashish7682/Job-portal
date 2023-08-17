<?php
session_start();
//echo $_SESSION['id'];
//$_SESSION['msg'];
include("dbconnection.php");

if(@$_POST ['submit'])
{
$file = $_FILES ['file'];
$name1 = $file ['name'];
$type = $file ['type'];
$size = $file ['size'];
$tmppath = $file ['tmp_name']; 
if($name1!="")
{
if(move_uploaded_file ($tmppath, 'uploadimg/'.$name1))//image is a folder in which you will save image
{
$query="insert into tbl_img set photo='$name1'";
mysql_query ($query) or die ('could not updated:'.mysql_error());
echo "<script>alert('Your image upload successfully !!');</script>";
}
}
}
?>

<html>
<head>
<title>PHPGURUKUL Job Portal</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link href="ravi.css" rel="stylesheet" type="text/css">

</head>
<body style="background-color:#5C5857;">

<div style="width:1048px; height:120px; font-size:44px; font-style:italic; color:#FFFFFF; margin:auto;">
<p style="margin-top:60px; " ><center><b>WELCOME TO RESUME 2 NAUKRI</b>	</center>  </p> </div>
  
  <!--middle-->
      <div style="width:1050px; height:auto; margin:auto;border:#000099 1px solid;">
	   
<!--left-->
<div ><?php include('left.php'); ?></div>
<!--right-->
<div style="width:847px; height:655px; float:left; margin:auto; background-color:#5C5857;">

<table width="800px;" border="1" cellspacing="0" cellpadding="0">
      <tr>
        
        <td valign="top"><!--<form name="form1" method="post" action="" onSubmit="return valid();">-->
        <table width="60%" border="0" cellspacing="0" cellpadding="0" align="center">

   		

		<legend><h3>Please Add Images</h3></legend>

	

		<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
<td width="20%">
<form name="student"  id="student" method="post" enctype="multipart/form-data">
    <tr>

            <td height="15">Select New Images:</td>

            <td style="padding-left:8px;"><input type="file" name="file" class="textbox" value="" id="file" ></td>
          </tr>

          <tr><td style="padding-left:200px;"></td></tr>
</table>
            </div>
     
      <tr>
        <td colspan="4"  style="margin-left:200px;"><input type="submit" value=" Submit" name="submit" id="submit"></td>
     
      </tr>
           </form>
    </table>      
      <p>&nbsp;</p>
    </td>
    <td width="70" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>&nbsp;</td>
        </tr>
      
      
    </table></td>
  </tr>
</table>
</div>
<!-- End ImageReady Slices -->
</body>
</div>
</html>