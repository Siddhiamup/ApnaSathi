

<!DOCTYPE html>
<!--
This is the header page of the apnaSathi.
here are other links of different pages are inserted.
date: 05/08/2024
-->
<html lang="en">

<?php
/*
Starting the session to Indentify the user and change the value login/logout accordingly.
*/
session_start ();
$islogedin = false;
if (isset($_SESSION["user_status"]) && $_SESSION["user_status"] === true ){
    $islogedin = true;

}else {
    $islogedin = false;
}
?>

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="assests/css/indexNav.css">
</head>
<body>
  <header>  
<nav>
    <ul class="pad">
      <li>
        <div class="logo"><img height="80" width="180" src="assests/image/Apna sathi.png" alt="error"></div>
      </li>
      <?php if(!$islogedin): ?>
        <li class="hideOnMobile"><a href="#main-content" accesskey="t"> Skip to main content </a></li> 
      <li class="hideOnMobile"><a href="login.php" onclick="changevalues('login')"accesskey="l">  Login</a></li>
      <li class="hideOnMobile"><a href="signUp.php" onclick="changevalues('signUp')"accesskey="s"> Sign Up </a></li>
      

    
<?php else :?>

    <li class="hideOnMobile"><a href="logout.php" onclick="changevalues('logout')"accesskey="g">logout </a></li>
      
<?php endif; ?>
    </ul>
  </nav>
  </header>

    
  <script src="./assests/js/user_status.js"> </script>
    
</body>
</html>