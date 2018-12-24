<?php 
	ob_start();
	// Trong DATABASE Cần sửa
	// ID = 1 Trang giới thiệu
	// ID = 3 Trang cáo phó
	// ID = 1 cho person ROOT
	// ID = 2 Trang Tin tức
	// ID = 1 Trang Thông báo
	$file = fopen(dirname(__FILE__)."/config.ini", 'r');
	if(!$file){
		header("Location: ./install");
	}
	$result = explode(";",fgets($file));
	if(count($result)<6){
		die("Cấu hình sai");
	}
	$HOSTNAME = $result[0];
	$ARG_START = $result[1];
	
	$URL_ARRAY = explode("/",$_SERVER['REQUEST_URI']);
	array_shift($URL_ARRAY);
	define("HOSTNAME",$HOSTNAME);
	
	// Info server
	define('server',$result[2]);
	define('user',$result[3]);
	define('pass',$result[4]);
	define('dbname',$result[5]);
	//////////
	
	fclose($file);
	
	include (dirname(__FILE__)."/connectDB.php");
	include (dirname(__FILE__)."/functions.php");
	
	include (dirname(__FILE__)."/../control/cpanel.php");
	include (dirname(__FILE__)."/../control/home.php");
	
	$testDB =  new DBClass(constant('server'),constant('user'),constant('pass'),constant('dbname'));
	$testDB->Disconect();
	
	ob_flush();
?>