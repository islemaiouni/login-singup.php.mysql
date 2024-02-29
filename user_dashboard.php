<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['user_type'] != 'user') {
    header('location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2 class="text-center">User Dashboard</h2>
        <p>Welcome, <?php echo $_SESSION['user']['username']; ?></p>
        <a href="logout.php" class="btn btn-primary">Logout</a>
    </div>
</body>
</html>
