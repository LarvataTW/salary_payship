<?php
include('hook.php');
include('model/employee.php');

$employee = new employee($dbcon);
$employee_list = $employee->find();

$html_title = 'Add monthly salary';
$html_employee_select = '<select name="eid">';
foreach ($employee_list as $item) {
    $select_option  = '<option value="' . $item['eid']  .  '">' . $item['eid'] . '-' . $item['name']
                        . '</option>';
    $html_employee_select = $html_employee_select . $select_option;
}
$html_employee_select = $html_employee_select . '</select>';


$html_year_select = '<select name="year">';
for ($year = 2013; $year < 2020; $year++) {
    $html_year_select = $html_year_select . '<option value="' . $year . '">' . $year . '</option>';
}
$html_year_select = $html_year_select . '</select>';

$html_month_select = '<select name="month">';
for ($month = 1; $month <= 12; $month++) {
    $html_month_select = $html_month_select . '<option value="' . $month . '">' . $month . '</option>';
}
$html_month_select = $html_month_select . '</select>';
 
$html_content = <<<EOD
    <form action="monthly_salary_process.php" method="post">
    <input type="hidden" name="action" value="create"/>
    <h1>員工選擇</h1>
    <table>
        <tr>
            <td>員工姓名</td>
            <td>{$html_employee_select}</td>
        </tr>
        <tr>
            <td>發放月份</td>
            <td>Year: {$html_year_select} Month: {$html_month_select}</td>
        </tr>
        <tr>
            <td>請假日數</td>
            <td><input type="text" name="leave"/></td>
        </tr>
    </table>
    <h1>薪資加項</h1>
    <table>
        <tr>
            <td>年終獎金</td>
            <td><input type="text" name="annualbonus"/></td>
        </tr>
        <tr>
            <td>績效獎金</td>
            <td><input type="text" name="bonus"/></td>
        </tr>
        <tr>
            <td>津貼及其它加項</td>
            <td><input type="text" name="subsidy"/></td>
        </tr>
        <tr>
            <td>員工代墊</td>
            <td><input type="text" name="prepaid"/></td>
        </tr>
    </table>
    <h1>薪資扣項</h1>
    <table>
        <tr>
            <td>所得稅</td>
            <td><input type="text" name="tax"/></td>
        </tr>
        <tr>
            <td>勞保費</td>
            <td><input type="text" name="laborinsur"/></td>
        </tr>
        <tr>
            <td>健保費</td>
            <td><input type="text" name="healthinsur"/></td>
        </tr>
        <tr>
            <td>請假扣款</td>
            <td><input type="text" name="leavededuct"/></td>
        </tr>
        <tr>
            <td>其它扣項</td>
            <td><input type="text" name="otherdeduct"/></td>
        </tr>
        <tr>
            <td>備註</td>
            <td><input type="text" name="remark"/></td>
        </tr>
    </table>
    <input type="submit" value="send" name="send"/>
    <input type="submit" value="send and continue to add" name="sendandcont"/>
    </form>
EOD;
include('layout_header.php');
echo $html_content;
include('layout_footer.php');

?>
