<?php session_start(); ?>
<?php

if($_SESSION['name'])
{
include('dbconnection.php');
if($_GET['delete'])
	{
		$b=mysql_query("delete from slider where slider_id='".$_GET['delete']."'");
	}
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHPGURUKUL Job Portal</title>

<link rel="stylesheet" href="style.css" type="text/css" />

</head>

<body bgcolor="#CECECE">
<div style="width:1048px; height:120px; font-size:44px; font-style:italic; color:#FFFFFF; margin:auto;">
<p style="margin-top:60px; " ><center><b>WELCOME TO RESUME 2 NAUKRI</b>	</center>  </p> </div>
  
  <!--middle-->
      <div style="width:1050px; height:auto; margin:auto;border:#000099 1px solid;">
	   
<!--left-->
<div ><?php include('left.php'); ?></div>
<!--right-->
<div style="width:810px; height:525px; float:left; margin:auto; background-color:#FFF;">

<form action="managegallery.php" method="post" name="form" enctype="multipart/form-data">
<fieldset>MANAGE SLIDER
<table width="511" height="58"  class="text1" style="margin-left:150px;margin-top:100px;border:1px solid black;">
<tr><td colspan="4">
<?php 
	if($b>0)

echo "<font color='#00FF00'>Image  Has been Successfully Deleted!"; ?></td></tr>
  <tr>
    <td width="48" height="21">Sr.no</td>
    <td width="152">Photo:</td>
    
    <td width="141">Date:</td>
<td width="150">Action:</td>
    
   
  </tr>
  <?php
  $q=mysql_query("select * from slider");
  $i = 1;

  while($way=mysql_fetch_array($q))
  {
	  ?>
  <tr>
  <td height="29"><?php echo $i++; ?></td>
    <td><img src="slider/<?php echo $way[1]; ?>" width="150" height="50"></td>
    <td><?php echo $way[2]; ?></td>
    
<td ><a href="managegallery.php?delete=<?php echo $way['slider_id']; ?>" onClick="return confirm('Are You sure to delete this image');">
<img src="images/delete.png" /></</td>

  </tr>
  <?php
  
  
  }
  ?>
</table>


    
    </div>
</div>

    
  <?php 
}
else
{
	header('Location:logout.php');
}

?>

</div>
</div>
</body>
</html>
