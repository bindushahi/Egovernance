<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the submitted username and password
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Perform your authentication logic here
    // For demonstration purposes, let's assume the username is "admin" and password is "password"
    $validUsername = "admin";
    $validPassword = "password";

    if ($username === $validUsername && $password === $validPassword) {
        // Authentication successful
        // Redirect the user to the desired page after login
        header("Location: dashboard.php");
        exit();
    } else {
        // Authentication failed
        // You can display an error message or redirect the user to the login page with an error parameter
        header("Location: login.php?error=1");
        exit();
    }
}
?>
