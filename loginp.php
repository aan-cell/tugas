<?php
session_start();

$host = "localhost";
$username = "root"; 
$password = "";     
$dbname = "login";

$conn = new mysqli($host, $username, $password, $dbname);

// Data user contoh (seharusnya dari database)
$users = [
    "admin" => "1234", // username => password
    "user" => "abcd"
];

// Ambil data dari form
$username = $_POST['username'];
$password = $_POST['password'];

// Cek apakah username dan password sesuai
if (isset($users[$username]) && $users[$username] === $password) {
    // Jika sesuai, simpan informasi user dalam sesi
    $_SESSION['username'] = $username;

    // Arahkan ke halaman dashboard
    header("Location: Dashboard.php");
    exit;
} else {
    // Jika tidak sesuai, tampilkan pesan error
    echo "Username atau password salah.";
}
?>
