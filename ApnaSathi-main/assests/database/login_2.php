<?php
session_start(); 

$host = "localhost";
$user = "root";
$password = "";
$db_name = "apnaSathi_db";

$conn = new mysqli($host, $user, $password, $db_name);

// Check if the connection was successful
if ($conn->connect_error) {

    echo '
    <script>
    alert("Connection Error. Please try again!");
    window.location.assign("../../index.php");
    </script>
    ';
    exit;
    
}

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $secret_key = "6LcuDlgqAAAAAF09G1kF3tpgmYe5BBr-QACu2x8Y"; 
//     $response_key = $_POST['g-recaptcha-response']; // Get the response key from the form
//     $user_ip = $_SERVER['REMOTE_ADDR']; 

//     // Make a POST request to Google reCAPTCHA API to verify the user's response
//     $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret_key&response=$response_key&remoteip=$user_ip");
//     $responseData = json_decode($response);

//     // Check if reCAPTCHA was successfully verified
//     if (!$responseData->success) {
//         echo "
//         <script>
//         alert('Please complete the reCAPTCHA verification.');
//         window.location.assign('../../login.php');
//         </script>
//         ";
//         exit(); // Stop further execution if reCAPTCHA fails
//     }


    $user_name = $conn->real_escape_string($_POST['user_name']);
    $user_email = $conn->real_escape_string($_POST['user_email']);
    $user_password = $_POST['user_password']; 

    $admin_query = "SELECT * FROM admin_info WHERE admin_email = '$user_email'";
    $admin_result = $conn->query($admin_query);

    if ($admin_result->num_rows > 0) {
        // Admin email found, verify password
        $admin_row = $admin_result->fetch_assoc();
        if (password_verify($user_password, $admin_row['admin_password'])) {
          session_regenerate_id(true); 

            $_SESSION['user_email'] = $user_email;
            $_SESSION['user_name'] = $admin_row['admin_name']; // Store admin username
            $_SESSION['user_type'] = 'admin'; // Set user type as 'admin'
            $_SESSION['user_status'] = true;

            // Redirect to admin dashboard
            header("Location: ../../admin_dashboard.php");
            exit();
        } else {
            echo "<script>
                    alert('Invalid password.');
                    window.location.assign('../../login.php');
                  </script>";
        }
    } else {
        // If not an admin, check if email exists in `new_user` table (for beneficiaries and donors)
        $user_query = "SELECT * FROM new_user WHERE user_email = '$user_email'";
        $user_result = $conn->query($user_query);

        if ($user_result->num_rows > 0) {
            // Email found in `new_user`, verify password
            $user_row = $user_result->fetch_assoc();
            if (password_verify($user_password, $user_row['user_password'])) {
                session_regenerate_id(true); // Regenerate session ID for security

                // Set session variables based on user type
                $_SESSION['user_email'] = $user_email;
                $_SESSION['user_name'] = $user_row['user_name']; // Store user username
                $_SESSION['user_id'] = $user_row['user_id'];
                $_SESSION['user_type'] = $user_row['user_type']; // 'beneficiary' or 'donor'
                $_SESSION['user_status'] = true;

                // Redirect based on user type
                if ($user_row['user_type'] == 'beneficiary') {
                    header("Location: ../../user_dashboard.php");
                } elseif ($user_row['user_type'] == 'donor') {
                    header("Location: ../../user_dashboard.php");
                } else {
                    echo "<script>
                            alert('Invalid user type.');
                            window.location.assign('../../login.php');
                          </script>";
                }
                exit();
            } else {
                echo "<script>
                        alert('Invalid password.');
                        window.location.assign('../../login.php');
                      </script>";
            }
        } else {
            // If email not found
            echo "<script>
                    alert('Email not found.');
                    window.location.assign('../../login.php');
                  </script>";
        }

        $user_result->free(); // Free result set
    }

    $admin_result->free(); // Free result set

$conn->close(); // Close the connection
?>
