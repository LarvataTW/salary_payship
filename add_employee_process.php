<?php
require_once("hook.php");
require_once("model/employee.php");
$employee = new employee();

$formdata = array();
$formdata['name'] = (isset($_POST['name']))? $_POST['name'] : '';
$formdata['email'] = (isset($_POST['email']))? $_POST['email'] : '';
$formdata['phone'] = (isset($_POST['phone']))? $_POST['phone'] : '';
$formdata['address'] = (isset($_POST['address']))? $_POST['address'] : '';
$formdata['basicsalary'] = (isset($_POST['basicsalary']))? $_POST['basicsalary'] : '';
$formdata['bankaccout'] = (isset($_POST['bankaccout']))? $_POST['bankaccout'] : '';
$employee->create($formdata);



?>