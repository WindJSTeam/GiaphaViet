<?php
	session_start();
	include("../../config/config.php");
	
        if (strlen($_REQUEST["password"]) < 1){
            $tmp['status'] = false;
            $tmp['msg'] = "Nhập mật khẩu";
            echo json_encode($tmp);
        }
else{
$db = new DB();
	$sql = "SELECT * 
			FROM  `USER` 
			WHERE (
			`NAME` =  '". $_REQUEST["userName"] . "'
			AND  `PASS` =  '" . md5($_REQUEST["password"]) ."'
			)";
	
	
	$tmp = array();
	$result = $db->Query($sql);
	if(!$result){
		$tmp['status'] = false;
		$tmp['msg'] = "Có lỗi xảy ra";
	}
	else
	{
		$row = mysql_fetch_assoc($result);
		$_SESSION["userName"] = $row["NAME"];
		$_SESSION["userID"] = $row["UID"];
		$_SESSION["name"] = $row["INFO"];
		$_SESSION["userType"] = $row["GID"];
		if(!isset($_SESSION['userName'])){
			$tmp['status'] = false;
			$tmp['msg'] = "Sai tài khoản hoặc mật khẩu";
		}
		else{
			$tmp['status'] = true;
			$tmp['msg'] = $_SESSION['userName'];
		}
	}
	echo json_encode($tmp);
}
?>