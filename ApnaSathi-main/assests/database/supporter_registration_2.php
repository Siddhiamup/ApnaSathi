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
    $supporter_id = $_SESSION['user_id'];
    $supporter_email = $_SESSION['user_email'];
    $supporter_name = mysqli_real_escape_string($conn, $_POST['uname']);
    $supporter_mobile = mysqli_real_escape_string($conn, $_POST['umobile']);
    $supporter_birthdate = mysqli_real_escape_string($conn, $_POST['bdate']);
    $age = mysqli_real_escape_string($conn, $_POST['age']); // Directly taking age from form input
    $foundation_type = mysqli_real_escape_string($conn, $_POST['foundationType']);
    $foundation_name = ($foundation_type == 'Foundation') ? mysqli_real_escape_string($conn, $_POST['foundationName']) : null;
    $helpAmount = mysqli_real_escape_string($conn, $_POST['help']);

    // File upload directory
    $upload_dir = 'uploads/';

    // Handle file uploads and check if files are uploaded successfully
    $photo_path = $upload_dir . basename($_FILES['photo']['name']);
    $idProof_path = $upload_dir . basename($_FILES['idProof']['name']);

    if (move_uploaded_file($_FILES['photo']['tmp_name'], $photo_path) && move_uploaded_file($_FILES['idProof']['tmp_name'], $idProof_path)) {
        // Insert data into the database
        $sql = "INSERT INTO supporter_registration (user_id, supporter_name, supporter_mobile, supporter_birthdate, age, supporter_photo,supporter_id_proof, foundation_type, foundation_name,helpAmount,supporter_email)
                VALUES ('$supporter_id', '$supporter_name', '$supporter_mobile', '$supporter_birthdate', '$age', '$photo_path','$idProof_path', '$foundation_type', '$foundation_name','$helpAmount','$supporter_email')";

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
