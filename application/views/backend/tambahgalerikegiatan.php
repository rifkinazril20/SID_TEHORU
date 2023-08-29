 <!-- Main Content -->
 <?php 
$q = $this->db->query("select * from kegiatan where id='$id'")->row();

 ?>
 <div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->

        <div class="card">
            <div class="card-header text-light bg-blue">
                Input Galeri Kegiatan
            </div>
            <div class="card-body table-responsive">
            <form action="main/savegalerikegiatan" id="save" enctype="multipart/form-data" method="post">
                    <table class="table">
                        <tr>
                            <td>Judul Galeri</td>
                            <td>
                                <input type="text" class="form-control" name="judul" placeholder="Judul Galeri">
                                <input type="hidden" class="form-control" value="<?php echo $q->id ?>" name="id" placeholder="Judul Galeri">
                            </td>
                        </tr>
                        <tr>
                            <td>Foto / Gambar</td>
                            <td>
                            <center>   
                                    <img id="blah" class='img-fluid mb-3' width='280' src="assets/nofoto.jpg" alt="your image" /></center>
                              <input type="file"     name="gambar" class="form-control mb-3 bersih"  onchange="readURL(this);"  aria-describedby="inputGroupFileAddon01">
                              <span class="badge badge-warning"><strong>Informasi</strong> Input Gambar Maksimal 2mb !</span> 

                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button type="reset" class="btn btn-danger"><i class="fa fa-sync-alt"></i> Batal</button>
                                <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Simpan</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            </div>
<?php 
    $gs = $this->db->query("select galeri_kegiatan.* from galeri_kegiatan where idkegiatan='$id'");
 if($gs->num_rows() == ''){
?>
<div class="alert alert-warning" role="alert">
    <strong>Informasi</strong> belum ada galeri kegiatan untuk saat ini...
</div>
<?php }else{ ?>
    <?php 
    foreach($gs->result() as $row){

?>       

       <div class="card" style="width: 18rem;">
  <img src="image/<?php echo $row->foto ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $row->ket ?></h5>
    <a href="main/hapusgalerikegiatan/<?php echo $row->id ?>" class="btn btn-danger hapus w-100">Hapus</a>
  </div>
</div>

<?php } ?>
<?php } ?>
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
                                    title: "Informasi",
                                    text: "Data berhasil dihapus!",
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
                                "Ada kesalahan sistem!",
                                "warning"
                              );							},
						});
                    } else return false;
                    })
						
			}); 
              
        $("#save").on("submit",function(e){
        e.preventDefault();
        $.ajax({
            type: "post",
            url: $(this).attr('action'),
            data:new FormData(this),
            processData:false,
            contentType:false,
            cache:false,
            async:false,
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
            error : function (e){
                $.notify("Gagal Simpan", "error");
            }
        });
    });
         function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
     </script>
     