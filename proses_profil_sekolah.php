<?php
include '../koneksi.php';

$nama_sekolah   = mysqli_real_escape_string($koneksi, $_POST['nama_sekolah']);
$npsn           = mysqli_real_escape_string($koneksi, $_POST['npsn']);
$alamat         = mysqli_real_escape_string($koneksi, $_POST['alamat']);
$desa           = mysqli_real_escape_string($koneksi, $_POST['desa']);
$kecamatan      = mysqli_real_escape_string($koneksi, $_POST['kecamatan']);
$kabupaten      = mysqli_real_escape_string($koneksi, $_POST['kabupaten']);
$provinsi       = mysqli_real_escape_string($koneksi, $_POST['provinsi']);
$email          = mysqli_real_escape_string($koneksi, $_POST['email']);
$telepon        = mysqli_real_escape_string($koneksi, $_POST['telepon']);
$website        = mysqli_real_escape_string($koneksi, $_POST['website']);
$kepala_sekolah = mysqli_real_escape_string($koneksi, $_POST['kepala_sekolah']);
$visi           = mysqli_real_escape_string($koneksi, $_POST['visi']);
$misi           = mysqli_real_escape_string($koneksi, $_POST['misi']);
$deskripsi      = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);

// upload logo
$logo = $_FILES['logo']['name'];
$tmp  = $_FILES['logo']['tmp_name'];

if(!empty($logo)){
    move_uploaded_file($tmp, "../gambar/".$logo);
}

mysqli_query($koneksi, "INSERT INTO profil_sekolah 
(nama_sekolah, npsn, alamat, desa, kecamatan, kabupaten, provinsi, email, telepon, website, kepala_sekolah, logo, visi, misi, deskripsi) 
VALUES (
    '$nama_sekolah',
    '$npsn',
    '$alamat',
    '$desa',
    '$kecamatan',
    '$kabupaten',
    '$provinsi',
    '$email',
    '$telepon',
    '$website',
    '$kepala_sekolah',
    '$logo',
    '$visi',
    '$misi',
    '$deskripsi'
)");

header("location:data_profil_sekolah.php");
?>
