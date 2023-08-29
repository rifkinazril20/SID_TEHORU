<?php 
    $setting = $this->db->get('setting')->row();
    

?>
<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Detail Berita <?php echo $judul; ?></h2>
      <ol>
        <li><a href="home/index">Home</a></li>
        <li><a href="home/berita">Berita <?php echo $setting->web ?></a></li>
        <li>Detail Berita <?php echo $judul; ?></li>
      </ol>
    </div>

  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Detail Akomodasi  Section ======= -->
<section id="blog" class="blog">
  <div class="container" data-aos="fade-up">

    <div class="row">

      <div class="col-lg-8 entries">

        <article class="entry entry-single">

          <div class="entry-img">
          <img src="image/<?php echo $image1 ?>" alt="" class="img-fluid">

            <!-- <img src="" alt="" class="img-fluid"> -->
          </div>

          <h2 class="entry-title">
            <a href="home/detailakomodasi/<?php echo $slug ?>"><?php echo $judul ?></a>
          </h2>

          <div class="entry-meta">
            <ul>
              <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="home/detailakomodasi/<?php echo $slug ?>"><?php echo $nama ?></a></li>
              <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="home/detailakomodasi/<?php echo $slug ?>"><time datetime="2020-01-01"><?php echo date("d F Y",strtotime($date)) ?></time></a></li>
              <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="home/detailakomodasi/<?php echo $slug ?>"><?php echo $totalkoment ?> Comments</a></li>
            </ul>
          </div>

          <div class="entry-content">

            <p>
                <?php echo $ket ?>
            </p>


            <!-- <div class="sharethis-inline-follow-buttons"></div> -->
            <div class="sharethis-inline-reaction-buttons"></div>

          </div>

          <div class="entry-footer">
                <i class="bi bi-folder"></i>
                <ul class="cats">
                  <li><a href="#"><?php echo $judul ?></a></li>
                </ul>

                <i class="bi bi-tags"></i>
                <ul class="tags">
                  <li><a href="#"><?php echo $kat ?></a></li>
                
                </ul>
              </div>

        </article><!-- End blog entry -->
        <div class="blog-author d-flex align-items-center">
          <img src="plugin/pria.png" class="rounded-circle float-left" alt="">
          <div>
            <h4><?php echo $nama ?></h4>
            <div class="social-links">
              <a href="https://twitters.com/#"><i class="bi bi-twitter"></i></a>
              <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
              <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
            </div>
            <p>
                <?php echo $judul ?>
            </p>
          </div>
        </div><!-- End blog author bio -->
        <div class="blog-comments">

        
       <div id="loadkoment"></div>

        </div><!-- End blog comments -->

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
</section><!-- End Detail Akomodasi  Section -->

</main><!-- End #main -->
<script>
    $("#loadkoment").load("home/loadkomentberita/<?php echo $id; ?>")
</script>

