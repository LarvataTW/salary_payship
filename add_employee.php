
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add New Employee</title>
<link type="text/css" rel="stylesheet" href="css/stylesheets/style.css">
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="larvata_payship.js"></script>
</head>
<body>
	<?php
	require_once("header.php");
	?>
	<div class = "content_wrapper_add_employee">
	<div class = "form_block1" >
		<form action="add_employee_process.php" method="post">
			<h1 >新增員工</h1>
			<div class="row"><label class = "formm">姓名：</label><input class = "inputform" type="text" name="name" placeholder="name"></div>
			<div class="row"><label class = "formm">Email：</label><input class = "inputform" type="text" name="email" placeholder="email"></div>
			<div class="row"><label class = "formm">電話：</label><input class = "inputform" type="text" name="phone" placeholder="phone"></div>
			<div class="row"><label class = "formm">地址：</label><input class = "inputform" type="text" name="address" placeholder="address"></div>
			<div class="row"><label class = "formm">基本薪資：</label><input class = "inputform" type="text" name="basic_salary" placeholder="basic_salary"></div>
			<div class="row"><label class = "formm">銀行帳號：</label><input class = "inputform" type="text" name="bank_account" placeholder="bank_account"></div>
			<div class="row"><label class = "formm">特休：</label><input class = "inputform" type="text" name="annual_leave" placeholder="annual_leave"></div>
			<div class="row"><input class = "inputbuttom left"  type=submit value="send" name="send" >
			<div class="row"><input class = "inputbuttom right"  type=submit value="send and continue to add" name="sendandcon">

		</form>
	</div>
</body>


</html>


