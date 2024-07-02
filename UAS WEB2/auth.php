<?php
session_start();
require 'config.php';

if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $type = $_POST['type'];

    if ($type == 'register') {
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, password_hash($password, PASSWORD_BCRYPT));
        if ($stmt->execute()) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $stmt->error;
        }
    } else if ($type == 'login') {
        $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($hashed_password);
        if ($stmt->fetch() && password_verify($password, $hashed_password)) {
            $_SESSION['username'] = $username;
            header("Location: index.php");
            exit();
        } else {
            echo "Invalid username or password!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login or Register</title>
</head>
<body>
    <h2>Login or Register</h2>
    <form method="post">
        Username: <input type="text" name="username" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="radio" name="type" value="login" checked> Login
        <input type="radio" name="type" value="register"> Register<br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
