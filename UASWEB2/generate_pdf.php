<?php
require_once('tcpdf/tcpdf.php');
include('db.php');

$group_id = $_GET['group_id'];

$stmt = $conn->prepare("SELECT * FROM countries WHERE group_id = ?");
$stmt->bind_param("i", $group_id);
$stmt->execute();
$result = $stmt->get_result();

$pdf = new TCPDF();
$pdf->AddPage();

$html = '<h1>UEFA 2024 Standings</h1>';
$html .= '<table border="1" cellspacing="3" cellpadding="4">';
$html .= '<tr><th>Team</th><th>Menang</th><th>Seri</th><th>Kalah</th><th>Poin</th></tr>';

while ($row = $result->fetch_assoc()) {
    $html .= "<tr>";
    $html .= "<td>" . $row['country_name'] . "</td>";
    $html .= "<td>" . $row['won'] . "</td>";
    $html .= "<td>" . $row['draw'] . "</td>";
    $html .= "<td>" . $row['lost'] . "</td>";
    $html .= "<td>" . $row['points'] . "</td>";
    $html .= "</tr>";
}

$html .= '</table>';

$pdf->writeHTML($html);
$pdf->Output('standings.pdf', 'D');
?>
