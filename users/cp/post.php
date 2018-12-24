<?php
	session_start();
	if((!isset($_SESSION["userType"]))||($_SESSION["userType"]!=1&&$_SESSION["userType"]!=2&&$_SESSION["userType"]!=3))	die("Hackingout...");
	
	include("../../config/config.php");
	
	$plan_die = m_htmlchars($_POST["plan_die"]);
	$year_old = $_POST["year_old"];
	$date_die = $_POST["date_die"];
	$sql = "insert into TITLE (FID,TITLE,DATE_CREATE,DATE_EDIT,TAG,CONTENT,ACTOR)
		values ('".$_POST['catalog']."','".m_htmlchars($_POST['title'])."','".date("Y-m-d")."','".date("Y-m-d")."','".m_htmlchars($_POST['tag'])."','".m_htmlchars($_POST['content'])."','".m_htmlchars($_POST['actor'])."')";
	$db = new DB();
	$tmp = array();
	if($_POST['catalog']==3){
		if($_POST['die']==null){
			$tmp['status'] = false;
			$tmp['msg'] = "Chưa lựa chọn người được cáo phó";
		}
		else{
			if($db->Query("update INFO_PERSON
										set DIE=1, year_old='".$year_old."', date_die='".$date_die."', plan_die='".$plan_die."'
										where ID=".$_POST['die'].""
						)){
							$result = $db->Query($sql);
							if(!$result){
								$tmp['status'] = fasle;
								$tmp['msg'] = "Có lỗi xảy ra khi post bài viết";
							}
							else{
								$tmp['status'] = true;
								$tmp['msg'] = "Thành công";
							}
						}
			else{
				$tmp['status'] = fasle;
				$tmp['msg'] = "Có lỗi xảy ra";
			}
		}
	}
	else
	{
		$result = $db->Query($sql);
		if(!$result){
			$tmp['status'] = fasle;
			$tmp['msg'] = "Có lỗi xảy ra";
		}
		else{
			$tmp['status'] = true;
			$tmp['msg'] = "Thành công";
		}
	}
	echo json_encode($tmp);
?>