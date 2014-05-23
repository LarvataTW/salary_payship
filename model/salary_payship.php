<?php

class payship{
	var $db;
	function __construct($dbcon){
		echo 'monthly payship is  made<br>';
		$this->db = $dbcon;	
 	}

	public function create($inputs){
		$post_name=$inputs['name'];
		
	
		// mysqli_query($this->db, "INSERT INTO employee (eid, name, email, phone, address, basic_salary, bank_account, annual_leave) VALUES ($neweid, $post_name, $post_email, $post_phone, $post_address, $post_salary, $post_baccount, $post_anl)");		
	}

		
}

?>