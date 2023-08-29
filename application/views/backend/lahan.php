 <!-- Main Content -->
 <div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
 
        <div class="card">
            <div class="card-header bg-blue text-light">
               Data Irigasi
            </div>
            <div class="card-body table-responsive">
                                 
<table width='100%' class='table table-hover table-striped dttable'>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lahan</th>
                            <th>Luas Lahan</th>
                            <th>Isi Lahan</th>
                            <th>Pemilik Lahan</th>
                            <th>Alamat Pemilik</th>
                            <th>Warna Lahan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                            $q = $this->db->query("select * from lahan");
                            foreach($q->result() as $row){              
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row->lahan; ?></td>
                            <td><?php echo $row->luas; ?></td>
                            <td><?php echo $row->isi; ?></td>
                            <td><?php echo $row->pemilik_lahan; ?></td>
                            <td><?php echo $row->alamat_pemilik; ?></td>
                            <td style="background-color: <?php echo $row->warna; ?>;"></td>
                            <td>
                                <a href="main/hapuslahan/<?php echo $row->id ?>" class="btn btn-danger btn-sm hapus"><i class="fa fa-trash"></i></a>
                                <a href="main/detaillahan/<?php echo $this->secure->encrypt_url($row->id) ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                <a href="main/editlahan/<?php echo $row->id ?>" class="btn btn-warning non btn-sm"><i class="fa fa-edit"></i></a>
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
     