
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
<link type="text/css" rel="stylesheet" href="css/stylesheets/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
	<?php
	require_once("header.php");
	?>
	<div class="content_wrapper_employee_list">
		<div class="wrapper_block2">
			<h1>員工清單</h1>
			<form action="delete_edit_employee.php" action="get">
			<table class="form_table" >
				<tr>
					<th width="20">選擇</th>
					<th width="40">編號</th>
					<th width="90">姓名</th>
					<th width="180">E-mail</th>
					<th width="120">電話</th>
					<th width="300">地址</th>
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
			</table>	
			<input class="inputbuttom input_buttom" type="submit" value="edit" name="edit"><input class="inputbuttom input_buttom" type="submit" value="delete" name="delete"></div>
			</form>
		</div>
	</div>
</body>


</html>
