<?php
include '../koneksi.php';

if(!isset($_GET['id'])){
  header("Location: index.php");
  exit;
}

$id = $_GET['id'];
$data = mysqli_query($koneksi,"SELECT * FROM berita WHERE id='$id'");
$d = mysqli_fetch_assoc($data);

if(!$d){
  echo "Data tidak ditemukan";
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title><?= $d['judul'] ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container py-5">

  <a href="../index.php#berita" class="btn btn-secondary mb-3">
    ← Kembali
  </a>

  <div class="card shadow">

    <img src="../gambar/<?= $d['gambar'] ?>" 
     class="card-img-top"
     style="max-height:500px;object-fit:contain;background:#fff;">

    <div class="card-body">
      <h3><?= $d['judul'] ?></h3>
      <hr>

      <p style="text-align:justify">
        <?= nl2br($d['isi']) ?>
      </p>
    </div>

  </div>

</div>

</body>
</html>