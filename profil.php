<?php
session_start();
include "../koneksi.php";

$id = $_SESSION['id'];
$data = mysqli_query($koneksi,"SELECT * FROM admin WHERE id='$id'");
$d = mysqli_fetch_assoc($data);

$foto = (!empty($d['gambar'])) ? "../gambar/".$d['gambar'] : "../gambar/default.png";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Profil Admin</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body{
    background:#f4f6f9;
}
.profile-card{
    border-radius:15px;
    box-shadow:0 4px 12px rgba(0,0,0,.1);
}
.profile-img{
    width:130px;
    height:130px;
    object-fit:cover;
    border-radius:50%;
    border:4px solid #0d6efd;
}
</style>
</head>
<body>

<div class="container mt-5">
<div class="row justify-content-center">

<div class="col-md-4">
    <div class="card profile-card text-center p-4">
        <img src="<?= $foto ?>" class="profile-img mx-auto mb-3">
        <h4><?= $d['nama_admin'] ?></h4>
        <p class="text-muted">@<?= $d['username'] ?></p>
    </div>
</div>

<div class="col-md-6">
    <div class="card profile-card p-4">
        <h5 class="mb-3">Edit Profil</h5>

        <form action="proses_edit_profil.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $d['id'] ?>">

            <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" value="<?= $d['username'] ?>" class="form-control">
            </div>

            <div class="mb-3">
                <label>Nama Admin</label>
                <input type="text" name="nama_admin" value="<?= $d['nama_admin'] ?>" class="form-control">
            </div>

            <div class="mb-3">
                <label>Foto Profil</label>
                <input type="file" name="gambar" class="form-control" onchange="previewImage(event)">
            </div>

            <div class="mb-3">
                <img id="preview" src="<?= $foto ?>" class="profile-img">
            </div>

            <button class="btn btn-primary w-100">Simpan Perubahan</button>
        </form>

    </div>
</div>

</div>
</div>

<script>
function previewImage(event){
    const img = document.getElementById('preview');
    img.src = URL.createObjectURL(event.target.files[0]);
}
</script>

</body>
</html>
