<?php
include '../koneksi.php';

$id = $_POST['id'];

$program_unggulan = mysqli_real_escape_string($koneksi, $_POST['program_unggulan']);
$alur_pendaftaran = mysqli_real_escape_string($koneksi, $_POST['alur_pendaftaran']);
$persyaratan_pendaftaran = mysqli_real_escape_string($koneksi, $_POST['persyaratan_pendaftaran']);
$tgl_update = mysqli_real_escape_string($koneksi, $_POST['tgl_update']);
$jurusan = mysqli_real_escape_string($koneksi, $_POST['jurusan']);
$jadwal_harian      = mysqli_real_escape_string($koneksi, $_POST['jadwal_harian']);

// ambil gambar lama
$gambar = $_POST['gambar_lama'];

// kalau upload gambar baru
if(!empty($_FILES['gambar']['name'])){
    $gambar = time().'_'.$_FILES['gambar']['name'];
    $tmp  = $_FILES['gambar']['tmp_name'];
    move_uploaded_file($tmp, "../gambar/".$gambar);
}

// update database
mysqli_query($koneksi, "UPDATE informasi SET
    program_unggulan = '$program_unggulan',
    alur_pendaftaran = '$alur_pendaftaran',
    persyaratan_pendaftaran = '$persyaratan_pendaftaran',
    tgl_update = '$tgl_update',
    jurusan = '$jurusan',
    jadwal_harian = '$jadwal_harian',
    gambar = '$gambar'
    WHERE id = '$id'
");

header("location:data_informasi.php");
?>