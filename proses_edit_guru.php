<?php
include '../koneksi.php';

$id            = $_POST['id'];
$nama_guru     = mysqli_real_escape_string($koneksi, $_POST['nama_guru']);
$nip           = mysqli_real_escape_string($koneksi, $_POST['nip']);
$jenis_kelamin = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']);
$mapel         = mysqli_real_escape_string($koneksi, $_POST['mapel']);
$email         = mysqli_real_escape_string($koneksi, $_POST['email']);
$no_hp         = mysqli_real_escape_string($koneksi, $_POST['no_hp']);

// ambil foto lama
$foto = $_POST['foto_lama'];

// kalau upload foto baru
if(!empty($_FILES['foto']['name'])){
    $foto = time().'_'.$_FILES['foto']['name'];
    $tmp  = $_FILES['foto']['tmp_name'];
    move_uploaded_file($tmp, "../gambar/".$foto);
}

// update database
mysqli_query($koneksi, "UPDATE guru SET
    nama_guru     = '$nama_guru',
    nip           = '$nip',
    foto          = '$foto',
    jenis_kelamin = '$jenis_kelamin',
    mapel         = '$mapel',
    email         = '$email',
    no_hp         = '$no_hp'
    WHERE id = '$id'
");

header("location:data_guru.php");
?>
