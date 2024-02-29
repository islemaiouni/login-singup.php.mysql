<?php
session_start();
require_once('functions.php');

if (isset($_POST['register_btn'])) {
    registerUser();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2 class="text-center">Register</h2>
        <form method="post" action="register.php">
            <?php include('errors.php'); ?>
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username" value="<?php echo isset($username) ? $username : ''; ?>">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo isset($email) ? $email : ''; ?>">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password_1">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" class="form-control" name="password_2">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" name="register_btn">Register</button>
            </div>
            <p class="text-center">Already a member? <a href="login.php">Sign in</a></p>
        </form>
    </div>
</body>
</html>
