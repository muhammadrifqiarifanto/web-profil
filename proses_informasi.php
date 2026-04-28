<?php
include '../koneksi.php';

$program_unggulan = mysqli_real_escape_string($koneksi, $_POST['program_unggulan']);
$alur_pendaftaran = mysqli_real_escape_string($koneksi, $_POST['alur_pendaftaran']);
$persyaratan_pendaftaran = mysqli_real_escape_string($koneksi, $_POST['persyaratan_pendaftaran']);
$tgl_update = mysqli_real_escape_string($koneksi, $_POST['tgl_update']);
$jurusan = mysqli_real_escape_string($koneksi, $_POST['jurusan']);
$jadwal_harian      = mysqli_real_escape_string($koneksi, $_POST['jadwal_harian']);

// upload gambar
$gambar = $_FILES['gambar']['name'];
$tmp  = $_FILES['gambar']['tmp_name'];

if(!empty($gambar)){
    move_uploaded_file($tmp, "../gambar/".$gambar);
}

mysqli_query($koneksi, "INSERT INTO informasi 
(program_unggulan, alur_pendaftaran, persyaratan_pendaftaran, tgl_update, jurusan, jadwal_harian, gambar) 
VALUES (
    '$program_unggulan',
    '$alur_pendaftaran',
    '$persyaratan_pendaftaran',
    '$tgl_update',
    '$jurusan',
    '$jadwal_harian',
    '$gambar'
)");

header("location:data_informasi.php");
?>