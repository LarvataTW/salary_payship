<?php
include_once("hook.php");
include_once("model/employee.php");
$employee = new employee($dbcon);

//讀出
$employeeList = $employee->find();
$employeeA = $employee->find(2); 


?>