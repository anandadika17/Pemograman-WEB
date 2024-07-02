<?php
session_start();
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $group_name = $_POST['group_name'];

    $stmt = $conn->prepare("INSERT INTO groups (group_name) VALUES (?)");
    $stmt->bind_param("s", $group_name);
    $stmt->execute();

    header("Location: dashboard.php");
}
?>
