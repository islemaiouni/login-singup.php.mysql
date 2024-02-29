<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['user_type'] != 'admin') {
    header('location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2 class="text-center">Admin Dashboard</h2>
        <p>Welcome, <?php echo $_SESSION['user']['username']; ?></p>
        <a href="logout.php" class="btn btn-primary">Logout</a>
    </div>
</body>
</html>
