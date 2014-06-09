<?php
require_once('hook.php');
require_once('model/salary_payship.php');

define("MIN_SEL_YEAR", 2013);
define("MAX_SEL_YEAR", 2030);
define("MIN_SEL_MONTH", 1);
define("MAX_SEL_MONTH", 12);


function regulate_year_input() {
    $result = array();
    if (!isset($_POST['year']) or !is_numeric($_POST['year'])) {
        $result['status'] = 'unspecified';
        $result['year'] = date('Y');
    } elseif ($_POST['year'] < MIN_SEL_YEAR) {
        $result['status'] = 'min';
        $result['year'] = MIN_SEL_YEAR;
    } elseif ($_POST['year'] > MAX_SEL_YEAR) {
        $result['status'] = 'max';
        $result['year'] = MAX_SEL_YEAR;
    } else {
        $result['status'] = 'valid';
        $result['year'] = $_POST['year'];
    }
    return $result;
}

function regulate_month_input() {
    $result = array();
    if (!isset($_POST['month']) or !is_numeric($_POST['month'])) {
        $result['status'] = 'unspecified';
        $result['month'] = sprintf("%02d", date('m'));
    } elseif ($_POST['month'] < MIN_SEL_MONTH) {
        $result['status'] = 'min';
        $result['month'] = MIN_SEL_MONTH;
    } elseif ($_POST['month'] > MAX_SEL_MONTH) {
        $result['status'] = 'max';
        $result['month'] = MAX_SEL_MONTH;
    } else {
        $result['status'] = 'valid';
        $result['month'] = sprintf("%02d", $_POST['month']);

    }
    return $result;

}

function set_list_content($dbcon, $year_info, $month_info) {

    // message processing, to add later

    $payship_date = $year_info['year'] . '-' . $month_info['month'] . '-' . '01';
    echo "payship_date=$payship_date" . '<br/>';
    $payship_array = summarize_payship($dbcon, $payship_date); 

    if (empty($payship_array)) {
        $html_list_content = "No payship is created for the specified month.";
        return $html_list_content;
    }
    
    //render payship_rows
    $payship_rows   = '';

    foreach ($payship_array as $item) {
$table_row = <<<EOD
    <tr>
        <td>{$item['employee_id']}</td>
        <td>{$item['name']}</td>
        <td>{$item['basic_salary']}</td>
        <td>{$item['finalwage']}</td>
        <td><a href="edit_monthly_salary.php?action=edit">Edit</a> <a href="monthly_salary_process.php?action=delete&id={$item['payship_id']}">Delete</a></td>
    </tr>
EOD;
    $payship_rows .= $table_row;

    }


$html_list_content = <<<EOD
    <table>
        <tr>
            <td>員工編號</td>
            <td>員工姓名</td>
            <td>基本薪資</td>
            <td>實領薪資</td>
            <td>操作</td>
        </tr>
        {$payship_rows}
    </table>
EOD;

    return $html_list_content;

}

 
$year_info = regulate_year_input();
$month_info = regulate_month_input();

print_r($year_info);
echo '<br/>';
print_r($month_info);

$html_year_select = '<select name="year">';
for ($year = MIN_SEL_YEAR; $year <= MAX_SEL_YEAR; $year++) {
    if ($year != $year_info['year']) {
        $html_year_select .= '<option value="' . $year . '">' . $year . '</option>';
    } else {
        $html_year_select .= '<option value="' . $year . '" selected>' . $year . '</option>';
    }

}
$html_year_select .= '</select>';

$html_month_select = '<select name="month">';
for ($month = MIN_SEL_MONTH; $month <= MAX_SEL_MONTH; $month++) {
    $month_value = sprintf("%02d", $month);
    if ($month_value != $month_info['month']) {
        $html_month_select .= '<option value="' . $month_value . '">' . $month_value . '</option>';
    } else {
        $html_month_select .= '<option value="' . $month_value . '" selected>' . $month_value . '</option>';
    }
}
$html_month_select = $html_month_select . '</select>';

$html_form = <<<EOD
<div>
    <form action="payship_list.php" method="post">
    快速查詢發放月份：Year {$html_year_select} Month {$html_month_select} 
    <input type="submit" value="Submit" name="submit"/>
    </form>
</div>
EOD;

$html_list_content = set_list_content($dbcon, $year_info, $month_info);

include 'layout_header';
echo $html_form;
echo $html_list_content;
include 'layout_footer';

?>
