<?php
include 'koneksi.php';

$id = $_GET['id'];
$conn->query("DELETE FROM kecamatan_kelurahan WHERE id=$id");
header('Location: index.php');
?>
