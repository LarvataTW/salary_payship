<?php
class DB{
    protected $dbhost = 'localhost:8888';
    protected $dbuser = 'admin';
    protected $dbpass = '123456';
    protected $dbname = 'salary_payship';
 
    function connect(){
    $conn = mysql_pconnect($this->$dbhost, $this->$dbuser, $this->$dbpass) or die('Error with MySQL connection');
    mysql_query("SET NAMES 'utf8'");
    mysql_select_db($this->$dbname);
    return $conn;
    }
}
?>