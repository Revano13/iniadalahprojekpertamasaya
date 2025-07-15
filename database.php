<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'uas_website';

$db = mysqli_connect($host, $user, $password, $database);

if (!$db) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>