<?php
include "koneksi.php";

$pesan = "";
$jenis = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $plat      = trim($_POST['plat'] ?? "");
  $merk      = trim($_POST['merk'] ?? "");
  $tahun     = trim($_POST['tahun'] ?? "");
  $transmisi = trim($_POST['transmisi'] ?? "");

  if ($plat == "" || $merk == "" || $tahun == "" || $transmisi == "") {
    $pesan = "Semua kolom wajib diisi.";
    $jenis = "danger";
  } else {
    $stmt = mysqli_prepare($koneksi, "INSERT INTO armada_kendaraan (Nomor_Plat, Merk, Tahun_Pembuatan, Tipe_Transmisi) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssis", $plat, $merk, $tahun, $transmisi);

    if (mysqli_stmt_execute($stmt)) {
      $pesan = "Data kendaraan berhasil ditambahkan.";
      $jenis = "success";
    } else {
      $pesan = "Data gagal disimpan: " . mysqli_error($koneksi);
      $jenis = "danger";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data Kendaraan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <nav class="navbar navbar-expand navbararmada shadow-sm">
    <span class="navbar-brand fw-bold text-white">Armada Kendaraan</span>
    <ul class="navbar-nav ms-auto">
      <li class="nav-item">
        <a class="nav-link text-white" href="index.php">Daftar Kendaraan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active text-white" href="tambah.php">Tambah Kendaraan</a>
      </li>
    </ul>
  </nav>

  <h1 class="text-center mt-4 mb-4">Tambah Data Kendaraan</h1>

  <div class="kartu">
    <?php if ($pesan != "") : ?>
      <div class="alert alert-<?= $jenis; ?>"><?= $pesan; ?></div>
    <?php endif; ?>

    <form method="post">
      <div class="mb-3">
        <label for="plat" class="form-label">Nomor Plat</label>
        <input type="text" class="form-control" id="plat" name="plat" placeholder="Contoh: B 1234 ABC" required>
      </div>

      <div class="mb-3">
        <label for="merk" class="form-label">Merk</label>
        <input type="text" class="form-control" id="merk" name="merk" placeholder="Contoh: Toyota Avanza" required>
      </div>

      <div class="mb-3">
        <label for="tahun" class="form-label">Tahun Pembuatan</label>
        <input type="number" class="form-control" id="tahun" name="tahun" placeholder="Contoh: 2022" required>
      </div>

      <div class="mb-3">
        <label for="transmisi" class="form-label">Tipe Transmisi</label>
        <select class="form-select" id="transmisi" name="transmisi" required>
          <option value="" disabled selected>-- Pilih Tipe Transmisi --</option>
          <option value="Automatic">Automatic</option>
          <option value="Manual">Manual</option>
        </select>
      </div>

      <button type="submit" class="btn btn-primary w-100">Simpan</button>
    </form>
  </div>

</body>
</html>
