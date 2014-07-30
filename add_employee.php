
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
	<div class = "content_wrapper" >
		<div class = "jump1" >	
		<form action="add_employee_process.php" method="post">
		
			<label class = "formm">姓名：</label><input class = "inputform" type="text" name="name" placeholder="name"></br>
			<label class = "formm">Email：</label><input class = "inputform" type="text" name="email" placeholder="email"></br>
			<label class = "formm">電話：</label><input class = "inputform" type="text" name="phone" placeholder="phone"></br>
			<label class = "formm">地址：</label><input class = "inputform" type="text" name="address" placeholder="address"></br>
			<label class = "formm">基本薪資：</label><input type="text" name="basic_salary" placeholder="basic_salary"></br>
			<label class = "formm">銀行帳號：</label><input type="text" name="bank_account" placeholder="bank_account"></br>
			<label class = "formm">特休：</label><input type="text" name="annual_leave" placeholder="annual_leave"></br>
			<input type=submit value="send" name="send" >
			<input type=submit value="send and continue to add" name="sendandcon">

		</form>
		</div>
	</div>
</body>


</html>


