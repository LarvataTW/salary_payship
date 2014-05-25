<?php
require_once('hook.php');
require_once('salary_payship.php');

// year and month
$sql_condition  = "";
$payship_array  = find_payship($dbcon, $sql_condition);

//render payship_rows
$payship_rows   = '';
foreach ($payship_array as $payship) {

    $table_row = <<<EOD
<tr>
    <td>{$payship->employee_id}</td>
    <td></td>
    <td>bonus:{$payship->bonus}</td>
    <td>subsidy:{$payship->subsidy}</td>
    <td></td>
</tr>
EOD;
    $payship_rows = $payship_rows . $table_row;
}

$html_content = <<<EOD
<table>
    <th>
        <td>員工編號</td>
        <td>員工姓名</td>
        <td>基本薪資</td>
        <td>實領薪資</td>
        <td>操作</td>
    </th>
    {$payship_rows}
</table>
EOD;



include 'layout_header';
echo $html_content;
include 'layout_footer';

?>
