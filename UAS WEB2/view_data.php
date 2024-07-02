<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: auth.php");
    exit();
}
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete'])) {
        $id = $_POST['match_id'];
        $stmt = $conn->prepare("DELETE FROM matches WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Standings</title>
</head>
<body>
    <h2>Current Standings</h2>
    <?php
    $result = $conn->query("
        SELECT m.id, g.group_name, c.country_name, m.won, m.drawn, m.lost, m.points
        FROM matches m
        JOIN groups g ON m.group_id = g.id
        JOIN countries c ON m.country_id = c.id
        ORDER BY g.group_name, m.points DESC
    ");
    ?>
    <table border="1">
        <tr>
            <th>Group</th>
            <th>Country</th>
            <th>Won</th>
            <th>Drawn</th>
            <th>Lost</th>
            <th>Points</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['group_name']; ?></td>
            <td><?php echo $row['country_name']; ?></td>
            <td><?php echo $row['won']; ?></td>
            <td><?php echo $row['drawn']; ?></td>
            <td><?php echo $row['lost']; ?></td>
            <td><?php echo $row['points']; ?></td>
            <td>
                <form method="post" action="update_data.php" style="display:inline;">
                    <input type="hidden" name="match_id" value="<?php echo $row['id']; ?>">
                    <input type="submit" value="Update">
                </form>
                <form method="post" action="view_data.php" style="display:inline;">
                    <input type="hidden" name="match_id" value="<?php echo $row['id']; ?>">
                    <input type="submit" name="delete" value="Delete">
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <a href="index.php">Back to Main Menu</a>
    <form method="post" action="generate_pdf.php">
        <input type="submit" value="Generate PDF">
    </form>
</body>
</html>
