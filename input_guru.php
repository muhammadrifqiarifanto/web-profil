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
              <div class="col-sm-6"><h3 class="mb-0">Input Guru</h3></div> 
              <div class="col-sm-6"> 
                <ol class="breadcrumb float-sm-end"> 
                  <li class="breadcrumb-item"><a href="#">Home</a></li> 
                  <li class="breadcrumb-item active" aria-current="page">Input Guru</li> 
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
                    <h3 class="card-title">Input Guru</h3> 
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
                    <form action="proses_guru.php" method="post" enctype="multipart/form-data">
                      <!--begin::Body-->
                      <div class="card-body">
                        <div class="mb-3">
                          <label class="form-label">Nama Guru</label>
                          <input type="text" name="nama_guru" class="form-control" required>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Nip</label>
                          <input type="number" name="nip" class="form-control" required>
                         </div>
                        <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label><br>
                        <input type="radio" name="jenis_kelamin" value="Laki-laki" required> Laki-laki
                        <input type="radio" name="jenis_kelamin" value="Perempuan" required> Perempuan
                      </div>
                        <div class="mb-3">
                          <label class="form-label">Mapel</label>
                          <input type="text" name="mapel" class="form-control" required>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Foto</label>
                          <input type="file" name="foto" id="foto" class="form-control" accept="image/*" required>

                          <img id="preview" class="img-fluid mt-2 d-none" style="max-height:200px;">
                        </div>
                        <script>
                        document.getElementById("foto").addEventListener("change", function(){
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
                          <label class="form-label">Email</label>
                          <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">No Hp</label>
                          <input type="number" name="no_hp" class="form-control" required>
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