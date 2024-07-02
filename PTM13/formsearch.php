<?php include "koneksi.php";?>

<?php
// File : formsearch1.php

echo '<html>';
echo '<body>';

echo '<h3>Contoh Program Mencari record berdasarkan field nama</h3>';

echo '<form action="cari1.php" method="post">';
echo '<label>Masukkan nama : </label><input type="text" name="nama"><br>';

echo '<p><input type="submit" value="Search">  <input type="reset" value="Hapus"></p>';
echo '</form>';

echo '</body>';
echo '</html>';
?>
