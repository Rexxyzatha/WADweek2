<?php 
include 'koneksi.php'; 

$query  = "SELECT * FROM bengkels";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Bengkel Mitra</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .card { border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
    </style>
</head>
<body class="py-5">

    <div class="container">
        <div class="card p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold mb-0">Daftar Bengkel Mitra</h3>
                <a href="tambah.php" class="btn btn-primary fw-semibold">+ Tambah Bengkel</a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center" style="width: 50px;">NO</th>
                            <th>NAMA BENGKEL</th>
                            <th>ALAMAT</th>
                            <th>NO. TELEPON</th>
                            <th>JENIS LAYANAN</th>
                            <th class="text-center" style="width: 150px;">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        if (mysqli_num_rows($result) > 0) :
                            while ($bengkel = mysqli_fetch_assoc($result)) : 
                        ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td class="fw-semibold"><?= htmlspecialchars($bengkel['nama_bengkel']); ?></td>
                            <td><?= htmlspecialchars($bengkel['alamat']); ?></td>
                            <td><?= htmlspecialchars($bengkel['no_telp']); ?></td>
                            <td><?= htmlspecialchars($bengkel['jenis_layanan']); ?></td>
                            <td class="text-center">
                                <a href="edit.php?id=<?= $bengkel['id']; ?>" class="btn btn-warning btn-sm text-white fw-semibold">Edit</a>
                                <a href="hapus.php?id=<?= $bengkel['id']; ?>" class="btn btn-danger btn-sm fw-semibold" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                        <?php 
                            endwhile;
                        else :
                        ?>
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">Belum ada data bengkel yang tersimpan.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>