<?php
// Start or resume the session
session_start();

// Check if the user is logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Check the time elapsed since the last activity
    $inactiveTimeout = 60; // 30 minutes (in seconds)
    $lastActivity = isset($_SESSION['last_activity']) ? $_SESSION['last_activity'] : 0;

    if (time() - $lastActivity > $inactiveTimeout) {
        // Session has timed out, destroy the session and redirect to the login page
        session_unset();
        session_destroy();
        header('Location: login.php');
        exit;
    }

    // Update the last activity time
    $_SESSION['last_activity'] = time();
} else {
    // User is not logged in, redirect to the login page
    header('Location: login.php');
    exit;
}
?>
