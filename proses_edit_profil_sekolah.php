<?php
include '../koneksi.php';

$id = $_POST['id'];

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

// ambil logo lama
$logo = $_POST['logo_lama'];

// kalau upload logo baru
if(!empty($_FILES['logo']['name'])){
    $logo = time().'_'.$_FILES['logo']['name'];
    $tmp  = $_FILES['logo']['tmp_name'];
    move_uploaded_file($tmp, "../gambar/".$logo);
}

// update database
mysqli_query($koneksi, "UPDATE profil_sekolah SET
    nama_sekolah   = '$nama_sekolah',
    npsn           = '$npsn',
    alamat         = '$alamat',
    desa           = '$desa',
    kecamatan      = '$kecamatan',
    kabupaten      = '$kabupaten',
    provinsi       = '$provinsi',
    email          = '$email',
    telepon        = '$telepon',
    website        = '$website',
    kepala_sekolah = '$kepala_sekolah',
    logo           = '$logo',
    visi           = '$visi',
    misi           = '$misi',
    deskripsi      = '$deskripsi'
    WHERE id = '$id'
");

header("location:data_profil_sekolah.php");
?>
