<?php
$host = 'localhost';
$user = 'root'; // Sesuaikan username MySQL
$password = ''; // Sesuaikan password MySQL
$database = 'webnasgor'; // Nama database

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}
?>