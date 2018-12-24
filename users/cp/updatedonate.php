<?php
	session_start();
	if(!isset($_SESSION["userType"])||$_SESSION["userType"]!=1&&$_SESSION["userType"]!=3)	die("Hackingout...");
	include("../../config/config.php");
	$id = m_htmlchars($_POST['id']);
	$name = m_htmlchars($_POST['name']);
	$address = m_htmlchars($_POST['address']);
	$phone = $_POST['phone'];
	$value = $_POST['value'];
	
	$tmp = array();
	$db = new DB();
	$sql = "update DONATE SET NAME='".$name."', ADDRESS='".$address."', PHONE='".$phone."', VALUE='".$value."' where ID='".$id."'";
	
	$result = $db->Query($sql);
		if(!$result){
			$tmp['status'] = false;
			$tmp['msg'] = "Lỗi xảy ra";
		}
		else{
			$tmp['status'] = true;
			$tmp['msg'] = "Thành công";
		}
	
	echo json_encode($tmp);
?>