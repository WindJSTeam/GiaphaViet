<h1>Sửa tên website</h1>
<?php
	if(!isset($_SESSION["userType"])||$_SESSION["userType"]!=1)	die("<h2>Chức năng chỉ dành cho Quản trị viên!</h2>");
?>
<?php
	$db = new DB();
	$sql = "select * from SITE_INFO where id = 1";
	$result = $db->Query($sql);
	$row = mysql_fetch_assoc($result);
?>
<form action="javascript:updateSiteName()" style="margin: 20px auto;">
	<input type="text" id="namesite" placeholder="Tên Website" style="width: 500px;" value="<?php echo $row["INFO"]?>"/>
	<input type='submit' class='sendTITLE' style="margin-left: 50px;" value='Sửa' />	
</form>
<div id="result"></div>
