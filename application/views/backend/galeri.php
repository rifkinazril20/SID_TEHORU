 <!-- Main Content -->
 <div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <strong>Data Galeri</strong> 
            </div>
            
            <script>
              $(".alert").alert();
            </script>
          <div class="row">
            <?php 
              foreach($q->result() as $row){
            ?>
            <div class="col-lg-4 mb-3">
            <div class="card">
  <img src="image/<?php echo $row->gambar ?>" class="card-img-top img-fluid" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $row->judul ?></h5>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">
        <?php if($row->status == 'Publish'){ ?>
            <span class="badge badge-pill badge-success">
            Status : <?php echo $row->status ?>
            </span>
            <?php }else{ ?>
                <span class="badge badge-pill badge-warning">
            Status : <?php echo $row->status ?>
            </span>
                <?php } ?>
    </li>
  </ul>
  <div class="card-body">
                <center>
                <a href="<?php echo base_url("main/hapusgaleri/".$this->secure->encrypt_url($row->id)); ?>"  class="hapus btn btn-danger"><i class="fa fa-trash"></i> Hapus Galeri</a>
    <a href="main/editgaleri/<?php echo $this->secure->encrypt_url($row->id) ?>"  class="btn btn-primary"><i class="fa fa-edit"></i> Edit Galeri</a>
                </center>
  </div>
</div>
            </div>
            <?php } ?>
          </div>

          <nav>
                    <?php error_reporting(0); echo $page;?>
                </nav>


          </div>
        </section>
     
      </div>
     
      <script>
                     $(".hapus").click(function(e){
                    e.preventDefault();
                    Swal.fire({
                        title: 'Hapus Data Galeri ?',
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
                                title: "Success",
                                text: "Data Galeri Berhasil Dihapus !",
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
                                Swal.fire(
                                    "Informasi",
                                    "Ada kesalahan sistem",
                                    "error"
                                );
							},
						});
                    } else return false;
                    })
						
			}); 
</script>
