<?php
include '../koneksi.php'; // Pastikan path ke koneksi benar

if(isset($_POST['submit_daftar'])){
    // Ambil data dari form dan amankan dari karakter aneh (SQL Injection)
    $nama   = mysqli_real_escape_string($koneksi, $_POST['nama_siswa']);
    $nisn   = mysqli_real_escape_string($koneksi, $_POST['nisn']);
    $asal   = mysqli_real_escape_string($koneksi, $_POST['asal_sekolah']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    
    // Tambahkan variabel tanggal hari ini
    $tanggal = date('Y-m-d'); 

    // Query INSERT (Pastikan kolom 'tanggal_daftar' ada di tabel pendaftaran kamu)
    $q = mysqli_query($koneksi, "INSERT INTO pendaftaran (nama_siswa, nisn, asal_sekolah, alamat, tanggal_daftar) 
         VALUES ('$nama', '$nisn', '$asal', '$alamat', '$tanggal')");

    if($q){
        // Notifikasi sukses dan balik ke halaman depan
        echo "<script>
                alert('Pendaftaran Berhasil! Silakan tunggu info selanjutnya.'); 
                window.location='../index.php'; 
              </script>";
    } else {
        // Jika error, kasih tau biar nggak bingung
        echo "Gagal mendaftar: " . mysqli_error($koneksi);
    }
}
?>