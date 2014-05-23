<!-- Here is controller -->
<?php
include_once("hook.php");
include_once("model/employee.php");
$employee = new employee($dbcon);

//讀出
$employeeList = $employee->find();
// $condition['eid'] = 2;
// $employeeA = $employee->find($condition); 
?>



<!-- Here is view -->
<!DOCTYPE html>
<html>
<head>
<title>Employee List</title>
<link type="text/css" rel="stylesheet" href="stylesheet.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
foreach($employeeList as $item){
	echo $item['name'];


}


?>
	
</body>


</html>
