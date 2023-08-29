<?php 
    $setting = $this->db->get('setting')->row();
    

?>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Berita <?php echo $setting->web ?></h2>
          <ol>
            <li><a href="home/index">Home</a></li>
            <li>Berita <?php echo $setting->web ?></li>
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
                <img src="image/<?php echo $row->gambar ?>" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="home/detailberita/<?php echo $row->slug ?>"><?php echo $row->judul ?></a>
              </h2>

              <div class="entry-meta">
                
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="home/detailberita/<?php echo $row->slug ?>"><?php echo $row->nama ?></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="home/detailberita/<?php echo $row->slug ?>"><time datetime="2020-01-01"><?php echo date("d F Y",strtotime($row->date)) ?></time></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-eye"></i> <a href="home/detailberita/<?php echo $row->slug ?>"><?php echo $row->views ?> Views</a></li>
                </ul>
              </div>

              <div class="entry-content">
              <p>
                  <?php echo substr($row->ket,0,200) ?>...
                </p>
                <div class="read-more">
                  <a href="home/detailberita/<?php echo $row->slug ?>">Read More</a>
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
                <form action="home/searchBerita" method="get">
                  <input type="text" name="keyword" autocomplete="off">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->

              <h3 class="sidebar-title">Categories</h3>
              <div class="sidebar-item categories">
                <ul>
                  <?php 
                    foreach($kategori as $k){
                  ?>
                  <li><a href="<?php echo site_url('home/kategori/'.str_replace(" ","-",$k->kat));?>"><?php echo $k->kat ?> <span>(<?php echo $k->jml ?>)</span></a></li>
                  <?php  } ?>
                </ul>
              </div><!-- End sidebar categories-->

              <h3 class="sidebar-title">Populer Posts</h3>
              <div class="sidebar-item recent-posts">
              <?php 
                foreach($populer as $z){
              ?>
                <div class="post-item clearfix">
                  <img src="image/<?php echo $z->gambar ?>" alt="">
                  <h4><a href="home/detailberita/<?php echo $z->slug ?>"><?php echo $z->judul ?></a></h4>
                  <time datetime="2020-01-01"><?php echo date("d F Y",strtotime($z->date)) ?></time>
                </div>
            <?php }  ?>

              </div><!-- End sidebar recent posts-->

              <h3 class="sidebar-title">Tags</h3>
              <div class="sidebar-item tags">
                <ul>
                <?php 
                    foreach($kategori as $k){
                  ?>
                  <li><a href="<?php echo site_url('home/kategori/'.str_replace(" ","-",$k->kat));?>"><?php echo $k->kat ?></a></li>
                  <?php  } ?>
                
                </ul>
              </div><!-- End sidebar tags-->
            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->