<?php 
$setting = $this->db->get('setting')->row();


?>


<div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
            <a href="main/inputpengumuman"  class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah Data</a>
       <?php 
        if($qe->num_rows() == ''){
       ?>
      <div class="alert alert-warning" role="alert">
        <strong>Informasi</strong> Data Pengumuman Masih Kosong!
      </div>
       <?php }else{ ?>
        <div class="row">
              <?php 
                foreach($qe->result() as $row){
              ?>
            <div class="col-lg-4">
              <div class="card">
                <img src="image/<?php echo $row->gambar ?>" class="card-img-top img-fluid img-thumbnail" alt="...">
                <div class="card-body table-responsive">
                    <table class="table table-hover table-bordered">
                      <tr>
                        <td>Judul Event</td>
                        <td>:</td>
                        <td><?php echo $row->judul ?></td>
                      </tr>
                      <tr>
                        <td>Tanggal</td>
                        <td>:</td>
                        <td><?php echo $row->date ?></td>
                      </tr>
                      <tr>
                        <td>Author</td>
                        <td>:</td>
                        <td><?php echo $row->nama ?></td>
                      </tr>
                      <tr>
                        <td>Keterangan</td>
                        <td>:</td>
                        <td><?php echo substr($row->ket,0,100) ?>....</td>
                      </tr>
                      <tr>
                        <td colspan="3">
                        <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="main/hapuspengumuman/<?php echo $row->id ?>" class="hapus btn btn-danger"><i class="fa fa-trash"></i> Hapus Pengumuman</a>
                        <a href="main/editpengumuman/<?php echo $row->id ?>/<?php echo $row->slug ?>" class="btn btn-success"><i class="fa fa-edit"></i> Edit Pengumuman</a>
                        </div>
                        </td>
                      </tr>
                    </table>
                </div>
              </div>
            </div>
            <?php } ?>
            </div>
            <!--  -->
            <nav>
                    <?php error_reporting(0); echo $page;?>
                </nav>
          </div>

        <?php } ?>
        </section>
        
      </div>


	 <!-- MAP LEAFLET SCRIPTS -->
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
                                title: "Success",
                                text: "Data Berhasil Dihapus !",
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
								alert("Ada Kesalahan Sistem");
							},
						});
                    } else return false;
                    })
						
			}); 
</script>
