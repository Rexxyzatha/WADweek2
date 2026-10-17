<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "koneksi.php";

$hasil = mysqli_query($koneksi, "SELECT * FROM armada_kendaraan");
if (!$hasil) {
  die("Query gagal: " . mysqli_error($koneksi));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Modul Armada Kendaraan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <nav class="navbar navbar-expand navbararmada shadow-sm">
    <span class="navbar-brand fw-bold text-white">Armada Kendaraan</span>
    <ul class="navbar-nav ms-auto">
      <li class="nav-item">
        <a class="nav-link active text-white" href="index.php">Daftar Kendaraan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="tambah.php">Tambah Kendaraan</a>
      </li>
    </ul>
  </nav>

  <h1 class="text-center mt-4 mb-4">Modul Armada Kendaraan</h1>
  
  <div class="kartu">
    <table class="my-table table table-striped">
      <thead>
        <tr>
          <th>Nomor Plat</th>
          <th>Merk</th>
          <th>Tahun Pembuatan</th>
          <th>Tipe Transmisi</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if (mysqli_num_rows($hasil) > 0) : ?>
          <?php while ($row = mysqli_fetch_assoc($hasil)) : ?>
            <tr>
              <td><?= htmlspecialchars($row['Nomor_Plat']); ?></td>
              <td><?= htmlspecialchars($row['Merk']); ?></td>
              <td><?= htmlspecialchars($row['Tahun_Pembuatan']); ?></td>
              <td><?= htmlspecialchars($row['Tipe_Transmisi']); ?></td>
              <td>
                <a href="edit.php?plat=<?= urlencode($row['Nomor_Plat']); ?>" class="btn btn-sm btn-warning">Edit</a>

                <form action="hapus.php" method="post" class="d-inline" onsubmit="return confirm('Yakin mau hapus kendaraan ini?');">
                <input type="hidden" name="plat" value="<?= htmlspecialchars($row['Nomor_Plat']); ?>">
                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
              </form>
             </td>
            </tr>
          <?php endwhile; ?>
        <?php else : ?>
          <tr>
            <td colspan="4" class="text-center">Belum ada data kendaraan.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

</body>
</html>