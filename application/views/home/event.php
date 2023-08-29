<?php 
    $setting = $this->db->get('setting')->row();
    

?>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Event <?php echo $setting->web ?></h2>
          <ol>
            <li><a href="home/index">Home</a></li>
            <li>Event <?php echo $setting->web ?></li>
          </ol>
        </div>
      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">
      <?php echo $this->session->flashdata('msg');?>

        <div class="row">
          <div class="col-lg-8 entries">
          <?php 
foreach($q->result() as $row){
?>
            <article class="entry">

              <div class="entry-img">
                <img src="image/<?php echo $row->gambar2 ?>" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="home/eventpage/<?php echo $row->slug ?>"><?php echo $row->judul ?></a>
              </h2>

              <div class="entry-content">
              <p>
              Jam Mulai : <?php echo date("d F Y H:i",strtotime($row->mulai)) ?><br><br>
              Jam Selesai : <?php echo date("d F Y H:i",strtotime($row->selesai)) ?><br><br>
              Lokasi Event :   <?php echo $row->lokasi ?> <br><br>
        
                </p>
                <div class="read-more">
                  <a href="home/eventpage/<?php echo $row->slug ?>">Read More</a>
                </div>
              </div>

            </article><!-- End blog entry -->
            <?php  } ?>

            <nav>
                    <?php error_reporting(0); echo $page;?>
                </nav>

          </div><!-- End blog entries list -->
          <div class="col-lg-4">

            <div class="sidebar">

              <h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form action="home/searchEvent" method="get">
                  <input type="text" name="keyword" autocomplete="off">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->

       

              <h3 class="sidebar-title">Event Yang Akan Datang</h3>
              <div class="sidebar-item recent-posts">
              <?php 
                foreach($populer as $z){
              ?>
                <div class="post-item clearfix">
                  <img src="image/<?php echo $z->gambar2 ?>" alt="">
                  <h4><a href="home/eventpage/<?php echo $z->slug ?>"><?php echo $z->judul ?></a></h4>
                  <time datetime="2020-01-01"><?php echo date("d F Y",strtotime($z->mulai)) ?></time>
                </div>
            <?php }  ?>

              </div><!-- End sidebar recent posts-->

            
            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->

