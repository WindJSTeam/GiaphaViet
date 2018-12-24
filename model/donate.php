<table id="donate-table" class="tablesorter">
	<thead>
	<tr>
		<th>STT</th>
		<th>Họ Tên</th>
		<th>Địa chỉ</th>
		<th>Điện thoại </th>
		<th>Số tiền</th>
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
		$stt =1;
		while($row=mysql_fetch_assoc($result)){
			echo "<tr>
				<td>".$stt++."</td>
				<td>".$row["NAME"]."</td>
				<td>".$row["ADDRESS"]."</td>
				<td>".$row["PHONE"]."</td>
				<td>".$row["VALUE"]."</td>";
			echo"</tr>";
		}
	}
?>
</table>