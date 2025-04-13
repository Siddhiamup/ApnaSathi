<?php

$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = "apnaSathi_db";
$connect = new mysqli($hostname, $username, $password, $dbname);
if($connect->connect_error) {
die('The Connection is failed:');
}else {
    $sql_query = "
    CREATE TABLE volunteer_registration (
 registration_id INT AUTO_INCREMENT    PRIMARY KEY,
 donor_id  INT NOT NULL,
 donor_name VARCHAR(100) NOT NULL,
 donor_mobile VARCHAR(20) NOT NULL,
 donor_birthdate DATE NOT NULL,
 donor_availability ENUM('EveryDay', 'WeekEnd', 'CustomDates'),
 startdate DATE default NULL,
 enddate DATE DEFAULT NULL,
 donor_id_proof VARCHAR(100) NOT NULL,
 donor_photo VARCHAR(100) NOT NULL,
 foundation_type ENUM('Individual', 'Foundation'),
 foundation_name VARCHAR(100) DEFAULT NULL,
 donor_type VARCHAR(100) DEFAULT 'volunteer',
 application_status ENUM('Unapproved', 'Approved') DEFAULT 'Unapproved',
FOREIGN KEY(donor_id) REFERENCES new_user(user_id)

 );
    ";
    if($connect->query($sql_query)) {
        echo 'the Table is created successfully!';
    }else {
        echo 'Unable to create the table.';
    }
}

?>