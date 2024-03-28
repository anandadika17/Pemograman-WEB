<?php
$A = 123; // variabel global

function Test() {
    global $A; // menandakan penggunaan variabel global
    $A = "Test"; // variabel lokal
    echo "Variabel A berisi = $A \n";
}

Test();
echo "Di luar fungsi berisi = $A \n";
?>