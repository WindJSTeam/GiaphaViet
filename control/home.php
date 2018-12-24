<?php
	class Home{
		public function Home($arg,$start){
			if(unrewrite($arg[$start])=='news'){
				if(isset($arg[$start+1])){
					include("./model/error.php");
				}
				else{
					$this->pageNews();
				}
			}
			else if(unrewrite($arg[$start])=='thread'){
				if(isset($arg[$start+2])){
					include("./model/error.php");
				}
				else{
					if(isset($arg[$start+1]))	$this->pageThread($arg[$start+1]);
					else include("./model/error.php");
				}
			}
			else if(unrewrite($arg[$start])=='die'){
				if(isset($arg[$start+1])){
					include("./model/error.php");
				}
				else{
					$this->pageDie();
				}
			}
			else if(unrewrite($arg[$start])=='search'){
				$this->pageSearch($arg,$start+1);
			}
			else if(unrewrite($arg[$start])=='listperson'){
				if(isset($arg[$start+1])){
					include("./model/error.php");
				}
				else{
					$this->pagePersonList();
				}
			}
			else if(unrewrite($arg[$start])=='noti'){
				if(isset($arg[$start+1])){
					include("./model/error.php");
				}
				else{
					$this->pageNoti();
				}
			}
			else if(unrewrite($arg[$start])=='contact'){
				if(isset($arg[$start+1])){
					include("./model/error.php");
				}
				else{
					$this->pageContact();
				}
			}
			else if(unrewrite($arg[$start])=='donate'){
				if(isset($arg[$start+1])){
					include("./model/error.php");
				}
				else{
					$this->pageDonate();
				}
			}
			else if(unrewrite($arg[$start])=='person'){
				if(isset($arg[$start+1]))
					$this->viewPerson($arg[$start+1]);
				else include("./model/error.php");
			}
			else if(unrewrite($arg[$start])=='treeperson'){
				if(isset($arg[$start+1])){
					include("./model/error.php");
				}
				else{
					$this->pageTreePerson();
				}
				
			}
			else if(unrewrite($arg[$start])=='page'){
				if(isset($arg[$start+1])){
					$this->pageToPage($arg[$start+1]);
				}
				else{
					include("./model/error.php");
				}
			}
			else if(unrewrite($arg[$start])=='gallery'){
				if(isset($arg[$start+1])&&isset($arg[$start+2])){
					if($arg[$start+1]=='album'){
						$this->pageAlbumGallery($arg[$start+2]);
					} else include("./model/error.php");
				}
				else{
					$this->pageGallery();
				}
			}
			else if(unrewrite($arg[$start])==null||unrewrite($arg[$start])=='home'||unrewrite($arg[$start])=='trangchu'){
				$this->pageHome();
			}
			else{
				include("./model/error.php");
			}
		}
		public function pageHome(){
			echo "<h1>Trang chủ</h1>";
			include("./model/home.php");
		}
		public function pageToPage($id){
			include('./model/viewpage.php');
		}
		public function pageDonate(){
			echo "<h1>Danh sách đóng góp quỹ dòng họ</h1>";
			include('./model/donate.php');
		}
		public function viewPerson($pid){
			$url = $pid;
			$pid = urltoid($url);
			$info = $this->getinfo($pid);
			$jsondata = json_decode($info);
			if($jsondata->status&&$jsondata->data&&$url==idtourl($jsondata->data->name,$pid)){
				$data = $jsondata->data;
				if($data->die) $die = "Đã mất"; else $die = "Còn sống";
				if($data->sex) $sex = "Nam"; else $sex = "Nữ";
				if($data->mar_die_info) $mar_die = "Đã mất"; else $mar_die = "Còn sống";
				if(!$data->image) $image = constant("HOSTNAME")."/images/avatar.png";
				$image = $data->image;
				$fatherinfo = $this->getinfo($data->fatherID);
				$fatherinfo = json_decode($fatherinfo);
				$fathername = $fatherinfo->data->name;
				include('./model/person.php');
			} else {
				echo "
					<h1>Lỗi</h1>
					<div id='result'>Chưa có thông tin</div>
				";
			}
		}
		public function pageDie(){
			echo "<h1>Danh sách cáo phó</h1>";
			include('./model/die.php');
		}
		public function pagePersonList(){
			include('./model/listperson.php');
		}
		public function pageTreePerson(){
			include('./model/treeperson.php');
		}
		public function pageNoti(){
			echo "<h1>Thông báo</h1>";
			include("./model/noti.php");
		}
		public function pageNews(){
			echo "<h1>Tin tức</h1>";
			include("./model/news.php");
		}
		public function pageThread($id){
			include("./model/thread.php");
		}
		public function pageContact(){
			include("./model/contact.php");
		}
		public function getinfo($pid){
			$url = constant("HOSTNAME").'/cp/getinfo.php?id='.$pid;
			$result = file_get_contents($url);
			return $result;
		}
		public function pageSearch($arg,$start){
				include "./model/search.php";
		}
		public function pageGallery(){
			echo "<h1>Thư viện ảnh và video</h1>";
			include("./model/gallery.php");
		}
		public function pageAlbumGallery($albumid){
			include("./model/albumgallery.php");
		}
	}
?>