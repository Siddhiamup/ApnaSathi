<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="assests/css/profile.css"> 
</head>
<body  background="assests/image/flag2.jpeg">
    <?php include "./header.php"; ?>
<main id="main-content"></main>
<div class="container">
    <h2>Edit Profile</h2>
    
    <form action="update_profile.php" method="POST" onsubmit="return handleSubmit(event)">
        <fieldset>
            <br>
            <legend>Profile Information</legend>

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Please enter your name here" required>
            </div>

            <div class="form-group">
                <label for="mobile">Mobile Number:</label>
                <input type="text" id="mobile" name="mobile" placeholder="Please enter your mobile number here" required>
            </div>

            <div class="form-group">
                <label for="birthday">Birthday:</label>
                <input type="date" id="birthday" name="birthday" required>
            </div>

            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" id="age" name="age" readonly>
            </div>

        </fieldset><br>

        <button type="submit" accesskey="v">Update Profile</button><br><br>
        <button type="reset" accesskey="c" onclick="resetAge()">Clear Form</button>
    </form>
</div>
</main>
<?php include "./footer.php"; ?>
<script src="./assests/js/profile.js"></script>
</body>
</html>
