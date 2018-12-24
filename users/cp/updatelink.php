<?php
	session_start();
	if(!isset($_SESSION["userType"])||$_SESSION["userType"]!=1)	die("Hackingout...");
	include("../../config/config.php");
	
	$id = $_POST['id'];
	$url = m_htmlchars($_POST['url']);
	$img = m_htmlchars($_POST['img']);
	$info = m_htmlchars($_POST['info']);
	
	$tmp = array();
	$db = new DB();
	$sql = "update LINK SET URL='".$url."', IMG='".$img."', INFO='".$info."' where LID = '".$id."'";
	
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