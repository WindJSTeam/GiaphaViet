<?php
	include("../config/config.php");
	$id = $_REQUEST["id"];
	$sql = "select * from INFO_PERSON where ID='".$id."'";
	$db = new DB();
	$result = $db->Query($sql);
	$tmp = array();
	if(!$result){
		$tmp['status'] = false;
		$tmp['msg'] = "Có lỗi xảy ra";
	}
	else
	{
		if(mysql_num_rows($result)>0){
			$row = mysql_fetch_assoc($result);
			$tmp['status'] = true;
			$tmp['msg'] = 'Thành công';
			$tmp['data']['id'] = $row['ID'];
			$tmp['data']['name'] = $row['NAME'];
			$tmp['data']['fatherID'] = $row['FATHER_ID'];
			$tmp['data']['generation'] = $row['GENERATION'];
			$tmp['data']['birthday'] = $row['BIRTHDAY'];
			$tmp['data']['address'] = $row['ADDRESS'];
			$tmp['data']['phone'] = $row['PHONE'];
			$tmp['data']['mail'] = $row['MAIL'];
			$tmp['data']['die'] = $row['DIE'];
			$tmp['data']['sex'] = $row['SEX'];
			$tmp['data']['image'] = $row['IMAGE'];
			$tmp['data']['normal_name'] = $row['NORMAL_NAME'];
			$tmp['data']['ex_name'] = $row['EX_NAME'];
			$tmp['data']['num_child'] = $row['NUM_CHILD'];
			$tmp['data']['nick_name'] = $row['NICK_NAME'];
			$tmp['data']['year_old'] = $row['YEAR_OLD'];
			$tmp['data']['date_die'] = $row['DATE_DIE'];
			$tmp['data']['plan_die'] = $row['PLAN_DIE'];
			$tmp['data']['about'] = $row['ABOUT'];
			$tmp['data']['mar_name'] = $row['MAR_NAME'];
			$tmp['data']['mar_birth'] = $row['MAR_BIRTH'];
			$tmp['data']['mar_die_info'] = $row['MAR_DIE'];
			$tmp['data']['mar_year_old'] = $row['MAR_YEAR_OLD'];
			$tmp['data']['mar_date_die'] = $row['MAR_DATE_DIE'];
			$tmp['data']['mar_plan_die'] = $row['MAR_PLAN_DIE'];
			$tmp['data']['mar_about'] = $row['MAR_ABOUT'];
		}
		else{
			$tmp['status'] = false;
			$tmp['msg'] = 'ID không tồn tại';
		}
	}
	echo json_encode($tmp);
?>