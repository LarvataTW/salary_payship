<?php
require_once('hook.php');
require_once('model/employee.php');

class payship{
    var $db;

    var $date, $leave, $bonus, $annualbonus, $subsidy, $prepaid, $tax;
    var $laborinsur, $healthinsur, $leavededuct, $otherdeduct, $remark, $employee_id, $finalwage;

	function __construct($dbcon){
		//echo 'monthly payship is  made<br>';
		$this->db = $dbcon;	
 	}

    public function initial($inputs) {
        $this->date             = $inputs['date'];
        $this->leave            = $inputs['leave'];
        $this->bonus            = $inputs['bonus'];
        $this->annualbonus      = $inputs['annualbonus'];
        $this->subsidy          = $inputs['subsidy'];
        $this->prepaid          = $inputs['prepaid'];
        $this->tax              = $inputs['tax'];
        $this->laborinsur       = $inputs['laborinsur'];
        $this->healthinsur      = $inputs['healthinsur'];
        $this->leavededuct      = $inputs['leavededuct'];
        $this->otherdeduct      = $inputs['otherdeduct'];
        $this->employee_id      = $inputs['eid'];
        $this->remark           = $inputs['remark'];

        $employee       = new employee($this->db);
        $result         = $employee->find($this->employee_id);
        //$result         = $employee->find(4);

        if (empty($result)) {
            echo 'Error: There is no corresponding employee. <br/>';
            return 0;
        }
        $basic_salary = $result[0]['basic_salary'];
        $this->finalwage    = $basic_salary 
                            + $this->bonus
                            + $this->annualbonus
                            + $this->subsidy
                            + $this->prepaid
                            - $this->tax
                            - $this->leavededuct
                            - $this->otherdeduct
                            - $this->laborinsur
                            - $this->healthinsur;
        return 1;
    }
    
    public function save() {
        //echo "save()<br/>";
        $select_query = "SELECT * FROM monthly_salary WHERE employee_id='$this->employee_id' AND date='$this->date'";
        //echo "$select_query<br/>";
        $result = mysqli_query($this->db, $select_query);
        print_r($result);
        if ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $query = "UPDATE `monthly_salary` 
                        SET `leave`='$this->leave', 
                            `bonus`='$this->bonus', 
                            `annualbonus`='$this->annualbonus', 
                            `subsidy`='$this->subsidy',  
                            `prepaid`='$this->prepaid',
                            `tax`='$this->tax',
                            `laborinsur`='$this->laborinsur',
                            `healthinsur`='$this->healthinsur',
                            `leavededuct`='$this->leavededuct',
                            `otherdeduct`='$this->otherdeduct',
                            `finalwage`='$this->finalwage',
                            `remark`='$this->remark'
                        WHERE id='$id'";
        }
        else {
            // not knowing why this leads to error
            //$query = "INSERT INTO monthly_salary (date, leave, bonus, annualbonus, subsidy, prepaid, tax, laborinsur, healthinsur, leavededuct, otherdeduct, remark, finalwage, employee_id) VALUES ('$this->date', '$this->leave', '$this->bonus', '$this->annualbonus', '$this->subsidy', '$this->prepaid', '$this->tax', '$this->laborinsur', '$this->healthinsur', '$this->leavededuct', '$this->otherdeduct', '$this->remark', '$this->finalwage', '$this->employee_id')";
            $query = "INSERT INTO `monthly_salary`(`date`, `leave`, `bonus`, `annualbonus`, `subsidy`, `prepaid`, `tax`, `laborinsur`, `healthinsur`, `leavededuct`, `otherdeduct`, `remark`, `finalwage`, `employee_id`) VALUES ('$this->date','$this->leave','$this->bonus','$this->annualbonus','$this->subsidy','$this->prepaid','$this->tax','$this->laborinsur','$this->healthinsur','$this->leavededuct','$this->otherdeduct','$this->remark','$this->finalwage','$this->employee_id')";
        }
        mysqli_free_result($result);

        echo $query . '<br/>';
        if (!mysqli_query($this->db, $query)) {
            die('Error: ' . mysqli_error($this->db));
        }
    }
    public function destroy() {
        $delete_query = "DELETE FROM monthly_salary WHERE id='$this->id'";
        if (!mysqli_query($this->db, $query)) {
            die('Error: ' . mysqli_error($this->db));
        }
    }
}

function summarize_payship($dbcon, $date) {
    $sql_query = "SELECT employee.eid AS employee_id, employee.name AS name, employee.basic_salary AS basic_salary, monthly_salary.finalwage AS finalwage FROM employee INNER JOIN monthly_salary ON monthly_salary.employee_id=employee.eid WHERE monthly_salary.date='$date'";
    $result = mysqli_query($dbcon, $sql_query);
    if (!$result) {
        die('Error: ' . mysqli_error($this->db));
    }
    $summary = array();
    $counter = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $summary[$counter] = $row;
        $counter++;
    }
    return $summary;
}
?>
