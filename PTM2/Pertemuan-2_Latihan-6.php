<?php
echo "<b><font face='tahoma' size=5 color='blue'>Hari ini materi pertama saya membuat web dengan PHP</font></b><br>";
print "<hr size=4 color='red'>";

// Penggunaan variabel string
$nama = "Anggita";
$alamat = "Depok";
$email = "anggita@gmail.com";
echo "Nama saya: $nama<br>";
echo "Alamat: $alamat<br>";
echo "Email: $email<br>";

// Penggunaan variabel numerik
$a = 10;
$b = 15;
$c = 6;
$hasil = ($a * $b) + 2 * (pow($c, 3)) - ($b * 2 * $a); // pow(bilangan, pangkat)

print "Nilai a = $a<br>";
print "Nilai b = $b<br>";
print "Nilai c = $c<br>";
print "($a*$b) + 2*$c^3 - ($b*2*$a) = $hasil<br>";
?>