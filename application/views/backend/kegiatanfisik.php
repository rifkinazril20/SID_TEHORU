 <!-- Main Content -->
 <div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
 
        <div class="card">
            <div class="card-header bg-blue text-light">
               Data Kegiatan Fisik
            </div>
            <div class="card-body table-responsive">
                                 
<table width='100%' class='table table-hover table-striped dttable'>
                    <thead>
                        <tr>
                        <th width="30px" class="text-center">No</th>
                        <th width="30px" class="text-center">Foto Kegiatan</th>
						<th class="text-center">Nama Kegiatan</th>
						<th class="text-center">Jenis Kegiatan</th>
						<th class="text-center">Sumber Dana</th>
						<th class="text-center">Anggaran</th>
						<th class="text-center">Pelaksana</th>
						<th class="text-center">Tahun</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                            $q = $this->db->query("select kegiatan.*,jenis.jenis_kegiatan,sumberdana.sumberdana from kegiatan inner join jenis on jenis.id = kegiatan.idjenis inner join sumberdana on sumberdana.id = kegiatan.idsumberdana order by kegiatan.id desc ");
                            foreach($q->result() as $row){              
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td>
                                <?php if($row->sampul == ''){ ?>
                                    <img  class='img-fluid mb-3' width='300' src="assets/nofoto.jpg" alt="your image" />

                                    <?php }else{ ?>
                                    <img  class='img-fluid mb-3' width='300' src="image/<?php echo $row->sampul ?>" alt="your image" /></center>

                                        <?php } ?>    
                            </td>
                            <td><?php echo $row->kegiatan; ?></td>
                            <td><?php echo $row->jenis_kegiatan; ?></td>
                            <td><?php echo $row->sumberdana; ?></td>
                            <td><?php echo number_format($row->anggaran,0,',','.'); ?></td>
                            <td><?php echo $row->pelaksana; ?></td>
                            <td><?php echo $row->tahun; ?></td>
                            <td >
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="main/hapuskegiatanfisik/<?php echo $row->id ?>" class="btn hapus btn-danger btn-sm hapus">Hapus</a>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#basicModal<?= $row->id ?>">Ubah Sampul
                      </button>
                                <a href="main/editkegiatanfisik/<?php echo $this->secure->encrypt_url($row->id) ?>" class="btn btn-warning  btn-sm">Edit Kegiatan</a>
                                <a href="main/tambahgaleri/<?php echo $this->secure->encrypt_url($row->id) ?>" class="btn btn-success  btn-sm">Tambah Galleri</a>
                            </div>
                            </td>
                        </tr>
                        <?php $no++; } ?>
                    </tbody>
                  </table>
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
   	$('.dttable').DataTable();
</script>
            </div>
            </div>
       



          </div>
        </section>
     
      </div>
     
      <?php 
$gallery = $this->db->query("select kegiatan.*,jenis.jenis_kegiatan,sumberdana.sumberdana from kegiatan inner join jenis on jenis.id = kegiatan.idjenis inner join sumberdana on sumberdana.id = kegiatan.idsumberdana order by kegiatan.id desc ");
   
   foreach ($gallery->result() as $key => $value) {?>
      <div class="modal fade" id="basicModal<?= $value->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-info">
                <h5 class="modal-title text-light" id="exampleModalLabel">Ubah Sampul Kegiatan Fisik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body table-responsive">
              <form action="main/ubahsampul/<?php echo $value->id ?>" id="save" enctype="multipart/form-data" method="post">
                  <center>
              <div class="form-group">
					<label class="control-label">Sampul Lama</label><br>
                    <?php if($value->sampul == ''){ ?>
                                    <img id="blah" class='img-fluid mb-3' width='300' src="assets/nofoto.jpg" alt="your image" />

                                    <?php }else{ ?>
                                    <img id="blah" class='img-fluid mb-3' width='300' src="image/<?php echo $value->sampul ?>" alt="your image" /></center>

                                        <?php } ?> 
				</div>

				<div class="form-group">
					<label class="control-label">Ganti Sampul Baru</label>
                    <input type="file"     name="gambar" class="form-control mb-3 bersih"  onchange="readURL(this);"  aria-describedby="inputGroupFileAddon01">
                              <span class="badge badge-warning"><strong>Informasi</strong> Input Gambar Maksimal 2mb !</span> 

				</div>
                </center>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
                                    </form>
            </div>
          </div>
        </div> 


        <?php } ?>

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
     