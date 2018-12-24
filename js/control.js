_flagLogin = false;
_hostname = $("#hostname").attr("value");
localperson = [];	
		function addnewperson(){
			if(!_flagLogin){
				_flagLogin = true;
				$("#result").text('');
				if($("#name").val()==''){
					_flagLogin = false;
					$("#result").text('Chưa nhập tên!!!');
				}
				else{
					$.ajax({
						url: _hostname+'/users/cp/addperson.php',
						type: 'post',
						data: {
							name: $("#name").val(),
							birthday: $("#birthday").val(),
							parent: $("#parent").val(),
							sex: $("#sex").val(),
							die: $("#die_info").val(),
							address: $("#address").val(),
							phonenumber: $("#phonenumber").val(),
							email: $("#email").val(),
							image: $("#image").val(),
							normal_name: $("#normal_name").val(),
							ex_name: $("#ex_name").val(),
							num_child: $("#num_child").val(),
							nick_name: $("#nick_name").val(),
							year_old: $("#year_old").val(),
							date_die: $("#date_die").val(),
							plan_die: $("#plan_die").val(),
							about: $("#about").val(),
							mar_name: $("#mar_name").val(),
							mar_birth: $("#mar_birth").val(),
							mar_die_info: $("#mar_die_info").val(),
							mar_date_die: $("#mar_date_die").val(),
							mar_year_old: $("#mar_year_old").val(),
							mar_plan_die: $("#mar_plan_die").val(),
							mar_about: $("#mar_about").val()
						},
						success: function(data){
							var json = JSON.parse(data);
							if(json.status){
								$("#result").text(json.msg);
								window.location = _hostname+'/users/list-person.html';
							}
							else{
								$("#result").text(json.msg);
							}
							_flagLogin = false;
						},
						error: function(e){
							$("#result").text(e);
							_flagLogin = false;
						}
					});
				}
			}	
		}
		function editperson(_id){
			if(!_flagLogin){
				_flagLogin = true;
				$("#result").text('');
				if($("#name").val()==''){
					_flagLogin = false;
					$("#result").text('Chưa nhập tên!!!');
				}
				else{
					var pop = new Popup({
						msg: "Sửa thành viên này sẽ gây mất dữ liệu các thành viên đời sau thuộc chi này <br><br> Bạn có muốn tiếp tục?",
						_callback: function(){
							$.ajax({
								url: _hostname+'/users/cp/editperson.php',
								type: 'post',
								data: {
									id: _id,
									name: $("#name").val(),
									birthday: $("#birthday").val(),
									parent: $("#parent").val(),
									sex: $("#sex").val(),
									die: $("#die_info").val(),
									address: $("#address").val(),
									phonenumber: $("#phonenumber").val(),
									email: $("#email").val(),
									image: $("#image").val(),
									normal_name: $("#normal_name").val(),
									ex_name: $("#ex_name").val(),
									num_child: $("#num_child").val(),
									nick_name: $("#nick_name").val(),
									year_old: $("#year_old").val(),
									date_die: $("#date_die").val(),
									plan_die: $("#plan_die").val(),
									about: $("#about").val(),
									mar_name: $("#mar_name").val(),
									mar_birth: $("#mar_birth").val(),
									mar_die_info: $("#mar_die_info").val(),
									mar_date_die: $("#mar_date_die").val(),
									mar_year_old: $("#mar_year_old").val(),
									mar_plan_die: $("#mar_plan_die").val(),
									mar_about: $("#mar_about").val()
								},
								success: function(data){
									var json = JSON.parse(data);
									if(json.status){
										$("#result").text(json.msg);
										window.location = _hostname+'/users/list-person.html';
									}
									else{
										$("#result").text(json.msg);
									}
									_flagLogin = false;
								},
								error: function(e){
									$("#result").text(e);
									_flagLogin = false;
								}
							});
						},
						back: function(){
							_flagLogin = false;
						}
					})
				}
			}	
		}
		
		
		
		function login(){
			if(!_flagLogin){
				_flagLogin = true;
				$("#result").text('');
				$.ajax({
					url: _hostname+'/users/cp/login.php',
					type: 'post',
					data: {
						userName: $("#user").val(),
						password: $("#pass").val()
					},
					success: function(data){
						$("#user").val('');
						$("#pass").val('');
						var result = JSON.parse(data);
						if(!result.status){
							$("#result").text(result.msg);
						}
						else{
							$("#result").text('Đăng nhập thành công - tài khoản: ' + result.msg);
							window.location = _hostname+'/users/account.html';
						}
						_flagLogin = false;
					},
					error: function(e){
						$("#user").val('');
						$("#pass").val('');
						$("#result").val(e);
						_flagLogin = false;
					}
				});
			}
		}
		function changepass(){
			if(!_flagLogin){
				_flagLogin = true;
				$("#result").text('');
				if($("#pass").val()!=$("#confirmpass").val()){
					$("#result").text('Mật khẩu gõ 2 lần không giống nhau');
					_flagLogin = false;
				}
				else{
						$.ajax({
						url: _hostname+'/users/cp/changepass.php',
						type: 'post',
						data: {
							passold: $("#passold").val(),
							pass: $("#pass").val(),
							confirmpass: $("#confirmpass").val()
						},
						success: function(data){
							$("#passold").val('');
							$("#pass").val('');
							$("#confirmpass").val('');
							var result = JSON.parse(data);
							if(!result.status){
								$("#result").text(result.msg);
							}
							else{
								$("#result").text('Đổi mật khẩu thành công - tài khoản: ' + result.msg);
							}
							_flagLogin = false;
						},
						error: function(e){
							$("#passold").val('');
							$("#pass").val('');
							$("#confirmpass").val('');
							$("#result").val(e);
							_flagLogin = false;
						}
						});
					}
				
				}
			}
			function sendTitle(){
				if(!_flagLogin){
					$("#result").val('');
					_flagLogin = true;
					var editor = CKEDITOR.instances['editorID'].getData();
					if($("#title").val().length==0||$(editor).text().length==0){
						_flagLogin = false;
						$("#result").text('Cần nhập đầy đủ thông tin tiêu đề và nội dung bài viết');
					}
					else{
						$.ajax({
							url: _hostname+'/users/cp/post.php',
							type: 'post',
							data:{
								title: $("#title").val(),
								die: $("#die_info").val(),
								year_old: $("#year_old").val(),
								date_die: $("#date_die").val(),
								plan_die: $("#plan_die").val(),
								catalog: $("#catalog").val(),
								tag: $("#tag").val(),
								actor: $("#actor").val(),
								content: editor
							},
							success: function(data){
								_flagLogin = false;
								var json = JSON.parse(data);
								if(json.status){
									$("#result").text(json.msg);
									window.location = _hostname+'/users/manager-title.html';
								}
								else{
									$("#result").text(json.msg);
								}
							},
							error: function(e){
								_flagLogin = false;
								$("#result").val(e);
							}
						});	
					}
				}
			}
			$(document).ready(function(){
				if($('#pix_diapo').html()){
					$('#pix_diapo').diapo();	
				}
				if($('#listperson').html()){
					$("#listperson").tablesorter();
				}
				if($('#donate-table').html()){
					$("#donate-table").tablesorter();
				}
				if($('#link-table').html()){
					$("#link-table").tablesorter();
				}
				if($(".date").html()!=null){
					$(".date").datepicker({dateFormat: "dd-mm-yy"});
				}
				
				$("#parent").change(function(){
					$.ajax({
						type: 'post',
						url: _hostname+'/cp/getinfo.php',
						data: {
							id: $("#parent").val()
						},
						success: function(data){
							var json = JSON.parse(data);
							if(json.status){
								$("#parentbirthday").text(json.data.birthday);
								$("#generation").text(json.data.generation);
							}
							else{
								console.log('false')
							}
						},
						error: function(e){
							console.log(e);
						}
					})
				});
				
				
				$("#class_menu_1").click(function(){
					$("#menu_sub_1").slideToggle("slow");
				});
				$("#class_menu_2").click(function(){
					$("#menu_sub_2").slideToggle("slow");
				});
				
				
				$("#catalog").change(function(){
					if($("#catalog").val()==3){
						$("#die").removeClass('hide');
					}
					else{
						$("#die").addClass('hide');
					}
				});
				$("#mar_die_info").change(function(){
					if($("#mar_die_info").val()==0){
						$(".mardieclass").css("display","none");
					}
					else{
						$(".mardieclass").css("display","table-row");
					}
				});
				if($("#die_info").html()){
					if($("#die_info").val()==1)	$(".dieclass").css("display","table-row");
				}
				if($("#mar_die_info").html()){
					if($("#mar_die_info").val()==1)	$(".mardieclass").css("display","table-row");
				}
				$("#die_info").change(function(){
					if($("#die_info").val()==0){
						$(".dieclass").css("display","none");
					}
					else{
						$(".dieclass").css("display","table-row");
					}
					$.ajax({
						type: 'post',
						url: _hostname+'/cp/getinfo.php',
						data: {
							id: $("#die_info").val()
						},
						success: function(data){
							var json = JSON.parse(data);
							if(json.status){
								$("#birthday").text(json.data.birthday);
							}
							else{
								console.log('false')
							}
						},
						error: function(e){
							console.log(e);
						}
					})
				});
			});
			
			function sendPage(){
				if(!_flagLogin){
					_flagLogin = true;
					$("#result").text('');
					var editor = CKEDITOR.instances['editorID'].getData();
					if($("#title").val()==''||$(editor).text()==''){
						_flagLogin = false;
						$("#result").text('Xin mời điền đầy đủ thông tin!!!');
					}
					else{
						$.ajax({
							url: _hostname+'/users/cp/addpage.php',
							type: 'post',
							data: {
								title: $("#title").val(),
								content: editor
							},
							success: function(data){
								var json = JSON.parse(data);
								if(json.status){
									$("#result").text(json.msg);
									window.location = _hostname+'/users/list-page.html';
								}
								else{
									$("#result").text(json.msg);
								}
								_flagLogin = false;
							},
							error: function(e){
								$("#result").text(e);
								_flagLogin = false;
							}
						});
					}
				}	
			}
			
			
			//Popup Person
			
			function popupPerson(id){
				var pointerX = window.event.pageX;
				var pointerY = window.event.pageY;
				var elm = document.getElementById('popup-person');
				if(!elm){
					elm = document.createElement('div');
					elm.setAttribute('id','popup-person');
					document.body.appendChild(elm);
				}
				elm.style.left = pointerX;
				elm.style.top = pointerY;
				elm.style.display = 'block';
				elm.innerHTML = '';
				if(localperson[id]){
					data = JSON.parse(localperson[id]);
					renderData(elm,data);
				} else {
					$.ajax({
						url : _hostname+'/cp/getinfo.php',
						type: 'POST',
						beforeSend: function(){
							elm.innerHTML = '<img src="'+_hostname+'/images/loading.gif" />';
						},
						data: {
							id: id,
						},
						success: function(result,status){
							result = JSON.parse(result);
							localperson[result.data.id] = JSON.stringify(result.data);
							if(status&&result.data){
								renderData(elm,result.data);
							};
						},
					});
				}
			}
			function renderData(elm,data){
				var imagesrc = data.image;
				var die = 'Đã mất';
				if(data.die == 0) die = 'Còn sống'; 
				if(!data.image) imagesrc = _hostname+'/images/avatar.png';
				elm.innerHTML='<img src='+imagesrc+' /><table><tr><td><b>HỌ TÊN: </b></td><td><b>'+data.name+'</b></td><tr><td><b>NGÀY SINH: </b></td><td><b>'+data.birthday+'</b></td><tr><td><b>Tình trạng: </b></td><td><i>'+die+'</i></td></tr></table>';
			}
			function hidePopup(){
				elm = document.getElementById('popup-person');
				elm.style.display = 'none';
			}
			
			
			// Donate
			
			function updateDonate(data){
				var id = data[0];
				if(!_flagLogin){
					_flagLogin = true; 
					$.ajax({
						type: 'post',
						url: _hostname+'/users/cp/updatedonate.php',
						data: {
							id: id,
							name: data[1],
							address: data[2],
							phone: data[3],
							value: data[4],
						},
						success: function(data){
							console.log(data);
							var json = JSON.parse(data);
							_flagLogin = false; 
							if(json.status){
								$("#result").text(json.msg);
							}
							else{
								$("#result").text(json.msg);
							}
						},
						error: function(e){
							console.log(e);
							_flagLogin = false; 
						}
					});
				}
			}
			function editDonate(){
				var data = [];
				var table = document.getElementById('donate-table');
				var tbody = table.children[1];
				var rows = tbody.children.length;
				var cols = tbody.children[0].children.length;
				for(var i=0;i<rows;i++){
					data = [];
					for(var j=0;j<cols-1;j++){
						data.push(tbody.children[i].children[j].innerHTML);
					}
					updateDonate(data);
				}
			}
			
			_show = false;
			function showAddDonate(){
				if(_show){
					$("#adddonate").css('display','none');
					_show = false;
				}
				else{
					$("#adddonate").css('display','block');
					_show = true;
				}
			}
			function addDonate(){
				if(!_flagLogin){
					_flagLogin = true;
					$.ajax({
						type: 'post',
						url: _hostname+'/users/cp/adddonate.php',
						data: {
							name: $("#addname").val(),
							address: $("#addaddress").val(),
							phone: $("#addphone").val(),
							value: $("#addvalue").val()
						},
						success: function(data){
							console.log(data);
							var json = JSON.parse(data);
							_flagLogin = false; 
							if(json.status){
								$("#result").text(json.msg);
								location.reload();
							}
							else{
								$("#result").text(json.msg);
							}
						},
						error: function(e){
							console.log(e);
							_flagLogin = false; 
						}
					});
				}
			}
			// Delete
			function deleteValue(config){
				$url = _hostname+'/users/cp/delete'+config.name+'.php';
				console.log($url,config);
				if(!_flagLogin){
					_flagLogin = true;
					var pop = new Popup({
						msg: "Bạn có chắc muốn xóa",
						_callback: function(){
							$.ajax({
								type: 'post',
								url: $url,
								data: {
									id: config.id
								},
								success: function(data){
									var json = JSON.parse(data);
									console.log(data);
									_flagLogin = false; 
									if(json.status){
										$("#result").text(json.msg);
										location.reload();
									}
									else{
										$("#result").text(json.msg);
									}
								},
								error: function(e){
									console.log(e);
									_flagLogin = false; 
								}
							});
						},
					back: function(){
						_flagLogin = false;
					}
					});
				}
			}
			
			/// Manager Link
			function updateLink(data){
				console.log(data)
				var id = data[0];
				if(!_flagLogin){
					_flagLogin = true; 
					$.ajax({
						type: 'post',
						url: _hostname+'/users/cp/updatelink.php',
						data: {
							id: id,
							url: data[2],
							img: data[3],
							info: data[1]
						},
						success: function(data){
							console.log(data);
							var json = JSON.parse(data);
							_flagLogin = false; 
							if(json.status){
								$("#result").text(json.msg);
							}
							else{
								$("#result").text(json.msg);
							}
						},
						error: function(e){
							console.log(e);
							_flagLogin = false; 
						}
					});
				}
			}
			function editLink(){
				var data = [];
				var table = document.getElementById('link-table');
				var tbody = table.children[1];
				var rows = tbody.children.length;
				var cols = tbody.children[0].children.length;
				for(var i=0;i<rows;i++){
					data = [];
					for(var j=0;j<cols-1;j++){
						data.push(tbody.children[i].children[j].innerHTML);
					}
					updateLink(data);
				}
			}
			
			function addLink(){
				if(!_flagLogin){
					_flagLogin = true;
					$.ajax({
						type: 'post',
						url: _hostname+'/users/cp/addlink.php',
						data: {
							url: $("#urllink").val(),
							img: $("#imglink").val(),
							info: $("#infolink").val()
						},
						success: function(data){
							var json = JSON.parse(data);
							_flagLogin = false; 
							if(json.status){
								$("#result").text(json.msg);
								location.reload();
							}
							else{
								$("#result").text(json.msg);
							}
						},
						error: function(e){
							console.log(e);
							_flagLogin = false; 
						}
					});
				}
			}
			
			function updateTitle(_id){
				if(!_flagLogin){
					_flagLogin = true;
					var editor = CKEDITOR.instances['editorID'].getData();
					if($(editor).text()==""||$("#title").val()==""){
						$("#result").text("Mời nhập đầy đủ thông tin");
					}
					$.ajax({
						type: "post",
						url: _hostname +"/users/cp/updatetitle.php",
						data: {
							id: _id,
							title: $("#title").val(),
							catalog: $("#catalog").val(),
							tag: $("#tag").val(),
							actor: $("#actor").val(),
							content: editor
						},
						success: function(data){
							var json = JSON.parse(data);
							_flagLogin = false;
							if(json.status){
								$("#result").text(json.msg);
								window.location = _hostname+"/users/manager-title.html";
							}
							else{
								$("#result").text(json.msg);
							}
						},
						error: function(e){
							_flagLogin = false;
							$("#result").text(e);
						}
					});	
				}
			};
			

			function updatePage(_id){
				if(!_flagLogin){
					_flagLogin = true;
					var editor = CKEDITOR.instances['editorID'].getData();
					if($(editor).text()==""||$("#title").val()==""){
						$("#result").text("Mời nhập đầy đủ thông tin");
					}
					$.ajax({
						type: "post",
						url: _hostname +"/users/cp/updatepage.php",
						data: {
							id: _id,
							title: $("#title").val(),
							content: editor
						},
						success: function(data){
							var json = JSON.parse(data);
							if(json.status){
								$("#result").text(json.msg);
								window.location = _hostname+"/users/list-page.html";
							}
							else{
								$("#result").text(json.msg);
							}
							_flagLogin = false;
						},
						error: function(e){
							_flagLogin = false;
							$("#result").text(e);
						}
					});	
				}
			};
			

			function addlinkimage(){
				if(!_flagLogin){
					_flagLogin = true;
					$.ajax({
						type: "post",
						url: _hostname +"/users/cp/slide.php",
						data: {
							url: $("#link").val(),
							info: $("#info").val()
						},
						success: function(data){
							var json = JSON.parse(data);
							_flagLogin = false;
							$("#result").text(json.msg);
							if(json.status){
								location.reload();
							}
						},
						error: function(e){
							$("#result").text(e);
							_flagLogin = false;
						}
					});	
				}
			}
			

			// User 
			function updateUser(data){
				var id = data[0];
				if(!_flagLogin){
					_flagLogin = true; 
					$.ajax({
						type: 'post',
						url: _hostname+'/users/cp/updateuser.php',
						data: {
							id: id,
							name: data[1],
							gid: $("#group-"+id).val(),
							info: data[3],
						},
						success: function(data){
							console.log(data);
							var json = JSON.parse(data);
							_flagLogin = false; 
							if(json.status){
								$("#result").text(json.msg);
							}
							else{
								$("#result").text(json.msg);
							}
						},
						error: function(e){
							console.log(e);
							_flagLogin = false; 
						}
					});
				}
			}
			function editUser(){
				var data = [];
				var table = document.getElementById('listperson');
				var tbody = table.children[1];
				var rows = tbody.children.length;
				var cols = tbody.children[0].children.length;
				for(var i=0;i<rows;i++){
					data = [];
					for(var j=0;j<cols-1;j++){
						data.push(tbody.children[i].children[j].innerHTML);
					}
					updateUser(data);
				}
			}
			function addUser(){
				if(!_flagLogin){
					_flagLogin = true;
					$.ajax({
						type: 'post',
						url: _hostname+'/users/cp/adduser.php',
						data: {
							name: $("#user").val(),
							pass: $("#pass").val(),
							gid: $("#group").val(),
							info: $("#info").val()
						},
						success: function(data){
							console.log(data);
							var json = JSON.parse(data);
							_flagLogin = false; 
							if(json.status){
								$("#result").text(json.msg);
								location.reload();
							}
							else{
								$("#result").text(json.msg);
							}
						},
						error: function(e){
							console.log(e);
							_flagLogin = false; 
						}
					});
				}
			}
			
			function searchfor(){
				window.location = _hostname+"/search/"+$("#searchfor").val()+"/?q="+$("#q").val();
			}
			function updateContact(){
				var editor = CKEDITOR.instances['editorID'].getData();
				if(!_flagLogin){
					_flagLogin = true; 
					$.ajax({
						type: 'post',
						url: _hostname+'/users/cp/updatecontact.php',
						data: {
							content: editor
						},
						success: function(data){
							console.log(data);
							var json = JSON.parse(data);
							_flagLogin = false; 
							if(json.status){
								$("#result").text(json.msg);
							}
							else{
								$("#result").text(json.msg);
							}
						},
						error: function(e){
							console.log(e);
							_flagLogin = false; 
						}
					});
				}
			}
			
			function sendcontact(){
					if(!_flagLogin){
						_flagLogin = true; 
						$.ajax({
							type: 'post',
							url: _hostname+'/cp/sendcontact.php',
							data: {
								name: $("#name").val(),
								mail: $("#mail").val(),
								content: $("#contentsend").val()
							},
							success: function(data){
								console.log(data);
								var json = JSON.parse(data);
								_flagLogin = false; 
								if(json.status){
									$("#resultsend").text(json.msg);
									location.reload();
								}
								else{
									$("#resultsend").text(json.msg);
									$("#resultsend").val("");
									$("#name").val("");
									$("#mail").val("");
								}
							},
							error: function(e){
								console.log(e);
								_flagLogin = false; 
							}
						});
					}
			}
			
			function deleteperson(_id){
				if(!_flagLogin){
					_flagLogin = true;
					var pop = new Popup({
						msg: "Xóa thành viên này sẽ gây mất dữ liệu các thành viên thuộc chi này<br><br> Bạn có muốn tiếp tục?",
						_callback: function(){
							_flagLogin = false;
							$.ajax({
								url: _hostname+"/users/cp/deleteperson.php",
								type: "post",
								data: {
									id: _id
								},
								success: function(data){
									var json = JSON.parse(data);
									console.log(json);
									if(json.status){
										console.log("Thành công!");
										location.reload();
									}
									else{
										console.log("Có lỗi xảy ra");
									}
								},
								error: function(e){
									console.log(e);
								}
							});
						},
						back: function(){
							_flagLogin = false;
						}
					})		
				}
			}
			

			//Class Popup
			function Popup(config){
				this.msg = config.msg;
				this.callback = config._callback;
				this.back = config.back;
				this._flag = false;
				$("body").append('<div id="popup">'
				+'<div class="border"><div class="head">Thông báo</div><div class="block"><div class="msg">'+this.msg+'</div><button id="yes" class="button">Tiếp tục</button><button id="no" class="button">Bỏ qua</button></div></div>'		
				+'</div>');
				var _self = this;
				$("#yes").click(function(){
					_self.hidden(true);
				});
				$("#no").click(function(){
					_self.hidden(false);
				});
				this.hidden = function(config){
					if(config)	this.callback();
					else	this.back();
					$("#popup").remove();
				}
			}



