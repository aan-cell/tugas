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
$t = "SELECT id_vendor,Nama, Kontak, Nama_Barang FROM vendor";
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
        <th>id_vendor</th>
        <th>Nama</th> <!-- Kolom ID ditambahkan -->
        <th>Kontak</th>
        <th>Nama_Barang</th>

        <th>action</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        // Menampilkan data per baris
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id_vendor'] . "</td>";
            echo "<td>" . $row['Nama'] . "</td>";
            echo "<td>" . $row['Kontak'] . "</td>"; // Menampilkan ID
            echo "<td>" . $row['Nama_Barang'] . "</td>";
            echo "<td><a href='delete.php?id=" . $row['id_vendor'] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Delete</a></td>";
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
