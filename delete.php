<?php
// Koneksi ke database
$servername = "localhost";
$username = "root"; // Sesuaikan dengan username database Anda
$password = "";     // Sesuaikan dengan password database Anda
$dbname = "stok";

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mendapatkan ID dari URL
$id_storage = $_GET['id_storage'];

// Query untuk menghapus data berdasarkan ID
$sql = "DELETE FROM storage WHERE id_storage = $id_storage";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil dihapus.";
} else {
    echo "Error: " . $conn->error;
}

// Tutup koneksi dan kembali ke halaman display_data.php
$conn->close();
header("Location: Admin.php");
exit;
?>
