<?php
//Koneksi ke database menggunakan PDO-->
$db_host = 'localhost'; 
$db_name = 'dbberita'; 
$db_user = 'root'; 
$db_pass = ''; 

try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Koneksi ke database gagal: " . $e->getMessage());
}

//Tambah data disubmit-->
if(isset($_POST['submit'])) {
    $idkategori = $_POST['idkategori'];
    $namakategori = $_POST['namakategori'];

//Masukkan record baru pada tblkategori-->
    $sql = "INSERT INTO tblkategori (idkategori, namakategori) VALUES (:idkategori, :namakategori)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idkategori', $idkategori);
    $stmt->bindParam(':namakategori', $namakategori);

//Eksekusi statement-->
    try {
        $stmt->execute();
        echo "Record berhasil ditambahkan.";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

//Update data disubmit-->
if(isset($_POST['update'])) {
    $idkategori = $_POST['update_idkategori'];
    $namakategori = $_POST['update_namakategori'];

//Update record dari tbl_kategori-->
    $sql = "UPDATE tblkategori SET namakategori = :namakategori WHERE idkategori = :idkategori";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idkategori', $idkategori);
    $stmt->bindParam(':namakategori', $namakategori);

//Eksekusi statement-->
    try {
        $stmt->execute();
        echo "Record berhasil diupdate.";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

//Delete data disubmit-->
if(isset($_POST['delete'])) {
    $idkategori = $_POST['delete_idkategori'];

//Hapus record dari tbl_kategori-->
    $sql = "DELETE FROM tblkategori WHERE idkategori = :idkategori";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idkategori', $idkategori);

//Eksekusi statement-->
    try {
        $stmt->execute();
        echo "Record berhasil dihapus.";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

//Ambil data kategori dari tabel-->
$sql_select = "SELECT * FROM tblkategori";
$stmt_select = $pdo->query($sql_select);
$categories = $stmt_select->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pengisian Form Kategori</title>
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
        <h2 class="text-center">Form Kategori</h2>
        <form method="post">
            <div class="form-group">
                <label for="idkategori">ID Kategori:</label>
                <input type="text" class="form-control" id="idkategori" name="idkategori">
            </div>
            <div class="form-group">
                <label for="namakategori">Nama Kategori:</label>
                <select class="form-control" id="namakategori" name="namakategori">
                    <option value="sosial">Sosial</option>
                    <option value="budaya">Budaya</option>
                    <option value="teknologi">Teknologi</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>

        <h2 class="text-center">Data Kategori</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID Kategori</th>
                    <th>Nama Kategori</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category): ?>
                    <tr>
                        <td><?php echo $category['idkategori']; ?></td>
                        <td><?php echo $category['namakategori']; ?></td>
                        <td>
                            <form method="post" style="display: inline;">
                                <input type="hidden" name="update_idkategori" value="<?php echo $category['idkategori']; ?>">
                                <input type="text" name="update_namakategori" value="<?php echo $category['namakategori']; ?>" class="form-control" style="display: inline; width: 100px;">
                                <button type="submit" name="update" class="btn btn-primary">Update</button>
                            </form>
                            <form method="post" style="display: inline;">
                                <input type="hidden" name="delete_idkategori" value="<?php echo $category['idkategori']; ?>">
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
