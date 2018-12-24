<h1>Liên hệ</h1>
<br>
<?php
	$db = new DB();
	$sql = "select * from CONTACT WHERE ID = 1 ";
	$result = $db->Query($sql);
	$row=mysql_fetch_assoc($result);
	echo m_unhtmlchars($row["CONTENT"]);
?>
<h3>Đóng góp ý kiến:</h2>
<form action="javascript:sendcontact()">
	<table>
		<tr>
			<td>Họ tên:</td>
			<td><input type="text" id="name"/></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><input type="email" id="mail"/></td>
		</tr>
		<tr>
			<td>Nội dung:</td>
			<td><textarea id="contentsend" style="margin: 10px; width: 550px; height: 200px; border-radius: 10px; box-shadow: inset 1px 1px 2px #555; border: 0px; padding: 10px;"></textarea></td>
		</tr>
			<td></td>
			<td><input type="submit" value="Gửi ý kiến" style="border:0px; box-shadow: 1px 1px 2px #555;"/></td>
		</tr>
	</table>
</form>
<div id="resultsend" style="text-align: center;  0px auto; color: red"></div>