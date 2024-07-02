<?php
// Pemeriksaan Cookies: lihat_cookie.php

// Periksa apakah cookie 'username' ada
if(isset($_COOKIE['username'])) {
    echo "<h1>Cookie 'username' ada. Isinya : ".$_COOKIE['username']."</h1>";
} else {
    echo "<h1>Cookie 'username' TIDAK ada.</h1>";
}

// Periksa apakah cookie 'namalengkap' ada
if(isset($_COOKIE['namalengkap'])) {
    echo "<h1>Cookie 'namalengkap' ada. Isinya : ".$_COOKIE['namalengkap']."</h1>";
} else {
    echo "<h1>Cookie 'namalengkap' TIDAK ada.</h1>";
}

// Tautan untuk penciptaan, perubahan, dan penghapusan cookies
echo "<h2>Klik <a href='buat_cookie.php'>di sini</a> untuk penciptaan cookies</h2>";
echo "<h2>Klik <a href='ubah_cookie.php'>di sini</a> untuk ubah cookies</h2>";
echo "<h2>Klik <a href='hapus_cookie.php'>di sini</a> untuk penghapusan cookies</h2>";
?>