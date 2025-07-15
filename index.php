<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'Revano' && $password === '23141101047') {
        $_SESSION['logged_in'] = true;
        header('Location: form_biodata.php');
        exit;
    } else {
        $error = "Username atau Password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="text-align: center;">
    <h1>Login</h1>
    <form method="POST">
        <label>Username:</label>
        <input type="text" name="username" placeholder="Masukkan username:Revano"><br>
        <label>Password:</label>
        <input type="password" name="password" placeholder="Masukkan password:23141101047"><br>
        <button type="submit">Login</button>
    </form>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
</body>
</html>
