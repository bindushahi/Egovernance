<?php
// Start the session
session_start();

// Set the session variable
$_SESSION['loggedin'] = true;
$_SESSION['username'] = $username; // Store the username or any other relevant user information
?>