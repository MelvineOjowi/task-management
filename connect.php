<?php
session_start();

// Establish database connection (update with your credentials)
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'logindatabase';

$con = mysqli_connect($host, $username, $password, $database);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>
