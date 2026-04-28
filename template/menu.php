<?php
$halaman = basename($_SERVER['PHP_SELF']);
?>
<!--begin::Sidebar-->
      <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="white">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="index.html" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="assets/dist/assets/img/logo.png"
              class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">Admin</span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="navigation"
              aria-label="Main navigation"
              data-accordion="false"
              id="navigation"
            >
              <?php $menu_hal = ($halaman == 'hal_admin.php'); ?>
              <li class="nav-item">
                <a href="../admin/hal_admin.php" class="nav-link <?= $menu_hal ? 'active' : '' ?>">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>      
              <?php
              $menu_berita = in_array($halaman, ['input_berita.php','data_berita.php']);
              ?>
              <li class="nav-item <?= $menu_berita ? 'menu-open' : '' ?>">
                <a href="#" class="nav-link <?= $menu_berita ? 'active' : '' ?>">
                  <i class="nav-icon bi bi bi-newspaper"></i>
                  <p>
                    Berita
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="input_berita.php" class="nav-link <?= ($halaman=='input_berita.php')?'active':'' ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Input Berita</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="data_berita.php" class="nav-link <?= ($halaman=='data_berita.php')?'active':'' ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Data Berita</p>
                    </a>
                  </li>
                </ul>
              </li>
              <?php
              $menu_fasilitas = in_array($halaman, ['input_fasilitas.php','data_fasilitas.php']);
              ?>
              <li class="nav-item <?= $menu_fasilitas ? 'menu-open' : '' ?>">
                <a href="#" class="nav-link <?= $menu_fasilitas ? 'active' : '' ?>">
                  <i class="nav-icon bi bi-briefcase"></i>
                  <p>
                    Fasilitas
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="input_fasilitas.php" class="nav-link <?= ($halaman=='input_fasilitas.php')?'active':'' ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Input Fasilitas</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="data_fasilitas.php" class="nav-link <?= ($halaman=='data_fasilitas.php')?'active':'' ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Data Fasilitas</p>
                    </a>
                  </li>
                </ul>
              </li>
              <?php
              $menu_eskul = in_array($halaman, ['input_eskul.php','data_eskul.php']);
              ?>
              <li class="nav-item <?= $menu_eskul ? 'menu-open' : '' ?>">
                <a href="#" class="nav-link <?= $menu_eskul ? 'active' : '' ?>">
                  <i class="nav-icon bi bi-trophy"></i>
                  <p>
                    Ektrakurikuler
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="input_eskul.php" class="nav-link <?= ($halaman=='input_eskul.php')?'active':'' ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Input Ektrakurikuler</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="data_eskul.php" class="nav-link <?= ($halaman=='data_eskul.php')?'active':'' ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Data Ektrakurikuler</p>
                    </a>
                  </li>
                </ul>
              </li>
              <?php
              $menu_testimoni = in_array($halaman, ['input_testimoni.php','data_testimoni.php']);
              ?>
              <li class="nav-item <?= $menu_testimoni ? 'menu-open' : '' ?>">
                <a href="#" class="nav-link <?= $menu_testimoni ? 'active' : '' ?>">
                  <i class="nav-icon bi bi-award"></i>
                  <p>
                    Testimoni
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="input_testimoni.php" class="nav-link <?= ($halaman=='input_testimoni.php')?'active':'' ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Input Testimoni</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="data_testimoni.php" class="nav-link <?= ($halaman=='data_testimoni.php')?'active':'' ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Data Testimoni</p>
                    </a>
                  </li>
                </ul>
              </li>
              <?php
              $menu_galeri = in_array($halaman, ['input_galeri.php','data_galeri.php']);
              ?>
              <li class="nav-item <?= $menu_galeri ? 'menu-open' : '' ?>">
                <a href="#" class="nav-link <?= $menu_galeri ? 'active' : '' ?>">
                  <i class="nav-icon bi bi-images"></i>
                  <p>
                    Galeri
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="input_galeri.php" class="nav-link <?= ($halaman=='input_galeri.php')?'active':'' ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Input Galeri</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="data_galeri.php" class="nav-link <?= ($halaman=='data_galeri.php')?'active':'' ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Data Galeri</p>
                    </a>
                  </li>
                </ul>
              </li>
              <?php
              $menu_guru = in_array($halaman, ['input_guru.php','data_guru.php']);
              ?>
              <li class="nav-item <?= $menu_guru ? 'menu-open' : '' ?>">
                <a href="#" class="nav-link <?= $menu_guru ? 'active' : '' ?>">
                  <i class="nav-icon bi bi-people-fill"></i>
                  <p>
                    Guru
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="input_guru.php" class="nav-link <?= ($halaman=='input_guru.php')?'active':'' ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Input Guru</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="data_guru.php" class="nav-link <?= ($halaman=='data_guru.php')?'active':'' ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Data Guru</p>
                    </a>
                  </li>
                </ul>
              </li>
              <?php
              $menu_profil_sekolah = in_array($halaman, ['input_profil_sekolah.php','data_profil_sekolah.php']);
              ?>
              <li class="nav-item <?= $menu_profil_sekolah ? 'menu-open' : '' ?>">
                <a href="#" class="nav-link <?= $menu_profil_sekolah ? 'active' : '' ?>">
                  <i class="nav-icon bi bi-building"></i>
                  <p>
                    Profil Sekolah
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="input_profil_sekolah.php" class="nav-link <?= ($halaman=='input_profil_sekolah.php')?'active':'' ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Input Sekolah</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="data_profil_sekolah.php" class="nav-link <?= ($halaman=='data_profil_sekolah.php')?'active':'' ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Data Sekolah</p>
                    </a>
                  </li>
                </ul>
              </li>
              <?php
              $menu_informasi = in_array($halaman, ['input_informasi.php','data_informasi.php']);
              ?>
              <li class="nav-item <?= $menu_informasi ? 'menu-open' : '' ?>">
                <a href="#" class="nav-link <?= $menu_informasi ? 'active' : '' ?>">
                  <i class="nav-icon bi-info-square-fill"></i>
                  <p>
                    Infomasi
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="input_informasi.php" class="nav-link <?= ($halaman=='input_informasi.php')?'active':'' ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Input Informasi</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="data_informasi.php" class="nav-link <?= ($halaman=='data_informasi.php')?'active':'' ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Data Informasi</p>
                    </a>
                  </li>
                </ul>
              </li>
              <?php $menu_kontak = ($halaman == 'data_kontak.php'); ?>
              <li class="nav-item">
                <a href="data_kontak.php" class="nav-link <?= $menu_kontak ? 'active' : '' ?>">
                  <i class="nav-icon bi bi-envelope-fill"></i>
                  <p>Data Kontak</p>
                </a>
              </li>
              <?php $menu_rekap = ($halaman == 'data_pendaftaran.php'); ?>
              <li class="nav-item">
                <a href="data_pendaftaran.php" class="nav-link <?= $menu_rekap ? 'active' : '' ?>">
                  <i class="nav-icon bi bi-file-earmark-text-fill"></i>
                  <p>Data Pendaftar</p>
                </a>
              </li>
                <li class="nav-item menu-open">
                <a href="index.php" class="nav-link active" title="Iya" onclick="return confirm('Anda yakin ingin logout?')">
                  <i class="nav-icon bi bi-box-arrow-in-right"></i>
                  <p>
                    Logout
                  </p>
                </a>
              	</li>
            </ul>
            <!--end::Sidebar Menu-->
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>
      <!--end::Sidebar-->