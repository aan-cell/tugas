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

// Query untuk mengambil data dari tabel contacts
$t = "SELECT Nama_Barang, Jenis_barang, Kuantitas_stock, Lokasi_gudang, Serial_number FROM inventory";
$result = $conn->query($t);

include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="tabel.css">
</head>
<body>
<h1>1. Admin</h1>
<table border="3" class="gup">
    <tr>
        <th>nama barang</th> <!-- Kolom ID ditambahkan -->
        <th>jenis barang</th>
        <th>kuantitas stock</th>
        <th>lokasi gudang</th>
        <th>serial number</th>
        <th>action</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        // Menampilkan data per baris
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['Nama_Barang'] . "</td>"; // Menampilkan ID
            echo "<td>" . $row['Jenis_barang'] . "</td>";
            echo "<td>" . $row['Kuantitas_stock'] . "</td>";
            echo "<td>" . $row['Lokasi_gudang'] . "</td>";
            echo "<td>" . $row['Serial_number'] . "</td>";
            echo "<td><a href='delete.php?id=" . $row['Serial_number'] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Delete</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
    }
    ?>
</table>

</body>
</html>

<?php
include 'footer.php';
$conn->close();
?>
