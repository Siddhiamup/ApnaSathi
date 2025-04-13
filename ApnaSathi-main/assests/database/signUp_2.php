<?php
session_start(); 
if (isset($_SESSION['isbeneficiary']) && isset($_SESSION['isdonor'])) {
    $_SESSION['isbeneficiary'] = false;
    $_SESSION['isdonor'] = false;
}

// Establishing Database connection
$host = "localhost";
$user = "root";
$password = "";
$db_name = "apnaSathi_db";

$conn = new mysqli($host, $user, $password, $db_name);

if ($conn->connect_error) {

    echo '
    <script>
    alert("Connection Error. Please try again!");
    window.location.assign("../../index.php");
    </script>
    ';
    exit;
    
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // $secret_key = "6LcuDlgqAAAAAF09G1kF3tpgmYe5BBr-QACu2x8Y"; 
  //  $response_key = $_POST['g-recaptcha-response']; // Get the response key from the form
   // $user_ip = $_SERVER['REMOTE_ADDR']; // Corrected variable

    // Make a POST request to Google reCAPTCHA API to verify the user's response
    //$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret_key&response=$response_key&remoteip=$user_ip");
   // $responseData = json_decode($response);

    // Check if reCAPTCHA was successfully verified
    // if (!$responseData->success) {
    //     echo "
    //     <script>
    //     alert('Please complete the reCAPTCHA verification.');
    //     window.location.assign('../../signUp.php');
    //     </script>
    //     ";
    //     exit(); // Stop further execution if reCAPTCHA fails
    // }

    // If reCAPTCHA is successful, proceed with the registration logic
    $user_name = $conn->real_escape_string($_POST['user_name']);
    $user_email = $conn->real_escape_string($_POST['user_email']);
    $user_password = $_POST['user_password']; 
    $user_type = $conn->real_escape_string($_POST['user_type']);

    $admin_query = "SELECT * FROM admin_info WHERE admin_email = '$user_email'";
    $admin_result = $conn->query($admin_query);

    // Check if email exists in the `new_user` table
    $user_query = "SELECT * FROM new_user WHERE user_email = '$user_email'";
    $user_result = $conn->query($user_query);

    if ($admin_result->num_rows > 0 || $user_result->num_rows > 0) {
        echo "<script>
                alert('This Email Id already exists!');
                window.location.assign('../../signUp.php');
              </script>";
    } else {
        // Hashing the password before storing it in the database
        $hashed_password = password_hash($user_password, PASSWORD_DEFAULT);

        $insert_query = "INSERT INTO new_user (user_name, user_email, user_password, user_type) VALUES ('$user_name', '$user_email', '$hashed_password', '$user_type')";
        if ($conn->query($insert_query) === TRUE) {
            session_regenerate_id(true); 
            $id = $conn->insert_id;
            $_SESSION['user_id'] = $id;
            $_SESSION['user_name'] = $user_name;
            $_SESSION['user_email'] = $user_email;
            $_SESSION['user_type'] =  $user_type;
            $_SESSION['user_status'] = true;

            if ($user_type == 'beneficiary') {
                $_SESSION['isbeneficiary'] = true;
                header("Location: ../../user_dashboard.php");
            } elseif ($user_type == 'donor') {
                $_SESSION['isdonor'] = true;
                header("Location: ../../user_dashboard.php");
            } else {
                echo "<script>
                        alert('Invalid user type.');
                        window.location.assign('../../signUp.php');
                      </script>";
            }
            exit();
        } else {
            echo "<script>
                    alert('Error during sign-up. Please try again.');
                    window.location.assign('../../signUp.php');
                  </script>";
        }
    }

    // Free the result sets
    $admin_result->free();
    $user_result->free();
}

$conn->close();
?>
