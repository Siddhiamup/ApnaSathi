<?php
session_start();

$_SESSION = array(); // This clears all the session variables

session_destroy(); // This terminates the session itself

header("Location:./index.php"); 
exit;
