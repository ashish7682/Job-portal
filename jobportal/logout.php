<?php
session_start();
unset($_SESSION['name']);
session_destroy();
$_SESSION['EMAIL']="";
header('location:index.php');
?>
