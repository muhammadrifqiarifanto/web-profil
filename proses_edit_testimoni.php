<?php
include '../koneksi.php';

$id = $_POST['id'];
$nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
$angkatan = mysqli_real_escape_string($koneksi, $_POST['angkatan']);
$pesan = mysqli_real_escape_string($koneksi, $_POST['pesan']);

// ambil foto lama
$foto = $_POST['foto_lama'];

// kalau upload foto baru
if(!empty($_FILES['foto']['name'])){
    $foto = time().'_'.$_FILES['foto']['name'];
    $tmp    = $_FILES['foto']['tmp_name'];

    move_uploaded_file($tmp, "../gambar/".$foto);
}

// update database
mysqli_query($koneksi, "UPDATE testimoni SET
    nama = '$nama',
    angkatan = '$angkatan',
    pesan = '$pesan',
    foto = '$foto'
    WHERE id = '$id'
");

header("location:data_testimoni.php");
?>
