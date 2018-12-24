<div id="footer"><b><br><br><br>
				<?php
					$db = new DB();
					$result = $db->Query("select * from SITE_INFO where ID = 1");
					$row = mysql_fetch_assoc($result);
					echo mb_strtoupper($row["INFO"],"UTF-8");				
				?>
<i><br> Nơi Hội Tụ Của Con Cháu Chi Họ Thân Bắc Nghè, Nguồn Gốc Xã Nội Hoàng, Huyện Yên Dũng, Tỉnh Bắc Giang
			</i></b></div>
<title><?php echo $row["INFO"]; ?></title>