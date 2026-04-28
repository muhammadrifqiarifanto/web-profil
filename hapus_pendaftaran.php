<?php
include '../koneksi.php';
$id_daftar = $_GET['id_daftar'];
mysqli_query($koneksi, "DELETE FROM pendaftaran WHERE id_daftar='$id_daftar'");
header("location:data_pendaftaran.php");
?>