<h1>Những thành viên đóng góp</h1>
<?php
	if(!isset($_SESSION["userType"])||$_SESSION["userType"]!=1&&$_SESSION["userType"]!=3)	die("<h2>Chức năng chỉ dành cho Trưởng họ!</h2>");
?>
<table id="donate-table" class="tablesorter">
	<thead>
	<tr>
		<th>ID</th>
		<th>Họ Tên</th>
		<th>Địa chỉ</th>
		<th>Điện thoại </th>
		<th>Số tiền (VNĐ)</th>
		<th>Quản lý</th>
	</tr>
	</thead>
<?php
	$db = new DB();
	$sql = "select * from DONATE";
	$result = $db->Query($sql);
	if(!$result){
		echo "<div id='result'>Có lỗi xảy ra</div>";
	}
	else{
		while($row=mysql_fetch_assoc($result)){
			echo "<tr>
				<td>".$row["ID"]."</td>
				<td contenteditable='true'>".$row["NAME"]."</td>
				<td contenteditable='true'>".$row["ADDRESS"]."</td>
				<td contenteditable='true'>".$row["PHONE"]."</td>
				<td contenteditable='true'>".$row["VALUE"]."</td>";
			echo"
				<td><a href='javascript:deleteValue({name:\"donate\",id:".$row['ID']."})'>Xoá</a></td>
			</tr>";
		}
	}
?>
</table>
<a href="javascript:showAddDonate()"><input class='sendTITLE' style="width: 150px; margin-left: 20px;" type='button' value='Thêm đóng góp'/></a>
<input class='sendTITLE' type='button' value='Cập nhật thay đổi' style="width: 150px; margin-left: 20px;" onclick="editDonate();"/>
<div id="result"></div>
<div id="adddonate" style="display: none;">
	<div style="margin: 20px auto; width: 95%; background: rgba(255,255,255,0.5); padding: 10px; text-align: center; border-radius: 10px;">
	<input id="addname" type="text" style="width: 25%; margin:5px;" placeholder="Họ tên"/>
	<input id="addaddress" type="text" style="width: 25%; margin:5px;"  placeholder="Địa chỉ"/>
	<input id="addphone" type="number"  style="width: 20%; margin:5px;"  placeholder="Điện thoại"/>
	<input id="addvalue" type="number"  style="width: 20%; margin:5px;"  placeholder="Số tiền VNĐ"/>
	</div>
	<input class='sendTITLE' type='button' value='Thêm' onclick="addDonate();"/>
</div>