<?php
session_start();
include("dbconnection.php");


//echo $_GET['id'];
?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}
function f3()
{
window.print(); 
}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>PHPGURUKUL Job Portal/User Information</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="ravi.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #333333;
}
h1,h2,h3,h4,h5,h6 {
	font-weight: bold;
}
h1 {
	font-size: 20px;
	color: #620200;
}
h2 {
	font-size: 15px;
	color: #000000;
}
body {
	margin-top: 0px;
}
td.rows{
	border-bottom:#CCCCCC 1px dashed;
	padding-top:2px;
	padding-bottom:2px;
	font-weight: bold;
}
-->
</style></head>

<body>
<table width="100%" border="0">
<?php 
		 $ret= mysql_query("SELECT *FROM user_registration where id='".$_GET['id']."'");
			while($row=mysql_fetch_array($ret))
			{
			
			?>
			
			
			
			<tr>
			  <td width="200%" colspan="2"  class="font"><h1><?php echo $row['full_name'];?> 's<span class="font1"> information &raquo;</span> </h1></td>
  </tr>
			<tr>
			  <td height="37" colspan="2"  class="font"><div align="left">
		          <h2 align="right">Posted on  : <span class="comb-value"> <?php echo $row['dop'];?> </span></h2>
		        </div></td>
  </tr>
			
			<tr>
			  <td colspan="2"  class="font1"><table width="100%" border="0">
                <tr>
                  <td width="93%" colspan="3" valign="top"><table width="70%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td class="rows">&nbsp;</td>
                      <td class="rows">&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td class="rows"><strong> Name : </strong></td>
                      <td class="rows"><? echo $row['full_name'];?></td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td class="rows">Email id</td>
                      <td class="rows"><span class="comb-value"><?php echo $row['email'];?></span></td>
                      <td>&nbsp;</td>
                    </tr>
               
                    <tr>
                      <td class="rows"><strong>Contact no : </strong></td>
                      <td class="rows"><span class="comb-value"><?php echo $row['dop'];?></span></td>
                      <td>&nbsp;</td>
                    </tr>
               
				
					
                    <tr>
                      <td class="rows"><strong>Resume</strong></td>
                      <td class="rows"><span class="comb-value"><a href="http://localhost/jobportal/upload/<?php echo $row['Resume'];?>" class="font1">Resume</a></span></td>
                      <td>&nbsp;</td>
                    </tr>
                    
                    
                  </table></td>
                </tr>
                
                <tr>
                  <td colspan="3" class="heading">&nbsp;</td>
                </tr>
              </table></td>
  </tr>
			<tr>
			  <td colspan="2"  class="font1">&nbsp;</td>
  </tr>
			
            
            
  <tr>
    <td colspan="2" align="right" ><form id="form1" name="form1" method="post" action="">
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="14%">&nbsp;</td>
          <td width="35%" class="comb-value"><label>
            <input name="Submit" type="submit" class="txtbox4" value="Prints this Document " onClick="return f3();" />
          </label></td>
          <td width="3%">&nbsp;</td>
          <td width="26%"><label>
            <input name="Submit2" type="submit" class="txtbox4" value="Close this document " onClick="return f2();"  />
          </label></td>
          <td width="8%">&nbsp;</td>
          <td width="14%">&nbsp;</td>
        </tr>
      </table>
	  <? } ?>
        </form>    </td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</body>
</html>
