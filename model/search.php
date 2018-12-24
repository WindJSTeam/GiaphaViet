<h1>Tìm kiếm</h1>
<form style="margin: 20px auto;" action="javascript:searchfor()">
	<h3 style="display: inline-block; vertical-align: middle;">Tìm kiếm nâng cao:</h3>
	<input placeholder="Nội dung tìm kiếm" style="width: 250px;" type="text" id="q"/>
	<select style="width: 135px;"id="searchfor">
		<option value="news">Trong bài viết</option>
		<option value="person">Thành viên dòng họ</option>
	</select>
	<input style="width: 100px; border: 0px; box-shadow: 1px 1px 2px #555;" type="submit" value="Tìm kiếm"/>
</form>
<?php
	$search = "";
	if(isset($_REQUEST["q"])){
		$search = m_htmlchars($_REQUEST["q"]);
	}
	?>
		<h3>Kết quả tìm kiếm : "<?php echo $search; ?>"</h3>
	<?php
	
	function searhperson($q){
		$db = new DB();
		$sql = "select * from INFO_PERSON WHERE NAME like '%".$q."%' ";
		$result = $db->Query($sql);
		while($row=mysql_fetch_assoc($result)){
			?>
			<a style="display: inline-block; width: auto; margin-left: 10px;" title="<?php echo $row["BIRTHDAY"] ?>" href="<?php echo constant("HOSTNAME").'/person/'.idtourl($row['NAME'],$row['ID']) ?>"><div class="label"><label class="title"><?php echo $row["NAME"] ?></label></div></a>
			<?php
		}
	}
	function searhnews($q){
		$db = new DB();
		$sql = "select * from TITLE WHERE CONTENT like '%".$q."%' OR TAG like '%".$q."%' OR TITLE like '%".$q."%'";
		$result = $db->Query($sql);
		while($row=mysql_fetch_assoc($result)){
			?>
				<a href="<?php echo constant("HOSTNAME").'/thread/'.idtourl($row['TITLE'],$row['TID']) ?>"><div class="label"><label class="title"><?php echo m_unhtmlchars($row["TITLE"]) ?></label><label class="datecreate"> - Ngày viết: <?php echo $row["DATE_CREATE"] ?></label></div></a>
			<?php
		}
	}
	if(isset($arg[$start])&&$search!=""){
		if ($arg[$start]=="result"){
			?>
				<h4>Thành viên dòng họ:</h4>
			<?php
				searhperson($search);
			?>
				<h4>Bài viết liên quan:</h4>
			<?php
				searhnews($search);
		}
		if ($arg[$start]=="person"){
			searhperson($search);
		}
		if ($arg[$start]=="news"){
			searhnews($search);
		}
	}
?>