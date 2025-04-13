<?php
// Include the header which contains session_start()
include './header.php';

// Check if session variables are set
if (!isset($_SESSION['user_email']) || !isset($_SESSION['user_type']) || !isset($_SESSION['user_name'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<head>
	<meta charset="UTF-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<title>CSS Cards with Overlay Hover Animation</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
	<link href="assests/css/div.css" rel="stylesheet">
</head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
</head>

<body>
<center>
<main id="main-content">
    <h1 style="color:#414141;">Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h1> <!-- Displaying username -->
    <p style="color:#414141;"> you are logged in as a <strong><?php echo htmlspecialchars($_SESSION['user_type']); ?></strong>.</p>
    <p style="color:#414141;">  User id: <strong><?php echo htmlspecialchars($_SESSION['user_id']); ?></strong>.</p>
    

      <!--  <a href="profile.php" accesskey="z" style="color:#414141;"> Edit Your profile </a>

 Options based on user type -->
    <?php if ($_SESSION['user_type'] == 'beneficiary'): ?>
        <h2 style="color:#414141;">Beneficiary Options:</h2>
        <ul>
            <p class="p">Take Initiative In Donating</p>
	<div id="card-area">
		<div class="wrapper">
			<div class="box-area">
			<div class="box">
					<img alt="" src="assests/image/7.jpeg">
					<div class="overlay">
						<h3>Financial Beneficiary </h3>
						<p>Your donation empowers children with education, breaking the cycle of poverty.</p>
						<a href="financial_beneficiary.php" accesskey="o">Register</a>
					</div>
				</div>
				<div class="box">
					<img alt="" src="assests/image/3.jpeg">
					<div class="overlay">
						<h3>Non Financial Beneficiary</h3>
						<p>Your support ensures vital medical care and support for those in need.</p>
						<a href="nonFinancial_beneficiary.php" accesskey="k">Register</a>
					</div>
				</div>
				
				
				
			</div>
		</div>
	</div>
		</ul>

    <?php elseif ($_SESSION['user_type'] == 'donor'): ?>
        <h2 style="color:#414141;">Donor Options:</h2>
        <ul>

           
			<p class="p">Take Initiative In Donating</p>
	<div id="card-area">
		<div class="wrapper">
			<div class="box-area">
				
				
				<div class="box">
					<img alt="" src="assests/image/7.jpeg">
					<div class="overlay">
						<h3>Supporter</h3>
						<p>Your donation empowers children with education, breaking the cycle of poverty.</p>
						<a href="Supporter.php" accesskey="m"></a>>Register</a>
					</div>
				</div>
				<div class="box">
					<img alt="" src="assests/image/1.jpg">
					<div class="overlay">
						<h3>Volunteer</h3>
						<p>Help us provide a safe, loving home and a brighter future for orphaned children.</p>
						<a href="Volunteer.php" accesskey="q">Register</a>
					</div>
				</div>
				
			</div>
		</div>
	</div>
        </ul>

    <?php else: ?>
        <p>Error: Unrecognized user type.</p>
    <?php endif; ?>
    </main>
	</center>
	
</body><br><br>
<?php include "./footer.php"; ?>
</html>
