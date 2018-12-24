<?php
	$url = $id;
	$id = urltoid($url);
	$sql = "SELECT * FROM PAGE WHERE ID='".$id."'";
			$db = new DB();
			$tmp = array();
			$result=$db->Query($sql);
			if(!$result){
				echo"<h1>Lỗi...</h1> <div id='result'>Lỗi kết nối database </div>";
			}
			else{
				if(mysql_num_rows($result)==0){
					echo"<h1>Lỗi 404</h1> <div id='result'>Không tìm thấy trang</div>";
				}
				else{
					$row = mysql_fetch_assoc($result);
					if($url!=idtourl($row["PAGE_NAME"],$row["ID"])){
						echo"<h1>Lỗi 404</h1> <div id='result'>Không tìm thấy trang</div>";	
					}
					else{
					?>
					<title><?php echo m_unhtmlchars($row["PAGE_NAME"]) ?></title>
					<?php
					echo"<h1>".$row["PAGE_NAME"]."</h1><div style='margin: 20px; width: 90%;'>".m_unhtmlchars($row["CONTENT"])."</div>";
					}
				}
			}
?>