<?php
//membuat
session_start();
//cek
if (!isset($_SESSION['login']))
{
header('location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Home - Remember Me</title>
</head>
<body>
    <h5>Selamat datang di halaman utama website</h5>
    <p><a href="logout.php">Logout</a></p>
</body>
</html>