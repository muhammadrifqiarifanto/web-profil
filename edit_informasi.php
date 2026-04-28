<?php
include "../koneksi.php";
include "template/header.php";
include "template/menu.php";

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM informasi WHERE id='$id'");
$d = mysqli_fetch_array($data);
?>

<main class="app-main">
<div class="app-content">
<div class="container-fluid">

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Data Informasi</h3>
    </div>

    <form method="post" action="proses_edit_informasi.php" enctype="multipart/form-data">
    <div class="card-body">

        <input type="hidden" name="id" value="<?= $d['id']; ?>">

        <div class="mb-3">
            <label class="form-label">Program Unggulan</label>
            <textarea type="text" name="program_unggulan" rows="4" class="form-control" 
                      required><?= $d['program_unggulan']; ?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Alur Pendaftaran</label>
            <textarea type="text" name="alur_pendaftaran" rows="4" class="form-control" 
                      required><?= $d['alur_pendaftaran']; ?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Persyaratan Pendaftaran</label>
            <textarea type="text" name="persyaratan_pendaftaran" rows="4" class="form-control" 
                      required><?= $d['persyaratan_pendaftaran']; ?></textarea>
        </div>        
        <div class="mb-3">
            <label class="form-label">Tanggal Update</label>
            <input type="date" name="tgl_update" class="form-control"
                   value="<?= date('Y-m-d', strtotime($d['tgl_update'])); ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Jurusan</label>
            <textarea type="text" name="jurusan" rows="4" class="form-control" 
                      required><?= $d['jurusan']; ?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Jadwal Harian</label>
            <textarea type="text" name="jadwal_harian" textarea class="form-control" 
                      required><?= $d['jadwal_harian']; ?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Gambar</label>
            <input type="file" name="gambar" class="form-control" accept="image/*" onchange="previewImage(this)">
        </div>
            <input type="hidden" name="gambar_lama" value="<?= $d['gambar']; ?>">
        <div>
          <img id="img-preview" src="../gambar/<?= $d['gambar']; ?>" class="img-fluid mt-2" style="max-height:200px;">
        </div>
        
            <script>
            function previewImage(input){
              const preview = document.getElementById('img-preview');
              const file = input.files[0];

              if(file){
                const reader = new FileReader();
                reader.onload = function(){
                  preview.src = reader.result;
                }
                reader.readAsDataURL(file);
              }
            }
            </script>
        </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save"></i> Simpan
        </button>
        <a href="data_informasi.php" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
    </form>

</div>

</div>
</div>
</main>

<?php include "template/footer.php"; ?>