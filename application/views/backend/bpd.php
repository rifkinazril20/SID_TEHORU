<?php 
    $sejarah = $this->db->query("select * from bpd");
    $row = $sejarah->row();
?>
<!-- Main Content -->
 <div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
            <div class="col-12">
                <div class="card">
                  <div class="card-header bg-blue">
                  <h4 class="text-light">BPD Desa</h4>
                </div>
                  <div class="card-body">
                    <form action="main/updatebpd" id="save" method="post">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul BPD Desa</label>
                      <div class="col-sm-12 col-md-7">
                          <input type="text" class="form-control" value="<?php echo $row->judul ?>" name="judul">
                </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keterangan</label>
                      <div class="col-sm-12 col-md-7">
                      <textarea class="summernote" name="ket"><?php echo $row->ket ?></textarea>
                </div>
                    </div>
                 
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto / Gambar BPD Desa</label>
                      <div class="col-sm-12 col-md-7">
                      <center>             <img id="blah" class='img-responsive mb-3' width='280' src="image/<?php echo $row->gambar ?>" alt="your image" /></center>
                              <input type="file"     name="gambar" class="form-control bersih"  onchange="readURL(this);"  aria-describedby="inputGroupFileAddon01">
                              <span class="badge badge-warning"><strong>Informasi</strong> Input Gambar Maksimal 2mb !</span> 
         </div>
                    </div>
                    
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-paper-plane"></i> Simpan</button>
                        <button class="btn btn-danger" type="reset"><i class="fa fa-sync-alt"></i> Batal</button>
                      </div>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!--  -->
          </div>
        </section>
     
      </div>
     <script>
         $("#save").on("submit",function(e){
        e.preventDefault();
        $.ajax({
            type: "post",
            url: $(this).attr('action'),
            data:new FormData(this),
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            success: function (response) {
                Swal.fire({
                    title: "Informasi",
                    text: "Data berhasil disimpan!",
                    icon: "success",
                    showCancelButton: false,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true,
                    allowOutsideClick: () => !Swal.isLoading()
                    }).then((result) => {
                        window.location.reload();
                    })
            },
            error : function (e){
                $.notify("Gagal Simpan", "error");
            }
        });
    });
         function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        

                    $(".summernote").summernote({
                        dialogsInBody: true,
                        minHeight: 250
                    });
     </script>