<?php
session_start();
$email=$_SESSION['USER_ID'];
$a="";
$a=$_GET['x'];
include("dbconnection.php");
$query="delete from cart where ser_name='$a' and email='$email' ";
$res=mysql_query($query);
header("location:data1.php");
?>