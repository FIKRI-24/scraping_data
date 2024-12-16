<?php
include 'koneksi.php'; // Pastikan file koneksi.php dapat diakses

$result = $conn->query("SELECT * FROM kecamatan_kelurahan"); // Pastikan tabel ada di database
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kecamatan dan Kelurahan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center; /* Semua elemen rata tengah */
            background-color: #f4f4f4;
        }

        h1 {
            color: #333;
            margin: 20px 0;
        }

        table {
            width: 80%;
            margin: 20px auto; /* Tengahkan tabel di layar */
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center; /* Isi tabel rata tengah */
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        a {
            text-decoration: none;
            color: #4CAF50;
            font-weight: bold;
            margin: 0 10px;
        }

        a:hover {
            color: #45a049;
        }

        .add-button {
            display: inline-block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }

        .add-button:hover {
            background-color: #45a049;
        }

        .action-buttons a {
            padding: 5px 10px;
            margin: 0 5px;
            background-color: #007BFF;
            color: white;
            border-radius: 5px;
        }

        .action-buttons a:hover {
            background-color: #0056b3;
        }

        .delete-button {
            background-color: #dc3545;
        }

        .delete-button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <h1>Data Kecamatan dan Kelurahan</h1>
    <a href="add.php" class="add-button">Tambah Data</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Kecamatan</th>
                <th>Kelurahan</th>
                <th>Kode Pos</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['kecamatan'] ?></td>
                <td><?= $row['kelurahan'] ?></td>
                <td><?= $row['kode_pos'] ?></td>
                <td class="action-buttons">
                    <a href="edit.php?id=<?= $row['id'] ?>">Edit</a>
                    <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus data ini?')" class="delete-button">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
