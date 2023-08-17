


<div style="width:150px; height:520px; float:left;background-color:#202020;">
<ul class="heading"><li><a href="logout.php"><font color="#00FF00">Logout</font></a></li>
<li><a href="changepassword.php"><font color="#00FF00">change Password</font></a></li>
</ul>
<hr />




<form action="leftsidebar.php" method="post">
<ul class="heading">STATIC PAGE
<table>
<?php 
include('dbconnection.php');
$nice=mysql_query("select * from static");
while($way=mysql_fetch_array($nice))
{
?>
<tr>
<td><a href="page.php?id=<?php echo $way['static_id'];?>" style="font-family:Tahoma, Geneva, sans-serif;text-decoration:none;color:#0F0;" ><?php echo $way['page'];?></a></td>
</tr>
<?php 
}?>
</table>



</form>




<hr />

Gallery section
<table>
<tr>
<td class="text">
<a href="addgallery.php"><font color="#00FF00">Add Gallery</font></a></td></tr>
<tr>
<td class="text"><a href="managegallery.php"><font color="#00FF00">Manage Gallery</font></a></td>
</tr>
</table>

<hr />
Course Section
<table>
<tr>
<td class="text">
<a href="add_course.php"><font color="#00FF00">Add Course</font></a></td></tr>
<tr>
<td class="text"><a href="manage_course.php"><font color="#00FF00">Manage Course</font></a></td>
</tr>
</table>

<hr />
Affiliation
<table>
<tr>
<td class="text">
<a href="affiliation.php"><font color="#00FF00">Add Affiliation</font></a></td></tr>
<tr>
<td class="text"><a href="manage_affiliation.php"><font color="#00FF00">Manage Affiliation</font></a></td>
</tr>
</table>


</div>

