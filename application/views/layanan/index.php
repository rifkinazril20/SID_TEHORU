
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
      <div class="card">
      <div class="card-header bg-info text-light">
        Data Pengaduan <?php  echo $this->session->userdata("nama")?>
      </div>
      <div class="card-body table-responsive">
      <table class="table table-bordered table-striped table-hover" id="datapengaduan" width="100%">
          <thead>
            <tr>
              <th>No. Pengaduan</th>
              <th>Tanggal Pengaduan</th>
              <th>Kategori</th>
              <th>Isi Pengaduan</th>
              <th>Status</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <?php 
          $id = $this->session->userdata("id");
            $q = $this->db->query("select pengaduan.*,kategori_komplain.kat from pengaduan inner join kategori_komplain on kategori_komplain.id = pengaduan.idkat where idpenduduk='$id'");
            foreach($q->result() as $row){
          ?>
          <tr>
            <td><?php echo $row->nopengaduan ?></td>
            <td><?php echo $row->date ?></td>
            <td><?php echo $row->kat ?></td>
            <td><?php echo $row->isi ?></td>
            <td><?php echo $row->status ?></td>
            <td>
              <a href="layanan/hapuspengaduan/<?php echo $row->id ?>" class="btn btn-danger hapus">Hapus</a>
            </td>
          </tr>
          <?php } ?>
        </table>
      </div>
    </div>
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
                                text: "Data pengaduan berhasil dihapus!",
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