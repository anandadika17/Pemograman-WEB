<?php
// Membuat File logout.php

// Mulai session
session_start();

// Hancurkan semua session
session_destroy();

// Hapus cookie login jika ada
if (isset($_COOKIE['login'])) {
    // Atur waktu saat ini
    $time = time();
    // Hapus cookie dengan mengatur waktu kadaluwarsa di masa lalu
    setcookie("login", '', $time - 3600);
}

// Alihkan ke halaman login
header('Location:./login.php');
exit();
?>
