<?php
	$server = $_POST["server"];
	$user = $_POST["user"];
	$pass = $_POST["pass"];
	$dbname = $_POST["dbname"];
	$tmp = array();
	$tmp["type"] = 2;
	
	$tmp["cServer"] = array();
	$tmp["cServer"]["msg"] = "Kết nối hệ quản trị cơ sở dữ liệu";
	if(!mysql_connect($server,$user,$pass)){
		$tmp["cServer"]["status"] = false;
	}
	else{
		$tmp["cServer"]["status"] = true;
	}
	
	$tmp["cDBName"] = array();
	$tmp["cDBName"]["msg"] = "Kết nối tới database";
	if(!mysql_select_db($dbname)){
		$tmp["cDBName"]["status"] = false;
	}
	else{
		$tmp["cDBName"]["status"] = true;
	}
	mysql_close();
	echo json_encode($tmp);
?>