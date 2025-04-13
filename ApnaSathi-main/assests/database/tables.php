<?php
/*
Date: 19/08/2024
This file is for the handling the task to create the tables for the already created  database.
database name: apnaSathi_DB
Please note: the database is created in the same folder.
check the code for more info.
*/

$host = "localhost";
$user = "root";
$password = "";
$db_name = "apnaSathi_DB";
//establishing the connection.
$con = mysqli_connect ($host, $user, $password, $db_name);


if(!isset($con)) {
    echo "Not able to establish the connection!";
} else {
    echo "Connection established Successfully!";
    $myQuery = "CREATE TABLE admin_info(
        admin_id INT AUTO_INCREMENT PRIMARY KEY,
        admin_email VARCHAR(100) NOT NULL UNIQUE,
        admin_password VARCHAR(100) NOT NULL,
        admin_name VARCHAR(100) NOT NULL,
        admin_phone_number VARCHAR(100) NOT NULL UNIQUE,
        admin_role ENUM('super admin', 'admin')
    )";
$sql = mysqli_query ($con, $myQuery);
if($sql) {
    echo "the table is created success fully!";
}        
}
?>