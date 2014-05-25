<?php

class employee{
	var $db;
	function __construct($dbcon){
		$this->db = $dbcon;	
 	}

	public function create($inputs=NULL){
		$post_name=$inputs['name'];
		$post_email=$inputs['email'];
		$post_phone=$inputs['phone'];
		$post_address=$inputs['address'];
		$post_salary=$inputs['basic_salary'];
		$post_baccount=$inputs['bank_account'];
		$post_anl=$inputs['annual_leave'];

		$neweid = $this->db->query("SELECT max(eid) from employee ;");
		$max = mysqli_fetch_row($neweid) ;
		$maxid=$max[0]+1;

	
		mysqli_query($this->db, "INSERT INTO employee (eid, name, email, phone, address, basic_salary, bank_account, annual_leave) 
			VALUES ('$maxid', '$post_name', '$post_email', '$post_phone', '$post_address', '$post_salary', '$post_baccount', '$post_anl')");
	}
	
	public function find($condition=NULL){
		$extraQuery = '';
		if(isset($condition)){
			$extraQuery.= ' WHERE eid ="'.$condition.'"';
		}

		$result = $this->db->query('SELECT * FROM employee'.$extraQuery);
		$dataArray = array();
		while($employeefield = mysqli_fetch_assoc($result)){
			$dataArray[] = $employeefield;
		}
		return $dataArray;
	}

	public function update($inputs=NULL){
		$post_eid=$inputs['eid'];
		$post_name=$inputs['name'];
		$post_email=$inputs['email'];
		$post_phone=$inputs['phone'];
		$post_address=$inputs['address'];
		$post_salary=$inputs['basic_salary'];
		$post_baccount=$inputs['bank_account'];
		$post_anl=$inputs['annual_leave'];

		mysqli_query($this->db, "UPDATE employee 
			SET name ='$post_name', 
				email = '$post_email', 
				phone = '$post_phone', 
				address='$post_address', 
				basic_salary = 'basic_salary', 
				bank_account = '$post_baccount', 
				annual_leave = '$post_anl'
			WHERE eid ='$post_eid'"); 


	}
		
	public function destroy($condition=NULL){
		//delete
		mysqli_query($this->db, "DELETE FROM employee WHERE eid=$condition");

	}
}

?>