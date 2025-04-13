<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "apnaSathi_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get POST data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if user_id is set in POST data
    if (isset($_POST['user_id'])) {
        $user_id = intval($_POST['user_id']);  // Sanitize input by converting to integer
        $status = $_POST['status'];

        // Update status in the database
        $sql = "UPDATE supporter_registration SET application_status = '$status' WHERE user_id = $user_id"; // Use user_id for reference

        if ($conn->query($sql) === TRUE) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'user_id not set']);
    }
}

$conn->close();
?>
