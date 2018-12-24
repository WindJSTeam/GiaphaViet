<h1>Cây gia phả</h1>
<div id="treeperson">
	<div id="list">
		<ul id="node-1">
		</ul>
	</div>
</div>
<script>
$(document).ready(function(){
	<?php
	
		class Person{
			public function Person($node){
				$this->addNode($node);
			}
			public function addNode($node){
				echo "
					$('#node-".$node['FATHER_ID']."').append(\"<li><fol></fol><icon class='icon-".$node["SEX"]."'></icon><span>Đời thứ ".$node["GENERATION"]."</span> - <a href='".constant("HOSTNAME")."/person/".locdau($node["NAME"])."-".$node["ID"].".html' onmouseout='hidePopup()' onmouseover='popupPerson(".$node["ID"].")'>".$node["NAME"]."</a><ul id='node-".$node["ID"]."'></ul></li>\");
				";
			}
		}
		
		$db = new DB();
		$sql = "select * from INFO_PERSON WHERE ID <> 1 ORDER BY `GENERATION` ASC";
		
		$result = $db->Query($sql);
		$countgeneration = 0;
		if(!$result){
			echo "<div id='result'>Có lỗi xảy ra</div>";
		}
		else{
			$arr = array();
			while($row = mysql_fetch_assoc($result)){
				array_push($arr, $row);
			}
			$size = sizeof($arr);
			for($i=0; $i<($size - 1); $i++){
				for($j=($i + 1); $j<$size; $j++){
					if(($arr[$i]["GENERATION"] == $arr[$j]["GENERATION"]) && ($arr[$i]["NUM_CHILD"] > $arr[$j]["NUM_CHILD"])){
						$tmp = $arr[$i];
						$arr[$i] = $arr[$j];
						$arr[$j] = $tmp;
					}
				}
			}
			for($i=0; $i<sizeof($arr); $i++){
				if($arr[$i]["GENERATION"]>$countgeneration)	$countgeneration=$arr[$i]["GENERATION"];
				new Person($arr[$i]);
			}
		}
	?>
	ddtreemenu.createTree("treeperson", true);
	$("#list").css('width',<?php echo ($countgeneration*40+300); ?>+'px');
});
</script>