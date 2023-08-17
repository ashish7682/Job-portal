<?php
session_start();
//echo $_SESSION['id'];
//$_SESSION['msg'];
include("dbconnection.php");

$noofrecord=20;
if(empty($_GET['page']))
	$start=0;
	else
	$start=$noofrecord * $_GET['page'];
if($_GET['ide'])
		  {
		          mysql_query("delete from tbl_img where id = '".$_GET['ide']."'");
                  $_SESSION['del']="data deleted !!";
		  }
?>
<link href="ravi.css" rel="stylesheet" type="text/css">

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

   <fieldset style="border:#703002 1px solid; width:700px;">
          <legend><span class="header"><h3>Manages Gallery Images </h3></span></legend>

	

		<table width="750px;" border="0" cellspacing="0" cellpadding="0" align="center">
        <td width="20%">
<!--<form name="student"  id="student" method="post" enctype="multipart/form-data">-->
    
	       <tr>  
           <td style="font-size:14px;"><b>S no.</b></td>
           <td  style="font-size:14px;"><b>Photos</b></td>
		   <td style="font-size:14px;"><b>Photos Name</td>
		   <td style="font-size:14px;"><b>Action</b></td>
           </tr>
           
	       <tr>  
           <td colspan="4"><hr  /></td>
          
           </tr>
		   
           <?php 
											  
			$ret=mysql_query("SELECT * FROM tbl_img limit ".$start.",".$noofrecord."");
			$cnt=1;
			while($row=mysql_fetch_array($ret))
			{	
			?>
			
		   <tr>
		   <td><?php echo $cnt; ?>.</td>
		   <td><img src="uploadimg/<?php echo ucfirst($row['photo']);?>" width="50" height="30" /></td>
		   <td><?php echo ucfirst($row['photo']);?></td>
           <td><a href="manage_gallery.php?ide=<?php echo $row['id'];?>"  onclick="return confirm('Are you sure you want to delete?');" 
		   title="Delete">Delete</a></td>
                 
                      <?php 
					  $cnt=$cnt+1;
					  } ?>
			</tr>
                  
				
          
</table> 

	

</fieldset>

            </div>
          </form>
          </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="3%">&nbsp;</td>
        <td width="94%">&nbsp;</td>
        <td width="3%">&nbsp;</td>
      </tr>
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