/////// MEDIA

			function switchAlbumMode(){
				var selectalbum = $(".select_album")[0];
				var inputalbum = $(".input_album")[0];
				var switchbtn = $(".switch_albummode")[0];
				if(selectalbum.style.display=='none'||(!selectalbum.style.display)){
					selectalbum.style.display = 'inline-block';
					inputalbum.style.display = 'none';
					switchbtn.innerHTML = 'Tạo album';
				} else {
					selectalbum.style.display = 'none';
					inputalbum.style.display = 'inline-block';
					switchbtn.innerHTML = 'Chọn album';
				}
			}
			

			function newAlbum(name,type){
				$.ajax({
					url: _hostname + "/users/cp/album.php",
					type: "POST",
					data: {
						"control": "new",
						"name": name,
					},
					success: function(result,status){
						if(status){
							var jsondata = JSON.parse(result);
							if(jsondata.status){
								saveMedia(type,jsondata.data.ID);
							} else {
								$("#result").text('Có lỗi xảy ra, tạo mới album không thành công !');
							}
						} else {
							$("#result").text('Internal server error, create album failed !');
						}
					},
				});
			}
			
			
			function deleteAlbum(object){
				var item = object[0].parentNode.parentNode;
				var aid = item.getElementsByClassName('hiddendata-aid')[0].value;
				if(!_flagLogin){
					_flagLogin  = true;
					var pop = new Popup({
						msg: "Bạn có chắc muốn xóa",
						_callback: function(){
							$.ajax({
								url: _hostname + "/users/cp/album.php",
								type: "POST",
								data: {
									"control": "delete",
									"id": aid,
								},
								success: function(result,status){
									_flagLogin = false;
									if(status){
										var jsondata = JSON.parse(result);
										if(jsondata.status){
											item.parentNode.removeChild(item);
										} else {
											$("#result").text('Có lỗi xảy ra, xóa album không thành công !');
										}
									} else {
										$("#result").text('Internal server error, delete album failed !');
									}
								},
							});
						},
						back: function(){
							_flagLogin = false;
						}
					})
				}
			}
			
			
			function saveMedia(type,albumid){
					var data = [];
					var confirm = document.getElementById('confirm-image');
					var items = confirm.getElementsByClassName('image-info');
					//fetch data to array and check requirement
					for(var i=0;i<items.length;i++){
						data[i] = {};
						data[i]["control"] = "new";
						data[i]['type'] = type;
						data[i]["link"] = items[i].getElementsByClassName('main-img')[0].title;
						data[i]["title"] = items[i].getElementsByClassName('img-title')[0].value;
						data[i]["aid"] = albumid;
					}
					// write database
					for(var i=0;i<data.length;i++){
						$.ajax({
							url: _hostname +"/users/cp/media.php",
							type: "POST",
							data: data[i],
							success: function(result,status){
								result = JSON.parse(result);
								if(result.status){
									$(".saveImage")[0].onclick = false;
									$(".saveImage")[0].value = result.msg;
									window.location = _hostname+"/users/manage-media.html"; 
								}
							},
						});
					}
			}
			
			function saveImageToDB(){
				var selectalbum = $(".select_album")[0];
				if(selectalbum.style.display!='none'||!selectalbum){
					var albumid = selectalbum.selectedOptions[0].value;
					saveMedia('image',albumid);
				} else {
					var albumname = $(".album_name")[0].value;
					if(albumname!='') newAlbum(albumname,'image');
					else {
						$(".album_name").css({
							'border': '1px solid rgb(200,0,0)',
						});
					}
				}
			}
			
			
			function saveVideoToDB(){
				var selectalbum = $(".select_album")[0];
				if(selectalbum.style.display!='none'||!selectalbum){
					var albumid = selectalbum.selectedOptions[0].value;
					saveMedia('video',albumid);
				} else {
					var albumname = $(".album_name")[0].value;
					if(albumname!='') newAlbum(albumname,'video');
					else {
						$(".album_name").css({
							'border': '1px solid rgb(200,0,0)',
						});
					}
				}
			}
			
			
			function removeItem(object){
				var item = object[0].parentNode.parentNode;
				item.parentNode.removeChild(item);
			}
					

			function renderAlbumSuccess(){
				var items = document.getElementsByClassName('image-info');
				var count = 0;
				var selected = false;
				for(var i=0;i<items.length;i++){
					
					items[i].getElementsByClassName('main-img')[0].addEventListener('click',function(){
						selected = false;
						for(var j=0;j<this.parentNode.classList.length;j++){
							if(this.parentNode.classList[j]=='media_selected'){
								selected = true;
								break;
							}
						}
						if(selected){
							deselectMedia(this.parentNode.parentNode);
							count--;
						} else {
							selectMedia(this.parentNode.parentNode);
							count++;
						}
					});
					
					items[i].getElementsByClassName('delete')[0].addEventListener('click',function(){
						delMedia(this.parentNode.parentNode);
					});
					
					items[i].getElementsByClassName('img-title')[0].addEventListener('change',function(){
						updateMedia(this.parentNode.parentNode);
					});
				}
			}

			
			function selectMedia(object){
				var target = object.getElementsByClassName('wrapp')[0]; 
				target.classList.remove('wrapp');
				target.classList.add('media_selected');
			}
			
			
			function deselectMedia(object){
				var target = object.getElementsByClassName('media_selected')[0]; 
				target.classList.remove('media_selected');
				target.classList.add('wrapp');
				
			}
			
			
			function delMedia(object){
				var imageid = object.getElementsByClassName('hiddendata-imageid')[0];
				if(!_flagLogin){
					_flagLogin = true;
					var pop = new Popup({
					msg: "Bạn có chắc muốn xóa",
					_callback: function(){
						$.ajax({
						url: _hostname + "/users/cp/media.php",
						type: "POST",
						data: {
							control: "delete",
							id: imageid.value,
						},
						success: function(result,status){
							result = JSON.parse(result);
							_flagLogin = false;
							if(result.status){
								object.parentNode.removeChild(object);
							} else {
								$("#result").text("Có lỗi xảy ra, xóa không thành công");
							}
						}
					});},
					back: function(){
						_flagLogin = false;
					}
				})}
			}
			
			
			function updateMedia(object){
				console.log(object);
				var input = object.getElementsByClassName('img-title')[0];
				var imgid = object.getElementsByClassName('hiddendata-imageid')[0];
				$.ajax({
					url: _hostname + "/users/cp/media.php",
					type: "POST",
					data: {
						control: "update",
						id: imgid.value,
						title: input.value,
					},
					success: function(result,status){
						result = JSON.parse(result);
						if(result.status){
							console.log(result);
						} else {
							$("#result").text("Có lỗi xảy ra, cập nhật không thành công");
						}
					}
				});
			}
			
			function viewMedia(object){
				var popup = new PopView();
				if(object.attr("_group")==2){
					popup.append("<img class='main-img' src='"+object.attr("_link")+"' />");
				} else if(object.attr("_group")==1){
					popup.append('<div class="main-video"><object width="560" height="315"><param name="movie" value="http://www.youtube.com/v/'+object.attr("_link").split("/watch?v=")[1]+'?version=3&amp;hl=vi_VN&amp;rel=0"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/'+object.attr("_link").split("/watch?v=")[1]+'?version=3&amp;hl=vi_VN&amp;rel=0" type="application/x-shockwave-flash" width="560" height="315" allowscriptaccess="always" allowfullscreen="true"></embed></object></div>')
				}
			}

			function updateSiteName(){
				$.ajax({
					url: _hostname + "/users/cp/updatesitename.php",
					type: "POST",
					data: {
						title: $("#namesite").val()
					},
					success: function(result,status){
						result = JSON.parse(result);
						if(result.status){
							$("#result").text(result.msg);
							location.reload();
						} else {
							$("#result").text("Có lỗi xảy ra, cập nhật không thành công");
						}
					}
				});
			}
			
			function PopView (){
				$("body").append("<div id='popup-view' style='display:block;'>"
						+"<div class='exit-view'></div>"
					+"</div>");
				var _self = this;
				$("#popup-view").click(function(){
					_self.hide();
				});
				this.hide = function(){
					$("#popup-view").remove();
				}
				return $("#popup-view");
			}
