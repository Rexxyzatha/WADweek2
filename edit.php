<?php
include "koneksi.php";

$pesan = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

  $plat      = $_POST['plat'];
  $merk      = $_POST['merk'];
  $tahun     = $_POST['tahun'];
  $transmisi = $_POST['transmisi'];

  if ($merk == "" || $tahun == "" || $transmisi == "") {
    $pesan = "Semua kolom wajib diisi.";
  } else {
    $stmt = mysqli_prepare($koneksi, "UPDATE armada_kendaraan SET Merk = ?, Tahun_Pembuatan = ?, Tipe_Transmisi = ? WHERE Nomor_Plat = ?");
    mysqli_stmt_bind_param($stmt, "siss", $merk, $tahun, $transmisi, $plat);

    if (mysqli_stmt_execute($stmt)) {
      header("Location: index.php?status=diubah");
      exit;
    } else {
      $pesan = "Data gagal diubah.";
    }
  }
} else {
  // Pertama kali dibuka: ambil plat dari URL
  $plat = $_GET['plat'] ?? "";
}

// Ambil data lama buat ditampilkan di form
$stmt = mysqli_prepare($koneksi, "SELECT * FROM armada_kendaraan WHERE Nomor_Plat = ?");
mysqli_stmt_bind_param($stmt, "s", $plat);
mysqli_stmt_execute($stmt);
$data = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

if (!$data) {
  die("Data tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Data Kendaraan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
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
        <a class="nav-link text-white" href="tambah.php">Tambah Kendaraan</a>
      </li>
    </ul>
  </nav>

  <h1 class="text-center mt-4 mb-4">Edit Data Kendaraan</h1>

  <div class="kartu">
    <?php if ($pesan != "") : ?>
      <div class="alert alert-danger"><?= $pesan; ?></div>
    <?php endif; ?>

    <form method="post">
      <!-- Plat dikirim lewat input hidden, jadi tetap terbawa saat submit -->
      <input type="hidden" name="plat" value="<?= htmlspecialchars($data['Nomor_Plat']); ?>">

      <div class="mb-3">
        <label class="form-label">Nomor Plat</label>
        <input type="text" class="form-control" value="<?= htmlspecialchars($data['Nomor_Plat']); ?>" disabled>
      </div>

      <div class="mb-3">
        <label for="merk" class="form-label">Merk</label>
        <input type="text" class="form-control" id="merk" name="merk" value="<?= htmlspecialchars($data['Merk']); ?>">
      </div>

      <div class="mb-3">
        <label for="tahun" class="form-label">Tahun Pembuatan</label>
        <input type="number" class="form-control" id="tahun" name="tahun" value="<?= htmlspecialchars($data['Tahun_Pembuatan']); ?>">
      </div>

      <div class="mb-3">
        <label for="transmisi" class="form-label">Tipe Transmisi</label>
        <select class="form-select" id="transmisi" name="transmisi">
          <option value="Automatic" <?= $data['Tipe_Transmisi'] == "Automatic" ? "selected" : ""; ?>>Automatic</option>
          <option value="Manual" <?= $data['Tipe_Transmisi'] == "Manual" ? "selected" : ""; ?>>Manual</option>
        </select>
      </div>

      <button type="submit" class="btn btn-primary w-100">Simpan Perubahan</button>
    </form>
  </div>

</body>
</html>