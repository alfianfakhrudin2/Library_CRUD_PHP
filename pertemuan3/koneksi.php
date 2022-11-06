<?php
// Server
$DB_HOST = 'localhost'; 
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'tokobukuxyz';

$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if(!$conn){
	echo "connect to database failed" . "<br><br>";
}
