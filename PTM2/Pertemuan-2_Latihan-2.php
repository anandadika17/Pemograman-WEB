<?php
$C = 123; // variabel global

function Test() {
    global $C; // variabel lokal yang merujuk ke variabel global
    echo "C pada fungsi berisi = $C \n";
}

Test();
echo "C di luar fungsi berisi = $C \n";
?>