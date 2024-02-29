<?php
$db = mysqli_connect('localhost', 'root', '', 'multi_login');

function registerUser() {
    global $db;

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];
    $role = $_POST['role'];
    $errors = [];

    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if ($password_1 != $password_2) { array_push($errors, "The two passwords do not match"); }

    if (count($errors) == 0) {
        $password = password_hash($password_1, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (username, email, password, user_type) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($db, $query);
        mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $password, $role);
        mysqli_stmt_execute($stmt);
        $_SESSION['success']  = "New user successfully created!!";
        header('location: index.php');
    } else {
        $_SESSION['errors'] = $errors;
        header('location: register.php');
    }
}

function loginUser() {
    global $db;

    $username = $_POST['username'];
    $password = $_POST['password'];
    $errors = [];

    $query = "SELECT * FROM users WHERE username=? LIMIT 1";
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            $_SESSION['success'] = "You are now logged in";
            if ($user['user_type'] == 'admin') {
                header('location: admin_dashboard.php');
            } else {
                header('location: user_dashboard.php');
            }
        } else {
            array_push($errors, "Wrong password");
            $_SESSION['errors'] = $errors;
            header('location: login.php');
        }
    } else {
        array_push($errors, "Username not found");
        $_SESSION['errors'] = $errors;
        header('location: login.php');
    }
}
?>
