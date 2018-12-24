<?php
	session_start();
	if(!isset($_SESSION["userType"])||$_SESSION["userType"]!=1&&$_SESSION["userType"]!=3)	die("Hackingout...");
	include("../../config/config.php");
	$name = m_htmlchars($_POST['name']);
	$birthday = $_POST['birthday'];
	$parent = $_POST['parent'];
	$sex = $_POST['sex'];
	$die = $_POST['die'];
	$address = m_htmlchars($_POST['address']);
	$phone = $_POST['phonenumber'];
	$mail = m_htmlchars($_POST['email']);
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
	
	$tmp = array();
	$db = new DB();
	$sql = "SELECT FATHER_ID,NAME,BIRTHDAY from INFO_PERSON where (FATHER_ID ='".$parent."' and BIRTHDAY='".$birthday."' and NAME ='".$name."')";
	
	$result = $db->Query($sql);
	if(!$result){
		$tmp['status'] = false;
		$tmp['msg'] = "Error";
	}
	else if(mysql_num_rows($result)>0){
		$tmp['status'] = false;
		$tmp['msg'] = "Đã tồn tại thành viên trong danh sách";
	}
	else{
		$sql = "SELECT GENERATION FROM INFO_PERSON WHERE ID=".$parent."";
		$result = $db->Query($sql);
		$row = mysql_fetch_assoc($result);
		$generation = $row['GENERATION'];
		$sql = "INSERT INTO INFO_PERSON (FATHER_ID,GENERATION,NAME,BIRTHDAY,ADDRESS,PHONE,MAIL,DIE,SEX,IMAGE,normal_name,ex_name,num_child,nick_name,year_old,date_die,plan_die,about,mar_name,mar_birth,mar_die,mar_date_die,mar_year_old,mar_plan_die,mar_about)
		 values ('".$parent."','".($generation+1)."','".$name."','".$birthday."','".$address."','".$phone."','".$mail."','".$die."','".$sex."','".$image."','".$normal_name."','".$ex_name."','".$num_child."','".$nick_name."','".$year_old."','".$date_die."','".$plan_die."','".$about."','".$mar_name."','".$mar_birth."','".$mar_die_info."','".$mar_date_die."','".$mar_year_old."','".$mar_plan_die."','".$mar_about."')";
		$result = $db->Query($sql);
		if(!$result){
			$tmp['status'] = false;
			$tmp['msg'] = "Lỗi xảy ra";
		}
		else{
			$tmp['status'] = true;
			$tmp['msg'] = "Thành công";
		}
	}
	echo json_encode($tmp);
?>