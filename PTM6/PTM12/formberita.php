<?php
//Koneksi ke database menggunakan PDO-->
$db_host = 'localhost'; // Sesuaikan dengan host database Anda
$db_name = 'dbberita'; // Nama database
$db_user = 'root'; // Username database
$db_pass = ''; // Password database

try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Koneksi ke database gagal: " . $e->getMessage());
}

// Tambahkan query untuk mengambil data berita dari database
$query = "SELECT * FROM tblberita";
$statement = $pdo->prepare($query);
$statement->execute();
$beritas = $statement->fetchAll(PDO::FETCH_ASSOC); // Mengambil semua baris data


//Update data berita-->
if(isset($_POST['update'])) {
    $idberita = $_POST['update_idberita'];
    $judulberita = $_POST['update_judulberita'];
    $isiberita = $_POST['update_isiberita'];
    $penulis = $_POST['update_penulis'];
    $tgldipublish = $_POST['update_tgldipublish'];

    $sql = "UPDATE tblberita SET judulberita = :judulberita, isiberita = :isiberita, penulis = :penulis, tgldipublish = :tgldipublish WHERE idberita = :idberita";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idberita', $idberita);
    $stmt->bindParam(':judulberita', $judulberita);
    $stmt->bindParam(':isiberita', $isiberita);
    $stmt->bindParam(':penulis', $penulis);
    $stmt->bindParam(':tgldipublish', $tgldipublish);

    try {
        $stmt->execute();
        echo "Record berhasil diupdate.";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

//Delete data berita-->
if(isset($_POST['delete'])) {
    $idBerita = $_POST['delete_idberita'];

    $sql = "DELETE FROM tblberita WHERE idberita = :idberita";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idberita', $idBerita);

    try {
        $stmt->execute();
        echo "Record berhasil dihapus.";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

//Tambah data disubmit-->
if(isset($_POST['submit'])) {
    $idBerita = $_POST['idberita'];
    $idKategori = $_POST['idkategori'];
    $judulberita = $_POST['judulberita'];
    $isiberita = $_POST['isiberita'];
    $penulis = $_POST['penulis'];
    $tgldipublish = $_POST['tgldipublish'];

//Masukkan record baru pada tblberita-->
    $sql = "INSERT INTO tblberita (idberita, idkategori, judulberita, isiberita, penulis, tgldipublish) VALUES (:idberita, :idkategori, :judulberita, :isiberita, :penulis, :tgldipublish)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idberita', $idBerita);
    $stmt->bindParam(':idkategori', $idKategori);
    $stmt->bindParam(':judulberita', $judulberita);
    $stmt->bindParam(':isiberita', $isiberita);
    $stmt->bindParam(':penulis', $penulis);
    $stmt->bindParam(':tgldipublish', $tgldipublish);

//Eksekusi statement-->
    try {
        $stmt->execute();
        echo "Record berhasil ditambahkan.";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pengisian Form Berita</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Desain yang berbeda */
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        h2 {
            color: #333;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Form Berita</h2>
        <form method="post">
            <div class="form-group">
                <label for="idberita">ID Berita:</label>
                <input type="text" class="form-control" id="idberita" name="idberita">
            </div>
            <div class="form-group">
                <label for="idkategori">ID Kategori:</label>
                <input type="text" class="form-control" id="idkategori" name="idkategori">
            </div>
            <div class="form-group">
                <label for="judulberita">Judul Berita:</label>
                <input type="text" class="form-control" id="judulberita" name="judulberita">
            </div>
            <div class="form-group">
                <label for="isiberita">Isi Berita:</label><br>
                <textarea class="form-control" id="isiberita" name="isiberita" rows="4" cols="50"></textarea>
            </div>
            <div class="form-group">
                <label for="penulis">Penulis:</label>
                <input type="text" class="form-control" id="penulis" name="penulis">
            </div>
            <div class="form-group">
                <label for="tgldipublish">Tanggal Dipublish:</label>
                <input type="date" class="form-control" id="tgldipublish" name="tgldipublish">
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

        <h2 class="text-center">Data Berita</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID Berita</th>
                    <th>ID Kategori</th>
                    <th>Judul Berita</th>
                    <th>Isi Berita</th>
                    <th>Penulis</th>
                    <th>Tanggal Dipublish</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($beritas as $berita): ?>
                    <tr>
                        <td><?php echo $berita['idberita']; ?></td>
                        <td><?php echo $berita['idkategori']; ?></td>
                        <td><?php echo $berita['judulberita']; ?></td>
                        <td><?php echo $berita['isiberita']; ?></td>
                        <td><?php echo $berita['penulis']; ?></td>
                        <td><?php echo $berita['tgldipublish']; ?></td>
                        <td>
                            <form method="post" style="display: inline;">
                                <input type="hidden" name="update_idberita" value="<?php echo $berita['idberita']; ?>">
                                <input type="hidden" name="update_isiberita" value="<?php echo $berita['isiberita']; ?>">
                                <input type="hidden" name="update_penulis" value="<?php echo $berita['penulis']; ?>">
                                <input type="hidden" name="update_tgldipublish" value="<?php echo $berita['tgldipublish']; ?>">
                                <input type="text" name="update_judulberita" value="<?php echo $berita['judulberita']; ?>" class="form-control" style="display: inline; width: 150px;">
                                <button type="submit" name="update" class="btn btn-primary">Update</button>
                            </form>
                            <form method="post" style="display: inline;">
                                <input type="hidden" name="delete_idberita" value="<?php echo $berita['idberita']; ?>">
                                <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
