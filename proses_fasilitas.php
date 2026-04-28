<?php
include '../koneksi.php';

$judul   = mysqli_real_escape_string($koneksi, $_POST['judul']);
$deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
$tanggal_upload = $_POST['tanggal_upload'];

$gambar  = $_FILES['gambar']['name'];
$tmp     = $_FILES['gambar']['tmp_name'];

if(!empty($gambar)){
    $ext = pathinfo($gambar, PATHINFO_EXTENSION);
    $gambar = time().'.'.$ext; // nama unik biar tidak ketimpa
    move_uploaded_file($tmp, "../gambar/".$gambar);
}

mysqli_query($koneksi, "INSERT INTO fasilitas 
(judul, deskripsi, gambar, tanggal_upload) VALUES (
    '$judul',
    '$deskripsi',
    '$gambar',
    '$tanggal_upload'
)");

header("location:data_fasilitas.php");
?>
