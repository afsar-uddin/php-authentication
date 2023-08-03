<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'php_authentication';

$con = mysqli_connect($hostname, $username, $password, $dbname);

if(!$con) {
    die('Could not connect: ' . mysql_error());
}
echo "Connected successfully!";






?>