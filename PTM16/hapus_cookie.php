<?php
// Penghapusan Cookies: hapus_cookie.php

// Setel tanggal kadaluwarsa menjadi satu jam yang lalu
setcookie("username", "", time() - 3600);
setcookie("namalengkap", "", time() - 3600);

echo "<h1>Cookie Berhasil dihapus.</h1>";
echo "<h2>Klik <a href='buat_cookie.php'>di sini</a> untuk buat cookies</h2>";
echo "<h2>Klik <a href='lihat_cookie.php'>di sini</a> untuk melihat isi cookie</h2>";
?>