<?php
require "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $jenis = $_POST["jenis"];
    $durasi = $_POST["durasi"];
    $ketentuan = $_POST["ketentuan"];

    $sql = "UPDATE paket_rental
            SET jenis_paket = ?, durasi = ?, ketentuan = ?
            WHERE id = ?";
    mysqli_execute_query($koneksi, $sql, [$jenis, $durasi, $ketentuan, $id]);

    header("Location: index.php");
    exit;
}

$id = $_GET["id"];
$hasil = mysqli_execute_query($koneksi,
    "SELECT * FROM paket_rental WHERE id = ?", [$id]);
$row = mysqli_fetch_assoc($hasil);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Formulir Edit Paket Rental</title>
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
        <h1>Edit Paket Rental</h1>

        <form method="post">
            <input type="hidden" name="id" value="<?= $row["id"] ?>">

            <div class="mb-3">
                <label for="jenis" class="form-label">Jenis Paket</label>
                <select class="form-select" id="jenis" name="jenis">
                    <option value="Lepas Kunci" <?php if ($row["jenis_paket"] == "Lepas Kunci") echo "selected"; ?>>Lepas Kunci</option>
                    <option value="All-in" <?php if ($row["jenis_paket"] == "All-in") echo "selected"; ?>>All-in</option>
                    <option value="Luar Kota" <?php if ($row["jenis_paket"] == "Luar Kota") echo "selected"; ?>>Luar Kota</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="durasi" class="form-label">Durasi (hari)</label>
                <input type="number" class="form-control" id="durasi" name="durasi" value="<?= $row["durasi"] ?>" required>
            </div>

            <div class="mb-3">
                <label for="ketentuan" class="form-label">Ketentuan</label>
                <textarea class="form-control" id="ketentuan" name="ketentuan" required><?= $row["ketentuan"] ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>