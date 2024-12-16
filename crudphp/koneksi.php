<?php
$host = 'localhost';
$user = 'root';
$password = ''; 
$dbname = 'kota_padang';

// Koneksi ke database
$conn = new mysqli($host, $user, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
