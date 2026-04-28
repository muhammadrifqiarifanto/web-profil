<?php
include '../koneksi.php';

$nama   = mysqli_real_escape_string($koneksi, $_POST['nama']);
$deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
$icon = mysqli_real_escape_string($koneksi, $_POST['icon']);

mysqli_query($koneksi, "INSERT INTO eskul 
(nama, deskripsi, icon) VALUES (
    '$nama',
    '$deskripsi',
    '$icon'
)");

header("location:data_eskul.php");
?>
