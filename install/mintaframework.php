<?php
	include("../config/functions.php");
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link href="../css/style.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="../js/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="./js/control.js"></script>
		<title>Install Website</title>
	</head>
	<body>
		<div id="wrapper">
			<div id="banner">
				<br/>
				<div class="title">CÀI ĐẶT WEBSITE</div>
			</div>
			<div id="main">
				<div id="content" style="width: 100%; margin: 20px; text-align: center;">
					<div id="copyright" style=" position:relative; width: 800px; height: 500px; margin: 30px auto; border: 1px #888 dashed; padding: 20px; border-radius: 10px; ">
						<h1>Thỏa thuận cấp phép sử dụng</h1>
						<div style="text-align: left">
						<br><b>Mã nguồn: Website gia phả.
						<br>Phát triền: Bùi Minh Tấn.
						<br>Liên hệ: Email(tanbm.hut@gmail.com), Phone(0986600032).
						</b>
						<br><br>Mã nguồn được viết trên nền tảng PHP và hệ quản trị cơ sở dữ liệu MySQL và công nghệ RewireURL mà hosting có, cung cấp miễn phí cho các mục đích phát triển website riêng của dòng họ, giúp quản lý và theo dõi dễ dàng các thông tin của dòng họ và kết nối các thành viên trong dòng họ ở xa.
						<br> Nội dung phát triển trong website là do cá nhân hoặc tổ chức sử dụng đưa lên, phía cung cấp mã nguồn không chịu trách nhiệm về các nội dung đó.
						<br> Mọi thắc mắc về mã nguồn và lỗi xảy ra trong quá trình cài đặt xin liên hệ nhà phát triển.
						</div>
						<input type="button" onclick="toAccept()" style="position: absolute; bottom: 20px; right: 20px;" value="Đồng ý"/>
					</div>
					<form style="width: 800px; margin: 10px auto; display: none;" action="javascript:install()" id="form">
						<table width="800px" style="margin: 30px auto; border: 1px #888 dashed; padding: 20px; border-radius: 10px;">
							<tr>
								<td width="250px">
									<h3>Tên website (*)</h3>
									<input type="text" placeholder="Tên website" id="sitename" />
									<br /><br />
									<h3>Cấu hình Database</h3>
									<hr>
									<h3>Địa chỉ hosting (*)</h3>
									<input type="text" placeholder="localhost" id="hosting" />
									<h3>Tên database (*)</h3>
									<input type="text" placeholder="Tên database" id="dataname" />
									<h3>Tài khoản (*)</h3>
									<input type="text" id="dataacc" placeholder="Tài khoản"/>
									<h3>Mật khẩu</h3>
									<input type="password" id="datapass" placeholder="Mật khẩu"/>
								</td>
								<td width="300px"></td>
								<td width="250px" valign="top">
									<h3>Thông tin người quản trị</h3>
									<hr>
									<h3>Tài khoản (*)</h3>
									<input type="text" id="acc" placeholder="Tài khoản"/>
									<h3>Mật khẩu (*)</h3>
									<input type="password" id="pass" placeholder="Mật khẩu"/>
									<h3>Gõ lại mật khẩu (*)</h3>
									<input type="password" id="confirmpass" placeholder="Gõ lại mật khẩu"/>
									<h3>Tên người quản trị</h3>
									<input type="text" id="admininfo" placeholder="Họ và tên"/>
								</td>
							</tr>
						</table>
						<input type="submit" value="Cài đặt" />
					</form>
					<div id="result" style="display: none; width: 800px; min-height: 500px; margin: 20px auto;">
						<div id="resultcontent" style="background: #fff; box-shadow: inset 1px 1px 2px #888; width: 800px; min-height: 500px; padding: 10px; text-align: left; border-radius: 10px;"></div>
						<br>
						<input type="button" id="finish" onclick="onFinish()" style="display: none;" value="Hoàn thành"/>
					</div>
			</div>
		</div>
	</body>
</html>