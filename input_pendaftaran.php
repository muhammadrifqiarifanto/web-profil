<?php
include '../koneksi.php';

if (isset($_POST['submit_daftar'])) {
    // Mengambil semua data dari form sesuai kolom di database kamu
    $nama_lengkap      = mysqli_real_escape_string($koneksi, $_POST['nama_lengkap']);
    $nama_panggilan    = mysqli_real_escape_string($koneksi, $_POST['nama_panggilan']);
    $tgl_lahir         = mysqli_real_escape_string($koneksi, $_POST['tgl_lahir']);
    $jenis_kelamin     = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']);
    $agama             = mysqli_real_escape_string($koneksi, $_POST['agama']);
    $kewarganegaraan   = mysqli_real_escape_string($koneksi, $_POST['kewarganegaraan']);
    $nama_ortu         = mysqli_real_escape_string($koneksi, $_POST['nama_ortu']);
    $status_ortu       = mysqli_real_escape_string($koneksi, $_POST['status_ortu']);
    $no_hp             = mysqli_real_escape_string($koneksi, $_POST['no_hp']);
    $asal_sekolah      = mysqli_real_escape_string($koneksi, $_POST['asal_sekolah']);
    $tahun_lulus       = mysqli_real_escape_string($koneksi, $_POST['tahun_lulus']);
    $sumber_info       = mysqli_real_escape_string($koneksi, $_POST['sumber_info']);

    // Query INSERT mencakup SEMUA kolom (kecuali id_daftar karena auto_increment)
    $sql = "INSERT INTO pendaftaran (nama_lengkap, nama_panggilan, tgl_lahir, jenis_kelamin, agama, kewarganegaraan, nama_ortu, status_ortu, no_hp, asal_sekolah, tahun_lulus, sumber_info) 
            VALUES ('$nama_lengkap', '$nama_panggilan', '$tgl_lahir', '$jenis_kelamin', '$agama', '$kewarganegaraan', '$nama_ortu', '$status_ortu', '$no_hp', '$asal_sekolah', '$tahun_lulus', '$sumber_info')";

    if (mysqli_query($koneksi, $sql)) {
        echo "<script>alert('Pendaftaran Berhasil! Data Anda telah tersimpan.'); window.location='../index.php';</script>";
    } else {
        echo "<script>alert('Gagal Simpan: " . mysqli_error($koneksi) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Lengkap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f7f6; }
        .card-form { border: none; border-radius: 25px; box-shadow: 0 10px 30px rgba(0,0,0,0.08); overflow: hidden; }
        .header-form { background: linear-gradient(45deg, #001f3f, #003366); color: white; padding: 30px; }
        .form-label { font-weight: 600; color: #333; font-size: 0.9rem; }
        .form-control, .form-select { border-radius: 12px; padding: 10px 15px; border: 1px solid #e0e0e0; background-color: #fdfdfd; }
        .form-control:focus { border-color: #001f3f; box-shadow: none; background-color: #fff; }
        .btn-kirim { border-radius: 50px; padding: 15px; font-weight: bold; font-size: 1.1rem; transition: 0.3s; }
        .section-title { border-left: 4px solid #001f3f; padding-left: 10px; margin-bottom: 20px; color: #001f3f; font-weight: bold; }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card card-form">
                <div class="header-form text-center">
                    <h2 class="fw-bold mb-1">FORMULIR PENDAFTARAN</h2>
                    <p class="mb-0 opacity-75">Silakan lengkapi data calon siswa di bawah ini sesuai dokumen resmi.</p>
                </div>
                
                <div class="card-body p-4 p-md-5">
                    <form action="" method="POST">
                        
                        <div class="section-title">A. Data Pribadi Siswa</div>
                        <div class="row g-3 mb-4">
                            <div class="col-md-8">
                                <label class="form-label">Nama Lengkap (Sesuai Ijazah)</label>
                                <input type="text" name="nama_lengkap" class="form-control" placeholder="Contoh: Muhammad Akhdan" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Nama Panggilan</label>
                                <input type="text" name="nama_panggilan" class="form-control" placeholder="Contoh: Akhdan" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-select" required>
                                    <option value="">Pilih...</option>
                                    <option value="laki-laki">Laki-laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Agama</label>
                                <input type="text" name="agama" class="form-control" placeholder="Contoh: Islam" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Kewarganegaraan</label>
                                <input type="text" name="kewarganegaraan" class="form-control" placeholder="Contoh: WNI" required>
                            </div>
                            <div class="col-md-8">
                                <label class="form-label">No. HP / WhatsApp Aktif</label>
                                <input type="number" name="no_hp" class="form-control" placeholder="Contoh: 081234567890" required>
                            </div>
                        </div>

                        <div class="section-title">B. Data Orang Tua / Wali</div>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Nama Orang Tua</label>
                                <input type="text" name="nama_ortu" class="form-control" placeholder="Nama Bapak/Ibu" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Status Orang Tua</label>
                                <input type="text" name="status_ortu" class="form-control" placeholder="Contoh: Ayah Kandung" required>
                            </div>
                        </div>

                        <div class="section-title">C. Data Asal Sekolah</div>
                        <div class="row g-3 mb-4">
                            <div class="col-md-8">
                                <label class="form-label">Asal Sekolah (SMP/MTs)</label>
                                <input type="text" name="asal_sekolah" class="form-control" placeholder="Nama sekolah asal" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Tahun Lulus</label>
                                <input type="number" name="tahun_lulus" class="form-control" placeholder="2026" required>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Dari mana Anda mengetahui informasi sekolah kami?</label>
                                <input type="text" name="sumber_info" class="form-control" placeholder="Contoh: Media Sosial, Teman, Brosur, dll">
                            </div>
                        </div>

                        <div class="mt-5">
                            <button type="submit" name="submit_daftar" class="btn btn-primary w-100 btn-kirim shadow">
                                <i class="fas fa-check-circle me-2"></i>KIRIM PENDAFTARAN SEKARANG
                            </button>
                        </div>

                        <div class="text-center mt-4">
                            <a href="../index.php#pendaftaran" class="text-decoration-none text-muted small">
                                <i class="fas fa-arrow-left me-1"></i> Kembali ke Halaman Utama
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>