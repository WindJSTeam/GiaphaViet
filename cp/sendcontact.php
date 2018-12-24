<?php
	include("../config/config.php");
	$name = m_htmlchars($_REQUEST["name"]);
	$mail = m_htmlchars($_REQUEST["mail"]);
	$content = m_htmlchars($_REQUEST["content"]);
	$date = date("Y-m-d");
	$sql = "insert into MESSAGES(NAME,MAIL,CONTENT,DATE) values('".$name."','".$mail."','".$content."','".$date."')";
	$db = new DB();
	$tmp = array();
	$result = false;
	
	if($name==""||$mail==""||$content==null){
		$tmp['status'] = false;
		$tmp['msg'] = 'Chưa nhập đầy đủ thông tin';
	}
	else{
		$result = $db->Query($sql);
		if(!$result){
			$tmp['status'] = false;
			$tmp['msg'] = 'Quá trình gửi thất bại';
		}
		else{
			$tmp['status'] = true;
			$tmp['msg'] = 'Thành công';
		}
	}
	echo json_encode($tmp);
?>