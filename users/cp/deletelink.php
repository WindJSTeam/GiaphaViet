<?php
	session_start();
	if(!isset($_SESSION["userType"])||$_SESSION["userType"]!=1)	die("Hackingout...");
	include("../../config/config.php");
	$id = $_POST['id'];
	
	$tmp = array();
	$db = new DB();
	$sql = "DELETE FROM LINK WHERE LID = ".$id."";
	$result = $db->Query($sql);
		if(!$result){
		$tmp['status'] = false;
		$tmp['msg'] = "Error";
		}
		else{
			if(!$result){
				$tmp['status'] = false;
				$tmp['msg'] = "Lỗi xảy ra";
			}
			else{
				$tmp['status'] = true;
				$tmp['msg'] = "Thành công";
			}
		}
	echo json_encode($tmp);
?>