<?php
include 'koneksi.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM kecamatan_kelurahan WHERE id=$id");
$data = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kecamatan = $_POST['kecamatan'];
    $kelurahan = $_POST['kelurahan'];
    $kode_pos = $_POST['kode_pos'];

    $conn->query("UPDATE kecamatan_kelurahan SET kecamatan='$kecamatan', kelurahan='$kelurahan', kode_pos='$kode_pos' WHERE id=$id");
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <h1>Edit Data</h1>
    <form method="POST">
        <center><a href="index.php">Kembali</a></center>
        <label for="kecamatan">Kecamatan:</label>
        <input type="text" name="kecamatan" id="kecamatan" value="<?= $data['kecamatan'] ?>" required><br>
        
        <label for="kelurahan">Kelurahan:</label>
        <input type="text" name="kelurahan" id="kelurahan" value="<?= $data['kelurahan'] ?>" required><br>
        
        <label for="kode_pos">Kode Pos:</label>
        <input type="text" name="kode_pos" id="kode_pos" value="<?= $data['kode_pos'] ?>" required><br>
        
        <button type="submit">Simpan</button>
    </form>
    
</body>
</html>
