<h1>Thêm trang mới</h1>
<?php
	if(!isset($_SESSION["userType"])||$_SESSION["userType"]!=1)	die("<h2>Chức năng chỉ dành cho Quản trị viên!</h2>");
?>
										<h2> Tên trang:</h2> <input id='title' type='text' placeholder='Tên Trang'/><br>
										<h2>Nội dung: </h2>
										<textarea id='editorID' name='editorID'></textarea>
												<script>
														CKEDITOR.replace( 'editorID', {
																		fullPage: true,
																		allowedContent: true,
																		language: 'vi',
																		enterMode: CKEDITOR.ENTER_DIV,
																		});
												</script>
									<input type='button' class='sendTITLE' value='Xong' onClick='sendPage()'>
									<div id='result'></div>