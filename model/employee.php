<?php

class employee{

	public function __construct(){

	}

	public function create($inputs){
		$post_name=$inputs['name'];
		$post_email=$inputs['email'];
		$post_phone=$inputs['phone'];
		$post_address=$inputs['address'];
		$post_baccount=$inputs['basicaccout'];
		$post_anl=$inputs['annual_leave'];

		$insertSQL = "INSERT INTO employee (name, email, phone, address, basicaccout, annual_leave) VALUES ($post_name, $post_email, $post_phone, $post_address, $post_baccount, $post_anl)";
		$Result = mysql_query($insertSQL) or die(mysql_error());
		if(mysql_insert_id()){
			return mysql_insert_id();
		}else{
			return false;
		}
		
	}

?>