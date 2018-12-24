<?php
	session_start();
	if(!isset($_SESSION["userType"])||$_SESSION["userType"]!=1&&$_SESSION["userType"]!=3)	die("Hackingout...");
	include("../../config/config.php");
	$id = $_POST['id'];
	$name = m_htmlchars($_POST['name']);
	$birthday = $_POST['birthday'];
	$parent = $_POST['parent'];
	$sex = $_POST['sex'];
	$die = $_POST['die'];
	$address = m_htmlchars($_POST['address']);
	$phonenumber = $_POST['phonenumber'];
	$email = m_htmlchars($_POST['email']);
	$image = m_htmlchars($_POST['image']);
	
	$normal_name = m_htmlchars($_POST['normal_name']);
	$ex_name = m_htmlchars($_POST['ex_name']);
	$num_child = $_POST['num_child'];
	$nick_name = m_htmlchars($_POST['nick_name']);
	$year_old = $_POST['year_old'];
	$date_die = $_POST['date_die'];
	$plan_die = m_htmlchars($_POST['plan_die']);
	$about = m_htmlchars($_POST['about']);
	$mar_name = m_htmlchars($_POST['mar_name']);
	$mar_birth = $_POST['mar_birth'];
	$mar_die_info = $_POST['mar_die_info'];
	$mar_year_old = $_POST['mar_year_old'];
	$mar_date_die = $_POST['mar_date_die'];
	$mar_plan_die = m_htmlchars($_POST['mar_plan_die']);
	$mar_about = m_htmlchars($_POST['mar_about']);
	$db = new DB();
	
	if($sex==0){
		$result = $db->Query("SELECT * FROM INFO_PERSON WHERE FATHER_ID = ".$id." ");
		while($row = mysql_fetch_assoc($result)){
			deleteperson($row["ID"]);
		}
	}
	$sql = "SELECT GENERATION FROM INFO_PERSON WHERE ID=".$parent."";
	$result = $db->Query($sql);
	$row = mysql_fetch_assoc($result);
	$generation = $row['GENERATION']+1;
	
	$tmp = array();
	
	$sql = "UPDATE INFO_PERSON SET FATHER_ID = '".$parent."' , GENERATION='".$generation."', NAME='".$name."', BIRTHDAY='".$birthday."', SEX=".$sex.", DIE =".$die.", ADDRESS='".$address."', 
		PHONE = '".$phonenumber."', MAIL = '".$email."', IMAGE = '".$image."', normal_name = '".$normal_name."', ex_name = '".$ex_name."', num_child = '".$num_child."', nick_name = '".$nick_name."', year_old = '".$year_old."', date_die = '".$date_die."', plan_die = '".$plan_die."', about = '".$about."', mar_name = '".$mar_name."', mar_birth = '".$mar_birth."', mar_die = '".$mar_die_info."', mar_year_old = '".$mar_year_old."', mar_plan_die = '".$mar_plan_die."' , mar_about = '".$mar_about."', mar_date_die = '".$mar_date_die."' where ID = ".$id."";
	
	$result = $db->Query($sql);
	if(!$result){
		$tmp['status'] = false;
		$tmp['msg'] = "Error";
	}
	else{
			$tmp['status'] = true;
			$tmp['msg'] = "Thành công";
		}
	echo json_encode($tmp);
?>