<div class="title"><?php
	$db = new DB();

	$result = $db->Query("select * from SITE_INFO where ID = 1");

	$row = mysql_fetch_assoc($result);

	echo mb_strtoupper($row["INFO"],"UTF-8");

?></div>