<?php
require "koneksi.php";
$hasil = mysqli_query($koneksi, "SELECT * FROM daftar_paket_rental");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Paket Rental</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-expand navbar-dark menu-atas">
        <div class="container">
            <span class="navbar-brand">Rental Mobil</span>
            <div class="navbar-nav">
                <a class="nav-link" href="index.php">Daftar Paket</a>
                <a class="nav-link" href="tambah.php">Tambah Paket</a>
            </div>
        </div>
    </nav>

    <div class="container konten">
        <h1>Daftar Paket Rental</h1>

        <table class="table table-bordered table-striped">
            <tr>
                <th>Jenis Paket</th>
                <th>Durasi</th>
                <th>Ketentuan</th>
                <th></th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($hasil)) { ?>
            <tr>
                <td><?= $row["jenis_paket"] ?></td>
                <td><?= $row["durasi"] ?> hari</td>
                <td><?= $row["ketentuan"] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row["id"] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="hapus.php?id=<?= $row["id"] ?>" class="btn btn-sm btn-danger"
                       onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>