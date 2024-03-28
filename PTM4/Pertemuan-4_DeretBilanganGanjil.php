<!DOCTYPE html>
<html>
<head>
    <title>Deret Bilangan Ganjil Habis Dibagi 3</title>
</head>
<body>

<h2>Deret Bilangan Ganjil Habis Dibagi 3</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Nilai Awal: <input type="number" name="nilai_awal" required><br>
    Nilai Akhir: <input type="number" name="nilai_akhir" required><br>
    <input type="submit" name="submit" value="Hitung">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nilai_awal = $_POST["nilai_awal"];
    $nilai_akhir = $_POST["nilai_akhir"];

    // Validasi nilai awal dan nilai akhir
    if ($nilai_awal >= $nilai_akhir) {
        echo "<p>Nilai akhir harus lebih besar dari nilai awal.</p>";
    } else {
        $jumlah_deret = 0;
        $total = 0;

        echo "Deret bilangan ganjil habis dibagi 3 dari $nilai_awal sampai $nilai_akhir:<br>";
        for ($i = $nilai_awal; $i <= $nilai_akhir; $i++) {
            if ($i % 2 != 0 && $i % 3 == 0) {
                echo $i . ", ";
                $jumlah_deret++;
                $total += $i;
            }
        }

        echo "<br><br>";
        echo "Banyaknya deret bilangan: $jumlah_deret<br>";
        echo "Total dari deret bilangan: $total";
    }
}
?>

</body>
</html>