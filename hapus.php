<?php
include "koneksi.php";

if ($_SERVER['request_method'] == "POST"){
$plat = $_POST['plat'];

$stmt = mysqli_prepare($koneksi, "DELETE FROM armada_kendaraan WHERE Nomor_Plat = ?");
  mysqli_stmt_bind_param($stmt, "s", $plat);
  mysqli_stmt_execute($stmt);

  if (mysqli_stmt_affected_rows($stmt) > 0) {
    header("Location: index.php?status=dihapus");
  }else{
    header("Location: index.php?status = gagal");
  }
}

header("Location: index.php");