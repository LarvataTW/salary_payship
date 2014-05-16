<?php
class DB{
    var $dbhost = 'localhost';
    var $dbuser = 'admin';
    var $dbpass = '123456';
    var $dbname = 'salary_payship';
 
    function connect(){
        $conn = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass) or die('Error with MySQL connection');
        mysqli_query($conn, "SET NAMES 'utf8'");
        mysqli_select_db($conn, $this->dbname);
        return $conn;
    }
}
?>