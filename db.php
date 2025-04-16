<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'undangan';
$port = 3306; // Tambahkan port di sini

$conn = new mysqli($host, $user, $pass, $db, $port);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>