<?php
session_start();
session_unset();
unset($_SESSION['username']);
unset($_SESSION['logged_in']);
session_destroy();
//echo "Logged out";
header("Location:welcome.html");
?>