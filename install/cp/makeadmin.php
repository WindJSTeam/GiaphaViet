<?php
	$server = $_POST["server"];
	$user = $_POST["user"];
	$pass = $_POST["pass"];
	$dbname = $_POST["dbname"];
	$adminpass = $_POST["adminpass"];
	$adminacc = $_POST["adminacc"];
	$admininfo = $_POST["admininfo"];
	$tmp = array();
	$tmp["type"] = 1;
	$sql = "insert into USER(GID,NAME,PASS,INFO) values(1,'".$adminacc."','".md5($adminpass)."','".$admininfo."')";
	mysql_connect($server,$user,$pass);
	mysql_select_db($dbname);
	mysql_query("SET NAMES utf8");
	$tmp["msg"] = "Khởi tạo tài khoản admin";
	if(mysql_query($sql)){
		$tmp["status"] = true;
	}
	else{
		$tmp["status"] = true;
	};
	echo json_encode($tmp);
?>