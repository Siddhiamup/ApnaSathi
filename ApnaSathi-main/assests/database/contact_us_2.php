<?php
$host = "localhost";
$user = "root";
$password = "";
$db_name = "apnaSathi_db";

$conn = mysqli_connect($host, $user, $password, $db_name);

if (!$conn) {
    echo '
    <script>
    alert("Connection Error. Please try again!");
    window.location.assign("../../index.php");
    </script>
    ';
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_name = mysqli_real_escape_string($conn, $_POST['fname']);
    $user_contact = mysqli_real_escape_string($conn, $_POST['phone']);
    $user_email = mysqli_real_escape_string($conn, $_POST['email']);
    $user_subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $user_message = mysqli_real_escape_string($conn, $_POST['user_issue']);

    $sql = "INSERT INTO user_contact (user_name, user_contact, user_email, user_subject, user_message) VALUES ('$user_name','$user_contact','$user_email','$user_subject','$user_message')";

    if ($conn->query($sql) === TRUE) {
        echo '
        <script>
        alert("Thanks for contacting us, we will reach out to you very soon.");
        window.location.assign("../../index.php");
        </script>';
    } else {
        echo '
        <script>
        alert("Can\'t connect to the server at this moment. Please try again later!");
        window.location.assign("../../index.php");
        </script>';
    }
}

$conn->close();
?>
