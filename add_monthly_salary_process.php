<?php
include_once("hook.php");
include_once("model/monthly_salary.php");
$m_payship = new payship($dbcon);

//寫入
$formdata = array();
// $formdata['name'] = (isset($_POST['name']))? $_POST['name'] : '';

$m_payship->create($formdata);


//轉跳
if(isset($_POST['send'])){
	// header("location:add_monthly_salary.php");
	echo "send function works";
}else{
	// header("location:payship_list.php");
	echo "back to add";
}

?>