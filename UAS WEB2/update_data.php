<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: auth.php");
    exit();
}
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['match_id'];
    $result = $conn->query("SELECT * FROM matches WHERE id = $id");
    $match = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Match Data</title>
</head>
<body>
    <h2>Update Match Data</h2>
    <form method="post" action="process_update.php">
        <input type="hidden" name="id" value="<?php echo $match['id']; ?>">
        Group: 
        <select name="group_id" required>
            <?php
            $groups = $conn->query("SELECT * FROM groups");
            while ($group = $groups->fetch_assoc()) {
                $selected = $group['id'] == $match['group_id'] ? 'selected' : '';
                echo "<option value='{$group['id']}' $selected>{$group['group_name']}</option>";
            }
            ?>
        </select><br>
        
        Country: 
        <select name="country_id" required>
            <?php
            $countries = $conn->query("SELECT * FROM countries");
            while ($country = $countries->fetch_assoc()) {
                $selected = $country['id'] == $match['country_id'] ? 'selected' : '';
                echo "<option value='{$country['id']}' $selected>{$country['country_name']}</option>";
            }
            ?>
        </select><br>
        
        Won: <input type="number" name="won" value="<?php echo $match['won']; ?>" required><br>
        Drawn: <input type="number" name="drawn" value="<?php echo $match['drawn']; ?>" required><br>
        Lost: <input type="number" name="lost" value="<?php echo $match['lost']; ?>" required><br>
        Points: <input type="number" name="points" value="<?php echo $match['points']; ?>" required><br>
        
        <input type="submit" value="Update">
    </form>
    <a href="view_data.php">Back to View Data</a>
</body>
</html>
