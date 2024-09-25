<?php
// Koneksi ke database
$host = "localhost";
$username = "root";
$password = "";
$dbname = "coba";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM users WHERE id=$id");
    header("Location: index1.php");
}

// Handle edit
if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        // Update data
        $id = $_POST['id'];
        $conn->query("UPDATE users SET name='$name', email='$email' WHERE id=$id");
    } else {
        // Create data (optional jika ingin handle create di sini)
        $conn->query("INSERT INTO users (name, email) VALUES ('$name', '$email')");
    }
    header("Location: index1.php");
}
?>
