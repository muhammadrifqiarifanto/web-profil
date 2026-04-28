<?php
// koneksi database
include '../koneksi.php';

// menangkap data id yang di kirim dari url
$id = $_GET['id'];


// menghapus data dari database
mysqli_query($koneksi,"delete from profil_sekolah where id='$id'");

// mengalihkan halaman kembali ke data_profil_sekolah.php
header("location:data_profil_sekolah.php");

?>