<?php
	session_start();
	if(!isset($_SESSION["userType"])||$_SESSION["userType"]!=1)	die("Hackingout...");
	include("../../config/config.php");
	$title = m_htmlchars($_POST["title"]);
	$content = m_htmlchars($_POST["content"]);
	$sql = "select * from PAGE where PAGE_NAME = '".$title."'";
	$db = new DB();
	$tmp = array();
	$result = $db->Query($sql);

	if(!$result){
		$tmp['status'] = false;
		$tmp['msg'] = 'Lỗi tìm trang';
	}
	else{
		if(mysql_num_rows($result)>0){
			$tmp['status'] = false;
			$tmp['msg'] = 'Trang đã tồn tại';
		}
		else{
			$sql = "insert into PAGE (PAGE_NAME,CONTENT) values ('".$title."','".$content."')";
			$result = $db->Query($sql);
			if(!$result){
				$tmp['status'] = false;
				$tmp['msg'] = 'Lỗi thêm trang';
			}
			else{
				$tmp['status'] = true;
				$tmp['msg'] = 'Thành công';
			}
		}
	}
	echo json_encode($tmp);
?>