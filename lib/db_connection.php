<?php
class DBcon{
    var $dbhost = 'localhost';
    var $dbuser = 'admin';
    var $dbpass = '123456';
    var $dbname = 'salary_payship';

    function __construct(){
    }
 
    function connect(){
        $conn = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname) or die('Error with MySQL connection'. mysqli_error($conn));
        mysqli_query($conn, "SET NAMES 'utf8'");
        return $conn;    
    }
}
?>