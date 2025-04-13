<?php
// MySQL credentials
$host = "localhost";
$user = "root";
$password = "";
$db_name = "apnaSathi_db";

$conn = mysqli_connect($host, $user, $password, $db_name);

// Checking connection
if ($conn->connect_error) {

    echo '
    <script>
    alert("Connection Error. Please try again!");
    window.location.assign("../../index.php");
    </script>
    ';
    exit;

}

// Processing form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitizing input to prevent SQL injection
    $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
    $user_contact = mysqli_real_escape_string($conn, $_POST['user_contact']);
    $user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
    $user_subject = mysqli_real_escape_string($conn, $_POST['user_subject']);
    $user_rating = mysqli_real_escape_string($conn, $_POST['user_rating']);
    $user_message = mysqli_real_escape_string($conn, $_POST['user_message']);

    // Inserting data into "user_feedback" table
    $sql = "INSERT INTO user_feedback(user_name, user_contact, user_email,user_subject,user_rating,user_message) VALUES ('$user_name','$user_contact','$user_email','$user_subject','$user_rating ','$user_message')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Feedback has been recorded successfully!!');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
