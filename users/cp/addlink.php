<?php

	session_start();
	if(!isset($_SESSION["userType"])||$_SESSION["userType"]!=1)	die("Hackingout...");
	include("../../config/config.php");
	$url = m_htmlchars($_POST['url']);
	$img = m_htmlchars($_POST['img']);
	$info = m_htmlchars($_POST['info']);
	
	$tmp = array();
	$db = new DB();
	$sql = "insert into LINK (URL,IMG,INFO) values ('".$url."', '".$img."', '".$info."')";
	
	if($url==''||$img==''){
		$tmp['status'] = false;
		$tmp['msg'] = "Chưa nhập thông tin";
	}
	else{
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
	}
	echo json_encode($tmp);
?>