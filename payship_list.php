<?php
require_once('hook.php');
require_once('model/salary_payship.php');

// year and month
$payship_array  = summarize_payship($dbcon, '2014-02-01');

//render payship_rows
$payship_rows   = '';

foreach ($payship_array as $item) {
$table_row = <<<EOD
<tr>
    <td>{$item['employee_id']}</td>
    <td>{$item['name']}</td>
    <td>{$item['basic_salary']}</td>
    <td>{$item['finalwage']}</td>
    <td></td>
</tr>
EOD;
    $payship_rows .= $table_row;
}


$html_content = <<<EOD
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



include 'layout_header';
echo $html_content;
include 'layout_footer';

?>
