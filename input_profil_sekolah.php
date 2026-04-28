<?php 
include "template/header.php"; 
include "template/menu.php"; 
?> 
  <main class="app-main"> 
        <!--begin::App Content Header--> 
        <div class="app-content-header"> 
          <!--begin::Container--> 
          <div class="container-fluid">
            <!--begin::Row--> 
            <div class="row"> 
              <div class="col-sm-6"><h3 class="mb-0">Profil Sekolah</h3></div> 
              <div class="col-sm-6"> 
                <ol class="breadcrumb float-sm-end"> 
                  <li class="breadcrumb-item"><a href="#">Home</a></li> 
                  <li class="breadcrumb-item active" aria-current="page">Profil Sekolah</li> 
                </ol> 
              </div> 
            </div> 
            <!--end::Row--> 
          </div> 
          <!--end::Container--> 
        </div> 
        <!--end::App Content Header--> 
        <!--begin::App Content-->         
        <div class="app-content"> 
          <!--begin::Container--> 
          <div class="container-fluid"> 
            <!--begin::Row--> 
            <div class="row"> 
              <div class="col-12">                 
              	<!-- Default box --> 
                <div class="card"> 
                  <div class="card-header"> 
                    <h3 class="card-title">Profil Sekolah</h3> 
                    <div class="card-tools"> 
                      <button                         
                      type="button"                         
                      class="btn btn-tool"                         
                      data-lte-toggle="card-collapse" 
                      title="Collapse" 
                      > 
                        <i data-lte-icon="expand" class="bi bi-plus-lg"></i> 
                        <i data-lte-icon="collapse" class="bi bi-dash-lg"></i> 
                      </button> 
                      <button 
                        type="button"                         
                        class="btn btn-tool"                         
                        data-lte-toggle="card-remove" 
                        title="Remove" 
                      > 
                        <i class="bi bi-x-lg"></i> 
                      </button> 
                    </div>                   
                </div>
                <div class="col-md-12">
                  <!--begin::Quick Example-->
                  <div class="card card-primary card-outline mb-4">
                    <!--begin::Header-->
                    <div class="card-header"><div class="card-title">Quick Example</div></div>
                    <!--end::Header-->
                    <!--begin::Form-->
                    <form action="proses_profil_sekolah.php" method="post" enctype="multipart/form-data">
                      <!--begin::Body-->
                      <div class="card-body">
                        <div class="mb-3">
                          <label class="form-label">Nama Sekolah</label>
                          <input type="text" name="nama_sekolah" class="form-control" required>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Npsn</label>
                          <input type="number" name="npsn" class="form-control" required>
                         </div>
                        <div class="mb-3">
                          <label class="form-label">Alamat</label>
                          <input type="text" name="alamat" class="form-control" required>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Desa</label>
                          <input type="text" name="desa" class="form-control" required>
                        <div class="mb-3">
                        </div>
                          <label class="form-label">Kecamatan</label>
                          <input type="text" name="kecamatan" class="form-control" required>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Kabupaten</label>
                          <input type="text" name="kabupaten" class="form-control" required>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Provinsi</label>
                          <input type="text" name="provinsi" class="form-control" required>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Email</label>
                          <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Telepon</label>
                          <input type="number" name="telepon" class="form-control" required>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Website</label>
                          <input type="text" name="website" class="form-control" required>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Kepala Sekolah</label>
                          <input type="text" name="kepala_sekolah" class="form-control" required>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Logo</label>
                          <input type="file" name="logo" id="logo" class="form-control" accept="image/*" required>

                          <img id="preview" class="img-fluid mt-2 d-none" style="max-height:200px;">
                        </div>
                        <script>
                        document.getElementById("logo").addEventListener("change", function(){
                            const file = this.files[0];
                            const preview = document.getElementById("preview");

                            if(file){
                                const reader = new FileReader();
                                reader.onload = function(e){
                                    preview.src = e.target.result;
                                    preview.classList.remove("d-none");
                                }
                                reader.readAsDataURL(file);
                            }
                        });
                        </script>
                        <div class="mb-3">
                          <label class="form-label">Visi</label>
                          <textarea type="text" name="visi" rows="4" class="form-control" required></textarea>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Misi</label>
                          <textarea type="text" name="misi" rows="4" class="form-control" required></textarea>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Deskripsi</label>
                          <textarea type="text" name="deskripsi" rows="4" class="form-control" required></textarea>
                        </div>
                      </div>
                      <!--end::Body-->
                      <!--begin::Footer-->
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                      <!--end::Footer-->
                    </form>
                    <!--end::Form-->
                  </div>
                  <!--end::Quick Example-->
                </div>
                    <!-- /.card-body --> 
                    <div class="card-footer">Footer</div> 
                    <!-- /.card-footer--> 
                  </div> 
                  <!-- /.card --> 
                </div> 
              </div> 
              <!--end::Row--> 
            </div> 
          </div> 
          <!--end::App Content--> 
        </main>       
        <?php 
            include "template/footer.php"; 
        ?> 