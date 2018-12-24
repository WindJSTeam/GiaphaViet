<?php
	session_start();
	if(!isset($_SESSION["userType"])||$_SESSION["userType"]!=1)	die("Hackingout...");
	include("../../config/config.php");
	$id = $_POST['id'];
	
	$tmp = array();
	
	$tmp["status"] = deleteperson($id);
	echo json_encode($tmp);
?>