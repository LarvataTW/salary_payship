<?php
ob_start();
include_once("hook.php");
include_once("model/employee.php");
$employee = new employee($dbcon);

//寫入
$formdata = array();
$formdata['eid'] = (isset($_POST['eid']))? $_POST['eid'] : '';
$formdata['name'] = (isset($_POST['name']))? $_POST['name'] : '';
$formdata['email'] = (isset($_POST['email']))? $_POST['email'] : '';
$formdata['phone'] = (isset($_POST['phone']))? $_POST['phone'] : '';
$formdata['address'] = (isset($_POST['address']))? $_POST['address'] : '';
$formdata['basic_salary'] = (isset($_POST['basic_salary']))? $_POST['basic_salary'] : '';
$formdata['bank_account'] = (isset($_POST['bank_account']))? $_POST['bank_account'] : '';
$formdata['annual_leave'] = (isset($_POST['annual_leave']))? $_POST['annual_leave'] : '';
$employee->update($formdata);

header("location:employee_list.php");
ob_end_flush();
?>