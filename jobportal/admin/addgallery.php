<?php session_start(); ?>
<?php

if($_SESSION['name'])
{
include('dbconnection.php');

if(isset($_POST['submit']))
{
$date=date('d/m/y');	
	$d=$_FILES["file"]["name"];
	
	 $a=move_uploaded_file($_FILES["file"]["tmp_name"], "slider/" . $d);
	      
		 $b= mysql_query("insert into slider(image,doc) values('$d','$date')");
	
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lucky Fire Works</title>

<link rel="stylesheet" href="style.css" type="text/css" />

</head>

<body bgcolor="#CECECE">
<!--main--><div style="width:1050px; height:auto; margin:auto; background-color:#000;border:#000099 1px solid;">
	
   
   <!--header--> <div style="width:1050px; height:150px; margin:auto;border:#000099 0px solid;"><?php include('header.php'); ?>
   </div>
  
  <!--middle-->
      <div style="width:1050px; height:auto; margin:auto;border:#000099 1px solid;">
	   
<!--left-->
<div ><?php include('left.php'); ?></div>
<!--right-->
<div style="width:810px; height:525px; float:left; margin:auto; background-color:#FFF;">
<form action="addgallery.php" method="post" name="form" enctype="multipart/form-data">

<fieldset class="heading">Add photo Gallery
<table style="margin-left:200px;margin-top:100px;border:1px solid black;"  class="text1">
<tr><td colspan="2">

<?php 	if($b>0)

echo "<font color='#00FF00'>Image Gallery Has been Uploaded"; ?>	
</td>
</tr>

  <tr>
     <td height="25">Select New Images:</td>

            <td ><input type="file" name="file"  id="file" ></td>
          </tr>
          <tr><td>&nbsp;</td><td><input type="submit" name="submit" value="INSERT"></td>
</table>

</fieldset>

</form>

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
