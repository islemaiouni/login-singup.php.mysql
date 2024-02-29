<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    // If not logged in, redirect to login page
    header('Location: login.php');
    exit();
}

// Check user type
if ($_SESSION['user']['user_type'] === 'admin') {
    // If user is admin, redirect to admin dashboard
    header('Location: admin_dashboard.php');
    exit();
}
// User is not admin, redirect to home page
header('Location: home.php');
exit();
?>
