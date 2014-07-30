<?php
ob_start();
include_once("hook.php");
include_once("model/employee.php");
$employee = new employee($dbcon);
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Laravata Payship system</title>
	<link type="text/css" rel="stylesheet" href="stylesheet.css">	
	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="larvata_payship.js"></script>
</head>
<body>
<?php 
require_once("header.php");
if(isset($_GET['edit'])){
	//讀出並產出表單
	$employee2update = $employee->find($_GET['selectid']);
?>
	<div class="content_wrapper"><form action="update_employee.php" method="post">
		<table>
		<?php foreach($employee2update as $item){ ?>
		<tr><td>員工編號：</td><td><input type="text" name="eid" readonly="readonly" <?php echo 'value="'.$item['eid'].'"' ?>></td></tr>
		<tr><td>員工姓名：</td><td><input type="text" name ="name" <?php echo 'value="'.$item['name'].'"' ?> ></td></tr>
		<tr><td>Email：</td><td><input type="text" name ="email" <?php echo 'value ="'.$item['email'].'"'?>></td></tr>
		<tr><td>電話：</td><td><input type="text" name ="phone" <?php echo 'value="'.$item['phone'].'"' ?>></td></tr>
		<tr><td>住址：</td><td><input type="text" name ="address" <?php echo 'value="'.$item['address'].'"'?>></td></tr>
		<tr><td>基本薪資：</td><td><input type="text" name ="basic_salary" <?php echo 'value="'.$item['basic_salary'].'"'?>></td></tr>
		<tr><td>銀行帳號：</td><td><input type="text" name ="bank_account" <?php echo 'value="'.$item['bank_account'].'"'?>></td></tr>
		<tr><td>年特休：</td><td><input type="text" name ="annual_leave=" <?php echo 'value="'.$item['annual_leave'].'"' ?>></td></tr>
	
	<tr><td></td><td><input type="submit" value=send name="send"></td></tr>
	</table>
	</form></div>

<?php
		}
}else{
	// delete the item
	$employee->destroy($_GET['selectid']);
	header("location:employee_list.php");
}
ob_end_flush();
?>