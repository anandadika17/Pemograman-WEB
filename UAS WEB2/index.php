<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: auth.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Main Menu</title>
</head>
<body>
    <h2>Main Menu</h2>
    <a href="add_data.php">Add Match Data</a><br>
    <a href="view_data.php">View Match Data</a><br>
    <a href="logout.php">Logout</a>
</body>
</html>
