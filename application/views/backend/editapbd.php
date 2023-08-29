<?php 
    $q = $this->db->query("select * from keuangan where id='$id'");
    $row = $q->row();
?>
<!-- Main Content -->
 <div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
            <div class="col-12">
                <div class="card">
                  <div class="card-header bg-blue">
                  <h4 class="text-light">Manual Input Anggaran dan Realisasi APBDes</h4>
                </div>
                  <div class="card-body">
                    <form action="main/updateapb/<?php echo $id; ?>" id="save" method="post">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tahun</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control tahun" value="<?php echo $row->tahun ?>" autocomplete="off" placeholder="Tahun " name="tahun">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Anggaran</label>
                      <div class="col-sm-12 col-md-7">
                        <select name="jenis" class="form-control selectric">
                          <option>Pilih</option>
                          <option value="Pembiayaan" <?php if($row->jenis_anggaran == 'Pembiayaan') echo 'selected'; ?>>Pembiayaan</option>
                          <option value="Belanja" <?php if($row->jenis_anggaran == 'Belanja') echo 'selected'; ?>>Belanja</option>
                          <option value="Pendapatan" <?php if($row->jenis_anggaran == 'Pendapatan') echo 'selected'; ?>>Pendapatan</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Rincian</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" autocomplete="off" value="<?php echo $row->rincian ?>" class="form-control" name="rincian" placeholder="Rincian">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nilai Anggaran</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" autocomplete="off" value="<?php echo $row->nilai_anggaran ?>"  class="form-control uang" name="anggaran" placeholder="Nilai Anggaran">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nilai Realisasi</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" autocomplete="off" value="<?php echo $row->nilai_realisasi ?>"  class="form-control uang" name="nilai" placeholder="Nilai Realisasi">
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
                            error : function (response){
                              Swal.fire(
                                "Informasi",
                                "Ada kesalahan sistem!",
                                "warning"
                              );
                            }
                        });
                    });
     </script>