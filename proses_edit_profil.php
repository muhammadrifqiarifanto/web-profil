<?php
include "../koneksi.php";

$id = $_POST['id'];
$username = $_POST['username'];
$nama = $_POST['nama_admin'];

if(!empty($_FILES['gambar']['name'])){

    $nama_file = rand()."_".$_FILES['gambar']['name'];
    move_uploaded_file($_FILES['gambar']['tmp_name'], "../gambar/".$nama_file);

    mysqli_query($koneksi,"UPDATE admin SET 
        username='$username',
        nama_admin='$nama',
        gambar='$nama_file'
        WHERE id='$id'");

}else{

    mysqli_query($koneksi,"UPDATE admin SET 
        username='$username',
        nama_admin='$nama'
        WHERE id='$id'");
}

echo "<script>
alert('Profil berhasil diupdate');
window.location='profil.php';
</script>";
