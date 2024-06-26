<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
    header("location: login.php");
    exit;
}
require_once 'db.php';

if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
    $id = trim($_GET['id']);

    $sql = "DELETE FROM items WHERE id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            header("location: list.php");
        } else {
            echo "Something went wrong. Please try again later.";
        }
        $stmt->close();
    }
} else {
    echo "Invalid request.";
    exit();
}
?>
