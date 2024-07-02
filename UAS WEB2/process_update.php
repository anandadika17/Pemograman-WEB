<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: auth.php");
    exit();
}
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $group_id = $_POST['group_id'];
    $country_id = $_POST['country_id'];
    $won = $_POST['won'];
    $drawn = $_POST['drawn'];
    $lost = $_POST['lost'];
    $points = $_POST['points'];

    $stmt = $conn->prepare("
        UPDATE matches 
        SET group_id = ?, country_id = ?, won = ?, drawn = ?, lost = ?, points = ?
        WHERE id = ?
    ");
    $stmt->bind_param("iiiiiii", $group_id, $country_id, $won, $drawn, $lost, $points, $id);

    if ($stmt->execute()) {
        header("Location: view_data.php");
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
