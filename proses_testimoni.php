<?php
include '../koneksi.php';

$nama   = mysqli_real_escape_string($koneksi, $_POST['nama']);
$angkatan = mysqli_real_escape_string($koneksi, $_POST['angkatan']);
$pesan = mysqli_real_escape_string($koneksi, $_POST['pesan']);

$foto  = $_FILES['foto']['name'];
$tmp     = $_FILES['foto']['tmp_name'];

if(!empty($foto)){
    $ext = pathinfo($foto, PATHINFO_EXTENSION);
    $foto = time().'.'.$ext; // nama unik biar tidak ketimpa
    move_uploaded_file($tmp, "../gambar/".$foto);
}

mysqli_query($koneksi, "INSERT INTO testimoni 
(nama, angkatan, pesan, foto) VALUES (
    '$nama',
    '$angkatan',
    '$pesan',
    '$foto'
)");

header("location:data_testimoni.php");
?>
