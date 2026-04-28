<?php
include '../koneksi.php';

$id              = $_POST['id'];
$judul           = mysqli_real_escape_string($koneksi, $_POST['judul']);
$deskripsi       = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
$tanggal_upload  = $_POST['tanggal_upload'];

// ambil gambar lama
$gambar = $_POST['gambar_lama'];

// kalau upload gambar baru
if(!empty($_FILES['gambar']['name'])){
    $gambar = time().'_'.$_FILES['gambar']['name'];
    $tmp    = $_FILES['gambar']['tmp_name'];

    move_uploaded_file($tmp, "../gambar/".$gambar);
}

// update database
mysqli_query($koneksi, "UPDATE fasilitas SET
    judul = '$judul',
    deskripsi = '$deskripsi',
    gambar = '$gambar',
    tanggal_upload = '$tanggal_upload'
    WHERE id = '$id'
");

header("location:data_fasilitas.php");
?>
