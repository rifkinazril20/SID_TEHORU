<?php $this->load->view("backend/atas") ?>


<div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
            <div class="card">
            <div class="card-body table-responsive">
            <table class="table table-striped" id="table-1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Beita</th>
                            <th>Views</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Komentar</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                            $q = $this->db->query("select komentar_berita.*,berita.judul as berita,berita.views from komentar_berita inner join berita on berita.id = komentar_berita.idberita");
                            foreach($q->result() as $row){
                        ?>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td><?php echo $row->berita ?></td>
                                <td><?php echo $row->views ?></td>
                                <td><?php echo $row->nama ?></td>
                                <td><?php echo $row->email ?></td>
                                <td><?php echo $row->komen ?></td>
                                <td><?php echo $row->date ?></td>
                                <td>
                                  <a href="main/hapuspesanberita/<?php echo $row->id ?>" class="hapus btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php $no++; }?>
                    </tbody>
                    </table>
            </div>
          </div>
          </div>
        </section>
        
      </div>
<script>
    $("#table-1").DataTable();
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
                                text: "Data Berhasil Dihapus !",
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