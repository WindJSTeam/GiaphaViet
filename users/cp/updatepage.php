<?php
	session_start();
	if(!isset($_SESSION["userType"])||$_SESSION["userType"]!=1)	die("Hackingout...");
	
	include("../../config/config.php");
	$id = m_htmlchars($_POST['id']);
	$title = m_htmlchars($_POST['title']);
	$content = m_htmlchars($_POST['content']);
	
	$tmp = array();
	$db = new DB();
	$sql = "update PAGE SET PAGE_NAME='".$title."', CONTENT='".$content."' where ID='".$id."'";
	
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