<?php
	session_start();
	include("../config/config.php");
	$PAGENOW = $HOSTNAME."/users";
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta id="hostname" value="<?php echo $HOSTNAME; ?>"/>
		<link href="<?php echo $HOSTNAME ?>/css/style.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo $HOSTNAME ?>/css/media.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo $HOSTNAME ?>/users/css/admin.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo $HOSTNAME ?>/css/ui-lightness/jquery-ui-1.10.2.custom.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo $HOSTNAME ?>/css/ui-lightness/jquery-ui-1.10.2.custom.min.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="<?php echo $HOSTNAME ?>/js/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="<?php echo $HOSTNAME ?>/js/jquery-ui-1.10.2.custom.js"></script>
		<script type="text/javascript" src="<?php echo $HOSTNAME ?>/js/jquery-ui-1.10.2.custom.min.js"></script>
		<script type="text/javascript" src="<?php echo $HOSTNAME ?>/js/jquery.tablesorter.js"></script>
		<script type="text/javascript" src="<?php echo $HOSTNAME ?>/js/control.js"></script>
		<script type="text/javascript" src="<?php echo $HOSTNAME ?>/extra/ckeditor/ckeditor.js"></script>
	</head>
	<body>
		<div id="wrapper">
			<div id="banner">
				<div class="menu">
					<?php if(isset($_SESSION["userType"])){
								?>
					<div class="left">
						<ul>
							<a href="<?php echo $HOSTNAME ?>" target='_blank'"><li>Về trang chính</li></a>
							<?php 
								if(!isset($_SESSION["userName"])){
									echo '<a href="'.$PAGENOW.'/login.html"><li>Đăng nhập</li></a>';
								}
								else{
									echo '<a href="'.$PAGENOW.'/logout.html"><li>Đăng xuất</li></a>';
								}
							?>
						</ul>
					</div>
					<a href="<?php echo $PAGENOW ?>"><div class="home"></div></a>
					<div class="right">
						<ul>
							<?php if(!isset($_SESSION["userType"])||$_SESSION["userType"]==1){
								?>
								<a href="<?php echo $PAGENOW ?>/manager-user.html"><li>Quản lý users</li></a>
							<?php
								}	
								else{
									?>
								<a href="<?php echo $PAGENOW ?>/account.html"><li>Tài khoản</li></a>
									<?php
								}
							?>
							<a href="<?php echo $PAGENOW ?>/manager-title.html"><li>Quản lý bài viết</li></a>
						</ul>
					</div>
					<?php
						}
					?>
				</div>
				<?php
					include ("../model/header.php");
				?>
			</div>
			<div id="main">
				<div id="left">
					<h1>DANH MỤC</h1>
					<div class="menu">
						<?php if(isset($_SESSION["userType"])){
								?>
						<ul>
							<?php if(!isset($_SESSION["userType"])||$_SESSION["userType"]==1||$_SESSION["userType"]==3){
								?>
							<a href="#"><li id="class_menu_1" class="class_menu">Quản lý thành viên dòng họ</li>
								<div id="menu_sub_1" class="menu_sub">
									<ul	class="menu_sub_style">
										<a href="<?php echo $PAGENOW ?>/add-new-person.html"><li>Thêm thành viên</li></a>
										<a href="<?php echo $PAGENOW ?>/list-person.html"><li>Danh sách</li></a>
									</ul>
								</div>
							</a>
							<?php
								}
							?>
							<a href="<?php echo $PAGENOW ?>/write.html"><li>Viết bài</li></a>
							<?php if(!isset($_SESSION["userType"])||$_SESSION["userType"]==1){
								?>
							<a href="#"><li id="class_menu_2" class="class_menu">Quản lý trang</li>
								<div id="menu_sub_2" class="menu_sub">
									<ul	class="menu_sub_style">
										<a href="<?php echo $PAGENOW ?>/add-page.html"><li>Thêm trang</li></a>
										<a href="<?php echo $PAGENOW ?>/list-page.html"><li>Danh sách trang</li></a>
									</ul>
								</div>
							</a>
							<a href="<?php echo $PAGENOW ?>/edit-site-name.html"><li>Đổi tên website</li></a>
							<?php
							}
							?>
							<a href="<?php echo $PAGENOW ?>/upload.html"><li>Upload ảnh/video</li></a>
							<a href="<?php echo $PAGENOW ?>/manage-media.html"><li>Quản lý bộ sưu tập</li></a>
							<?php if(!isset($_SESSION["userType"])||$_SESSION["userType"]==1){
								?>
							<a href="<?php echo $PAGENOW ?>/donate.html"><li>Quản lý đóng góp</li></a>
							<a href="<?php echo $PAGENOW ?>/slide.html"><li>Quản lý slides ảnh</li></a>
							<a href="<?php echo $PAGENOW ?>/manager-link.html"><li>Quản lý liên kết</li></a>
							<a href="<?php echo $PAGENOW ?>/msg.html"><li>Tin nhắn<div class="countmsg">
								<?php
									$db = new DB();
									$result = $db->Query("SELECT * FROM MESSAGES WHERE VIEW=0");
									echo mysql_num_rows($result);
								 ?>
				 		</div></li></a>
							<a href="<?php echo $PAGENOW ?>/contact.html"><li>Sửa liên hệ</li></a>
						<?php
							}
						?>
						</ul>
						<?php
							}
						?>
					</div>
				</div>
				<div id="content">
					<div class="center">
						<?php
							$cpanel = new CPanel($URL_ARRAY,$ARG_START+1);
						?>
					</div>
				</div>
			</div>
			<?php
				include ("../model/footer.php");
			?>
		</div>
	</body>
</html>