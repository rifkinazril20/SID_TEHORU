 <!-- Main Content -->
 <div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
 
        <div class="card">
            <div class="card-header bg-blue text-light">
               Data Pengaduan Status Selesai
            </div>
            <div class="card-body table-responsive">
                                 
<table width='100%' class='table table-hover table-striped dttable'>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No. Complaint</th>
                            <th>Kategori</th>
                            <th>From</th>
                            <th>Tanggal Complaint</th>
                            <th>Tanggal Respon</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                            $q = $this->db->query("select pengaduan.*,kategori_komplain.kat,penduduk.nama,tanggapan.tgl from pengaduan inner join tanggapan on tanggapan.idpengaduan = pengaduan.id inner join kategori_komplain on kategori_komplain.id = pengaduan.idkat inner join penduduk on penduduk.id = pengaduan.idpenduduk where pengaduan.status='Selesai'");
                            foreach($q->result() as $row){              
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row->nopengaduan; ?></td>
                            <td><?php echo $row->kat; ?></td>
                            <td><?php echo $row->nama; ?></td>
                            <td><?php echo $row->date; ?></td>
                            <td><?php echo $row->tgl; ?></td>
                           
                           
                        </tr>
                        <?php $no++; } ?>
                    </tbody>
                  </table>
                  <script>
              
   	$('.dttable').DataTable();
       
</script>
            </div>
            </div>
       



          </div>
        </section>
     
      </div>
     