<?php
include '../koneksi.php';

$judul   = mysqli_real_escape_string($koneksi, $_POST['judul']);
$isi     = mysqli_real_escape_string($koneksi, $_POST['isi']);
$tanggal = $_POST['tanggal'];
$penulis = mysqli_real_escape_string($koneksi, $_POST['penulis']);

$gambar  = $_FILES['gambar']['name'];
$tmp     = $_FILES['gambar']['tmp_name'];

if(!empty($gambar)){
    $gambar = time().'_'.$gambar; // supaya nama unik
    move_uploaded_file($tmp, "../gambar/".$gambar);
}

mysqli_query($koneksi, "INSERT INTO berita 
(judul, isi, gambar, tanggal, penulis)
VALUES (
    '$judul',
    '$isi',
    '$gambar',
    '$tanggal',
    '$penulis'
)");

header("location:data_berita.php");
?>
