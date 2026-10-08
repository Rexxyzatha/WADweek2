<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nama_bengkel  = mysqli_real_escape_string($conn, $_POST['nama_bengkel']);
    $alamat        = mysqli_real_escape_string($conn, $_POST['alamat']);
    $no_telp       = mysqli_real_escape_string($conn, $_POST['no_telp']);
    $jenis_layanan = mysqli_real_escape_string($conn, $_POST['jenis_layanan']);

    $query = "INSERT INTO bengkels (nama_bengkel, alamat, no_telp, jenis_layanan) 
              VALUES ('$nama_bengkel', '$alamat', '$no_telp', '$jenis_layanan')";
              
    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Bengkel Mitra</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light py-5">

    <div class="container" style="max-width: 600px;">
        <div class="card p-4 shadow-sm border-0 rounded-3">
            <h4 class="fw-bold mb-4">Tambah Bengkel Mitra</h4>
            
            <form action="" method="POST">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Bengkel</label>
                    <input type="text" name="nama_bengkel" class="form-control" placeholder="Masukkan nama bengkel" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label fw-semibold">Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3" placeholder="Masukkan alamat lengkap" required></textarea>
                </div>
                
                <div class="mb-3">
                    <label class="form-label fw-semibold">No. Telepon</label>
                    <input type="text" name="no_telp" class="form-control" placeholder="Contoh: 08123456789" required>
                </div>
                
                <div class="mb-4">
                    <label class="form-label fw-semibold">Jenis Layanan</label>
                    <input type="text" name="jenis_layanan" class="form-control" placeholder="Contoh: Servis Rutin, Ganti Oli" required>
                </div>
                
                <div class="d-flex justify-content-end gap-2">
                    <a href="index.php" class="btn btn-light fw-semibold">Batal</a>
                    <button type="submit" name="submit" class="btn btn-primary fw-semibold">Simpan</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>