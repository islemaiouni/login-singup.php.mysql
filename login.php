<?php
session_start();
require_once('functions.php');

if (isset($_POST['login_btn'])) {
    loginUser();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2 class="text-center">Login</h2>
        <form method="post" action="login.php">
            <?php include('errors.php'); ?>
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" name="login_btn">Login</button>
            </div>
            <p class="text-center">Not yet a member? <a href="register.php">Sign up</a></p>
        </form>
    </div>
</body>
</html>
