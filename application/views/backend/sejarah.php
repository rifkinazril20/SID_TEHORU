<?php 
    $sejarah = $this->db->query("select * from sejarah");
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
                  <h4 class="text-light">Sejarah Desa</h4>
                </div>
                  <div class="card-body">
                    <form action="main/updatesejarah" id="save" method="post">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Isi Sejarah Desa Disini</label>
                      <div class="col-sm-12 col-md-7">
                      <textarea class="summernote" name="sejarah"><?php echo $row->deskripsi ?></textarea>
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
                            data: $(this).serialize(),
                            dataType: "html",
                            success: function (response) {
                                Swal.fire({
                                            title: "Informasi",
                                            text: "Berhasil memperbarui sejarah desa!",
                                            icon: "success",
                                            showCancelButton: false,
                                            closeOnConfirm: false,
                                            showLoaderOnConfirm: true,
                                            allowOutsideClick: () => !Swal.isLoading()
                                            }).then((result) => {
                                                window.location.reload();

                                            })
                            },
                            error : function (response){
                              Swal.fire(
                                "Informasi",
                                "Ada kesalahan sistem!",
                                "warning"
                              );
                            }
                        });
                    });
                    $(".summernote").summernote({
                        dialogsInBody: true,
                        minHeight: 250
                    });
     </script>