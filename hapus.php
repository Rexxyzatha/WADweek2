<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $query = "DELETE FROM bengkels WHERE id = $id";
    
    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
}
?>