<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header('Location: index.php');
    exit;
}
require 'database.php';

$query = "SELECT * FROM biodata";
$result = mysqli_query($db, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Lihat Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="text-align:center;">
    <h1>List Biodata</h1>
    <table style="text-align:center;" border="4">
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?= htmlspecialchars($row['nama']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['phone']) ?></td>
            <td><?= htmlspecialchars($row['address']) ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <a href="form_biodata.php"><button style="text-align:left;" type="button">Kembali</button></a>
</body>
</html>
