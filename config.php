<?php

// just comment this line if get any error in the connection
// error_reporting(0);

$host           =       "localhost";
$user           =       "root";
$password       =       "";
$database       =       "jdbuilders";

$connection     =       new mysqli($host, $user, $password, $database);
$connection     =       mysqli_connect($host, $user, $password, $database);

if ($connection->connect_errno) {
    die("Connection failed! " . $connection->connect_errno);
}
