<?php $this->load->view("backend/atas") ?>


<div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
            <div class="row">

<?php
    foreach($q->result() as $row){
     
?>
 <div class="col-lg-4 mb-4">
    <div class="card">
    <img src="image/<?php echo $row->gambar ?>" class="card-img-top" alt="backend/nofoto.jpg">
      <div class="card-body table-responsive">
      <h5 class="card-title"><?php echo $row->judul ?></h5>
      <table class="table table-hover table-bordered">
          <tr>
              <td>Kategori</td>
              <td><?= $row->kat ?></td>
           
          </tr>
          <tr>
          <td>Tanggal Post</td>
              <td><?= date("d F Y",strtotime($row->date)) ?></td>
          </tr>
          <tr>
              <td>Jumlah Views</td>
              <td><?= $row->views ?></td>
          </tr>
          
          <tr>
              <td>Keterangan</td>
              <td><?= substr($row->ket,0,100) ?></td>
          </tr>
          
          
          <tr align="center">
              <td colspan="2"><a href="main/hapusberita/<?php echo $row->id ?>" class="hapus btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus Berita</a>
              <a href="main/editberita/<?php echo $row->id ?>/<?php echo $row->slug ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit Berita</a></td>
          </tr>
      </table>
      </div>
    </div>
  </div>
<?php  }?>  
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
                                text: "Data Berita Berhasil Dihapus !",
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
      <?php $this->load->view("backend/bawah") ?>