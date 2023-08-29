
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Registrasi Layanan Publik</h2>
          <ol>
            <li><a href="home/index">Home</a></li>
            <li>Registrasi Layanan Publik</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">
      <div class="section-title" data-aos="fade-up">
          <h2> Registrasi Layanan Publik</h2>
        </div>

        <div class="card">
  <div class="card-header text-light bg-info">
    Masukan Biodata Anda Dengan Benar!
  </div>
  <div class="card-body table-responsive">
  <center>
  <form action="home/savependuduk" id="save" method="post">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control " autocomplete="off" placeholder="Nama " name="nama">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NOKK</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="number" class="form-control " autocomplete="off" placeholder="NOKK " name="nokk">
                      </div>
                    </div>
                  
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nik</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="number" class="form-control " autocomplete="off" placeholder="Nik " name="nik">
                      </div>
                    </div>
                  
                  
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Kelamin</label>
                      <div class="col-sm-12 col-md-7">
                          <select name="jk" id="" class="form-control">
                              <option value="">Pilih</option>
                              <option value="Laki-laki">Laki-laki</option>
                              <option value="Perempuan">Perempuan</option>
                          </select>
                      </div>
                    </div>
                  
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat Lahir</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control " autocomplete="off" placeholder="Tempat Lahir " name="tempatlahir">
                      </div>
                    </div>
                  
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Lahir</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control tgl" autocomplete="off" placeholder="Tanggal Lahir " name="tgllahir">
                      </div>
                    </div>
                  
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Umur</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="number" class="form-control " autocomplete="off" placeholder="Umur / Usia " name="umur">
                      </div>
                    </div>
                    
                  
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status Kawin</label>
                      <div class="col-sm-12 col-md-7">
                          <select name="statuskawin" class="form-control" id="">
                              <option value="">Pilih</option>
                              <option value="Belum Kawin">Belum Kawin</option>
                              <option value="Kawin">Kawin</option>
                              <option value="Cerai Hidup">Cerai Hidup</option>
                              <option value="Cerai Mati">Cerai Mati</option>
                          </select>
                      </div>
                    </div>
                  
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Warga Negara</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control " autocomplete="off" placeholder="Warga Negara " name="warganegara">
                      </div>
                    </div>
                  
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Agama</label>
                      <div class="col-sm-12 col-md-7">
                          <select name="agama" id="" class="form-control">
                              <option value="">Pilih</option>
                              <option value="Islam">Islam</option>
                              <option value="Kristen">Kristen</option>
                              <option value="Katolik">Katolik</option>
                              <option value="Hindhu">Hindhu</option>
                              <option value="Budha">Budha</option>
                              <option value="Konghucu">Konghucu</option>
                              <option value="Lain-lain">Lain-lain</option>
                          </select>
                      </div>
                    </div>
                  
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pendidikan</label>
                      <div class="col-sm-12 col-md-7">
                      <select name="pendidikan" class="form-control" id="">
                              <option value="">Pilih</option>
                              <option value="SD">SD</option>
                              <option value="SMP">SMP</option>
                              <option value="SMA">SMA</option>
                              <option value="SMK">SMK</option>
                              <option value="D1">D1</option>
                              <option value="D2">D2</option>
                              <option value="D3">D3</option>
                              <option value="S1">S1</option>
                              <option value="S2">S2</option>
                              <option value="S3">S3</option>
                             
                          </select>
                      </div>
                    </div>
                  
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">RT</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="number" class="form-control " autocomplete="off" placeholder="RT " name="rt">
                      </div>
                    </div>
                  
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">RW</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="number" class="form-control " autocomplete="off" placeholder="RW " name="rw">
                      </div>
                    </div>
                  
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Dusun</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control " autocomplete="off" placeholder="Nama Dusun " name="dusun">
                      </div>
                    </div>
                  
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat Lengkap</label>
                      <div class="col-sm-12 col-md-7">
                          <textarea name="alamat" id="" cols="10" rows="5" class="form-control" placeholder="Alamat Lengkap"></textarea>
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
  </center>
  </div>
</div>
      </div>
    </section><!-- End Services Section -->

  </main><!-- End #main -->
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
                                            text: "Terima kasih. Registrasi anda berhasil dilakukan, Harap menunggu konfirmasi dari admin untuk melakukan login!",
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