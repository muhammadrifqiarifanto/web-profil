<?php
session_start();
include '../koneksi.php';

$username = mysqli_real_escape_string($koneksi, $_POST['username']);
$password = mysqli_real_escape_string($koneksi, $_POST['password']);

$query = mysqli_query($koneksi, 
    "SELECT * FROM admin 
     WHERE username='$username' 
     AND password='$password'"
);

$data = mysqli_fetch_assoc($query);
$cek  = mysqli_num_rows($query);

if ($cek == 1) {

    $_SESSION['id'] = $data['id'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['nama_admin'] = $data['nama_admin'];

    header("location:hal_admin.php");
    exit;

} else {

    echo "<script>
            alert('Username atau Password salah');
            window.location='login.php';
          </script>";
}
?>