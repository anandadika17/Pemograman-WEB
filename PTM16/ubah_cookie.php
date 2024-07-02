<?php
// Mengubah Nilai Cookies: ubah_cookie.php

$value = 'Joko';
$value2 = 'joko susilo';
setcookie("username", $value);
setcookie("namalengkap", $value2, time()+3600); /* expire in 1 hour */

echo "<h1>Halaman Ubah cookie</h1>";
echo "<h2>Klik <a href='lihat_cookie.php'>di sini</a> untuk lihat cookie</h2>";
?>