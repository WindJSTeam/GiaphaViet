<h1>Danh sách bài viết</h1>
<table id="listperson" class="tablesorter">
	<thead>
	<tr>
		<th>ID</th>
		<th>Chuyên mục</th>
		<th>Tiêu đề</th>
		<th>Ngày tạo</th>
		<th>Ngày sửa</th>
		<th>Nội dung</th>
		<th>Người viết</th>
		<th>Quản lý</th>
	</tr>
	</thead>
<?php
	$db = new DB();
	$sql = "select * from TITLE";
	$result = $db->Query($sql);
	if(!$result){
		echo "<div id='result'>Có lỗi xảy ra</div>";
	}
	else{
		while($row=mysql_fetch_assoc($result)){
			$catalog = mysql_fetch_assoc($db->Query("select NAME from CATALOG where FID = ".$row["FID"].""));
			echo "<tr>
				<td>".$row["TID"]."</td>
				<td>".$catalog["NAME"]."</td>
				<td>".$row["TITLE"]."</td>
				<td>".$row["DATE_CREATE"]."</td>
				<td>".$row["DATE_EDIT"]."</td>
				<td><a href='".constant("HOSTNAME")."/thread/".$row["TID"]."' target='_blank'>Xem trang</a></td>
				<td>".$row["ACTOR"]."</td>";
			echo"
				<td>";
				if($row["FID"]!=3){
					echo "<a href='".constant("HOSTNAME")."/users/edittitle/".$row["TID"]."'>Sửa</a> - ";
				}
				echo "<a href='javascript:deleteValue({name:\"title\",id:".$row['TID']."})'>Xoá</a></td>
			</tr>";
		}
	}
?>
</table>

