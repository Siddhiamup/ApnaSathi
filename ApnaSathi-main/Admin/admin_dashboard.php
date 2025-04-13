<?php
session_start(); // Start the session

// Check if user is logged in
// if (!isset($_SESSION['username'])) {
//     header("Location: login.php"); // Redirect to login page if not logged in
//     exit();
// }

// Database configuration
$host = 'localhost'; // Change if necessary
$dbname = 'apnaSathi_db'; // Replace with your database name
$username = 'root'; // Replace with your database username
$password = ''; // Replace with your database password

// Create a connection to the database
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch user counts from the database
$userCounts = [
    'beneficiary' => 0,
    'donor' => 0,
];

// Query to count users based on their type
$result = mysqli_query($conn, "SELECT COUNT(*) as count, user_type FROM new_user GROUP BY user_type");

// Check if the query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($conn)); // Show error message
}

while ($row = mysqli_fetch_assoc($result)) {
    if ($row['user_type'] === 'beneficiary') {
        $userCounts['beneficiary'] = $row['count'];
    } elseif ($row['user_type'] === 'donor') {
        $userCounts['donor'] = $row['count'];
    }
}

// Fetch user information
$userInfo = [];
$result = mysqli_query($conn, "SELECT * FROM new_user");

// Check if the query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($conn)); // Show error message
}

while ($row = mysqli_fetch_assoc($result)) {
    $userInfo[] = $row;
}

// Function to group ages into ranges
function groupAges($ageCounts) {
    $groupedCounts = [
        '0-10' => 0,
        '10-20' => 0,
        '20-30' => 0,
        '30-40' => 0,
        '40-50' => 0,
        '50+' => 0,
    ];

    foreach ($ageCounts as $age => $count) {
        if ($age >= 0 && $age <= 10) {
            $groupedCounts['0-10'] += $count;
        } elseif ($age > 10 && $age <= 20) {
            $groupedCounts['10-20'] += $count;
        } elseif ($age > 20 && $age <= 30) {
            $groupedCounts['20-30'] += $count;
        } elseif ($age > 30 && $age <= 40) {
            $groupedCounts['30-40'] += $count;
        } elseif ($age > 40 && $age <= 50) {
            $groupedCounts['40-50'] += $count;
        } else {
            $groupedCounts['50+'] += $count;
        }
    }

    return $groupedCounts;
}

// Fetch age distribution for financial beneficiaries
$financialAgeCounts = [];
$result = mysqli_query($conn, "SELECT age, COUNT(*) as count FROM financial_beneficiary GROUP BY age");

// Check if the query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($conn)); // Show error message
}

while ($row = mysqli_fetch_assoc($result)) {
    $financialAgeCounts[$row['age']] = $row['count'];
}

// Group financial beneficiaries by age
$groupedFinancialAges = groupAges($financialAgeCounts);

// Fetch age distribution for non-financial beneficiaries
$nonFinancialAgeCounts = [];
$result = mysqli_query($conn, "SELECT age, COUNT(*) as count FROM nonfinancial_beneficiary GROUP BY age");

// Check if the query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($conn)); // Show error message
}

while ($row = mysqli_fetch_assoc($result)) {
    $nonFinancialAgeCounts[$row['age']] = $row['count'];
}

// Group non-financial beneficiaries by age
$groupedNonFinancialAges = groupAges($nonFinancialAgeCounts);

// Fetch contacted users count from user_contact table
$contactCounts = [];
$result = mysqli_query($conn, "SELECT date, COUNT(*) as count FROM user_contact GROUP BY date");

// Check if the query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($conn)); // Show error message
}

