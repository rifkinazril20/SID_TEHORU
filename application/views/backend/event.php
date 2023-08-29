<?php 
$setting = $this->db->get('setting')->row();


?>


<div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
            <a href="main/inputevent"  class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah Data</a>
       <?php 
        if($qe == ''){
       ?>
      <div class="alert alert-warning" role="alert">
        <strong>Informasi</strong> Data Agenda Masih Kosong!
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
                        <td>Tanggal Mulai</td>
                        <td>:</td>
                        <td><?php echo $row->mulai ?></td>
                      </tr>
                      <tr>
                        <td>Tanggal Selesai</td>
                        <td>:</td>
                        <td><?php echo $row->selesai ?></td>
                      </tr>
                      <?php if($row->status == '1'){ ?>
                        <tr class="table-danger">
                        <td>Status</td>
                        <td>:</td>
                        <td>Kadaluarsa</td>
                      </tr>
                        <?php }else{?>
                          <tr class="table-info">
                        <td>Status</td>
                        <td>:</td>
                        <td>Belum Kadaluarsa</td>
                      </tr>
                          <?php  } ?>
                      <tr>
                        <td colspan="3">
                        <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="main/hapusevent/<?php echo $row->id ?>" class="hapus btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus Event</a>
                        <a href="main/editevent/<?php echo $row->id ?>/<?php echo $row->slug ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit Event</a>
                        <a href="main/detailevent/<?php echo $row->id ?>/<?php echo $row->slug ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Detail Event</a>
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
                                text: "Data Event Berhasil Dihapus !",
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
