
<!DOCTYPE html>
<html>
<head>
<title>Add New Employee</title>
<link type="text/css" rel="stylesheet" href="stylesheet.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
	<form action="add_employee_proces.php" method="post">
	<input type="text" name="name" placeholder="name">
	<input type="text" name="email" placeholder="email">
	<input type="text" name="phone">
	<input type="text" name="address">
	<input type="text" name="basicaccount">
	<input type="text" name="annual_leave">
	<input type=submit value="送出">
	<input type=submit value="送出後繼續新增">
	</form>
</body>


</html>

<!--
<?php
// preload all need files
// preload.php



// load needed model file
// ex: /model/employee.php
// $xxx = new employee();
// $xxx->create($data);


// controller logical area
$title = 'ffff'
$staffs = $xxx;


// load view file
// all variable can be used in view file
// require_once('view/add_em_form.php');

// end


// view template:
?>

<div class="cccc"><?php  echo $title; ?></div>
<input value="<?php  echo $basic_salry; ?>">
-->
