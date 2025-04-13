<?php
// Database connection parameters
$servername = "localhost"; // or your server name
$username = "root"; // replace with your username
$password = ""; // replace with your password
$dbname = "apnaSathi_db"; // replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Search functionality
$search = '';
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}

// Pagination setup
$limit = 10; // Number of records per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// SQL query to fetch data with search and pagination
$sql = "SELECT user_name, user_contact, user_email, user_subject, user_message, date FROM user_contact 
        WHERE user_name LIKE '%$search%' OR user_email LIKE '%$search%' OR user_subject LIKE '%$search%'
        LIMIT $limit OFFSET $offset";
$result = $conn->query($sql);

// Count total records for pagination
$countSql = "SELECT COUNT(*) as total FROM user_contact 
             WHERE user_name LIKE '%$search%' OR user_email LIKE '%$search%' OR user_subject LIKE '%$search%'";
$countResult = $conn->query($countSql);
$totalRows = $countResult->fetch_assoc()['total'];
$totalPages = ceil($totalRows / $limit);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Contact Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #fff;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        h2 {
            color: #333;
        }
        .pagination {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }
        .pagination a {
            margin: 0 5px;
            padding: 8px 12px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .pagination a.active {
            background-color: #3e8e41;
        }
        .search-box {
            margin-bottom: 20px;
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

<h2>User Contact Data</h2>
<button class="cool-button"><a href="admin_dashboard.php">Admin Panel</a></button>

<!-- Search Form -->
<form method="GET" class="search-box">
    <input type="text" name="search" placeholder="Search by name, email, or subject" value="<?php echo htmlspecialchars($search); ?>">
    <button type="submit">Search</button>
</form>

<table>
    <thead>
        <tr>
            <th>SR No</th>
            <th>User Name</th>
            <th>User Contact</th>
            <th>User Email</th>
            <th>User Subject</th>
            <th>User Message</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Check if there are results and fetch them
        if ($result->num_rows > 0) {
            $srNo = $offset + 1; // Starting serial number
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $srNo++ . '</td>'; // Display SR No
                echo '<td>' . htmlspecialchars($row['user_name']) . '</td>';
                echo '<td>' . htmlspecialchars($row['user_contact']) . '</td>';
                echo '<td>' . htmlspecialchars($row['user_email']) . '</td>';
                echo '<td>' . htmlspecialchars($row['user_subject']) . '</td>';
                echo '<td>' . htmlspecialchars($row['user_message']) . '</td>';
                echo '<td>' . htmlspecialchars($row['date']) . '</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="7">No data found</td></tr>';
        }
        ?>
    </tbody>
</table>

<!-- Pagination Controls -->
<div class="pagination">
    <?php if ($page > 1): ?>
        <a href="?page=<?php echo $page - 1; ?>&search=<?php echo urlencode($search); ?>">Previous</a>
    <?php endif; ?>
    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="?page=<?php echo $i; ?>&search=<?php echo urlencode($search); ?>" class="<?php echo $i === $page ? 'active' : ''; ?>">
            <?php echo $i; ?>
        </a>
    <?php endfor; ?>
    <?php if ($page < $totalPages): ?>
        <a href="?page=<?php echo $page + 1; ?>&search=<?php echo urlencode($search); ?>">Next</a>
    <?php endif; ?>
</div>

</body>
</html>

<?php
// Close connection
$conn->close();
?>
