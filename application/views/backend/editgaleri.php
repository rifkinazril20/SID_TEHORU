<?php 
    $q = $this->db->query("select * from galeri where id='$id'");
    $row = $q->row();
?>
<!-- Main Content -->
 <div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->

        <div class="card">
            <div class="card-header text-light bg-blue">
                Edit Galeri <?php echo $row->judul ?>
            </div>
            <div class="card-body table-responsive">
            <form action="main/updategaleri/<?php echo $this->secure->encrypt_url($id); ?>" id="save" method="post">
                    <table class="table">
                        <tr>
                            <td>Judul Galeri</td>
                            <td>
                                <input type="text" value="<?php echo $row->judul ?>" class="form-control" name="judul" placeholder="Judul Galeri">
                            </td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>
                                <select name="status" id="" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="Publish" <?php if($row->status == 'Publish') echo 'selected'; ?>>Publish</option>
                                    <option value="Draft" <?php if($row->status == 'Draft') echo 'selected'; ?>>Draft</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Foto / Gambar</td>
                            <td>
                            <center>   
                                    <img id="blah" class='img-fluid mb-3' width='280' src="image/<?php echo $row->gambar ?>" alt="your image" /></center>
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


          </div>
        </section>
     
      </div>

      <script>
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
        

                    $(".summernote").summernote({
                        dialogsInBody: true,
                        minHeight: 250
                    });
     </script>
     