<html>
<head>
    <title>Input dan Hitung Rata-rata Nilai</title>
</head>
<body>
    <h2>Data yang diinput:</h2>
    <form method="post" action="">
        Nama: <input type="text" name="nama"><br>
        Jurusan: <input type="text" name="jurusan"><br>
        Nilai Tugas: <input type="text" name="nilai_tugas"><br>
        Nilai UTS: <input type="text" name="nilai_uts"><br>
        Nilai UAS: <input type="text" name="nilai_uas"><br>
        <input type="submit" value="Hitung">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nama = $_POST['nama'];
        $jurusan = $_POST['jurusan'];
        $nilai_tugas = floatval($_POST['nilai_tugas']);
        $nilai_uts = floatval($_POST['nilai_uts']);
        $nilai_uas = floatval($_POST['nilai_uas']);

        $rata_rata = ($nilai_tugas + $nilai_uts + $nilai_uas) / 3;

        echo "<h2>Data yang dihitung:</h2>";
        echo "Nama: $nama<br>";
        echo "Jurusan: $jurusan<br>";
        echo "Nilai Tugas: $nilai_tugas<br>";
        echo "Nilai UTS: $nilai_uts<br>";
        echo "Nilai UAS: $nilai_uas<br>";
        echo "Rata-rata: $rata_rata<br>";
    }
    ?>
</body>
</html>