<?php
include '../koneksi.php';

$id = $_POST['id'];
$nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
$deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
$icon = mysqli_real_escape_string($koneksi, $_POST['icon']);


// update database
mysqli_query($koneksi, "UPDATE eskul SET
    nama = '$nama',
    deskripsi = '$deskripsi',
    icon = '$icon'
    WHERE id = '$id'
");

header("location:data_eskul.php");
?>
