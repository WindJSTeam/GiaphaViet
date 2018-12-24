<h1>Sửa thông tin thành viên</h1>
<?php
	if(!isset($_SESSION["userType"])||$_SESSION["userType"]!=1&&$_SESSION["userType"]!=3)	die("<h2>Chức năng chỉ dành cho Trưởng họ!</h2>");
?>
<?php
	$url = $id;
	$id = urltoid($url);
	$db = new DB();
	$sql = "select * from INFO_PERSON where id = ".$id."";
	$result = $db->Query($sql);
	if(!$result){
		echo "<div id='result'>Lỗi</div>";
	}
	else if(mysql_num_rows($result)==0){
		echo "<div id='result'>Không tìm thấy thành viên</div>";
	}
	else{
		$user = mysql_fetch_assoc($result);
		if($url!=idtourl($user["NAME"],$user["ID"])){
					echo "<div id='result'>Không tìm thấy thành viên</div>";			
		}
		else{
		echo "
										<br>
										<form action='javascript:editperson(".$id.")'><table>
											<tr>
												<td><h2>Họ và tên: </h2></td>
												<td><input id='name' type='text' value='".m_unhtmlchars($user["NAME"])."' placeholder='Họ và tên'/></td>
											</tr>
											<tr>
												<td><h2>Tên thường: </h2></td>
												<td><input id='normal_name' value='".m_unhtmlchars($user["NORMAL_NAME"])."' type='text' placeholder='Tên thường'/></td>
											</tr>
											<tr>
												<td><h2>Tên tự: </h2></td>
												<td><input id='ex_name' type='text' value='".m_unhtmlchars($user["EX_NAME"])."' placeholder='Tên tự'/></td>
											</tr>
											<tr>
												<td><h2>Là con thứ: </h2></td>
												<td><input id='num_child' type='number' value='".$user["NUM_CHILD"]."' placeholder='Con thứ mấy trong gia đình'/></td>
											</tr>
											<tr>
												<td><h2>Ngày sinh: </h2></td>
												<td><input id='birthday'  value='".$user["BIRTHDAY"]."' type='text' placeholder='Ngày sinh'/></td>
											</tr>
											<tr>
												<td><h2>Thụy Hiệu: </h2></td>
												<td><input id='nick_name' type='text' value='".m_unhtmlchars($user["NICK_NAME"])."' placeholder='Thụy Hiệu'/></td>
											</tr>
											<tr>
												<td><h2>Link ảnh đại diện: </h2></td>
												<td><input id='image' type='text' value='".m_unhtmlchars($user["IMAGE"])."' placeholder='Đường dẫn ảnh'/></td>
											</tr>
											<tr>
												<td><h2>Họ tên cha: </h2></td>
												<td><select id='parent'>
											";
											$sql = "select ID, NAME, BIRTHDAY, GENERATION from INFO_PERSON where SEX=1 AND ID <> ".$id."";
											$result = $db->Query($sql);
											$generation = '';
											$birthday = '';
											while($row = mysql_fetch_assoc($result)){
												echo "<option value=".$row['ID']."";
												if($user["FATHER_ID"]==$row["ID"]){
													$generation = $row['GENERATION'];
													$birthday = $row['BIRTHDAY'];
													echo " selected ";
												}
												echo ">".$row['NAME']."</option>";
											}	
											echo "</select>
												<h6>Ngày sinh: </h6><h6 id='parentbirthday'>".$birthday."</h6><h6 style='margin-left: 5px;'> / Đời thứ:</h6><h6 style='margin-left: 5px;' id='generation'>".$generation."</h6></td>
											</tr>
											<tr>
												<td><h2>Giới tính: </h2></td>
												<td><select id='sex'>
												";
												if($user["SEX"]==1){
													echo "
														<option value='1'selected>Nam</option>
														<option value='0'>Nữ</option>
													";
												}
												else{
													echo "
														<option value='1'>Nam</option>
														<option value='0' selected >Nữ</option>
													";													
												}	
													
												echo "
												</select></td>
											</tr>
											<tr>
												<td><h2>Còn sống hay đã mất: </h2></td>
												<td><select id='die_info'>
													";
												if($user["DIE"]==1){
													echo "
														<option value='1'selected>Đã chết</option>
														<option value='0'>Còn Sống</option>
													";
												}
												else{
													echo "
														<option value='1'>Đã chết</option>
														<option value='0' selected>Còn Sống</option>
													";													
												}	
												echo "</select></td>
											</tr>
											<tr class='dieclass' style='display: none;'>
												<td><h2>Hưởng thọ: </h2></td>
												<td><input id='year_old' type='number' value='".$user["YEAR_OLD"]."' placeholder='Hưởng thọ'/></td>
											</tr>
											<tr class='dieclass' style='display: none;'>
												<td><h2>Ngày mất (Âm lịch): </h2></td>
												<td><input id='date_die' type='text'  value='".$user["DATE_DIE"]."' placeholder='Ngày mất'/></td>
											</tr>
											<tr class='dieclass' style='display: none;'>
												<td><h2>Nơi an táng: </h2></td>
												<td><input id='plan_die' type='text' value='".m_unhtmlchars($user["PLAN_DIE"])."' placeholder='Nơi an táng'/></td>
											</tr>
											<tr>
												<td><h2>Địa chỉ: </h2></td>
												<td><input type='text' value='".m_unhtmlchars($user["ADDRESS"])."'placeholder='Địa chỉ liên lạc' id='address'/></td>
											</tr>
											<tr>
												<td><h2>Số điện thoại: </h2></td>
												<td><input type='number' value='".$user["PHONE"]."'placeholder='Số điện thoại liên lạc' id='phonenumber'/></td>
											</tr>
											<tr>
												<td><h2>Email: </h2></td>
												<td><input type='email' value='".m_unhtmlchars($user["MAIL"])."' placeholder='root@hophungbattrang.com' id='email'/></td>
											</tr>
											<tr>
												<td><h2>Sự nghiệp, công đức, ghi chú: </h2></td>
												<td><input type='text' value='".m_unhtmlchars($user["ABOUT"])."' placeholder='Cuộc đời và sự nghiệp' id='about'/></td>
											</tr>
											<tr><td><br><h2>Liên quan (vợ/chồng) trong gia đình:</h2></td></tr>
											<tr>
												<td><h2>Họ và tên: </h2></td>
												<td><input type='text' placeholder='Họ tên' value='".m_unhtmlchars($user["MAR_NAME"])."' id='mar_name'/></td>
											</tr>
											<tr>
												<td><h2>Ngày sinh: </h2></td>
												<td><input type='text'  placeholder='Ngày sinh' value='".$user["MAR_BIRTH"]."' id='mar_birth'/></td>
											</tr>
											<tr>
												<td><h2>Còn sống hay đã mất: </h2></td>
												<td><select id='mar_die_info'>
													";
												if($user["MAR_DIE"]==1){
													echo "
														<option value='1'selected>Đã chết</option>
														<option value='0'>Còn Sống</option>
													";
												}
												else{
													echo "
														<option value='1'>Đã chết</option>
														<option value='0' selected>Còn Sống</option>
													";													
												}	
												echo "</select></td>
											</tr>
											<tr class='mardieclass' style='display: none;'>
												<td><h2>Hưởng thọ: </h2></td>
												<td><input id='mar_year_old' type='number' value='".$user["MAR_YEAR_OLD"]."' placeholder='Hưởng thọ'/></td>
											</tr>
											<tr class='mardieclass' style='display: none;'>
												<td><h2>Ngày mất (Âm lịch): </h2></td>
												<td><input id='mar_date_die' type='text'  value='".$user["MAR_DATE_DIE"]."' placeholder='Ngày mất'/></td>
											</tr>
											<tr class='mardieclass' style='display: none;'>
												<td><h2>Nơi an táng: </h2></td>
												<td><input id='mar_plan_die' type='text' value='".m_unhtmlchars($user["MAR_PLAN_DIE"])."' placeholder='Nơi an táng'/></td>
											</tr>
											<tr>
												<td><h2>Sự nghiệp, công đức, ghi chú: </h2></td>
												<td><input type='text' placeholder='Cuộc đời và sự nghiệp' value='".m_unhtmlchars($user["MAR_ABOUT"])."' id='mar_about'/></td>
											</tr>
										</table>
											<input class='sendTITLE' type='submit' value='Sửa'/>
										</form>
										<div id='result'></div>
								";
								}
	}
	

?>