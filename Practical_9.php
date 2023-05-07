<?php

// Start session
session_start();

// Define username and password for authentication
$valid_username = "john";
$valid_password = "password123";

// Check if user has submitted the login form
if (isset($_POST['username']) && isset($_POST['password'])) {
    // Check if the submitted username and password match the valid credentials
    if ($_POST['username'] === $valid_username && $_POST['password'] === $valid_password) {
        // Authentication successful, set a session variable to mark the user as authenticated
        $_SESSION['authenticated'] = true;
        // Redirect the user to the resume page
        header("Location: resume.php");
        exit();
    } else {
        // Authentication failed, show an error message
        $error_message = "Invalid username or password";
    }
}

// Check if the user is already authenticated
if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true) {
    // User is authenticated, allow access to the pages
    include('resume.php');
    include('timetable.php');
    include('calculator.php');
} else {
    // User is not authenticated, show the login form
    ?>

    <h1>Login</h1>
    <?php if (isset($error_message)) { ?>
        <p>
            <?php echo $error_message; ?>
        </p>
    <?php } ?>
    <form method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <br>
        <input type="submit" value="Login">
    </form>

    <?php
}