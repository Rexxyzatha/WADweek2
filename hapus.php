<?php
require "koneksi.php";

$id = $_GET["id"];
mysqli_execute_query($koneksi, "DELETE FROM paket_rental WHERE id = ?", [$id]);

header("Location: index.php");
exit;