<?php
	class CPanel{
		public function CPanel($arg,$start){
			if((unrewrite($arg[$start])=='login')||!isset($_SESSION["userName"])){
				if(isset($arg[$start+1])){
					include("../model/error.php");
				}
				else{
					if(isset($_SESSION["userName"])){
					$this->pageAccount();
					}
					$this->pageLogin();
				}
				
			}
			else if(unrewrite($arg[$start])=='slide'){
				if(isset($arg[$start+1])){
					include("../model/error.php");
				}
				else{
					$this->pageSlide();
				}
			}
			else if(unrewrite($arg[$start])=='upload'){
				if(isset($arg[$start+1])){
					include("../model/error.php");
				}
				else{
					$this->pageUpload();
				}
			}
			else if(unrewrite($arg[$start])=='editsitename'){
				if(isset($arg[$start+1])){
					include("../model/error.php");
				}
				else{
					$this->pageSiteName();
				}
			}
			else if(unrewrite($arg[$start])=='managemedia'){
				if(isset($arg[$start+1])&&isset($arg[$start+2])){
					if($arg[$start+1]=='album'){
						$this->pagePhotoAlbum($arg[$start+2]);
					} else include("../model/error.php");
				}
				else{
					$this->pageManageMedia();
				}
			}
			else if(unrewrite($arg[$start])=='contact'){
				if(isset($arg[$start+1])){
					include("../model/error.php");
				}
				else{
					$this->pageContact();
				}
			}
			else if(unrewrite($arg[$start])=='logout'){
				if(isset($arg[$start+1])){
					include("../model/error.php");
				}
				else{
					$this->logout();
				}
			}
			else if(unrewrite($arg[$start])=='edittitle'){
				if(isset($arg[$start+2])){
					include("../model/error.php");
				}
				else{
					$this->pageEditTitle($arg[$start+1]);
				}
			}
			else if(unrewrite($arg[$start])=='editpage'){
				if(isset($arg[$start+2])){
					include("../model/error.php");
				}
				else{
					$this->pageEditPage($arg[$start+1]);
				}
			}
			else if(unrewrite($arg[$start])=='editperson'){
				if(isset($arg[$start+2])){
					include("../model/error.php");
				}
				else{
					$this->pageEditPerson($arg[$start+1]);
				}
			}
			else if(unrewrite($arg[$start])=='write'){
				
				if(isset($arg[$start+1])){
					include("../model/error.php");
				}
				else{
					$this->pageWrite();
				}
			}
			else if(unrewrite($arg[$start])=='managerlink'){
				
				if(isset($arg[$start+1])){
					include("../model/error.php");
				}
				else{
					$this->pageManagerLink();
				}
			}
			else if(unrewrite($arg[$start])=='addnewperson'){
				
				if(isset($arg[$start+1])){
					include("../model/error.php");
				}
				else{
					$this->pageAddPerson();
				}
			}
			else if(unrewrite($arg[$start])=='msg'){
				$this->pageMSG($arg,$start+1);
			}
			else if(unrewrite($arg[$start])=='addpage'){
				
				if(isset($arg[$start+1])){
					include("../model/error.php");
				}
				else{
					$this->pageAddPage();
				}
			}
			else if(unrewrite($arg[$start])=='listperson'){
				
				if(isset($arg[$start+1])){
					include("../model/error.php");
				}
				else{
					$this->pageListPerson();
				}
			}
			//////////////////////////////////
			else if(unrewrite($arg[$start])=='donate'){
				if(isset($arg[$start+1])){
					include("../model/error.php");
				}
				else{
					$this->pageDonate();
				}
			}//////////////////////////////
			else if(unrewrite($arg[$start])=='listpage'){
				
				if(isset($arg[$start+1])){
					include("../model/error.php");
				}
				else{
					$this->pageListPage();
				}
			}
			else if(unrewrite($arg[$start])=='managertitle'){
				
				if(isset($arg[$start+1])){
					include("../model/error.php");
				}
				else{
					$this->pageListTitlePage();
				}
			}
			else if(unrewrite($arg[$start])=='manageruser'){
				
				if(isset($arg[$start+1])){
					include("../model/error.php");
				}
				else{
					$this->pageListUsersPage();
				}
			}
			else if(unrewrite($arg[$start])==null||unrewrite($arg[$start])=='account'){
				$this->pageAccount();
			}
			else{
				include("../model/error.php");
			}
		}
		public function pageLogin(){
			include('../model/user/login.php');
		}
		public function pageListTitlePage(){
			include('../model/user/managertitle.php');
		}
		public function pageWrite(){
			include('../model/user/write.php');
		}
		public function pageAddPage(){
			include('../model/user/addpage.php');
		}
		public function pageContact(){
			include('../model/user/editcontact.php');
		}
		public function pageAddPerson(){
			include('../model/user/addnewperson.php');
		}
		public function pageAccount(){
			include('../model/user/account.php');
		}
		public function pageListPage(){
			include('../model/user/listpage.php');
		}
		public function pageListPerson(){
			include('../model/user/listperson.php');
		}
		public function pageSlide(){
			echo "<h1>Quản lý đường dẫn slides ảnh</h1>";
			include('../model/user/slide.php');
		}
		public function pageEditPage($id){
			include('../model/user/editpage.php');
		}
		public function pageManagerLink(){
			include('../model/user/managerlink.php');
		}
		public function pageEditTitle($id){
			include('../model/user/edittitle.php');
		}
		public function pageEditPerson($id){
			include('../model/user/editperson.php');
		}
		public function pageUpload(){
			include('../model/user/upload.php');
		}
		public function pagePhotoAlbum($albumid){
			include('../model/user/photoalbum.php');
		}
		public function pageDonate(){
			include('../model/user/donate.php');
		}/////////////////
		
		public function logout(){
			echo "<script> window.location = '../users/cp/logout.php'; </script>";
		}
		public function pageListUsersPage(){
			include('../model/user/listusers.php');
		}
		public function pageManageMedia(){
			echo "<h1>Quản lý album ảnh</h1>";
			include('../model/user/managemedia.php');
		}
		public function pageMSG($arg,$start){
			include('../model/user/msg.php');
		}
		public function pageSiteName(){
			include ('../model/user/editsitename.php');
		}
	}
?>