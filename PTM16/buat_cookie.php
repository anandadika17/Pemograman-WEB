<?php
// Pembuatan Cookies: buat_cookie.php

// Set cookie untuk username
setcookie("username", "rahadian");

// Set cookie untuk nama lengkap, dengan waktu kadaluwarsa 1 jam dari sekarang
setcookie("namalengkap", "rahadi ramelan", time() + 3600); // expire in 1 hour
echo "<h1>Halaman Pembuatan cookie</h1>";
echo "<h2>Klik <a href='lihat_cookie.php'>di sini</a> untuk lihat cookie</h2>";
?>