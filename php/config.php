<?php
$hostname = 'localhost:4306'; 
$username = 'user'; 
$password = 'test@123'; 
$database = 'vehiclemanage';

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
}

?>