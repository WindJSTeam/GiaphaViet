<?php
	$url = $id;
	$id=urltoid($url);
	$db = new DB();
	$result = $db->Query("select * from TITLE where TID = '".$id."'");
	if(mysql_num_rows($result)==0){
		include("./model/error.php");
	}
	
	else {
		
		$row = mysql_fetch_assoc($result);
		if($url!=idtourl($row["TITLE"],$row["TID"])){
			include("./model/error.php");
		}
		else{
			
		
?>
<title><?php echo $row["TITLE"] ?></title>
<h5><?php echo $row["TITLE"] ?></h5>
<div style="margin: 20px;"><?php echo m_unhtmlchars($row["CONTENT"]) ?></div>
<div style="position: absolute; bottom: 20px; right: 20px;"><b>Ngày viết:</b> <i><?php echo $row["DATE_CREATE"] ?></i> - <b>Ngày sửa:</b> <i><?php echo $row["DATE_EDIT"] ?></i> - <b>Người viết:</b> <i><?php echo $row["ACTOR"] ?></i></div>
<?php
		}
	}
?>