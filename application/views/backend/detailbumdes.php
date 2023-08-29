<?php 
$setting = $this->db->get('setting')->row();
$q = $this->db->query("select * from produk_bumdes where id='$id'");
$row = $q->row();
?>
<div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
           

              <div class="col-lg-12">
              <div class="card">
            <div class="card-header text-light bg-info">
              Detail Produk BUMDES (BADAN USAHA MILIK DESA) <?php echo $row->produk ?>
            </div>
            <div class="card-body table-responsive">
            <form action="main/savebumdes" id="save" method="post" enctype="multipart/form-data">
              <table class="table table-bordered table-striped">
                <tr>
                  <td>Nama Produk</td>
                  <td colspan="3">
                      <?php echo $row->produk ?>
                  </td>
                </tr>
                <tr>
                  <td>Kategori Produk</td>
                  <td colspan="3">
                  <?php echo $row->kategori ?>

                  </td>
                </tr>
                <tr>
                  <td>Harga Produk</td>
                  <td colspan="3">
                  <?php echo number_format($row->harga,0,',','.') ?>

                  </td>
                </tr>
                <tr>
                  <td>No. Handphone BUMDES</td>
                  <td colspan="3">
                  <?php echo $row->telp ?>
                  </td>
                </tr>
                <tr>
                            <td>Foto / Gambar</td>
                            <td>
                            <center>   
                                    <img id="blah" class='img-fluid mb-3 img-thumbnail img' width='280' src="image/<?php echo $row->gambar ?>" alt="your image" /></center>
                            
                            </td>
                        </tr>
                       
                <tr>
                  <td>Deskripsi</td>
                  <td colspan="3">
                  <?php echo $row->desk ?>
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
	