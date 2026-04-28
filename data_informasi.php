<?php 
include "template/header.php"; 
include "template/menu.php"; 
include "../koneksi.php";
?> 

<main class="app-main"> 
    <div class="app-content-header"> 
        <div class="container-fluid">
            <div class="row"> 
                <div class="col-sm-6"><h3 class="mb-0">Informasi</h3></div> 
                <div class="col-sm-6"> 
                    <ol class="breadcrumb float-sm-end"> 
                        <li class="breadcrumb-item"><a href="#">Home</a></li> 
                        <li class="breadcrumb-item active">Informasi</li> 
                    </ol> 
                </div> 
            </div> 
        </div> 
    </div> 

    <div class="app-content"> 
        <div class="container-fluid"> 
            <div class="row"> 
                <div class="col-12">                     
                    <div class="card shadow-sm"> 
                        <div class="card-header">
                            <h3 class="card-title">Data Informasi Lengkap</h3> 
                            <div class="card-tools"> 
                                <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse"> 
                                    <i data-lte-icon="expand" class="bi bi-plus-lg"></i> 
                                    <i data-lte-icon="collapse" class="bi bi-dash-lg"></i> 
                                </button> 
                            </div>                    
                        </div> 
                        
                        <div class="card-body p-0">
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle mb-0" style="min-width: 2200px;">
            <thead class="table-dark text-nowrap text-center">
                <tr>
                    <th width="50px">No</th>
                    <th>Program Unggulan</th>
                    <th>Kelebihan Kami</th>
                    <th>Alur Pendaftaran</th>
                    <th>Persyaratan Pendaftaran</th>
                    <th>Tanggal Update</th>
                    <th>Jurusan</th>
                    <th>Jadwal Harian</th>
                    <th>Gambar</th>
                    <th style="min-width: 120px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $data = mysqli_query($koneksi, "SELECT * FROM informasi");
                while ($d = mysqli_fetch_array($data)) {
                ?>
                <tr>
                    <td class="text-center fw-bold"><?php echo $no++; ?></td>
                    
                    <td><div class="text-scroll"><?php echo nl2br($d['program_unggulan']); ?></div></td>
                    
                    <td><div class="text-scroll"><?php echo nl2br($d['kelebihan_kami']); ?></div></td>
                    
                    <td><div class="text-scroll"><?php echo nl2br($d['alur_pendaftaran']); ?></div></td>
                    
                    <td><div class="text-scroll"><?php echo nl2br($d['persyaratan_pendaftaran']); ?></div></td>
                    
                    <td class="text-center text-nowrap">
                        <span class="badge bg-light text-dark border">
                            <i class="bi bi-calendar3 me-1"></i><?php echo $d['tgl_update']; ?>
                        </span>
                    </td>

                    <td><div class="text-scroll"><?php echo nl2br($d['jurusan']); ?></div></td>

                    <td><div class="text-scroll" style="height: 200px;"><?php echo nl2br($d['jadwal_harian']); ?></div></td>
                    
                    <td class="text-center">
                        <a href="../gambar/<?php echo $d['gambar']; ?>" target="_blank">
                            <img src="../gambar/<?php echo $d['gambar']; ?>" width="100" class="img-thumbnail shadow-sm">
                        </a>
                    </td>

                    <td class="text-center">
                        <div class="btn-group shadow-sm">
                            <a href="edit_informasi.php?id=<?= $d['id']; ?>" class="btn btn-sm btn-warning" title="Edit Data">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="hapus_informasi.php?id=<?= $d['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" title="Hapus Data">
                                <i class="bi bi-trash"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<style>
    /* Mengatur agar teks panjang tidak merusak tata letak tabel */
    .text-scroll {
        width: 250px;
        max-height: 120px;
        overflow-y: auto;
        font-size: 0.85rem;
        padding: 8px;
        background-color: #f9f9f9;
        border: 1px solid #eee;
        border-radius: 5px;
        white-space: pre-wrap; /* Menjaga baris baru dari nl2br */
        text-align: left;
    }
    
    /* Mempercantik Scrollbar di dalam cell */
    .text-scroll::-webkit-scrollbar {
        width: 4px;
    }
    .text-scroll::-webkit-scrollbar-thumb {
        background: #ccc;
        border-radius: 10px;
    }
    
    .table td {
        vertical-align: top !important; /* Agar konten rata atas */
    }
</style>
                        
                        <div class="card-footer clearfix">
                            <span class="text-muted small">Geser ke kanan untuk melihat semua kolom &rarr;</span>
                        </div> 
                    </div> 
                </div> 
            </div> 
        </div> 
    </div> 
</main>        

<?php include "template/footer.php"; ?>