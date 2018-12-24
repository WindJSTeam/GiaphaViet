<?php
	session_start();
	if(!isset($_SESSION["userType"]))	die("Hackingout...");
	include("../../config/config.php");
	
	$oldPass = $_POST["passold"];
	$newPass = $_POST["pass"];
	$confirmNewPass = $_POST["confirmpass"];
	$sql = "select * from USER where name='" . $_SESSION["userName"] . "' and pass='" . md5($oldPass) . "'";
	$db = new DB();
	$result = $db->Query($sql);
	$tmp = array();
	if(!$result){
		$tmp['status'] = false;
		$tmp['msg'] = "Có lỗi xảy ra";
	}
	else
	{
		if(mysql_num_rows($result)>0){
			$sql = "update USER set pass = '" . md5($newPass) . "' where name ='" . $_SESSION["userName"] . "'";
			$db->Query($sql);
			$tmp['status'] = true;
			$tmp['msg'] = $_SESSION["userName"];
		}
		else{
			$tmp['status'] = false;
			$tmp['msg'] = 'Sai mật khẩu';
		}
	}
	echo json_encode($tmp);
?>