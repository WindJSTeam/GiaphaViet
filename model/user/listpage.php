<h1>Danh sách các trang đang sử dụng</h1>
<?php
	if(!isset($_SESSION["userType"])||$_SESSION["userType"]!=1)	die("<h2>Chức năng chỉ dành cho Quản trị viên!</h2>");
?>
<table id="listperson" class="tablesorter">
	<thead>
	<tr>
		<th>ID</th>
		<th>Tên trang</th>
		<th>Nội dung</th>
		<th>Quản lý</th>
	</tr>
	</thead>
<?php
	$db = new DB();
	$sql = "select * from PAGE";
	$result = $db->Query($sql);
	if(!$result){
		echo "<div id='result'>Có lỗi xảy ra</div>";
	}
	else{
		while($row=mysql_fetch_assoc($result)){
			echo "<tr>
				<td>".$row["ID"]."</td>
				<td>".$row["PAGE_NAME"]."</td>
				<td><a href='".constant("HOSTNAME")."/page/".idtourl($row["PAGE_NAME"],$row["ID"])."' target='_blank'>Xem trang</a></td>";
			echo"
				<td><a href='".constant("HOSTNAME")."/users/editpage/".idtourl($row["PAGE_NAME"],$row["ID"])."'>Sửa</a>";
				if($row["ID"]!=1){
					
					echo " - <a href='javascript:deleteValue({name:\"page\",id:".$row['ID']."})'>Xoá</a>";
				}
				
				echo"</td>
			</tr>";
		}
	}
?>
</table>