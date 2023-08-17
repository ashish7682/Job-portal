<?php
session_start();
echo $_GET['id'];
echo $_SESSION['user'];
//echo $_SESSION['id'];
//echo $_POST['frm_id'];
include("dbconnection.php");


$noofrecord=8;
if(empty($_GET['page']))
	$start=0;
	else
	$start=$noofrecord * $_GET['page'];


if($_GET['delete'])
		  {
		          mysql_query("delete from user_registration where id = '".$_GET['delete']."'");
                  $_SESSION['del']="data deleted !!";
		  }
		
?>           <script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+400+',height='+400+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>JOb Portal</title>
</head>

<body style="background-color:#EFEFEF;">
<!--main-->


<div style="width:100%; height:auto; border:#000000 solid 0px; margin:auto;border-collapse:collapse;">

<!--header-->

         <div style="width:1022px; height:135px; background-color:#51E910;border:#03C solid 1px;margin:auto; border-collapse:collapse; ">
       <?php include('header.php'); ?></div>
     
     
     
  
   <!--center-->

     <div style="width:1022px; height:auto;  background-color:#3CF;border:#0F0 solid 1px;margin:auto; ">
   
   <!--left-->
   
   		 <div>
         <?php include('left.php'); ?> </div>
 
     <!--lright-->
   
   		 <div style="width:800px; height:600px; float:left;border:#0F0 solid 1px;margin:auto;  ">
     
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="1%">&nbsp;</td>
        <td width="99%" class="heading5">Manage Resumes</td>
      </tr>
      <tr>
	
        <td></td>
        <td bgcolor="#FA9403" height="2px;"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><form name="form1" method="post" action="" >
          <table width="100%" border="0" bgcolor="#CCCCCC">
            
            
            
            <tr>
              <td height="6" class="heading"></td>
              <td></td>
              <td></td>
              <td colspan="3"></td>
            </tr>
            <tr>
              <td width="47%" >Search by Name/ Email id/Contact no. : </td>
              <td width="35%"><input name="search"  type="text" class="txtbox3" id="search" style="width:250px;">
              </td>
              <td width="1%">&nbsp;</td>
              <td width="17%" colspan="3"><input name="submit" type="submit" id="submit" value="Search" width="180px" />
                <input type=hidden name=hiddensearch value=yes></td>
            </tr>
            <tr>
              <td height="6" class="heading"></td>
             
              <td></td>
          
            </tr>
          </table>
        </form>  </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
		 <?php 
			  $find=$_POST['search'];
$str = mysql_query("SELECT *FROM user_registration WHERE full_name LIKE'%$find%' || email LIKE'%$find%' || dop LIKE'%$find%'   ");
		$row=mysql_fetch_array($str);
			{
			if($row>0)
			{
?>
          <tr>
		  
			    <p style="" align="center"><font color="#FF0000" class="links">
	  <?php echo $_SESSION['del']; ?><?php echo $_SESSION['del']="";?></font></p>
            <td width="4%" align="left" class="heading">S no.</td>

          
            <td width="16%"   class="heading">Name</td>
            <td width="13%"  class="heading">Email id</td>
			  <td width="15%"  class="heading">Date </td>
			    <td width="24%"  class="heading">Resume</td>
          <td width="9%"  class="heading" align="center"> Action</td>
          </tr>
         
          
          <?php 
				
				if ($_POST['hiddensearch']=='yes')
				$find=$_POST['search'];
				else
		        $find =$_GET['search'];
				$find2=$_POST['select2'];
				$find3=$_POST['select3'];
				
				
				
			 $ret = mysql_query("SELECT *FROM user_registration WHERE full_name LIKE'%$find%' || email LIKE'%$find%' || dop LIKE'%$find%'   limit ".$start.",".$noofrecord."");
			$cnt=1;
			while($row=mysql_fetch_array($ret))
			{
			
			?>
          <tr >
      
            <td style=" float:left;"   class="comb-value"><?php echo $cnt; ?>.</td>
			
              <td  class="comb-value"><?php echo $row['full_name'];?></td>
               <td  class="comb-value"><?php echo $row['email'];?></td>
			    <td  class="comb-value"><?php echo $row['dop'];?></td>
               <td  class="comb-value"><?php echo $row['resume'];?></td>
			    <td width="7%" align="left"><a href="javascript:void(0);"  onClick="popUpWindow('http://localhost/jobportal/admin/profile.php?id=<?php echo $row['id'];?>')"><img src="images/view.png" alt="View this Profile" style="border:0px;"></a></td>
            <td width="7%" class="comb-value"><a href="user_registration.php?delete=<?php echo $row['id'];?>" class="comb-value" onClick="return delete(); ">   <img src="images/delete.png" alt=""  style="border:0px"; ></a></td>
          </tr>
          

          
          
          
          <?php 
											  $cnt=$cnt+1;
											 }
											 ?>
          <?php
		$anymatches=mysql_num_rows($ret); 
	if ($anymatches == 0) 
		{ 
			echo "<font color = red>Sorry, but we can not find an entry to match your query</font><br><br>"; 
		} 
		else{
		echo "<b><font size = 2px color = red>" .$find;  echo "</b></font>" ;
	} 
				  
				 ?>
          <tr>
            <td colspan="9" align="center" bgcolor="#CCCCCC"  height="2"></td>
            </tr>
          <tr>
            <td class="heading" align="center">
			<?php list($totalrecord)=mysql_fetch_array(mysql_query("select count(*) as tt FROM user_registration WHERE full_name LIKE'%$find%' || email LIKE'%$find%' || dop LIKE'%$find%'  "));
		echo "<strong>Total</strong>:" . $totalrecord;
					?></td>
            <td colspan="3" class="heading" ><?php	
		$page=ceil($totalrecord/$noofrecord);
		for($i=0;$i<$page;$i++)
		{
		
		echo '<a href="user_registration.php?search='.urlencode($find).'&page='.$i.'">'.($i+1).'</a> | ';
		}
					?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td colspan="2">&nbsp;</td>
            <td width="4%">&nbsp;</td>
          </tr>
		   <?php }
else{
echo "<h5><font color = 'red'>"; echo "No Result Found.Please Try Again...."; echo "</font></h5>";
}}?>
        </table></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
             </div>
     </div>  
     
     
     
     </div>
     </div>
</body>
</html>