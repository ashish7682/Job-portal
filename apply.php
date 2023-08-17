<?php
session_start();
//var_dump($_SESSION);
//var_dump(!isset($_SESSION['user'])); die;
if (!isset($_SESSION['user'])) {
	header("Location: ./login.php");
}
require './src/Database.php';

$db = Database::getInstance();
if (isset($_GET['apply']) && isset($_SESSION['user']) ) {
	$jobId = $_GET['apply'];
	$user = $_SESSION['user'];
	$sql = "INSERT INTO applied_jobs (job_id, candidate_id) VALUES ('$jobId','$user->id')";
	$db->query($sql);
	$_SESSION['msg'] = "Your application is submitted, Thank you";
	header("Location: ./job-detail.php?id=" . $jobId);
}
