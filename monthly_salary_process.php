<?php
require_once('hook.php');
require_once('model/salary_payship.php');
/*
function check_test() {
    echo $_POST['subsidy'] . '<br/>';
    if (isset($_POST['subsidy']) and is_int($_POST['subsidy'])) {
        echo "subsidy OK";
    }
    else {
        echo "subsidy fails";
    }
    $aa = "23.56";
    $aaa = (int)$aa;
    echo '<br/>' . $aaa;
    if (isset($_POST['tax'])) {
        echo 'ggg is set';
    }
    else {
        echo 'ggg is not set.';
    }
}
 */
function regulate_payship_input() {
    if (isset($_POST['year']) and is_numeric($_POST['year']) 
        and isset($_POST['month']) and is_numeric($_POST['month'])) {
        $month = sprintf("%02d", $_POST['month']);
        $inputs['date'] = $_POST['year'] . '-' . $month . '-' . '01';
    }
    else {
        return 0;
    }
    if (isset($_POST['leave']) and is_numeric($_POST['leave'])) {
        $inputs['leave'] = $_POST['leave'];
    }
    else {
        return 0;
    }

    if (isset($_POST['eid']) and is_numeric($_POST['eid'])) {
        $inputs['eid'] = $_POST['eid'];
    }
    else {
        return 0;
    }
    if (isset($_POST['bonus']) and is_numeric($_POST['bonus'])) {
        $inputs['bonus'] = $_POST['bonus'];
    }
    else {
        return 0;
    }
    if (isset($_POST['annualbonus']) and is_numeric($_POST['annualbonus'])) {
        $inputs['annualbonus'] = $_POST['annualbonus'];
    }
    else {
        return 0;
    }
    if (isset($_POST['subsidy']) and is_numeric($_POST['subsidy'])) {
        $inputs['subsidy'] = $_POST['subsidy'];
    }
    else {
        return 0;
    }
    if (isset($_POST['prepaid']) and is_numeric($_POST['prepaid'])) {
        $inputs['prepaid'] = $_POST['prepaid'];
    }
    else {
        return 0;
    }
    if (isset($_POST['tax']) and is_numeric($_POST['tax'])) {
        $inputs['tax'] = $_POST['tax'];
    }
    else {
        return 0;
    }
    if (isset($_POST['laborinsur']) and is_numeric($_POST['laborinsur'])) {
        $inputs['laborinsur'] = $_POST['laborinsur'];
    }
    else {
        return 0;
    }
    if (isset($_POST['healthinsur']) and is_numeric($_POST['healthinsur'])) {
        $inputs['healthinsur'] = $_POST['healthinsur'];
    }
    else {
        return 0;
    }
    if (isset($_POST['leavededuct']) and is_numeric($_POST['leavededuct'])) {
        $inputs['leavededuct'] = $_POST['leavededuct'];
    }
    else {
        return 0;
    }
    if (isset($_POST['otherdeduct']) and is_numeric($_POST['otherdeduct'])) {
        $inputs['otherdeduct'] = $_POST['otherdeduct'];
    }
    else {
        return 0;
    }
    if (isset($_POST['remark'])) {
        //$inputs['remark'] = mysqli_real_escape_string($_POST['remark']);  //bug to be fixed
        $inputs['remark'] = $_POST['remark'];
    }
    else {
        return 0;
    }
    return $inputs;
}

function create_payship($db) {
    $inputs = regulate_payship_input();
    print_r($inputs);

    if (0 == $inputs) {
        header("location:add_monthly_salary.php?error=1");
    }
    else {
        $payship = new payship($db);
        if (0 == $payship->initial($inputs)) {
            echo 'Fail to initialize the payship. <br/>';
            return 0;
        }
        print_r($payship);
        $payship->save();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ($_GET['action'] == 'delete') {
        $payship = new payship($db);
        $payship->id = $_GET['id'];
        $payship->destroy();
        header('Loation: payship_list.php');
    }
}
else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['action'] == 'create') {
        echo "gggg";
        create_payship($dbcon);
        if (isset($_POST['send'])) {
            header("Location: payship_list.php");
        }
        else {
            header("Location: add_monthly_salary.php");
        }
    }
    else if ($_POST['action'] == 'update') {
        update_payship();
    }
}
?>
