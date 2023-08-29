
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Galeri</h2>
          <ol>
            <li><a href="home/index">Home</a></li>
            <li>Galeri</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">
       <div class="row">
       <?php 
  
  foreach($qe->result() as $row){
?>
          <div class="col-lg-4 mb-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="card">
        <img src="image/<?php echo $row->gambar ?>" class="img-fluid img img-thumbnail" alt="">
        <div class="card-body table-responsive">
        <a href="image/<?php echo $row->gambar ?>" data-gallery="portfolioGallery" class="portfolio-lightbox btn btn-info w-100" title="<?php echo $row->judul ?>"><i class="bx bx-eye"></i> View</a>
            </div>
            </div>
        </div>
          <?php } ?>
       </div>
        <nav>
                    <?php error_reporting(0); echo $page;?>
                </nav>
      </div>
    </section><!-- End Services Section -->

  </main><!-- End #main -->