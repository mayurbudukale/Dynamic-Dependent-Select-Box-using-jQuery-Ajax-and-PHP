<?php
//Database credentials
$dbHost     = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName     = 'country';

//Connect and select the database
$db = new mysqli('localhost', 'root', '', 'country');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>