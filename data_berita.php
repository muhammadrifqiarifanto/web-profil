<?php 
    include "template/header.php"; 
    include "template/menu.php"; 
?> 

<main class="app-main">

    <!-- App Content Header -->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">

                <div class="col-sm-6">
                    <h3 class="mb-0">Data Berita</h3>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Data Berita
                        </li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <!-- App Content -->
    <div class="app-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">

                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title">Data Berita</h3>
                        </div>

                        <div class="card-body">

                            <table class="table table-bordered table-striped">

                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Judul</th>
                                        <th>Isi</th>
                                        <th>Gambar</th>
                                        <th>Tanggal</th>
                                        <th>Penulis</th>
                                        <th width="120">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php
                                        include "../koneksi.php";
                                        $no = 1;
                                        $data = mysqli_query($koneksi,"SELECT * FROM berita");

                                        while ($d = mysqli_fetch_array($data)) {
                                    ?>

                                    <tr class="align-middle">

                                        <td><?= $no++; ?></td>

                                        <td>
                                            <?= $d['judul']; ?>
                                        </td>

                                        <td>
                                            <?= substr($d['isi'],0,80); ?>...
                                        </td>

                                        <td>
                                            <img 
                                                src="../gambar/<?= $d['gambar']; ?>" 
                                                width="120"
                                                class="img-thumbnail">
                                        </td>

                                        <td><?= $d['tanggal']; ?></td>

                                        <td><?= $d['penulis']; ?></td>

                                        <td class="text-center">

                                            <a href="edit_berita.php?id=<?= $d['id']; ?>" 
                                               class="btn btn-warning btn-sm">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>

                                            <a href="hapus_berita.php?id=<?= $d['id']; ?>" 
                                               class="btn btn-danger btn-sm"
                                               onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                <i class="bi bi-trash"></i>
                                            </a>

                                        </td>

                                    </tr>

                                    <?php } ?>

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>

</main>

<?php include "template/footer.php"; ?>