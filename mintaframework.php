<?php
	session_start();
	include("./config/config.php");
	$PAGENOW = $HOSTNAME;
	$db = new DB();
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta id="hostname" value="<?php echo $HOSTNAME; ?>"/>
		<link href="<?php echo $HOSTNAME ?>/css/style.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo $HOSTNAME ?>/css/media.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo $HOSTNAME ?>/css/ui-lightness/jquery-ui-1.10.2.custom.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo $HOSTNAME ?>/css/ui-lightness/jquery-ui-1.10.2.custom.min.css" rel="stylesheet" type="text/css" />
		<link rel='stylesheet' id='style-css'  href='<?php echo $HOSTNAME ?>/css/diapo.css' type='text/css' media='all'> 
		<script type="text/javascript" src="<?php echo $HOSTNAME ?>/js/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="<?php echo $HOSTNAME ?>/js/jquery-ui-1.10.2.custom.js"></script>
		<script type="text/javascript" src="<?php echo $HOSTNAME ?>/js/jquery-ui-1.10.2.custom.min.js"></script>
		<script type="text/javascript" src="<?php echo $HOSTNAME ?>/js/jquery.tablesorter.js"></script>
		<script type="text/javascript" src="<?php echo $HOSTNAME ?>/js/simpletreemenu.js"></script>
		<script type='text/javascript' src='<?php echo $HOSTNAME ?>/js/slides/jquery.min.js'></script>
		<script type='text/javascript' src='<?php echo $HOSTNAME ?>/js/slides/jquery.easing.1.3.js'></script> 
		<script type='text/javascript' src='<?php echo $HOSTNAME ?>/js/slides/jquery.hoverIntent.minified.js'></script> 
		<script type='text/javascript' src='<?php echo $HOSTNAME ?>/js/slides/diapo.js'></script> 
		<script type="text/javascript" src="<?php echo $HOSTNAME ?>/js/control.js"></script>
		<script type="text/javascript" src="<?php echo $HOSTNAME ?>/extra/ckeditor/ckeditor.js"></script>
	</head>
	<body>
		<div id="wrapper">
			<div id="banner">
				<div class="menu">
					<div class="left">
						<ul>
							<a href="<?php echo $PAGENOW ?>/news"><li>Tin tức</li></a>
							<a href="<?php echo $PAGENOW ?>/noti"><li>Thông báo</li></a>
						</ul>
					</div>
					<a href="<?php echo $PAGENOW."/trang-chu.html"; ?>"><div class="home"></div></a>
					<div class="right">
						<ul>
							<a href="<?php echo $PAGENOW ?>/treeperson"><li>Cây gia phả</li></a>
							<a href="<?php echo $PAGENOW ?>/page/gioi-thieu-1.html"><li>Giới thiệu</li></a>
						</ul>
					</div>
				</div>
				<?php include ("./model/header.php"); ?>
				
				<form class="search" action="<?php echo $PAGENOW."/search/result/" ?>">
					<input type="text" placeholder="Nhập nội dung tìm kiếm" name="q" class="textsearch" id="textsearch"/>
					<input type="submit" value="" class="searchbtn" />
				</form>
			</div>
			<div id="noti">
				<marquee>Thông báo: <?php
					$result = $db->Query("SELECT * FROM TITLE WHERE FID = 1 ORDER BY TID DESC LIMIT 1");
					$row = mysql_fetch_assoc($result);
					echo "<a href='".$PAGENOW."/thread/".locdau(m_unhtmlchars($row["TITLE"]))."-".$row['TID'].".html' style='color:red;'>".$row["TITLE"]."</a>";
				 ?>
				</marquee>
			</div>
			<div id="main">
				<div id="left">
<a href="http://chuantinh.com/forum/"><h1>DIỄN ĐÀN</h1></a>

	<center><a href= "http://thangiatrang.com/forum/index.php"><img border="0" src="http://www.thangiatrang.com/images/congvao.png" alt="Th�n Gia Trang" title="Mo Cong Than Gia trang" width="240" height="240"/></a></center>
					<h1>DANH MỤC</h1>
					<div class="menu">
						<ul>
							<a href="<?php echo $PAGENOW ?>/home.html"><li>Trang chủ</li></a>
							<a href="<?php echo $PAGENOW ?>/tree-per-son.html"><li>Cây gia phả</li></a>
							<a href="<?php echo $PAGENOW ?>/gallery.html"><li>Thư viện ảnh</li></a>
							<a href="<?php echo $PAGENOW ?>/list-person.html"><li>Danh bạ</li></a>
							<a href="<?php echo $PAGENOW ?>/donate.html"><li>Đóng góp</li></a>
							<a href="<?php echo $PAGENOW ?>/noti.html"><li>Thông báo</li></a>
							<a href="<?php echo $PAGENOW ?>/news.html"><li>Tin tức</li></a>
							<a href="<?php echo $PAGENOW ?>/die.html"><li>Cáo phó</li></a>
							<?php
								$result = $db->Query("select * from PAGE where ID <> 1");
								if(!$result){
									echo "Lỗi kết nối Database";
								}
								else{
									while($row = mysql_fetch_assoc($result)){
										echo "<a href='".$PAGENOW."/page/".idtourl($row["PAGE_NAME"],$row["ID"])."'><li>".m_unhtmlchars($row["PAGE_NAME"])."</li></a>";
									}
								}
							?>
							<a href="<?php echo $PAGENOW ?>/contact.html"><li>Liên hệ</li></a>
						</ul>
					</div>
					<a href="<?php echo $PAGENOW ?>/users" target="_blank"><h1>ĐĂNG NHẬP</h1></a>
						<?php if(isset($_SESSION['userName'])){
							?>
								<a href="<?php $PAGENOW ?>users/logout"><input type="button" style="width: 50%; margin-top:20px; margin-left: 25%;" value="Đăng xuất"/></a>
							<?php
						}
						else{
							?>
							<form action="javascript:login()" style="text-align: center; margin-top: 20px;">
							<input type="text" id="user" style="width: 80%;" placeholder="Tài khoản"/>
							<input type="password" id="pass" style="width: 80%; margin-top: 10px;" placeholder="Mật khẩu"/>
							<input type="submit"  style="width: 50%; margin-top: 10px; margin-top: 10px; margin-left: 30%;" value="Đăng nhập"/>
						</form>
							<?php
						}
						?>
						<div id="result"></div>
					<br>
					<h1>LIÊN KẾT</h1>


					<div class="link">
						<?php
								$result = $db->Query("select * from LINK");
								if(!$result){
									echo "Lỗi kết nối Database";
								}
								else{
									while($row = mysql_fetch_assoc($result)){
										?>
										<div style="margin: 10px auto; border: 1px #fff solid; border-left: 0px; border-right: 0px; text-align: center;">
											<a href="<?php echo $row["URL"]; ?>" target="_blank"><img style="width: 100%;" src="<?php echo $row["IMG"]; ?>" title="<?php echo $row["INFO"]; ?>"/></a>
										</div>
										<?php
									}
								}
							?>
					</div>
				</div>
				<div id="content">
					<div class="center">
						<?php
							$home = new Home($URL_ARRAY,$ARG_START);
						?>
					</div>
				</div>
			</div>
			<?php
				include ("./model/footer.php");
			?>
		</div>
	</body>
	<script type="text/javascript">
		
	</script> 
</html>