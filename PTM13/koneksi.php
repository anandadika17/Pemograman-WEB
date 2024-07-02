<?php
$servername = "localhost";
$username = "root";
$password = ""; // Password Anda jika ada
$database = "mahasiswa"; // Nama database Anda

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}
?>
