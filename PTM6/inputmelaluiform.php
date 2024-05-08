<!DOCTYPE html>
<html>
<head>
    <title>Hitung Luas Segitiga</title>
</head>
<body>

<h2>Masukkan Data Alas dan Tinggi Segitiga</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <?php for ($i = 0; $i < 5; $i++) { ?>
        Alas: <input type="number" name="alas[]" required>
        Tinggi: <input type="number" name="tinggi[]" required><br>
    <?php } ?>
    <input type="submit" name="submit" value="Hitung">
</form>

<?php
// Jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data alas dan tinggi dari form
    $data_alas = $_POST["alas"];
    $data_tinggi = $_POST["tinggi"];

    // Menghitung luas segitiga untuk setiap pasangan alas dan tinggi
    for ($i = 0; $i < count($data_alas); $i++) {
        $luas = 0.5 * $data_alas[$i] * $data_tinggi[$i];
        echo "Luas segitiga dengan alas " . $data_alas[$i] . " dan tinggi " . $data_tinggi[$i] . " adalah: " . $luas . "<br>";
    }
}
?>

</body>
</html>