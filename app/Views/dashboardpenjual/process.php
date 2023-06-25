<?php
// Koneksi ke database
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Tangkap data dari form
$idproduk = $_POST['idproduk'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$jumlah = $_POST['jumlah'];

// Query untuk menyimpan data produk ke dalam tabel produk
$sql = "INSERT INTO produk (idproduk, nama, harga, jumlah) VALUES ('$idproduk', '$nama', '$harga', '$jumlah')";

if ($conn->query($sql) === TRUE) {
    echo "Produk berhasil ditambahkan";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi ke database
$conn->close();
?>
