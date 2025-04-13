<?php
session_start(); // Starting a session

// Establishing Database connection
$host = "localhost";
$user = "root";
$password = "";
$db_name = "apnaSathi_db";

$conn = mysqli_connect($host, $user, $password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Processing form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitizing input to prevent SQL injection
    $admin_email = mysqli_real_escape_string($conn, $_POST['admin_email']);
    $admin_password = mysqli_real_escape_string($conn,md5($_POST['admin_password']));
    $admin_name = mysqli_real_escape_string($conn, $_POST['admin_name']);
    $admin_role = mysqli_real_escape_string($conn, $_POST['admin_role']);

    if (isset($_POST['admin_phone_number'])) {
        $admin_phone_number = mysqli_real_escape_string($conn, $_POST['admin_phone_number']);
    } else {
        $admin_phone_number = ''; // Default value if phone number is not provided
    }

// Query to check if the email is admin in the admin_info table
$admin_query = "SELECT * FROM admin_info WHERE admin_email = '$admin_email'";
$admin_result = $conn->query($admin_query);
// Query to check if the email exists in the new_user table
$user_query = "SELECT * FROM new_user WHERE user_email = '$admin_email'";
$user_result = $conn->query($user_query);


if ($admin_result->num_rows > 0|| $user_result->num_rows > 0 ) {
    echo "<script>alert('This Email-id already exists!!');</script>";
} else {
        // Inserting admin_info data into the table
        $sql = "INSERT INTO admin_info (admin_email,admin_password,admin_name,admin_phone_number,admin_role) VALUES ('$admin_email','$admin_password','$admin_name','$admin_phone_number','$admin_role')";
        if ($conn->query($sql) === TRUE) 
        {
            // Storing email in session
            $_SESSION['admin_email'] = $admin_email;           
            $_SESSION ['user_status'] = true;
            echo "<script>alert('Admin registered successfully');</script>";
        
        } else
        {
           echo "<script>alert('This Email Id already exists!!');</script>";
            //echo "Error: " . $sql . "<br>" . $conn->error;
        }

}
}
$conn->close();
?>