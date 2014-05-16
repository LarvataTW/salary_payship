<?php

class employee{
	var $db;
	function __construct($dbcon){
		echo 'employee made<br>';
		$this->db = $dbcon;	
 	}

	public function create($inputs){
		$post_name=$inputs['name'];
		$post_email=$inputs['email'];
		$post_phone=$inputs['phone'];
		$post_address=$inputs['address'];
		$post_salary=$inputs['basic_salary'];
		$post_baccount=$inputs['bank_account'];
		$post_anl=$inputs['annual_leave'];
		print_r($inputs);
		$neweid = "1";
	
		mysqli_query($this->db, "INSERT INTO employee (eid, name, email, phone, address, basic_salary, bank_account, annual_leave) 
			VALUES ('$neweid', '$post_name', '$post_email', '$post_phone', '$post_address', '$post_salary', '$post_baccount', '$post_anl')");
		echo "succ insert<br>";
	}
		
}

?>