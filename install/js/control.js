function toAccept(){
	$("#copyright").css('display','none');
	$("#form").css('display','block');
}
function install(){
			var sitename = $("#sitename").val();
			var hosting = $("#hosting").val();
			var dataname = $("#dataname").val();
			var dataacc = $("#dataacc").val();
			var datapass = $("#datapass").val();
			var acc = $("#acc").val();
			var pass = $("#pass").val();
			var confirmpass = $("#confirmpass").val();
			var admininfo = $("#admininfo").val();
			if(sitename==''||hosting==''||dataacc==''||dataname==''||acc==''||pass==''||confirmpass==''){
				alert("Mời nhập đầy đủ thông tin có dấu (*)");
			}
			else if(confirmpass!=pass){
				alert("Mật khẩu gõ 2 lần không giống nhau");
			}
			else{
				$("#form").css('display','none');
				$("#result").css('display','block');
				var con = new Working("Test Connect Database","./cp/connectDB.php",{server: hosting,user: dataacc,pass: datapass, dbname: dataname});
				con.ajax.complete(function(){
					if(con.toNext){
						var db = new Working("Make Database","./cp/makeDatabase.php",{server: hosting,user: dataacc,pass: datapass, dbname: dataname});
						db.ajax.complete(function(){
							if(db.toNext){
								var sn = new Working("Make Site Name","./cp/makesiteinfo.php",{server: hosting,user: dataacc,pass: datapass, dbname: dataname, sitename: sitename});	
								sn.ajax.complete(function(){
									if(sn.toNext){
										var ad = new Working("Make Account Admin","./cp/makeadmin.php",{server: hosting,user: dataacc,pass: datapass, dbname: dataname, adminpass: pass, adminacc:acc,admininfo:admininfo});
										ad.ajax.complete(function(){
											if(ad.toNext){
												var cf = new Working("Make Config","./cp/makeconfig.php",{server: hosting,user: dataacc,pass: datapass, dbname: dataname});
												cf.ajax.complete(function(){
													if(cf.toNext){
														var ctr = new Working("Delete Control Install","./cp/deleteinstall.php",{});
														ctr.ajax.complete(function(){
															if(ctr.toNext){
																$("#finish").css('display','block');
															}
														});
													}
												});
											}
										});
									}
								});
							}
						});
					}
				})
			}
		}
function Working(_msg,_url,_data){
	this.toNext = true;
	var _self = this;
	var result = $("#resultcontent");
	result.append(_msg+"...<br/>")
	this.ajax = $.ajax({
		url: _url,
		type: 'post',
		data: _data,
		success: function(data){
				var json = JSON.parse(data);
				if(json.type==1){
					result.append(json.msg+"...  "+json.status+"<br/>");
					if(!json.status){
						_self.toNext = false;
					}
				}
				else if(json.type==2){
					$.each(json, function(i,d){
						if(i!='type'){
							result.append(d.msg+"...  "+d.status+"<br/>");
							if(!d.status){
								_self.toNext = false;
							}
						}
					});
				}
		}
	});
}
function onFinish(){
	window.location = "../users";
}