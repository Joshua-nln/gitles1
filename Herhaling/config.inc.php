<?php

//Database Login details
$db_hostname = 'localhost';
$db_username = '85671';
$db_password = '@C00Ch13';
$db_database = '85671_Leerjaar_2';

//Database connection
$mysqli = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

//If it can't connect to database
if (!$mysqli) {
    echo "Fout: geen connnectie naar database. <br>";
    echo "Errno: " . mysqli_connect_errno() . "<br>";
    echo "Error: " . mysqli_connect_error() . "<br>";
    exit;
}
//Error reporting
error_reporting(E_WARNING);
ini_set('display_errors', 1);
