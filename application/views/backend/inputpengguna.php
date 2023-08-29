<?php $this->load->view("backend/atas") ?>


<div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
            <div class="card">
                <div class="card-header text-light bg-info">
                   Input Data Pengguna
                </div>
                <div class="card-body table-responsive">
                <form action="main/savepengguna" id="save" method="post">
                    <table class="table">
                        <tr>
                            <td>Nama</td>
                            <td>
                                <input type="text" class="form-control" autocomplete="off" name="nama" placeholder="Nama Pengguna">
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>
                                <input type="email" class="form-control" autocomplete="off" name="email" placeholder="Email Pengguna">
                            </td>
                        </tr>
                        <tr>
                            <td>Nomor Telepon</td>
                            <td>
                                <input type="number" class="form-control" autocomplete="off" name="telp" placeholder="Nomor Telepon Pengguna">
                            </td>
                        </tr>
                        <tr>
                            <td>Level</td>
                            <td>
                                <select name="level" id="" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="1">Administrator</option>
                                    <option value="2">Operator</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>
                                <input type="text" class="form-control"autocomplete="off" name="username" placeholder="Username Pengguna">
                            </td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>
                                <input type="password" class="form-control"autocomplete="off" name="password" placeholder="Password Pengguna">
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
                    text: "Data pengguna berhasil disimpan!",
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
                alert("Ada kesalahan sistem")
            }
        });
    });
</script>
      <?php $this->load->view("backend/bawah") ?>