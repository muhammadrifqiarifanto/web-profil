<?php
include "../koneksi.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Perbaiki path jika file ini ada di dalam folder admin/
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

if (!isset($_GET['id'])) {
    header("Location: data_kontak.php");
    exit;
}

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM pesan WHERE id='$id'");
$p = mysqli_fetch_assoc($data);

if (!$p) {
    header("Location: data_kontak.php");
    exit;
}

// LOGIKA PENGIRIMAN
if (isset($_POST['kirim'])) {
    $balasan = mysqli_real_escape_string($koneksi, $_POST['balasan']);
    $mail = new PHPMailer(true);

    try {
        // --- KONFIGURASI SMTP GMAIL ---
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'muhammadrifqiarifanto@gmail.com';
        $mail->Password   = 'rttvgbyahstdbezw'; // Password Aplikasi Gmail 16 digit
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Menggunakan SSL
        $mail->Port       = 465;

        // Izin khusus untuk Localhost/XAMPP agar tidak diblokir sertifikat SSL-nya
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        // --- PENERIMA & ISI ---
        $mail->setFrom('muhammadrifqiarifanto@gmail.com', 'Admin SMK Luqman Al Hakim');
        $mail->addAddress($p['email'], $p['nama']);
        
        $mail->isHTML(true);
        $mail->Subject = 'Balasan Pesan - SMK Luqman Al Hakim';
        $mail->Body    = "
            <div style='font-family: Arial, sans-serif; line-height: 1.6;'>
                <h3>Halo, {$p['nama']}!</h3>
                <p>Terima kasih telah menghubungi kami. Berikut adalah balasan untuk pesan Anda:</p>
                <div style='background: #f4f4f4; padding: 15px; border-left: 4px solid #002d5a;'>
                    <i>\"".nl2br($balasan)."\"</i>
                </div>
                <br>
                <p>Salam hangat,<br><b>Admin Sekolah</b></p>
            </div>";

        // 1. Jalankan proses kirim email dulu
        $mail->send(); 

        // 2. JIKA BERHASIL, baru update database
        mysqli_query($koneksi, "UPDATE pesan SET balasan='$balasan', status='dibalas' WHERE id='$id'");

        echo "<script>alert('Balasan Berhasil Dikirim ke Email!'); window.location='data_kontak.php';</script>";
        exit;

    } catch (Exception $e) {
        // Jika gagal, tampilkan eror spesifiknya
        echo "<script>alert('Gagal kirim email! Eror: {$mail->ErrorInfo}');</script>";
    }
}

include "template/header.php";
include "template/menu.php";
?>

<main class="app-main p-4">
    <div class="container-fluid">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-navy text-white p-3">
                <h5 class="m-0"><i class="bi bi-reply-fill me-2"></i> Balas Pesan dari <?= htmlspecialchars($p['nama']); ?></h5>
            </div>
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-hover border">
                        <tr>
                            <th class="bg-light" width="180">Nama Pengirim</th>
                            <td><?= htmlspecialchars($p['nama']); ?></td>
                        </tr>
                        <tr>
                            <th class="bg-light">Email</th>
                            <td><a href="mailto:<?= $p['email']; ?>"><?= htmlspecialchars($p['email']); ?></a></td>
                        </tr>
                        <tr>
                            <th class="bg-light">Pesan Masuk</th>
                            <td class="text-muted"><i>"<?= nl2br(htmlspecialchars($p['isi'])); ?>"</i></td>
                        </tr>
                    </table>
                </div>

                <form method="POST" class="mt-4">
                    <label class="fw-bold mb-2">Tulis Balasan :</label>
                    <textarea name="balasan" class="form-control border-2 shadow-none" rows="6" placeholder="Ketik balasan email di sini..." required><?= ($p['balasan'] == '0') ? '' : trim($p['balasan']); ?></textarea>
                    
                    <div class="mt-4 d-flex gap-2">
                        <button type="submit" name="kirim" class="btn btn-primary px-4 rounded-pill">
                            <i class="bi bi-send-fill me-1"></i> Kirim Balasan ke Email
                        </button>
                        <a href="data_kontak.php" class="btn btn-secondary px-4 rounded-pill">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include "template/footer.php"; ?>