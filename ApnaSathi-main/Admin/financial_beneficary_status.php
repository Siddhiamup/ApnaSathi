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

// Fetch beneficiaries data
$sql = "SELECT * FROM financial_beneficiary";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Beneficiaries</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .toggle-switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: #4CAF50;
        }

        input:checked + .slider:before {
            transform: translateX(26px);
        }
        .cool-button {
    background-color: #4CAF50; /* Green */
    border: none;
    border-radius: 8px;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    font-weight: bold;
    transition-duration: 0.4s;
    cursor: pointer;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.cool-button a {
    color: white;
    text-decoration: none;
}

.cool-button:hover {
    background-color: #45a049; /* Darker green */
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
    transform: translateY(-2px);
}

.cool-button a:hover {
    text-decoration: underline;
}

    </style>
</head>
<body>

<h2>Financial Beneficiaries</h2>
<button class="cool-button"><a href="admin_dashboard.php">Admin Panel</a></button>


<table>
    <tr>
        <th>Sr. No.</th>
        <th>Name</th>
        <th>Mobile</th>
        <th>Birthdate</th>
        <th>Age</th>
        <th>Type</th>
        <th>Purpose</th>
        <th>Required Amount</th>
        <th>Application Status</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        $sr_no = 1;
        while($row = $result->fetch_assoc()) {
            // Determine the toggle status
            $isChecked = $row['application_status'] == 'Approved' ? 'checked' : '';
            echo "<tr id='row-{$row['user_id']}'>
                    <td>{$sr_no}</td>
                    <td>{$row['beneficiary_name']}</td>
                    <td>{$row['beneficiary_mobile']}</td>
                    <td>{$row['beneficiary_birthdate']}</td>
                    <td>{$row['age']}</td>
                    <td>{$row['beneficiary_type']}</td>
                    <td>{$row['purpose']}</td>
                    <td>{$row['requireAmount']}</td>
                    <td class='status-display'>{$row['application_status']}</td>
                    <td>{$row['beneficiary_email']}</td>
                    <td>
                        <label class='toggle-switch'>
                            <input type='checkbox' class='toggle-input' data-user_id='{$row['user_id']}' $isChecked>
                            <span class='slider'></span>
                        </label>
                    </td>
                </tr>";
            $sr_no++;
        }
    } else {
        echo "<tr><td colspan='11'>No beneficiaries found.</td></tr>";
    }
    ?>
</table>

<script>
$(document).ready(function() {
    $('.toggle-input').change(function() {
        var beneficiaryId = $(this).data('user_id'); // Get user_id from data attribute
        var newStatus = $(this).is(':checked') ? 'Approved' : 'Unapproved';

        // AJAX request to update status
        $.ajax({
            url: 'status_update.php',
            type: 'POST',
            data: {
                user_id: beneficiaryId, // This should match the PHP key
                status: newStatus
            },
            success: function(response) {
                response = JSON.parse(response); // Parse JSON response
                if (response.success) {
                    // Update the status displayed in the table
                    $('#row-' + beneficiaryId + ' .status-display').text(newStatus);
                } else {
                    alert('Error updating status: ' + (response.error || 'Unknown error'));
                    // Revert the toggle if the update failed
                    $(this).prop('checked', !$(this).is(':checked'));
                }
            },
            error: function() {
                alert('Request failed.');
                // Revert the toggle if the request failed
                $(this).prop('checked', !$(this).is(':checked'));
            }
        });
    });
});
</script>

</body>
</html>
