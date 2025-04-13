<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Admin Registration</title>
</head>
<body>

<h2>New Admin Registration</h2>

<form action="./assests/database/admin_2.php" method="POST" onsubmit="return validate()">
    <fieldset>
        <legend>New Admin Registration</legend>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="admin_email" required autocomplete="email" placeholder="Please enter your email id here:">
        <br/>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="admin_password" required autocomplete="new-password" placeholder="Please enter your password here:">
        <br/>
        
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required placeholder="Please enter your password again:">
        <br/>
        
        <label for="admin_name">Admin Name:</label>
        <input type="text" id="admin_name" name="admin_name" required autocomplete="admin_name" placeholder="Please enter your name here:">
        <br/>
        
        <label for="admin_phone_number">Admin Phone:</label>
        <input type="number" id="admin_phone_number" name="admin_phone_number" required placeholder="Please enter your phone number here:">
        <br/>
        
        <label for="admin_role">Admin Role:</label>
        <select id="admin_role" name="admin_role" required>
            <option value="admin">Admin</option>
            <option value="super_admin">Super Admin</option>
        </select>
        <br/>
        
        <input type="submit" value="Register" accesskey="v">
        <br/>
        <input type="reset" value="Reset" accesskey="c">
    </fieldset>
</form>

<h2>Already have an Account?</h2>
<button onclick="changevalues('login')" accesskey="l">Login</button>

<!-- Link to external JavaScript file -->
<script src="assests/js/admin_panel.js"></script>

</body>
</html>
