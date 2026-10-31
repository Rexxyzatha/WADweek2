<?php
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' || isset($_GET['plat'])) {
    $plat = $_POST['plat'] ?? $_GET['plat'] ?? '';

    if (!empty($plat)) {
        $stmt = mysqli_prepare($koneksi, "DELETE FROM armada_kendaraan WHERE Nomor_Plat = ?");
        mysqli_stmt_bind_param($stmt, "s", $plat);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: index.php?status=dihapus");
            exit;
        } else {
            die("Gagal menghapus data: " . mysqli_error($koneksi));
        }
    }
}

// Jika tidak ada plat atau akses langsung, kembalikan ke index.php
header("Location: index.php");
exit;
?>

if ($_SERVER['REQUEST_METHOD'] === 'POST' || isset($_GET['plat'])) {
    $plat = $_POST['plat'] ?? $_GET['plat'] ?? '';

    if (!empty($plat)) {
        $stmt = mysqli_prepare($koneksi, "DELETE FROM armada_kendaraan WHERE Nomor_Plat = ?");
        mysqli_stmt_bind_param($stmt, "s", $plat);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: index.php?status=dihapus");
            exit;
        } else {
            die("Gagal menghapus data: " . mysqli_error($koneksi));
        }
    }
}

// Jika tidak ada plat atau akses langsung, kembalikan ke index.php
header("Location: index.php");
exit;
?>

