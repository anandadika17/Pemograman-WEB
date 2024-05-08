<?php
// Definisikan data dalam array secara langsung
$data_alas = array(50, 80, 60, 10, 70);
$data_tinggi = array(33, 63, 43, 83, 53);

// Menghitung luas segitiga untuk setiap pasangan alas dan tinggi
for ($i = 0; $i < count($data_alas); $i++) {
    $luas = 0.5 * $data_alas[$i] * $data_tinggi[$i];
    echo "Luas segitiga dengan alas " . $data_alas[$i] . " dan tinggi " . $data_tinggi[$i] . " adalah: " . $luas . "<br>";
}
?>