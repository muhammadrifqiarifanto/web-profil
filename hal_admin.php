<?php 
include "template/header.php"; 
include "template/menu.php"; 
include "../koneksi.php";

// 1. Ambil data statistik
$total_semua_pesan = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM pesan"));
$total_unread = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM pesan WHERE balasan = '0' OR balasan = '' OR balasan IS NULL"));
$total_berita = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM berita"));
$total_galeri  = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM galeri"));
$total_guru = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM guru"));
$total_fasilitas = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM fasilitas"));
$total_eskul = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM eskul"));
$total_testimoni = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM testimoni"));
$total_info = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM informasi"));

// 2. Ambil Data Pendaftar Terbaru (Gunakan nama_siswa sebagai urutan karena 'id' tidak ada)
$query_pendaftar = mysqli_query($koneksi, "SELECT * FROM pendaftaran ORDER BY id_daftar DESC LIMIT 5");
?>

<main class="app-main p-4" style="background-color: #f4f7fa; min-height: 100vh;">
    <div class="container-fluid">
        
        <div class="row mb-4 align-items-center">
            <div class="col-md-7">
                <h3 class="fw-bold text-dark m-0">Ringkasan Dashboard</h3>
                <p class="text-muted m-0">Selamat datang di Panel Admin SMK Luqman Al-Hakim.</p>
            </div>
            <div class="col-md-5 mt-3 mt-md-0">
                <?php if ($total_unread > 0): ?>
                    <div class="card border-0 shadow-sm bg-danger text-white overflow-hidden">
                        <div class="card-body p-2 d-flex align-items-center">
                            <div class="bg-white bg-opacity-25 p-2 rounded-3 me-3 ms-2">
                                <i class="bi bi-envelope-exclamation-fill fs-4"></i>
                            </div>
                            <div>
                                <small class="d-block opacity-75">Pesan Belum Dibalas</small>
                                <h6 class="m-0 fw-bold"><?= $total_unread ?> Pesan Baru <a href="data_kontak.php" class="text-white ms-2"><i class="bi bi-arrow-right-circle"></i></a></h6>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="card border-0 shadow-sm bg-success text-white">
                        <div class="card-body p-2 d-flex align-items-center">
                            <i class="bi bi-check-circle-fill fs-4 me-3 ms-2"></i>
                            <p class="m-0 small fw-medium">Semua pesan sudah ditangani</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm rounded-4 h-100 p-2">
                    <div class="card-body d-flex align-items-center">
                        <div class="bg-primary bg-opacity-10 p-3 rounded-4 me-3">
                            <i class="bi bi-newspaper text-primary fs-3"></i>
                        </div>
                        <div>
                            <h4 class="fw-bold mb-0"><?= $total_berita ?></h4>
                            <p class="text-muted small mb-0">Total Berita</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm rounded-4 h-100 p-2">
                    <div class="card-body d-flex align-items-center">
                        <div class="bg-success bg-opacity-10 p-3 rounded-4 me-3">
                            <i class="bi bi-images text-success fs-3"></i>
                        </div>
                        <div>
                            <h4 class="fw-bold mb-0"><?= $total_galeri ?></h4>
                            <p class="text-muted small mb-0">Total Foto</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm rounded-4 h-100 p-2">
                    <div class="card-body d-flex align-items-center">
                        <div class="bg-warning bg-opacity-10 p-3 rounded-4 me-3">
                            <i class="bi bi-people-fill text-warning fs-3"></i>
                        </div>
                        <div>
                            <h4 class="fw-bold mb-0"><?= $total_guru ?></h4>
                            <p class="text-muted small mb-0">Total Guru</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm rounded-4 h-100 p-2 bg-dark text-white">
                    <div class="card-body d-flex align-items-center">
                        <div class="bg-white bg-opacity-10 p-3 rounded-4 me-3">
                            <i class="bi bi-chat-left-dots text-info fs-3"></i>
                        </div>
                        <div>
                            <h4 class="fw-bold mb-0 text-white"><?= $total_semua_pesan ?></h4>
                            <p class="text-white-50 small mb-0">Total Pesan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm rounded-4 h-100 p-2">
                    <div class="card-body d-flex align-items-center">
                        <div class="bg-info bg-opacity-10 p-3 rounded-4 me-3">
                            <i class="bi bi-building text-info fs-3"></i>
                        </div>
                        <div>
                            <h4 class="fw-bold mb-0"><?= $total_fasilitas ?></h4>
                            <p class="text-muted small mb-0">Fasilitas</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm rounded-4 h-100 p-2">
                    <div class="card-body d-flex align-items-center">
                        <div class="bg-danger bg-opacity-10 p-3 rounded-4 me-3">
                            <i class="bi bi-trophy-fill text-danger fs-3"></i>
                        </div>
                        <div>
                            <h4 class="fw-bold mb-0"><?= $total_eskul ?></h4>
                            <p class="text-muted small mb-0">Ektrakurikuler</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm rounded-4 h-100 p-2">
                    <div class="card-body d-flex align-items-center">
                        <div class="bg-secondary bg-opacity-10 p-3 rounded-4 me-3">
                            <i class="bi bi-chat-quote-fill text-secondary fs-3"></i>
                        </div>
                        <div>
                            <h4 class="fw-bold mb-0"><?= $total_testimoni ?></h4>
                            <p class="text-muted small mb-0">Testimoni</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm rounded-4 h-100 p-2 bg-info text-white">
                    <div class="card-body d-flex align-items-center">
                        <div class="bg-dark bg-opacity-10 p-3 rounded-4 me-3">
                            <i class="bi bi-info-circle-fill text-white fs-3"></i>
                        </div>
                        <div>
                            <h4 class="fw-bold mb-0 text-white"><?= $total_info ?></h4>
                            <p class="text-white-50 small mb-0">Informasi Sekolah</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-header bg-white border-0 py-3 d-flex align-items-center justify-content-between">
                        <h5 class="fw-bold m-0 text-dark"><i class="bi bi-person-badge-fill me-2 text-primary"></i> Pendaftar Terbaru</h5>
                        <a href="data_pendaftaran.php" class="btn btn-sm btn-light rounded-pill px-3 fw-bold text-primary">Lihat Semua</a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr class="text-muted small">
                                        <th class="ps-4 py-3">NAMA SISWA</th>
                                        <th>NO HP</th>
                                        <th>ASAL SEKOLAH</th>
                                        <th class="text-center">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(mysqli_num_rows($query_pendaftar) > 0): ?>
                                        <?php while($row = mysqli_fetch_assoc($query_pendaftar)): ?>
                                        <tr>
                                            <td class="ps-4">
                                                <div class="d-flex align-items-center">
                                                    <div class="bg-light rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 35px; height: 35px;">
                                                        <i class="bi bi-person text-secondary"></i>
                                                    </div>
                                                    <span class="fw-bold text-dark"><?= $row['nama_lengkap'] ?></span>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-light text-dark fw-normal border"><?= $row['no_hp'] ?></span></td>
                                            <td class="text-muted"><?= $row['asal_sekolah'] ?></td>
                                            <td class="text-center">
                                                <a href="data_pendaftaran.php" class="btn btn-sm btn-outline-primary rounded-pill px-3 border-2">Detail</a>
                                            </td>
                                        </tr>
                                        <?php endwhile; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="4" class="text-center py-5 text-muted italic">Belum ada data pendaftar baru.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-5 mb-3">
            <p class="text-muted small">Dashboard Management &copy; <?= date("Y"); ?> SMK Luqman Al Hakim Kudus</p>
        </div>

    </div>
</main>

<style>
    /* Tambahan agar kartu lebih soft */
    .card { transition: transform 0.2s; }
    .card:hover { transform: translateY(-3px); }
    .table thead th { font-weight: 600; letter-spacing: 0.5px; }
    .btn-outline-primary:hover { color: #fff; }
</style>

<?php include "template/footer.php"; ?>