<h1>Danh sách thành viên trong dòng họ</h1>
<table id="listperson" class="tablesorter">
	<thead>
	<tr>
		<th>STT</th>
		<th>Họ Tên</th>
		<th>Đời thứ</th>
		<th>Ngày sinh</th>
		<th>Địa chỉ</th>
		<th>Điện thoại </th>
		<th>Email</th>
		<th>Giới tính</th>
	</tr>
	</thead>
<?php
	$db = new DB();
	$sql = "select * from INFO_PERSON WHERE ID <> 1 and DIE <> 1 ORDER BY `ID` ASC";
	$result = $db->Query($sql);
	if(!$result){
		echo "<div id='result'>Có lỗi xảy ra</div>";
	}
	else{
		$stt = 1;
		while($row=mysql_fetch_assoc($result)){
			echo "<tr>
				<td>".$stt++."</td>
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
			echo"</tr>";
		}
	}
?>
</table>