<h1>Danh sách thành viên trong dòng họ</h1>
<?php
	if(!isset($_SESSION["userType"])||$_SESSION["userType"]!=1&&$_SESSION["userType"]!=3)	die("<h2>Chức năng chỉ dành cho Trưởng họ!</h2>");
?>
<table id="listperson" class="tablesorter">
	<thead>
	<tr>
		<th>ID</th>
		<th>Họ Tên</th>
		<th>Đời thứ</th>
		<th>Ngày sinh</th>
		<th>Địa chỉ</th>
		<th>Điện thoại </th>
		<th>Email</th>
		<th>Giới tính</th>
		<th>Sống/chết</th>
		<th>Quản lý</th>
	</tr>
	</thead>
<?php
	$db = new DB();
	$sql = "select * from INFO_PERSON WHERE ID <> 1 ORDER BY `ID` ASC";
	$result = $db->Query($sql);
	if(!$result){
		echo "<div id='result'>Có lỗi xảy ra</div>";
	}
	else{
		while($row=mysql_fetch_assoc($result)){
			echo "<tr>
				<td>".$row["ID"]."</td>
				<td>".$row["NAME"]."</td>
				<td>".$row["GENERATION"]."</td>
				<td>".$row["BIRTHDAY"]."</td>
				<td>".$row["ADDRESS"]."</td>
				<td>".$row["PHONE"]."</td>
				<td>".$row["MAIL"]."</td>";
				if($row["SEX"]==1){
					echo "<td>Nam</td>";
				}
				else{
					echo "<td>Nữ</td>";
				}
				if($row["DIE"]==1){
					echo "<td>Chết</td>";
				}
				else{
					echo "<td>Sống</td>";
				}
			echo"
				<td><a href='".constant("HOSTNAME")."/users/editperson/".idtourl($row["NAME"],$row["ID"])."'>Sửa</a> - <a href='javascript:deleteperson(".$row["ID"].")'>Xóa</a></td>
			</tr>";
		}
	}
?>
</table>
