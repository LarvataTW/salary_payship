
<?php
//Here is controller
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
	<div class="body">
		<form action="delete_edit_employee.php" action="get">
		<table id ="01" >
			<tr>
				<th>選擇</th>
				<th>員工編號</th>
				<th>姓名</th>
				<th>E-mail</th>
				<th>電話</th>
				<th>地址</th>
				<th>銀行帳號</th>
			</tr>
	<?php
	foreach($employeeList as $item){
		echo '<tr>';
		echo '<td><input type="radio" name="selectid" value="'.$item['eid'].'"></td>';
		echo '<td>'.$item['eid'].'</td>';
		echo '<td>'.$item['name'].'</td>';
		echo '<td>'.$item['email'].'</td>';
		echo '<td>'.$item['phone'].'</td>';
		echo '<td>'.$item['address'].'</td>';
		echo '<td>'.$item['bank_account'].'</td>';
		echo '</tr>';
	}
	?>
			<tr>
				<td><input type="submit" value="edit" name="edit"></td>
				<td><input type="submit" value="delete" name="delete"></td>
			</tr>
		</form>
		</table>	
	</div>
</body>


</html>
