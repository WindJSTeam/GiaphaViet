<?php
	if(!isset($_SESSION["userType"])||$_SESSION["userType"]!=1&&$_SESSION["userType"]!=3)	die("<h2>Chức năng chỉ dành cho Trưởng họ!</h2>");
?>
<?php
	$db = new DB();
	echo "<h1>Thêm thành viên dòng họ</h1>
										<br>
										<form action='javascript:addnewperson()'><table>
											<tr>
												<td><h2>Họ và tên: </h2></td>
												<td><input id='name' type='text' placeholder='Họ và tên'/></td>
											</tr>
											<tr>
												<td><h2>Tên thường: </h2></td>
												<td><input id='normal_name' type='text' placeholder='Tên thường'/></td>
											</tr>
											<tr>
												<td><h2>Tên tự: </h2></td>
												<td><input id='ex_name' type='text' placeholder='Tên tự'/></td>
											</tr>
											<tr>
												<td><h2>Là con thứ: </h2></td>
												<td><input id='num_child' type='number' placeholder='Con thứ mấy trong gia đình'/></td>
											</tr>
											<tr>
												<td><h2>Ngày sinh: </h2></td>
												<td><input id='birthday' type='text' placeholder='Ngày sinh'/></td>
											</tr>
											<tr>
												<td><h2>Thụy Hiệu: </h2></td>
												<td><input id='nick_name' type='text' placeholder='Thụy Hiệu'/></td>
											</tr>
											<tr>
												<td><h2>Link ảnh đại diện: </h2></td>
												<td><input id='image' type='text' placeholder='Đường dẫn ảnh'/></td>
											</tr>
											<tr>
												<td><h2>Họ tên cha/mẹ: </h2></td>
												<td><select id='parent'>
											";
											// $sql = "select ID, NAME, BIRTHDAY, GENERATION from INFO_PERSON where SEX=1";
											$sql = "select ID, NAME, BIRTHDAY, GENERATION from INFO_PERSON ORDER BY `GENERATION` ASC";
											$result = $db->Query($sql);
											$flag = false;
											$generation = '';
											$birthday = '';
											while($row = mysql_fetch_assoc($result)){
												if(!$flag){
													$generation = $row['GENERATION'];
													$birthday = $row['BIRTHDAY'];
													$flag = true;
												}
												echo "<option value=".$row['ID'].">".($row['NAME']=="root"?"Cụ tổ":$row['NAME'])."</option>";
											}	
											echo "</select>
												<h6>Ngày sinh: </h6><h6 id='parentbirthday'>".$birthday."</h6><h6 style='margin-left: 5px;'> / Đời thứ:</h6><h6 style='margin-left: 5px;' id='generation'>".$generation."</h6></td>
											</tr>
											<tr>
												<td><h2>Giới tính: </h2></td>
												<td><select id='sex'>
													<option value='1'>Nam</option>
													<option value='0'>Nữ</option>
												</select></td>
											</tr>
											<tr>
												<td><h2>Còn sống hay đã mất: </h2></td>
												<td><select id='die_info'>
													<option value='0'>Còn sống</option>
													<option value='1'>Đã mất</option>
												</select></td>
											</tr>
											<tr class='dieclass' style='display: none;'>
												<td><h2>Hưởng thọ: </h2></td>
												<td><input id='year_old' type='number' placeholder='Hưởng thọ'/></td>
											</tr>
											<tr class='dieclass' style='display: none;'>
												<td><h2>Ngày mất (Âm lịch): </h2></td>
												<td><input id='date_die' type='text'  placeholder='Ngày mất'/></td>
											</tr>
											<tr class='dieclass' style='display: none;'>
												<td><h2>Nơi an táng: </h2></td>
												<td><input id='plan_die' type='text' placeholder='Nơi an táng'/></td>
											</tr>
											<tr>
												<td><h2>Địa chỉ: </h2></td>
												<td><input type='text' placeholder='Địa chỉ liên lạc' id='address'/></td>
											</tr>
											<tr>
												<td><h2>Số điện thoại: </h2></td>
												<td><input type='number' placeholder='Số điện thoại liên lạc' id='phonenumber'/></td>
											</tr>
											<tr>
												<td><h2>Email: </h2></td>
												<td><input type='email' placeholder='hothan@thangiatrang.com' id='email'/></td>
											</tr>
											<tr>
												<td><h2>Sự nghiệp, công đức, ghi chú: </h2></td>
												<td><input type='text' placeholder='Cuộc đời và sự nghiệp' id='about'/></td>
											</tr>
											<tr><td><br><h2>Liên quan (vợ/chồng) trong gia đình:</h2></td></tr>
											<tr>
												<td><h2>Họ và tên: </h2></td>
												<td><input type='text' placeholder='Họ tên' id='mar_name'/></td>
											</tr>
											<tr>
												<td><h2>Ngày sinh: </h2></td>
												<td><input type='text'  placeholder='Ngày sinh' id='mar_birth'/></td>
											</tr>
											<tr>
												<td><h2>Còn sống hay đã mất: </h2></td>
												<td><select id='mar_die_info'>
													<option value='0'>Còn sống</option>
													<option value='1'>Đã mất</option>
												</select></td>
											</tr>
											<tr class='mardieclass' style='display: none;'>
												<td><h2>Hưởng thọ: </h2></td>
												<td><input id='mar_year_old' type='number' placeholder='Hưởng thọ'/></td>
											</tr>
											<tr class='mardieclass' style='display: none;'>
												<td><h2>Ngày mất (Âm lịch): </h2></td>
												<td><input id='mar_date_die' type='text'  placeholder='Ngày mất'/></td>
											</tr>
											<tr class='mardieclass' style='display: none;'>
												<td><h2>Nơi an táng: </h2></td>
												<td><input id='mar_plan_die' type='text' placeholder='Nơi an táng'/></td>
											</tr>
											<tr>
												<td><h2>Sự nghiệp, công đức, ghi chú: </h2></td>
												<td><input type='text' placeholder='Cuộc đời và sự nghiệp' id='mar_about'/></td>
											</tr>
										</table>
											<input class='sendTITLE' type='submit' value='Thêm'/>
										</form>
										<div id='result'></div>
								";

?>