<?php $this->load->view("backend/atas") ?>


<div class="main-content">
    <section class="section">
        <div class="section-body">
            <!-- add content here -->

            <div class="card">
                <div class="card-header">
                    Form Berita
                </div>
                <div class="card-body table-responsive">
                    <form action="main/saveberita" id="save" method="post" enctype="multipart/form-data">
                        <table class="table">
                            <tr>
                                <td>Judul</td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control bersih" name="judul" autocomplete="off" required placeholder="Judul Berita">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td>
                                    <div class="form-group">
                                        <select class="form-control select2" required name="kat" id="">
                                            <option>Pilih</option>
                                            <?php $db = $this->db->get('kategori');
                                            foreach ($db->result() as $row) {
                                            ?>
                                                <option value="<?php echo $row->id ?>"><?php echo $row->kat ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Foto</td>
                                <td>
                                    <center> <img id="blah" class='img-responsive' width='280' src="assets/nofoto.jpg" alt="your image" /></center>
                                    <input type="file" required  name="gambar" class="form-control mb-3" onchange="readURL(this);" aria-describedby="inputGroupFileAddon01">
                                    <span class="badge badge-warning mb-3"><strong>Informasi</strong> Input Gambar Hanya Bisa Bertype JPG,JPEG,PNG Dan Maksimal 2mb !</span>
                                </td>
                            </tr>
                            </tr>
                            <tr>
                                <td>Deskripsi</td>
                                <td>
                                    <textarea class="summernote" name="desc" rows="3"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input name="" id="" class="btn btn-primary text-light " type="submit" value="Simpan"> <input name="" id="" class="btn btn-warning text-light" type="reset" value="Reset"></td>
                            </tr>
                        </table>

                    </form>

                </div>
            </div>
        </div>
    </section>

</div>

<script>
    $("#save").on("submit", function(e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: $(this).attr('action'),
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            success: function(response) {
                Swal.fire({
                    title: "Informasi",
                    text: "berita baru Berhasil Ditambahkan!",
                    icon: "success",
                    showCancelButton: false,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true,
                    allowOutsideClick: () => !Swal.isLoading()
                }).then((result) => {
                    window.location.reload();
                })
            },
            error: function(e) {
                alert("ada kesalahan sistem")
            }
        });
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<?php $this->load->view("backend/bawah") ?>