<?php
session_start();
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $group_id = $_POST['group_id'];
    $country_name = $_POST['country_name'];

    $stmt = $conn->prepare("INSERT INTO countries (group_id, country_name) VALUES (?, ?)");
    $stmt->bind_param("is", $group_id, $country_name);
    $stmt->execute();

    header("Location: dashboard.php");
}
?>
