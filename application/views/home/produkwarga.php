<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Produk Warga</h2>
      <ol>
        <li><a href="home/index">Home</a></li>
        <li>Produk Warga</li>
      </ol>
    </div>

  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Services Section ======= -->
<section id="services" class="services section-bg">
  <div class="container" data-aos="fade-up">
    <div class="card mb-3">
      <div class="card-body">
        <?php echo $this->session->flashdata('msg'); ?>
        <br>
        <form action="home/cariProdukwarga" method="get">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="keyword" placeholder="Cari Produk Warga...." autocomplete="off" aria-label="Cari Produk Warga...." aria-describedby="button-addon2">
            <button class="btn btn-outline-info" type="submit" id="button-addon2">Cari</button>
          </div>
        </form>
      </div>
    </div>


    <div class="row">
      <?php

      foreach ($qe->result() as $row) {
      ?>
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-3" data-aos="zoom-in" data-aos-delay="100">

          <div class="card">
            <img src="image/<?php echo $row->gambar ?>" class="card-img-top img-fluid img-thumbnail" alt="...">
            <div class="card-body table-responsive">
              <table class="table table-hover table-bordered">
                <tr>
                  <td>Nama Produk</td>
                  <td>:</td>
                  <td><?php echo $row->produk ?></td>
                </tr>
                <tr>
                  <td>Harga</td>
                  <td>:</td>
                  <td><?php echo number_format($row->harga, 0, ',', '.') ?></td>
                </tr>
                <tr>
                  <td>Pemilik Produk</td>
                  <td>:</td>
                  <td><?php echo $row->pemilik ?></td>
                </tr>
                <tr>
                  <td>No.Hp Pemilik</td>
                  <td>:</td>
                  <td><?php echo $row->telppemilik ?></td>
                </tr>

                <tr align="center">
                  <td colspan="3">
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <a href="home/produkdetail/<?php echo $row->slug ?>" class="btn btn-info "><i class="fa fa-eye"></i> Detail Produk</a>
                      <a href="https://wa.me/<?php echo $row->telppemilik ?>" class="btn btn-primary"><i class="fa fa-phone"></i>Hubungi Pemilik</a>
                    </div>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      <?php } ?>

    </div>
    <nav>
      <?php error_reporting(0);
      echo $page; ?>
    </nav>
  </div>
</section><!-- End Services Section -->

</main><!-- End #main -->