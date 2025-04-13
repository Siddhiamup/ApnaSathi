<!DOCTYPE html>
<!-- divinectorweb.com -->
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<title>CSS Cards with Overlay Hover Animation</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
	<link href="assets/css/div.css" rel="stylesheet">
</head>
<body>
	<?php include "./header.php"; ?><br><br>
	<p class="p">Take Initiative In Donating</p>
	<div id="card-area">
		<div class="wrapper">
			<div class="box-area">
				<div class="box">
					<img alt="" src="assets/image/1.jpg">
					<div class="overlay">
						<h3>Orphanage</h3>
						<p>Help us provide a safe, loving home and a brighter future for orphaned children.</p>
						<a href="#">Submit Form</a>
					</div>
				</div>
				<div class="box">
					<img alt="" src="assets/image/3.jpeg">
					<div class="overlay">
						<h3>Healthcare</h3>
						<p>Your support ensures vital medical care and support for those in need.</p>
						<a href="#">Submit Form</a>
					</div>
				</div>
				<div class="box">
					<img alt="" src="assets/image/7.jpeg">
					<div class="overlay">
						<h3>Education</h3>
						<p>Your donation empowers children with education, breaking the cycle of poverty.</p>
						<a href="BeneficiaryForm_education.php">Submit Form</a>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</body><br><br>
<?php include "./footer.php"; ?>
</html>
