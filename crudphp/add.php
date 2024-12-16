<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kecamatan = $_POST['kecamatan'];
    $kelurahan = $_POST['kelurahan'];
    $kode_pos = $_POST['kode_pos'];

    $conn->query("INSERT INTO kecamatan_kelurahan (kecamatan, kelurahan, kode_pos) VALUES ('$kecamatan', '$kelurahan', '$kode_pos')");
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <h1>Tambah Data</h1>
    <form method="POST">
   <center><a href="index.php">Kembali</a></center> 
        <label for="kecamatan">Kecamatan:</label>
        <input type="text" name="kecamatan" id="kecamatan" required><br>
        
        <label for="kelurahan">Kelurahan:</label>
        <input type="text" name="kelurahan" id="kelurahan" required><br>
        
        <label for="kode_pos">Kode Pos:</label>
        <input type="text" name="kode_pos" id="kode_pos" required><br>
        
        <button type="submit">Simpan</button>
    </form>

</body>
</html>
