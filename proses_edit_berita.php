<?php
include '../koneksi.php';

$id = $_POST['id'];
$judul   = mysqli_real_escape_string($koneksi, $_POST['judul']);
$isi     = mysqli_real_escape_string($koneksi, $_POST['isi']);
$tanggal = $_POST['tanggal'];
$penulis = mysqli_real_escape_string($koneksi, $_POST['penulis']);

// gambar lama
$gambar = $_POST['gambar_lama'];

// kalau upload gambar baru
if(!empty($_FILES['gambar']['name'])){
    $ext = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
    $gambar = time().'.'.$ext; // nama unik

    move_uploaded_file($_FILES['gambar']['tmp_name'], "../gambar/".$gambar);
}

// update database
mysqli_query($koneksi, "UPDATE berita SET
    judul='$judul',
    isi='$isi',
    gambar='$gambar',
    tanggal='$tanggal',
    penulis='$penulis'
    WHERE id='$id'
");

header("location:data_berita.php");
?>
