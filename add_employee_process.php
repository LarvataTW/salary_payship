<?php
include_once("hook.php");
include_once("model/employee.php");
$employee = new employee($dbcon);

//寫入
$formdata = array();
$formdata['name'] = (isset($_POST['name']))? $_POST['name'] : '';
$formdata['email'] = (isset($_POST['email']))? $_POST['email'] : '';
$formdata['phone'] = (isset($_POST['phone']))? $_POST['phone'] : '';
$formdata['address'] = (isset($_POST['address']))? $_POST['address'] : '';
$formdata['basic_salary'] = (isset($_POST['basic_salary']))? $_POST['basic_salary'] : '';
$formdata['bank_account'] = (isset($_POST['bank_account']))? $_POST['bank_account'] : '';
$formdata['annual_leave'] = (isset($_POST['annual_leave']))? $_POST['annual_leave'] : '';
$employee->create($formdata);


//轉跳
if(isset($_POST['send'])){
	// header("location:add_employee.php");
	echo "send function works";
}else{
	// header("location:employee_list.php");
	echo "back to add";
}

?>