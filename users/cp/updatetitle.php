<?php
	session_start();
	if(!isset($_SESSION["userType"])||$_SESSION["userType"]!=1&&$_SESSION["userType"]!=2&&$_SESSION["userType"]!=3)	die("Hackingout...");
	include("../../config/config.php");
	$id = m_htmlchars($_POST['id']);
	$title = m_htmlchars($_POST['title']);
	$catalog = m_htmlchars($_POST['catalog']);
	$tag = m_htmlchars($_POST['tag']);
	$actor = m_htmlchars($_POST['actor']);
	$content = m_htmlchars($_POST['content']);
	
	$tmp = array();
	$db = new DB();
	$sql = "update TITLE SET TITLE='".$title."', FID='".$catalog."', DATE_EDIT='".date("Y-m-d")."', TAG='".$tag."', ACTOR='".$actor."', CONTENT='".$content."' where TID='".$id."'";
	
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