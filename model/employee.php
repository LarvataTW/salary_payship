<?php

class employee{

	public function __construct(){

	}

	public function create($inputs){
		$inputs=

		$insertSQL = "INSERT INTO employee (post_name, post_email, post_reply, post_topic, post_time, post_content, post_auth) VALUES ($name,$email, $id, 0, $time, '$content', 0)";
		$Result = mysql_query($insertSQL) or die(mysql_error());
		if(mysql_insert_id()){
			return mysql_insert_id();
		}else{
			return false;
		}
		
	}

?>