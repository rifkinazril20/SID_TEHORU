<?php 

    $q = $this->db->query("select * from penduduk where id='$id'");
    $row = $q->row();
?>
<!-- Main Content -->
 <div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
            <div class="col-12">
                <div class="card">
                  <div class="card-header bg-blue">
                  <h4 class="text-light">Detail / Lihat Penduduk <?php echo $row->nama.'-'.$row->nik ?></h4>
                </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered">
                            <tr>
                                <td>Nik</td>
                                <td><?php echo $row->nik ?></td>
                                <td>NOKK</td>
                                <td><?php echo $row->nokk ?></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td><?php echo $row->nama ?></td>
                                <td>Jenis Kelamin</td>
                                <td><?php echo $row->jk ?></td>
                            </tr>
                            <tr>
                                <td>Tempat Lahir</td>
                                <td><?php echo $row->tempatlahir ?></td>
                                <td>Tanggal Lahir</td>
                                <td><?php echo $row->tgllahir ?></td>
                            </tr>
                            <tr>
                                <td>Umur</td>
                                <td><?php echo $row->umur ?></td>
                                <td>Agama</td>
                                <td><?php echo $row->agama ?></td>
                            </tr>
                            <tr>
                                <td>Warganegara</td>
                                <td><?php echo $row->warganegara ?></td>
                                <td>Pendidikan</td>
                                <td><?php echo $row->pendidikan ?></td>
                            </tr>
                            <tr>
                                <td>Dusun</td>
                                <td><?php echo $row->dusun ?></td>
                                <td>RT & RW</td>
                                <td><?php echo $row->rt.'/'.$row->rw ?></td>
                            </tr>
                            <tr>
                                <td>Dusun</td>
                                <td><?php echo $row->dusun ?></td>
                                <td>RT & RW</td>
                                <td><?php echo $row->rt.'/'.$row->rw ?></td>
                            </tr>
                            <tr>
                                <td>Alamat Lengkap</td>
                                <td colspan="3"><?php echo $row->alamat ?></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td colspan="3" class="table-info">
                                    <?php if($row->status == '0') echo 'Belum Aktif'; else echo 'Aktif' ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
              </div>
            </div>
            <!--  -->
          </div>
        </section>
     
      </div>
     <script>
        $("#save").on("submit",function(e){
                        e.preventDefault();
                        $.ajax({
                            type: "post",
                            url: $(this).attr('action'),
                            data: $(this).serialize(),
                            dataType: "html",
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
                            error : function (response){
                              Swal.fire(
                                "Informasi",
                                "Ada kesalahan sistem!",
                                "warning"
                              );
                            }
                        });
                    });
     </script>