<?php 
include "template/header.php"; 
include "template/menu.php"; 
include "../koneksi.php";
?> 

<main class="app-main"> 
    <div class="app-content-header"> 
        <div class="container-fluid">
            <div class="row"> 
                <div class="col-sm-6"><h3 class="mb-0">Profil Sekolah</h3></div> 
                <div class="col-sm-6"> 
                    <ol class="breadcrumb float-sm-end"> 
                        <li class="breadcrumb-item"><a href="#">Home</a></li> 
                        <li class="breadcrumb-item active">Profil Sekolah</li> 
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
                            <h3 class="card-title">Data Profil Lengkap</h3> 
                            <div class="card-tools"> 
                                <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse"> 
                                    <i data-lte-icon="expand" class="bi bi-plus-lg"></i> 
                                    <i data-lte-icon="collapse" class="bi bi-dash-lg"></i> 
                                </button> 
                            </div>                    
                        </div> 
                        
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover align-middle mb-0" style="min-width: 2000px;">
                                    <thead class="table-dark text-nowrap text-center">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Sekolah</th>
                                            <th>NPSN</th>
                                            <th>Alamat</th>
                                            <th>Desa</th>
                                            <th>Kecamatan</th>
                                            <th>Kabupaten</th>
                                            <th>Provinsi</th>
                                            <th>Email</th>
                                            <th>Telepon</th>
                                            <th>Website</th>
                                            <th>Kepala Sekolah</th>
                                            <th>Logo</th>
                                            <th>Visi</th>
                                            <th>Misi</th>
                                            <th>Deskripsi</th>
                                            <th style="min-width: 120px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $data = mysqli_query($koneksi, "SELECT * FROM profil_sekolah");
                                        while ($d = mysqli_fetch_array($data)) {
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo $no++; ?></td>
                                            <td class="fw-bold text-nowrap"><?php echo $d['nama_sekolah']; ?></td>
                                            <td><?php echo $d['npsn']; ?></td>
                                            <td><div style="width: 200px;"><?php echo $d['alamat']; ?></div></td>
                                            <td class="text-nowrap"><?php echo $d['desa']; ?></td>
                                            <td class="text-nowrap"><?php echo $d['kecamatan']; ?></td>
                                            <td class="text-nowrap"><?php echo $d['kabupaten']; ?></td>
                                            <td class="text-nowrap"><?php echo $d['provinsi']; ?></td>
                                            <td><?php echo $d['email']; ?></td>
                                            <td class="text-nowrap"><?php echo $d['telepon']; ?></td>
                                            <td><?php echo $d['website']; ?></td>
                                            <td class="text-nowrap"><?php echo $d['kepala_sekolah']; ?></td>
                                            <td class="text-center">
                                                <img src="../gambar/<?php echo $d['logo']; ?>" width="100" class="img-thumbnail">
                                            </td>
                                            <td>
                                                <div style="width: 250px; max-height: 100px; overflow-y: auto; font-size: 13px;">
                                                    <?php echo $d['visi']; ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div style="width: 250px; max-height: 100px; overflow-y: auto; font-size: 13px;">
                                                    <?php echo $d['misi']; ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div style="width: 300px; max-height: 100px; overflow-y: auto; font-size: 13px;">
                                                    <?php echo $d['deskripsi']; ?>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="edit_profil_sekolah.php?id=<?= $d['id']; ?>" class="btn btn-sm btn-warning">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                    <a href="hapus_profil_sekolah.php?id=<?= $d['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data?')">
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