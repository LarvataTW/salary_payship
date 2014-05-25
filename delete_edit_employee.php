<?php
ob_start();
include_once("hook.php");
include_once("model/employee.php");
$employee = new employee($dbcon);

if(isset($_GET['edit'])){
	//讀出並產出表單
	$employee2update = $employee->find($_GET['selectid']);
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
	echo '<form action="update_employee.php" method="post">';
	echo '<table>';
	foreach($employee2update as $item){
		echo '<tr><td>員工編號：</td><td><input type="text" name="eid" readonly="readonly" value="'.$item['eid'].'"></td></tr>';
		echo '<tr><td>員工姓名：</td><td><input type="text" name ="name" value="'.$item['name'].'"></td></tr>';
		echo '<tr><td>Email：</td><td><input type="text" name ="email" value="'.$item['email'].'"></td></tr>';
		echo '<tr><td>電話：</td><td><input type="text" name ="phone" value="'.$item['phone'].'"></td></tr>';
		echo '<tr><td>住址：</td><td><input type="text" name ="address" value="'.$item['address'].'"></td></tr>';
		echo '<tr><td>基本薪資：</td><td><input type="text" name ="basic_salary" value="'.$item['basic_salary'].'"></td></tr>';
		echo '<tr><td>銀行帳號：</td><td><input type="text" name ="bank_account" value="'.$item['bank_account'].'"></td></tr>';
		echo '<tr><td>年特休：</td><td><input type="text" name ="annual_leave="'.$item['annual_leave'].'"></td></tr>';
	}
	echo '<tr><td></td><td><input type="submit" value=send name="send"></td></tr>';
	echo '</table>';
	echo '</form>';

}else{
	// delete the item
	$employee->destroy($_GET['selectid']);
	header("location:employee_list.php");
}
ob_end_flush();
?>