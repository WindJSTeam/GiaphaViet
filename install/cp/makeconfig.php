<?php
	$file = fopen("../../config/config.ini","w");
	$URL_ARRAY = explode("/install/cp/makeconfig.php",$_SERVER['REQUEST_URI']);
	$url = "http://".$_SERVER["SERVER_NAME"].$URL_ARRAY[0];
	$URL_ARRAY = explode("/",$_SERVER['REQUEST_URI']);
	array_shift($URL_ARRAY);
	$arg_start = count($URL_ARRAY)-3;
	$server = $_POST["server"];
	$user = $_POST["user"];
	$pass = $_POST["pass"];
	$dbname = $_POST["dbname"];
	$str = $url.";".$arg_start.";".$server.";".$user.";".$pass.";".$dbname;
	fputs($file, $str, strlen($str));
	fclose($file);
	$tmp = array();
	$tmp["type"] = 1;
	$tmp['status'] = true;
	$tmp['msg'] = "Thành công";
	echo json_encode($tmp);
?>