<?php
	session_start();
	if(!isset($_SESSION["userType"])||$_SESSION["userType"]!=1&&$_SESSION["userType"]!=3)	die("Hackingout...");
	include("../../config/config.php");
	$name = m_htmlchars($_POST['name']);
	$address = m_htmlchars($_POST['address']);
	$phone = m_htmlchars($_POST['phone']);
	$value = m_htmlchars($_POST['value']);
	
	$tmp = array();
	$db = new DB();
	$sql = "insert into DONATE (NAME,ADDRESS,PHONE,VALUE) values ('".$name."', '".$address."', '".$phone."','".$value."')";
	
	
	if($name==''||$value==''){
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