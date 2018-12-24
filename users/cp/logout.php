<?php
        ob_start();
	session_start();
        include("../../config/config.php");
	session_destroy();
	header("Location: ".$HOSTNAME."");
?>