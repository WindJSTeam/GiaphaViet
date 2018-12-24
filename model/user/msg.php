<h1>Tin nhắn</h1>
<?php
	if(!isset($_SESSION["userType"])||$_SESSION["userType"]!=1)	die("<h2>Chức năng chỉ dành cho Quản trị viên!</h2>");
?>
<?php
	$db = new DB();
	$result = $db->Query("SELECT * FROM MESSAGES");
	while($row=mysql_fetch_assoc($result)){
		?>
		<div class="label"><label class="title"><b>Email: </b><?php echo m_unhtmlchars($row["MAIL"]) ?></label><label class="title"> <b>Người gửi:</b> <?php echo m_unhtmlchars($row["NAME"]) ?></label><label class="title"><b>Nội dung:</b><br/><?php echo m_unhtmlchars($row["CONTENT"]); ?></label><label class="datecreate"> - Ngày gửi: <?php echo $row["DATE"]; ?></label><a href="javascript:deleteValue({name:'msg',id:'<?php echo $row['ID']; ?>'})"><span style="position: absolute
			; top: 5px; right: 5px; background: #fff; padding: 5px; border-radius: 5px;">Xóa</span></a></div>
		<?php
	}
	$result = $db->Query("UPDATE MESSAGES SET VIEW=1");
?>