<?php
	$file = fopen("../.htaccess","w");
	$str = "RewriteEngine on\nRewriteRule .* ../mintaframework.php [L]";
	fputs($file, $str, strlen($str));
	fclose($file);
	$tmp = array();
	$tmp["type"] = 1;
	$tmp['status'] = true;
	$tmp['msg'] = "Thành công";
	echo json_encode($tmp);
?>