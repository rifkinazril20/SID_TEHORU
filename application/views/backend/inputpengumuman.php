<?php 
$setting = $this->db->get('setting')->row();

?>
<div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
           

              <div class="col-lg-12">
              <div class="card">
            <div class="card-header text-light bg-info">
              Form Pengumuman
            </div>
            <div class="card-body table-responsive">
            <form action="main/savepengumuman" id="save" method="post" enctype="multipart/form-data">
              <table class="table">
                <tr>
                  <td>Judul Pengumuman</td>
                  <td colspan="3">
                    <input type="text" placeholder="Judul Pengumuman" class="form-control" name="judul">
                  </td>
                </tr>
                <tr>
                  <td>Tanggal Pengumuman</td>
                  <td colspan="3">
                    <input type="text" placeholder="Tanggal Pengumuman" class="form-control tgl" autocomplete="off" name="date">
                  </td>
                </tr>
                <tr>
                            <td>Foto / Gambar</td>
                            <td>
                            <center>   
                                    <img id="blah" class='img-fluid mb-3' width='280' src="assets/nofoto.jpg" alt="your image" /></center>
                              <input type="file"     name="gambar" class="form-control mb-3 bersih"  onchange="readURL(this);"  aria-describedby="inputGroupFileAddon01">
                              <span class="badge badge-warning mb-3"><strong>Informasi</strong> Input Gambar Maksimal 2mb !</span> 

                            </td>
                        </tr>
                       
                <tr>
                  <td>Deskripsi</td>
                  <td colspan="3">
                      <textarea name="desk" id="" class="summernote" cols="30" rows="10"></textarea>
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