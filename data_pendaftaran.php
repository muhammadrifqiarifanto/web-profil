<?php 
include "template/header.php"; 
include "template/menu.php"; 
include "../koneksi.php";
?> 

<main class="app-main"> 
    <div class="app-content-header"> 
        <div class="container-fluid"> 
            <div class="row"> 
                <div class="col-sm-6"><h3 class="mb-0">Data Pendaftaran</h3></div> 
                <div class="col-sm-6"> 
                    <ol class="breadcrumb float-sm-end"> 
                        <li class="breadcrumb-item"><a href="hal_admin.php">Home</a></li> 
                        <li class="breadcrumb-item active" aria-current="page">Data Pendaftaran</li> 
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
                            <h3 class="card-title">Daftar Siswa Baru</h3> 
                        </div> 

                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped m-0">
                                    <thead>
                                        <tr class="align-middle text-center small">
                                            <th>No</th>
                                            <th>Nama Lengkap</th>
                                            <th>Nama Panggilan</th>
                                            <th>Tgl Lahir</th>
                                            <th>JK</th>
                                            <th>Agama</th>
                                            <th>Warga Negara</th>
                                            <th>Nama Ortu</th>
                                            <th>Status Ortu</th>
                                            <th>No HP</th>
                                            <th>Asal Sekolah</th>
                                            <th>Tahun Lulus</th>
                                            <th>Sumber Info</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        // Ambil semua data
                                        $query = mysqli_query($koneksi, "SELECT * FROM pendaftaran ORDER BY id_daftar DESC");
                                        while ($d = mysqli_fetch_array($query)) {
                                        ?>
                                        <tr class="align-middle small">
                                            <td class="text-center"><?php echo $no++; ?></td>
                                            <td class="fw-bold"><?php echo strtoupper($d['nama_lengkap']); ?></td>
                                            <td><?php echo $d['nama_panggilan']; ?></td>
                                            <td><?php echo date('d-m-Y', strtotime($d['tgl_lahir'])); ?></td>
                                            <td><?php echo strtoupper($d['jenis_kelamin']); ?></td>
                                            <td><?php echo $d['agama']; ?></td>
                                            <td><?php echo $d['kewarganegaraan']; ?></td>
                                            <td><?php echo $d['nama_ortu']; ?></td>
                                            <td><?php echo $d['status_ortu']; ?></td>
                                            <td><?php echo $d['no_hp']; ?></td>
                                            <td><?php echo $d['asal_sekolah']; ?></td>
                                            <td class="text-center"><?php echo $d['tahun_lulus']; ?></td>
                                            <td><?php echo $d['sumber_info']; ?></td>
                                            <td class="text-center">
                                                <a href="hapus_pendaftaran.php?id=<?= $d['id_daftar']; ?>" 
                                                   class="btn btn-sm btn-danger shadow-sm" 
                                                   title="Hapus" 
                                                   onclick="return confirm('Yakin ingin menghapus pendaftar ini?')">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card-footer clearfix bg-white">
                            <span class="text-muted small">*Data ini adalah hasil pendaftaran online dari halaman utama.</span>
                        </div> 
                    </div> 
                </div> 
            </div> 
        </div> 
    </div> 
</main> 

<?php 
include "template/footer.php"; 
?> 

<style>
@media print {
    .app-sidebar, .app-header, .card-header .btn, .breadcrumb, .card-footer {
        display: none !important;
    }
    .app-main { margin: 0 !important; padding: 0 !important; }
    .card { border: none !important; }
    table { width: 100% !important; border-collapse: collapse; }
    th, td { border: 1px solid #000 !important; padding: 5px; font-size: 10px; }
}
</style>