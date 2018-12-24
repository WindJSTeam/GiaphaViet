<h1>Danh sách liên kết</h1>
<?php
	if(!isset($_SESSION["userType"])||$_SESSION["userType"]!=1)	die("<h2>Chức năng chỉ dành cho Quản trị viên!</h2>");
?>
<table id="link-table" class="tablesorter">
	<thead>
	<tr>
		<th>ID</th>
		<th>Thông tin</th>
		<th>Liên kết</th>
		<th>Đường dẫn ảnh</th>
		<th>Quản lý</th>
	</tr>
	</thead>
<?php
	$db = new DB();
	$sql = "select * from LINK";
	$result = $db->Query($sql);
	if(!$result){
		echo "<div id='result'>Có lỗi xảy ra</div>";
	}
	else{
		while($row=mysql_fetch_assoc($result)){
			echo "<tr>
				<td>".$row["LID"]."</td>
				<td contenteditable='true'>".$row["INFO"]."</td>
				<td contenteditable='true'>".$row["URL"]."</td>
				<td contenteditable='true'>".$row["IMG"]."</td>";
			echo"
				<td><a href='javascript:deleteValue({name:\"link\",id:".$row['LID']."})'>Xoá</a></td>
			</tr>";
		}
	}
?>
</table>
<a href="javascript:showAddDonate()"><input class='sendTITLE' style="width: 150px; margin-left: 20px;" type='button' value='Thêm liên kết'/></a>
<input class='sendTITLE' type='button' value='Cập nhật thay đổi' style="width: 150px; margin-left: 20px;" onclick="editLink();"/>
<div id="result"></div>
<div id="adddonate" style="display: none;">
	<div style="margin: 20px auto; width: 95%; background: rgba(255,255,255,0.5); padding: 10px; text-align: center; border-radius: 10px;">
	<input id="urllink" type="text" style="width: 30%; margin:5px;"  placeholder="Liên kết"/>
	<input id="imglink" type="text"  style="width: 30%; margin:5px;"  placeholder="Đường dẫn ảnh"/>
	<input id="infolink" type="text"  style="width: 20%; margin:5px;"  placeholder="Thông tin"/>
	</div>
	<input class='sendTITLE' type='button' value='Thêm' onclick="addLink();"/>
</div>