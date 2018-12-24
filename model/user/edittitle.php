<h1>Sửa bài viết</h1>
<?php
	$db = new DB();
	$sql = "select * from TITLE where TID = ".$id." and FID <> 3";
	$result = $db->Query($sql);
	if(!$result){
		echo "<div id='result'>Lỗi</div>";
	}
	else if(mysql_num_rows($result)==0){
		echo "<div id='result'>Không tìm thấy trang</div>";
	}
	else {
		$row = mysql_fetch_assoc($result);
				echo "
										<h2> Tiêu đề:</h2> <input id='title' type='text' value='".m_unhtmlchars($row['TITLE'])."' placeholder='Tiêu đề'/><br>
										<h2> Chuyên mục:</h2> <select id='catalog'>
											"; 
								$sql = "select * from CATALOG";
								$result = $db->Query($sql);
								while($option = mysql_fetch_assoc($result)){
									echo "<option value=".$option['FID']." ";
									
									if($row["FID"]==$option["FID"]){
										echo " selected ";
									}
									echo ">".$option['NAME']."</option>";
								}
								echo "</select><br>
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
										<h2>Tag:</h2><input id='tag' type='text' value='".m_unhtmlchars($row['TAG'])."' placeholder='Tag'/><br>
										<h2>Người viết:</h2> <input id='actor' type='text' value='".m_unhtmlchars($row['ACTOR'])."' placeholder='Người viết'/><br>
									<input type='button' class='sendTITLE' value='Xong' onClick='updateTitle(".$row["TID"].")'>
									<div id='result'></div>";
	}
?>