<h1>Sửa trang</h1>
<?php
	if(!isset($_SESSION["userType"])||$_SESSION["userType"]!=1)	die("<h2>Chức năng chỉ dành cho Quản trị viên!</h2>");
?>
<?php
	$url = $id;
	$id = urltoid($url);
	$db = new DB();
	$sql = "select * from PAGE where id = ".$id."";
	$result = $db->Query($sql);
	if(!$result){
		echo "<div id='result'>Lỗi</div>";
	}
	else if(mysql_num_rows($result)==0){
		echo "<div id='result'>Không tìm thấy trang</div>";
	}
	else {
		$row = mysql_fetch_assoc($result);
		if($url!=idtourl($row["PAGE_NAME"],$row["ID"])){
					echo "<div id='result'>Không tìm thấy trang</div>";			
		}
		else{
				echo "<h2> Tên trang:</h2> <input id='title'"; if($id==1) echo "readonly='true'"; echo" type='text' value='".m_unhtmlchars($row['PAGE_NAME'])."' placeholder='Tên trang'/><br>";
				echo "
										
										<h2>Nội dung: </h2>
										<textarea id='editorID' name='editorID'>".m_unhtmlchars($row['CONTENT'])."</textarea>
												<script>
														CKEDITOR.replace( 'editorID', {
																		fullPage: true,
																		allowedContent: true,
																		language: 'vi',
																		enterMode: CKEDITOR.ENTER_DIV,
																		
																		});
												</script>
										<input type='button' class='sendTITLE' value='Xong' onClick='updatePage(".$row["ID"].")'>
									<div id='result'></div>";
		}
	}
?>