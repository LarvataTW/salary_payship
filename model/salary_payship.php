<?php

class payship{
    var $db;

    var $date, $leave, $bonus, $annualbonus, $subsidy, $prepaid, $tax;
    var $laborinsur, $healthinsur, $leavededuct, $otherdeduct, $employee_id;

	function __construct($dbcon){
		echo 'monthly payship is  made<br>';
		$this->db = $dbcon;	
 	}

    public function initial($inputs) {
        $this->date             = $inputs['year'] . '-' . $inputs['month'] . '-'. '01';
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
        $this->employee_id      = $inputs['employee_id'];
        
    }

	public function create($inputs){
        $this->date             = $inputs['year'] . '-' . $inputs['month'] . '-'. '01';
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
        $this->employee_id      = $inputs['employee_id'];
        

        $insert_query = "INSERT INTO monthly_salary (date, leave, bonus, annualbonus, subsidy, prepaid, tax, laborinsur, healthinsur, leavededuct, otherdeduct, employee_id) VALUES ('$this->date', '$this->leave', '$this->bonus', '$this->annualbonus', '$this->subsidy', '$this->prepaid', '$this->tax', '$this->laborinsur', '$this->healthinsur', '$this->leavededuct', '$this->otherdeduct', '$this->employee_id')";

        if (mysqli_query($this->db, $insert_query)) {
            $outputs['status'] = 1;
            $outputs['errmsg'] = '';
        } else {
            $outputs['status'] = 0;
            $outputs['errmsg'] = mysqli_error($this->db);
        }

        return $outputs;
    }

    public static function find() {

    }
    /*
    public function save() {
        $insert_query = "INSERT INTO salary_payship (date, leave, bonus, annualbonus, subsidy, prepaid, tax, laborinsur, healthinsur, leavededuct, otherdeduct, employee_id) VALUES ('$date', '$leave', '$bonus', '$annualbonus', '$subsidy', '$prepaid', '$tax', '$laborinsur', '$healthinsur', '$leavededuct', '$otherdeduct', '$employee_id')";
    }
    */
		
}

function find_payship($dbcon, $sql_condition) {
    $sql_query = "SELECT * FROM salary_payship";
    if (isset($sql_condition) and !empty($sql_condition)) {
        $sql_query = $sql_query . ' WHERE ' . $sql_condition;
    }

    $payship_array = array();
    $counter = 0;

    $result = mysqli_query($dbcon, $sql_query);
    while ($row = mysqli_fetch_array($result)) {
        $payship_array[$counter] = new payship($dbcon);
        //$this->date             = $inputs['year'] . '-' . $inputs['month'] . '-'. '01';
        $inputs['leave']        = $row['leave'];
        $inputs['bonus']        = $row['bonus'];
        $inputs['annualbonus']  = $row['annualbonus'];
        $inputs['subsidy']      = $row['subsidy'];
        $inputs['prepaid']      = $row['prepaid'];
        $inputs['tax']          = $row['tax'];
        $inputs['laborinsur']   = $row['laborinsur'];
        $inputs['healthinsur']  = $row['healthinsur'];
        $inputs['leavededuct']  = $row['leavededuct'];
        $inputs['otherdeduct']  = $row['otherdeduct'];
        $inputs['employee_id']  = $row['employee_id'];
        $payship_array[$counter]->initial($inputs);

        print_r($row);
        echo '<br/>';
        print_r($payship_array);
        $counter++;
    }
    mysqli_free_result($result);
    return $payship_array;
}

?>
