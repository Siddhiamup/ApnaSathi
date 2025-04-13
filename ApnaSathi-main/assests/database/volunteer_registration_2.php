<?php

session_start();

// Database connection
$servername = "localhost";  // replace with your database server
$username = "root";         // replace with your database username
$password = "";             
$db_name = "apnaSathi_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    echo '
    <script>
    alert("Connection Failed. Please Try again After some time!");
    window.location.assign("../../user_dashboard.php");
    </script>';
    exit();
}

// Handling form data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Fetch and sanitize data from the form
    $donor_id = $_SESSION['user_id'];
    $donor_email = $_SESSION['user_email'];
    $donor_name = mysqli_real_escape_string($conn, $_POST['uname']);
    $donor_mobile = mysqli_real_escape_string($conn, $_POST['umobile']);
    $donor_birthdate = mysqli_real_escape_string($conn, $_POST['bdate']);
    $age = mysqli_real_escape_string($conn, $_POST['age']); // Directly taking age from form input
    $availability = mysqli_real_escape_string($conn, $_POST['slot']);
    $startdate = isset($_POST['StartDate']) ? mysqli_real_escape_string($conn, $_POST['StartDate']) : null;
    $enddate = isset($_POST['EndDate']) ? mysqli_real_escape_string($conn, $_POST['EndDate']) : null;
    $foundation_type = mysqli_real_escape_string($conn, $_POST['foundationType']);
    $foundation_name = ($foundation_type == 'Foundation') ? mysqli_real_escape_string($conn, $_POST['foundationName']) : null;

    // File upload directory
    $upload_dir = 'uploads/';

    // Handle file uploads and check if files are uploaded successfully
    $photo_path = $upload_dir . basename($_FILES['photo']['name']);
    $aadhar_path = $upload_dir . basename($_FILES['Aadhar']['name']);

    if (move_uploaded_file($_FILES['photo']['tmp_name'], $photo_path) && move_uploaded_file($_FILES['Aadhar']['tmp_name'], $aadhar_path)) {
        // Insert data into the database
        $sql = "INSERT INTO volunteer_registration (user_id, donor_name, donor_mobile, donor_birthdate, age, donor_availability, startdate, enddate, donor_id_proof, donor_photo, foundation_type, foundation_name, user_email)
                VALUES ('$donor_id', '$donor_name', '$donor_mobile', '$donor_birthdate', '$age', '$availability', '$startdate', '$enddate', '$aadhar_path', '$photo_path', '$foundation_type', '$foundation_name', '$donor_email')";

        if ($conn->query($sql) === TRUE) {
            // Success alert and redirect to home page
            echo '
            <script>
                alert("Thanks For Connecting with us. We Will Contact you very soon!");
                window.location.assign("../../user_dashboard.php");
            </script>';
        } else {
            // Failed insert
            echo '
            <script>
                alert("Unable to insert the data. Please try again!");
                window.history.back();
            </script>';
        }
    } else {
        // File upload failed
        echo '
        <script>
            alert("File upload failed. Please try again.");
            window.history.back();
        </script>';
    }

    // Close connection
    $conn->close();
}
?>
