<?php
	$server = $_POST["server"];
	$user = $_POST["user"];
	$pass = $_POST["pass"];
	$dbname = $_POST["dbname"];
	$sitename = $_POST["sitename"];
	$tmp = array();
	$tmp["type"] = 1;
	$sql = "INSERT INTO `SITE_INFO` (`NAME`, `INFO`) VALUES
			('Site Name', '".$sitename."');";
	mysql_connect($server,$user,$pass);
	mysql_select_db($dbname);
	mysql_query("SET NAMES utf8");
	
	$tmp["msg"] = "Khởi tạo Site name";
	if(mysql_query($sql)){
		$tmp["status"] = true;
	}
	else{
		$tmp["status"] = false;
	};
	echo json_encode($tmp);
?>