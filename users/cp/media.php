<?php
	session_start();
	if((!isset($_SESSION["userType"]))||($_SESSION["userType"]!=1&&$_SESSION["userType"]!=2&&$_SESSION["userType"]!=3))	die("Hackingout...");
	
	include("../../config/config.php");

	$db = new DB();
	if($_POST){
		$db = new DB();
		$fresult = array();
		if(isset($_POST['control'])){
			if($_POST['control']=='new'){
				if(isset($_POST['type'])){
					$sql = "select GMID from MEDIA_GROUP where NAME='".$_POST['type']."'";
					$tmp = mysql_fetch_assoc($db->Query($sql));
					$GMID = $tmp['GMID'];
					$TITLE = m_htmlchars($_POST["title"]);
					$LINK = m_htmlchars($_POST["link"]);
					$AID = $_POST["aid"];
					$sql = "insert into MEDIA (GMID,TITLE,LINK,AID) values ('".$GMID."','".$TITLE."','".$LINK."','".$AID."')";
					if($GMID&&$LINK&&$AID){
						$result = $db->Query($sql);
						if(!$result){
							$fresult['status'] = false;
							$fresult['msg'] = "Error occurred, insert database failed !";
						}
						else{
							$fresult['status'] = true;
							$fresult['msg'] = "Thành công";
						}
					} else {
						$fresult["status"] = false;
						$fresult["msg"] = "Missing parameter";
						$fresult["debug"] = array(
							"GMID" => $GMID,
							"LINK" => $LINK,
							"AID" => $AID,
						);
					}
				} else {
					$fresult = array(
						'status' => false,
						'msg' => 'Missing parameter',
						'debug' => 'type(required)',
					);
				}
			} else if($_REQUEST['control']=='update'){
				$id = $_REQUEST["id"];
				$title = $_REQUEST["title"];
				if($id){
					$sql = "update MEDIA set TITLE='".$title."' where MID='".$id."'";
					$result = $db->Query($sql);
					$fresult = array(
						"status" => true,
						"msg" => "Thành công",
						"data" => $result,
					);
				} else {
					$fresult = array(
						"status" => false,
						"msg" => "Missing parameter",
						"debug" => "id(required):".$id.",title: ".$title,
					);
				}
			} else if($_REQUEST['control']=='delete'){
				$id = $_REQUEST['id'];
				if($id){
					$sql = "delete from MEDIA where MID='".$id."'";
					$result = $db->Query($sql);
					$fresult = array(
						"status" => true,
						"msg" => "Thành công",
						"data" => $result,
					);
				} else {
					$fresult = array(
						"status" => false,
						"msg" => "Missing parameter",
						"debug" => "id:".$id,
					);
				}
			} else {
				$fresult = array(
							'status' => false,
							'msg' => 'control not support',
							'debug' => 'control:'.$_REQUEST['control'],
						);
			}
			echo json_encode($fresult);
		} else {
			$fresult = array(
						'status' => false,
						'msg' => 'Missing parameter',
						'debug' => 'control(required)',
					);
		}
	}
?>