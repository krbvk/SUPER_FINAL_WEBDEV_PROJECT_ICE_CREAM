<?php
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect the user to the homepage or any other page
header("Location: ../pages/home.php");
exit;
