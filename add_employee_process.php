<?php
require_once("hook.php");
require_once("model/employee.php");


$sql="INSERT INTO employee (name, email, phone, address, basicsalary, bankaccout, annual_leave)
VALUES ('$_POST[name]','$_POST[email]','$_POST[phone]','$_POST[address],'$_POST[basicsalary]','$_POST[bankaccout]','$_POST[annual_leave]')";



?>