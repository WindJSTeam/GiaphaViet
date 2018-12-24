<h1>Thông tin liên hệ</h1>
<?php
	if(!isset($_SESSION["userType"])||$_SESSION["userType"]!=1)	die("<h2>Chức năng chỉ dành cho Quản trị viên!</h2>");
?>
<?php
	$db = new DB();
	$sql = "select * from CONTACT where id = 1";
	$result = $db->Query($sql);
	$row = mysql_fetch_assoc($result);
?>
<textarea id='editorID' name='editorID'><?php echo m_unhtmlchars($row['CONTENT']); ?></textarea>
												<script>
														CKEDITOR.replace( 'editorID', {
																		fullPage: true,
																		allowedContent: true,
																		language: 'vi',
																		enterMode: CKEDITOR.ENTER_DIV,								
																		});
												</script>
<input type='button' class='sendTITLE' value='Sửa' onClick='updateContact()'>
<div id="result"></div>
