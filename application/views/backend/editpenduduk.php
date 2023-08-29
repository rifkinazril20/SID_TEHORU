<?php 

    $q = $this->db->query("select * from penduduk where id='$id'");
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
                  <h4 class="text-light">Edit Penduduk <?php echo $row->nama.'-'.$row->nik ?></h4>
                </div>
                  <div class="card-body">
                    <form action="main/updatependuduk/<?= $id; ?>" id="save" method="post">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control " value="<?php echo $row->nama ?>" autocomplete="off" placeholder="Nama " name="nama">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NOKK</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="number" class="form-control " value="<?php echo $row->nokk ?>" autocomplete="off" placeholder="NOKK " name="nokk">
                      </div>
                    </div>
                  
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nik</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="number" class="form-control " value="<?php echo $row->nik ?>" autocomplete="off" placeholder="Nik " name="nik">
                      </div>
                    </div>
                  
                  
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Kelamin</label>
                      <div class="col-sm-12 col-md-7">
                          <select name="jk" id="" class="form-control">
                              <option value="">Pilih</option>
                              <option value="Laki-laki" <?php if($row->jk == "Laki-laki") echo 'selected'; ?>>Laki-laki</option>
                              <option value="Perempuan" <?php if($row->jk == "Perempuan") echo 'selected'; ?>>Perempuan</option>
                          </select>
                      </div>
                    </div>
                  
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat Lahir</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control " value="<?php echo $row->tempatlahir ?>" autocomplete="off" placeholder="Tempat Lahir " name="tempatlahir">
                      </div>
                    </div>
                  
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Lahir</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control tgl" value="<?php echo $row->tgllahir ?>" autocomplete="off" placeholder="Tanggal Lahir " name="tgllahir">
                      </div>
                    </div>
                  
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Umur</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="number" class="form-control " value="<?php echo $row->umur ?>" autocomplete="off" placeholder="Umur / Usia " name="umur">
                      </div>
                    </div>
                    
                  
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status Kawin</label>
                      <div class="col-sm-12 col-md-7">
                          <select name="statuskawin" class="form-control" id="">
                              <option value="">Pilih</option>
                              <option value="Belum Kawin" <?php if($row->status_kawin == 'Belum Kawin') echo 'selected' ?>>Belum Kawin</option>
                              <option value="Kawin" <?php if($row->status_kawin == 'Kawin') echo 'selected' ?>>Kawin</option>
                              <option value="Cerai Hidup" <?php if($row->status_kawin == 'Cerai Hidup') echo 'selected' ?>>Cerai Hidup</option>
                              <option value="Cerai Mati" <?php if($row->status_kawin == 'Cerai Mati') echo 'selected' ?>>Cerai Mati</option>
                          </select>
                      </div>
                    </div>
                  
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Warga Negara</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control " value="<?php echo $row->warganegara ?>"  autocomplete="off" placeholder="Warga Negara " name="warganegara">
                      </div>
                    </div>
                  
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Agama</label>
                      <div class="col-sm-12 col-md-7">
                          <select name="agama" id="" class="form-control">
                              <option value="">Pilih</option>
                              <option value="Islam" <?php if($row->agama == 'Islam') echo 'selected' ?>>Islam</option>
                              <option value="Kristen" <?php if($row->agama == 'Kristen') echo 'selected' ?>>Kristen</option>
                              <option value="Katolik" <?php if($row->agama == 'Katolik') echo 'selected' ?>>Katolik</option>
                              <option value="Hindhu" <?php if($row->agama == 'Hindhu') echo 'selected' ?>>Hindhu</option>
                              <option value="Budha" <?php if($row->agama == 'Budha') echo 'selected' ?>>Budha</option>
                              <option value="Konghucu" <?php if($row->agama == 'Konghucu') echo 'selected' ?>>Konghucu</option>
                              <option value="Lain-lain" <?php if($row->agama == 'Lain-lain') echo 'selected' ?>>Lain-lain</option>
                          </select>
                      </div>
                    </div>
                  
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pendidikan</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control " value="<?php echo $row->pendidikan ?>" autocomplete="off" placeholder="Pendidikan " name="pendidikan">
                      </div>
                    </div>
                  
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">RT</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="number" class="form-control "  value="<?php echo $row->rt ?>"autocomplete="off" placeholder="RT " name="rt">
                      </div>
                    </div>
                  
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">RW</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="number" class="form-control " value="<?php echo $row->rw ?>" autocomplete="off" placeholder="RW " name="rw">
                      </div>
                    </div>
                  
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Dusun</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control " value="<?php echo $row->dusun ?>" autocomplete="off" placeholder="Nama Dusun " name="dusun">
                      </div>
                    </div>
                  
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat Lengkap</label>
                      <div class="col-sm-12 col-md-7">
                          <textarea name="alamat" id="" cols="10" rows="5" class="form-control" placeholder="Alamat Lengkap"><?php echo $row->alamat ?></textarea>
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