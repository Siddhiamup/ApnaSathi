<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login </title>
    <link rel="stylesheet" type="text/css" href="assests/css/login.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">


    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>

<body background="assests/image/flag2.jpeg">
    <div class="all">
        <div class="container" id="main">
            <div class="sign-in">
                <form id="loginForm" method="POST" onsubmit="return validateForm()"
                    action="./assests/database/login_2.php">
                    <h1 style="margin-top:-2%;margin-bottom:5%">Login</h1>
                    <div class="social-container">
                        <a href="#" class="social" id="social"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social" id="social"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#" class="social" id="social"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <label for="email" class="email"> Email id: </label>
                    <input type="email" id="email" name="user_email" placeholder="Email" autocomplete="email" required>


                    <label for="password" class="email">Password: </label>
                    <input type="password" id="password" name="user_password"
                        placeholder="Please Enter Your Password here: " autocomplete="new-password" required>
                    <!--<div class="g-recaptcha" data-sitekey="6LcuDlgqAAAAANHuQwEBQl4OgHeOYObFHZsjLJ4J"> </div>-->
                    <br>
                    <a href="./forget_password.php" accesskey="r" id="social">Forgot your password?</a>
                    <div class="button-group">
                        <button type="submit" accesskey="v">login</button>
                        <button type="reset" accesskey="c">Reset</button>
                    </div>
                    </fieldset>
                </form>

            </div>

        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-right">
                    <img class="img " height="80" width="180" src="assests/image/Apna sathi.png" alt="error">
                    <br><br>
                    <h1>Hello, Sathi!</h1>
                    <p>Enter your personal details and start your journey with us</p>
                    <button onclick="changevalues('signUp.php')" accesskey="s" id="signUp">Sign Up</button>
                </div>
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