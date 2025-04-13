<!DOCTYPE html>
<html>

<!--
Date: 05/08/2024

This page is use to allow users to create there account on the apnaSathi 
This page also involve the signUp.js and signUp_2.php for handling the server side logic and some custom validation.
-->


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signUp </title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login </title>
    <link rel="stylesheet" type="text/css" href="assests/css/sign.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

   </head>

<body background="assests/image/flag2.jpeg">
<div class="all">
<div class="container" id="main">
        <div class="sign-in">
            <form action="./assests/database/signUp_2.php" method="POST" onsubmit="return validate()">
                <h1>Create Account</h1>
                <div class="social-container">
                    <a href="#" class="social" id="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social" id="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social" id="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                
        <input type="text" for="name" id="name" name="user_name" required autocomplete="name" placeholder="Please enter your name here:">        
    
                <input for="email" type="email" id="email" name="user_email" placeholder="Email" required="">
                    <input type="password" id="password" name="user_password" placeholder="Password" required="">
                    <input type="password" id="confirm-password" name="confirm_password" placeholder="confirm-password"
                        required="">
                    <label><b style="padding-right:7px;"><i style="color:red">*</i></b>   Select your user type :</label><br>
                    <!-- Radio buttons in flex container -->
                    <div class="radio-group">
                        <input type="radio" for="user-beneficiary" id="user-beneficiary" value="beneficiary" name="user_type" > Beneficiary
                        <input type="radio" for="user-donor" value="donor" name="user_type" id="user-donor"> Donor
                    </div>
                    
                    <!-- Submit and Reset buttons in flex container -->
                    <div class="button-group">
                        <button type="submit" accesskey="v">Sign_Up</button>
                        <button type="reset" accesskey="c">Reset</button>
                    </div>
            </form>
        </div>
</form>
<div class="overlay-container">
            <div class="overlay">
                <div class="overlay-right">
                <img class="img" height="80" width="180" src="assests/image/Apna sathi.png" alt="error">
<br><br>
                    <h1>Welcome Back!</h1>
                    <p>Already have an Account? To keep connected with us, please log in with your personal information</p>
                    <button onclick="changevalues('login')"accesskey="l" id="signIn">Login</button>
                </div>
<h2> </h2>
<button > login </button>    
    
</div>
        </div>
    </div>
    
</div>
<script src="assests/js/sign.js"></script>
    <!-- Move the script here -->
    <script src="assests/js/signUp.js"></script>
    <script src="assests/js/user_status.js"></script>
</body>

</html>

</body>
</html>