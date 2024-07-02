<?php
// Include FPDF library
require 'fpdf.php';

// Database connection (contoh menggunakan MySQLi)
$servername = "localhost";
$username = "username"; // ganti dengan username yang benar
$password = "password"; // ganti dengan password yang benar
$dbname = "uefa2024"; // tambahkan tanda titik koma di akhir

// Coba untuk membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define PDF class dengan inheritance dari FPDF
class PDF extends FPDF {
    function Header() {
        // Header title
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'UEFA 2024 Standings', 0, 1, 'C');
        $this->Ln(10);

        // Header columns
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(20, 10, 'Group', 1);
        $this->Cell(40, 10, 'Country', 1);
        $this->Cell(20, 10, 'Won', 1);
        $this->Cell(20, 10, 'Drawn', 1);
        $this->Cell(20, 10, 'Lost', 1);
        $this->Cell(20, 10, 'Points', 1);
        $this->Ln();
    }

    function Footer() {
        // Page footer
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }
}

// Create new PDF instance
$pdf = new PDF();
$pdf->AddPage(); // Add new page to PDF

// Set font for content
$pdf->SetFont('Arial', '', 10);

// Query data from database and add to PDF
$sql = "
    SELECT g.group_name, c.country_name, m.won, m.drawn, m.lost, m.points
    FROM matches m
    JOIN groups g ON m.group_id = g.id
    JOIN countries c ON m.country_id = c.id
    ORDER BY g.group_name, m.points DESC
";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pdf->Cell(20, 10, $row['group_name'], 1);
        $pdf->Cell(40, 10, $row['country_name'], 1);
        $pdf->Cell(20, 10, $row['won'], 1);
        $pdf->Cell(20, 10, $row['drawn'], 1);
        $pdf->Cell(20, 10, $row['lost'], 1);
        $pdf->Cell(20, 10, $row['points'], 1);
        $pdf->Ln();
    }
} else {
    $pdf->Cell(0, 10, 'No records found', 1, 1, 'C');
}

// Output PDF to browser or save to file
$pdf->Output('UEFA_2024_Standings.pdf', 'D'); // 'D' untuk download, 'F' untuk menyimpan ke file

// Close MySQL connection
$conn->close();
?>
