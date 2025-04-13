<?php
/*
date: 31/07/2024
This file is use to create the database for the ApnaSathi.
Kindly note that, other tastks such as, creating the table, inserting the record in the table, etc are in the unother file.

*/


//creating the database

$host = "localhost";
$user = "root";
$password = "";
//using the pop method called as mysqli_connect() to establish the connection 

$conn = mysqli_connect ($host, $user, $password);

if (!$conn) {
    echo "Connection is not established:";
}else {
    //sql query for the creating the database
$sql= "CREATE DATABASE apnaSathi_DB";
if (mysqli_query ($conn, $sql)) {
    echo "The database is created successfully!";
}else{
    echo "Unable to create the database!";
}
}
//Closing the connection is Mandatory
mysqli_close ($conn);
?>