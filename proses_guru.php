<?php
include '../koneksi.php';

$nama_guru    = mysqli_real_escape_string($koneksi, $_POST['nama_guru']);
$nip          = mysqli_real_escape_string($koneksi, $_POST['nip']);
$jenis_kelamin= $_POST['jenis_kelamin'];
$mapel        = mysqli_real_escape_string($koneksi, $_POST['mapel']);
$email        = mysqli_real_escape_string($koneksi, $_POST['email']);
$no_hp        = mysqli_real_escape_string($koneksi, $_POST['no_hp']);

$foto  = $_FILES['foto']['name'];
$tmp   = $_FILES['foto']['tmp_name'];

if(!empty($foto)){
    $ext = pathinfo($foto, PATHINFO_EXTENSION);
    $foto = time().'_'.$foto; // biar unik & tidak ketimpa
    move_uploaded_file($tmp, "../gambar/".$foto);
}

mysqli_query($koneksi, "INSERT INTO guru 
(nama_guru, nip, jenis_kelamin, mapel, foto, email, no_hp) VALUES (
    '$nama_guru',
    '$nip',
    '$jenis_kelamin',
    '$mapel',
    '$foto',
    '$email',
    '$no_hp'
)");

header("location:data_guru.php");
?>
