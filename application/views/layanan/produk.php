
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Beranda</h2>
          <ol>
            <li><a href="home/index">Home</a></li>
            <li>Beranda</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">
          <a href="layanan/addproduk" class="btn btn-primary mb-3">Tambah Produk</a>
          <div class="row">
        <?php 
  
  foreach($qe->result() as $row){
?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
     
<div class="card">
  <img src="image/<?php echo $row->gambar ?>" class="card-img-top img-fluid img-thumbnail" alt="...">
  <div class="card-body table-responsive">
      <table class="table table-hover table-bordered">
        <tr>
          <td>Nama Produk</td>
          <td>:</td>
          <td><?php echo $row->produk ?></td>
        </tr>
        <tr>
          <td>Harga</td>
          <td>:</td>
          <td><?php echo number_format($row->harga,0,',','.') ?></td>
        </tr>
        <tr>
          <td>Pemilik Produk</td>
          <td>:</td>
          <td><?php echo $row->pemilik ?></td>
        </tr>
        <tr>
          <td>No.Hp Pemilik</td>
          <td>:</td>
          <td><?php echo $row->telppemilik ?></td>
        </tr>
        <tr align="center">
          <td colspan="3">
          <div class="btn-group" role="group" aria-label="Basic example">
          <a href="layanan/hapusproduk/<?php echo $row->id ?>" class="btn btn-danger hapus "><i class="fa fa-eye"></i> Hapus Produk</a>
          <a href="layanan/editproduk/<?php echo $row->id ?>/<?php echo $row->slug ?>" class="btn btn-success  "><i class="fa fa-eye"></i> Edit Produk</a>
          <a href="https://wa.me/<?php echo $row->telppemilik ?>" class="btn btn-primary"><i class="fa fa-phone"></i>Hubungi Pemilik</a>   
      </div>
          </td>
        </tr>
      </table>
  </div>
</div>
</div>
<?php } ?>

        </div>
        <nav>
                    <?php error_reporting(0); echo $page;?>
                </nav>
      </div>
    </section><!-- End Services Section -->

  </main><!-- End #main -->

  <script>
                        $(".hapus").click(function(e){
                    e.preventDefault();
                    Swal.fire({
                        title: 'Hapus Data ?',
                        text: "Data yang sudah dihapus tidak bisa kembali !",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yaa, hapus data !'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                            url:  $(this).attr('href'),
                            type: 'post',
                            data: $(this).serialize(),
                            dataType: "html",
                            success: function(dt){
                              Swal.fire({
                                title: "Informasi",
                                text: "Data produk berhasil dihapus!",
                                icon: "success",
                                showCancelButton: false,
                                closeOnConfirm: false,
                                showLoaderOnConfirm: true,
                                allowOutsideClick: () => !Swal.isLoading()
                                }).then((result) => {
                                    window.location.reload();
                                })
                            },
                            error: function(dt){
                                alert("Ada Kesalahan Sistem")
                            },
                        });
                    } else return false;
                    })
                        
            }); 
       $('.dttable').DataTable();
 </script>