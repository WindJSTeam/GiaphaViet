<?php
	if(!isset($_SESSION["userType"])||$_SESSION["userType"]!=1)	die("<h2>Chức năng chỉ dành cho Quản trị viên!</h2>");
?>
<table id="link-table" class="tablesorter">
	<thead>
	<tr>
		<th>ID</th>
		<th>Thông tin</th>
		<th>Liên kết</th>
		<th>Quản lý</th>
	</tr>
	</thead>
<?php
	$db = new DB();
	$sql = "select * from SLIDE";
	$result = $db->Query($sql);
	if(!$result){
		echo "<div id='result'>Có lỗi xảy ra</div>";
	}
	else{
		while($row=mysql_fetch_assoc($result)){
			echo "<tr>
				<td>".$row["ID"]."</td>
				<td>".$row["INFO"]."</td>
				<td>".$row["URL"]."</td>";
				
			echo"
				<td><a href='javascript:deleteValue({name:\"slide\",id:".$row['ID']."})'>Xoá</a></td>
			</tr>";
		}
	}
?>
</table>
<br>
<h2>Thêm ảnh: </h2><br>
<input id="link" placeholder="Link ảnh" type="text">
<input id="info" placeholder="Thông tin" style="width:200px" type="text">
<input type="button" onclick="addlinkimage()" style="width:120px" value="Thêm">
<div id="result"></div>