while ($row = mysqli_fetch_assoc($result)) {
    $contactCounts[$row['date']] = $row['count'];
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
        }

        /* Style for Sidebar */
        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            height: 100vh;
            overflow-y: auto;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
        }

        .sidebar h2 {
            text-align: center;
            padding: 15px;
            background-color: #007bff;
            margin: 0;
        }

        .sidebar .user-info {
            margin: 20px 0;
            padding: 10px;
            border-bottom: 1px solid #4f545a;
        }

        .sidebar .user-info p {
            margin: 10px 0;
            font-size: 14px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin-top: 10px;
        }

        .sidebar ul li {
            margin: 15px 0;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
            background-color: #495057;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .sidebar ul li a:hover {
            background-color: #6c757d;
        }

        /* Style for Main Content */
        .main-content {
            margin-left: 250px;
            width: calc(100% - 250px);
            height: 100vh;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
        }

        /* Style for Top Navbar */
        .navbar {
            background-color: #007bff;
            color: white;
            padding: 15px;
            text-align: center;
            position: fixed;
            top: 0;
            left: 250px;
            width: calc(100% - 250px);
            z-index: 1;
        }

        .navbar h1 {
            margin: 0;
            font-size: 22px;
        }

        .dashboard-content {
            margin-top: 80px; /* Space for the fixed navbar */
            padding: 20px;
        }

        /* Counter Boxes */
        .counters {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .counter-box {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 30%;
            text-align: center;
        }

        .counter-box h3 {
            margin-bottom: 10px;
            font-size: 18px;
        }

        .counter-box .counter {
            font-size: 32px;
            font-weight: bold;
            color: #007bff;
        }

        /* Chart Styles */
        .charts {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 40px;
        }

        .chart-container {
            width: 80%;
            margin: 20px 0;
        }

        /* Styles for donut charts in a single row */
        .donut-charts {
            display: flex;
            justify-content: space-between;
            width: 80%;
            margin: 20px 0;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }

            .main-content {
                margin-left: 200px;
                width: calc(100% - 200px);
            }

            .navbar {
                left: 200px;
                width: calc(100% - 200px);
            }

            .counter-box {
                width: 80%;
                margin-bottom: 20px;
            }

            .donut-charts {
                flex-direction: column;
                align-items: center;
            }
        }

        @media (max-width: 576px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .main-content {
                margin-left: 0;
                width: 100%;
            }

            .navbar {
                left: 0;
                width: 100%;
            }

            .counters {
                flex-direction: column;
                align-items: center;
            }

            .counter-box {
                width: 90%;
            }

            .donut-charts {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <div class="user-info">
            <!-- <p><strong>Admin Name:</strong> <?php echo htmlspecialchars($_SESSION['username']); ?></p> -->
            <!-- <p><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION['email']); ?></p> -->
            <!-- <p><strong>Phone:</strong> <?php echo htmlspecialchars($_SESSION['phone']); ?></p> -->
        </div>
        <ul>
            <li><a href="#">Dashboard</a></li>
            <li><a href="new_user_count.php">Users</a></li>
            <li><a href="financial_beneficary_status.php">Financial Beneficary</a></li>
            <li><a href="non_financial_beneficary_status.php">Non-Financial Beneficary</a></li>
            <li><a href="financial_donor.php">Financial Donor</a></li>
            <li><a href="non_financial_donor.php">Non-Financial Donor</a></li>
            <li><a href="contact_data.php">Contacted Report</a></li>
            
        </ul>
    </div>

    <!-- Main content -->
    <div class="main-content">
        <!-- Top Navbar -->
        <div class="navbar">
            <h1>Welcome to ApnaSathi Admin Portal</h1>
        </div>

        <!-- Dashboard Content -->
        <div class="dashboard-content">
            
            <!-- Counter Boxes -->
            <div class="counters">
                <div class="counter-box">
                    <h3>Login User Count</h3>
                    <span class="counter">0</span> <!-- Dummy value -->
                </div>
                <div class="counter-box">
                    <h3>Volunteers Worked With Us</h3>
                    <span class="counter">0</span> <!-- Dummy value -->
                </div>
                <div class="counter-box">
                    <h3>Financial Donors</h3>
                    <span class="counter"><?php echo $userCounts['donor']; ?></span>
                </div>
            </div>

            <!-- Bar Chart for User Type Distribution -->
            <div class="chart-container">
                <h3>User Type Distribution</h3>
                <canvas id="userTypeChart"></canvas>
            </div>

            <!-- Charts for Age Distribution -->
            <div class="charts">
                <div class="chart-container">
                    <h3>Financial Beneficiaries Age Distribution</h3>
                    <canvas id="financialAgeChart"></canvas>
                </div>
                
                <div class="donut-charts">
                    <div class="chart-container">
                        <h3>Financial Beneficiaries Age Distribution</h3>
                        <canvas id="financialAgeChart"></canvas>
                    </div>
                    <div class="chart-container">
                        <h3>Non-Financial Beneficiaries Age Distribution</h3>
                        <canvas id="nonFinancialAgeChart"></canvas>
                    </div>
                </div>
                
                <div class="chart-container">
                    <h3>Contacted Users Count by Date</h3>
                    <canvas id="contactedUsersChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script>
    // Bar Chart for User Type Distribution
    const userTypeCtx = document.getElementById('userTypeChart').getContext('2d');
    const userTypeChart = new Chart(userTypeCtx, {
        type: 'bar',
        data: {
            labels: ['Beneficiaries', 'Donors'],
            datasets: [{
                label: 'User Count',
                data: [<?php echo $userCounts['beneficiary']; ?>, <?php echo $userCounts['donor']; ?>],
                backgroundColor: ['#007bff', '#28a745'],
                borderColor: ['#0056b3', '#218838'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: true
                },
                title: {
                    display: true,
                    text: 'User Type Distribution'
                }
            }
        }
    });

    // Donut Chart for Financial Beneficiaries Age Distribution
    const financialAgeCtx = document.getElementById('financialAgeChart').getContext('2d');
    const financialAgeChart = new Chart(financialAgeCtx, {
        type: 'doughnut',
        data: {
            labels: Object.keys(<?php echo json_encode($groupedFinancialAges); ?>),
            datasets: [{
                data: Object.values(<?php echo json_encode($groupedFinancialAges); ?>),
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Financial Beneficiaries Age Distribution'
                }
            }
        }
    });

    // Donut Chart for Non-Financial Beneficiaries Age Distribution
    const nonFinancialAgeCtx = document.getElementById('nonFinancialAgeChart').getContext('2d');
    const nonFinancialAgeChart = new Chart(nonFinancialAgeCtx, {
        type: 'doughnut',
        data: {
            labels: Object.keys(<?php echo json_encode($groupedNonFinancialAges); ?>),
            datasets: [{
                data: Object.values(<?php echo json_encode($groupedNonFinancialAges); ?>),
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Non-Financial Beneficiaries Age Distribution'
                }
            }
        }
    });

    // Line Chart for Contacted Users Count by Date
    const contactedUsersCtx = document.getElementById('contactedUsersChart').getContext('2d');
    const contactedUsersChart = new Chart(contactedUsersCtx, {
        type: 'line',
        data: {
            labels: Object.keys(<?php echo json_encode($contactCounts); ?>),
            datasets: [{
                label: 'Contacted Users Count',
                data: Object.values(<?php echo json_encode($contactCounts); ?>),
                borderColor: '#FF5733',
                backgroundColor: 'rgba(255, 87, 51, 0.2)',
                fill: true,
                tension: 0.1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true
                },
                title: {
                    display: true,
                    text: 'Contacted Users Count by Date'
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Animate counter boxes
    const counters = document.querySelectorAll('.counter');
    counters.forEach(counter => {
        counter.innerText = '0';
        const target = 300; // Change the target value here
        const updateCounter = () => {
            const current = +counter.innerText;
            const increment = Math.ceil(target / 200); // Adjust this value to change speed

            if (current < target) {
                counter.innerText = Math.min(current + increment, target);
                setTimeout(updateCounter, 1);
            }
        };

        updateCounter();
    });
    </script>
</body>
</html>
