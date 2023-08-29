 <!-- Main Content -->
 <div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
 
        <div class="card">
            <div class="card-header bg-blue text-light">
               Data Pengaduan Status Pending
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
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                            $q = $this->db->query("select pengaduan.*,kategori_komplain.kat,penduduk.nama from pengaduan inner join kategori_komplain on kategori_komplain.id = pengaduan.idkat inner join penduduk on penduduk.id = pengaduan.idpenduduk where pengaduan.status='Pending'");
                            foreach($q->result() as $row){              
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row->nopengaduan; ?></td>
                            <td><?php echo $row->kat; ?></td>
                            <td><?php echo $row->nama; ?></td>
                            <td><?php echo $row->date; ?></td>
                            <td>
                                <?php if($row->status == "Pending"){ ?>
                                    <span class="badge badge-warning"><?php echo $row->status ?></span>
                                    <?php }elseif($row->status == "Proses"){ ?>
                                    <span class="badge badge-success"><?php echo $row->status ?></span>

                                        <?php  }else{ ?>
                                    <span class="badge badge-info"><?php echo $row->status ?></span>
                                <?php }  ?>
                            </td>
                            <td>
                                <a href="main/viewpengaduan/<?php echo $row->id ?>" class="btn btn-info btn-sm "><i class="fa fa-eye"></i></a>
                            </td>
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
     