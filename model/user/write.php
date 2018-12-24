<?php
	$db = new DB();
	echo "	<h1>Viết bài mới</h1>
										<h2> Tiêu đề:</h2> <input id='title' type='text' placeholder='Tiêu đề'/><br>
										<h2> Chuyên mục:</h2> <select id='catalog'>
											"; 
								$sql = "select * from CATALOG";
								$result = $db->Query($sql);
								while($row = mysql_fetch_assoc($result)){
									echo "<option value=".$row['FID'].">".$row['NAME']."</option>";
								}
								echo "	</select><br>
										<div id='die' style='height: 180px;' class='hide'>
											<h2> Người được cáo phó: </h2>
											<select id='die_info'>";
								$sql = "SELECT ID, NAME, BIRTHDAY FROM INFO_PERSON where DIE=0";
								
								$result = $db->Query($sql);
								$flag = false;
								$birthday = '';
								while($row = mysql_fetch_assoc($result)){
									if(!$flag){
										$birthday = $row['BIRTHDAY'];
										$flag = true;
									}
									echo "<option value=".$row['ID'].">".$row['NAME']."</option>";
								}	
								echo "</select>
											<h2> Sinh ngày: </h2>
											<h2 id='birthday'>".$birthday."</h2>
										<table style='margin-left: 20px;'>
												<tr>
													<td><h2>Hưởng thọ: </h2></td>
													<td><input id='year_old' type='number' placeholder='Hưởng thọ'/></td>
												</tr>
												<tr>
													<td><h2>Ngày mất (Âm lịch): </h2></td>
													<td><input id='date_die' type='text' class='date' placeholder='Ngày mất'/></td>
												</tr>
												<tr>
													<td><h2>Nơi an táng: </h2></td>
													<td><input id='plan_die' type='text' placeholder='Nơi an táng'/></td>
												</tr>
											</table>
										</div>
										<h2>Nội dung: </h2>
										<textarea id='editorID' name='editorID'></textarea>
												<script>
														CKEDITOR.replace( 'editorID', {
																		fullPage: true,
																		allowedContent: true,
																		language: 'vi',
																		enterMode: CKEDITOR.ENTER_DIV,
																		
																		});
												</script>
										<h2>Tag:</h2><input id='tag' type='text' placeholder='Tag'/><br>
										<h2>Người viết:</h2> <input id='actor' type='text' placeholder='Người viết'/><br>
									<input type='button' class='sendTITLE' value='Xong' onClick='sendTitle()'>
									<div id='result'></div>";
?>