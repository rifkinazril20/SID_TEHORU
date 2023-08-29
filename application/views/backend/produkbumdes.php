<?php 
$setting = $this->db->get('setting')->row();


?>


<div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
            <a href="main/addbumdes"  class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah Data</a>
       <?php 
        if($qe->num_rows() == ''){
       ?>
      <div class="alert alert-warning" role="alert">
        <strong>Informasi</strong> Data Produk Warga Masih Kosong!
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
                        <td>Nama Produk</td>
                        <td>:</td>
                        <td><?php echo $row->produk ?></td>
                      </tr>
                      <tr>
                        <td>Kategori Produk</td>
                        <td>:</td>
                        <td><?php echo $row->kategori ?></td>
                      </tr>
                      <tr>
                        <td>Harga</td>
                        <td>:</td>
                        <td><?php echo $row->harga ?></td>
                      </tr>
                      <tr>
                        <td>No.HP BUMDES</td>
                        <td>:</td>
                        <td><?php echo $row->telp ?></td>
                      </tr>
                     
                      <tr>
                        <td>Deskripsi</td>
                        <td>:</td>
                        <td><?php echo substr($row->desk,0,150) ?>...</td>
                      </tr>
                     
                      <tr>
                        <td colspan="3">
                        <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="main/hapusbumdes/<?php echo $row->id ?>" class="hapus btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus Produk</a>
                        <a href="main/editbumdes/<?php echo $row->id ?>/<?php echo $row->slug ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit Produk</a>
                        <a href="main/detailbumdes/<?php echo $row->id ?>/<?php echo $row->slug ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Detail Produk</a>
                        <a href="https://wa.me/<?php echo $row->telp ?>" class="btn btn-primary"><i class="fa fa-phone"></i>Hubungi BUMDES</a>   
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
                                text: "Data Produk BUMDES Berhasil Dihapus !",
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
