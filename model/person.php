<title><?php echo $data->name; ?></title>
<?php
	echo "
		<h1>Thông tin thành viên dòng họ</h1>
		<table class='person-detail'>
							<tr>
								<td>
									<img src='".($image==''?'..\/images\/avatar.png':$image)."' />
								</td>
								<td>
									<table class='info_person'>
										<tr>
											<td>Thông tin về: </td>
											<td class='hview'>$data->name</td>
										</tr>
										<tr>
											<td>Tên thường: </td>
											<td class='hview'>$data->normal_name</td>
										</tr>
										<tr>
											<td>Tên tự: </td>
											<td class='hview'>$data->ex_name</td>
										</tr>
										<tr>
											<td>Là con thứ: </td>
											<td class='hview'>$data->num_child</td>
										</tr>
										<tr>
											<td>Tên hiệu: </td>
											<td class='hview'>$data->nick_name</td>
										</tr>
										<tr>
											<td>Đời thứ: </td>
											<td class='hview'>$data->generation</td>
										</tr>
										<tr>
											<td>Ngày sinh: </td>
											<td class='hview'>$data->birthday</td>
										</tr>
										<tr>
											<td>Địa chỉ: </td>
											<td class='hview'>$data->address</td>
										</tr>
										<tr>
											<td>Số điện thoại: </td>
											<td class='hview'>$data->phone</td>
										</tr>
										<tr>
											<td>Email: </td>
											<td class='hview'>$data->mail</td>
										</tr>
										<tr>
											<td>Giới tính: </td>
											<td class='hview'>$sex</td>
										</tr>
										<tr>
											<td>Tình trạng: </td>
											<td class='hview'>$die</td>
										</tr>
										<tr>
											<td>Hưởng thọ: </td>
											<td class='hview'>$data->year_old</td>
										</tr>
										<tr>
											<td>Ngày mất: </td>
											<td class='hview'>$data->date_die</td>
										</tr>
										<tr>
											<td>Nơi an táng: </td>
											<td class='hview'>$data->plan_die</td>
										</tr>
										<tr>
											<td>Sự nghiệp, công đức: </td>
											<td class='hview'>$data->nick_name</td>
										</tr>
										<tr>
											<td>Là con của: </td>
											<td class='hview'> <a href='".constant("HOSTNAME")."/person/".idtourl($fathername,$data->fatherID)."'>$fathername</a> </td>
										</tr>
										<tr><td><b>Quan hệ (vợ/chồng)</b></td></tr>
										<tr>
											<td>Họ tên: </td>
											<td class='hview'>$data->mar_name</td>
										</tr>
										<tr>
											<td>Ngày sinh: </td>
											<td class='hview'>$data->mar_birth</td>
										</tr>
										<tr>
											<td>Tình trạng: </td>
											<td class='hview'>$mar_die</td>
										</tr>
										<tr>
											<td>Hưởng thọ: </td>
											<td class='hview'>$data->mar_year_old</td>
										</tr>
										<tr>
											<td>Ngày mất: </td>
											<td class='hview'>$data->mar_date_die</td>
										</tr>
										<tr>
											<td>Mơi an táng: </td>
											<td class='hview'>$data->mar_plan_die</td>
										</tr>
										<tr>
											<td>Sự nghiệp, công đức: </td>
											<td class='hview'>$data->mar_about</td>
										</tr>
										<tr>
											<td><b>Anh em</b></td>
											<td>
											";
											$db = new DB();
											$result = $db->Query("SELECT * FROM INFO_PERSON WHERE FATHER_ID = ".$data->fatherID." AND ID<>".$pid."");
											while($row = mysql_fetch_assoc($result)){
												echo "<a href='".constant("HOSTNAME")."/person/".locdau($row["NAME"])."-".$row["ID"].".html'>".$row["NAME"]."</a><br>";
											}
											echo "</td>
										</tr>
										<tr>
											<td><b>Con cái</b></td>
											<td>
											";
											$db = new DB();
											$result = $db->Query("SELECT * FROM INFO_PERSON WHERE FATHER_ID = ".$pid."");
											while($row = mysql_fetch_assoc($result)){
												echo "<a href='".constant("HOSTNAME")."/person/".locdau($row["NAME"])."-".$row["ID"].".html'>".$row["NAME"]."</a><br>";
											}
											echo "</td>
										</tr>
									</table>
								</td>
							</tr>							
						</table>	
	";

?>