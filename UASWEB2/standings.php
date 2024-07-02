<?php
include('db.php');

$group_id = $_GET['group_id']; // Get the group ID from URL parameter

$stmt = $conn->prepare("SELECT * FROM countries WHERE group_id = ?");
$stmt->bind_param("i", $group_id);
$stmt->execute();
$result = $stmt->get_result();

echo "<table>";
echo "<tr><th>Team</th><th>Menang</th><th>Seri</th><th>Kalah</th><th>Poin</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['country_name'] . "</td>";
    echo "<td>" . $row['won'] . "</td>";
    echo "<td>" . $row['draw'] . "</td>";
    echo "<td>" . $row['lost'] . "</td>";
    echo "<td>" . $row['points'] . "</td>";
    echo "</tr>";
}

echo "</table>";
?>
