<div style="margin: 20px;">
<?php
	$db = new DB();
	$result = $db->Query("SELECT * FROM TITLE WHERE FID = 1 ORDER BY DATE_CREATE DESC");
	while($row = mysql_fetch_assoc($result)){
		?>
			
			<a href="<?php echo constant("HOSTNAME").'/thread/'.idtourl($row["TITLE"],$row['TID']); ?>"><div class="label"><label class="title"><?php echo m_unhtmlchars($row["TITLE"]) ?></label><label class="datecreate"> - Ngày viết: <?php echo $row["DATE_CREATE"] ?></label></div></a>
		
		<?php	
	}
?>
</div>