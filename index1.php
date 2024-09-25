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

// Fetch data
$result = $conn->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD Example</title>
    <link rel="stylesheet" href="tabel.css">
</head>
<body>

<h2>CRUD Example</h2>

<form action="process.php" method="POST">
    <input type="hidden" name="id" value="<?php echo isset($_GET['edit']) ? $_GET['edit'] : ''; ?>">
    <label for="name">Name:</label>
    <input type="text" name="name" required value="<?php
        if (isset($_GET['edit'])) {
            $id = $_GET['edit'];
            $record = $conn->query("SELECT * FROM users WHERE id=$id");
            $row = $record->fetch_assoc();
            echo $row['name'];
        }
    ?>">
    <br>
    <label for="email">Email:</label>
    <input type="email" name="email" required value="<?php
        if (isset($_GET['edit'])) {
            echo $row['email'];
        }
    ?>">
    <br>
    <button type="submit" name="save"><?php echo isset($_GET['edit']) ? 'Update' : 'Create'; ?></button>
</form>

<h3>Data User</h3>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td>
                <a href="index1.php?edit=<?php echo $row['id']; ?>">Edit</a>
                <a href="process.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

</body>
</html>
