<?php
// Koneksi ke database
$konek = mysqli_connect("localhost", "root", "", "mahasiswa");

// Menerima input dari form
$cari = $_POST['nama'];

// Query untuk mencari data
$hasil = mysqli_query($konek, "SELECT * FROM tb_mahasiswa WHERE nama LIKE '%$cari%' ORDER BY nama ASC");

// Membuat tabel HTML
echo "<table border='1'>
<tr>
<th>NIM</th>
<th>Nama</th>
<th>Alamat</th>
<th>Jurusan</th>
</tr>";

// Menampilkan data dalam tabel
while($data = mysqli_fetch_array($hasil)) {
    echo "<tr>
    <td>".$data['nim']."</td>
    <td>".$data['nama']."</td>
    <td>".$data['alamat']."</td>
    <td>".$data['jurusan']."</td>
    </tr>";
}

?>
