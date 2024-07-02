<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: auth.php");
    exit();
}
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $group_id = $_POST['group_id'];
    $country_id = $_POST['country_id'];
    $won = $_POST['won'];
    $drawn = $_POST['drawn'];
    $lost = $_POST['lost'];
    $points = $_POST['points'];

    $stmt = $conn->prepare("
        INSERT INTO matches (group_id, country_id, won, drawn, lost, points)
        VALUES (?, ?, ?, ?, ?, ?)
    ");
    $stmt->bind_param("iiiiii", $group_id, $country_id, $won, $drawn, $lost, $points);

    if ($stmt->execute()) {
        header("Location: view_data.php");
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
