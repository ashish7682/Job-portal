<div style="width:200px; height:auto; float:left; margin:auto;color:#271CFB; border:1px #CCCCCC solid;background-color:#CFCFCF;">
<table class="text1">
 <tr><td>
 
 
 <a href="logout.php" style="text-decoration:none; color:#000000;">
 Logout</a></td></tr>
 <tr><td><a href="changepassword.php" style="text-decoration:none; color:#000000;">ChangePassword</a><hr /></td></tr></table>
      
     <br />
<form action="left.php" method="post">
<b>STATIC PAGE</b>
<table>
<?php 
include('dbconnection.php');
$nice=mysql_query("select * from static");
while($way=mysql_fetch_array($nice))
{
?>
<tr>
<td><a href="page.php?id=<?php echo $way['static_id'];?>" style="font-family:Tahoma, Geneva, sans-serif;text-decoration:none;color:#000000;" ><?php echo $way['page'];?></a></td>
</tr>
<?php 
}?>
</table>



</form>

<ul class="heading"><li><a href="rwi_price.php" style="text-decoration:none; color:#000000;"><b>Change Prices</b></a></li></ul>
        
    <ul class="heading"><li><a href="user_registration.php"><font color="#00FF00"><b>User_registration</b></font></a></li></ul>
    </td></tr>
     
   
     </table>
    
     
     

         
       
     
</div>