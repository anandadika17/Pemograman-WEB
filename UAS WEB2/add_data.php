<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: auth.php");
    exit();
}
require 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Match Data</title>
</head>
<body>
    <h2>Enter Match Data</h2>
    <form method="post" action="process_match.php">
        Group: 
        <select name="group_id" required>
            <?php
            $groups = $conn->query("SELECT * FROM groups");
            while ($group = $groups->fetch_assoc()) {
                echo "<option value='{$group['id']}'>{$group['group_name']}</option>";
            }
            ?>
        </select><br>
        
        Country: 
        <select name="country_id" required>
            <?php
            $countries = $conn->query("SELECT * FROM countries");
            while ($country = $countries->fetch_assoc()) {
                echo "<option value='{$country['id']}'>{$country['country_name']}</option>";
            }
            ?>
        </select><br>
        
        Won: <input type="number" name="won" required><br>
        Drawn: <input type="number" name="drawn" required><br>
        Lost: <input type="number" name="lost" required><br>
        Points: <input type="number" name="points" required><br>
        
        <input type="submit" value="Submit">
    </form>
    <a href="index.php">Back to Main Menu</a>
</body>
</html>
