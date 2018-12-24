<div class="slide_main">
	<div id="pix_diapo">
	<?php
		$db = new DB();
		$result = $db->Query("SELECT * FROM SLIDE");
		while($row = mysql_fetch_assoc($result)){
			?>
				<div data-thumb="<?php echo $row["URL"] ?>"><img src="<?php echo $row["URL"] ?>"><div class="caption elemHover fromLeft"><?php echo $row["INFO"] ?></div></div>
			<?php	
		}
	?>
	</div>
</div>

<div style="margin: 20px;" class="catalog_list">
<h3>Thông báo:</h3>
<?php
	$db = new DB();
	$result = $db->Query("SELECT * FROM TITLE WHERE FID = 1 ORDER BY DATE_CREATE DESC");
	while($row = mysql_fetch_assoc($result)){
		?>
			
			<a href="<?php echo constant("HOSTNAME").'/thread/'.locdau(m_unhtmlchars($row["TITLE"])).'-'.$row['TID'].'.html' ?>"><div class="label"><label class="title"><?php echo $row["TITLE"] ?></label><label class="datecreate"> - Ngày viết: <?php echo $row["DATE_CREATE"] ?></label></div></a>
		
		<?php	
	}
?>
</div>

<div style="margin: 20px;"  class="catalog_list">
<h3>Tin tức:</h3>
<?php
	$db = new DB();
	$result = $db->Query("SELECT * FROM TITLE WHERE FID = 2 ORDER BY DATE_CREATE DESC");
	while($row = mysql_fetch_assoc($result)){
		?>
			
			<a href="<?php echo constant("HOSTNAME").'/thread/'.locdau(m_unhtmlchars($row["TITLE"])).'-'.$row['TID'].'.html' ?>"><div class="label"><label class="title"><?php echo $row["TITLE"] ?></label><label class="datecreate"> - Ngày viết: <?php echo $row["DATE_CREATE"] ?></label></div></a>
		
		<?php	
	}
?>
</div>

<div style="margin: 20px;"  class="catalog_list">
<h3>Cáo phó:</h3>
<?php
	$db = new DB();
	$result = $db->Query("SELECT * FROM TITLE WHERE FID = 3 ORDER BY DATE_CREATE DESC");
	while($row = mysql_fetch_assoc($result)){
		?>
			
			<a href="<?php echo constant("HOSTNAME").'/thread/'.locdau(m_unhtmlchars($row["TITLE"])).'-'.$row['TID'].'.html' ?>"><div class="label"><label class="title"><?php echo $row["TITLE"] ?></label><label class="datecreate"> - Ngày viết: <?php echo $row["DATE_CREATE"] ?></label></div></a>
		
		<?php	
	}
?>
</div>