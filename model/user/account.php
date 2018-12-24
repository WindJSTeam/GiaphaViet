<?php
echo '
									<h1>Thông tin tài khoản</h1>
									<div class="info" style="font-size: 15px;">
										<ul>
											<li>Tài khoản: <b>'.$_SESSION["userName"].'</b></li>
											<li>Thông tin: <b>'.$_SESSION["name"].'</b></li>
										</ul>
										<div id="login" style="height: 300px; padding-top: 10px;"><b>ĐỔI MẬT KHẨU</b>
											<form action="javascript:changepass()">
												<input placeholder="Mật khẩu cũ" class="inputText" id="passold" type="password"/>
												<input placeholder="Mật khẩu mới" class="inputText" id="pass" type="password"/>
												<input placeholder="Gõ lại mật khẩu" class="inputText" id="confirmpass" type="password"/>
												<input value="Thay đổi" id="submit" type="submit"/>
											</form>
										</div>
										<div id="result"></div>
									</div>
								';
?>