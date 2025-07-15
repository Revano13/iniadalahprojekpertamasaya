<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header('Location: index.php');
    exit;
}

require 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    try{
    $sql = "INSERT INTO biodata (nama, email, phone, address) VALUES ('$nama', '$email', '$phone', '$address')";

    if ($db->query($sql)) {
        $register_message = "data berhasil masuk";
    }else {
        $register_message = "data tidak berhasil masuk";
    }
    }catch (mysqli_sql_exception) {
        $register_message = "username sudah digunakan";
    }
    $db->close();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Biodata</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="text-align:center;">
    <h1>Form Biodata</h1>
    <form method="POST">
        <label>Nama:</label>
        <input type="text" name="nama" placeholder="Nama Anda" required>
        <label>Email:</label>
        <input type="email" name="email" placeholder="Email Anda" required>
        <label>Phone:</label>
        <input type="text" name="phone" placeholder="Nomor Telepon" required>
        <label>Address:</label><br>
        <textarea name="address" placeholder="Alamat Anda" required></textarea>
        <button type="submit">Submit</button>
        <a href="lihat_data.php"><button type="button">Lihat Data</button></a>
        <a href="logout.php"><button type="button">Logout</button></a>
    </form>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
</body>
</html>
