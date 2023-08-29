<?php
    $sejarah = $this->db->get('visi_misi')->row();
    

?>
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Visi & Misi Desa</h2>
          <ol>
            <li><a href="home/index">Home</a></li>
            <li>Visi & Misi Desa</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">
      <div class="section-title" data-aos="fade-up">
          <h2>Visi & Misi Desa</h2>
        </div>

      <div class="card">
  <div class="card-body">
  <p><?php echo $sejarah->deskripsi ?></p>
  </div>
</div>
      </div>
    </section><!-- End Services Section -->

  </main><!-- End #main -->