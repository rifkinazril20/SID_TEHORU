<?php 
$setting = $this->db->get('setting')->row();
$q = $this->db->query("select * from produk_bumdes where id='$id'");
$row = $q->row();
?>
<div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
           

              <div class="col-lg-12">
              <div class="card">
            <div class="card-header text-light bg-info">
              Edit Produk BUMDES (BADAN USAHA MILIK DESA)
            </div>
            <div class="card-body table-responsive">
            <form action="main/updatebumdes/<?php echo $id; ?>" id="save" method="post" enctype="multipart/form-data">
              <table class="table">
                <tr>
                  <td>Nama Produk</td>
                  <td colspan="3">
                    <input type="text" placeholder="Nama Produk" value="<?php echo $row->produk ?>" class="form-control" name="produk">
                  </td>
                </tr>
                <tr>
                  <td>Kategori Produk</td>
                  <td colspan="3">
                    <input type="text" placeholder="Kategori Produk" value="<?php echo $row->kategori ?>" class="form-control" autocomplete="off" name="kat">
                  </td>
                </tr>
                <tr>
                  <td>Harga Produk</td>
                  <td colspan="3">
                    <input type="text" placeholder="Harga Produk" value="<?php echo $row->harga ?>" class="form-control uang" autocomplete="off" name="harga">
                  </td>
                </tr>
                <tr>
                  <td>No. Handphone BUMDES</td>
                  <td colspan="3">
                    <input type="text" placeholder="No. Handphone BUMDES" value="<?php echo $row->telp ?>" class="form-control" autocomplete="off" name="telp">
                  </td>
                </tr>
                <tr>
                            <td>Foto / Gambar</td>
                            <td>
                            <center>   
                                    <img id="blah" class='img-fluid mb-3' width='280' src="image/<?php echo $row->gambar ?>" alt="your image" /></center>
                              <input type="file"     name="gambar" class="form-control mb-3 bersih"  onchange="readURL(this);"  aria-describedby="inputGroupFileAddon01">
                              <span class="badge badge-warning mb-3"><strong>Informasi</strong> Input Gambar Maksimal 2mb !</span> 

                            </td>
                        </tr>
                       
                <tr>
                  <td>Deskripsi</td>
                  <td colspan="3">
                      <textarea name="desk" id="" class="summernote" cols="30" rows="10"><?php echo $row->desk ?></textarea>
                  </td>
                </tr>

                <tr>
                  <td></td>
                  <td>
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-paper-plane"></i> Simpan</button>
                    <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-sync-alt"></i> Batal</button>
                  </td>
                </tr>
              </table>
            </form>
            </div>
              </div>
            </div>
            <!--  -->
          </div>
        </section>
        
      </div>
	 <!-- MAP LEAFLET SCRIPTS -->
		<script>
			//=====MAP=======
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
                $(".bersih").val('');
            },
            error : function (e){
                alert("Ada kesalahan sistem");
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