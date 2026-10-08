<?php
include 'koneksi.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM bengkels WHERE id = $id");
$bengkel = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $nama_bengkel  = mysqli_real_escape_string($conn, $_POST['nama_bengkel']);
    $alamat        = mysqli_real_escape_string($conn, $_POST['alamat']);
    $no_telp       = mysqli_real_escape_string($conn, $_POST['no_telp']);
    $jenis_layanan = mysqli_real_escape_string($conn, $_POST['jenis_layanan']);

    $query = "UPDATE bengkels SET 
                nama_bengkel = '$nama_bengkel', 
                alamat = '$alamat', 
                no_telp = '$no_telp', 
                jenis_layanan = '$jenis_layanan' 
              WHERE id = $id";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal memperbarui data: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Bengkel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light py-5">

    <div class="container" style="max-width: 600px;">
        <div class="card p-4 shadow-sm border-0 rounded-3">
            <h4 class="fw-bold mb-4">Edit Data Bengkel</h4>
            
            <form action="" method="POST">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Bengkel</label>
                    <input type="text" name="nama_bengkel" class="form-control" value="<?= htmlspecialchars($bengkel['nama_bengkel']); ?>" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label fw-semibold">Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3" required><?= htmlspecialchars($bengkel['alamat']); ?></textarea>
                </div>
                
                <div class="mb-3">
                    <label class="form-label fw-semibold">No. Telepon</label>
                    <input type="text" name="no_telp" class="form-control" value="<?= htmlspecialchars($bengkel['no_telp']); ?>" required>
                </div>
                
                <div class="mb-4">
                    <label class="form-label fw-semibold">Jenis Layanan</label>
                    <input type="text" name="jenis_layanan" class="form-control" value="<?= htmlspecialchars($bengkel['jenis_layanan']); ?>" required>
                </div>
                
                <div class="d-flex justify-content-end gap-2">
                    <a href="index.php" class="btn btn-light fw-semibold">Batal</a>
                    <button type="submit" name="update" class="btn btn-warning text-white fw-semibold">Perbarui</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>